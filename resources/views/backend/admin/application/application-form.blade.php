<div class="modal-header">
  <h4 class="modal-titles" id="service_name">{{ $service->service->name}}</h4>
  <button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body">
  <form class="application_form" id="application_form" name="application_form" method="post"
    action="{{route('frontend.user.application.update')}}" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class=""> 
      @foreach($service->serviceInputsAnswer as $key=>$element)
      <div class="form-group">
        @if($element->type==='text')
        <div>{{$element->label}}</div>
        <input type="text" name="element[{{$element->type}}-**-{{$element->label}}-**-{{$key}}]"
          value="{{$element->value}}" class="form-control">
        @elseif( $element->type==='date')
        <div>{{$element->label}}</div>
        <input type="date" name="element[{{$element->type}}-**-{{$element->label}}-**-{{$key}}]"
          value="{{$element->value}}" class="form-control">
        @elseif( $element->type==="number" )
        <div>{{$element->label}}</div>
        <input type="number" name="element[{{$element->type}}-**-{{$element->label}}-**-{{$key}}]"
          value="{{$element->value}}" class="form-control">
        @elseif($element->type==='textarea')
        <div>{{$element->label}}</div>
        <textarea name="element[{{$element->type}}-**-{{$element->label}}-**-{{$key}}]" value="{{$element->value}}"
          class="form-control">{{$element->value}}</textarea>
        @endif
      </div>
      @endforeach
    </div>
    {!! Form::hidden('service', $service->id, []) !!}
</div>
</form>
</div>
<div class="modal-footer d-flex justify-content-center">
  <button type="submit" class="btn btn-info">Update</button>
  <button type="button" class="btn btn-success font-weight-bold reply_application_btn" data-id="{{$service->id}}">Reply
    Message</button>
  <button type="button" class="btn btn-warning font-weight-bold mark_application_btn" data-id="{{$service->id}}">Mark As
    Complete</button>
  <button type="button" class="btn btn-primary font-weight-bold" data-dismiss="modal">Close</button>
</div>