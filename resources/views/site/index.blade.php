@extends('layouts.master')

@section('css')
  <style>
     .img{
        width: 100%;
        height: 400px;
        background-image: url({{url('images/background.jpg')}});
        background-attachment: fixed;
        background-size: cover;
     }
     .jumbotron{
          height: 100vh;
      }
     .middle{
     	text-align: center;
     }
  </style>
@endsection

@section('jumbo')
  <div class="jumbotron img">
    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-6">
        <h1 class="middle" style="color: #6796EA;">Pet World</h1>
        <h3 class="middle" style="color: white">For all you pet needs</h3>
        <br><br><br>
        <h2 class="middle" style="color: #000000">Welcome to Pet World</h2>
        <br><br>
        <center>
	        <a href="{{ url('/register') }}" class="btn btn-primary">Sign Up</a>
	        <a href="{{ url('login') }}" class="btn btn-primary">Login</a>
        </center>
      </div>
      <div class="col-md-3"></div>
    </div>
  </div> 
@endsection