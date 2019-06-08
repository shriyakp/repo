<?php

  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../../config/Database.php';
  include_once '../../models/student1.php';
  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();
  // Instantiate blog category object
  $student1 = new student1($db);

  // Get ID
  $student1->rollno = isset($_GET['rollno']) ? $_GET['rollno'] : die();

  // Get post
  $student1->read_single();

  // Create array
  $student1_arr = array(
    'rollno' => $student1->rollno,
    'username' => $student1->username
  );

  // Make JSON
  print_r(json_encode($student1_arr));
