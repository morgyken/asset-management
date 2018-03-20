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
                <div class="card-header">{{ __('All Assets') }}</div>

                <div class="card-body">
                <div class="col-md-5">{{ $asset -> name}} </div>
                <div class="col-md-4">{{ $asset ->availability}} </div>  
                <div class="col-md-6"><img src="{{URL::asset('/storage/uploads/'.$asset->name.'/'.$asset->pic)}}" alt="..." > </div>
                <div class="col-md-6">
                <p> Bookings: {{ $asset-> bookings}}  </p>
                <p> Descriptions: {{ $asset -> description}}  </p>
                <p> Status:  {{$asset -> status}} </p>              

               
                  

                
                </div> 
                 <form type ="Post" action= "">
                        <div class ="form-group">
                            <select class="form-control col-md-offset-4" name="username">
                            @foreach($users as $user)
                            <option value="{{ $user->name }}">{{ $user->name }}</option>
                            @endforeach
                                                       
                            </select> 
                            <input type="hidden" value="{{ $asset->id}}" >

                             <div class ="form-group">
                                Start Date <input name ="startdate" class="form-control" >
                            </div>

                            <div class ="form-group">
                                End Date <input name ="enddate" class="form-control" >
                            </div>

                        </div>
                        <div class ="form-group">
                            
                            <input type="button" value="Allocate the Asset" 
                            class="btn btn-primary">
                        </div> 
                </form>                              


                 </div>             
                        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
