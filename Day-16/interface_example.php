<?php

use Magento\Framework\Jwt\PayloadInterface;

interface PaymentMethodInterface{
    public function pay($amount);
}

abstract class BasePayment implements PaymentMethodInterface {
     protected $currency = 'INR';
     abstract public function pay($amount);
     public function getCurrency() {
        return $this->currency;
    }
}

class PayPalPayment extends BasePayment {
    public function pay($amount) {
        echo "Paid ₹$amount via PayPal in {$this->currency}";
    }
}

$payment = new PayPalPayment();
$payment->pay(2000);
?>