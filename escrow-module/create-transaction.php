<?php
if(!empty($_POST['Submit'])){
$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://api.escrow-sandbox.com/2017-09-01/transaction',
    CURLOPT_RETURNTRANSFER => 1,
    //CURLOPT_USERPWD => 'robin@wowzunited.com:Google2019wowz',
    CURLOPT_USERPWD => 'harsh.wowz@gmail.com:Google2019wowz',
    CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json'
    ),
    CURLOPT_POSTFIELDS => json_encode(
        array(
            'currency' => 'usd',
            'items' => array(
                array(
                    'description' => 'Payment By this account only'.$_POST['email'],
                    'schedule' => array(
                        array(
                            'payer_customer' => 'me',
                            'amount' => $_POST['amount'],
                            'beneficiary_customer' => $_POST['email'],
                        ),
                    ),
                    'title' => 'Payment By this account',
                    'inspection_period' => '259200',
                    'type' => 'domain_name',
                    'quantity' => '1',
                ),
            ),
            'description' => 'The sale of johnwick.com',
            'parties' => array(
                array(
                    'customer' => 'me',
                    'role' => 'buyer',
                ),
                array(
                    'customer' => $_POST['email'],
                    'role' => 'seller',
                ),
            ),
        )
    )
));

$output = curl_exec($curl);
echo"<pre>";
echo $output;
curl_close($curl);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Escrow Payment By Sandbox Account</h2>
  <form action="" method="POST">
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
  
  <div class="form-group">
      <label for="name">Amount:</label>
      <input type="text" class="form-control" id="amount" placeholder="Amount" name="amount">
    </div>
	
  
   
    <input type="submit" class="btn btn-default" name="Submit" value="Submit">
  </form>
</div>

</body>
</html>