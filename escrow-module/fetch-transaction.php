<?php
if(!empty($_POST['Submit'])){
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.escrow-sandbox.com/2017-09-01/transaction/'.$_POST['transactionid'],
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
  <h2>Vertical (basic) form</h2>
  <form action="" method="POST">
 
    <div class="form-group">
      <label for="transactionid">Transactionid:</label>
      <input type="text" class="form-control" id="email" placeholder="Enter transaction id" name="transactionid">
    </div>
  
   
    <input type="submit" class="btn btn-default" name="Submit" value="Submit">
  </form>
</div>

</body>
</html>
