<?php
/**
 * Author: Kotowicz 17018747
 */
require_once 'Core/init.php';

$user = $_SESSION['loggedInUser'];

$user->logout();
Redirect::redirectTo('login.php');

