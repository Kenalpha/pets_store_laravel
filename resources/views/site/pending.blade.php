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
                <h3 class="text-center">Pending Orders</h3>
                <table class="table">
                    <thead>
                      <tr class="d-flex">
                        <th class="col-sm-2">Customer</th>
                        <th class="col-sm-4">Product Image</th>
                        <th class="col-sm-2">Quantity</th>
                        <th class="col-sm-2">Action</th>
                        <th class="col-sm-1">Price</th>
                      </tr>
                    </thead>
                    <tbody>
                    @if(count($pending) > 0)
                    @foreach($pending as $pend)
                      <tr class="d-flex">
                        <td class="col-sm-2">{{$pend->fullname}}</td>
                        <td class="col-sm-4"><img class="img-fluid" src='{{ url("$pend->product_image") }}'></td>
                        <td class="col-sm-2">{{$pend->quantity}}</td>
                        <td class="col-sm-2">
                          <a href='' type="button" class="btn btn-success">Supply</a>
                        </td>
                        <td class="col-sm-1">Ksh: </td>
                      </tr>
                    @endforeach
                    @else
                      <h3>No Pending Orders</h3>
                    @endif
                    </tbody>
                </table>
              </div>
            </div>
          </div>
                  


      </div>
  </div>
</div>
@endsection