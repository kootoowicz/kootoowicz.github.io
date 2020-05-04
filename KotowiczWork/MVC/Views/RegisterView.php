<?php
/**
 * Author: Kotowicz 17018747
 */
require_once 'Core/init.php';
    class RegisterView
    {
        private RegisterModel $_registerModel;
        private RegisterController $_registerController;

        /**
         * RegisterView constructor.
         * @param $registerModel
         * @param $registerController
         */
        public function __construct($registerModel, $registerController)
        {
            $this->_registerModel = $registerModel;
            $this->_registerController = $registerController;
        }

        public function showRegisterForm()
        {
            $tokenValue = Token::generate();
            return "
               <div class='formBorder'>
            
                <h1 class='title'>Create your Account</h1>
            
                <form class='form' method='post' action=''>
            
                    <div class=\"twoFields\">
                        <input class='inputField' type='text' name='Forename' id='Forename' placeholder='Forename' value='{$this->_registerModel->getUserModel()->getForename()}' />
                        <input class='inputField' type='text' name='Surname' id='Surname' placeholder='Last Name' value='{$this->_registerModel->getUserModel()->getSurname()}'/>
                    </div>
            
                    <input class='inputField fullWidthField' type='text' name='Username' id='username' placeholder='Username' value='{$this->_registerModel->getUserModel()->getUsername()}'/>
            
                    <div>
                    <input class='inputField fullWidthField' type='text' name='Email_Address' placeholder='Email Address' value='{$this->_registerModel->getUserModel()->getEmailaddress()}'/>
                    <br/>
                    <input class='inputField fullWidthField' type='text' name='Confirm_Email_Address' placeholder='Confirm Email Address'/>
                    </div>                   
                
                    <div class='twoFields'>
                        <input class='inputField' type='password' name='Password' placeholder='Password'/>
                        <input class='inputField' type='password' name='Confirm_Password' placeholder='Confirm Password'/>
                    </div>            
            
                    <input type='hidden' name='token' value='$tokenValue'/>
                    <input class='submitButton' type='submit' name='Register' value='Register' />
                </form>
            </div>
            ";
        }
    }