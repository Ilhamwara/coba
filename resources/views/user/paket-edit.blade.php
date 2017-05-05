@extends('layouts.master')

@section('css')
<link rel="stylesheet" href="{{asset('css/bootstrapv3.css')}}">
<style>
    .coba{
        background: #f4f8f9;
        border-radius: 2px;
        border: 1px solid #d9e1e5;
        font-size: 14px;
        color: #072e41;
        outline: none;
        width: 100%;
        font-family: 'Open Sans';
        height: 45px;
    }
</style>
@endsection
@section('content')
@include('include.topbar')
<section class="page page--pa">
    @include('include.sidebar')

    <div class="pa-right-col">
        <br>
        <ul class="pa-breads pa-well">
            <li class="bread__item"><a href="{{url('memberarea')}}" class="bread__link">Dashboard</a></li>
            <li class="bread__item"><a href="{{url('setting')}}" class="bread__link">Package Data</a></li>
            <li class="bread__item"><span class="bread__link bread__link--current">Edit Package</span></li>
        </ul>

        <div class="profile-settings pa-well pa-well--pad">
            <div class="">
                <div class="tab-content">
                    <div class="row tab-pane active" id="tab_1">
                        <h2 class="pa-well__title"><b>Edit Package</b></h2>
                        @include('include.alert')
                        <form action="{{url('paket/edit/'.$paket->id)}}" method="POST">
                            {{csrf_field()}}
                        <div class="form-group  col-md-8 col-md-offset-2 ">
                             <label>Name</label>
                             <input type="text" placeholder="Your Name" value="{{$paket->nama}}" class="input input--sm input--block"  name="nama">
                         </div>

                         <div class="form-group  col-md-8 col-md-offset-2 ">
                             <label>Price</label>
                             <div class="input-group">
                                <span class="input-group-addon" id="basic-addon1">$</span>
                                <input type="number" min="0" value="{{$paket->price}}" class="form-control coba"  name="price">
                             </div>
                         </div>
                         <div class="form-group  col-md-8 col-md-offset-2 ">
                             <label>Daily</label>
                             <div class="input-group">
                                <span class="input-group-addon" id="basic-addon1">%</span>
                                <input type="number" min="0" step="0.1" value="{{$paket->daily}}" class="form-control coba"  name="daily">
                             </div>
                         </div>
                         <div class="form-group  col-md-8 col-md-offset-2 ">
                             <label>Monthly</label>
                             <div class="input-group">
                                <span class="input-group-addon" id="basic-addon1">%</span>
                                <input type="number" min="0" step="0.1" value="{{$paket->monthly}}" class="form-control coba"  name="monthly">
                             </div>
                         </div>
                         <div class="form-group  col-md-8 col-md-offset-2 ">
                             <label>Contract</label>
                             <div class="input-group">
                                <span class="input-group-addon" id="basic-addon1">Days</span>
                                <input type="number" min="0" value="{{$paket->contract}}" class="form-control coba"  name="contract">
                            </div>
                         </div>
                         <div class="form-group  col-md-8 col-md-offset-2 ">
                             <label>Total Benefit</label>
                             <div class="input-group">
                                <span class="input-group-addon" id="basic-addon1">%</span>
                                <input type="number" min="0" step="0.1" value="{{$paket->total_benefit}}" class="form-control coba"  name="total_benefit">
                            </div>
                         </div>
                         <div class="form-group  col-md-8 col-md-offset-2 ">
                             <label>Referal</label>
                             <div class="input-group">
                                <span class="input-group-addon" id="basic-addon1">%</span>
                                <input type="number" min="0" step="0.1" value="{{$paket->referal}}" class="form-control coba"  name="referal">
                            </div>
                         </div>
                         <div class="form-group  col-md-8 col-md-offset-2 ">
                             <label>Pairing</label>
                             <div class="input-group">
                                <span class="input-group-addon" id="basic-addon1">%</span>
                                <input type="number" min="0" step="0.1" value="{{$paket->pairing}}" class="form-control coba"  name="pairing">
                            </div>
                         </div>
                         <div class="form-group  col-md-8 col-md-offset-2 ">
                             <label>Max Pairing</label>
                             <div class="input-group">
                                <span class="input-group-addon" id="basic-addon1">$</span>
                                <input type="number" min="0" value="{{$paket->max_pairing}}" class="form-control coba"  name="max_pairing">
                            </div>
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