<?php

  $admid = $_GET['adminid'];
  // do some validation here to ensure id is safe

  $link = mysql_connect("localhost", "root", "");
  mysql_select_db("sdb");
  $sql = "SELECT imejii FROM admin_info WHERE adminid=$admid";
  $result = mysql_query("$sql");
  $row = mysql_fetch_assoc($result);
  mysql_close($link);

  header("Content-type: image/jpeg");
  echo $row['imejii'];
?>