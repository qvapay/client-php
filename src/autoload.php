<?php
require('Qvapay.php');

/* Auth */  
require('Auth/Login.php');
require('Auth/Logout.php');
require('Auth/Register.php');

/* Services */  
require('Services/Services.php'); 

/* user */  
require('User/Me.php');  
require('User/TopUp.php');  
require('User/Withdraw.php'); 

/* Transactions */ 
require('Transactions/Transactions.php');  
require('Transactions/Withdraws.php');  
require('Transactions/Transfer.php');  

/* Merchants */ 
require('Merchants/Info.php');  
require('Merchants/CreateInvoice.php');  
require('Merchants/Balance.php');  
require('Merchants/TransactionsStatus.php');  
require('Merchants/Transactions.php');  

/* CreatePaymentLinks */ 
require('PaymentLinks/PaymentLinks.php');  

/* P2p */ 
require('P2p/CompletedPairsAverage.php');  
require('P2p/EnabledCurrencies.php');  
require('P2p/GetOffers.php');  
require('P2p/GetP2POffer.php');  

/* Rates */ 
require('Rates/CurrentCoins.php');  
require('Rates/CurrentRates.php');  

?>