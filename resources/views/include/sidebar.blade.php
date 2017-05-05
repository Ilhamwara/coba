<nav class="right-nav">
    <h2 class="right-nav__title">
        Member Area
    </h2>
    <a class="right-nav__show" href="#">
    </a>
    <ul class="clearfix pa-navigation">
        <li class="pa-navigation__item">
            <a class="pa-navigation__link @if(Request::is('memberarea')) pa-navigation__link--active @endif" href="{{url('memberarea')}}">
                <span>
                    Dashboard
                </span>
            </a>
        </li>
        <li class="pa-navigation__item">
            <a class="pa-navigation__link pa-navigation__link--team " data-parent="#MainMenu" data-toggle="collapse" href="#network">
                <span>Genealogy</span>
            </a>
            <div class="collapse" id="network">
                <ul class="clearfix pa-navigation" style="padding-bottom: 10px;">
                    <li class="pa-navigation__item">
                      <a class="pa-navigation__link" href="{{url('downline')}}">My Downline</a>
                    </li>
                   {{--  <li class="pa-navigation__item">
                      <a class="pa-navigation__link" href="{{url('')}}">Tree View</a>
                    </li> --}}
                    @if(Auth::user()->level == 'admin')
                        <li class="pa-navigation__item">
                            <a class="pa-navigation__link" href="{{url('member')}}">Member</a>
                        </li>
                    @endif
                </ul>
            </div>
        </li>
        <li class="pa-navigation__item">
            <a class="pa-navigation__link pa-navigation__link--billing " href="{{url('wallet')}}">
                <span>
                    Wallet
                </span>
            </a>
        </li>
        <li class="pa-navigation__item">
            <a class="pa-navigation__link pa-navigation__link--settings @if(Request::is('profile')) pa-navigation__link--active @endif " data-parent="#MainMenu" data-toggle="collapse" href="#profile">
                <span>Profile settings</span>
            </a>
            <div class="collapse" id="profile">
                <ul class="clearfix pa-navigation" style="padding-bottom: 10px;">
                    <li class="pa-navigation__item">
                      <a class="pa-navigation__link" href="{{url('profile')}}">My Profile</a>
                    </li>
                    <li class="pa-navigation__item">
                      <a class="pa-navigation__link" href="{{url('edit')}}">Edit Profile</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="pa-navigation__item">
            <a class="pa-navigation__link pa-navigation__link--docs @if(Request::is('history')) pa-navigation__link--active @endif " href="{{url('history')}}">
                <span>
                    History
                </span>
            </a>
        </li>
        @if(Auth::user()->level == 'admin')
        <li class="pa-navigation__item">
            <a class="pa-navigation__link pa-navigation__link--settings @if(Request::is('setting')) pa-navigation__link--active @endif " href="{{url('setting')}}">
                <span>
                    Setting
                </span>
            </a>
        </li>
        @endif
    </ul>
    <div class="nav-top__soc nav-top__soc--right">
        <a class="soc-top__link soc-top__link--right soc-top__link--fb" href=""></a>
        <a class="soc-top__link soc-top__link--right soc-top__link--vk" href=""></a>
        <a class="soc-top__link soc-top__link--right soc-top__link--inst" href=""></a>
        <a class="soc-top__link soc-top__link--right soc-top__link--yt" href=""></a>
        <a class="soc-top__link soc-top__link--right soc-top__link--gp" href=""></a>
    </div>
    <div class="right-nav__copy">
        Crypto Market Trade
    </div>
    <div class="right-nav__links">
        <a class="" href="">
            Terms&Conditions;
        </a>
        <br>
            <a class="" href="">
                Privacy Policy
            </a>
        </br>
    </div>
</nav>