<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../../config/Database.php';
  include_once '../../models/student1.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate category object
  $student1 = new student1($db);

  // Category read query
  $result = $student1->read();
  
  // Get row count
  $num = $result->rowCount();

  // Check if any categories
  if($num > 0) {
        // Cat array
        $student1_arr = array();
        $student1_arr['data'] = array();

        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
          extract($row);

          $student1_item = array(
            'rollno' => $rollno,
            'username' => $username
          );

          // Push to "data"
          array_push($student1_arr['data'], $student1_item);
        }

        // Turn to JSON & output
        echo json_encode($student1_arr);

  } else {
        // No Categories
        echo json_encode(
          array('message' => 'No student Found')
        );
  }
