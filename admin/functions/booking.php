<?php

if (isset($_POST['kaunselor_reject'])) {

  $now = date('Y-m-d H:i:s');

  $event_id = $_POST['kaunselor_reject']['id'];
  $sebab = $_POST['kaunselor_reject']['sebab'];
  $kaunselor_id = $_SESSION['user_details']['id'];
  // echo $event_id;
  $query =
    "UPDATE kaunselor_jadual SET event_status = 0 , sebab = '$sebab' , time_edit='$now' ,kaunselor_id='$kaunselor_id'  WHERE id = '$event_id'";
  $results = mysqli_query($db, $query);


  $query2 =
    "SELECT a.*, b.email,b.ndp,b.nama FROM `kaunselor_jadual` a INNER JOIN  user b ON a.user_id = b.id  WHERE a.id = '$event_id'";
  $results2 = mysqli_query($db, $query2);

  $event = mysqli_fetch_assoc($results2);

  $start_modified = date('j F Y gA', strtotime($event['tarikh']));

  $var = array(
    'link' => $site_url . "kaunseling/temujanji/$event_id", // Example variable
    'alasan' => $sebab // Example variable
  );
  // sendmail($event['email'], "Temu Janji Anda Pada $start_modified telah dibatalkan", 'meeting_reject.php', $var);






}

if (isset($_POST['kaunselor_approve'])) {


  $event_id = $_POST['kaunselor_approve']['id'];
  $mula1 = $_POST['kaunselor_approve']['mula'];
  $tamat1 = $_POST['kaunselor_approve']['tamat'];
  $kaunselor_id = $_SESSION['user_details']['id'];

  if ($mula1 && $tamat1) {
    // echo $event_id;
    $query =
      "SELECT * FROM kaunselor_jadual WHERE id='$event_id'";
    $results = mysqli_query($db, $query);

    // echo "test";
    $event = mysqli_fetch_assoc($results);
    $mula = date_format(new DateTime(datetime: $event['tarikh'] . $mula1), "Y/m/d H:i:s");
    $tamat = date_format(new DateTime(datetime: $event['tarikh'] . $tamat1), "Y/m/d H:i:s");

    echo $event['tarikh'] . $mula1;

    // list($hours2, $minutes2) = explode(separator: ':', $tamat1);


    // $rows[] = json_decode($psikologi['keputusan'], true);
    $now = date('Y-m-d H:i:s');

    $query1 =
      "UPDATE kaunselor_jadual SET event_status = 2, masa_mula ='$mula', masa_tamat = '$tamat', time_edit='$now',kaunselor_id='$kaunselor_id'   WHERE id = '$event_id'";
    $results = mysqli_query($db, $query1);


    $query2 =
      "SELECT a.*, b.email,b.ndp,b.nama FROM `kaunselor_jadual` a INNER JOIN  user b ON a.user_id = b.id  WHERE a.id = '$event_id'";
    $results2 = mysqli_query($db, $query2);

    $event = mysqli_fetch_assoc($results2);

    $start_modified = date('j F Y gA', strtotime($event['tarikh']));

    $var = array(
      'link' => $site_url . "kaunseling/temujanji/$event_id" // Example variable
    );
    // sendmail($event['email'], "Temu Janji Anda Pada $start_modified telah diluluskan", 'meeting_approve.php', $var);


  }


}




