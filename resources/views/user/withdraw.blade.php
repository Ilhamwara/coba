@extends('layouts.master')
@section('content')

@include('include.topbar')
<section class="page page--pa">
    @include('include.sidebar')
    <div class="pa-right-col">
    <br>
        <ul class="pa-breads pa-well">
            <li class="bread__item">
                <a class="bread__link" href="{{url('memberarea')}}">
                    Dashboard
                </a>
            </li>
            <li class="bread__item">
                <a class="bread__link" href="{{url('wallet')}}">
                    Wallet
                </a>
            </li>
            <li class="bread__item">
                <span class="bread__link bread__link--current">
                    withdraw
                </span>
            </li>
        </ul>
    
        <div class="pa-well pa-well--pad">
            <h2 class="pa-well__title">
                Withdraw Wallet.USD
            </h2>
            <form action="" method="post">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="label label--block" for="login">
                                Amount
                            </label>
                            <input class="input input--sm input--block" id="usd-amount" name="sum" onkeyup="exchange($(this), $('.exchange'), window.course)" placeholder="Enter amount in USD" type="text">
                            </input>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="label label--block" for="pay_method">
                                Payment gate
                            </label>
                            <select class="input input--sm input--block" id="pay_method" name="gateway" placeholder="Choose a payment system">
                                <option class="btn-gateway" data-data='{"code":"perfectmoney", "course":""}' value="perfectmoney">
                                    Paypal
                                </option>
                                <option class="btn-gateway" data-data='{"code":"advcash", "course":""}' value="advcash">
                                    Arthacoin
                                </option>
                                <option class="btn-gateway" data-data='{"code":"bitcoin", "course":"0.00072640"}' value="bitcoin">
                                    Midtrans
                                </option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="pay-form__submit">
                    <input class="btn btn--big" type="submit" value="Withdrawal">
                    </input>
                </div>
            </form>
        </div>
        <div class="modal fade" id="gatewayConfirmation" role="dialog" tabindex="-1">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                            <span aria-hidden="true">
                                ×
                            </span>
                        </button>
                        <h4 class="modal-title">
                            Error selecting payment gateway
                        </h4>
                    </div>
                    <div class="modal-body">
                        <p>
                            For the withdrawal it is acceptable to select only those payment gateways which produced the input means.
                        </p>
                        <p>
                            You the available payment gateways:                                    Perfectmoney,                                                AdvCash,                                                Bitcoin,                                                Ethereum.
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button class="btn" data-dismiss="modal" type="button">
                            Close this message
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
