<?php


class UserProfileView
{
    private UserProfileModel $_userProfileModel;
    private UserProfileController $_userProfileController;

    /**
     * UserProfileView constructor.
     * @param UserProfileModel $_userProfileModel
     * @param UserProfileController $_userProfileController
     */
    public function __construct(UserProfileModel $_userProfileModel, UserProfileController $_userProfileController)
    {
        $this->_userProfileModel = $_userProfileModel;
        $this->_userProfileController = $_userProfileController;
    }

    public function displayUpdateDetailsForm() : string
    {
        return " <div class='formBorder'>

                <h1 class='title'>Edit your Account Details</h1>

                <form class='form' method='post' action='' enctype='multipart/form-data'>

                    <div class='twoFields'>
                        <input class='inputField' type='text' name='Forename' id='Forename' placeholder='New Forename' value='' />
                        <input class='inputField' type='text' name='Surname' id='Surname' placeholder='New Surname' value=''/>
                    </div>

                    <div>
                        <input class='inputField fullWidthField' type='text' name='Email_Address' placeholder='New Email Address' value=''/>
                        <br/>
                        <input class='inputField fullWidthField' type='text' name='Confirm_Email_Address' placeholder='Confirm New Email Address'/>
                    </div>

                    <input class='inputField fullWidthField' type='password' name='oldPassword' placeholder='Old Password'/>

                    <div class='twoFields'>
                        <input class='inputField' type='password' name='Password' placeholder='New Password'/>
                        <input class='inputField' type='password' name='Confirm_Password' placeholder='Confirm New Password'/>
                    </div>


                    <label class='profilePicUpload'>Upload Profile Picture: </label>
                    <br/>
                    <input class='profilePicUpload' type='file' name='photo'/>
                    <input class='submitButton' type='submit' name='updateDetails' value='Update Details' />
                </form>
            </div>";
    }
}