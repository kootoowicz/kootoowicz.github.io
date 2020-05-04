<?php
/**
 * Author: Kotowicz 17018747
 */
require_once 'Core/init.php';

$userMapper = new UserMapper();
$userModel = new UserModel();
$registerModel = new RegisterModel($userModel, $userMapper);
$registerController = new RegisterController($registerModel, $userMapper);
$registerView = new RegisterView($registerModel, $registerController);

$registerController->registerFormSubmitted();
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
</header>
<?php
echo $registerView->showRegisterForm();
?>
</body>
</html>