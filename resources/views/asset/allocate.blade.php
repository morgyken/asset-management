@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('All Assets') }}</div>

                <div class="card-body">
                <div class="col-md-6">{{ $asset -> name}} </div>
                <div class="col-md-6">{{ $asset ->availability}} </div>  
                <div class="col-md-6"><img src="" alt="..." > </div>
                <div class="col-md-6">
                <p> Bookings: {{ $asset-> bookings}}  </p>
                <p> Descriptions: {{ $asset -> description}}  </p>
                <p> Status:  {{$asset -> status}} </p>                
                 </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
