@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Register an Asset') }}</div>
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="card-body">

                    <form method="POST" action="{{ route('register.asset') }}" enctype="multipart/form-data"/>
                        @csrf

                        <div class="form-group row">
                            <label for="" class="col-md-4 col-form-label text-md-right">{{ __('Asset Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" 
                                name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="pic" class="col-md-4 col-form-label text-md-right">
                            {{ __('Asset Picture') }}</label>

                            <div class="col-md-6">
                                <input id="pic" type="file" class="form-control{{ 
                                    $errors->has('pic') ? ' is-invalid' : '' }}" 
                                name="pic[]" value="{{ old('pic') }}" required>

                                @if ($errors->has('description'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('pic') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                <textarea id="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" 
                                name="description" value="{{ old('descrition') }}" required> 
                            </textarea> 

                                @if ($errors->has('description'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="availablity" class="col-md-4 col-form-label text-md-right">{{ __('Number Available') }}</label>

                            <div class="col-md-6">
                                <input id="availablity" type="text" class="form-control{{ $errors->has('availablity') ? ' is-invalid' : '' }}" 
                                name="availability" value="{{ old('availability') }}" required>

                                @if ($errors->has('availablity'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('availablity') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        
                        <div class="form-group row">
                            <label for="category" class="col-md-4 col-form-label text-md-right">{{ __('Category') }}</label>

                            <div class="col-md-6">
                            <select class="form-control" name ="category">
                            <option value="Furniture">Furniture</option>
                            <option value="Computing">Computing</option>  
                            <option value="Kitchen">Kitchen</option>
                            <option value="Farming">Farming Asset</option>                           
                            </select>                                

                                @if ($errors->has('category'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('category') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                      

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register Asset') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
