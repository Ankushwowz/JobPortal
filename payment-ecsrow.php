<?php
/*$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://api.escrow-sandbox.com/2017-09-01/transaction/2395070/payment_methods',
    CURLOPT_RETURNTRANSFER => 1,
   CURLOPT_USERPWD => 'robin@wowzunited.com:Google2019wowz',
    CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json'
    ),
   
));

$output = curl_exec($curl);
echo"<pre>";
echo $output;
curl_close($curl);*/




$curl = curl_init();
curl_setopt_array($curl, array(
     CURLOPT_URL => 'https://api.escrow-sandbox.com/2017-09-01/transaction/2395049/payment_methods/credit_card',
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_USERPWD => 'robin@wowzunited.com:Google2019wowz',
    CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json'
    ),
    CURLOPT_POSTFIELDS => json_encode(
        array(
            'return_url' => 'https://www.google.com/payment-result',
        )
    )
));

$output = curl_exec($curl);
echo $output;
curl_close($curl);

?>