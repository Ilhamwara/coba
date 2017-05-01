@extends('layouts.master')

@section('css')
{{-- <link rel="stylesheet" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css"> --}}
@endsection
@section('content')
@include('include.topbar')
<section class="page page--pa">
    @include('include.sidebar')
<div class="pa-right-col">
<br>
    <ul class="pa-breads pa-well">
        <li class="bread__item"><a href="{{url('memberarea')}}" class="bread__link">Dashboard</a></li>
        <li class="bread__item"><span class="bread__link bread__link--current">Wallet</span></li>
    </ul>

    <div class="pa-well">
      <h2 class="pa-well__title">My History</h2>
      <div class="table-responsive">
        <table class="pa-table">
            <thead>
                <tr>
                    <td class="text-center">Transaction</td>
                    <td class="text-center">Amount</td>
                    <td class="text-center">Status</td>
                    <td class="text-center">Date</td>
                </tr>
            </thead>
            <tbody>
            @foreach($trans as $data)
                <tr>
                    <td class="text-center">{{$data->payment}}</td>
                    <td class="text-center">{{$data->amount}}</td>
                    <td class="text-center">
                    @if($data->status == 0)
                        <label class="label label-warning">Pending</label>
                    @elseif($data->status == 1)
                        <label class="label label-success">Success</label>
                    @endif
                    </td>
                    <td class="text-center">{{date('d-m-Y',strtotime($data->created_at))}}</td>
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
{{-- <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script> --}}
<script>
    // $(document).ready(function(){
    //     $('#myTable').DataTable();
    // });
</script>
@endsection