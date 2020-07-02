<?php
/**
 * MultiSafepay Rest Api Void Response.
 */
namespace Omnipay\MultiSafepay\Message;

/**
 * MultiSafepay Rest Api Void Response.
 *
 * The MultiSafepay API support void, meaning you can cancel a
 * transaction.
 *
 * When a transaction has been canceled the status will change to
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
class RestVoidResponse extends RestAbstractResponse
{

}
