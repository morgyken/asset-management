<table class="table">
                <thead>
                <th>Asset ID</th>
                 <th>Name</th>
                <th>Allocated User </th>
               
                <th>availability</th>
                <th>Bookings</th>
                <th>status</th>
               
                </thead>
                @foreach( $data as $asset => $value)
                <tr>
                <td>{{ $value->serial }}</td>
                <td>{{ $value->name }} </td>
                <td>{{ $value->username }} </td>
              
                <td>{{ $value->availability }}</td>
                <td>{{ $value->bookings }}</td>
                <td>{{ $value->status }}</td>
                
            </tr>

                @endforeach

                </table>