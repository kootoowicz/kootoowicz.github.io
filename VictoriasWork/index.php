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
        <li><a href="../RyansWork/indexExercises.html">Tutorials</a></li><!-- link to the tutorials page -->
        <li><a href="myprofile.php">My Profile</a></li><!-- link to the profile page -->
        <li><a href="../KotowiczWork/forum.php">The Forum</a></li><!-- link to the forum page -->
        <li><a href="admin.php">Admin</a></li><!-- link to the admin page -->
    </ul>
</nav>
<div id="wrapper">
<main>

    <article>
        <h2>Home</h2>
        <p>Welcome to Northumbria Computer Science Tutorials!
We are dedicated to giving you easy-to-understand tutorials on all things computer science.
We offer an ever-increasing range of lessons and quizzes on topics across the Northumbria Unversity syllabus.</p>
        <h3>Specific Assignment Help...</h3>
        <p>As it stands, Northumbria Computer Science Tutorials does not offer help with specific assignments to stay in
            accordance with University guidlines but we hope you find the website of great use for consolidating and
                                                                                                   revising knowledge!.</p>
    </article>

    <article>
        <h3>Who can you learn from?</h3>
        <p>
Northumbria Computer Science Tutorials is run by third year students from a mixture of pathways, have a scroll to see what we offer!
Whether you're looking for extra help with that particularly tricky seminar you had, or revise a whole module,
            we have all you need.
        </p>
        <div class="bigSection">
            <section class="smallSection">
                <h3>Our Pure Comp Sci Expert</h3>
                <button>See their tutorials...</button>
                <img src="CompSci.jpg" class="autoImage" alt="Comp Sci"/><!-- image -->
            </section>
            <section class="smallSection">
                <h3>Our Animation Expert</h3>
                <button>See their tutorials...</button>
                <img src="animation.jpg" class="autoImage" alt="Animation"><!-- image -->
            </section>
            <section class="smallSection">
                <h3>Our Web Expert</h3>
                <button>See their tutorials...</button>
                <img src="web.jpg" class="autoImage" alt="Web"/><!-- image -->
            </section>
            <section class="smallSection">
                <h3>Our A.I. Expert</h3>
                <button>See their tutorials...</button>
                <img src="AI.jpg" class="autoImage" alt="AI"/><!-- image -->
            </section>
            <section class="smallSection">
                <h3>Our Games Expert</h3>
                <button>See their tutorials...</button>
                <img src="Games.jpg" class="autoImage" alt="Games"/><!-- image -->
            </section>
        </div>
    </article>

    <article>
        <section>
            <h4>The Forum</h4>
            <p>Northumbria Computer Science Tutorials also provides an online forum where you can connect with other
            like-minded students. Everyone is free to ask and answer questions, share interesting news and meet new people.
            We do ask, however, not to share your own or other people's personal information in the forum.</p>
            <section class="bigSection">
            <section class="smallSection">
            <button>Take me to the Forum!</button>
            </section>
            </section>
               <img src="forum.jpg" class="rowImage" alt="Forum"/><!-- image -->
        </section>
    </article>
    <article>
        <section class="bigSection">
            <section class="mediumSection">
                <button>First Year Help</button>
                <p>Click above to see the many tutorials and quizzes aimed at first year students.</p>
            </section>
            <section class="mediumSection">
                <button>Second Year Help</button>
                <p>Click above to see the many tutorials and quizzes aimed at second year students.</p>
            </section>
            <section class="mediumSection">
                <button>Third Year Help</button>
                <p>Click above to see the many tutorials and quizzes aimed at third year students.</p>
            </section>
        </section>
    </article>



</main>

<aside>
    <h3>Reviews...</h3>
        <h3>9/10</h3>
            <p>Victoria, Second Year: The tutorials are super helpful for recapping work!</p>
            <img src="v.jpg" class="autoImage" alt="Victoria"/><!-- image -->
        <h3>7/10</h3>
            <p>Ryan, Third year: I used the quizzes to highlight any problem areas before exams... worked a treat.</p>
            <img src="r.jpg" class="autoImage" alt="Ryan"/><!-- image -->
        <h3>8/10</h3>
            <p>Jordan, Post-Grad: Needed to go over some first year work that I no longer had access to, Northumbria Computer Science Tutorials really helped!</p>
            <img src="j.jpg" class="autoImage" alt="Jordan"/><!-- image -->
        <h3>9/10</h3>
            <p>Przemyslaw, First Year: I couldn't find my way around the campus at first so I messaged in the forum and someone linked a map... really friendly.</p>
            <img src="p.jpg" class="autoImage" alt="Przemyslaw"/><!-- image -->
</aside>

</div>

    <footer>
    <h2>Points to note...</h2>
    <p>Northumbria Computer Science Tutorials is not an official university website. It is run by students, for students.
        If you think there is a mistake or would like to see a tutorial on a new subject, please contact the admin/experts and not the univeristy.
        Any misconduct or going against university guidelines, will still be reported to the university.
        We hope that Northumbria Computer Science Tutorials is of help!</p>
    </footer>

</body>
</html>