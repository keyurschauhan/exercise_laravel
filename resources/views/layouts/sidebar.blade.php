<aside class="left-sidebar">
    <div class="scroll-sidebar">
        <nav class="sidebar-nav">
            <ul id="sidebarnav">

                <li class="@if(Request::Route()->getName() == 'home') active @endif"><a class="waves-effect waves-dark" href="{{ route('home') }}" aria-expanded="false"><i class="fa fa-dashboard"></i><span class="hide-menu">Dashboard</span></a></li>

                <li class="@if(Request::Route()->getName() == 'customers.index' || Request::Route()->getName() == 'customers.create' || Request::Route()->getName() == 'customers.edit' || Request::Route()->getName() == 'customers.show') active @endif"><a class="waves-effect waves-dark" href="{{ route('customers.index') }}" aria-expanded="false"><i class="fa fa-users"></i><span class="hide-menu">Customers</span></a></li>

                
                <li class="@if(Request::Route()->getName() == 'country.index' || Request::Route()->getName() == 'country.create' || Request::Route()->getName() == 'country.edit' || Request::Route()->getName() == 'country.show') active @endif"><a class="waves-effect waves-dark" href="{{ route('country.index') }}" aria-expanded="false"><i class="fa fa-list"></i><span class="hide-menu">Country</span></a></li>

                <li class="@if(Request::Route()->getName() == 'state.index' || Request::Route()->getName() == 'state.create' || Request::Route()->getName() == 'state.edit' || Request::Route()->getName() == 'state.show') active @endif"><a class="waves-effect waves-dark" href="{{ route('state.index') }}" aria-expanded="false"><i class="fa fa-list"></i><span class="hide-menu">State</span></a></li>

                <li class="@if(Request::Route()->getName() == 'city.index' || Request::Route()->getName() == 'city.create' || Request::Route()->getName() == 'city.edit' || Request::Route()->getName() == 'city.show') active @endif"><a class="waves-effect waves-dark" href="{{ route('city.index') }}" aria-expanded="false"><i class="fa fa-list"></i><span class="hide-menu">City</span></a></li>
                
            </ul>
        </nav>
    </div>
</aside>