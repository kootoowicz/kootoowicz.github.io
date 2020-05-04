<?php
/**
 * Author: Kotowicz 17018747
 */
require_once 'Core/init.php';

$userMapper = new UserMapper();
$loginModel = new LoginModel($userMapper);
$loginController = new LoginController($loginModel);
$loginView = new LoginView($loginModel, $loginController);

$loginController->loginFormSubmitted();

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
echo $loginView->showLoginForm();
?>
</body>
</html>


