<aside class="main-sidebar">
    <section class="sidebar">	
        <div class="user-profile">
            <div class="ulogo">
                <a href="{{ route('user') }}">
                <h3><b>Fx</b>Bitrade</h3>
                </a>
            </div>
        </div>
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header nav-small-cap">PERSONAL</li>
            <li class="{{ Request::is('user/dashboard') ? 'active' : '' }}">
                <a href="{{ route('user') }}">
                    <i class="ti-dashboard"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="header nav-small-cap">Services</li>	
            <li class="{{ Request::is('user/deposit') ? 'active' : '' }}">
                <a href="{{ route('deposit') }}">
                    <i class="glyphicon glyphicon-transfer"></i>
                    <span>Deposit</span>
                </a>
            </li>
            <li class="{{ Request::is('user/withdraw') ? 'active' : '' }}">
                <a href="{{ route('withdraw') }}">
                    <i class="glyphicon glyphicon-save"></i>
                    <span>Withdraw</span>
                </a>
            </li> 
            <li class="{{ Request::is('user/transactions') ? 'active' : '' }}">
                <a href="{{ route('transactionHistory') }}">
                    <i class="ti-list"></i>
                    <span>Transactions</span>
                </a>
            </li>  
            <li class="header nav-small-cap">Account</li>	
            <li class="{{ Request::is('user/settings/referrals') ? 'active' : '' }}">
                <a href="{{ route('userReferrals') }}">
                    <i class="ti-reload"></i>
                    <span>Referrals</span>
                </a>
            </li>
            <li class="{{ Request::is('user/settings/profile') ? 'active' : '' }}">
                <a href="{{ route('userProfile') }}">
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