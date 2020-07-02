<?php namespace Omnipay\MultiSafepay\Message;

use Omnipay\Tests\TestCase;

class RestVoidRequestTest extends TestCase
{
    /**
     * @var PurchaseRequest
     */
    private $request;

    protected function setUp()
    {
        $this->request = new RestVoidRequest(
            $this->getHttpClient(),
            $this->getHttpRequest()
        );

        $this->request->initialize(
            array(
                'apiKey' => '123456789',
                'transaction_id' => '123456789'
            )
        );
    }

    public function testSendSuccess()
    {
        $this->setMockHttpResponse('RestVoidSuccess.txt');

        $response = $this->request->send();

        $this->asserttrue($response->isSuccessful());
    }
}
