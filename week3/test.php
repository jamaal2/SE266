<?php
include_once 'checking.php';  // Include your classes
include_once 'savings.php';

// Test code
$checking = new CheckingAccount('C123', 1000, '12-20-2019');
$checking->withdrawal(200);
$checking->deposit(500);

$savings = new SavingsAccount('S123', 5000, '03-20-2020');

?>
