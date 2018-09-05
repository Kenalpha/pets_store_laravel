@extends('layouts.master')

@section('css')
  <style>
     .img{
        width: 100%;
        height: 400px;
        background-image: url({{url('images/background.jpg')}});
        background-size: cover;
     }
     .jumbotron{
          height: 25vh;
      }
     .middle{
     	    text-align: center;
     }
     .navbar-custom { 
          background:rgba(59, 89, 152,0.5) !important;
     }
  </style>
@endsection

@section('jumbo')
  <div class="jumbotron img">
    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-6">
        <h1 class="middle" style="color: #6796EA;">Pet World</h1>
      </div>
      <div class="col-md-3"></div>
    </div>
  </div>
  <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <form action="{{ url('/addColor') }}" method="POST">
            @csrf
            <div class="form-group">
              <label for="color_name">Add Color:</label>
              <input type="text" class="form-control form-control{{ $errors->has('color_name') ? ' is-invalid' : '' }}" id="color_name" name="color_name">
              @if ($errors->has('color_name'))
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('color_name') }}</strong>
                  </span>
              @endif
            </div>
            <button type="submit" class="btn btn-primary">Add</button>
          </form>
        </div>
    </div>
  </div>
@endsection