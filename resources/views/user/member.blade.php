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
        <li class="bread__item"><span class="bread__link bread__link--current">Members</span></li>
    </ul>

    <div class="pa-well">
      <h2 class="pa-well__title"><b>Members Data</b></h2>
      <div class="table-responsive">
      @include('include.alert')
        <table class="table table-striped" id="myTable">
            <thead>
                <tr>
                    <th class="text-center">Name</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Package</th>
                    <th class="text-center">Phone</th>
                    <th class="text-center">Status</th>
                </tr>
            </thead>
            <tbody>
            @foreach($member as $data)
                <tr>
                    <td class="text-center">{{$data->name}}</td>
                    <td class="text-center">{{$data->email}}</td>
                    <td class="text-center">{{$data->nama}}</td>
                    <td class="text-center">{{$data->phone}}</td>
                    <td class="text-center">
                        @if($data->aktif == 1)
                            <a class="btn-active">Active</a>
                        @else
                            <a href="{{url('confirm/'.$data->hashid)}}" onclick="return confirm('Are you sure to make this member active ?');" class="btn-pending">Pending</a>
                        @endif
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