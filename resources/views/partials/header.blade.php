<div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <div class="dashboard_bar" style="font-size:20px;">
                                <div class="input-group search-area d-lg-inline-flex d-none">
                                    <p>Event Management for ISOC</p>
                                </div>
                            </div>
                        </div>
                        <ul class="navbar-nav header-right">
                            
                            
                            
                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="javascript:void(0)" role="button" data-bs-toggle="dropdown">
                                    <div class="header-info">
                                        <span class="text-black"><strong>{{Auth::user()->name}}</strong></span>
                                        <p class="fs-12 mb-0">@if(Auth::user()->hasRole('Super Admin')) {{'Admin'}} @else {{'Member'}} @endif</p>
                                    </div>
                                    @if(Auth::user()->image)
                                    <img src="{{Storage::disk('public')->url('app/public/users/'.Auth::user()->image)}}" width="20" alt=""/>
                                    @else
                                    <img src="{{asset('assets/images/profile/17.jpg')}}" width="20" alt=""/>
                                    @endif
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="{{route('profile')}}" class="dropdown-item ai-icon">
                                        <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                        <span class="ms-2">Profile </span>
                                    </a>
                                    
                                    <a href="javascript:void" onclick="document.getElementById('logout-form').submit()" class="dropdown-item ai-icon">
                                        <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                                        <span class="ms-2">Logout </span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>

        <form method="post" action="{{route('logout')}}" id="logout-form">@csrf</form>