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
        <div class="col-md-12">
            <div class="card" id="app">
                <div class="card-header">{{ __('Make Application') }}</div>

                <div class="card-body">
                <div class="col-md-5">Name: {{ $asset -> name}} </div>
                <div class="col-md-4">Availabe: {{ $asset ->availability}} </div>  
                <div class="col-md-6"><img src="{{URL::asset('/storage/uploads/'.$asset->name.'/'.$asset->pic)}}" alt="..." > </div>
                <div class="col-md-6">
                <p> Bookings: {{ $asset-> bookings}}</p>
                <p> Descriptions: {{ $asset-> description}}  </p>
                <p> Status:  {{$asset -> status}} </p>           
                
                </div> 
                 <form method ="post" action= "{{ route(''apply.alloc') }}">
                        <div class ="form-group">
                            <select class="form-control col-md-offset-4" name="username">
                            @foreach($users as $user)
                            <option value="{{ $user->name }}">{{ $user->name }}</option>
                            @endforeach
                                                       
                            </select> 
                            <input type="hidden" value="{{ $asset->id}}" name="asset_id" >

                             <div class ="form-group">
                                Start Date <input name ="startdate" class="form-control" >
                            </div>

                            <div class ="form-group">
                                End Date <input name ="enddate" class="form-control" >
                            </div>

                        </div>
                        <div class ="form-group">
                            
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Allocate Asset') }}
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
