<?php
include('./phpqrcode/qrlib.php');

// Function to generate and save the QR code
function generateQRCode($text, $filePath, $size)
{
    QRcode::png($text, $filePath, QR_ECLEVEL_L, $size);
}

// Check if the form is submitted
if (isset($_POST['generate'])) {
    $text = $_POST['text'];
    $filePath = 'qrcodes/qr_code.png';
    $size = 10; // QR code size

    generateQRCode($text, $filePath, $size);
}
?>

<!-- HTML -->
<!DOCTYPE html>
<html>

<head>
    <title>QR Code Generator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }

        h1 {
            color: #333;
            text-align: center;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .top-bar {
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .top-bar a {
            font-size: 16px;
            text-decoration: none;
            color: #333;
            padding: 5px 10px;
            background-color: #e0e0e0;
            border-radius: 4px;
        }

        form {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 10px;
        }

        button[type="submit"] {
            width: 100%;
            padding: 10px 20px;
            font-size: 16px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        h2 {
            color: #333;
            text-align: center;
            margin-bottom: 10px;
        }

        .qr-code-img {
            display: block;
            margin: 0 auto;
            max-width: 100%;
            height: auto;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="top-bar">
            <a href="index.php">Back</a>
            <h1>QR Code Generator</h1>
            <div></div>
        </div>

        <form method="POST" action="">
            <label for="text">Enter Text:</label>
            <input type="text" id="text" name="text" required>
            <button type="submit" name="generate">Generate QR Code</button>
        </form>

        <?php
        // Display the QR code if it exists
        if (isset($_POST['generate'])) {
            echo '<h2>Generated QR Code:</h2>';
            echo '<img src="' . $filePath . '" alt="QR Code" class="qr-code-img">';
        }
        ?>
    </div>
</body>

</html>