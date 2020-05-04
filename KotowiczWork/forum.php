<?php
/**
 * Author: Kotowicz 17018747
 */
    require_once 'Core/init.php';

    Session::put('previousPage', 'forum.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="CSS/style.css">
    <meta charset="UTF-8">
    <title>Northumbria Computer Science Tutorials Forum</title>
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

        <section class="box">

            <div class="sectionTitle">General Forums</div>

            <section class="specificSection">
                <div class="sectionHeader">
                    <a href="category.php?category=General">General</a>
                </div>
                <div class="sectionDescription">
                    Discuss Tutorials
                </div>
            </section>

            <section class="specificSection">
                <div class="sectionHeader">
                    <a href="category.php?category=Suggestions">Suggestions</a>
                </div>
                <div class="sectionDescription">
                    How Tutorials can be improved.
                </div>
            </section>


            <section class="specificSection">
                <div class="sectionHeader">
                    <a href="category.php?category=Critiques">Critiques</a>
                </div>
                <div class="sectionDescription">
                    Constructive criticism on the tutorials.
                </div>
            </section>
        </section>


        <section class="box">
            <div class="sectionTitle">HTML/CSS Forums</div>

            <section class="specificSection">
                <div class="sectionHeader">
                    <a href="category.php?category=HTML">HTML</a>
                </div>
                <div class="sectionDescription">
                    Issues related to Hyper-Text-Markup-Language (HTML)
                </div>
            </section>


            <section class="specificSection">
                <div class="sectionHeader">
                    <a href="category.php?category=CSS">CSS</a>
                </div>
                <div class="sectionDescription">
                    Issues related to styling with Cascading Style Sheets (CSS)
                </div>
            </section>
        </section>

        <section class="box">
            <div class="sectionTitle">Scripting Forums</div>

            <section class="specificSection">
                <div class="sectionHeader">
                    <a href="category.php?category=JavaScript">JavaScript</a>
                </div>
                <div class="sectionDescription">
                    Issues related to programming with JavaScript.
                </div>
            </section>


            <section class="specificSection">
                <div class="sectionHeader">
                    <a href="category.php?category=PHP">PHP</a>
                </div>
                <div class="sectionDescription">
                    Issues related to programming with Hypertext Processor (PHP)
                </div>
            </section>
        </section>
    </main>
</div>
</body>
</html>
