<!DOCTYPE html>
<html>
<head>
    <title>Razor Pay</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @if($message = Session::get('error'))
                <div class="alert alert-danger alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <strong>Error!</strong> {{ $message }}
                </div>
            @endif

            @if($message = Session::get('success'))
                <div class="alert alert-info alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <strong>Success!</strong> {{ $message }}
                </div>
            @endif

            <div class="panel panel-default" style="margin-top: 30px;">
                <div class="panel-heading">
              
                    <h2>Pay With Razorpay -- Total Amount Rs {{$totalprice}}</h2>

                    <form action="{{url('payment')}}" method="POST" >
                    @csrf
                        <script src="https://checkout.razorpay.com/v1/checkout.js"
                                data-key="{{ env('RAZORPAY_KEY') }}"
                                data-amount="{{ $totalprice * 100 }}"
                                data-buttontext="Pay 10 INR"
                                data-name="Krishna Tomar"
                                data-description="Payment"
                                data-prefill.name="Kishan Kumar"
                                data-prefill.email="tomarkrishna339@gmail.com"
                                data-theme.color="#ff7529">
                        </script>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
