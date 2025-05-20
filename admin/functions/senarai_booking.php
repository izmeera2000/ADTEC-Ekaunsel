<?php

if (isset($_POST['senaraitemujanji'])) {



  $limit = $_POST['senaraitemujanji']['limit'];  // Records per page
  $offset = $_POST['senaraitemujanji']['offset'];  // Record starting point
  $draw = $_POST['senaraitemujanji']['draw'];


  $data = array();

  $today = date('Y-m-d');
  // echo $today;
  $user_id = $_POST['senaraitemujanji']['user_id'];
  // echo $today;
  if ($user_id != "test") {
    $quser_id = "AND event_status >='1' AND user_id='$user_id'";
  } else {
    $quser_id = "AND event_status >='1' ";
  }
  $totalQuery = "SELECT COUNT(*) as total FROM kaunselor_jadual a WHERE a.tarikh = '$today' $quser_id";
  $totalResult = mysqli_query($db, $totalQuery);
  $totalRecords = mysqli_fetch_assoc($totalResult)['total'];

  // Query to count filtered records
  $filteredQuery = "SELECT COUNT(*) as filtered FROM kaunselor_jadual a WHERE a.tarikh = '$today' $quser_id";
  $filteredResult = mysqli_query($db, $filteredQuery);
  $filteredRecords = mysqli_fetch_assoc($filteredResult)['filtered'];

  $query =
    "SELECT a.* , b.nama,  b.ndp, b.image_url FROM kaunselor_jadual a INNER JOIN  user b ON a.user_id = b.id  WHERE a.tarikh ='$today'     $quser_id  LIMIT $limit OFFSET  $offset";
  $results = mysqli_query($db, $query);
  if (mysqli_num_rows($results) > 0) {

    while ($row = $results->fetch_assoc()) {

      $timestamp = strtotime($row['tarikh']);
      $formattedDate = date('d / m / Y', $timestamp);

      if ($row['event_status'] == "0") {

        $class = "btn-danger";
      }
      if ($row['event_status'] == "1") {
        $class = "btn-warning";


      }

      if ($row['event_status'] == "2") {
        $class = "btn-success";


      }

      if ($row['event_status'] == "3") {
        $class = "btn-info";


      }
      if ($row['event_status'] == "4") {
        $class = "btn-secondary";


      }

      $data[] = array(

        "a" => '<div class="avatar avatar-md"><img class="avatar-img" src="' . $site_url . 'assets/img/user/' . $row['user_id'] . '/' . $row['image_url'] . '"
                alt="user@email.com"></div>',
        "b" => '<div class="text-nowrap">' . $row['nama'] . '</div>' . '<div class="small text-body-secondary text-nowrap">' . $row['ndp'] . '</div>',
        "c" => '<div class="text-center">' . $row['masalah'] . '</div>',
        "d" => '<div class="text-center">' . $formattedDate . '</div>' . '<div class="small text-body-secondary text-nowrap">' . date("h:i") . '</div>',
        "e" => '
                <a class="btn ' . $class . '" href="' . $site_url . 'kaunseling/temujanji/' . $row['id'] . '">
  <i class="icon  bi bi-calendar-plus"></i>
                </a>
            '
      );
    }
  }

  $output = array(
    "draw" => $draw,  // Return the draw parameter back
    "recordsTotal" => intval($totalRecords),   // Total number of records
    "recordsFiltered" => intval($filteredRecords), // Total number of filtered records
    "data" => $data   // Actual data to be displayed
  );

  echo json_encode($output);
  die();

}


