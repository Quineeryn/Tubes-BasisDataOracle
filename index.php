<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Penyewa</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            background: linear-gradient(45deg, #ff6b6b, #3b5998);
        }

        .container {
            text-align: center;
            background-color: #fff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            color: #333;
        }

        h1 {
            font-size: 2.5em;
            margin-bottom: 20px;
            color: #333;
        }

        p {
            font-size: 1.2em;
            color: #555;
            margin-bottom: 30px;
        }

        a {
            text-decoration: none;
            padding: 15px 30px;
            margin: 15px;
            border-radius: 6px;
            font-weight: bold;
            letter-spacing: 1px;
            display: inline-block;
            transition: background-color 0.3s ease, transform 0.2s ease;
            background-color: #3498db;
            color: #fff;
        }

        a:hover {
            background-color: #2980b9;
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Selamat Datang di Aplikasi Penyewa Asisten Rumah Tangga</h1>
        <p>Pilih tindakan yang ingin Anda lakukan:</p>
        <a href="ociconnect.php">Lihat Data Penyewa</a>
        <a href="form_insert.html">Insert Data Penyewa</a>
    </div>
</body>
</html>
