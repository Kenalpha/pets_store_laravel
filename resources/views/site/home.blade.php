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
     .backgrd{
          background-color: #E8E8E8;
          border-radius: 2%;
          margin-top: 0px;
     }
     .padding{
          margin: 10px;
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
      <div class="col-md-10">
          @if (session('status'))
              <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                {{ session('status') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
          @endif
          @if (session('status_s'))
              <div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
                {{ session('status_s') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
          @endif
          <div class="row justify-content-center">
            <div class="col-md-10 backgrd">
              <h3 class="text-center">Online Cart</h3>
              <div class="row">
              @if(count($products) > 0)
              @foreach($products as $product)
                <div class="card padding" style="width: 12rem;">
                  <img class="card-img-top" src='{{ url("$product->product_image") }}' alt="product">
                  <div class="card-body">
                    <h5 class="card-title">{{ $product->product_name }}</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    Color
                    <form action='{{ url("addCart") }}' method="POST">
                    @csrf
                    <select id="color_id" name="color_id">
                      @if(count($colors) > 0)
                        @foreach($colors->all() as $color)
                          <option value='{{ $color->id }}'>{{ $color->color_name }}</option>
                        @endforeach
                      @else
                        <option value="1">Default</option>
                      @endif
                    </select>
                    <input class="d-none" value='{{ $product->id }}' name="product_id">
                    <p>Ksh:{{ $product->cost }}</p>
                    <button type="submit" class="btn btn-primary">Add to Cart</button>
                    </form>
                  </div>
                </div>
                @endforeach
                @else 
                  <h4 class="text-center">No Products found</h4>
                @endif
              </div>
            </div>
          </div>
      </div>
  </div>
</div>
@endsection