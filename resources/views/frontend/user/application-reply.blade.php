<form id="application_reply_form" action="#" name="application_reply_form" method="post" enctype="multipart/form-data">
  {{ csrf_field() }}
  <div class="modal-header">
    <h4 class="modal-titles" id="service_name">{{ $service->service->name}}</h4>
    <button type="button" class="close" data-dismiss="modal">&times;</button>
  </div>
  <div class="modal-body">

    @foreach ($service->serviceApplicationConversion as $item)
    <div class="row">
      <div class="container @if($item->type==='USER') darker @endif">
        <h4>{{$item->subject}}</h4>
        <p>{{$item->message}}</p>
        <span class="time-left">By {{$item->user->FullName}}</span>
        @if($item->file)
        <span class="pl-5"><a download target="_blank" title="Click for download {{$item->file}}"
            href="{{ route('download',[config("constants.DOCUMENTS.APPLICATION_DOCUMENT"),$item->file]) }}"
            rel=" nofollow" class="btn-read"><i class="fa fa-download"></i>
          </a></span>
        @endif
        <span class="time-right">{{date('d/m/Y h:i:s',strtotime($item->date))}}
        </span>
      </div>
    </div>
    @endforeach

    <div class="form-group">
      <label for="message-text" class="col-form-label">Subject:</label>
      <input type="text" class="form-control" id="subject" name="subject" />
      <input type="hidden" id="service" name="service" value="{{$service->service->id}}" />
      <input type="hidden" id="application" name="application" value="{{$service->id}}" />

    </div>
    <div class="form-group">
      <label for="message-text" class="col-form-label">Message:</label>
      <textarea rows="5" name="message" id="forward" class="form-control"></textarea>
    </div>
    <div class="form-group">
      <input type="file" class="form-control" id="file" name="file" />
    </div>
  </div>
  <div class="modal-footer d-flex justify-content-center">
    <button type="button" class="disableBtn btn btn-info btn_send_reply">Reply</button>
    <button type="button" class="disableBtn btn btn-primary font-weight-bold" data-dismiss="modal">Close</button>
  </div>
</form>