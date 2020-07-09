  @if(!empty($data['text']))
    @foreach($data['text'] as $value)
    <div class="form-group row my-2">
      <label class="col-4 col-form-label">{{ $value['label'] ?? ''}} :</label>
      <div class="col-8">
          <span id="name" class="form-control-plaintext font-weight-bolder">{{ $value['value'] ?? ''}}</span>
      </div>
    </div>
    @endforeach
  @endif

  @if(!empty($data['textarea']))
    @foreach($data['textarea'] as $value)
    <div class="form-group row my-2">
      <label class="col-4 col-form-label">{{ $value['label'] ?? ''}} :</label>
      <div class="col-8">
          <span id="name" class="form-control-plaintext font-weight-bolder">{{ $value['value'] ?? ''}}</span>
      </div>
    </div>
    @endforeach
  @endif

  @if(!empty($data['date']))
    @foreach($data['date'] as $value)
    <div class="form-group row my-2">
      <label class="col-4 col-form-label">{{ $value['label'] ?? ''}} :</label>
      <div class="col-8">
          <span id="name" class="form-control-plaintext font-weight-bolder">{{ $value['value'] ?? ''}}</span>
      </div>
    </div>
    @endforeach
  @endif

  @if(!empty($data['file']))
  @foreach($data['file'] as $value)
  <div class="form-group row my-2">
    <label class="col-4 col-form-label">{{ $value['label'] ?? ''}} :</label>
    <div class="col-8">
        <a href="{{ $value['label'] ?? ''}}" class="btn btn-primary stretched-link">Download</a>
        <div id="download" ></div>
    </div>
  </div>
  @endforeach
@endif

  {{-- @if($data['text'])
    @foreach($data['text'] as $value)
      <div class="form-group ">
          <label> {{ $value['label'] ?? ''}} : </label>
          <input class="form-control" id="name" name="name" value="{{ $value['value'] ?? ''}}" placeholder="Service Name">
      </div>
    @endforeach
  @endif

  @if($data['textarea'])
    <div class="form-group">
      @foreach($data['textarea'] as $value)
        <label>{{ $value['label'] }} : </label>
        <textarea class="form-control" id="description" name="description" placeholder="Description">{{ $value['value'] ?? ''}}</textarea>
      @endforeach
    </div>
  @endif --}}
    