if (isset($_POST['temujanji_update'])) {


  $meeting_id = $_POST['temujanji_update']['meeting_id'];




  if (isset($_POST['temujanji_update']['selector'])) {
    $selector = $_POST['temujanji_update']['selector'];
  }

  $start = date('Y-m-d\TH:i:sP', strtotime($_POST['temujanji_update']['start']));
  $end = date('Y-m-d\TH:i:sP', strtotime($_POST['temujanji_update']['end']));
  $user_id = $_POST['temujanji_update']['user_id'];
  $user_mail = $_POST['temujanji_update']['user_mail'];

  $start_modified = date('j F Y gA', strtotime($_POST['temujanji_update']['start']));

  // echo $start;
  // debug_to_console($start);
  if (isset($_POST['temujanji_update']['manual'])) {
    $manual = $_POST['temujanji_update']['manual'];


    if (!$selector) {
      if (isset($_SESSION['user_details']['access_token'])) {


        $client = new Google_Client();
        $client->setAuthConfig('../client_secret.json');
        $client->addScope(Google_Service_Calendar::CALENDAR);
        $client->setAccessToken(getAccessTokenFromDatabase($_SESSION['user_details']['id'], $db));

        $calendarService = new Google_Service_Calendar($client);
        // Create a Google Meet event
        $event = new Google_Service_Calendar_Event(array(
          'summary' => 'Kaunseling ADTEC Meeting',
          'start' => array(
            'dateTime' => $start, // Specify your date and time here
            'timeZone' => 'Asia/Kuala_Lumpur',
          ),
          'end' => array(
            'dateTime' => $end,
            'timeZone' => 'Asia/Kuala_Lumpur',
          ),
          'conferenceData' => array(
            'createRequest' => array(
              'requestId' => 'random-string',
              'conferenceSolutionKey' => array(
                'type' => 'hangoutsMeet'
              ),
            ),
          ),
        ));

        try {
          // Insert the event into the calendar
          $event = $calendarService->events->insert('primary', $event, array('conferenceDataVersion' => 1));

          // Get the Google Meet link
          $googleMeetLink = $event->getHangoutLink();

          $parsedUrl = parse_url($googleMeetLink, PHP_URL_PATH);
          $googleMeetCode = basename($parsedUrl);


          // $meeting_link = $googleMeetLink; // Store the meeting link
          $var = array(
            'meeting_link' => $googleMeetLink, // Example variable
            'meeting_code' => $googleMeetCode // Example variable
          );
          // echo $user_mail;
          // echo 'Meet Link: ' . $meeting_link; // Output the meeting link

          $now = date('Y-m-d H:i:s');


          $query =
            "UPDATE kaunselor_jadual SET event_status = '3', masa_mula2 = '$now', meeting_link='$googleMeetLink' , time_edit='$now' WHERE id = '$meeting_id'";

          $results = mysqli_query($db, $query);

          // sendmail($user_mail, "Link Temu Janji Pada $start_modified", 'meeting_link.php', $var);



        } catch (Exception $e) {
          // Handle error
          // echo 'Error creating event: ' . $e->getMessage();

        }


      }
    } else {


      if (!$manual) {

        // showtoast("Please Enter The Google Meeting Link Manually", $toast); // Use actual NULL for the database

        echo "Please Enter The Google Meeting Link Manually";

      } else {
        $now = date('Y-m-d H:i:s');

        // $meeting_link = $manual;

        // $parsedUrl = parse_url($googleMeetLink, PHP_URL_PATH);
        // $googleMeetCode = basename($parsedUrl);


        // $meeting_link = $googleMeetLink; // Store the meeting link
        $var = array(
          'meeting_link' => $manual, // Example variable
          'meeting_code' => " " // Example variable
        );

        $query =
          "UPDATE kaunselor_jadual SET event_status = '3', masa_mula2 = '$now', meeting_link='$manual' , time_edit='$now' WHERE id = '$meeting_id'";

        $results = mysqli_query($db, $query);
        sendmail($user_mail, "Link Temu Janji Pada $start_modified", 'meeting_link.php', $var);

      }

    }
  } else {
    $now = date('Y-m-d H:i:s');
    // echo $meeting_id;
    // $meeting_link = $manual;
    $query =
      "UPDATE kaunselor_jadual SET event_status = '3', masa_mula2 = '$now', time_edit='$now' WHERE id = '$meeting_id'";
    $results = mysqli_query($db, $query);

  }




  die();



}
if (isset($_POST['temujanji_end'])) {


  $now = date('Y-m-d H:i:s');
  $user_mail = $_POST['temujanji_end']['user_mail'];
  $meeting_id = $_POST['temujanji_end']['meeting_id'];


  $query =
    "UPDATE kaunselor_jadual SET event_status = '4', masa_tamat2 = '$now' , time_edit='$now' WHERE id = '$meeting_id'";

  $results = mysqli_query($db, $query);

  // sendmail($user_mail, "Meeting Link", 'meeting_link.php', $meeting_link, $site_url);


  $query2 =
    "SELECT a.*, b.email,b.ndp,b.nama FROM `kaunselor_jadual` a INNER JOIN  user b ON a.user_id = b.id  WHERE a.id = '$event_id'";
  $results2 = mysqli_query($db, $query2);

  $event = mysqli_fetch_assoc($results2);

  $start_modified = date('j F Y gA', strtotime($event['tarikh']));

  $var = array(
    'link' => $site_url . "kaunseling/temujanji/$event_id" // Example variable
  );
  // sendmail($event['email'], "Temu Janji Anda Pada $start_modified telah ditamat", 'meeting_end.php', $var);


  die();

}


