<?php
/**
 * MultiSafepay Rest Api Refund Request.
 */

namespace Omnipay\MultiSafepay\Message;

/**
 * MultiSafepay Rest Api Void Request.
 *
 * The MultiSafepay API support void, meaning you can void a transaction
 *
 * When a transaction has been cancelled the status will change to
 * "cancelled".
 *
 * ### Example
 *
 * <code>
 *    $request = $this->gateway->void();
 *
 *    $request->setTransactionId('test-transaction');
 *    $response = $request->send();
 *    var_dump($response->isSuccessful());
 * </code>
 */
class RestVoidRequest extends RestAbstractRequest
{
    /**
     * Get the required data for the API request.
     *
     * @return array
     * @throws \Omnipay\Common\Exception\InvalidRequestException
     */
    public function getData()
    {
        parent::getData();

        $this->validate('transactionId');

        return [
            'status' => 'cancelled',
            'id' => $this->getTransactionId()
        ];
    }

    /**
     * Send the request with specified data
     *
     * @param mixed $data
     * @return RestRefundResponse
     */
    public function sendData($data)
    {
        $httpResponse = $this->sendRequest(
            'PATCH',
            '/orders/' . $data['id'],
            json_encode($data)
        );

        $this->response = new RestVoidResponse(
            $this,
            json_decode($httpResponse->getBody()->getContents(), true)
        );

        return $this->response;
    }
}
