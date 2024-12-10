<?php

if (isset($_POST['senaraistudent'])) {

    $students = array();
  
    $limit = $_POST['senaraistudent']['limit'];  // Records per page
    $offset = $_POST['senaraistudent']['offset'];  // Record starting point
    $draw = $_POST['senaraistudent']['draw'];
  
    $query =
      "SELECT id,role,ndp,nama,email,phone,kp,jantina,agama,status_kahwin,bangsa,image_url,time_add FROM user WHERE  role='2'   LIMIT $limit OFFSET $offset";
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) > 0) {
  
  
      while ($user = mysqli_fetch_assoc($results)) {
  
        $students[] = array(
          "a" => '<div class="avatar avatar-md"><img class="avatar-img"
                                                                  src="' . $site_url . 'assets/img/user/' . $user['id'] . '/' . $user['image_url'] . '"
                                                                  alt="' . $user['nama'] . '"></div>',
          "b" => '<div class="text-nowrap text-truncate " >' . $user['nama'] . '</div>
                                                          <div class="small text-body-secondary text-nowrap"><span>' . $user['ndp'] . '</span>
                                                          </div>',
          "c" => $user['email'],
          "d" => '
              <a class="btn btn-primary me-2" href="' . $site_url . 'student/' . $user['ndp'] . '">
          <i class="icon bi bi-person-bounding-box"></i></a>
          ',
        );
  
      }
    }
  
  
  
    $response = [
      "draw" => $draw,
      "recordsTotal" => count($students),
      "recordsFiltered" => count($students),
      "data" => $students
    ];
  
    echo json_encode($response);
    die();
  }
  

  if (isset($_POST['kaunseling_analytics'])) {
    $limit = $_POST['kaunseling_analytics']['limit'];
    $offset = $_POST['kaunseling_analytics']['offset'];
    $draw = $_POST['kaunseling_analytics']['draw'];
    $search = $_POST['kaunseling_analytics']['search'];
    $gender = $_POST['kaunseling_analytics']['gender'];
    $masalah = $_POST['kaunseling_analytics']['masalah'];
    $status = $_POST['kaunseling_analytics']['status'];
  
    if ($gender == 'Lelaki') {
      $gender2 = '1';
    } else {
      $gender2 = '0';
    }
    // Total records count
    $totalQuery = "SELECT COUNT(*) as total FROM kaunselor_jadual";
    $totalResult = mysqli_query($db, $totalQuery);
    $totalRecords = mysqli_fetch_assoc($totalResult)['total'];
  
    // Total filtered records count
    $filteredQuery = "SELECT COUNT(*) as filtered, a.*, b.jantina FROM kaunselor_jadual a INNER JOIN user b ON b.id= a.user_id WHERE 1=1";
    if (!empty($search)) {
      $filteredQuery .= " AND (jantina LIKE '%$search%' OR masalah LIKE '%$search%' )";
    }
    if (!empty($gender)) {
      $filteredQuery .= " AND jantina = '$gender2'";
    }
    if (!empty($masalah)) {
      $filteredQuery .= " AND masalah = '$masalah'";
    }
    if ($status !== '') {
      $filteredQuery .= " AND event_status = '$status'";
    }
    $filteredResult = mysqli_query($db, $filteredQuery);
    $filteredRecords = mysqli_fetch_assoc(result: $filteredResult)['filtered'];
  
    // Fetch records
    $query = "SELECT a.*, b.jantina FROM kaunselor_jadual a INNER JOIN user b ON b.id= a.user_id WHERE 1=1";
    if (!empty($search)) {
      $query .= " AND (jantina LIKE '%$search%' OR masalah LIKE '%$search%')";
    }
    if (!empty($gender)) {
      $query .= " AND jantina = '$gender2'";
    }
    if (!empty($masalah)) {
      $query .= " AND masalah = '$masalah'";
    }
    if ($status !== '') {
      $query .= " AND event_status = '$status'";
    }
    $query .= " LIMIT $offset, $limit";
    $results = mysqli_query($db, $query);
  
    $data = [];
    if (mysqli_num_rows($results) > 0) {
      while ($row = mysqli_fetch_assoc($results)) {
        $jantina = ($row['jantina'] == '1') ? 'Lelaki' : 'Perempuan';
        $status_text = ($row['event_status'] == '2') ? 'Success' : (($row['event_status'] == '1') ? 'Waiting' : 'Fail');
        $data[] = array(
          "a" => $row['masalah'],
          "b" => $jantina,
          "c" => $status_text,
        );
      }
    }
  
    $output = array(
      "draw" => $draw,
      "recordsTotal" => intval($totalRecords),
      "recordsFiltered" => intval($filteredRecords),
      "data" => $data
    );
  
    echo json_encode($output);
    die();
  }
  

  

if (isset($_POST['fetch_masalah'])) {

    $query = "SELECT masalah, COUNT(*) as frequency FROM kaunselor_jadual GROUP BY masalah ORDER BY frequency DESC";
    $result = mysqli_query($db, $query);
  
    $options = "<option value=''>All" . '</option>';
    while ($row = $result->fetch_assoc()) {
      $options .= "<option value='" . $row['masalah'] . "'>" . $row['masalah'] . '</option>';
    }
  
    echo json_encode($options);
    die();
  
  }



  

