<?php
// get the data from the form
$investment = filter_input(INPUT_POST, 'investment',
    FILTER_VALIDATE_FLOAT);
$interest_rate = filter_input(INPUT_POST, 'interest_rate',
    FILTER_VALIDATE_FLOAT);
$years = filter_input(INPUT_POST, 'years',
    FILTER_VALIDATE_INT);
// validate investment
$error_message = '';
if (false === $investment) {
    $error_message = 'Investment must be a valid number.';
}
if (0 > $investment) {
    $error_message = 'Investment must be greater than zero.';
    // validate interest rate
}
if (false === $interest_rate) {
    $error_message = 'Interest rate must be a valid number.';
}
if (0.01 > $interest_rate || 15 < $interest_rate) {
    $error_message = 'Interest rate must be between 0.01 and 15%.';
}
if (false === $years) {
    $error_message = 'Years must be a valid whole number.';
}
if (0 > $years || 31 < $years) {
    $error_message = 'Years must be between 1 and 31.';
}
// if an error message exists, go to the index page
if ('' !== $error_message) {
    require 'index.php';
    exit();
}
// calculate the future value
$future_value = $investment;
for ($i = 1; $i <= $years; $i++) {
    $future_value += $future_value * $interest_rate * .01;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Future Value Calculator</title>
    <link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
<main>
    <h1>Future Value Calculator</h1>
    <form action="display_results.php" method="post">
        <div id="data">
            <label><span>Investment Amount $</span>
                <input disabled class="right" type="text" name="investment"
                       value="<?= number_format($investment, 2); ?>">
            </label>
            <label><span>Yearly Interest Rate:</span>
                <input disabled class="right" type="text" name="interest_rate"
                       value="<?= number_format($interest_rate, 2); ?>">&nbsp;%
            </label>
            <label><span>Number of Years:</span>
                <input disabled class="right" type="text" name="years"
                       value="<?= $years; ?>">
            </label>
            <label><span>Future Value $</span>
                <input disabled class="right" type="text" name="investment"
                       value="<?= number_format($future_value, 2); ?>">
            </label>
        </div>
        <label><span>Calculated on</span> <?= date('Y-m-d H:i:s'); ?></label>
        <label><span>&nbsp;</span><button type="submit" formaction="index.php">&lt;&lt; Back</button></label>
    </form>
</main>
</body>
</html>
