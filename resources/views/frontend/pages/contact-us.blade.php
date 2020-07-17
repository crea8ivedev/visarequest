@extends('frontend.layouts.app')
@section('content')

    <section class="fullwidth-section">
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
    </section>


@endsection()