<?php

/*
 * PayPal driver for Omnipay PHP payment library
 *
 * @link      https://github.com/hiqdev/omnipay-paypal
 * @package   omnipay-paypal
 * @license   MIT
 * @copyright Copyright (c) 2015-2016, HiQDev (http://hiqdev.com/)
 */

namespace Omnipay\PayPalXclick;

use Omnipay\Common\AbstractGateway;

/**
 * Gateway for PayPal.
 */
class Gateway extends AbstractGateway
{
    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'PayPalXclick';
    }

    /**
     * {@inheritdoc}
     */
    public function getDefaultParameters()
    {
        return [
            'purse'     => '',
            'description' => '',
            'testMode'  => false,
        ];
    }

    /**
     * Get the merchant purse.
     *
     * @return string merchant purse - email associated with the merchant account.
     */
    public function getPurse()
    {
        return $this->getParameter('purse');
    }

    /**
     * Set the merchant purse.
     *
     * @param string $value merchant purse - email associated with the merchant account.
     * @return self
     */
    public function setPurse($value)
    {
        return $this->setParameter('purse', $value);
    }

    /**
     * Get the merchant secret. Actually not used.
     *
     * @return string merchant secret
     */
    public function getSecret()
    {
        return $this->getParameter('secret');
    }

    /**
     * Set the merchant secret. Actually not used.
     *
     * @param string $value merchant secret
     * @return self
     */
    public function setSecret($value)
    {
        return $this->setParameter('secret', $value);
    }

    public function setDescription($value)
    {
        return $this->setParameter('description', $value);
    }

    public function getDescription($value)
    {
        return $this->getParameter('secret');
    }

    /**
     * @param array $parameters
     *
     * @return \Omnipay\PayPalXclick\Message\PurchaseRequest
     */
    public function purchase(array $parameters = [])
    {
        return $this->createRequest('\Omnipay\PayPalXclick\Message\PurchaseRequest', $parameters);
    }

    /**
     * @param array $parameters
     *
     * @return \Omnipay\PayPalXclick\Message\CompletePurchaseRequest
     */
    public function completePurchase(array $parameters = [])
    {
        return $this->createRequest('\Omnipay\PayPalXclick\Message\CompletePurchaseRequest', $parameters);
    }
}
