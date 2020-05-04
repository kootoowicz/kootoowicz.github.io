<?php


class UserProfileModel
{
    private IUserModel $_userModel;
    private UserMapper $_userMapper;

    /**
     * UserProfileModel constructor.
     * @param IUserModel $_userModel
     * @param UserMapper $_userMapper
     */
    public function __construct(IUserModel $_userModel, UserMapper $_userMapper)
    {
        $this->_userModel = $_userModel;
        $this->_userMapper = $_userMapper;
    }


    public function updateUser(string $password) : bool
    {
        try
        {
            $this->_userMapper->update($this->_userModel, $password);
            return true;
        }
        catch(Exception $e)
        {
            $e->getMessage();
            return false;
        }
    }

    /**
     * @return IUserModel
     */
    public function getUser(): IUserModel
    {
        return $this->_userModel;
    }
}