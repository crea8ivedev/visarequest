@extends('frontend.layouts.app')
@section('content')

    {{-- <section class="fullwidth-section"> --}}
        <div class="container">
            <div class="content">
                <div class="row">
                    <div class="col-lg-9">
                      @if(isset($newsList) && !$newsList->isEmpty())

                      @foreach($newsList as $news)
                        <h4>{{ $news->country->name ?? ''}} -{{ date('jS \ M, Y', strtotime($news->created_at)) ?? '' }} </h4>
                        <p>{!! $news->message ?? '' !!}</p>
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    {{-- </section> --}}


@endsection()