<?php
/**
 * Author: Kotowicz 17018747
 */
require_once 'Core/init.php';

$userMapper = new UserMapper();
$user = UserModel::getLoggedInUser();
$userProfileModel = new UserProfileModel($user, $userMapper);
$userProfileController = new UserProfileController($userProfileModel, $userMapper);
$userProfileView = new UserProfileView($userProfileModel, $userProfileController);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="CSS/form.css">
    <meta charset="UTF-8">
    <title>Forum</title>
</head>
<body>
<header>
    <h1 class="headerTitle">Northumbria Computer Science Tutorials Forum</h1>
    <nav class="menu">
        <?php
        echo CommonViewElements::showNavigation();
        ?>
    </nav>

    <div class="wrapper">
        <main>

            <?php
                $userProfileController->updateUserDetails();
                echo $userProfileView->displayUpdateDetailsForm();
                ?>
        </main>
    </div>
</header>
</body>
</html>