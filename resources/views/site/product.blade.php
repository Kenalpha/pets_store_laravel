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
          <form action="{{ url('/addProduct') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="color_name">Enter Product Name:</label>
              <input type="text" class="form-control form-control{{ $errors->has('product_name') ? ' is-invalid' : '' }}" id="product_name" name="product_name" value="{{ old('product_name') }}"  autofocus>
              @if ($errors->has('product_name'))
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('product_name') }}</strong>
                  </span>
              @endif
            </div>
            <div class="form-group">
              <label for="product_image">Upload Product Image:</label>
              <input type="file" class="form-control form-control{{ $errors->has('product_image') ? ' is-invalid' : '' }}" id="product_image" name="product_image" value="{{ old('product_image') }}"  autofocus>
              @if ($errors->has('product_image'))
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('product_image') }}</strong>
                  </span>
              @endif
            </div>
            <div class="form-group">
              <label for="description">Description</label>
                <textarea id="description" rows="7" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" value="{{ old('description') }}"></textarea>
                </textarea>
                @if ($errors->has('description'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('description') }}</strong>
                    </span>
                @endif
          </div>
            <div class="form-group">
              <label for="cost">Enter Product Cost:</label>
              <input type="text" class="form-control form-control{{ $errors->has('cost') ? ' is-invalid' : '' }}" id="cost" name="cost" value="{{ old('cost') }}"  autofocus>
              @if ($errors->has('cost'))
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('cost') }}</strong>
                  </span>
              @endif
            </div>
            <button type="submit" class="btn btn-primary">Add</button>
          </form>
        </div>
    </div>
  </div>
@endsection