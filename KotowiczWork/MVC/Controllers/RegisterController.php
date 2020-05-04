<?php
/**
 * Author: Kotowicz 17018747
 */
require_once 'Core/init.php';

class RegisterController
{
    private RegisterModel $_registerModel;
    private UserMapper $_userMapper;

    /**
     * RegisterController constructor.
     * @param RegisterModel $registerModel
     * @param UserMapper $userMapper
     */
    public function __construct(RegisterModel $registerModel, UserMapper $userMapper)
    {
        $this->_registerModel = $registerModel;
        $this->_userMapper = $userMapper;
    }


    public function registerFormSubmitted()
    {
        if(!empty($_POST["Register"]))
        {
            if(Token::check(Input::get('token')))
            {
                $groupModel = new GroupModel(1);
                $this->_registerModel->getUserModel()->setForename(Input::get('Forename'));
                $this->_registerModel->getUserModel()->setSurname(Input::get('Surname'));
                $this->_registerModel->getUserModel()->setUsername(Input::get('Username'));
                $this->_registerModel->getUserModel()->setEmailaddress(Input::get('Email_Address'));
                $this->_registerModel->getUserModel()->setGroupModel($groupModel);
                $this->_registerModel->getUserModel()->setPhotoName('user.png');

                $validate = $this->validateForm();

                if ($validate->succeeded()) {
                    if($this->_userMapper->findIfUsernameExists($this->_registerModel->getUserModel()->getUsername()))
                    {
                        echo "User with this username already exists!";
                    }
                    else if($this->_userMapper->findIfEmailExists($this->_registerModel->getUserModel()->getEmailaddress()))
                    {
                        echo "User with this email address already exists!";
                    }
                    else
                    {
                        if($this->_registerModel->registerUser(password_hash(Input::get('Password'), PASSWORD_DEFAULT)))
                        {
                            Session::flash('home', 'Account successfuly registered');
                            Redirect::redirectTo('forum.php');
                        }
                        else
                        {
                            echo "Error! Cannot register account! Contact Website Administrator!";
                        }
                    }
                }
                else
                {
                    foreach ($validate->getErrors() as $error)
                        echo $error, '<br/>';
                }
            }
        }
    }

    private function validateForm()
    {
        $validation = new Validation();

        return $validation->check($_POST, array(
            'Forename' => array(
                'required' => true,
                'min' => 3,
                'max' => 50,
            ),
            'Surname' => array(
                'required' => true,
                'min' => 3,
                'max' => 50,
            ),
            'Username' => array(
                'required' => true,
                'min' => 3,
                'max' => 24,
                'unique' => 'users'
            ),
            'Email_Address' => array(
                'required' => true,
                'max' => 100
            ),
            'Confirm_Email_Address' => array(
                'required' => true,
                'matches' => 'Email_Address'
            ),
            'Password' => array(
                'required' => true,
            ),
            'Confirm_Password' => array(
                'required' => true,
                'matches' => 'Password'
            ),
        ));
    }
}