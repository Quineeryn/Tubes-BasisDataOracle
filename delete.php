<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $idToDelete = $_GET['id'];

    // Query untuk menghapus data
    $deleteSql = "DELETE FROM penyewa WHERE id_penyewa = :idToDelete";
    $stidDelete = oci_parse($conn, $deleteSql);
    oci_bind_by_name($stidDelete, ":idToDelete", $idToDelete);

    $resultDelete = oci_execute($stidDelete);

    echo '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Delete Data Penyewa</title>
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
                background-color: #e74c3c;
                cursor: pointer;
            }

            a:hover {
                background-color: #c0392b;
            }
        </style>
    </head>
    <body>';

    if (!$resultDelete) {
        $eDelete = oci_error($stidDelete);
        echo "Error: " . $eDelete['message'];
    } else {
        echo "<h2>Data berhasil dihapus!</h2>";
        echo '<a href="ociconnect.php">Kembali ke Data Penyewa</a>';
    }

    echo '</body></html>';

    oci_free_statement($stidDelete);
}

oci_close($conn);
?>