if (isset($_POST['senaraitemujanji2'])) {

  $limit = $_POST['senaraitemujanji2']['limit'];  // Records per page
  $offset = $_POST['senaraitemujanji2']['offset'];  // Record starting point
  $draw = $_POST['senaraitemujanji2']['draw'];


  $data = array();

  $today = date('Y-m-d');
  // echo $today;
  $user_id = $_POST['senaraitemujanji2']['user_id'];
  // echo $today;
  if ($user_id != "test") {
    $quser_id = "AND event_status >='1' AND user_id='$user_id'";
  } else {
    $quser_id = "AND event_status >='1' ";
  }
  $totalQuery = "SELECT COUNT(*) as total FROM kaunselor_jadual a WHERE a.tarikh < '$today' $quser_id";
  $totalResult = mysqli_query($db, $totalQuery);
  $totalRecords = mysqli_fetch_assoc($totalResult)['total'];

  // Query to count filtered records
  $filteredQuery = "SELECT COUNT(*) as filtered FROM kaunselor_jadual a WHERE a.tarikh < '$today' $quser_id";
  $filteredResult = mysqli_query($db, $filteredQuery);
  $filteredRecords = mysqli_fetch_assoc($filteredResult)['filtered'];

  $query =
    "SELECT a.* , b.nama,  b.ndp, b.image_url FROM kaunselor_jadual a INNER JOIN  user b ON a.user_id = b.id  WHERE a.tarikh <'$today'     $quser_id ORDER BY a.tarikh DESC LIMIT $limit OFFSET  $offset ";
  $results = mysqli_query($db, $query);
  if (mysqli_num_rows($results) > 0) {

    while ($row = $results->fetch_assoc()) {

      $timestamp = strtotime($row['tarikh']);
      $formattedDate = date('d / m / Y', $timestamp);
      if ($row['event_status'] == "0") {

        $class = "btn-danger";
      }
      if ($row['event_status'] == "1") {
        $class = "btn-warning";


      }

      if ($row['event_status'] == "2") {
        $class = "btn-success";


      }

      if ($row['event_status'] == "3") {
        $class = "btn-info";


      }
      if ($row['event_status'] == "4") {
        $class = "btn-secondary";


      }

      $data[] = array(

        "a" => '<div class="avatar avatar-md"><img class="avatar-img" src="' . $site_url . 'assets/img/user/' . $row['user_id'] . '/' . $row['image_url'] . '"
                alt="user@email.com"></div>',
        "b" => '<div class="text-nowrap">' . $row['nama'] . '</div>' . '<div class="small text-body-secondary text-nowrap">' . $row['ndp'] . '</div>',
        "c" => '<div class="text-center">' . $row['masalah'] . '</div>',
        "d" => '<div class="text-center">' . $formattedDate . '</div>' . '<div class="small text-body-secondary text-nowrap">' . date("h:i") . '</div>',
        "e" => '
                <a class="btn ' . $class . '" href="' . $site_url . 'kaunseling/temujanji/' . $row['id'] . '">
                  <i class="icon  bi bi-calendar-x"></i>
                </a>
            '
      );
    }
  }

  $output = array(
    "draw" => $draw,  // Return the draw parameter back
    "recordsTotal" => intval($totalRecords),   // Total number of records
    "recordsFiltered" => intval($filteredRecords), // Total number of filtered records
    "data" => $data   // Actual data to be displayed
  );

  echo json_encode($output);
  die();

}

