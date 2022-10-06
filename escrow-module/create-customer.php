<?php
if(!empty($_POST['Submit'])){
$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://api.escrow-sandbox.com/2017-09-01/customer',
    CURLOPT_RETURNTRANSFER => 1,
    //CURLOPT_USERPWD => 'robin@wowzunited.com:1209_zPhLwRpGG5dLUdkHCgdAteug5yuLhzOZ0966vMNEdnvqsBvqA2kz3vuTO6L8joDq',
    CURLOPT_USERPWD => 'harsh.wowz@gmail.com:1210_dbus19dlgZe0ysrd0HYpeaJ2xIlFqhRx9fTES4j2Y7cXfEVr0OrcSwPuqo65AWR0',
    CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json'
    ),
    CURLOPT_POSTFIELDS => json_encode(
        array(
            'phone_number' => '963258741',
            'first_name' => $_POST['fname'],
            'last_name' => $_POST['lname'],
            'middle_name' => '',
            'address' => array(
                'city' => 'San Francisco',
                'post_code' => '10203',
                'country' => 'US',
                'line2' => 'Apartment 301020',
                'line1' => '1829 West Lane',
                'state' => 'CA',
            ),
            'email' => $_POST['email'],
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
  <h2>Vertical (basic) form</h2>
  <form action="" method="POST">
  <div class="form-group">
      <label for="name">FName:</label>
      <input type="text" class="form-control" id="fname" placeholder="First Name" name="fname">
    </div>
	  <div class="form-group">
      <label for="last">Last Name:</label>
      <input type="text" class="form-control" id="lname" placeholder="Last Name" name="lname">
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
  
   
    <input type="submit" class="btn btn-default" name="Submit" value="Submit">
  </form>
</div>

</body>
</html>
