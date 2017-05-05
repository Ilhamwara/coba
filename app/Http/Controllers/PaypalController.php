<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

/** All Paypal Details class **/
use Paypal;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\ExecutePayment;
use PayPal\Api\PaymentExecution;

class PaypalController extends Controller
{
    private $_apiContext;

    public function __construct()
    {
        $this->_apiContext = PayPal::ApiContext(
            config('services.paypal.client_id'),
            config('services.paypal.secret'));

        $this->_apiContext->setConfig(array(
            'mode'                   => 'sandbox',
            'service.EndPoint'       => 'https://api.sandbox.paypal.com',
            'http.ConnectionTimeOut' => 30,
            'log.LogEnabled'         => true,
            'log.FileName'           => storage_path('logs/paypal.log'),
            'log.LogLevel'           => 'FINE',
        ));
    }

    public function getCheckout()
    {
        $item1 = new Item();
        $item1->setName('nama coba')
                ->setDescription('description')
                ->setCurrency('USD')
                ->setQuantity(1)
                ->setPrice('20');

        $payer = PayPal::Payer();
        $payer->setPaymentMethod('paypal');

        // dd($item1);
        $itemList = new ItemList();
        $itemList->setItems([$item1]);

        $details = new Details();
        $details->setShipping(0)->setTax(0)->setSubtotal('20');

        $amount = new Amount();
        $amount->setCurrency("USD")->setTotal('20')->setDetails($details);

        $transaction = PayPal::Transaction();
        $transaction->setAmount($amount);
        $transaction->setItemList($itemList);
        $transaction->setDescription('Art Purchase for ' . 'Judul Produk');

        $redirectUrls = PayPal::RedirectUrls();
        $redirectUrls->setReturnUrl(url('getDone'));
        $redirectUrls->setCancelUrl(url('getCancel'));

        $payment = PayPal::Payment();
        $payment->setIntent('sale');
        $payment->setPayer($payer);
        $payment->setRedirectUrls($redirectUrls);
        $payment->setTransactions(array($transaction));

        //CREATE PAYMENT
        try {
            $response = $payment->create($this->_apiContext);

            $redirectUrl = $response->links[1]->href;

            return Redirect::to($redirectUrl);

        } catch (PayPal\Exception\PayPalConnectionException $ex) {
            return redirect()->back()->with('msg', 'Something went wrong. Check log file storage/logs/paypal.log');
        } catch (Exception $ex) {
            // die($ex);
        }
    }

    public function getDone(Request $request)
    {
        $id         = $request->get('paymentId');
        $token      = $request->get('token');
        $payer_id   = $request->get('PayerID');
        
        //Get payment details
        try {
            $payment = PayPal::getById($id, $this->_apiContext);

        } catch (Exception $e) {
            return redirect()->back()->with('msg', 'Something went wrong. Check log file storage/logs/paypal.log');
        }

        //Execute 
        $paymentExecution = PayPal::PaymentExecution();
        $paymentExecution->setPayerId($payer_id);

        try {
            $executePayment = $payment->execute($paymentExecution, $this->_apiContext);

        } catch (PayPal\Exception\PayPalConnectionException $ex) {
            return redirect()->back()->with('msg', 'Something went wrong. Check log file storage/logs/paypal.log');
        }

        try {
            $paymentState = PayPal::getById($id, $this->_apiContext);   
        }catch (Exception $e) {

        }

        return redirect('edit')->with('success','Paypal Berhasil');
    }

// ilhamwara04-facilitator@gmail.com

    // public function getCancel()
    // {
    //     return view('checkout.cancel');
    // }
}
