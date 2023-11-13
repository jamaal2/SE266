<?php
require_once "Checking.php";
require_once "Savings.php";

$checking = new CheckingAccount('C123', 0, '12-20-2019');
$savings = new SavingsAccount('S123', 0, '03-20-2020');

$errorMessage = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['withdrawChecking'])) {
        $withdrawAmount = (float)$_POST['checkingWithdrawAmount'];
        if ($checking->withdrawal($withdrawAmount)) {
        } else {
            $errorMessage = "Withdrawal from checking account failed. Insufficient funds.";
        }
    } elseif (isset($_POST['depositChecking'])) {
        $depositAmount = (float)$_POST['checkingDepositAmount'];
        if ($checking->deposit($depositAmount)) {
        } else {
            $errorMessage = "Deposit to checking account failed. Please enter a valid amount.";
        }
    } elseif (isset($_POST['withdrawSavings'])) {
        $withdrawAmount = (float)$_POST['savingsWithdrawAmount'];
        if ($savings->withdrawal($withdrawAmount)) {
        } else {
            $errorMessage = "Withdrawal from savings account failed. Insufficient funds.";
        }
    } elseif (isset($_POST['depositSavings'])) {
        $depositAmount = (float)$_POST['savingsDepositAmount'];
        if ($savings->deposit($depositAmount)) {
        } else {
            $errorMessage = "Deposit to savings account failed. Please enter a valid amount.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ATM</title>
    <style type="text/css">
    </style>
</head>
<body>
    <form method="post">
        <h1>ATM</h1>
        <div class="wrapper">
            <div class="account">
                <?php echo $checking->getAccountDetails(); ?>
                <div class="accountInner">
                    <input type="text" name="checkingWithdrawAmount" value="" />
                    <input type="submit" name="withdrawChecking" value="Withdraw" />
                </div>
                <div class="accountInner">
                    <input type="text" name="checkingDepositAmount" value="" />
                    <input type="submit" name="depositChecking" value="Deposit" /><br />
                </div>
            </div>
            <div class="account">
                <?php echo $savings->getAccountDetails(); ?>
                <div class="accountInner">
                    <input type="text" name="savingsWithdrawAmount" value="" />
                    <input type="submit" name="withdrawSavings" value="Withdraw" />
                </div>
                <div class="accountInner">
                    <input type="text" name="savingsDepositAmount" value="" />
                    <input type="submit" name="depositSavings" value="Deposit" /><br />
                </div>
            </div>
        </div>
    </form>
    <div class="message">
        <?php
        if (!empty($errorMessage)) {
            echo '<div class="error">' . $errorMessage . '</div>';
        }
        ?>
    </div>
</body>
</html>
