<nav class="top-menu top-menu--inverse js-topmenu">
  <div class="clearfix">
    <div class="row">
      <div class="col-md-3">
        <a href="{{url('memberarea')}}" class="logo">
          <img src="{{asset('img/logo2.png')}}" alt="" class="img-responsive" style="width:80px; ">
        </a>
      </div>
      <div class="col-md-9 top-menu__right">
        <div class="nav-top">
          <div class="dropdown-h dropdown-h--pa">
            <span class="dropdown-h__cur">
              <img src="{{asset('img/user.png')}}" width="30" class="img-circle">
              <span>{{$user->name}}</span>
            </span>
            <ul class="dropdown-h__list text-center">
              <li class="pa-text pa-text--grey">My Deposit</li>
              <li class="pa-money">$0.00</li>
              <li><a href="{{url('logout')}}" class="pa-btn text-center">Logout</a></li>
            </ul>

          </div>

        </div>
      </div><!-- col-md-9 -->
    </div><!-- row-->
    <button class="show-menu mobile">
      <span></span>
    </button>
  </div><!-- container -->
</nav><!--end top menu-->