<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <style>
        body {
            background-color: #f2f2f2;
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border: 1px solid #dddddd;
            border-radius: 5px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        input[type="file"] {
            margin-bottom: 10px;
        }

        input[type="submit"] {
            display: block;
            margin: 0 auto;
            background-color: #4caf50;
            color: white;
            border: none;
            border-radius: 4px;
            padding: 10px 20px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        // Check if the form was submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Check if file was uploaded without errors
            if (isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0) {
                $allowed = array(
                    "php" => "application/x-php",
                    "jpg" => "image/jpg",
                    "jpeg" => "image/jpeg",
                    "gif" => "image/gif",
                    "png" => "image/png"
                );

                $filename = $_FILES["photo"]["name"];
                $filetype = $_FILES["photo"]["type"];
                $filesize = $_FILES["photo"]["size"];

                // Verify file extension
                $ext = pathinfo($filename, PATHINFO_EXTENSION);
                if (!array_key_exists($ext, $allowed)) {
                    echo '<p class="error">Error: Please select a valid file format.</p>';
                }

                // Verify file size - 5MB maximum
                $maxsize = 5 * 1024 * 1024;
                if ($filesize > $maxsize) {
                    echo '<p class="error">Error: File size is larger than the allowed limit.</p>';
                }

                // Verify MIME type of the file
                if (in_array($filetype, $allowed)) {
                    // Check whether file exists before uploading it
                    if (file_exists("images/" . $filename)) {
                        echo '<p class="error">' . $filename . ' already exists.</p>';
                    } else {
                        move_uploaded_file($_FILES["photo"]["tmp_name"], "/var/www/html/images/" . $filename);
                        echo '<p class="success">Your file was uploaded successfully.</p>';
                    }
                } else {
                    echo '<p class="error">Error: There was a problem uploading your file. Please try again.</p>';
                }
            } else {
                echo '<p class="error">Error: ' . $_FILES["photo"]["error"] . '</p>';
            }
        }
        ?>
    </div>
</body>
</html>
