<?php

require 'Paypal_IPN.php';
$paypal = new Paypal_IPN('sandbox');
$paypal->run();
?>