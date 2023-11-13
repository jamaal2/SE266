<?php
require_once "account.php";

class SavingsAccount extends Account 
{
    public function withdrawal($amount) 
    {
        if ($amount > 0 && $this->balance >= $amount) {
            $this->balance -= $amount;
            return true;
        }
        return false;
    }

    public function getAccountDetails() 
    {
        $accountDetails = "<h2>Savings Account</h2>";
        $accountDetails .= parent::getAccountDetails();
        return $accountDetails;
    }
}
?>