<?php
/**
 * Author: Kotowicz 17018747
 */
require_once 'Core/init.php';
define("USERS_TABLE_NAME", "users");
define("USERS_GROUP_TABLE_NAME", "groups");

class UserMapper
{
    private Database $_db;

    /**
     * UserMapper constructor.
     */
    public function __construct()
    {
        $this->_db = Database::getInstance();
    }

    public function insert(IUserModel $userModel, string $password)
    {
        $fields = array(
            'Username' => $userModel->getUsername(),
            'Password' => $password,
            'EmailAddress' => $userModel->getEmailaddress(),
            'Forename' => $userModel->getForename(),
            'Surname' => $userModel->getSurname(),
            'Joined' => date('Y-m-d H:i:s'),
            'GroupId' => $userModel->getGroupModel()->getId(),
            'PhotoName' => $userModel->getPhotoName()
        );

        if (!$this->_db->insert(USERS_TABLE_NAME, $fields))
        {
            throw new Exception("There was a problem creating an account.");
        }
    }

    public function update(IUserModel $userModel, string $password)
    {
        $fields = array(
            'Username' => $userModel->getUsername(),
            'Password' => $password,
            'EmailAddress' => $userModel->getEmailaddress(),
            'Forename' => $userModel->getForename(),
            'Surname' => $userModel->getSurname(),
            'PhotoName' => $userModel->getPhotoName()
        );

        if (!$this->_db->update(USERS_TABLE_NAME, $fields, $userModel->getId()))
        {
            throw new Exception("There was a problem creating an account.");
        }
    }

    public function findIfUsernameExists(string $username) : bool
    {
        $data = $this->_db->get(USERS_TABLE_NAME, array('Username', '=', $username));

        if($data->count())
            return true;

        return false;
    }

    public function findIfEmailExists(string $emailAddress) : bool
    {
        $data = $this->_db->get(USERS_TABLE_NAME, array('EmailAddress', '=', $emailAddress));

        if($data->count())
            return true;

        return false;
    }

    public function validatePasword(int $id, string $password) : bool
    {
        $data = $this->_db->get(USERS_TABLE_NAME, array('Id', '=', $id));

        if($data->count())
        {
            $user = $data->first();

            if(password_verify($password, $user->Password))
            {
                return true;
            }
        }

        return false;
    }

    public function loadUser(string $username, string $password) : IUserModel
    {
        $data = $this->_db->get(USERS_TABLE_NAME, array('Username', '=', $username));
        if($data->count())
        {
            $user = $data->first();

            if(password_verify($password, $user->Password))
            {
                $userModel = new UserModel();
                $userModel->createUser(
                    $user->Id,
                    $user->Username,
                    $user->EmailAddress,
                    $user->Forename,
                    $user->Surname,
                    date_create_from_format('Y-m-d', $user->Joined),
                    $this->getUserGroup($user->GroupId),
                    $user->PhotoName);


                return $userModel;
            }
        }

        throw new ErrorException("Couldn't load user");
    }

    public function loadUserById(int $userId) : IUserModel
    {
        $data = $this->_db->get(USERS_TABLE_NAME, array('Id', '=', $userId));
        if($data->count())
        {
            $user = $data->first();

                $userModel = new UserModel();
                $userModel->createUser(
                    $user->Id,
                    $user->Username,
                    $user->EmailAddress,
                    $user->Forename,
                    $user->Surname,
                    date_create_from_format('Y-m-d', $user->Joined),
                    $this->getUserGroup($user->GroupId),
                    $user->PhotoName);

                return $userModel;
        }

        throw new ErrorException("Couldn't load user");
    }

    private function getUserGroup($id) : IGroupModel
    {
        $data = $this->_db->get(USERS_GROUP_TABLE_NAME, array('Id', '=', $id));
        if($data->count())
        {
            $group = $data->first();
            $userGroup = new GroupModel($group->Id);
            $userGroup->setGroupName($group->Name);

            return $userGroup;
        }

        throw new ErrorException("Couldn't load user's group");
    }
}