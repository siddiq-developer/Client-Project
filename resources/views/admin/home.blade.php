@extends('partials.default')
@section('content')

<!-- Include Chart.js in the <head> of your layout -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


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
<!-- ================================ -->

<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">User Registrations</h4>
                </div>
                <div class="card-body">
                    <!-- Debugging: Print the data to check if it's being passed correctly -->
                    <!-- <pre>{{ print_r($months, true) }}</pre>
                    <pre>{{ print_r($counts, true) }}</pre> -->

                    <canvas id="userRegistrationChart"></canvas>
                    <!-- <canvas id="userRegistrationChart" style="border: 1px solid red; width: 100%; height: 400px;"></canvas> -->

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var ctx = document.getElementById('userRegistrationChart').getContext('2d');

    var chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: @json($months), // Pass month labels from Laravel
            datasets: [{
                label: 'User Registrations',
                data: @json($counts), // Pass registration counts from Laravel
                backgroundColor: 'rgba(54, 162, 235, 0.6)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

@endsection