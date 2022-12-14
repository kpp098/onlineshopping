<?php

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://test.instamojo.com/api/1.1/payment-requests/');
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_HTTPHEADER,array("X-Api-Key:test_ce051854cbee902ee7677fcc15e",
"X-Auth-Token:test_6a5bc5614e1f4dde534779422bc"));

$payload = Array(
  'purpose' => 'FIFA 16',
  'amount' => '2500',
  'buyer_name' => 'John Doe',
  'email' => 'foo@example.com',
  'phone' => '+917623864540',
  'redirect_url' => 'http://localhost/onlineshopping/redirect.php/',
  'send_email' => 'True',
  'send_sms' => 'True',
  // 'webhook' => 'http://www.example.com/webhook/',
  'allow_repeated_payments' => 'False',
);

curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
$response = curl_exec($ch);
curl_close($ch);
$response=json_decode($response);
session_start();
// echo'<pre>';
// print_r($response);
 $_SESSION['Tid']=$response->payment_request->id;
header('location:'.$response->payment_request->longurl);

 



?>