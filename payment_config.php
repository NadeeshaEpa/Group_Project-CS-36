<?php
require('stripe-php-master/init.php');

$publishableKey="pk_test_51MgirXJDpkgp77VTxb9f0nCdxjweXsXlx6bc7z3aqZ4murlXB6F57dm1V8J2yDkpiSK5ak07SnpmoPaTtqe9hsvl008Fv7fs5f";

$secretKey="sk_test_51MgirXJDpkgp77VT3It9ABqhU6mmUz4n3NilM247EKcpe3RzY24C0hJ1Dfx3ZMKoJl8UNV3pXkiozrGMkJz3Y1ds00bRtjFZOB";

\Stripe\Stripe::setApiKey($secretKey);
?>