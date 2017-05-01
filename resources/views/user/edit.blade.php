@extends('layouts.master')
@section('content')

@include('include.topbar')
<section class="page page--pa">
    @include('include.sidebar')

    <div class="pa-right-col">
        <br>
        <ul class="pa-breads pa-well">
            <li class="bread__item"><a href="{{url('memberarea')}}" class="bread__link">Dashboard</a></li>
            <li class="bread__item"><span class="bread__link bread__link--current">Profile</span></li>
        </ul>

        <div class="profile-settings pa-well pa-well--pad">
            <div class="">
                <ul class="tab-list text-center">
                    <li class="active"><a href="#tab_1"  data-toggle="tab" class="pa-btn pa-btn--tab">Account settings</a></li>
                </ul>
                <div class="tab-content">
                    <div class="row tab-pane active" id="tab_1">
                        <h2 class="pa-well__title">Account settings</h2>
                        @include('include.alert')
                        <form action="{{url('profile')}}" method="POST">
                            {{csrf_field()}}
                            <div class="form-group  col-md-8 col-md-offset-2 ">
                             <label class="label label--block">Full Name</label>
                             <input type="text" placeholder="Your Name" value="{{$user->name}}" class="input input--sm input--block"  name="name">
                         </div>
                         <div class="form-group  col-md-8 col-md-offset-2 ">
                            <label class="label label--block">Address</label>
                            <textarea name="address" cols="30" rows="10" placeholder="Your Address" style="height: auto;">{{$user->address}}</textarea>
                        </div>
                        <div class="form-group  col-md-8 col-md-offset-2 ">
                            <label class="label label--block">Phone Number</label>
                            <input type="text" placeholder="Your Phone Number" value="{{$user->phone}}" class="input input--sm input--block" name="phone">
                        </div>
                        <div class="form-group  col-md-8 col-md-offset-2 ">
                            <label class="label label--block">E-mail</label>
                            <input type="email" placeholder="Your E-mail" value="{{$user->email}}" class="input input--sm input--block" name="email">
                        </div>
                        <div class="form-group  col-md-8 col-md-offset-2 ">
                            <label class="label label--block">Passport / ID</label>
                            <input type="text" placeholder="Passport / ID" value="{{$user->passport}}" class="input input--sm input--block" name="passport">
                        </div>
                        <div class="form-group  col-md-8 col-md-offset-2 ">
                            <label class="label label--block">Utility</label>
                            <input type="text" placeholder="Utility" value="{{$user->utility}}" class="input input--sm input--block" name="utility">
                        </div>
                        <div class="form-group  col-md-8 col-md-offset-2 ">
                            <label class="label label--block">Wallet Addres</label>
                            <input type="text" placeholder="Wallet Addres" value="{{$user->wallet}}" class="input input--sm input--block" name="wallet">
                        </div>
                        <div class="form-group  col-md-8 col-md-offset-2  ">
                            <label for="password_repeat" class="label label--block">Password</label>
                            <input type="password" name="password" placeholder="You Password" value="{{$user->password}}" class="input input--sm input--block" name="pass">
                        </div>
                        <div class="form-group col-md-8 col-md-offset-2 ">
                            <button class="pa-btn">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection