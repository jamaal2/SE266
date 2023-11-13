<?php

abstract class Account 
{
	protected $accountId;
	protected $balance;
	protected $startDate;
	
	public function __construct($id, $bal, $startDt) 
	{
		$this->accountId = $id;
		$this->balance = $bal;
		$this->startDate = $startDt;
	}
	
	public function deposit($amount) 
	{
		if ($amount > 0) {
			$this->balance += $amount;
			return true;
		}
	}

	abstract public function withdrawal($amount);
	
	public function getStartDate() 
	{
		return $this->startDate;
	}

	public function getBalance() 
	{
		return $this->balance; 
	}

	public function getAccountId() 
	{
		return $this->accountId;
	}

	protected function getAccountDetails()
	{
		$accountDetails = "Account ID: {$this->accountId}<br>";
		$accountDetails .= "Balance: {$this->balance}<br>";
		$accountDetails .= "Start Date: {$this->startDate}<br>";
		
		return $accountDetails;
	}
}
?>