<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post A Pic</title>
    <link rel="stylesheet" href="../css/stylesheet.css">
    <style>
        body,
        html {
            height: 100%;
            scroll-behavior: smooth;
        }

        .greeting-container {
            /* center box in middle of screen */
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            border-radius: 5px;
            height: 400px;
            width: 400px;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .bg-image {
            background-image: url('../images/background.jpg');
            height: 100%;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            position: asbolute;
        }

        .welcome-text {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            font-family: Arial, Helvetica, sans-serif;
            text-align: center;
        }

        h1 {
            font-size: 48px;
            margin-bottom: 10px;
        }

        p {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .button {
            display: inline-block;
            background-color: rgba(0, 0, 0, 0.7);
            color: white;
            padding: 10px 30px;
            text-decoration: none;
            font-size: 18px;
            border-radius: 5px;
            cursor: pointer;
        }

        .button:hover {
            background-color: rgba(0, 0, 0, 0.9);
        }

        /* Additions */
        .learn-more {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 50px;
            background-color: #f8f8f8;
            /* Light gray background */
        }

        .learn-more h2 {
            font-size: 36px;
            margin-bottom: 30px;
        }

        .learn-more p {
            font-size: 18px;
            max-width: 800px;
            text-align: center;
            margin-bottom: 20px;
        }

        .learn-more img {
            max-width: 100%;
            height: auto;
            margin-bottom: 20px;
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
        <div class="brand"><a href="#">Post A Pic</a></div>

        <nav>
            <ul>
                <li><a href="post.php">Post</a></li>
                <li><a href="explore.php">Explore</a></li>
                <li><a href="search.php">Search</a></li>
                <li><a href="index.php">Sign Out</a></li>
            </ul>
        </nav>
    </header>
    <div class="bg-image" id="top"></div>
    <main>
        <!-- beautiful welcome page -->
        <div class="greeting-container">
            <div class="welcome-text">
                <h1>Welcome to Our Website!</h1>
                <p>Discover more about us and our services</p>
                <a href="#explore-btn" class="button">Learn More</a>
            </div>
        </div>
        <div id="learn-more" class="learn-more">
            <h2>About Us</h2>
            <img src="../images/nature-7.jpg" alt="About us image">
            <p>
                Joshua Picchioni - 110035605
            </p>
            <p>
                Carter Buck - 110008178
            </p>
            <p>
                Michael Joyce - 110035023
            </p>
            <p>
                Jashanpreet Singh - 110024157
            </p>
            <p>
                Post A Pic is a platform where users can share their beautiful images and discover amazing content from others. Our mission is to inspire creativity and help people connect through visual storytelling.
            </p>
            <p>
                We believe in the power of images to captivate, inspire, and bring people together. That's why we've created a safe and inclusive space where everyone can share their perspective and appreciate the world through the lens of others.
            </p>

            <!-- button to explore page -->
            <a id="explore-btn" href="explore.php" class="button">Explore</a>
        </div>
        <a id="to-top-btn" href="#" class="btt"> <i class="chevron-btn"></i> </a>

    </main>
</body>

</html>