<?php
  
  header('Access-control-allow-orgin:*');
  header('Content-Type: Application/Json');
  header('Access-Control-Allow-Methods: Get');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Types,
  Access-Control-Allow-Methods');

  include_once('../config/database.php')
  include_once('../model/contact.php')

  $db = new Database();
  $conn = $db->connect();

  $contact = new Contact($conn);
  $results = $contact->read();
  $num = $results->rowCount();

  if($num > 0) {
    $contact_arr['data'] = array();
   
    while($row = $results->fetch(PDO::FETCH_ASSOC)) {
      array_push($contact_arr['data'], $row);
    }

    echo json_encode($cat_arr);
  } else {
      // No Contacts
      echo json_encode(
        array('message' => 'No Contacts Found')
      ); 
  }