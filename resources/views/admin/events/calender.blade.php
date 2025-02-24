@extends('partials.default')
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js'></script>

@section('content')
<div class="container-fluid">
    <div class="form-head mb-4">
        <h2 class="text-black font-w600 mb-0">Event Calender</h2>
    </div>
    <div class="row">
        <div class="col-md-12">
                                <div id="calendar" class="app-fullcalendar"></div>
        </div>

    </div>
</div>
@endsection
@section('jsOutside')

<script type="text/javascript">
     document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth',
          events: <?php echo json_encode($javascriptEvents); ?>
        });
        calendar.render();
      });
</script>

@endsection