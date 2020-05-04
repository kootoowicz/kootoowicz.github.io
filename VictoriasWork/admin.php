<?php
include_once 'includes/dbh.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home Page</title>
    <link rel="stylesheet" type="text/css" href="index.css"><!-- links the html page with the stylesheet(css) -->
    <meta name="viewport" content="width=device-width, maximum-scale=1.0"/>
</head>
<div>
    <header>
        <h1>Northumbria Computer Science Tutorials</h1>
    </header>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li><!-- link to the homepage -->
            <li><a href="tutorials.php">Tutorials</a></li><!-- link to the tutorials page -->
            <li><a href="myprofile.php">My Profile</a></li><!-- link to the profile page -->
            <li><a href="forum.php">The Forum</a></li><!-- link to the forum page -->
            <li><a href="admin.php">Admin</a></li><!-- link to the admin page -->
        </ul>
    </nav>
    <div class="adminMain">
        <h2>Admin Log In</h2> <!-- Title of page -->
        <p>If you are an admin of Northumbria Computer Science Tutorials, log in below to access your account.</p>
        <button>Log In</button>
    </div>
</div>
</body>
</html>