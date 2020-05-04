<?php
/**
 * Author: Kotowicz 17018747
 */

require_once 'Core/init.php';

class LoginView
{
    private LoginModel $_loginModel;
    private LoginController $_loginController;

    /**
     * RegisterView constructor.
     * @param $loginModel
     * @param $loginController
     */
    public function __construct(LoginModel $loginModel, LoginController $loginController)
    {
        $this->_loginModel = $loginModel;
        $this->_loginController = $loginController;
    }

    public function showLoginForm()
    {
        $tokenValue = Token::generate();
        return "
            <div class='formBorder'>

                <h1 class='title'>Login</h1>
            
                <form class='form' method='post' action=''>
                <div class='twoFields'>
                    <label for='username'>Username</label>
                    <input class='inputField' type='text' name='username' id='username' autocomplete='off' />
                    <br/>
            
                    <label for='password'>Password</label>
                    <input class='inputField' type='password' name='password' id='password' autocomplete='off'/>
                    <br/>
                </div>
            
                    <input type='hidden' name='token' value='$tokenValue'/>
                    <input class='submitButton' type='submit' name='Login' value='Login' />
                </form>
            </div>
        ";
    }
}