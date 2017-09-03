<?php
  //get the data from the form
  $investment = filter_input(INPUT_POST, 'investment', FILTER_VALIDATE_FLOAT);
  $interestRate = filter_input(INPUT_POST, 'interestRate', FILTER_VALIDATE_FLOAT);
  $years = filter_input(INPUT_POST, 'years', FILTER_VALIDATE_INT);

  //validate investment
  if ($investment === FALSE) {
    $error_message = 'Investment must be a valid number.';
  }else if ($investment <= 0) {
    $error_message = 'Investment must be greater than zero.';
  // Validate interest rate
  }else if ($interestRate === FALSE) {
    $error_message = 'Investment must be a valid number.';
  }else if ($interestRate <= 0) {
    $error_message = 'Investment must be greater than zero.';
  //validate years
  }else if ($years === FALSE) {
    $error_message = 'Years must be a valid whole number.';
  }else if ($years <= 0) {
    $error_message = 'Years must be greater than 0.';
  }else if ($years > 30) {
    $error_message = 'Years must be less than 31.';
  //Set error message to empty string if no invalid entries
} else {
  $error_message = '';
}

//if an error message exists, go to the index page
if($error_message != ''){
  include('index.php');
  exit();
}

//calculate future value
$futureValue = $investment;
for ($i=1; $i <= $years; $i++) {
  $futureValue = $futureValue + ($futureValue * $interestRate * .01);
}

// apply currency and percent formatting
$investmentF = '$'.number_format($investment, 2);
$yearlyRateF = $interestRate.'%';
$futureValueF = '$'.number_format($futureValue, 2);
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Future Value Calculator</title>
    <link rel="stylesheet" type="text/css" href="main.css">
  </head>
  <body>
    <main>
      <h1>Future Value Calculator</h1>

      <label>Investment Amount:</label>
      <span><?php echo $investmentF; ?></span><br>

      <label>Yearly Interest Rate:</label>
      <span><?php echo $yearlyRateF; ?></span><br>

      <label>Number of Years:</label>
      <span><?php echo $years; ?></span><br>

      <label>Future Value:</label>
      <span><?php echo $futureValueF; ?></span><br>
      
    </main>
  </body>
</html>