if (isset($_POST['senaraitemujanji3'])) {


  $limit = $_POST['senaraitemujanji3']['limit'];  // Records per page
  $offset = $_POST['senaraitemujanji3']['offset'];  // Record starting point
  $draw = $_POST['senaraitemujanji3']['draw'];


  $data = array();

  $today = date('Y-m-d');
  // echo $today;
  $user_id = $_POST['senaraitemujanji3']['user_id'];
  // echo $today;
  if ($user_id != "test") {
    $quser_id = "AND event_status >='1' AND user_id='$user_id'";
  } else {
    $quser_id = "AND event_status >='1' ";
  }
  $totalQuery = "SELECT COUNT(*) as total FROM kaunselor_jadual a WHERE a.tarikh > '$today' $quser_id";
  $totalResult = mysqli_query($db, $totalQuery);
  $totalRecords = mysqli_fetch_assoc($totalResult)['total'];

  // Query to count filtered records
  $filteredQuery = "SELECT COUNT(*) as filtered FROM kaunselor_jadual a WHERE a.tarikh > '$today' $quser_id";
  $filteredResult = mysqli_query($db, $filteredQuery);
  $filteredRecords = mysqli_fetch_assoc($filteredResult)['filtered'];

  $query =
    "SELECT a.* , b.nama,  b.ndp, b.image_url FROM kaunselor_jadual a INNER JOIN  user b ON a.user_id = b.id  WHERE a.tarikh >'$today'     $quser_id  ORDER BY a.tarikh ASC  LIMIT $limit OFFSET  $offset";
  $results = mysqli_query($db, $query);
  if (mysqli_num_rows($results) > 0) {

    while ($row = $results->fetch_assoc()) {

      $timestamp = strtotime($row['tarikh']);
      $formattedDate = date('d / m / Y', $timestamp);

      if ($row['event_status'] == "0") {

        $class = "btn-danger";
      }
      if ($row['event_status'] == "1") {
        $class = "btn-warning";


      }

      if ($row['event_status'] == "2") {
        $class = "btn-success";


      }

      if ($row['event_status'] == "3") {
        $class = "btn-info";


      }
      if ($row['event_status'] == "4") {
        $class = "btn-secondary";


      }

      $data[] = array(

        "a" => '<div class="avatar avatar-md"><img class="avatar-img" src="' . $site_url . 'assets/img/user/' . $row['user_id'] . '/' . $row['image_url'] . '"
                alt="user@email.com"></div>',
        "b" => '<div class="text-nowrap">' . $row['nama'] . '</div>' . '<div class="small text-body-secondary text-nowrap">' . $row['ndp'] . '</div>',
        "c" => '<div class="text-center">' . $row['masalah'] . '</div>',
        "d" => '<div class="text-center">' . $formattedDate . '</div>' . '<div class="small text-body-secondary text-nowrap">' . date("h:i") . '</div>',
        "e" => '
                <a class="btn ' . $class . '" href="' . $site_url . 'kaunseling/temujanji/' . $row['id'] . '">
                       <i class="icon  bi bi-calendar-plus"></i>
                </a>
            '
      );
    }
  }

  $output = array(
    "draw" => $draw,  // Return the draw parameter back
    "recordsTotal" => intval($totalRecords),   // Total number of records
    "recordsFiltered" => intval($filteredRecords), // Total number of filtered records
    "data" => $data   // Actual data to be displayed
  );

  echo json_encode($output);
  die();

}






if (isset($_POST['senaraitemujanji_flutter'])) {
  $start = $_POST['senaraitemujanji_flutter']['start'];
  $end = $_POST['senaraitemujanji_flutter']['end'];
  $user_id = $_POST['senaraitemujanji_flutter']['user_id'];
  $status2 = $_POST['senaraitemujanji_flutter']['status2'];
  $limit = $_POST['senaraitemujanji_flutter']['limit'];  // Records per page
  $offset = $_POST['senaraitemujanji_flutter']['offset'];  // Record starting point
  $role = $_POST['senaraitemujanji_flutter']['role'];

  $today = date('Y-m-d');

  $query = "SELECT a.*, b.nama, b.ndp, b.image_url 
            FROM kaunselor_jadual a 
            INNER JOIN user b ON a.user_id = b.id 
              WHERE 1=1  ";

  if ($status2 == 'upcoming') {
    $query .= " AND (event_status ='2' OR event_status ='3' OR event_status = '1')  ";

  } elseif ($status2 == 'completed') {
    $query .= " AND event_status = '4'  ";

  } else {
    $query .= " AND event_status = '0'   ";
  }
  if ($role != '1') {
    $query = " AND user_id = '$user_id' ";
  }

  $query .= " ORDER BY a.tarikh DESC   LIMIT $limit OFFSET $offset";

  $results = mysqli_query($db, $query);
  $data = array();

  if (mysqli_num_rows($results) > 0) {
    while ($row = $results->fetch_assoc()) {
      $masa_mula = $row['masa_mula'];
      // $tarikh_penuh = date('Y-m-d H:i:s', strtotime($masa_mula));
      // $date_part = date('Y-m-d', strtotime($masa_mula));
      // $time_part = date('h:i A', strtotime($masa_mula));

      $data[] = array(
        'id' => $row['id'],
        'user_id' => $row['user_id'],
        'nama' => $row['nama'],
        'ndp' => $row['ndp'],
        'image_url' => $row['image_url'],
        'masalah' => $row['masalah'],
        'jenis' => $row['jenis'],
        'masa_mula' => $masa_mula,
        'tarikh' => $row['tarikh'],
        // 'masa' => $time_part,
        'status' => $row['event_status'],
      );
    }
  }

  echo json_encode($data);

  die();
}




