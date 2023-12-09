<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idToUpdate = $_POST['id_penyewa'];
    $nama_penyewa = $_POST['nama_penyewa'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Query untuk update data
    $updateSql = "UPDATE penyewa SET nama_penyewa = :nama_penyewa, email = :email, password = :password WHERE id_penyewa = :idToUpdate";
    $stidUpdate = oci_parse($conn, $updateSql);
    oci_bind_by_name($stidUpdate, ":idToUpdate", $idToUpdate);
    oci_bind_by_name($stidUpdate, ":nama_penyewa", $nama_penyewa);
    oci_bind_by_name($stidUpdate, ":email", $email);
    oci_bind_by_name($stidUpdate, ":password", $password);

    $resultUpdate = oci_execute($stidUpdate);

    echo '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Update Data Penyewa</title>
        <style>
            body {
                font-family: "Arial", sans-serif;
                background-color: #f4f4f4;
                margin: 0;
                padding: 20px;
                display: flex;
                flex-direction: column;
                align-items: center;
            }

            h2 {
                color: #333;
            }

            a {
                text-decoration: none;
                padding: 8px 16px;
                margin: 4px;
                border-radius: 4px;
                color: #fff;
                background-color: #4caf50;
                cursor: pointer;
            }

            a:hover {
                background-color: #45a049;
            }
        </style>
    </head>
    <body>';

    if (!$resultUpdate) {
        $eUpdate = oci_error($stidUpdate);
        echo "Error: " . $eUpdate['message'];
    } else {
        echo "<h2>Data berhasil diupdate!</h2>";
        echo '<a href="ociconnect.php">Kembali ke Data Penyewa</a>';
    }

    echo '</body></html>';

    oci_free_statement($stidUpdate);
}

oci_close($conn);
?>
