<?php
$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://api.escrow-sandbox.com/integration/pay/2018-03-31',
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_USERPWD => 'ramesh@wowzunited.com:Google2019wowz',
    CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json'
    ),
    CURLOPT_POSTFIELDS => json_encode(
        array(
            'currency' => 'usd',
            'description' => 'Perfect sedan for the snow',
            'items' => array(
                array(
                    'extra_attributes' => array(
                        'make' => 'BMW',
                        'model' => '328xi',
                        'year' => '2008',
                    ),
                    'fees' => array(
                        array(
                            'payer_customer' => 'me',
                            'split' => '1',
                            'type' => 'escrow',
                        ),
                    ),
                    'inspection_period' => '259200',
                    'quantity' => '1',
                    'schedule' => array(
                        array(
                            'amount' => '500',
                            'beneficiary_customer' => 'me',
                            'payer_customer' => 'harsh.wowz@gmail.com',
                        ),
                    ),
                    'title' => 'BMW 328xi',
                    'type' => 'motor_vehicle',
                ),
            ),
            'parties' => array(
                array(
                    'address' => array(
                        'city' => 'San Francisco',
                        'country' => 'US',
                        'line1' => '180 Montgomery St',
                        'line2' => 'Suite 650',
                        'post_code' => '94104',
                        'state' => 'CA',
                    ),
                    'agree' => 'true',
                    'customer' => 'harsh.wowz@gmail.com',
                    'date_of_birth' => '1980-07-18',
                    'first_name' => 'John',
                    'initiator' => 'false',
                    'last_name' => 'Wick',
                    'phone_number' => '4155555555',
                    'role' => 'buyer',
                ),
                array(
                    'agree' => 'true',
                    'customer' => 'me',
                    'initiator' => 'true',
                    'role' => 'seller',
                ),
            ),
        )
    )
));

$output = curl_exec($curl);
echo $output;
curl_close($curl);
?>