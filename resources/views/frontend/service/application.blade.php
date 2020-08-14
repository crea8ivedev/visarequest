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
        <form class="application_form contact_form wrap-form clearfix" id="application_form" name="application_form" method="post" action="http://dev.visarequest/application" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="R0z5qQAwG2tHhtR6j5vUSnBOS5J8ghyd4aXPN2vD">
            <div class="row">
                <div class="col-md-6">
                    <span class="form-group text-input">
                        <label class="label">Text Field</label>
                        <input type="text" name="element[text-**-Text Field-**-0]">
                    </span>
                </div>
                <div class="col-md-6">
                    <span class="form-group text-input cmt-arrow top-64">
                        <label class="label">Select</label>
                        <select name="element[select-**-Select-**-2]">
                            <option value="option-1">Option 1</option>
                            <option value="option-2">Option 2</option>
                            <option value="option-3">Option 3</option>
                        </select>
                    </span>
                </div>
                <div class="col-md-6">
                    <span class="form-group text-input">
                        <label class="label">Date Field</label>
                        <input type="date" name="element[date-**-Date Field-**-3]">
                    </span>
                </div>
                <div class="col-md-6">
                    <span class="form-group text-input">
                        <label class="label">Number</label>
                        <input type="number" name="element[number-**-Number-**-8]">
                    </span>
                </div>
                <div class="col-md-12">
                    <span class="form-group text-input">
                        <label class="label">File Upload</label>
                        <input class="transparent" type="file" name="file[file-**-File Upload-**-7]">
                    </span>
                </div>
                <div class="col-md-12">
                    <span class="form-group text-input">
                        <label class="label">Paragraph</label>
                        <textarea name="element[textarea-**-Text Area-**-1]"></textarea>
                    </span>
                </div>
                <div class="col-md-6">
                    <span class="form-group text-input">
                        <label class="label">Checkbox Group</label>
                    </span>
                    <span class="form-group text-input">
                        <div class="form-check form-check-inline ">
                            <label class="container-checkbox">Option 1
                                <input class="form-check-input" type="checkbox" name="element[checkbox-group-**-Checkbox Group-**-5]" value="option-1">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </span>
                </div>
                <div class="col-md-6">
                    <span class="form-group text-input">
                        <label class="label">Radio Group</label>
                    </span>
                    <span class="form-group text-input">
                        <div class="form-check form-check-inline">
                            <label class="container-radio">Option 1
                                <input class="form-check-input" type="radio" name="element[radio-group-**-Radio Group-**-6]" value="option-1">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <label class="container-radio">Option 2
                                <input class="form-check-input" type="radio" name="element[radio-group-**-Radio Group-**-6]" value="option-2">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <label class="container-radio">Option 3
                                <input class="form-check-input" type="radio" name="element[radio-group-**-Radio Group-**-6]" value="option-3">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </span>
                </div>
                <div class="col-md-12">
                    <span class="form-group text-input">
                        <label class="label">Text Area</label>
                        <textarea name="element[textarea-**-Text Area-**-1]"></textarea>
                    </span>
                </div>
                <div class="col-md-12">
                    <div class="form-group text-center">
                        <input name="service" type="hidden" value="5">
                        <input type="submit" class="cmt-btn cmt-btn-size-md cmt-btn-shape-round cmt-btn-style-border cmt-btn-color-dark cmt-color">
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