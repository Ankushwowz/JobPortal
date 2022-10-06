<?php 
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.escrow-sandbox.com/2017-09-01/transaction/2410843',
  CURLOPT_RETURNTRANSFER => 1,
 // CURLOPT_USERPWD => 'email-address:your-password',
 CURLOPT_USERPWD => 'harsh.wowz@gmail.com:Google2019wowz',
  CURLOPT_HTTPHEADER => array(
      'Content-Type: application/json'
  ),
));

$output = curl_exec($curl);
echo"<pre>";
echo $output;
curl_close($curl);


?>