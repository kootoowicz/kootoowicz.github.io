<?php


class UserProfileController
{
    private UserProfileModel $_userProfileModel;
    private UserMapper $_userMapper;

    /**
     * UserProfileController constructor.
     * @param UserProfileModel $_userProfileModel
     * @param UserMapper $_userMapper
     */
    public function __construct(UserProfileModel $_userProfileModel, UserMapper $_userMapper)
    {
        $this->_userProfileModel = $_userProfileModel;
        $this->_userMapper = $_userMapper;
    }


    public function updateUserDetails()
    {
        if(!empty($_POST["updateDetails"]))
        {
            $id = $this->_userProfileModel->getUser()->getId();
            $password = Input::get('oldPassword');
            if($this->_userMapper->validatePasword($id, $password))
            {
                $validate = $this->validateForm();

                if ($validate->succeeded())
                {
                    if($this->uploadPhoto())
                    {
                        $forename = Input::get('Forename');
                        $surname = Input::get('Surname');
                        $emailAddress = Input::get('Email_Address');
                        $password = password_hash(Input::get('Password'), PASSWORD_DEFAULT);
                        $this->_userProfileModel->getUser()->setForename($forename);
                        $this->_userProfileModel->getUser()->setSurname($surname);
                        $this->_userProfileModel->getUser()->setEmailaddress($emailAddress);

                        if($this->_userProfileModel->updateUser($password))
                        {
                            echo "Details updated!";
                        }
                        else
                        {
                            echo "Updating details failed!";
                        }
                    }
                }
                else
                {
                    foreach ($validate->getErrors() as $error)
                        echo $error, '<br/>';
                }
            }
            else
            {
                echo "Invalid Password";
            }
        }
    }

    private function uploadPhoto() : bool
    {
        $photo = $_FILES['photo'];
        $fileName = $photo['name'];
        $fileTmpName = $photo['tmp_name'];
        $fileSize = $photo['size'];
        $fileError = $photo['error'];

        $fileExtension = explode('.', $fileName);
        $fileActualExtension = strtolower(end($fileExtension));

        $allowed = array('jpg', 'jpeg', 'png');

        if(in_array($fileActualExtension, $allowed))
        {
            if($fileError === 0)
            {
                if($fileSize < 1000000)
                {
                    $newFileName = uniqid('', true). ".".$fileActualExtension;
                    $fileDestination = 'Images/'.$newFileName;
                    move_uploaded_file($fileTmpName, $fileDestination);
                    $this->_userProfileModel->getUser()->setPhotoName($newFileName);
                    return true;
                }
                else
                {
                    echo "Your file is too big!";
                    return false;
                }
            }
            else
            {
                echo "There was an error uploading your file!";
                return false;
            }
        }
        else
        {
            echo "You cannot upload files of this type!";
            return false;
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