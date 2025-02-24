@extends('partials.default')
@section('content')
<style type="text/css">
    
    .poll-container {
    border: 1px solid #ddd;
    padding: 10px;
    margin-bottom: 20px;
}

.poll-container label {
    display: block;
    margin-bottom: 10px;
}

</style>
<div class="container-fluid">
    <div class="form-head mb-4">
        <h2 class="text-black font-w600 mb-0">Events Voting</h2>
    </div>
    <div class="row">
        <div class="col-md-12">

            <h3>{{$event->title}}</h3>
             @if($opcandidates->count()==0 && $vpcandidates->count()==0 && $gstcandidates->count()==0 && $bodcandidates->count()==0) 
                <h2 class="text-center">Voting is not available</h2>
             @else  
             @if($ev->count()==0)
              <form method="post" action="{{route('user.cast.vote')}}">
             @else
              <form method="post" action="{{route('user.cast.vote')}}">
             @endif  

                <input type="hidden" name="selectedop" id="selectedop" value="0">
                <input type="hidden" name="selectedvp" id="selectedvp" value="0">
                <input type="hidden" name="selectedgst" id="selectedgst" value="0">
                <input type="hidden" name="selectedbod" id="selectedbod" value="0">
                @csrf
                <input type="hidden" name="event_id" value="{{$event->id}}">
                   @if($ev->count()==0)
                   
                   @if($opcandidates->count())
                    <div class="row poll-container">
                        <div class="row">
                            <h3>Candidate for Officer Presidents</h3>
                        </div>
                        @foreach($opcandidates as $c)
                           
                                <label>
                                    <input type="radio" class="op" name="vote_op" value="{{$c->user_d->id}}">
                                    {{$c->user_d->name}}
                                </label>
                            

                        @endforeach
                                <div class="col-md-3">
                                <button class="btn btn-primary" id="op" type="button">Vote</button>
                            </div>
                    </div>
                    @endif
                     @if($vpcandidates->count())
                    <div class="row poll-container">
                        <div class="row">
                            <h3>Candidate for Vice Presidents</h3>
                        </div>
                        @foreach($vpcandidates as $c)
                           
                                <label>
                                    <input type="radio" class="vp" name="vote_vp" value="{{$c->user_d->id}}">
                                    {{$c->user_d->name}}
                                </label>
                            

                        @endforeach
                                <div class="col-md-3">
                                <button class="btn btn-primary" id="vp" type="button">Vote</button>
                            </div>
                    </div>
                    @endif
                     @if($gstcandidates->count())
                    <div class="row poll-container">
                        <div class="row">
                            <h3>Candidate for General Secretary Treasurer</h3>
                        </div>
                        @foreach($gstcandidates as $c)
                           
                                <label>
                                    <input type="radio" class="gst" name="vote_gst" value="{{$c->user_d->id}}">
                                    {{$c->user_d->name}}
                                </label>
                            

                        @endforeach
                                <div class="col-md-3">
                                <button class="btn btn-primary" id="gst" type="button">Vote</button>
                            </div>
                    </div>
                    @endif
                     @if($bodcandidates->count())
                    <div class="row poll-container">
                        <div class="row">
                            <h3>Candidate for Board of Directors</h3>
                        </div>
                        @foreach($bodcandidates as $c)
                           
                                <label>
                                    <input type="radio" class="bod" name="vote_bod" value="{{$c->user_d->id}}">
                                    {{$c->user_d->name}}
                                </label>
                            

                        @endforeach
                                <div class="col-md-3">
                                <button class="btn btn-primary" id="bod" type="button">Vote</button>
                            </div>
                    </div>
                    @endif

                    @else

                     @if($opcandidates->count())
                    <div class="row poll-container">
                         <div class="row">
                            <h3>Candidate for Officer Presidents</h3>
                        </div>
                        @foreach($opcandidates as $c)
                                <label>
                                    @if($evop->ec_id==$c->user_d->id)
                                        <input type="radio" checked="checked" name="vote_op" readonly disabled value="{{$c->user_d->id}}">
                                        {{$c->user_d->name}}
                                        @else
                                        <input type="radio" name="vote_op" readonly disabled  value="{{$c->user_d->id}}">
                                        {{$c->user_d->name}}
                                    @endif
                                </label>
                                @if($c->result)
                                    <h4 class="text-green">Selected : {{$c->user_d->name}}</h4>
                                @endif
                        @endforeach

                    </div>

                    @endif

                     @if($vpcandidates->count())

                    <div class="row poll-container">
                        <div class="row">
                            <h3>Candidate for Vice Presidents</h3>
                        </div>
                        @foreach($vpcandidates as $c)
                           
                                <label>
                                    @if($evvp->ec_id==$c->user_d->id)
                                        <input type="radio" checked="checked" name="vote_vp" readonly disabled value="{{$c->user_d->id}}">
                                        {{$c->user_d->name}}
                                        @else
                                        <input type="radio" name="vote_vp" readonly disabled  value="{{$c->user_d->id}}">
                                        {{$c->user_d->name}}
                                    @endif
                                </label >
                              
                               @if($c->result)
                                    <h4 class="text-green">Selected : {{$c->user_d->name}}</h4>
                                @endif  

                        @endforeach

                    </div>
                    @endif
                     @if($gstcandidates->count())
                    <div class="row poll-container">
                         <div class="row">
                            <h3>Candidate for General Secretary Treasurer</h3>
                        </div>
                        @foreach($gstcandidates as $c)
                           
                                <label>
                                    @if($evgst->ec_id==$c->user_d->id)
                                        <input type="radio" checked="checked" name="vote_gst" readonly disabled value="{{$c->user_d->id}}">
                                        {{$c->user_d->name}}
                                        @else
                                        <input type="radio" name="vote_gst" readonly disabled  value="{{$c->user_d->id}}">
                                        {{$c->user_d->name}}
                                    @endif
                                </label>

                                 @if($c->result)
                                    <h4 class="text-green">Selected : {{$c->user_d->name}}</h4>
                                @endif
                            

                        @endforeach

                    </div>
                    @endif

                     @if($bodcandidates->count())
                    <div class="row poll-container">
                         <div class="row">
                            <h3>Candidate for Board of Directors</h3>
                        </div>    
                        @foreach($bodcandidates as $c)
                           
                                <label>
                                    @if($evbod->ec_id==$c->user_d->id)
                                        <input type="radio" checked="checked" name="vote_bod" readonly disabled value="{{$c->user_d->id}}">
                                        {{$c->user_d->name}}
                                        @else
                                        <input type="radio" name="vote_bod" readonly disabled  value="{{$c->user_d->id}}">
                                        {{$c->user_d->name}}
                                    @endif
                                </label>


                                 @if($c->result)
                                    <h4 class="text-green">Selected : {{$c->user_d->name}}</h4>
                                @endif
                            

                        @endforeach

                    </div>
                    @endif

                    @endif

                    @if($ev->count()==0)
                     <button class="btn btn-success" type="submit">Submit</button>
                     @endif 
            </form>            
            @endif
        </div>

    </div>
