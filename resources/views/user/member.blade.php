@extends('layouts.master')

@section('css')
<link rel="stylesheet" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
@endsection
@section('content')
@include('include.topbar')
<section class="page page--pa">
    @include('include.sidebar')
<div class="pa-right-col">
<br>
    <ul class="pa-breads pa-well">
        <li class="bread__item"><a href="{{url('memberarea')}}" class="bread__link">Dashboard</a></li>
        <li class="bread__item"><span class="bread__link bread__link--current">Members</span></li>
    </ul>

    <div class="pa-well">
      <h2 class="pa-well__title">Members Data</h2>
      <div class="table-responsive">
        <table class="pa-table" id="myTable" style="width:100%; ">
            <thead>
                <tr>
                    <td class="text-center">Name</td>
                    <td class="text-center">Address</td>
                    <td class="text-center">Email</td>
                    <td class="text-center">Package</td>
                    <td class="text-center">Pasport</td>
                    <td class="text-center">Utility</td>
                </tr>
            </thead>
            <tbody>
            @foreach($member as $data)
                <tr>
                    <td class="text-center">{{$data->name}}</td>
                    <td class="text-center">{{$data->address}}</td>
                    <td class="text-center">{{$data->email}}</td>
                    <td class="text-center">{{$data->nama}}</td>
                    <td class="text-center">{{$data->pasport}}</td>
                    <td class="text-center">{{$data->utility}}</td>
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