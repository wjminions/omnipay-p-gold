<?php

namespace Omnipay\PGold\Message;

use Omnipay\Common\Message\AbstractResponse;
use Omnipay\Common\Message\RedirectResponseInterface;
use Omnipay\PGold\Helper;

/**
 * Class ImitatePurchaseResponse
 * @package Omnipay\PGold\Message
 */
class ImitatePurchaseResponse extends AbstractResponse implements RedirectResponseInterface
{

    public function isSuccessful()
    {
        return false;
    }

    public function isRedirect()
    {
        return true;
    }

    public function getRedirectUrl()
    {
        return $this->data['callback_url'] . '?' . $this->data['query_string'];
    }

    public function getRedirectMethod()
    {
        return 'GET';
    }

    public function getRedirectData()
    {
        return $this->data;
    }

    public function getRedirectHtml()
    {
        return false;
    }
}
