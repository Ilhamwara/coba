@extends('layouts.master')

@section('css')
<link rel="stylesheet" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="{{asset('css/bootstrapv3.css')}}">
<style>
    .btn-active{padding: 10px; background: #2ecc71; color: #fff!important; text-decoration: none!important;}
    .btn-pending{padding: 10px; background: #f1c40f; color: #fff!important; text-decoration: none!important;}
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
        <li class="bread__item"><span class="bread__link bread__link--current">Package Data</span></li>
    </ul>

    <div class="pa-well">
      <h2 class="pa-well__title"><b>Package Data</b></h2>
      <div class="table-responsive">
      @include('include.alert')
        <table class="table table-hover table-striped" id="myTable">
            <thead>
                <tr>
                    <th class="text-center">Name</th>
                    <th class="text-center">Price</th>
                    <th class="text-center">Daily</th>
                    <th class="text-center">Monthly</th>
                    <th class="text-center">Contract</th>
                    <th class="text-center">Total Benefit</th>
                    <th class="text-center">Referal</th>
                    <th class="text-center">Pairing</th>
                    <th class="text-center">Max Pairing</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($paket as $data)
                <tr>
                    <td class="text-center"><b>{{$data->nama}}</b></td>
                    <td class="text-center">${{$data->price}}</td>
                    <td class="text-center">{{$data->daily}}%</td>
                    <td class="text-center">{{$data->monthly}}%</td>
                    <td class="text-center">{{$data->contract}} Days</td>
                    <td class="text-center">{{$data->total_benefit}}%</td>
                    <td class="text-center">{{$data->referal}}%</td>
                    <td class="text-center">{{$data->pairing}}%</td>
                    <td class="text-center">${{$data->max_pairing}}</td>
                    <td class="text-center">
                        <a href="{{url('paket/edit/'.$data->id)}}" class="btn btn-sm btn-info">Edit</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>
</section>
@endsection
@section('js')
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function(){
        $('#myTable').DataTable();
    });
</script>
@endsection