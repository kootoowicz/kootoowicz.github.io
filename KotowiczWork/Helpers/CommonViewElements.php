<?php
/**
 * Author: Kotowicz 17018747
 */

require_once 'Core/init.php';

class CommonViewElements
{
    public static function showNavigation()
    {
        $user = new UserModel();

        if(Session::exists('loggedInUser'))
            $user = $_SESSION['loggedInUser'];

        $nav = "
        <ul class='main'>
            <li><a href='forum.php'>Home</a></li>
            <li><a href='../VictoriasWork/index.php'>Tutorials</a></li>
        </ul>

        <ul class='signup'>";

            if(!$user->isLoggedIn())
            {

                $nav .= " <li><a href='login.php'>Login</a></li>
                          <li><a href='register.php'>Register</a></li>";

            }
            else
            {
                $nav .= "<li><a href='profile.php'>Profile</a></li>
                         <li><a href='logout.php'>Logout</a></li>";
            }

        $nav .=  "   
            </ul>
        ";
        return $nav;
    }
}