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
                    <span class="bread__link bread__link--current">
                        Profile
                    </span>
                </li>
            </ul>
            <div class="profile-settings pa-well pa-well--pad">
                <div class="">
                    <div class="tab-content">
                        <div class="row tab-pane active" id="tab_1">
                            <h2 class="pa-well__title">
                                My Profile
                            </h2>
                            <div class="form-group col-md-8 col-md-offset-2 ">
                                <label class="label label--block">
                                    Full Name
                                </label>
                                <input class="input input--sm input--block" placeholder="Empty" readonly type="text" value="{{$user->name}}"></input>
                            </div>
                            <div class="form-group col-md-8 col-md-offset-2 ">
                                <label class="label label--block">
                                    Address
                                </label>
                                <textarea cols="30" placeholder="Empty" readonly rows="10" style="height: auto;">
                                    {{$user->address}}
                                </textarea>
                            </div>
                            <div class="form-group col-md-8 col-md-offset-2 ">
                                <label class="label label--block">
                                    Phone Number
                                </label>
                                <input class="input input--sm input--block" placeholder="Empty" readonly type="text" value="{{$user->phone}}"></input>
                            </div>
                            <div class="form-group col-md-8 col-md-offset-2 ">
                                <label class="label label--block">
                                    E-mail
                                </label>
                                <input class="input input--sm input--block" placeholder="Empty" readonly type="email" value="{{$user->email}}"></input>
                            </div>
                            <div class="form-group col-md-8 col-md-offset-2 ">
                                <label class="label label--block">
                                    Passport / ID
                                </label>
                                <input class="input input--sm input--block" placeholder="Empty" readonly type="text" value="{{$user->passport}}"></input>
                            </div>
                            <div class="form-group col-md-8 col-md-offset-2 ">
                                <label class="label label--block">
                                    Utility
                                </label>
                                <input class="input input--sm input--block" placeholder="Empty" readonly type="text" value="{{$user->utility}}"></input>
                            </div>
                            <div class="form-group col-md-8 col-md-offset-2 ">
                                <label class="label label--block">
                                    Wallet Addres
                                </label>
                                <input class="input input--sm input--block" placeholder="Empty" readonly type="text" value="{{$user->wallet}}"></input>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </br>
    </div>
</section>
@endsection
