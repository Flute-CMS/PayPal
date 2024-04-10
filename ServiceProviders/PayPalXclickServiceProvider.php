<?php

namespace Flute\Modules\PayPalXclick\ServiceProviders;

use Flute\Core\Payments\Events\RegisterPaymentFactoriesEvent;
use Flute\Core\Support\ModuleServiceProvider;
use Flute\Modules\PayPalXclick\Listeners\PaymentListener;

class PayPalXclickServiceProvider extends ModuleServiceProvider
{
    public array $extensions = [];

    public function boot(\DI\Container $container): void
    {
        events()->addDeferredListener(RegisterPaymentFactoriesEvent::NAME, [PaymentListener::class, 'registerPayPalXclick']);
    }

    public function register(\DI\Container $container): void
    {
    }
}