</div>
@endsection

@section('jsOutside')
    <script type="text/javascript">
            
            $('#op').click(function(){
                 var isSelectionMade = isAnySelectionMade('op');
                 if(isSelectionMade){
                    disableAllOpRadios('op');
                 }
            })  

             $('#vp').click(function(){
                 var isSelectionMade = isAnySelectionMade('vp');
                 if(isSelectionMade){
                    disableAllOpRadios('vp');
                 }
            })  

            $('#gst').click(function(){
                 var isSelectionMade = isAnySelectionMade('gst');
                 if(isSelectionMade){
                    disableAllOpRadios('gst');
                 }
            })  
            

            $('#bod').click(function(){
                 var isSelectionMade = isAnySelectionMade('bod');
                 if(isSelectionMade){
                    disableAllOpRadios('bod');
                 }
            })     




                // Function to check if any radio button with class "op" is selected
                function isAnySelectionMade(type) {
                    const opRadios = document.querySelectorAll('.'+type);
                    for (let i = 0; i < opRadios.length; i++) {
                        if (opRadios[i].checked) {
                            $('#selected'+type).val(opRadios[i].value);
                            return true; // At least one radio button is checked

                        }
                    }
                    return false; // No radio button is checked
                }

                function disableAllOpRadios(type) {
                    const opRadios = document.querySelectorAll('.'+type);
                    for (let i = 0; i < opRadios.length; i++) {
                        opRadios[i].disabled = true;
                    }
                }

                // Usage example:
               

    </script>
@endsection