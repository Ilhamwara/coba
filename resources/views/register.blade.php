@extends('layouts.master')
@section('css')
@endsection
@section('content')
<div class="fluid-container signpage">
    <div class="clearfix">
        <div class="col-md-6 vertical-center">
            <form action="{{url('register')}}" class="block" method="POST">
                {{csrf_field()}}
                <h1 class="pa-well__title pa-well__title--sign text-center" style="font-family: 'Open Sans';">
                    Registration area
                </h1>
                @if(!empty($user))
                    <h6 class="pa-well__title pa-well__title--sign text-center">
                        ajsgahsgjhags
                    </h6>
                @endif
                @include('include.alert')
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="form-group ">
                            <label class="label label--block">
                                E-mail*
                            </label>
                            <input class="input input--sm input--block" name="email" placeholder="Enter Your Email" required type="email"></input>
                        </div>
                    </div>
                    <div class="col-md-8 col-md-offset-2">
                        <div class="form-group ">
                            <label class="label label--block">
                                Password*
                            </label>
                            <input class="input input--sm input--block" name="password" placeholder="Enter Your Password" required type="password"></input>
                        </div>
                    </div>
                    <div class="col-md-8 col-md-offset-2">
                        <div class="form-group">
                            <label class="label label--block">
                                Full Name
                                <span>
                                    *
                                </span>
                            </label>
                            <input class="input input--sm input--block" name="nama" placeholder="Enter Your Name" required type="text">
                        </div>
                    </div>

                    @if(empty($user))
                    <div class="col-md-8 col-md-offset-2">
                        <div class="form-group">
                            <label class="label label--block">
                                Sponsor Code
                                <span>
                                    *
                                </span>
                            </label>
                            <input class="input input--sm input--block" name="kode" placeholder="Enter Code Sponsor" required type="text"/>
                        </div>
                    </div>
                    @else
                    <input type="hidden" name="kode"  value="{{$user->hashid}}">
                    @endif

                    <div class="col-md-8 col-md-offset-2">
                        <div class="form-group">
                            <label class="label label--block">
                                Position
                                <span>
                                    *
                                </span>
                            </label>
                            <select class="input input--sm input--block" name="posisi" required>
                                <option value="kanan">Right</option>
                                <option value="kiri">Left</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-8 col-md-offset-2">
                        <div class="form-group">
                            <label class="label label--block">
                                Package
                                <span>
                                    *
                                </span>
                            </label>
                            <select class="input input--sm input--block" name="paket" required>
                                @foreach($paket as $data)
                                <option value="{{$data->id}}">
                                    {{$data->nama}} - ${{$data->price}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <input class="btn btn--big" type="submit" value="Register">
                    </input>
                </div>
            </form>
        </div>
        <div class="col-md-6 sign-right vertical-center text-center">
            <div class="block">
                <div class="text-center">
                    <img alt="" class="sign__logo img-responsive" src="{{asset('img/logo.png')}}" style="width:250px;">
                        <p class="text text--white text--sign">
                            Innovative trade tools
                            <br>
                                are alredy here at your fingertips
                            </br>
                        </p>
                        <div class="text-center">
                            <a class="btn btn--big btn--signpage" href="{{url('/')}}">
                                Login
                            </a>
                        </div>
                    </img>
                </div>
                <div class="nav-top__soc nav-top__soc--sign">
                    <a class="soc-top__link soc-top__link--fb soc-top__link--right" href="">
                    </a>
                    <a class="soc-top__link soc-top__link--vk soc-top__link--right" href="">
                    </a>
                    <a class="soc-top__link soc-top__link--inst soc-top__link--right" href="">
                    </a>
                    <a class="soc-top__link soc-top__link--yt soc-top__link--right" href="">
                    </a>
                    <a class="soc-top__link soc-top__link--gp soc-top__link--right" href="">
                    </a>
                </div>
                <div class="right-nav__copy">
                    Crypto Market Trade
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Start of LiveChat (www.livechatinc.com) code -->
@endsection
