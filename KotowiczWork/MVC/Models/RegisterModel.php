<?php
/**
 * Author: Kotowicz 17018747
 */
require_once 'Core/init.php';

class RegisterModel
{
    private IUserModel $_userModel;
    private UserMapper $_userMapper;

    /**
     * RegisterModel constructor.
     * @param IUserModel $userModel
     * @param UserMapper $userMapper
     */
    public function __construct(IUserModel $userModel, UserMapper $userMapper)
    {
        $this->_userModel = $userModel;
        $this->_userMapper = $userMapper;
    }

    /**
     * @return IUserModel
     */
    public function getUserModel(): IUserModel
    {
        return $this->_userModel;
    }

    public function registerUser(string $password) : bool
    {
        try
        {
            $this->_userMapper->insert($this->_userModel, $password);
            return true;
        }
        catch(Exception $e)
        {
            $e->getMessage();
            return false;
        }
    }
}