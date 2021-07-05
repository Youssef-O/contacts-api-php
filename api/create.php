<?php
  header('Access-control-allow-orgin:*');
  header('Content-Type: Application/Json');
  header('Access-Control-Allow-Methods: Get');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Types,
  Access-Control-Allow-Methods');

  include_once '../config/database.php';
  include_once '../model/contact.php';

  $db = new Database();
  $conn = db->connect();
  
  $data = json_decode(file_get_contents("php://input"));
  
  $contact = new Contact($conn);
  $contact->fullName = $data->fullName;
  $contact->phoneNumber = $data->phoneNumber;
  $contact->emailAddress = $data->emailAddress;
  
  if( $contact->create()) {
    echo json_encode(
      array('Message' => 'Contact is deleted')
    );
  } else {
    echo json_encode(
      array('Message' => 'Contact not deleted')
    );
  }
