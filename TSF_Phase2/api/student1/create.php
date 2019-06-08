<?php
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: POST');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');

  include_once '../../config/Database.php';
  include_once '../../models/student1.php';
  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog post object
  $student1 = new student1($db);

  // Get raw posted data
  $data = json_decode(file_get_contents("php://input"));
  $student1->rollno=$data->rollno;
  $student1->username = $data->username;
  
  // Create Category
  if($student1->create()) {
    echo json_encode(
      array('message' => 'student Created')
    );
  } else {
    echo json_encode(
      array('message' => 'student Not Created')
    );
  }
