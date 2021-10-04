<?php

function autentikasi($nilai='')
{
  $db = get_instance()->db->conn_id;
	return mysqli_real_escape_string($db,addslashes($nilai));
}
?>