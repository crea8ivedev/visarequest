@extends('frontend.layouts.app')
@section('content')
<div class="cmt-page-title-row">
    <div class="cmt-page-title-row-inner">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="page-title-heading innerpagetitle text-center">
                        <h2><strong>{{$service->name}}</strong></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('frontend.common.flashMessage')
<section class="category-row">
    <div class="container">
        <form class="application_form" id="application_form" name="application_form" method="post"
            action="{{route('frontend.user.application.update')}}" enctype="multipart/form-data">
            {{ csrf_field() }}
            @foreach($service->serviceInputs as $key=>$element)
            <div>
                <div class="label">{{$element->label}}</div>
                @if($element->type==='text')
                <input type="text" name="element[{{$element->type}}-**-{{$element->label}}-**-{{$key}}]"
                    class="form-control">
                @elseif( $element->type==='date')
                <input type="date" name="element[{{$element->type}}-**-{{$element->label}}-**-{{$key}}]"
                    class="form-control">
                @elseif( $element->type==="number" )
                <input type="number" name="element[{{$element->type}}-**-{{$element->label}}-**-{{$key}}]"
                    class="form-control">
                @elseif($element->type==="file")
                <input type="file" name="file[{{$element->type}}-**-{{$element->label}}-**-{{$key}}]"
                    class="form-control">
                @elseif($element->type==='textarea' )
                <textarea name="element[{{$element->type}}-**-{{$element->label}}-**-{{$key}}]"
                    class="form-control"></textarea>
                @elseif($element->type==='textarea')
                <textarea name="element[{{$element->type}}-**-{{$element->label}}-**-{{$key}}]"
                    class="form-control"></textarea>
                @elseif($element->type==='select')
                <select name="element[{{$element->type}}-**-{{$element->label}}-**-{{$key}}]" class="form-control">
                    @foreach (json_decode($element->value) as $item)
                    <option value="{{$item->value}}">{{$item->label}}</option>
                    @endforeach
                </select>
                @elseif( $element->type==='radio-group')
                @foreach (json_decode($element->value) as $item)
                {{$item->label}}<input class="form-control" type="radio"
                    name="element[{{$element->type}}-**-{{$element->label}}-**-{{$key}}]" value="{{$item->value}}"
                    class="form-control">
                @endforeach
                @elseif($element->type==='checkbox-group')
                @foreach (json_decode($element->value) as $item)
                {{$item->label}}<input class="form-control" type="checkbox"
                    name="element[{{$element->type}}-**-{{$element->label}}-**-{{$key}}]" value="{{$item->value}}"
                    class="form-control">
                @endforeach
                @endif
            </div>
            @endforeach
            {!! Form::hidden('service', $service->id, []) !!}
            <button type="submit" class="btn btn-info">Submit</button>
    </div>
    </form>
    </div>
</section>
@include('frontend.layouts.footer')
@endsection()
@section('scripts')
@endsection