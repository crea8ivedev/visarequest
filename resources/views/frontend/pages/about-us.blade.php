@extends('frontend.layouts.app')
@section('content')

    <section class="fullwidth-section">
        <div class="container">
            <div class="content">
                <div class="row">
                    <div class="col-lg-9">
                        <h4>{{ $aboutUs->heading ?? '' }} </h4>
                        <p>{!! $aboutUs->description ?? '' !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection()