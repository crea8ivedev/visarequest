@extends('frontend.layouts.app')
@section('content')

    {{-- <section class="fullwidth-section"> --}}
        <div class="container">
            <div class="content">
                <div class="row">
                    <div class="col-lg-9">
                    <h6>Pretoria Address<h6>
                        <p>{!! $contactUs->address ?? '' !!}</p>
                    <h6>Cape Town Address<h6>
                        <p>{!! $contactUs->address1 ?? '' !!}</p>
                    <h6>Email<h6>
                        <p>{!! $contactUs->email ?? '' !!}</p>
                    <h6>Cell Phone<h6>
                        <p>{!! $contactUs->cell_phone ?? '' !!}</p>
                    <h6>Telephone<h6>
                        <p>{!! $contactUs->telephone ?? '' !!}</p>
                    <h6>International Calls<h6>
                        <p>{!! $contactUs->international_call ?? '' !!}</p>
                    </div>
                </div>
            </div>
        </div>
    {{-- </section> --}}

    <div class="col-lg-8 col-md-7">
        <div class="pl-30 res-991-pl-0 res-767-mt-30">
            <!-- section title -->
            <div class="section-title with-desc clearfix">
                <div class="title-header">
                    <h2 class="title">Feedback <strong>VisaRequest</strong></h2>
                </div>
            </div><!-- section title end -->
            <div id="showResponseArea" class="showResponseArea alert d-none">
                <span>
                    <strong id="alertType">Success !! </strong> <span id="requestId"> // Request id goes here</span>
                </span>
            </div>
            <form id="contact_form" class="contact_form wrap-form pt-15 clearfix" method="post" novalidate="novalidate" >
                <div class="row">
                <div class="form-field col-md-12">
                    <select name="type" id="type" class="input-text js-select">
                        <option value=''>Select feedback type</option>
                        <option value="COMPLIMENTS">Compliments</option>
                        <option value="COMPLAINTS">Complaints</option>
                    </select>
                </div>
                    <div class="col-lg-6 col-md-6">
                        <label>
                            <span class="text-input"><input name="name" type="text" value="" placeholder="Your Name" ></span>
                        </label>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <label>
                            <span class="text-input"><input name="email" type="email" value="" placeholder="Your Email" ></span>
                        </label>
                    </div>
                </div>
                
                <label>
                    <span class="text-input"><textarea name="message" rows="5" placeholder="Message" required="required"></textarea></span>
                </label>
                <button class="submit cmt-btn cmt-btn-size-lg cmt-btn-shape-rounded cmt-btn-style-border cmt-btn-color-dark w-100" type="submit">Submit Request !  <i id="submit" class="fa fa-spinner fa-spin d-none" ></i></button>
            </form>
        </div>
    </div> 

@endsection

@section('scripts')
@foreach(config('layout.resources.validate_js') as $script)
    <script src="{{ asset($script) }}" type="text/javascript"></script>
@endforeach
{!! JsValidator::formRequest('App\Http\Requests\Frontend\FeedbackRequest') !!}
<script src="{{ asset('js/feedback.js') }}" type="text/javascript" ></script>
<script>

</script>
@endsection