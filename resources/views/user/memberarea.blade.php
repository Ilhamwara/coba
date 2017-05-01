@extends('layouts.master')
@section('css')
<style>
    .hours,.days,.minutes,.seconds{
    padding: 10px;
    background: #1abc9c;
    border-radius: 3px;
    margin:0px 10px;
    font-family: 'Open Sans';
    font-size: 17px;
    font-weight: bold;
    color: #fff;
}
.clock > li{display: inline;}
@media (max-width: 991px) {
    .clock > li{display: inline; margin-top:100px; }
    .minutes,.seconds{
        display: none;
    }
    .box-icon{display: none;}
}
@media (max-width: 320px) {
    .hours,.days{padding: 5px; margin: 0px 3px;}
}
.box-icon{padding: 15px;}
.pa-well--withhover .box-icon > i{color: #3083c7; transition: .3s all; }
.pa-well--withhover:hover .box-icon > i{color: #fff;}
</style>
@endsection
@section('content')
@include('include.topbar')
<section class="page page--pa">
    @include('include.sidebar')
    <div class="pa-right-col">
        <br>
            <ul class="pa-breads pa-well">
                <li class="bread__item">
                    <span class="bread__link bread__link--current">
                        Dashboard
                    </span>
                </li>
            </ul>
            <div class="row">
                <div class="col-md-12">
                    <div class="pa-well" style="padding: 30px;">
                        <h3 class="pa-well__title text-center">
                            Time Remaining
                        </h3>
                        <br>
                            <br>
                                @php
                                    $tgl1 = date('m/d/Y', strtotime($user->created_at));
                                    $tgl2 = date('m/d/Y', strtotime('+180 days', strtotime($tgl1)));                        
                                @endphp
                                <div class="text-center">
                                    <div id="clock"></div>
                                </div>
                            </br>
                        </br>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 pa-income">
                    <div class="col-md-6">
                        <div class="pa-well pa-well--withhover">
                            <div class="clearfix">
                                <div class="col-xs-3 text-center">
                                    <div class="box-icon">
                                        <i class="fa fa-dollar fa-3x">
                                        </i>
                                    </div>
                                </div>
                                <div class="col-xs-9">
                                    <p class="pa-income__text">
                                        Daily Benefits
                                    </p>
                                    <div class="pa-money">0</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="pa-well pa-well--withhover">
                            <div class="clearfix">
                                <div class="col-xs-3 text-center">
                                    <div class="box-icon">
                                        <i class="fa fa-dollar fa-3x">
                                        </i>
                                    </div>
                                </div>
                                <div class="col-xs-9">
                                    <p class="pa-income__text">
                                        Monthly Benefits
                                    </p>
                                    <div class="pa-money js-count-to">0</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="pa-well pa-well--withhover">
                            <div class="clearfix">
                                <div class="col-xs-3 text-center">
                                    <div class="box-icon">
                                        <i class="fa fa-dollar fa-3x">
                                        </i>
                                    </div>
                                </div>
                                <div class="col-xs-9">
                                    <p class="pa-income__text">
                                        Referral Benefits
                                    </p>
                                    <div class="pa-money js-count-to">0</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="pa-well pa-well--withhover">
                            <div class="clearfix">
                                <div class="col-xs-3 text-center">
                                    <div class="box-icon">
                                        <i class="fa fa-dollar fa-3x">
                                        </i>
                                    </div>
                                </div>
                                <div class="col-xs-9">
                                    <p class="pa-income__text">
                                        Pairing Benefits
                                    </p>
                                    <div class="pa-money js-count-to">0</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="pa-well pa-well--wallet">
                        <h3 class="pa-well__title text-center">
                            Wallet.USD
                        </h3>
                        <p class="pa-text text-center">
                            The balance of personal wallet
                        </p>
                        <div class="pa-money text-center">
                            $0.00
                        </div>
                        <div class="pa-btn-group text-center">
                            <a class="pa-btn" href="{{url('withdraw')}}">
                                Withdraw
                            </a>
                            <a class="pa-link pa-link--xs pa-link--light block mrt20" href="{{url('history')}}">
                                View History
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </br>
    </div>
</section>
<!-- Start of LiveChat (www.livechatinc.com) code -->
@endsection
@section('js')
<script src="{{asset('js/jquery.countdown.js')}}">
</script>
<script type="text/javascript">
    var tgl = '{{$tgl2}}';
$('#clock').countdown(tgl, function(event) {
      var $this = $(this).html(event.strftime(''
        + '<ul class="clock"><li><span class="days">%D Days</span></li>'
        + '<li><span class="hours">%H Hr</span></li>'
        + '<li><span class="minutes">%M Min</span></li> '
        + '<li><span class="seconds">%S Sec</span></li></ul>'));
  });
</script>
@endsection
