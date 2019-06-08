<?php
  class student1 {
    // DB Stuff
    private $conn;
    private $table = 'student1';

    // Properties
    public $rollno;
   public $username;
   
    // Constructor with DB
    public function __construct($db) {
      $this->conn = $db;
    }

    // Get categories
    public function read() {
      // Create query
      $query = 'SELECT
        rollno,
		username
      FROM
        ' . $this->table . '
      ';

      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }

    // Get Single Category
  public function read_single(){
    // Create query
    $query = 'SELECT
          rollno,
		  username
        FROM
          ' . $this->table . '
      WHERE rollno = ?
      LIMIT 0,1';

      //Prepare statement
      $stmt = $this->conn->prepare($query);

      // Bind ID
      $stmt->bindParam(1, $this->rollno);

      // Execute query
      $stmt->execute();

      $row = $stmt->fetch(PDO::FETCH_ASSOC);

      // set properties
      $this->rollno = $row['rollno'];
      $this->username = $row['username'];
  }

  // Create Category
  public function create() {
    // Create Query
    $query = 'INSERT INTO ' .
      $this->table . '
    SET
      rollno=:rollno,username = :username ';

  // Prepare Statement
  $stmt = $this->conn->prepare($query);

  // Clean data
  $this->rollno = htmlspecialchars(strip_tags($this->rollno));
  $this->username = htmlspecialchars(strip_tags($this->username));
  

  // Bind data
  $stmt-> bindParam(':rollno', $this->rollno);
  $stmt-> bindParam(':username', $this->username);
  

  // Execute query
  if($stmt->execute()) {
    return true;
  }

  // Print error if something goes wrong
  printf("Error: $s.\n", $stmt->error);

  return false;
  }

  // Update Category
  public function update() {
    // Create Query
    $query = 'UPDATE ' .
      $this->table . '
    SET
      username = :username
      WHERE
      rollno = :rollno';

  // Prepare Statement
  $stmt = $this->conn->prepare($query);

  // Clean data
  $this->username = htmlspecialchars(strip_tags($this->username));
  $this->rollno = htmlspecialchars(strip_tags($this->rollno));

  // Bind data
  $stmt-> bindParam(':username', $this->username);
  $stmt-> bindParam(':rollno', $this->rollno);

  // Execute query
  if($stmt->execute()) {
    return true;
  }

  // Print error if something goes wrong
  printf("Error: $s.\n", $stmt->error);

  return false;
  }

  // Delete Category
  public function delete() {
    // Create query
    $query = 'DELETE FROM ' . $this->table . ' WHERE rollno = :rollno';

    // Prepare Statement
    $stmt = $this->conn->prepare($query);

    // clean data
    $this->rollno = htmlspecialchars(strip_tags($this->rollno));

    // Bind Data
    $stmt-> bindParam(':rollno', $this->rollno);

    // Execute query
    if($stmt->execute()) {
      return true;
    }

    // Print error if something goes wrong
    printf("Error: $s.\n", $stmt->error);

    return false;
    }
  }
