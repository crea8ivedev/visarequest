@extends('backend.layout.default')
{{-- Styles Section --}}
@section('styles')
   

@endsection
@section('content')
<div class="col-md-12">
    <!--begin::Card-->
    <div class="card card-custom card-collapse"   data-card="true" id="kt_card_4">
        <div class="card-header">
          <div class="card-title">
            <span class="card-icon"><i class="fas fa-tag text-primary"></i></span>
              <h3 class="card-label">Meta Page</h3>
          </div>
          
        </div>
        
        <div class="card-body" id="card-collapse"  >
          <!--begin::Form-->
          <form class="form" method="post" id="sample_form" action="{{ route('admin.meta-page.store')  }}">
            @csrf

            <div class="form-group">
                <label>Page :<code>*</code></label>
                <select class="form-control page" id="page" name="page">
                @foreach($pages as $key => $page)
                <option value="{{ $key }}">{{ $page }}</option>
                @endforeach
                </select>
            </div>
             
            <div class="form-group">
                <label>Title :<code>*</code></label>
                <div class="input-group">
                <input type="text" class="form-control" name="title" id="title" placeholder="Title"
                    value="{{ $data->title ?? '' }}" autocomplete="off" />
                </div>
            </div>


            <div class="form-group">
                <label>Description :<code>*</code></label>
                <textarea rows="7" placeholder="Description" class="form-control" id="description" name="description"
                autocomplete="off">{{ $data->description ?? '' }}</textarea>
            </div>

            <div class="form-group">
                <label>keywords :<code>*</code></label>
                <div class="input-group">
                <textarea rows="7" class="form-control" name="keywords" id="keywords" placeholder="Keywords"
                    autocomplete="off">{{ $data->keywords ?? '' }}</textarea>
                </div>
            </div>

            <div class="card-footer">
                <input type="hidden" name="name" value="about us" />
                <input type="hidden" name="hidden_id" id="hidden_id" value="{{ $data->id ?? ''}}" />
              <button type="submit" id="submit" class="btn btn-primary mr-2">{{ $data ? 'Update' : 'Add'}}</button>
              <a href="{{ route('admin.dashboard')  }}"  type="button" class="btn btn-secondary cancel">Cancel</a>
            </div>
          </form>
          <!--end::Form-->
        </div>
    </div>
    <!--end::Card-->
</div>

@endsection
@section('scripts')

@foreach(config('layout.resources.ckeditor_js') as $script)
 <script src="{{ asset($script) }}" type="text/javascript"></script>
 @endforeach

  @foreach(config('layout.resources.validate_js') as $script)
      <script src="{{ asset($script) }}" type="text/javascript"></script>
  @endforeach

  <script>
    $('#page').on('change', function() {
        $('#description').val('');
        $('#title').val('');
        $('#keywords').val('');
        $('#hidden_id').val('');
         var page = $(this).find("option:selected").val();
         var url = '{{ route("admin.meta-page.edit", ":page") }}';
         url = url.replace(':page', page);

         $.ajax({
            url: url,
            dataType: "json",
            beforeSend: function() {
            $("#loading").show();
            },
            complete: function() {
            $("#loading").hide();
            },
            success: function(data) {
                if(data.result != ''){
                $('#page').val(data.result.page);
                $('#description').val(data.result.description);
                $('#title').val(data.result.title);
                $('#keywords').val(data.result.keywords);
                $('#hidden_id').val(data.result.id);
                $('#action').val('Edit');
                $('#submit').text('Update');
                } else{
                    $('#action').val('Add');
                    $('#submit').text('Add');
                }
            }
        })
    });
  
</script>

{!! JsValidator::formRequest('App\Http\Requests\Backend\MetaPageRequest') !!}

 

@endsection
