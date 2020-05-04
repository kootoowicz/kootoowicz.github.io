<?php
/**
 * Author: Kotowicz 17018747
 */
require_once 'Core/init.php';
Session::put('previousPage', 'topic.php');
$categoryName = $_GET['category'];
$userMapper = new UserMapper();
$topicMapper = new TopicMapper($userMapper);
$categoryMapper = new CategoryMapper();
$categoryModel = $categoryMapper->loadCategoryByName($categoryName);
$categoryController = new CategoryController($categoryModel, $categoryName, $categoryMapper);
$categoryView = new CategoryView($categoryModel, $categoryController);

$categoryController->createTopic();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="CSS/style.css">
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

<div class="wrapper">
    <h2 class="categoryTitle"><?php echo $categoryName ?></h2>
    <main>
        <?php echo $categoryView->displayCreateTopicButton(); ?>
        <!-- General Forum Section -->
        <section class="box">
            <!-- Section Title -->
            <div class="sectionTitle">[1]</div>
            <!-- General Section -->
            <?php echo $categoryView->displayTopics(); ?>
        </section>
    </main>
</div>
</body>
</html>