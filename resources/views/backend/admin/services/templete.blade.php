<div class="table-responsive">
  <!--Table-->
  <table class="table table-hover table-fixed" style="width:100%">
    <tr>
      <th scope="row">Client Name : </th>
      <td>{{ $data['data']->user->FullName ?? '-'}}</td>
    </tr>
    <tr>
      <th scope="row">Client Phone Number : </th>
      <td>{{ $data['data']->user->phone ?? '-'}}</td>
    </tr>
      <tr>
        @if(!empty($data['text']))
          @foreach($data['text'] as $value)
          <th scope="row">{{ $value['label'] ?? ''}} : </th>
          <td>{{ $value['value'] ?? ''}}</td>
          @endforeach
        @endif
      </tr>

      <tr>
        @if(!empty($data['textarea']))
          @foreach($data['textarea'] as $value)
          <th scope="row">{{ $value['label'] ?? ''}} :</th>
          <td>{{ $value['value'] ?? ''}}</td>
          @endforeach
        @endif
      </tr>

      <tr>
        @if(!empty($data['date']))
          @foreach($data['date'] as $value)
          <th scope="row">{{ $value['label'] ?? ''}} : </th>
          <td>{{ $value['value'] ?? ''}}</td>
          @endforeach
        @endif
      </tr>

      <tr>
        @if(!empty($data['file']))
          @foreach($data['file'] as $value)
          <th scope="row">{{ $value['label'] ?? ''}} </th>
          <td><a href="{{ $value['label'] ?? ''}}" class="btn btn-primary stretched-link">Download</a></td>
          @endforeach
        @endif
      </tr>
    
  </table>
</div>

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
    