if (isset($_POST['senaraitemujanji_admin_flutter'])) {
  $start = $_POST['senaraitemujanji_admin_flutter']['start'];
  $end = $_POST['senaraitemujanji_admin_flutter']['end'];
  $status2 = $_POST['senaraitemujanji_admin_flutter']['status2'];
  $limit = $_POST['senaraitemujanji_admin_flutter']['limit'];  // Records per page
  $offset = $_POST['senaraitemujanji_admin_flutter']['offset'];  // Record starting point

  $today = date('Y-m-d');

  $query = "SELECT a.*, b.nama, b.ndp, b.image_url 
            FROM kaunselor_jadual a 
            INNER JOIN user b ON a.user_id = b.id 
              WHERE 1=1  ";

  if ($status2 == 'upcoming') {
    $query .= " AND (event_status ='2' OR event_status ='3' OR event_status = '1') ORDER BY a.tarikh ASC  ";

  } elseif ($status2 == 'completed') {
    $query .= " AND event_status = '4' ORDER BY a.tarikh DESC ";

  } else {
    $query .= " AND event_status = '0' ORDER BY a.tarikh DESC ";
  }


  $query .= "  LIMIT $limit OFFSET $offset ";

  $results = mysqli_query($db, $query);
  $data = array();

  if (mysqli_num_rows($results) > 0) {
    while ($row = $results->fetch_assoc()) {
      $masa_mula = $row['masa_mula'];
      // $tarikh_penuh = date('Y-m-d H:i:s', strtotime($masa_mula));
      // $date_part = date('Y-m-d', strtotime($masa_mula));
      // $time_part = date('h:i A', strtotime($masa_mula));

      $data[] = array(
        'id' => $row['id'],
        'user_id' => $row['user_id'],
        'nama' => $row['nama'],
        'ndp' => $row['ndp'],
        'image_url' => $row['image_url'],
        'masalah' => $row['masalah'],
        'jenis' => $row['jenis'],
        'masa_mula' => $masa_mula,
        'tarikh' => $row['tarikh'],
        // 'masa' => $time_part,
        'status' => $row['event_status'],
      );
    }
  }

  echo json_encode($data);

  die();
}


if (isset($_POST['senaraitemujanji_details_flutter'])) {
  $id = $_POST['senaraitemujanji_details_flutter']['id'];


  $today = date('Y-m-d');

  $query = "SELECT a.*, b.nama, b.ndp, b.image_url 
            FROM kaunselor_jadual a 
            INNER JOIN user b ON a.user_id = b.id 
              WHERE 1=1  AND a.id = '$id' ";




  $results = mysqli_query($db, $query);
  $data = array();

  if (mysqli_num_rows($results) > 0) {
    while ($row = $results->fetch_assoc()) {
      $masa_mula = $row['masa_mula'];
      // $tarikh_penuh = date('Y-m-d H:i:s', strtotime($masa_mula));
      // $date_part = date('Y-m-d', strtotime($masa_mula));
      // $time_part = date('h:i A', strtotime($masa_mula));

      $data[] = array(
        'id' => $row['id'],
        'user_id' => $row['user_id'],
        'nama' => $row['nama'],
        'ndp' => $row['ndp'],
        'image_url' => $row['image_url'],
        'masalah' => $row['masalah'],
        'jenis' => $row['jenis'],
        'masa_mula' => $masa_mula,
        'tarikh' => $row['tarikh'],
        // 'masa' => $time_part,
        'status' => $row['event_status'],
      );
    }
  }

  echo json_encode($data);

  die();
}