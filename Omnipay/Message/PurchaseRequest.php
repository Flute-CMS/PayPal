<?php

/*
 * PayPal driver for Omnipay PHP payment library
 *
 * @link      https://github.com/hiqdev/omnipay-paypal
 * @package   omnipay-paypal
 * @license   MIT
 * @copyright Copyright (c) 2015-2016, HiQDev (http://hiqdev.com/)
 */

namespace Omnipay\PayPalXclick\Message;

class PurchaseRequest extends AbstractRequest
{
    public function getData()
    {
        $this->validate(
            'purse',
            'amount',
            'currency',
            'description',
            'returnUrl',
            'cancelUrl',
            'notifyUrl'
        );
        
        return [
            'cmd' => '_xclick',
            'item_name' => $this->getDescription(),
            'amount' => $this->getAmount(),
            'currency_code' => strtoupper($this->getCurrency()),
            'business' => $this->getPurse(),
            'notify_url' => $this->getNotifyUrl(),
            'return' => $this->getReturnUrl(),
            'cancel_return' => $this->getCancelUrl(),
            'item_number' => $this->getTransactionId(),
            'charset' => 'utf-8',
        ];
    }

    public function sendData($data)
    {
        return $this->response = new PurchaseResponse($this, $data);
    }
}
