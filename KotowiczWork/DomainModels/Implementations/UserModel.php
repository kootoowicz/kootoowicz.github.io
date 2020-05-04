<?php
/**
 * Author: Kotowicz 17018747
 */

class UserModel implements IUserModel
{
    private $_id = 0;
    private string $_username = '';
    private string $_emailaddress = '';
    private string $_forename = '';
    private string $_surname = '';
    private DateTime $_joined;
    private IGroupModel $_groupModel;
    private bool $_isLoggedIn = false;
    private string $_photoName = '';

    /**
     * UserModel constructor.
     */
    public function __construct()
    {

    }

    /**
     * Fills user's data. Should be used when loading user's data from the database.
     * @param int $id User's unique identificator.
     * @param string $username User's username.
     * @param string $emailAdress User's email address.
     * @param string $forename User's first name.
     * @param string $surname User's last name.
     * @param DateTime $joined Date the user registered his account.
     * @param IGroupModel $groupModel The group the user belong to.
     * @param string $photoName User's forum photo.
     */
    public function createUser(int $id,
                               string $username,
                               string $emailAdress,
                               string $forename,
                               string $surname,
                               DateTime $joined,
                               IGroupModel $groupModel,
                               string $photoName)
    {
        $this->_id=$id;
        $this->_username=$username;
        $this->_emailaddress = $emailAdress;
        $this->_forename=$forename;
        $this->_surname=$surname;
        $this->_joined=$joined;
        $this->_groupModel=$groupModel;
        $this->_photoName=$photoName;
    }

    public static function getLoggedInUser() : IUserModel
    {
        $user = new UserModel();
        if(Session::exists('loggedInUser'))
        {
            $user =  $_SESSION['loggedInUser'];
        }

        return $user;
    }

    public function logout() : void
    {
        unset($_COOKIE['loggedInUser']);
        Session::delete('loggedInUser');
    }


    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->_id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->_id = $id;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->_username;
    }

    /**
     * @param string $username
     */
    public function setUsername(string $username): void
    {
        $this->_username = $username;
    }

    /**
     * @return string
     */
    public function getEmailaddress(): string
    {
        return $this->_emailaddress;
    }

    /**
     * @param string $emailaddress
     */
    public function setEmailaddress(string $emailaddress): void
    {
        $this->_emailaddress = $emailaddress;
    }

    /**
     * @return string
     */
    public function getForename(): string
    {
        return $this->_forename;
    }

    /**
     * @param string $forename
     */
    public function setForename(string $forename): void
    {
        $this->_forename = $forename;
    }

    /**
     * @return string
     */
    public function getSurname(): string
    {
        return $this->_surname;
    }

    /**
     * @param string $surname
     */
    public function setSurname(string $surname): void
    {
        $this->_surname = $surname;
    }

    /**
     * @return DateTime
     */
    public function getJoined(): DateTime
    {
        return $this->_joined;
    }

    /**
     * @param DateTime $joined
     */
    public function setJoined(DateTime $joined): void
    {
        $this->_joined = $joined;
    }

    /**
     * @return IGroupModel
     */
    public function getGroupModel(): IGroupModel
    {
        return $this->_groupModel;
    }

    /**
     * @param IGroupModel $groupModel
     */
    public function setGroupModel(IGroupModel $groupModel): void
    {
        $this->_groupModel = $groupModel;
    }

    /**
     * @return string
     */
    public function getPhotoName(): string
    {
        return $this->_photoName;
    }

    /**
     * @param string $photoName
     */
    public function setPhotoName(string $photoName): void
    {
        $this->_photoName = $photoName;
    }

    /**
     * @return bool
     */
    public function isLoggedIn(): bool
    {
        return $this->_isLoggedIn;
    }

    /**
     * @param bool $isLoggedIn
     */
    public function setIsLoggedIn(bool $isLoggedIn): void
    {
        $this->_isLoggedIn = $isLoggedIn;
    }
}