<div class="modal-header">
  <h4 class="modal-titles" id="service_name">{{ $service->service->name}}</h4>
  <button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body">
  <form class="application_form" id="application_form" name="application_form" method="post"
    action="{{route('frontend.user.application.update')}}" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="row">
      <div class="container">
        <p></p><span class="time-left">From: aa</span><span class="time-right"></span>
      </div>
      <div class="container">
        <p></p><span class="time-left">Replied to: aa </span><span class="time-right"></span>
      </div>
      <div class="container darker">
        <p> </p> <span class="time-left">Forwarded to:aaa </span><span class="time-right"></span>
      </div>
    </div>
    <div class="form-group">
      <label for="recipient-name" class="col-form-label">To:</label>
      <input type="text" name="email" id="email" class="form-control" value="visa@visarequest.co.za">
    </div>
    <div class="form-group">
      <label for="message-text" class="col-form-label">Message:</label>
      <textarea rows="5" name="message" id="forward" class="form-control"></textarea>
    </div>
</div>
</form>
</div>
<div class="modal-footer d-flex justify-content-center">
  <button type="submit" class="btn btn-info">Update</button>
  <button type="button" class="btn btn-primary font-weight-bold" data-dismiss="modal">Close</button>
</div>