@extends('layouts.app')

@section('content')

<style>
.fade-enter-active, .fade-leave-active {
    transition: opacity .5s;
  }
  .fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
    opacity: 0;
  }


</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12" >
            <div class="card" id="app">

                @if(Auth::user()->usertype=='admin')
                <div class="card-header">{{ __('All Assets') }}</div>
                @else
                <div class="card-header">{{ __('Make Application') }}</div>                  

                @endif

                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="card-body">
                <div class="col-md-5"><h3>Asset Name: {{ $asset  -> name}} </h3> </div>
                <div class="col-md-4">Units Available: {{ $asset ->availability}} </div>  
                <div class="col-md-6"><img src="{{URL::asset('/storage/uploads/'.$asset->name.'/'.$asset->pic)}}" alt="..." style="max-width: 900px"  > </div>
                <div class="col-md-6">
                <p> Bookings: {{ $asset-> bookings}}  </p>
                <p> Descriptions: {{ $asset -> description}}  </p>

                @if($asset ->availability > 1)
                <p> Status:  Available</p>   

                @else
                 <p> Status:  Out Of Stock</p> 
                @endif        
                
                </div> 

                @if(Auth::user()->usertype=='admin')
                 <form method ="post" action= "{{ route('asset.allocate') }}">
                @else
                  <form method ="post" action= "{{ route('apply.alloc') }}">

                @endif

             
                        <div class ="form-group">

                            @if(Auth::user()->usertype == 'admin')
                          
                            @if($users==null)
                            <h3> There are no current applicant for this asset</h3>
                            @else
                            <select class="form-control col-md-offset-4" name="username">
                            @foreach($users as $user)
                            <option value="{{ $user->username }}">{{ $user->username }}</option>
                            @endforeach
                            </select> 
                            @endif

                            @else
                                <input type="hidden" value="{{Auth::user()->name}}" name="username" >

                            @endif
                                                       
                            
                            <input type="hidden" value="{{ $asset->id}}" name="asset_id" >

                             <div class ="form-group">
                                Start Date <input name ="startdate" type="date" class="form-control" >
                            </div>

                            <div class ="form-group">
                                End Date <input name ="enddate" type="date" class="form-control" >
                            </div>

                            {{ csrf_field() }}

                        </div>
                        <div class ="form-group">
                            
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">

                                    @if(Auth::user()->usertype=='admin')
                                     {{ __('Allocate Asset') }}
                                    @else
                                      {{ __('Make Applications') }}

                                    @endif
                                   
                                </button>
                            </div>
                        </div>
                        </div> 
                </form>                              


                 </div>             
                        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
