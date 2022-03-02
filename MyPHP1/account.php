<?php
require "bank.php";
class Account extends Bank{

}

$bank = new Bank();

echo 'balance is:'.$bank->balance();

?>