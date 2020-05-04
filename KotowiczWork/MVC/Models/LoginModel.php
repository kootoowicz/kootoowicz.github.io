<?php
/**
 * Author: Kotowicz 17018747
 */
require_once 'Core/init.php';

class LoginModel
{
    private IUserModel $_userModel;
    private UserMapper $_userMapper;

    /**
     * LoginModel constructor.
     * @param UserMapper $userMapper
     */
    public function __construct(UserMapper $userMapper)
    {
        $this->_userMapper = $userMapper;
    }

    /**
     * @param string $username
     * @param string $password
     * @return bool
     */
    public function login(string $username, string $password): bool
    {
        try
        {
            $this->_userModel = $this->_userMapper->loadUser($username, $password);
            $this->_userModel->setIsLoggedIn(true);
            $_SESSION['loggedInUser'] = $this->_userModel;
            //setcookie(Config::get('cookie/cookie_name'), $this->_userModel, Config::get('cookie/cookie_expiry'));
            return true;
        }
        catch(Exception $e)
        {
            return false;
        }
    }
}