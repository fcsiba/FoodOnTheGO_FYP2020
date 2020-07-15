
<?php
  /*callapi function start */
  function callapi($method, $url, $data) {

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);

    if($method == 'POST') {
      curl_setopt($ch, CURLOPT_POST, 1);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    }

    if($method == 'PUT') {
      curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
      curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    }

    if($method == 'DELETE') {
      curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
    }
    
    curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
      ));
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

      $output = curl_exec($ch);

    curl_close ($ch);

    return $output;
  }
  /*callapi function end */

  $result = '';

  // Call GET method fetch all records
  $method = 'GET';
  $url = 'http://localhost:3000/restaurants';
  $data = NULL;

  $products = callapi($method, $url, $data);

  //Call GET method fetch single record
  if(isset($_GET['action']) && $_GET['action'] == 'edit') {

    $id = $_GET['id'];

    $method = 'GET';
    $url = 'http://localhost:3000/restaurants/'.$id;
    $data = NULL;

    $prod = callapi($method, $url, $data);
    $prod = json_decode($prod);
  }

  //Call DELETE method
  if(isset($_GET['action']) && $_GET['action'] == 'del') {

    $id = $_GET['id'];

    $method = 'DELETE';
    $url = 'http://localhost:3000/restaurants/delete/'.$id;
    $data = NULL;

    $result = callapi($method, $url, $data);

    header('location: index.php');
  }
  
  if(isset($_POST['submit']))
  {
    // Call POST method
    if($_POST['submit'] == 'create')
    {
      $method = 'POST';
      $url = 'http://localhost:3000/restaurants/create';
      $data = json_encode($_POST);

      $result = callapi($method, $url, $data);

      header('location: index.php');
    }

    // Call PUT method
    if($_POST['submit'] == 'update')
    {
      $id = $_POST['id'];

      $method = 'PUT';
      $url = 'http://localhost:3000/restaurants/update/'.$id;
      $data = json_encode($_POST);

      $result = callapi($method, $url, $data);

      header('location: index.php');
    }
  }
?>
