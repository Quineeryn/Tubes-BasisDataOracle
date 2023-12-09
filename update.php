<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data Penyewa</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(to right, #f0f0f0, #e6e6e6);
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        .container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            color: #333;
            max-width: 400px;
            width: 100%;
            padding: 20px;
        }

        h2 {
            font-size: 2em;
            margin-bottom: 20px;
            color: #333;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 8px;
            color: #333;
        }

        input {
            padding: 10px;
            margin-bottom: 16px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
        }

        button {
            padding: 12px;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            font-weight: bold;
            color: #fff;
            background-color: #3498db;
            cursor: pointer;
        }

        button:hover {
            background-color: #217dbb;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Update Data Penyewa</h2>
        <?php
        include 'koneksi.php';

        if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
            $idToUpdate = $_GET['id'];

            $sqlSelect = "SELECT id_penyewa, nama_penyewa, email, password FROM penyewa WHERE id_penyewa = :idToUpdate";
            $stidSelect = oci_parse($conn, $sqlSelect);
            oci_bind_by_name($stidSelect, ":idToUpdate", $idToUpdate);
            $rSelect = oci_execute($stidSelect);

            if ($rowToUpdate = oci_fetch_array($stidSelect, OCI_ASSOC + OCI_RETURN_NULLS)) {
                echo '<form method="post" action="update_process.php">';
                echo '<label for="id_penyewa">ID Penyewa:</label>';
                echo '<input type="text" name="id_penyewa" value="' . $rowToUpdate['ID_PENYEWA'] . '" readonly>';

                echo '<label for="nama_penyewa">Nama Penyewa:</label>';
                echo '<input type="text" name="nama_penyewa" value="' . $rowToUpdate['NAMA_PENYEWA'] . '">';

                echo '<label for="email">Email:</label>';
                echo '<input type="email" name="email" value="' . $rowToUpdate['EMAIL'] . '">';

                echo '<label for="password">Password:</label>';
                echo '<input type="text" name="password" value="' . $rowToUpdate['PASSWORD'] . '">';

                echo '<button type="submit">Update Data</button>';
                echo '</form>';
            } else {
                echo 'Data tidak ditemukan.';
            }

            oci_free_statement($stidSelect);
        }

        oci_close($conn);
        ?>
    </div>
</body>
</html>
