@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('All Assets') }}</div>

                <div class="card-body">
                <table>
                <thead>
                <th>Asset ID</th>
                <th>Name </th>
                <th>Details </th>
                <th>availability</th>
                <th>Bookings</th>
                <th>status</th>
                <th>Allocate</th>
                </thead>
                @foreach( $data as $asset => $value)
                <tr>
                <td>{{ $value->id }}</td>
                <td>{{ $value->name }} </td>
                <td>{{ $value->description }} </td>
                <td>{{ $value->availability }}</td>
                <td>{{ $value->bookings }}</td>
                <td>{{ $value->status }}</td>
                <td><a href="#" class="btn btn-warning" > Allocate</a></td>
                </tr>

                @endforeach

                </table>

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
