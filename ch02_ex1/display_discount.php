<?php
// get the data from the form
$product_description = $_POST['product_description'];
$list_price = $_POST['list_price'];
$discount_percent = $_POST['discount_percent'];
// calculate the discount
$discount = $list_price * $discount_percent * .01;
$discount_price = $list_price - $discount;
// apply currency formatting to the dollar and percent amounts
$list_price_formatted = number_format($list_price, 2);
$discount_percent_formatted = number_format($discount_percent, 1);
$discount_formatted = number_format($discount, 2);
$discount_price_formatted = number_format($discount_price, 2);
// escape the unformatted input
$product_description_escaped = htmlspecialchars($product_description);
?>
<!DOCTYPE html>
<html lang="en">
<head><title>Product Discount Calculator</title>
    <link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
<main>
    <h1>Product Discount Calculator</h1>
    <form action="display_discount.php" method="post">
        <!--
          No reason to re-invent to wheel here just re-use the form with new
          stuff added and disable the inputs. Formatting is already done for you this way.
        -->
        <div id="data">
            <label><span>Product Description:</span>
                <input disabled type="text" name="product_description" value="<?php echo $product_description_escaped; ?>"></label><br>
            <label><span>List Price $</span>
                <input disabled class="right" type="text" name="list_price" value="<?php echo $list_price_formatted; ?>"></label><br>
            <label><span>Discount Percent:</span>
                <input disabled class="right" type="text" name="discount_percent" value="<?php echo $discount_percent_formatted; ?>"></label><span> %</span><br>
            <label><span>Discount Amount $</span>
                <input disabled class="right" type="text" name="discount_amount" value="<?php echo $discount_formatted; ?>"></label><br>
            <label><span>Discount Price $</span>
                <input disabled class="right" type="text" name="discount_price" value="<?php echo $discount_price_formatted; ?>"></label><br>
        </div>
    </form>
<!--        <label><span>Product Description:</span>-->
<!--        <span>--><?php //echo $product_description_escaped; ?><!--</span></label><br>-->
<!--    <label><span>List Price:</span>-->
<!--        <span>--><?php //echo $list_price_formatted; ?><!--</span></label><br>-->
<!--    <label><span>Standard Discount:</span>-->
<!--        <span>--><?php //echo $discount_percent_formatted; ?><!--</span></label><br>-->
<!--    <label><span>Discount Amount:</span>-->
<!--        <span>--><?php //echo $discount_formatted; ?><!--</span></label><br>-->
<!--    <label><span>Discount Price:</span>-->
<!--        <span>--><?php //echo $discount_price_formatted; ?><!--</span></label><br>-->
</main>
</body>
</html>
