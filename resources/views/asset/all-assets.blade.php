@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">{{ __('All Assets') }}</div>

                <div class="card-body">
                @include('asset.all-assets-table')                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
