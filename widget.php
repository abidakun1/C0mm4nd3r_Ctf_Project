<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>IP Ping Tool</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f2f2f2;
            border: 1px solid #dddddd;
            border-radius: 5px;
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

        input[type="text"] {
            margin-bottom: 10px;
            width: 100%;
            padding: 5px;
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

        .result {
            margin-top: 20px;
            background-color: #ffffff;
            border: 1px solid #dddddd;
            border-radius: 5px;
            padding: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>IP Ping Tool</h2>
        <form method="POST">
            <label for="ip">IP Address:</label>
            <input type="text" id="ip" name="ip" placeholder="Enter IP Address" required>
            <input type="submit" value="Ping">
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $ip = $_POST["ip"];

            if (!empty($ip)) {
                $output = shell_exec("ping -c 4 $ip");

                echo '<div class="result">';
                echo '<pre>' . $output . '</pre>';
                echo '</div>';
            }
        }
        ?>
    </div>
</body>
</html>
