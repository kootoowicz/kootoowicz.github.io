<?php
/**
 * Author: Kotowicz 17018747
 */
require_once 'Core/init.php';

$userMapper = new UserMapper();
$topicMapper = new TopicMapper($userMapper);


if(isset($_GET['topicId']))
{
    $topicId = $_GET['topicId'];
    $topicModel = $topicMapper->loadTopicById($topicId);
    $topicModel->setTopicMapper($topicMapper);
    $topicController = new TopicController($topicModel);
    $topicController->setCurrentViewName('displayTopic');
}
else
{
    $categoryId = Session::get('currentCategoryId');
    $user = UserModel::getLoggedInUser();
    $topicModel = new TopicModel($categoryId, $user);
    $topicModel->setTopicMapper($topicMapper);
    $topicController = new TopicController($topicModel);
    $topicController->setCurrentViewName('displayCreateTopicForm');
}

$topicView = new TopicView($topicModel, $topicController);
$topicController->submitPost();
$topicController->submitTopic();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="CSS/form.css">
    <link rel="stylesheet" href="CSS/topic.css">
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
<main>
        <?php
            echo $topicView->displayCurrentView();
            echo $topicView->displayCreatePostForm();
            echo $topicView->displayQuotePostForm();
        ?>

</main>
</div>
</body>
</html>
