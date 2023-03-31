<?php
// start session
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explore</title>
    <link rel="stylesheet" href="../css/stylesheet.css">
    <style>

        html, body {
            scroll-behavior: smooth;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            grid-gap: 20px;
            padding: 20px;
            align-items: center;
            justify-items: center;
        }

        .grid img {
            max-width: 100%;
            height: auto;
            object-fit: cover;
            width: 300px;
            height: 300px;
        }

        .message {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            text-align: center;
            font-size: 20px;
            margin-bottom: 10px;
        }

        #to-top-btn {
            font-family: sans-serif;

            font-size: 16px;
            overflow-wrap: break-word;
            --sqs-site-gutter: 3vw;
            --sqs-mobile-site-gutter: 6vw;
            --sqs-site-max-width: 1200px;
            cursor: pointer;
            color: inherit;
            text-decoration: none;
            --offset: 1vw;
            place-self: end;
            margin-top: calc(100vh + var(--offset));
            display: block;
            position: fixed;
            z-index: 1000;
            width: 60px;
            height: 60px;
            right: 30px;
            bottom: 30px;
            background: #5caafc;
            border-radius: 50px;
            box-shadow: 3px 3px 10px rgba(23, 25, 25, 0.2);
            transition: transform 0.3s ease-in-out;
        }

        .chevron-btn {
            font-family: sans-serif;

            font-size: 16px;
            overflow-wrap: break-word;
            --sqs-site-gutter: 3vw;
            --sqs-mobile-site-gutter: 6vw;
            --sqs-site-max-width: 1200px;
            cursor: pointer;
            --offset: 1vw;
            color: rgba(0, 0, 0, 0);
            position: relative;
            height: 100%;
            top: 40%;
            left: 37%;
            transform: translate(-100%, -10%);
        }

        a.btt i::before {
            color: white;
        }

        .chevron-btn::before {
            border-style: solid;
            border-width: 0.25em 0.25em 0 0;
            content: '';
            display: inline-block;
            height: 0.70em;
            width: 0.70em;
            top: 0.15em;
            position: relative;
            transform: rotate(-45deg);
            vertical-align: top;
        }
    </style>
</head>

<body>
    <header>
        <div class="brand"><a href="homepage.php">Post A Pic</a></div>

        <nav>
            <ul>
                <li><a href="post.php">Post</a></li>
                <li><a href="#">Explore</a></li>
                <li>
                    <form class="search-form" action="#" method="get">
                        <input type="text" name="search" placeholder="Search">
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </li>
                <li><a href="index.php">Sign Out</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <?php
        // check if the message variable in session is set
        if (isset($_SESSION['message'])) {
            // if it is, display the message
            echo "<div class='message'>" . $_SESSION['message'] . "</div>";
            // then unset the message variable
            unset($_SESSION['message']);

            // add javascript to remove the message from the page after 3 seconds
            echo "<script>setTimeout(function() { document.querySelector('.message').style.display = 'none'; }, 3000);</script>";
        }
        ?>
        <div class="grid">
            <!-- <img src="../images/nature-1.jpg" alt="Nature 1">
            <img src="../images/nature-2.jpg" alt="Nature 2">
            <img src="../images/nature-3.jpg" alt="Nature 3">
            <img src="../images/nature-4.jpg" alt="Nature 4">
            <img src="../images/nature-5.jpg" alt="Nature 5">
            <img src="../images/nature-6.jpg" alt="Nature 6"> -->
            <?php

            // connect to the mysql database and get the photos and tags

            $servername = getenv("DB_HOST") ? getenv("DB_HOST") : "localhost"; // REPLACE with Database host, usually localhost

            if (getenv("DB_HOST")) {
                $servername = getenv("DB_HOST");
                $dbname = "postdb";
                $dbuser = "postdb";
            } else {
                $servername = "localhost";
                $dbname = "picchioj_postdb";
                $dbuser = "picchioj_postdb";
            }

            $dbpass = "secret";

            // Create connection
            $conn = new mysqli($servername, $dbuser, $dbpass, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // sql to get photos and tags
            $sql = "SELECT * FROM photo, tag WHERE photo.id = tag.photoId";

            // executing sql query
            $result = mysqli_query($conn, $sql);

            // for each photo, display the photo and the tags
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<div>";
                // detect image type
                if ($row['imagetype'] == "image/jpeg") {
                    echo "<img src='data:image/jpeg;base64," . $row['image'] . "' alt='" . $row['tag1'] . " " . $row['tag2'] . " " . $row['tag3'] . " " . $row['tag4'] . " " . $row['tag5'] . "'>";
                } else if ($row['imagetype'] == "image/png") {
                    echo "<img src='data:image/png;base64," . $row['image'] . "' alt='" . $row['tag1'] . " " . $row['tag2'] . " " . $row['tag3'] . " " . $row['tag4'] . " " . $row['tag5'] . "'>";
                } else if ($row['imagetype'] == "image/gif") {
                    echo "<img src='data:image/gif;base64," . $row['image'] . "' alt='" . $row['tag1'] . " " . $row['tag2'] . " " . $row['tag3'] . " " . $row['tag4'] . " " . $row['tag5'] . "'>";
                } else {
                    echo "<img src='data:image/jpeg;base64," . $row['image'] . "' alt='" . $row['tag1'] . " " . $row['tag2'] . " " . $row['tag3'] . " " . $row['tag4'] . " " . $row['tag5'] . "'>";
                }
                // echo "<img src='data:image/jpeg;base64," . base64_encode($row['image']) . "' alt='" . $row['tag1'] . " " . $row['tag2'] . " " . $row['tag3'] . " " . $row['tag4'] . " " . $row['tag5'] . "'>";
                echo "<p>" . $row['tag1'] . " " . $row['tag2'] . " " . $row['tag3'] . " " . $row['tag4'] . " " . $row['tag5'] . "</p>";
                echo "</div>";
            }


            ?>
        </div>
        <a id="to-top-btn"href="#" class="btt"> <i class="chevron-btn"></i> </a>
    </main>
</body>

</html>