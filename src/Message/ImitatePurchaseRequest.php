<?php

namespace Omnipay\PGold\Message;

use Omnipay\Common\Message\ResponseInterface;
use Omnipay\PGold\Helper;

/**
 * Class ImitatePurchaseRequest
 *
 * @package Omnipay\PGold\Message
 */
class ImitatePurchaseRequest extends AbstractImitateRequest
{

    /**
     * @return mixed
     */
    public function getData()
    {
        $this->validateData();

        $data = array(
            'pay_id'       => $this->getPayId(),
            'module'       => $this->getModule(),
            'order_id'     => $this->getOrderId(),
            'customer_id'  => $this->getCustomerId(),
            'payment_code' => $this->getPaymentCode(),
            'amount'       => $this->getAmount(),
            'created'      => $this->getCreated(),
            'callback_url' => $this->getCallbackUrl()
        );

        if ($this->getKey()) {
            $data['sign'] = Helper::getSignByDataAndKey($data, $this->getKey());
        }

        $data['query_string'] = Helper::getQueryString($data);

        return $data;
    }

    private function validateData()
    {
        $this->validate(
            'pay_id',
            'module',
            'order_id',
            'customer_id',
            'payment_code',
            'amount',
            'created',
            'callback_url'
        );
    }

    /**
     * Send the request with specified data
     *
     * @param  mixed $data The data to send
     * @return ResponseInterface
     */
    public function sendData($data)
    {
        return $this->response = new ImitatePurchaseResponse($this, $data);
    }
}
