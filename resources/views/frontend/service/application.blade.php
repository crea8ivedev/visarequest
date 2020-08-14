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
        @include('frontend.common.flashMessage')
        <form class="application_form contact_form wrap-form clearfix" id="application_form" name="application_form"
            method="post" action="{{route('frontend.user.application.update')}}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row">
                @foreach($service->serviceInputs as $key=>$element)
                @if($element->type==='text')

                <div class="col-md-6">
                    <span class="form-group text-input">
                        <div class="label">{{$element->label}}</div>
                        <input type="text" name="element[{{$element->type}}-**-{{$element->label}}-**-{{$key}}]">
                    </span>
                </div>
                @elseif( $element->type==='date')
                <div class="col-md-6">
                    <span class="form-group text-input">
                        <div class="label">{{$element->label}}</div>
                        <input type="date" name="element[{{$element->type}}-**-{{$element->label}}-**-{{$key}}]">
                    </span>
                </div>
                @elseif( $element->type==="number" )

                <div class="col-md-6">
                    <span class="form-group text-input">
                        <div class="label">{{$element->label}}</div>
                        <input type="number" name="element[{{$element->type}}-**-{{$element->label}}-**-{{$key}}]">
                    </span>
                </div>

                @elseif($element->type==='select')

                <div class="col-md-6">
                    <span class="form-group text-input cmt-arrow top-64">
                        <div class="label">{{$element->label}}</div>
                        <select name="element[{{$element->type}}-**-{{$element->label}}-**-{{$key}}]">
                            @foreach (json_decode($element->value) as $item)
                            <option value="{{$item->value}}">{{$item->label}}</option>
                            @endforeach
                        </select>
                    </span>
                </div>

                @elseif($element->type==="file")

                <div class="col-md-6">
                    <span class="form-group text-input">
                        <div class="label">{{$element->label}}</div>
                        <input class="transparent" type="file"
                            name="file[{{$element->type}}-**-{{$element->label}}-**-{{$key}}]">
                    </span>
                </div>
                @elseif($element->type==='textarea' )

                <div class="col-md-6">
                    <span class="form-group text-input">
                        <div class="label">{{$element->label}}</div>
                        <textarea name="element[{{$element->type}}-**-{{$element->label}}-**-{{$key}}]"></textarea>
                    </span>
                </div>
                @elseif($element->type==='checkbox-group')

                <div class="col-md-6">
                    <span class="form-group text-input">
                        <div class="label">{{$element->label}}</div>
                    </span>
                    <span class="form-group text-input">
                        @foreach (json_decode($element->value) as $item)
                        <div class="form-check form-check-inline ">
                            <label class="container-checkbox">{{$item->value}}
                                <input class="form-check-input" type="checkbox"
                                    name="element[{{$element->type}}-**-{{$element->label}}-**-{{$key}}]"
                                    value="{{$item->value}}">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        @endforeach
                    </span>
                </div>
                @elseif( $element->type==='radio-group')

                <div class="col-md-6">
                    <span class="form-group text-input">
                        <div class="label">{{$element->label}}</div>
                    </span>
                    <span class="form-group text-input">
                        @foreach (json_decode($element->value) as $item)

                        <div class="form-check form-check-inline">
                            <label class="container-radio">{{$item->value}}
                                <input class="form-check-input" type="radio"
                                    name="element[{{$element->type}}-**-{{$element->label}}-**-{{$key}}]"
                                    value="{{$item->value}}"> <span class="checkmark"></span>
                            </label>
                        </div>
                        @endforeach

                    </span>
                </div>
                @elseif($element->type==='paragraph')

                <div class="col-md-6">
                    <span class="form-group text-input">
                        <div class="label">{{$element->label}}</div>
                        <textarea name="element[textarea-**-Text Area-**-1]"></textarea>
                    </span>
                </div>
                @endif

                @endforeach
                <div class="col-md-12">
                    <div class="form-group text-center">
                        <input name="service" type="hidden" value="5">
                        <input type="submit"
                            class="cmt-btn cmt-btn-size-md cmt-btn-shape-round cmt-btn-style-border cmt-btn-color-dark cmt-color">
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
@include('frontend.layouts.footer')
@endsection()
@section('scripts')
@endsection