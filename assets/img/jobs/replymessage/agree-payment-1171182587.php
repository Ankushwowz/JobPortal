<?php
$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://api.escrow.com/2017-09-01/transaction/2395049',
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_USERPWD => 'robin@wowzunited.com:Google2019wowz',
    CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json'
    ),
    CURLOPT_CUSTOMREQUEST => 'PATCH',
    CURLOPT_POSTFIELDS => json_encode(
        array(
            'action' => 'agree',
        )
    )
));

$output = curl_exec($curl);
echo $output;
curl_close($curl);
?>