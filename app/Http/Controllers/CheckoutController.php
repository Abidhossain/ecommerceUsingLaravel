<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Shipping;
use App\Order;
use App\Payment;
use App\OrderDetails;
use Cart;
use DB;
use Session;
class CheckoutController extends Controller
{
    public function checkout(){
    	return view('layouts.cart.checkoutContent');
    }
    public function customerRegistration(Request $request){
 		$customer = new Customer();

	 		$customer->firstName = $request->firstName;
	 		$customer->lastName = $request->lastName;
	 		$customer->emailAddress = $request->emailAddress;
	 		$customer->password = $request->password;
	 		$customer->address = $request->address;
	 		$customer->phoneNumber = $request->phoneNumber;
	 		$customer->districtName = $request->districtName; 
	 		$customer->save(); 

	    	$customerId = $customer->id;
	    	 Session::put('customerId',$customerId);
	    	 return redirect('/checkout/shipping');
    }
    public function showShippingForm(){ 
    	$customerId = Session::get('customerId');
    	$customerById = Customer::where('id',$customerId)->first();
    	return view('layouts.cart.shippingContent',compact('customerById'));
    }
    public function saveShippingData(Request $request){
    	$shipping = new Shipping(); 
	 		$shipping->fullName = $request->fullName;
	 		$shipping->emailAddress = $request->emailAddress; 
	 		$shipping->address = $request->address;
	 		$shipping->phoneNumber = $request->phoneNumber;
	 		$shipping->districtName = $request->districtName; 
	 		$shipping->save(); 

	    	$shippingId = $shipping->id;
	    	 Session::put('shippingId',$shippingId);
	    	 return redirect('/checkout/payment');
    }
    public function showPaymentForm(){
    	return view('layouts.cart.paymentContent');
    }
    public function savePaymentInfo(Request $request){
    	$paymentInfo = $request->paymentType; 
    	if($paymentInfo == 'cashOnDelivery'){
    		$order = new Order();
    		$order->customerId = Session::get('customerId');
    		$order->shippingId = Session::get('shippingId');
    		$order->orderTotal = Session::get('orderTotal');
    		$order->save();
    		$orderId = $order->id;
    		Session::put('orderId', $orderId);


    		$payment = new Payment();
    		$payment->orderId = Session::get('orderId');
    		$payment->paymentType = $paymentInfo;
    		$payment->save();

    		$orderDetails = new OrderDetails();
    		$cartProducts = Cart::content();
    		foreach($cartProducts as $cartData){
	    		$orderDetails->orderId = Session::get('orderId');
	    		$orderDetails->productId = $cartData->id;
	    		$orderDetails->productName = $cartData->name;
	    		$orderDetails->productPrice = $cartData->price;
	    		$orderDetails->productQuantity = $cartData->qty;
	    		$orderDetails->save();
	    		Cart::remove($cartData->rowId );
    		}
    		return redirect('/checkout/my-home');
    	}elseif($paymentInfo == 'bkash'){
    		return 'Under Construction Bkash Payment Please Payment on Handcash';
    	}elseif($paymentInfo == 'paypal'){
    		return 'Under Construction Bkash Payment Please Payment on Handcash';
    	}
    }
    public function customerHome(){
    		return view('layouts.customer.customerHome');
    }
}
