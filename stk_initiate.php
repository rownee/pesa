<?php
if(isset($_POST['submit'])){
  require_once "../includes/config.php";
  print_r($_POST);


  session_start();
  // print_r($_SESSION);
  $email = $_SESSION['login'];
  $amount = $_POST['amount'];
  $points = $amount/100;
  $earnig = $points/10;
  // $fname=$_POST['fname'];
  // $mnumber=$_POST['mobilenumber'];
  // $email=$_POST['email'];
  // $password=md5($_POST['password']);
  $sql="INSERT INTO  points (amount, phone, email, point, earnings) VALUES(:amount, :phone, :email, :point,  :earnings)";
  $query = $dbh->prepare($sql);
  $query->bindParam(':amount',$amount,PDO::PARAM_STR);
  $query->bindParam(':phone',$_POST['phone'],PDO::PARAM_STR);
  $query->bindParam(':email',$email,PDO::PARAM_STR);
  $query->bindParam(':point',$points,PDO::PARAM_STR);
  $query->bindParam(':earnings',$earnig,PDO::PARAM_STR);
  $query->execute();
  $lastInsertId = $dbh->lastInsertId();

  // print("amount: ".$amount." points: ".$points." earning: ".$earnig);


//  print_r($_POST);
  // die();
  date_default_timezone_set('Africa/Nairobi');

  # access token
  $consumerKey = '39259kLq1xoOgWUTExrzBGQZaoUxnEoU'; //Fill with your app Consumer Key
  $consumerSecret = 'y5IECU0PQTsaGutO'; // Fill with your app Secret

  # define the variales
  # provide the following details, this part is found on your test credentials on the developer account
  $BusinessShortCode = '174379';
  $Passkey = 'bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919';  
  
  /*
    This are your info, for
    $PartyA should be the ACTUAL clients phone number or your phone number, format 2547********
    $AccountRefference, it maybe invoice number, account number etc on production systems, but for test just put anything
    TransactionDesc can be anything, probably a better description of or the transaction
    $Amount this is the total invoiced amount, Any amount here will be 
    actually deducted from a clients side/your test phone number once the PIN has been entered to authorize the transaction. 
    for developer/test accounts, this money will be reversed automatically by midnight.
  */
  
   $PartyA = $_POST['phone']; // This is your phone number, 
  $AccountReference = '2255';
  $TransactionDesc = 'Test Payment';
  $Amount = $_POST['amount'];
 
  # Get the timestamp, format YYYYmmddhms -> 20181004151020
  $Timestamp = date('YmdHis');    
  
  # Get the base64 encoded string -> $password. The passkey is the M-PESA Public Key
  $Password = base64_encode($BusinessShortCode.$Passkey.$Timestamp);

  # header for access token
  $headers = ['Content-Type:application/json; charset=utf8'];

    # M-PESA endpoint urls
  $access_token_url = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
  $initiate_url = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';

  # callback url
  $CallBackURL = 'https://git.heroku.com/still-forest-32994.git//callback_url.php';  

  $curl = curl_init($access_token_url);
  curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
  curl_setopt($curl, CURLOPT_HEADER, FALSE);
  curl_setopt($curl, CURLOPT_USERPWD, $consumerKey.':'.$consumerSecret);
  $result = curl_exec($curl);
  $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
  $result = json_decode($result);
  $access_token = $result->access_token;  
  curl_close($curl);

  # header for stk push
  $stkheader = ['Content-Type:application/json','Authorization:Bearer '.$access_token];

  # initiating the transaction
  $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL, $initiate_url);
  curl_setopt($curl, CURLOPT_HTTPHEADER, $stkheader); //setting custom header

  $curl_post_data = array(
    //Fill in the request parameters with valid values
    'BusinessShortCode' => $BusinessShortCode,
    'Password' => $Password,
    'Timestamp' => $Timestamp,
    'TransactionType' => 'CustomerPayBillOnline',
    'Amount' => $Amount,
    'PartyA' => $PartyA,
    'PartyB' => $BusinessShortCode,
    'PhoneNumber' => $PartyA,
    'CallBackURL' => $CallBackURL,
    'AccountReference' => $AccountReference,
    'TransactionDesc' => $TransactionDesc
  );

  $data_string = json_encode($curl_post_data);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($curl, CURLOPT_POST, true);
  curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
  $curl_response = curl_exec($curl);
  print_r($curl_response);

  echo $curl_response;
};
?>
