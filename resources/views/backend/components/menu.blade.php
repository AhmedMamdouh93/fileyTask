<div id="left-sidebar" class="sidebar">
    <div class="navbar-brand">
        <button type="button" class="btn-toggle-offcanvas btn btn-sm float-right"><i class="lnr lnr-menu icon-close"></i></button>
    </div>
    <div class="sidebar-scroll">
        <div class="user-account">
            <div class="user_div">
                <img src="{{ asset('uploads/backend/users/'.Auth::user()->avatar) }}" class="user-photo" alt="User Profile Picture">
            </div>
            <div class="dropdown">
                <span>Welcome</span>
                <a href="javascript:void(0);" class="dropdown-toggle user-name" data-toggle="dropdown"><strong>{{ Auth::user()->name }}</strong></a>
                <ul class="dropdown-menu dropdown-menu-right account vivify flipInY">
                    <li><a href="app-inbox.html"><i class="icon-envelope-open"></i>Messages</a></li>
                    <li><a href="javascript:void(0);"><i class="icon-settings"></i>Settings</a></li>
                    <li class="divider"></li>
                    <li><a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        <i class="icon-power"></i>Logout
                    </a>

                        @csrf
                    </form></li>
                </ul>
            </div>                
        </div>  
        <nav id="left-sidebar-nav" class="sidebar-nav">
            <ul id="main-menu" class="metismenu">

                <li class="active">
                    <a href="#myPage" class="has-arrow"><i class="icon-notebook"></i><span>Jobs</span></a>
                    <ul>
                        <li><a href="{{ route('get.jobs') }}">All Jobs</a></li>
                    </ul>
                </li>
                

                
            </ul>
        </nav>     
    </div>
</div>