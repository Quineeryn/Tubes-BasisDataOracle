<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Penyewa</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
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
            max-width: 800px;
            width: 100%;
            padding: 20px;
        }

        h2 {
            font-size: 2em;
            margin-bottom: 20px;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #3498db;
            color: #fff;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        a {
            text-decoration: none;
            padding: 10px 20px;
            margin: 10px;
            border-radius: 6px;
            font-weight: bold;
            letter-spacing: 1px;
            display: inline-block;
            background-color: #27ae60;
            color: #fff;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        a:hover {
            background-color: #219653;
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Data Penyewa</h2>
        <table>
            <tr>
                <th>ID Penyewa</th>
                <th>Nama Penyewa</th>
                <th>Email</th>
                <th>Password</th>
                <th>Action</th>
            </tr>
            <?php
            include 'koneksi.php';

            $sql = 'SELECT id_penyewa, nama_penyewa, email, password FROM penyewa';
            $stid = oci_parse($conn, $sql);

            if (!$stid) {
                $e = oci_error();
                echo $e['message'];
                exit;
            }

            $r = oci_execute($stid);

            while ($row = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS)) {
                echo '<tr>
                        <td>' . $row['ID_PENYEWA'] . '</td>
                        <td>' . $row['NAMA_PENYEWA'] . '</td>
                        <td>' . $row['EMAIL'] . '</td>
                        <td>' . $row['PASSWORD'] . '</td>
                        <td>
                            <a href="update.php?id=' . $row['ID_PENYEWA'] . '" style="color: #3498db;">Update</a> |
                            <a href="delete.php?id=' . $row['ID_PENYEWA'] . '" style="color: #e74c3c;">Delete</a>
                        </td>
                      </tr>';
            }

            oci_close($conn);
            ?>
        </table>
        <a href="form_insert.html" style="background-color: #27ae60;">Insert Data</a>
    </div>
</body>
</html>
