<?php
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: Application/Json');
  header('Access-Control-Allow-Methods: PUT');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Types, 
  Access-Control-Allow-Methods');

  include_once '../config/database.php';
  include_once '../model/contact.php';

  $db = new Database();
  $conn = $db.connect();

  $contact = new Contact($conn);
  $data = json_decode(get_file_contents('php://input'));
  $contact->fullName = $data->fullName;
  $contact->phoneNumber = $data->phoneNumber;
  $contact->emailAddresse = $data->emailAddresse;
  $contact->id = $data->id;

  if($contact->update()) {
    echo json_encode(
      array('message' => 'Contact Updated')
    );
  } else {
    echo json_encode(
      array('message' => 'Contact not Updated')
    );
  }


