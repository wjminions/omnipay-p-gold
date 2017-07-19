<?php

namespace Omnipay\PGold\Message;

use Omnipay\Common\Message\AbstractResponse;

/**
 * Class ImitateCompletePurchaseResponse
 * @package Omnipay\PGold\Message
 */
class ImitateCompletePurchaseResponse extends AbstractResponse
{

    public function isPaid()
    {
        if ($this->data['is_paid']) {
            return true;
        }

        return false;
    }


    /**
     * Is the response successful?
     *
     * @return boolean
     */
    public function isSuccessful()
    {
        return true;
    }
}
