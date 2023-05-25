<?php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true)
{
    header("location: logint.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to XYZ university</title>
    <link rel="stylesheet" href="stylewelcome.css">
</head>

<body>
    <section class="background">
        <div class="xyz">
            <div class="container">
                <h1>XYZ University</h1>
            </div>
            <div class="about">
                <div class="cont2">
                    <h3><?php echo "Welcome ". $_SESSION['name']?>,welcome to xyz universty</h3>
                    <p>XYZ University is one of the most prestigious and renowned institutions of higher education in
                        the
                        world.
                        Founded in the 12th century, it has a long and distinguished history that has been shaped by
                        countless
                        scholars, scientists, artists, and thinkers over the centuries. <br>

                        Located in the city of XYZ, in south-east England, the university is made up of 38 individual
                        colleges,
                        each
                        with its own distinct history and culture. Despite this, the colleges work together closely to
                        provide a
                        complete academic experience for all students, from undergraduate to postgraduate level. <br>
                        <br>

                        XYZ is a truly global institution, with students and staff from more than 150 countries around
                        the
                        world.
                        This diversity is one of our greatest strengths, as it enables us to create a rich and dynamic
                        learning
                        environment where different perspectives and ideas are valued and celebrated.At XYZ, we are
                        committed to
                        providing our students with a world-class education that prepares them for success in whatever
                        path
                        they
                        choose to follow. Our courses are designed to challenge and inspire, giving students the
                        opportunity
                        to
                        explore their chosen subjects in depth and to develop their critical thinking,creativity, and
                        intellectual curiosity.One of the key features of a XYZ education is the tutorial system, which
                        provides
                        students with regular one-on-one or small-group sessions with expert tutors. This personalized
                        approach
                        enables students to engage in rigorous academic discussion and debate, to receive detailed
                        feedback
                        on
                        their work, and to develop the skills needed to succeed at the highest level. <br> <br>

                        In addition to our academic excellence, XYZ is also renowned for its research, which spans a
                        wide
                        range
                        of
                        fields, from science and medicine to the humanities and social sciences. Our researchers are at
                        the
                        forefront of their respective fields, tackling some of the world's most pressing challenges and
                        pushing
                        the
                        boundaries of human knowledge and understanding. <br> <br>

                        XYZ is also home to some of the world's most renowned libraries, museums, and research
                        facilities,
                        which
                        provide students and researchers with access to a wealth of resources and expertise. The XYZ
                        Library,
                        for
                        example, is one of the oldest and largest libraries in Europe, containing over 13 million books
                        and
                        manuscripts, while the XYZ Museum houses a world-renowned collection of art and artifacts. <br>
                        <br>

                        Beyond our academic and research excellence, XYZ is also known for its vibrant extracurricular
                        scene,
                        which
                        offers a wide range of activities and events to suit all interests and passions. From sports and
                        music
                        to
                        theater and debate, there is something for everyone here at XYZ, and students are encouraged to
                        get
                        involved
                        and pursue their interests outside of the classroom. <br> <br>

                        Of course, being part of such a prestigious institution comes with high standards and
                        expectations,
                        and
                        XYZ
                        students are known for their academic rigor, hard work, and dedication. However, the rewards are
                        also
                        great,
                        as a degree from XYZ is highly respected and sought after by employers around the world, and our
                        graduates
                        go on to excel in a wide range of fields and professions. <br> <br>

                        At XYZ, we are proud of our history, our achievements, and our global reputation, but we are
                        also
                        always
                        looking to the future. We are committed to ensuring that our institution remains at the
                        forefront of
                        academic excellence and innovation, and that we continue to attract the brightest and most
                        talented
                        students
                        and researchers from around the world. <br> <br>

                        Whether you are a prospective student, a researcher, or simply interested in learning more about
                        our
                        institution, we invite you to explore our website, to discover the many opportunities and
                        resources
                        available at XYZ, and to join us in our mission to make a positive impact on the world.
                    </p>
                </div>
            </div>
            <button><a href="Lo.php">Logout</a></button>
        </div>
    </section>
</body>

</html>