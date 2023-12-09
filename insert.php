<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Data Result</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .result-container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 300px;
            text-align: center;
        }

        h2 {
            color: #333;
        }

        .success-message {
            color: #4caf50;
        }

        .error-message {
            color: #f44336;
        }

        a {
            display: block;
            margin-top: 15px;
            text-decoration: none;
            color: #333;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="result-container">
        <?php
            // Include file koneksi
            include 'koneksi.php';

            // Jika ada pengiriman data dari formulir
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $id_penyewa = $_POST['id_penyewa'];
                $nama_penyewa = $_POST['nama_penyewa'];
                $email = $_POST['email'];
                $password = $_POST['password'];

                // Query untuk insert data ke tabel employees
                $insertSql = "INSERT INTO penyewa (id_penyewa, nama_penyewa, email, password) 
                            VALUES (:id_penyewa, :nama_penyewa, :email, :password)";

                $stid = oci_parse($conn, $insertSql);

                // Bind parameter
                oci_bind_by_name($stid, ":id_penyewa", $id_penyewa);
                oci_bind_by_name($stid, ":nama_penyewa", $nama_penyewa);
                oci_bind_by_name($stid, ":email", $email);
                oci_bind_by_name($stid, ":password", $password);

                // Eksekusi query
                $result = oci_execute($stid);

                echo '<h2>Insert Data Result</h2>';

                if (!$result) {
                    $e = oci_error($stid);
                    echo '<p class="error-message">Error: ' . $e['message'] . '</p>';
                } else {
                    echo '<p class="success-message">Data berhasil diinsert!</p>';
                    echo '<a href="form_insert.html">Kembali ke Formulir Insert</a>';
                    echo '<a href="ociconnect.php">Lihat Data</a>';
                }

                oci_free_statement($stid);
            }

            oci_close($conn);
        ?>
    </div>
</body>
</html>
