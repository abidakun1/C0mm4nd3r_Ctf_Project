<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>File Upload Form</title>
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
        <form action="upload-manager.php" method="post" enctype="multipart/form-data">
            <h2>Upload File</h2>
            <label for="fileSelect">Select File:</label>
            <input type="file" name="photo" id="fileSelect">
            <input type="submit" name="submit" value="Upload">
        </form>
    </div>
</body>
</html>
