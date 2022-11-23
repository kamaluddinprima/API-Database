<?php

require_once('connection.php');

if (empty($_GET)) {
  $query = mysqli_query($connection, "SELECT * FROM data");

  $result = array();
  while ($row = mysqli_fetch_array($query)) {
    array_push($result, array(
      'id' => $row['id'],
      'nama' => $row['nama'],
      'nip' => $row['nip'],
      'pekerjaan' => $row['pekerjaan'],
    ));
  }

  echo json_encode(
    array('Data Pegawai' => $result)
  );
} else {
  $query = mysqli_query($connection, "SELECT * FROM data WHERE id=" . $_GET['id']);

  $result = array();
  while ($row = $query->fetch_assoc()) {
    $result = array(
        'id' => $row['id'],
        'nama' => $row['nama'],
        'nip' => $row['nip'],
        'pekerjaan' => $row['pekerjaan'],
    );
  }

  echo json_encode(
    $result
  );
}