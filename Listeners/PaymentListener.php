<?php

namespace Flute\Modules\PayPalXclick\Listeners;

class PaymentListener
{
    public static function registerPayPalXclick()
    {
        app()->getLoader()->addPsr4('Omnipay\\PayPalXclick\\', module_path('PayPalXclick', 'Omnipay/'));
        app()->getLoader()->register();
    }
}