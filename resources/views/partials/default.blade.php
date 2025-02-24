@include('partials.head')

   

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        @include('partials.navbar_header')
        <!--**********************************
            Nav header end
        ***********************************-->
        
        <!--**********************************
            Chat box start
        ***********************************-->
        <!-- include chatbox section -->
        <!--**********************************
            Chat box End
        ***********************************-->
        
        <!--**********************************
            Header start
        ***********************************-->
        @include('partials.header')
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        @include('partials.sidebar')
        <!--**********************************
            Sidebar end
        ***********************************-->
        
        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
            @if(\Session::has('success_message'))
            <div class="row mt-2">
                <div class="col-md-3 col-sm-12"></div>
                <div class="col-md-6 col-sm-12">
                    <p class="alert alert-success">{{\Session::get('success_message')}}</p>
                </div>
                <div class="col-md-3 col-sm-12"></div>
            </div>
            @endif

            @if(\Session::has('error_message'))
            <div class="row mt-2">
                <div class="col-md-3 col-sm-12"></div>
                <div class="col-md-6 col-sm-12">
                    <p class="alert alert-danger">{{\Session::get('error_message')}}</p>
                </div>
                <div class="col-md-3 col-sm-12"></div>
            </div>
            @endif

            @yield('content')
        </div>
        <!--**********************************
            Content body end
        ***********************************-->

        <!--**********************************
            Footer start
        ***********************************-->
        @include('partials.footer')
        <!--**********************************
            Footer end
        ***********************************-->

        <!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
   @include('partials.scripts')