if (isset($_POST['temujanji_final'])) {


  $event_id = $_POST['meeting_id'];
  $user_id = $_POST['user_id'];
  $mula1 = $_POST['time1'];
  $tamat1 = $_POST['time2'];
  $tarikh = $_POST['tarikh1'];
  $sebab = $_POST['masalah1'];
  $kaunselor_id = $_SESSION['user_details']['id'];
  $jenis = $_POST['options_outlined2_final2'];
  $repeat = $_POST['options-outlined2_final'];


  $now = date('Y-m-d H:i:s');


  $query =
    "UPDATE kaunselor_jadual SET event_status = '4', masa_tamat2 = '$now' , time_edit='$now' WHERE id = '$event_id'";

  $results = mysqli_query($db, $query);

  // sendmail($user_mail, "Meeting Link", 'meeting_link.php', $meeting_link, $site_url);


  $query2 =
    "SELECT a.*, b.email,b.ndp,b.nama FROM `kaunselor_jadual` a INNER JOIN  user b ON a.user_id = b.id  WHERE a.id = '$event_id'";
  $results2 = mysqli_query($db, $query2);

  $event = mysqli_fetch_assoc($results2);

  $start_modified = date('j F Y gA', strtotime($event['tarikh']));

  $var = array(
    'link' => $site_url . "kaunseling/temujanji/$event_id" // Example variable
  );
  // sendmail($event['email'], "Temu Janji Anda Pada $start_modified telah ditamat", 'meeting_end.php', $var);




  if ($repeat) {
    if ($mula1 && $tamat1) {
      // echo $event_id;

      // echo "test";
      $mula = date_format(new DateTime($tarikh . $mula1), "Y/m/d H:i:s");
      $tamat = date_format(new DateTime($tarikh . $tamat1), "Y/m/d H:i:s");

      // echo $event['tarikh'] . $mula1;

      // list($hours2, $minutes2) = explode(separator: ':', $tamat1);


      // $rows[] = json_decode($psikologi['keputusan'], true);
      $now = date('Y-m-d H:i:s');

      $query1 =
        "INSERT INTO kaunselor_jadual 
                (
                  event_status, 
                  user_id,
                  masa_mula, 
                  masa_tamat, 
                  tarikh,
                  jenis,
                  masalah,
                  kaunselor_id
                ) 
                VALUES 
                (
                  2, 
                  '$user_id',
                  '$mula', 
                  '$tamat', 
                  '$tarikh', 
                  '$jenis', 
                  '$sebab', 
                  '$kaunselor_id'
                );
                ";
      $results = mysqli_query($db, $query1);


      $query2 =
        "SELECT a.*, b.email,b.ndp,b.nama FROM `kaunselor_jadual` a INNER JOIN  user b ON a.user_id = b.id  WHERE a.id = '$event_id'";
      $results2 = mysqli_query($db, $query2);

      $event = mysqli_fetch_assoc($results2);

      $start_modified = date('j F Y gA', strtotime($event['tarikh']));

      $var = array(
        'link' => $site_url . "kaunseling/temujanji/$event_id" // Example variable
      );
      // sendmail($event['email'], "Temu Janji Anda Pada $start_modified telah diluluskan", 'meeting_approve.php', $var);


    }
  }


  header('location:' . $site_url . "kaunseling/temujanji/$event_id");
}


if (isset($_POST['calendarfetch2'])) {






  $start = ($_POST['calendarfetch2']['start']);
  $end = ($_POST['calendarfetch2']['end']);


  $start = date("Y-m-d", strtotime($start));
  $end = date("Y-m-d", strtotime($end));



  $query = "SELECT a.id,masalah ,tarikh as start, event_status, b.ndp as ndp, b.id as user_id ,sebab , kaunselor_id, image_url , b.nama, jenis FROM kaunselor_jadual a INNER JOIN ( SELECT id, ndp, image_url,nama FROM user ) b  ON b.id = a.user_id WHERE (tarikh BETWEEN ('$start') AND ('$end') )  ORDER BY FIELD(event_status, 1,2,0)";


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
    $row['allDay'] = "true";

    array_push($eventArray, $row);

  }


  echo json_encode($eventArray);
  die();

}






if (isset($_POST['kaunselor_reject_flutter'])) {

  $now = date('Y-m-d H:i:s');

  $event_id = $_POST['kaunselor_reject_flutter']['id'];
  $sebab = $_POST['kaunselor_reject_flutter']['sebab'];
  $user_id = $_POST['kaunselor_reject_flutter']['user_id'];
  // echo $event_id;
  $query =
    "UPDATE kaunselor_jadual SET event_status = 0 , sebab = '$sebab' , time_edit='$now' ,kaunselor_id='$user_id'  WHERE id = '$event_id'";
  $results = mysqli_query($db, $query);









}

