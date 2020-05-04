<?php
/**
 * Author: Kotowicz 17018747
 */

class LoginController
{
    private LoginModel $_loginModel;

    /**
     * LoginController constructor.
     * @param loginModel
     **/
    public function __construct(LoginModel $loginModel)
    {
        $this->_loginModel = $loginModel;
    }

    public function loginFormSubmitted()
    {
        if(!empty($_POST["Login"]))
        {
            if (Token::check(Input::get('token')))
            {
                $validate = $this->validateForm();

                if($validate->succeeded())
                {
                    $loginSuccessful = $this->_loginModel->login(Input::get('username'), Input::get('password'));

                    if($loginSuccessful)
                    {
                        $previousPage = Session::get('previousPage');
                        Redirect::redirectTo($previousPage);
                    }
                    else
                    {
                        echo '<p>Incorrect username or password!</p>';
                    }
                }
                else
                {
                    foreach($validate->getErrors() as $error)
                        echo $error, '<br/>';
                }
            }
        }
    }

    private function validateForm()
    {
        $validation = new Validation();

        return $validation->check($_POST, array(
            'username' => array('required' => true),
            'password' => array('required' => true),
        ));
    }
}