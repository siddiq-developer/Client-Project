<div id="cshero-header" class="menu-header-2 cshero-main-header">
                    <div class="container-fluid">
                        <div class="row">
                            <div id="cshero-header-logo" class="pray-logo col-xs-8 col-sm-8 col-md-3 col-lg-3">
                                <a href=""><img alt="Isoc ibd chapter logo" src="{{asset('frontend/wp-content/uploads/2019/01/isco_logo_w.png')}}" /></a>
                            </div>
                            <div id="cshero-header-navigation" class="pray-menu col-xs-8 col-sm-8 col-md-9">
                                <nav id="site-navigation" class="main-navigation">
                                    <div class="menu-primary-menu-container">
                                        <ul id="menu-main-menu" class="nav-menu menu-main-menu">
                                            <li
                                                id="menu-item-750"
                                                class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-7 current_page_item no_group menu-item-750"
                                                data-depth="0"
                                                >
                                                <a href="{{route('home')}}"><span class="menu-title">Home</span></a>
            
                                            </li>
                                            <li
                                                id="menu-item-750"
                                                class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-7 current_page_item no_group menu-item-750"
                                                data-depth="0"
                                                >
                                                <a href="{{route('blog')}}"><span class="menu-title">BlOG</span></a>
            
                                            </li>
                                            <li
                                                id="menu-item-750"
                                                class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-7 current_page_item no_group menu-item-750"
                                                data-depth="0"
                                                >
                                                <a href="{{route('bylaws')}}"><span class="menu-title">BYLAWS</span></a>
            
                                            </li>
                                            <li id="menu-item-744" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children no_group menu-item-744" data-depth="0">
                                                <a href="#"><span class="menu-title">About Us</span></a>
                                                <ul class="standar-dropdown standard autodrop_submenu sub-menu" style="width: 200px;">
                                                    <li id="menu-item-970" class="menu-item menu-item-type-post_type menu-item-object-page no_group menu-item-970" data-depth="1">
                                                        <a href="{{route('what_we_do')}}"><span class="menu-title">What We Do</span></a>
                                                    </li>

                                                    <li id="menu-item-970" class="menu-item menu-item-type-post_type menu-item-object-page no_group menu-item-970" data-depth="1">
                                                        <a href="{{route('bod')}}"><span class="menu-title">Board of Directors</span></a>
                                                    </li>

                                                    <li id="menu-item-970" class="menu-item menu-item-type-post_type menu-item-object-page no_group menu-item-970" data-depth="1">
                                                        <a href="{{route('leadership')}}"><span class="menu-title">Leadership</span></a>
                                                    </li>

                                                    <li id="menu-item-969" class="menu-item menu-item-type-post_type menu-item-object-page no_group menu-item-969" data-depth="1">
                                                        <a href="{{route('by_laws')}}"><span class="menu-title">ByLaws</span></a>
                                                    </li>
                                                </ul>
                                                <span class="cs-menu-toggle"><i class="fa fa-angle-down"></i></span>
                                            </li>
                                            
                                            <li id="menu-item-748" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children no_group menu-item-748" data-depth="0">
                                                <a href="#"><span class="menu-title">Events</span></a>
                                                <ul class="standar-dropdown standard autodrop_submenu sub-menu" style="width: 200px;">
                                                    <li id="menu-item-900" class="menu-item menu-item-type-post_type menu-item-object-page no_group submenu_item menu-item-900" data-depth="1">
                                                        <a href="{{url('events/list')}}?q=upcoming"><span class="menu-title">Upcoming Events</span></a>
                                                    </li>
                                                    <li id="menu-item-899" class="menu-item menu-item-type-post_type menu-item-object-page no_group menu-item-899" data-depth="1">
                                                        <a href="{{url('events/list')}}?q=past"><span class="menu-title">Past Events</span></a>
                                                    </li>
                                                </ul>
                                                <span class="cs-menu-toggle"><i class="fa fa-angle-down"></i></span>
                                            </li>
                                            
                                            <li id="menu-item-753" class="menu-item menu-item-type-post_type menu-item-object-page no_group menu-item-753" data-depth="0">
                                                <a href="{{route('contact_us')}}"><span class="menu-title">Contact</span></a>
                                            </li>
                                        </ul>
                                    </div>
                                </nav>
                                <div class="donate-now">
                                    @if(Auth::check())
                                        @if(!Auth::user()->hasRole('Super Admin'))
                                            <a href="{{route('user.dashboard')}}" class="top_donate_link">Dashboard</a>
                                        @else
                                            <a href="{{route('admin.dashboard')}}" class="top_donate_link">Dashboard</a>
                                        @endif

                                    @else
                                    <a href="{{route('register')}}" class="top_donate_link">Join Us</a>
                                    @endif
                                </div>
                            </div>
                            <div id="dropdown-search" class="search-icon"><i class="fa fa-search"></i></div>
                            
                            <div id="cshero-menu-mobile" class="collapse navbar-collapse"><i class="fa fa-bars"></i></div>
                        </div>
                    </div>
                </div>