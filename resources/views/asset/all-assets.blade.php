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
                <th> availability</th>
                <th>Bookings</th>
                <th>status</th>
                </thead>
                @foreach( $data as $asset => $value)
                <tr>
                <td>Asset ID</td>
                <td>Name </td>
                <td>Details </td>
                <td> availability</td>
                <td>Bookings</td>
                <td>status</td>
                </tr>

                @endforeach

                </table>

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
