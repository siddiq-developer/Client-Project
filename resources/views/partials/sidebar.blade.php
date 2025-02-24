    @if(Auth::user()->hasRole('Super Admin'))
    <div class="deznav">
            <div class="deznav-scroll">
                <ul class="metismenu" id="menu">
                    
                    <li><a href="{{route('admin.dashboard')}}" class="ai-icon" aria-expanded="false">
                            <i class="fa fa-home"></i>
                            <span class="nav-text">Dashboard</span>
                        </a>
                    </li>

                     <li><a href="{{route('event.index')}}" class="ai-icon" aria-expanded="false">
                            <i class="fa fa-calendar"></i>
                            <span class="nav-text">Events</span>
                        </a>
                    </li>

                    <li><a href="{{route('event.calender')}}" class="ai-icon" aria-expanded="false">
                            <i class="fa fa-calendar"></i>
                            <span class="nav-text">Calender</span>
                        </a>
                    </li>

                     <li><a href="{{route('members.index')}}" class="ai-icon" aria-expanded="false">
                            <i class="fa fa-users"></i>
                            <span class="nav-text">Members</span>
                        </a>
                    </li>

                    <li><a href="{{route('blogs.index')}}" class="ai-icon" aria-expanded="false">
                            <i class="fa fa-pencil"></i>
                            <span class="nav-text">Blogs</span>
                        </a>
                    </li>

                
                     <li><a href="{{route('contact_us')}}" class="ai-icon" aria-expanded="false">
                            <i class="fa fa-envelope"></i>
                            <span class="nav-text">Contact Requests</span>
                        </a>
                    </li>

                </ul>
                
            </div>
        </div>
    @else
    
    <div class="deznav">
            <div class="deznav-scroll">
                <ul class="metismenu" id="menu">
                    
                    <li><a href="{{route('user.dashboard')}}" class="ai-icon" aria-expanded="false">
                            <i class="fa fa-home"></i>
                            <span class="nav-text">Dashboard</span>
                        </a>
                    </li>

                     <li><a href="{{route('user.event.index')}}" class="ai-icon" aria-expanded="false">
                            <i class="fa fa-calendar"></i>
                            <span class="nav-text">Events</span>
                        </a>
                    </li>

                    <li><a href="{{route('event.calender')}}" class="ai-icon" aria-expanded="false">
                            <i class="fa fa-calendar"></i>
                            <span class="nav-text">Calender</span>
                        </a>
                    </li>
                
                     <li><a href="{{route('user.contact_us')}}" class="ai-icon" aria-expanded="false">
                            <i class="fa fa-envelope"></i>
                            <span class="nav-text">Contact Requests</span>
                        </a>
                    </li>

                </ul>
                
            </div>
        </div>

    @endif    