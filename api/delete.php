<?php 
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: Application/Json');
  header('Access-Control-Allow-Methods: DELETE');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Access-Control-Allows-Methods');

  include_once '../config/database.php';
  include_once '../model/contact.php';


  $db = new Database();
  $conn = $db.connect();

  $contact = new Contact($conn);
  $data = json_decode(get_file_contents('php://input'));
  $contact->id = $data->id;

  if($contact->delete()) {
    echo json_encode(
      array('Message' => 'Contact is deleted')
    );
  } else {
    echo json_encode(
      array('Message' => 'Contact not deleted')
    );
  }