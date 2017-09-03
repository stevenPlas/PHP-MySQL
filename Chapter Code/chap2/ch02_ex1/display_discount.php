<?php
  $productDescription = filter_input(INPUT_POST, 'productDescription');
  $listPrice = filter_input(INPUT_POST, 'listPrice', FILTER_VALIDATE_INT);
  $discountPercent = filter_input(INPUT_POST, 'discountPercent', FILTER_VALIDATE_FLOAT);

  //calculate discount amount, and price
  $discount = $listPrice * $discountPercent * .01;
  $discountPrice = $listPrice - $discount;

  //apply currency formatting to the dollar and percent amounts
  $listPriceF = "$".number_format($listPrice, 2);
  $discountPercentF = number_format($discountPercent, 1).'%';
  $discountF = "$".number_format($discount, 2);
  $discountPriceF = "$".number_format($discountPrice, 2);
?>

 <!DOCTYPE html>
<html>
<head>
    <title>Product Discount Calculator</title>
    <link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
    <main>
        <h1>Product Discount Calculator</h1>

        <label>Product Description:</label>
        <span><?php echo htmlspecialchars($productDescription); ?></span><br>

        <label>List Price:</label>
        <span><?php echo htmlspecialchars($listPriceF); ?></span><br>

        <label>Standard Discount:</label>
        <span><?php echo htmlspecialchars($discountPercentF); ?></span><br>

        <label>Discount Amount:</label>
        <span><?php echo htmlspecialchars($discountF); ?></span><br>

        <label>Discount Price:</label>
        <span><?php echo htmlspecialchars($discountPriceF); ?></span><br>
    </main>
</body>
</html>
