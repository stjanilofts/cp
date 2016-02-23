<?php

namespace App\Http\Payment;

use Illuminate\Http\Request;

use App\Order;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class Borgun extends Controller
{
	private $SecretKey;

	public $order;

	public $PaymentGatewayId;
	public $MerchantId;

	public $ReturnUrlSuccess;
	public $ReturnUrlCancel;
	public $ReturnUrlError;
	public $ReturnUrlSuccessServer;

	public $OrderId;
	public $Amount;
	public $Currency;
	public $Language;

	public $testing;

	public function __construct(Order $order)
	{
		if(!$order) dd('vantar pöntun');

		$this->order 					= $order;
		$this->testing 					= false;

		if(env('BORGUN_TEST') == true) {
			$this->site 				= 'https://test.borgun.is/SecurePay/default.aspx';
			$this->testing 				= true;
			$this->PaymentGatewayId 	= '16';
			$this->MerchantId 			= '9275444';
			$this->SecretKey 			= '99887766';
		} else {
			$this->site 				= 'https://securepay.borgun.is/securepay/default.aspx';
			$this->PaymentGatewayId 	= env('BORGUN_PAYMENTGATEWAYID');
			$this->MerchantId 			= env('BORGUN_MERCHANTID');
			$this->SecretKey 			= env('BORGUN_SECRETKEY');
		}

		$this->ReturnUrlSuccess 		= \Request::root().'/payment/borgun/success';
		$this->ReturnUrlSuccessServer 	= \Request::root().'/payment/borgun/successserver';
		$this->ReturnUrlCancel 			= \Request::root().'/payment/borgun/cancel';
		$this->ReturnUrlError 			= '';

		$this->OrderId 					= $order->reference;
		$this->Amount 					= $order->total();
		$this->Currency 				= 'ISK';
		$this->Language 				= 'IS';
	}

	public function checkHash()
	{
		$message = (
				$this->MerchantId . '|'
			.	$this->ReturnUrlSuccess . '|'
			.	$this->ReturnUrlSuccessServer . '|'
			.	$this->OrderId . '|'
			.	$this->Amount . '|'
			.	$this->Currency
		);

		return hash_hmac('sha256', $message, $this->SecretKey);
	}

	public function orderHash()
	{
		$message = (
				$this->OrderId . '|'
			.	$this->Amount . '|'
			.	$this->Currency
		);

		return hash_hmac('sha256', $message, $this->SecretKey);
	}

	public function verified($orderhash = '')
	{
		return $orderhash == $this->orderHash();
	}
}