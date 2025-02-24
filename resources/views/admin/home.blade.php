@extends('partials.default')
@section('content')
<div class="container-fluid">
    <div class="form-head mb-4">
        <h2 class="text-black font-w600 mb-0">Dashboard</h2>
    </div>
    <div class="row">
        
        <div class="col-xl-12">
                        <div class="row">
                            <div class="col-xl-4 col-sm-6">
                                <div class="card">
                                    <div class="card-header flex-wrap border-0 pb-0">
                                        <div class="me-3 mb-2">
                                            <p class="fs-14 mb-1">Members</p>
                                            <span class="fs-36 text-black font-w600">{{$members}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-sm-6">
                                <div class="card">
                                    <div class="card-header flex-wrap border-0 pb-0">
                                        <div class="me-3 mb-2">
                                            <p class="fs-14 mb-1">Events</p>
                                            <span class="fs-36 text-black font-w600">{{$events}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-4 col-sm-6">
                                <div class="card">
                                    <div class="card-header flex-wrap border-0 pb-0">
                                        <div class="me-3 mb-2">
                                            <p class="fs-14 mb-1">Active Voting</p>
                                            <span class="fs-36 text-black font-w600">{{$active_voting}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-4 col-sm-6">
                                <div class="card">
                                    <div class="card-header flex-wrap border-0 pb-0">
                                        <div class="me-3 mb-2">
                                            <p class="fs-14 mb-1">Todays Event</p>
                                            <span class="fs-36 text-black font-w600">{{$todays_event}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>        
                        </div>
                    </div>
        
    </div>
</div>
@endsection