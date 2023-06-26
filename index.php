<!-- HTML -->
<!DOCTYPE html>
<html>

<head>
    <title>QR Code Generator and Scanner</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #1a1a1a;
            color: #fff;
            margin: 0;
            padding: 0;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .button {
            display: inline-block;
            padding: 15px 30px;
            margin: 20px;
            font-size: 18px;
            font-weight: bold;
            text-decoration: none;
            color: #fff;
            background-color: #4CAF50;
            border-radius: 4px;
            transition: background-color 0.3s ease;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .button:hover {
            background-color: #45a049;
        }

        h1 {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <div>
            <h1>QR Code Generator and Scanner</h1>
            <a href="qr_code.php" class="button">Generate QR Code</a>
            <a href="qr_decode.php" class="button">Scan QR Code</a>
        </div>
    </div>
</body>

</html>