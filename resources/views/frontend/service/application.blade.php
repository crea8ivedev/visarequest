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
<section class="category-row">
    <div class="container">
        <form>
            @foreach($service->serviceInputs as $key=>$element)
            <div class="row">
                <div class="col-sm-12">
                    <div class="label">{{$element->label}}</div>
                    @if($element->type==='text' || $element->type==='date' || $element->type==="number" ||
                    $element->type==="file")
                    <input type="{{$element->type}}" name="" class="form-control">
                    @elseif($element->type==='textarea' || $element->type==='paragraph')
                    <textarea class="form-control"></textarea>
                    @elseif($element->type==='select')
                    <select class="form-control">
                        @foreach (json_decode($element->value) as $item)
                        <option value="{{$item->value}}">{{$item->label}}</option>
                        @endforeach
                    </select>
                    @elseif( $element->type==='radio-group')
                    @foreach (json_decode($element->value) as $item)
                    {{$item->label}}<input class="form-control" type="radio" name="" value="{{$item->value}}"
                        class="form-control">
                    @endforeach
                    @elseif($element->type==='checkbox-group')
                    @foreach (json_decode($element->value) as $item)
                    {{$item->label}}<input class="form-control" type="checkbox" name="" value="{{$item->value}}"
                        class="form-control">
                    @endforeach
                    @endif
                </div>
            </div>
            @endforeach
            <div class="row">
                <input class="btn btn-info" type="submit" />
            </div>
        </form>
    </div>
</section>
@include('frontend.layouts.footer')
@endsection()
@section('scripts')
@endsection