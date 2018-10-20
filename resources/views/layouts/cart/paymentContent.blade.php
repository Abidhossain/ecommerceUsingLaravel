@extends('layouts.master')

@section('title')
Payment | Ecommerce
@endsection

@section('mainContent')

<hr/>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="well lead text-center text-success"> You have to give us product payment information to complete your valuable order.</div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
    <div class="col-lg-12">
        <h3 class="text-center">Payment Form </h3>
        <hr/>
        <div class="well box box-primary">
            {!! Form::open(['url'=>'/checkout/save-payment', 'method'=>'POST', 'name'=>'shippingForm']) !!}
            <div class="box-body">
                <div class="">
                    <label><input  type="radio" name="paymentType" value="cashOnDelivery"> Cash On Delivery</label>
                </div> 
            </div>
            <div class="box-body">
                <div class="">
                    <label><input type="radio" name="paymentType" value="bkash"> Bkash</label>
                </div> 
            </div>
            <div class="box-body">
                <div class="">
                    <label><input type="radio" name="paymentType" value="paypal"> Paypal</label>
                </div> 
            </div>

            <!-- /.box-body -->
            <div class="box-footer"><br>
                <button type="submit" class="btn btn-primary">Order Now</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection