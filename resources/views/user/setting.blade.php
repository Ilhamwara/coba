@extends('layouts.master')
@section('content')

@include('include.topbar')
<section class="page page--pa">
    @include('include.sidebar')
<div class="pa-right-col">
<br>
    <ul class="pa-breads pa-well">
        <li class="bread__item"><a href="{{url('memberarea')}}" class="bread__link">Dashboard</a></li>
        <li class="bread__item"><span class="bread__link bread__link--current">Setting</span></li>
    </ul>

    <div class="row">
        <div class="col-md-6">
            <div class="pa-well pa-well--wallet">
                <h3 class="pa-well__title text-center">Change Password</h3>
                <div class="pa-btn-group text-center">
                    <a href="{{url('View')}}" class="pa-btn">View</a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="pa-well pa-well--wallet">
                <h3 class="pa-well__title text-center">Setting Package</h3>
                <div class="pa-btn-group text-center">
                    <a href="{{url('withdraw')}}" class="pa-btn">View</a>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
@endsection