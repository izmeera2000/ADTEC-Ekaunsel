<?php

if (isset($_POST['calendarfetch'])) {




  $id = $_SESSION['user_details']['id'];

  $start = ($_POST['calendarfetch']['start']);
  $end = ($_POST['calendarfetch']['end']);


  $start = date("Y-m-d", strtotime($start));
  $end = date("Y-m-d", strtotime($end));



  $query = "SELECT a.id,masalah ,tarikh as start,jenis,tarikh, event_status, b.ndp as ndp, b.id as user_id ,sebab , kaunselor_id FROM kaunselor_jadual a INNER JOIN ( SELECT id, ndp FROM user ) b  ON b.id = a.user_id WHERE (tarikh BETWEEN ('$start') AND ('$end')) ORDER BY tarikh  ASC ";


  $result = mysqli_query($db, $query);
  $eventArray = array();


  while ($row = mysqli_fetch_assoc($result)) {

    $row['title'] = $row['masalah'] . " (" . $row['ndp'] . ")";


    if ($row['event_status'] == "0") {

      $row['color'] = "	#ef376e";

    }
    if ($row['event_status'] == "1") {
      $row['color'] = "yellow";
      $row['textColor'] = "black";

    }

    if ($row['event_status'] == "2") {
      $row['color'] = "#51cc8a";

    }

    if ($row['event_status'] == "3") {
      $row['color'] = "#747af2";
      $row['textColor'] = "black";

    }
    if ($row['event_status'] == "4") {
      $row['color'] = "	#6b7785";

    }
    if ($row['jenis'] == "1") {
      $row['jenis'] = "Online";

    } else {
      $row['jenis'] = "Offline";

    }
    if ($row['user_id'] != $id) {
      $row['color'] = "gray";
      $row['title'] = "";
      $row['masalah'] = "Ditempah";
      $row['ndp'] = "";

    }










    if ($row['user_id'] == $id) {

      array_push($eventArray, $row);

    } else {
      if ($row['event_status'] != "0") {
        array_push($eventArray, $row);

      }
    }

    $row['allDay'] = "true";


  }


  echo json_encode($eventArray);
  die();

}


 
// Assuming you already have your database connection established

// Check if data is sent via POST
if (isset($_POST['calendaraddna'])) {
    // Extract values from the POST data
    $title = $_POST['calendaraddna']['title'];
    $start = $_POST['calendaraddna']['start'];
    $user_id = $_POST['calendaraddna']['user_id'];
    $jenis = $_POST['calendaraddna']['type'];

    // Format the start date to 'Y-m-d'
    $start = DateTime::createFromFormat('Y-m-d', $start)->format('Y-m-d');

    // Prepare the SQL query
    $query = "INSERT INTO kaunselor_jadual (user_id, masalah, tarikh, jenis) VALUES ('$user_id', '$title', '$start', '$jenis')";

    // Execute the query (make sure $db is your database connection object)
    $result = mysqli_query($db, $query);

    // Check if the query was successful
    if ($result) {
        // Return success response
        echo json_encode(['status' => 'success', 'message' => 'Appointment added successfully.']);
    } else {
        // Return error response
        echo json_encode(['status' => 'error', 'message' => 'Failed to add appointment.']);
    }
} else {
    // Return error if data is not in the expected format
    echo json_encode(['status' => 'error', 'message' => 'Invalid data received.']);
}
 


if (isset($_POST['calendardeletena'])) {





  $title = $_POST['calendardeletena']['title'];
  $start = $_POST['calendardeletena']['start'];
  $user_id = $_POST['calendardeletena']['user_id'];












  $query = "DELETE FROM  kaunselor_jadual WHERE id ='$user_id' ";


  $result = mysqli_query($db, $query);















  die();

}



if (isset($_POST['calendarfetchcuti'])) {




  $id = $_SESSION['user_details']['id'];

  $start = ($_POST['calendarfetchcuti']['start']);
  $end = ($_POST['calendarfetchcuti']['end']);


  $start = date("Y-m-d", strtotime($start));
  $end = date("Y-m-d", strtotime($end));



  $query = "SELECT * FROM `holiday` WHERE (tarikh BETWEEN ('$start') AND ('$end')) ORDER BY tarikh  ASC ";


  $result = mysqli_query($db, $query);
  $eventArray = array();


  while ($row = mysqli_fetch_assoc($result)) {



    array_push($eventArray, $row);



  }


  echo json_encode($eventArray);
  die();

}
