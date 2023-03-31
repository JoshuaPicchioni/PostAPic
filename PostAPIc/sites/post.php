<?php
    if (isset($_POST['submit'])) {
        if (isset($_FILES['image']) && $_FILES['image']['error'] == 0 && $_POST['tag1']) {
            // check if file types are allowed
            $allowed = array('image/jpeg', 'image/jpg', 'image/png', 'image/gif');
            $detectedType = finfo_open(FILEINFO_MIME_TYPE);
            $filename = $_FILES['image']['tmp_name'];
            $mimeType = finfo_file($detectedType, $filename);
            if (!in_array($mimeType, $allowed)) {
                echo "Error: File type is not allowed";
                exit;
            }
            $imgType = $_FILES['image']['type'];
            
            // image is saved as a longblob in the database
            $image = file_get_contents($_FILES['image']['tmp_name']);
            $image = base64_encode($image);

            // connect to the mysql database
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

            // sql to insert photo and tags
            $sql = "INSERT INTO photo (image, imagetype) VALUES ('$image', '$imgType')";

            // executing sql query
            $result = mysqli_query($conn, $sql);

            // get the id of the photo that was just inserted
            $photoId = mysqli_insert_id($conn);

            if (!$photoId) {
                echo "Error: Photo was not inserted";
                exit;
            }

            // sql to insert tags
            $sql = "INSERT INTO tag (photoId, tag1, tag2, tag3, tag4, tag5) VALUES ('$photoId', '" . $_POST['tag1'] . "', '" . $_POST['tag2'] . "', '" . $_POST['tag3'] . "', '" . $_POST['tag4'] . "', '" . $_POST['tag5'] . "')";

            // executing sql query
            $result = mysqli_query($conn, $sql);

            if (!$result) {
                echo "Error: Tag was not inserted";
                exit;
            }


        }

        // start session
        session_start();
        $_SESSION['message'] = "Photo uploaded successfully";
        header("Location: explore.php");
        exit();


        
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post A Pic</title>
    <link rel="stylesheet" href="../css/stylesheet.css">
</head>
<body>
    <header>
        <div class="brand"><a href="homepage.php">Post A Pic</a></div>

        <nav>
            <ul>
                <li><a href="#">Post</a></li>
                <li><a href="explore.php">Explore</a></li>
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
        <div class="post">
            <form action="post.php" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
                <input type="file" name="image" accept=".jpg, .jpeg, .png, .gif">
                <input type="text" name="tag1" placeholder="Tag 1">
                <input type="text" name="tag2" placeholder="Tag 2">
                <input type="text" name="tag3" placeholder="Tag 3">
                <input type="text" name="tag4" placeholder="Tag 4">
                <input type="text" name="tag5" placeholder="Tag 5">
                <button type="submit" name="submit">Post</button>
            </form>
        </div>
    </main>
    <script>
        function validateForm() {
            var x = document.forms["myForm"]["image"].value;
            if (x == "") {
                alert("Name must be filled out");
                return false;
            }
            var x = document.forms["myForm"]["tag1"].value;
            if (x == "") {
                alert("Name must be filled out");
                return false;
            }
        }
    </script>
</body>
</html>
