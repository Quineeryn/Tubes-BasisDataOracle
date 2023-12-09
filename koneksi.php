<?php
// Konfigurasi koneksi ke Oracle
$BASDAT = '
(DESCRIPTION =
  (ADDRESS = (PROTOCOL = TCP)(HOST = localhost)(PORT = 1521))
  (CONNECT_DATA =
    (SERVER = DEDICATED)
    (SERVICE_NAME = xepdb1)
  )
)';

$conn = oci_connect('HR', 'hr', $BASDAT);

if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}
?>
