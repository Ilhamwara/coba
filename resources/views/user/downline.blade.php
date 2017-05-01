@extends('layouts.master')
@section('content')

@include('include.topbar')
<style>
    .tree ul {
    padding-top: 20px; position: relative;
    
    transition: all 0.5s;
    -webkit-transition: all 0.5s;
    -moz-transition: all 0.5s;
}

.tree li {
    float: left; text-align: center;
    list-style-type: none;
    position: relative;
    padding: 20px 5px 0 5px;
    
    transition: all 0.5s;
    -webkit-transition: all 0.5s;
    -moz-transition: all 0.5s;
}

/*We will use ::before and ::after to draw the connectors*/

.tree li::before, .tree li::after{
    content: '';
    position: absolute; top: 0; right: 50%;
    border-top: 1px solid #ccc;
    width: 50%; height: 20px;
}
.tree li::after{
    right: auto; left: 50%;
    border-left: 1px solid #ccc;
}

.tree li:only-child::after, .tree li:only-child::before {
    display: none;
}

.tree li:only-child{ padding-top: 0;}

.tree li:first-child::before, .tree li:last-child::after{
    border: 0 none;
}

.tree li:last-child::before{
    border-right: 1px solid #ccc;
    border-radius: 0 5px 0 0;
    -webkit-border-radius: 0 5px 0 0;
    -moz-border-radius: 0 5px 0 0;
}
.tree li:first-child::after{
    border-radius: 5px 0 0 0;
    -webkit-border-radius: 5px 0 0 0;
    -moz-border-radius: 5px 0 0 0;
}


.tree ul ul::before{
    content: '';
    position: absolute; top: 0; left: 50%;
    border-left: 1px solid #ccc;
    width: 0; height: 20px;
}

.tree li a{
    border: 1px solid #ccc;
    padding: 10px;
    text-decoration: none;
    color: #666;
    display: inline-block;
    
    border-radius: 5px;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    
    transition: all 0.5s;
    -webkit-transition: all 0.5s;
    -moz-transition: all 0.5s;
}

.tree li a:hover, .tree li a:hover+ul li a {
    background: #c8e4f8; color: #000; border: 1px solid #94a0b4;
}

.tree li a:hover+ul li::after, 
.tree li a:hover+ul li::before, 
.tree li a:hover+ul::before, 
.tree li a:hover+ul ul::before{
    border-color:  #94a0b4;
}
</style>
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
                        Downline
                    </span>
                </li>
            </ul>
            <div class="pa-well pa-well--pad">
                <h2 class="pa-well__title">
                    Genealogy Tree
                </h2>
                <div class="row">
                    <div class="tree col-md-12">


                        <ul style="margin:0px auto;">
                            <li>
                                <a>{{Auth::user()->id}}</a>

                                @if(count($join) >0)
                                    <ul>
                                        @foreach($join as $a => $data)
                                            <li>
                                                <a>{{$data->member_id}}</a>
                                                @php $subnya[$a] = \App\JoinMember::where('parent_id',$data->member_id)->get(); @endphp
                                                @if(count($subnya[$a]) > 0)
                                                    <ul>
                                                        @foreach($subnya[$a] as $b => $data2)
                                                            <li><a href="">{{$data2->member_id}}</a></li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </br>
    </div>
</section>
@endsection
