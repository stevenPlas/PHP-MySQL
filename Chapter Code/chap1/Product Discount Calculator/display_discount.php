<?php
  //get the data from the form
  $product_description = filter_input(INPUT_POST, 'product_description');
  $list_price = filter_input(INPUT_POST, 'list_price');
  $discount_percent = filter_input(INPUT_POST, discount_percent);

  //calculate the discount, and discounted price
  $discount = $list_price * $discount_percent * .01;
  $discount_price = $list_price - $discount;

  //apply currency formatting to the dollar and percent amounts
  $list_price_formatted = "$".number_format($list_price, 2);
  $discount_percent_formatted = number_format($discount_percent, 1)."%";
  $discount_formatted = "$".number_format($discount, 2);
  $discount_price_formatted = "$".number_format($discount_price, 2);

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Product Discount Calculator</title>
    <link rel="stylesheet" type="text/css" href="main.css">
  </head>
  <body>
    <main>
      <h1>Product Discount Calculator</h1>

      <label>Product Description:</label>
      <span><?php echo htmlspecialchars($product_description); ?></span><br>

      <label>List Price:</label>
      <span><?php echo htmlspecialchars($list_price_formatted); ?></span><br>

      <label>Standard Discount:</label>
      <span><?php echo htmlspecialchars($discount_price_formatted); ?></span><br>

      <label>Discount Amount:</label>
      <span><?php echo htmlspecialchars($discount_formatted); ?></span><br>

      <label>Discount Price:</label>
      <span><?php echo htmlspecialchars($discount_price_formatted(); ?></span><br>

    </main>
  </body>
</html>
