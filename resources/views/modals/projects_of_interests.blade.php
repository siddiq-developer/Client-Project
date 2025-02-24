<dicv class="modal fade" id="areaOfInterest" tabindex="-1" aria-labelledby="areaOfInterest" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form method="post" action="{{route('profile.interest.update')}}" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="areaOfInterest">Area of Expertise</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" style="max-height: 450px;height: 450px; overflow: auto;">
                    <!-- Modal content goes here -->
                    <p>Please select which projects you are most interested in (click the ? for the project description):</p>
                    <div aria-label="What are your areas of expertise?" class="check-list" id="wrapper_PEAreasofExpertise" role="group">
                        @foreach($interest as $exp)
                        @php $slug = \Str::slug($exp); @endphp
                        <div class="checkbox">
                            <div class="custom-control custom-checkbox">
                                @if ($user_interest->contains('title', $exp))
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