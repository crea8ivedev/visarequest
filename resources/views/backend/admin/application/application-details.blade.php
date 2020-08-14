<div class="modal-header">
  <h4 class="modal-titles" id="service_name">{{ $service->service->name}}</h4>
  <button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body">
  <div class="row">
    <div class="col-lg-4">{{ $service->user->FullName}}</div>
    <div class="col-lg-4"><a href="mailto:{{ $service->user->email ?? '-'}}"><i class="fa fa-envelope"></i>
        {{ $service->user->email ?? '-'}}</a> </div>
    <div class="col-lg-4"><i class="fa fa-phone"></i> <a
        href="tel:{{ $service->user->phone ?? '-'}}">{{ $service->user->phone ?? '-'}}</a></div>
  </div>
  <div class="table-responsive">
    <table class="table table-hover table-fixed" style="width:100%">
      <tbody>
        @foreach($service->serviceInputsAnswer as $value)
        <tr>
          @if( $value->type!=='file')
          <td><b>{{ $value->label}}</b> : {{ $value->value}} </td>
          @else
          <td> <b>{{ $value->label}}</b> : <a download target="_blank" title="Click for download {{$value->value}}"
              href="{{ route('download',[config("constants.DOCUMENTS.APPLICATION_DOCUMENT"),$value->value]) }}"
              rel=" nofollow" class="btn-read"><i class="fa fa-download"></i>
            </a></td>
          @endif
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
<div class="modal-footer d-flex justify-content-center">
  <button type="button" class="btn btn-info font-weight-bold edit_application_btn" data-id="{{$service->id}}">Edit
    Application</button>
  <button type="button" class="btn btn-success font-weight-bold reply_application_btn" data-id="{{$service->id}}">Reply
    Message</button>
  <button type="button" class="btn btn-warning font-weight-bold mark_application_btn" data-id="{{$service->id}}">Mark As
    Complete</button>
  <button type="button" class="btn btn-primary font-weight-bold" data-dismiss="modal">Close</button>
</div>