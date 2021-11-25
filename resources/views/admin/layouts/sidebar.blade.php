<aside class="main-sidebar">
    <section class="sidebar">	
        <div class="user-profile">
            <div class="ulogo">
                <a href="{{route('admin')}}">
                    <h3><b>Fx</b>Bitrade</h3>
                </a>
            </div>
        </div>
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header nav-small-cap">MAIN</li>
            <li class="{{ Request::is('admin/dashboard') ? 'active' : '' }}">
                <a href="{{ route('admin') }}">
                    <i class="ti-dashboard"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="{{ Request::is('admin/users') ? 'active' : '' }}">
                <a href="{{ route('users') }}">
                    <i class="ti-user"></i>
                    <span>Users</span>
                </a>
            </li> 
            <li class="{{ Request::is('admin/transactions') ? 'active' : '' }}">
                <a href="{{ route('transactions') }}">
                    <i class="ti-list"></i>
                    <span>Transactions</span>
                </a>
            </li>
            <li class="{{ Request::is('admin/withdrawal_requests') ? 'active' : '' }}">
                <a href="{{ route('withdrawalRequests') }}">
                    <i class="ti-list"></i>
                    <span>Withdrawal Requests</span>
                </a>
            </li> 
            <li class="header nav-small-cap">SYSTEM</li>	
            <li class="{{ Request::is('admin/currencies') ? 'active' : '' }}">
                <a href="{{ route('currencies') }}">
                    <i class="ti-money"></i>
                    <span>Currency</span>
                </a>
            </li> 
            <li class="{{ Request::is('admin/plans') ? 'active' : '' }}">
                <a href="{{ route('adminPlans') }}">
                    <i class="ti-view-list"></i>
                    <span>Plans</span>
                </a>
            </li>
            <li class="{{ Request::is('admin/profile') ? 'active' : '' }}">
                <a href="{{ route('adminProfile') }}">
                    <i class="ti-settings"></i>
                    <span>Settings</span>
                </a>
            </li>            
            <li class="header nav-small-cap">ACTION</li>		  
            <li>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="ti-power-off"></i>
                    <span>Log Out</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li> 
        </ul>
    </section>
</aside>