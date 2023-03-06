  <div class="header">
    <div class="logo">
    
    <a href="{{url(Helpers::admin_url('dashboard'))}}"><img style="height: auto;width: 150px;" src="{{asset('assets/images/logo.png')}}" alt="" /></a>
    </div>
    <div class="headerinner">
        <ul class="headmenu">
            <li class="right">
                <div class="userloggedinfo">
                    <div class="userinfo">
                        <h5>{{ Auth::user()->name }} <small>- {{ Auth::user()->email }}</small></h5>
                        <ul>
                            <li><a href="{{url(Helpers::admin_url('edit_profile'))}}">Edit Profile</a></li>
                            <li><a href="{{url(Helpers::admin_url('logout'))}}">Sign Out</a></li>
                        </ul>
                    </div>
                </div>
            </li>
        </ul><!--headmenu-->
    </div>
</div>