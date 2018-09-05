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
          background-color: #F8F8F8;
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
            <div class="col-md-12 backgrd">
              <h3 class="text-center">Shopping Cart</h3>
              <div class="row">
                @if(count($cart_items) > 0)
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr class="d-flex">
                        <th class="col-sm-2">Product</th>
                        <th class="col-sm-4">Image</th>
                        <th class="col-sm-2">Quantity</th>
                        <th class="col-sm-2">Action</th>
                        <th class="col-sm-2">Price</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($cart_items->all() as $item)
                      <tr class="d-flex">
                        <td class="col-sm-2">{{ $item->product_name }}</td>
                        <td class="col-sm-4"><img class="img-fluid" src='{{ url("$item->product_image") }}'></td>
                        <td class="col-sm-2">
                          <form method="POST" action='{{ url("/edit/{$item->o_id}") }}'>
                          @csrf
                          <input type="hidden" class="d-none cost" value='{{ $item->cost }}'>
                          <input type="text" value="{{ $item->quantity }}" class="form-control quantity {{ $errors->has('quantity') ? ' is-invalid' : '' }}" name="quantity" required>
                          @if ($errors->has('quantity'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('quantity') }}</strong>
                              </span>
                          @endif
                        </td>
                        <td class="col-sm-2">
                            <div class="btn-group-vertical">
                              <button type="submit" class="btn btn-primary">Save</button>
                              </form>
                              <a href='{{ url("/delete/{$item->o_id}") }}' type="button" class="btn btn-danger">Delete</a>
                            </div>
                        </td>
                        <td class="col-sm-2">Ksh: <span class="price"></span></td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>           
                @else
                <h3 class="text-center">No Items</h3>
                @endif
              </div>
            </div>
          </div>
      </div>
  </div>
</div>
@endsection

@section('js')
<script>
$(document).ready(function(){
  calculate();

  function calculate()
  {
    var cost = parseInt($('.cost').val());
    var quantity = parseInt($('.quantity').val());
    // var product = cost * product;
    // alert(cost * product);
    // $('.price').text(product);
  }  
});
</script>
@endsection