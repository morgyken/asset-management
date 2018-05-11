@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header"><h2>{{ __('Allocated Assets') }} </h2></div>
                <div class="card-body">
                @include('asset.allocations')                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
