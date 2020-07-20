@extends('frontend.layouts.app')
@section('content')

    {{-- <section class="fullwidth-section"> --}}
        <div class="container">
            <div class="content">
                <div class="row">
                    <div class="col-lg-9">
                        <h4>{{ $termsAndConditions->heading ?? '' }} </h4>
                        <p>{!! $termsAndConditions->description ?? '' !!}</p>
                    </div>
                </div>
            </div>
        </div>
    {{-- </section> --}}


@endsection()