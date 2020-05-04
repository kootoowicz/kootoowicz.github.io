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
<body>
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

    <table class="myprofileMain">
        <tr>
            <th>Tutorial</th>
            <th>Description</th>
            <th>Date Completed</th>
            <th>Grade</th>
        </tr>
        <?php
        $sql = "SELECT moduleTitle, moduleDesc, grade, dateComp
                FROM modules INNER JOIN stud_modgrade
                ON modules.moduleCode = stud_modgrade.moduleCode
                WHERE studentCode='s004327';";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);

        if ($resultCheck > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                        echo "<td> ". $row['moduleTitle'] . "</td>";
                        echo "<td> ". $row['moduleDesc'] . "</td>";
                        echo "<td> ". $row['dateComp'] . "</td>";
                        echo "<td> ". $row['grade'] . "</td>";
                        echo "</tr>";
            }
            echo "</table>";
        }
        else {
            echo "0 results";
        }
        ?>

    </table>
</body>
</html>