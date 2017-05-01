@extends('layouts.master')
@section('content')
<div class="fluid-container signpage">
    <div class="clearfix">
        <div class="col-md-6  vertical-center">
            <form action="{{url('login')}}" method="POST" class="block">
            {{csrf_field()}}
                <h1 class="pa-well__title pa-well__title--sign text-center" style="font-family: 'Open Sans';">Login Area</h1>
                @include('include.alert')
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="form-group ">
                            <label for="email" class="label label--block">E-mail</label>
                            <input type="email" id="email" name="email" placeholder="Enter your Email" class="input input--sm input--block">
                        </div>
                    </div>
                    <div class="col-md-8 col-md-offset-2">
                        <div class="form-group ">
                            <label for="password" class="label label--block">Password</label>
                            <input type="password" id="password" name="password" placeholder="Enter your Password" class="input input--sm input--block">
                        </div>
                    </div>
                </div>
                <div class="captcha">
                </div>
                <div class="text-center">
                    <input type="submit" value="Login" class="btn btn--big">
                </div>
            </form>
        </div>


        <div class="col-md-6 sign-right   vertical-center text-center">
            <div class="block">
                <div class="text-center">
                    <img src="{{asset('img/logo.png')}}" alt="" class="sign__logo img-responsive" style="width:250px;">
                    <p class="text text--white text--sign">
                        Innovative trade tools<br>are alredy here at your fingertips
                    </p>
                    <div class="text-center">

                        <a href="{{url('register')}}" class="btn btn--big btn--signpage">Register</a>
                    </div>
                </div>
                <div class="nav-top__soc nav-top__soc--sign">
                    <a href="" class="soc-top__link soc-top__link--fb soc-top__link--right"></a>
                    <a href="" class="soc-top__link soc-top__link--vk soc-top__link--right"></a>
                    <a href="" class="soc-top__link soc-top__link--inst soc-top__link--right"></a>
                    <a href="" class="soc-top__link soc-top__link--yt soc-top__link--right"></a>
                    <a href="" class="soc-top__link soc-top__link--gp soc-top__link--right"></a>
                </div>
                <div class="right-nav__copy">
                    Crypto Market Trade
                </div>
            </div>
        </div>  
    </div>
</div>
@endsection