if (isset($_POST['bar_chart_kaunseling_total'])) {
    $year = $_POST['bar_chart_kaunseling_total']['year'];
    $query = " SELECT MONTHNAME(tarikh) as month, COUNT(*) as count FROM kaunselor_jadual WHERE YEAR(tarikh) = '$year'   GROUP BY MONTH(tarikh) ORDER BY MONTH(tarikh); ";
    $result = mysqli_query($db, $query);
    $data = [];
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $data[] = $row;
      }
    }
    echo json_encode($data);
    die();
  
  }
  
  
  if (isset($_POST['card_chart_kaunseling_total_day'])) {
    $month = $_POST['card_chart_kaunseling_total_day']['month'];
    $year = $_POST['card_chart_kaunseling_total_day']['year'];
    $query = "SELECT DAYNAME(tarikh) AS day_of_week, COUNT(*) AS total 
    FROM kaunselor_jadual 
    WHERE MONTH(tarikh) = '$month' AND YEAR(tarikh) = '$year'
    GROUP BY DAYOFWEEK(tarikh) 
    ORDER BY FIELD(day_of_week, 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');";
    $result = mysqli_query($db, $query);
    $data = [];
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $data[] = $row;
      }
    }
    echo json_encode($data);
    die();
  
  }


  if (isset($_POST['test3'])) {

    // header('Content-Type: application/json');
    $ndp = $_POST['test3']['ndp'];
    // echo $ndp;
  
    $query =
      "SELECT a.*,b.ndp  FROM `user_psikologi`  a 
        INNER JOIN user b  ON  a.user_id = b.id
        
        WHERE ndp = '$ndp' ORDER BY a.id DESC LIMIT 1";
  
    $query2 =
      "SELECT a.*,b.ndp  FROM `user_psikologi`  a INNER JOIN user b  ON  a.user_id = b.id WHERE ndp = '$ndp' ORDER BY a.id ASC LIMIT 1";
  
    $query3 =
      "SELECT id,nama_kategori,normal,ringan,sederhana,teruk,sangat_teruk FROM `borang_psikologi_kategori`";
  
  
    $rows = [];
    $rows2 = [];
  
    $results = mysqli_query($db, $query);
    while ($psikologi = mysqli_fetch_assoc($results)) {
  
      $rows[] = json_decode($psikologi['keputusan'], true);
    }
    $results = mysqli_query($db, $query2);
    while ($psikologi = mysqli_fetch_assoc($results)) {
  
      $rows[] = json_decode($psikologi['keputusan'], true);
    }
  
  
    $results = mysqli_query($db, $query3);
    while ($kategori = mysqli_fetch_assoc($results)) {
      $kategoriMap[$kategori['id']] = [
        'nama_kategori' => ucfirst($kategori['nama_kategori']),
        'normal' => $kategori['normal'],
        'ringan' => $kategori['ringan'],
        'sederhana' => $kategori['sederhana'],
        'teruk' => $kategori['teruk'],
        'sangat_teruk' => $kategori['sangat_teruk'],
      ];
    }
  
    // Map category names to the rows data
    foreach ($rows as &$row) {
      foreach ($row as &$item) {
        if (isset($kategoriMap[$item['kategori_id']])) {
          $item['kategori_name'] = $kategoriMap[$item['kategori_id']]['nama_kategori'];
          $item['normal'] = $kategoriMap[$item['kategori_id']]['normal'];
          $item['ringan'] = $kategoriMap[$item['kategori_id']]['ringan'];
          $item['sederhana'] = $kategoriMap[$item['kategori_id']]['sederhana'];
          $item['teruk'] = $kategoriMap[$item['kategori_id']]['teruk'];
          $item['sangat_teruk'] = $kategoriMap[$item['kategori_id']]['sangat_teruk'];
  
          if ($item['value'] > $kategoriMap[$item['kategori_id']]['sangat_teruk']) {
            $item['level'] = "sangat teruk";
          } else if ($item['value'] > $kategoriMap[$item['kategori_id']]['teruk']) {
            $item['level'] = "teruk";
  
          } else if ($item['value'] > $kategoriMap[$item['kategori_id']]['sederhana']) {
            $item['level'] = "sederhana";
  
          } else if ($item['value'] > $kategoriMap[$item['kategori_id']]['ringan']) {
            $item['level'] = "ringan";
  
          } else {
            $item['level'] = "normal";
  
          }
          // $item['sangat_teruk'] = $kategoriMap[$item['kategori_id']]['sangat_teruk'];
        } else {
          $item['kategori_name'] = 'Unknown';
        }
      }
    }
  
    if (count($rows) > 0) {
      // Get the first and last rows
      $firstRow = $rows[0];
      $lastRow = $rows[count($rows) - 1];
  
      // Return the data as JSON
      header('Content-Type: application/json');
      echo json_encode([
        'firstRow' => $firstRow,
        'lastRow' => $lastRow
      ]);
  
  
      die();
  
    }
  
  
    //   $data = [
  //     ['kategori_id' => '1', 'value' => 1],
  //     ['kategori_id' => '2', 'value' => 2],
  //     ['kategori_id' => '3', 'value' => 2]
  // ];
  // header('Content-Type: application/json');
  // Return the data as JSON
    // echo json_encode($data);
  }