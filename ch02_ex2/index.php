<?php
//set default value of variables for initial page load
// See
// http://us2.php.net/manual/en/language.operators.comparison.php#language.operators.comparison.ternary
// for more info on the null coalescing operator.
$investment = $investment ?? 1;
//if (!isset($investment)) {
//    $investment = '';
//}
$interest_rate = $interest_rate ?? 1;
$years = $years ?? 1;
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
    <?php if (!empty($error_message)): ?>
        <p class="error"><?= $error_message; ?></p>
    <?php endif ?>
    <form action="display_results.php" method="post" autocomplete="on">
        <div id="data">
            <label><span>Investment Amount $</span>
                <!--
                Don't need to do extra escaping here because value can only
                be given default or come from already validated user input in
                display_results.php.
                -->
                <input class="right" required type="number" name="investment"
                       min="0.01" step="0.01" autofocus
                       value="<?= $investment; ?>">
                <!--                <input type="text" name="investment"-->
                <!--                       value="--><?php //echo htmlspecialchars($investment); ?><!--">-->
            </label>
            <label><span>Yearly Interest Rate:</span>
                <input class="right" required type="number" name="interest_rate"
                       min="0.01" max="15" step="0.01"
                       value="<?= $interest_rate; ?>">&nbsp;%
            </label>
            <label><span>Number of Years:</span>
                <input class="right" required type="number" name="years"
                       min="1" max="31"
                       value="<?= $years; ?>">
            </label>
        </div>
        <div id="buttons">
            <label><span>&nbsp;</span>
                <input type="submit" value="Calculate">
            </label>
        </div>
    </form>
</main>
</body>
</html>
