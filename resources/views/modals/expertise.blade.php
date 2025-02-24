<div class="modal fade" id="areaOfExpertise" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form method="post" action="{{route('profile.expertise.update')}}" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Area of Expertise</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" style="max-height: 450px;height: 450px; overflow: auto;">
                    <!-- Modal content goes here -->
                    <p>What are your areas of expertise?</p>
                    <div aria-label="What are your areas of expertise?" class="check-list" id="wrapper_PEAreasofExpertise" role="group">
                        @foreach($expertise as $exp)
                        @php $slug = \Str::slug($exp); @endphp
                        <div class="checkbox">
                            <div class="custom-control custom-checkbox">
                                 @if ($user_expertise->contains('title', $exp))
                                    <input checked="checked" class="custom-control-input" id="{{$slug}}" name="checkboxes[]" type="checkbox" value="{{$exp}}" />                                 
                                 @else
                                <input class="custom-control-input" id="{{$slug}}" name="checkboxes[]" type="checkbox" value="{{$exp}}" />
                                @endif
                                <label for="{{$slug}}">{{$exp}}</label>
                            </div>
                        </div>

                        @endforeach
            
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-xs" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success btn-xs">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>