if (isset($_POST['kaunselor_approve_flutter'])) {


  $event_id = $_POST['kaunselor_approve_flutter']['id'];
  $mula1 = $_POST['kaunselor_approve_flutter']['mula'];
  $tamat1 = $_POST['kaunselor_approve_flutter']['tamat'];
  $user_id = $_POST['kaunselor_approve_flutter']['user_id'];

  if ($mula1 && $tamat1) {
    // echo $event_id;
    $query =
      "SELECT * FROM kaunselor_jadual WHERE id='$event_id'";
    $results = mysqli_query($db, $query);

    // echo "test";
    $event = mysqli_fetch_assoc($results);
    $mula = date_format(new DateTime(datetime: $event['tarikh'] . $mula1), "Y/m/d H:i:s");
    $tamat = date_format(new DateTime(datetime: $event['tarikh'] . $tamat1), "Y/m/d H:i:s");


    // list($hours2, $minutes2) = explode(separator: ':', $tamat1);


    // $rows[] = json_decode($psikologi['keputusan'], true);
    $now = date('Y-m-d H:i:s');

    $query1 =
      "UPDATE kaunselor_jadual SET event_status = 2, masa_mula ='$mula', masa_tamat = '$tamat', time_edit='$now',   kaunselor_id='$user_id'   WHERE id = '$event_id'";
    $results = mysqli_query($db, $query1);





  }


}




if (isset($_POST['temujanji_update_flutter'])) {


  $meeting_id = $_POST['temujanji_update_flutter']['meeting_id'];





  $start = date('Y-m-d\TH:i:sP', strtotime($_POST['temujanji_update_flutter']['start']));
  $user_id = $_POST['temujanji_update_flutter']['user_id'];


  echo $start;
  // debug_to_console($start);


  $now = date('Y-m-d H:i:s');
  // echo $meeting_id;
  // $meeting_link = $manual;
  $query =
    "UPDATE kaunselor_jadual SET event_status = '3', masa_mula2 = '$now', time_edit='$now' WHERE id = '$meeting_id'";
  $results = mysqli_query($db, $query);




  die();



}
if (isset($_POST['temujanji_end_flutter'])) {


  $now = date('Y-m-d H:i:s');
  $meeting_id = $_POST['temujanji_end_flutter']['meeting_id'];


  $query =
    "UPDATE kaunselor_jadual SET event_status = '4', masa_tamat2 = '$now' , time_edit='$now' WHERE id = '$meeting_id'";

  $results = mysqli_query($db, $query);






  die();


}


if (isset($_POST['temujanji_final_flutter'])) {

  $event_id = $_POST['meeting_id'];
  $user_id = $_POST['user_id'];
  $mula1 = $_POST['time1'];
  $tamat1 = $_POST['time2'];
  $tarikh = $_POST['tarikh1'];
  $sebab = $_POST['masalah1'];
  $kaunselor_id = $_POST['kaunselor_id'];

  $now = date('Y-m-d H:i:s');

  $query2 = "SELECT a.*, b.email,b.ndp,b.nama FROM `kaunselor_jadual` a INNER JOIN user b ON a.user_id = b.id WHERE a.id = '$event_id'";
  $results2 = mysqli_query($db, $query2);

  $event = mysqli_fetch_assoc($results2);

  if ($mula1 && $tamat1) {
    $mula = date_format(new DateTime($tarikh . $mula1), "Y/m/d H:i:s");
    $tamat = date_format(new DateTime($tarikh . $tamat1), "Y/m/d H:i:s");

    $now = date('Y-m-d H:i:s');

    $query1 = "INSERT INTO kaunselor_jadual 
                (
                  event_status, 
                  user_id,
                  masa_mula, 
                  masa_tamat, 
                  tarikh,
                  jenis,
                  masalah,
                  kaunselor_id
                ) 
                VALUES 
                (
                  2, 
                  '$user_id',
                  '$mula', 
                  '$tamat', 
                  '$tarikh', 
                  'online', 
                  '$sebab', 
                  '$kaunselor_id'
                )";

    $results = mysqli_query($db, $query1);

    if ($results) {
      $last_insert_id = mysqli_insert_id($db);
      // Return JSON response with last inserted ID
      echo json_encode(['status' => 'success', 'meeting_id' => $last_insert_id]);
    } else {
      echo json_encode(['status' => 'error', 'message' => mysqli_error($db)]);
    }
  } else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid time inputs']);
  }

  exit; // stop further output
}
