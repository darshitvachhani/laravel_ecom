@extends('layouts.app')

@section('content')
        <div class="container">
                <form method="post" action="{{route('products.search')}}">
                    @csrf
                    <input style="height:36px;" name="searchKeyword"  placeholder="Search for products" >
                    <button type="submit" class="btn btn-info">Search</button>
                </form>
                <div class="row">
                    @foreach($productsArr as $productInfo)
                        @if($productInfo->user_id != Auth::user()->id)
                            <div class="card" style="height:200px; width:23%; border:1px solid grey ; border-radius:15px; margin-right:20px; margin-top:20px;">
                                <div class="card-body">
                                    <div class="row" >
                                        <div class="col-md-5"  style="height:130px; ">
                                            <img style="height:100px; width:70px;" src= "{{'../../storage/app/public/images/'.$productInfo->image}}">
                                        </div>
                                        <div class="col-md-7">
                                            <div style="height:80px;">
                                                {{$productInfo->name}}<br>
                                                {{$productInfo->description}}
                                            </div>
                                            <div style="height:50px;">
                                                <br>
                                                ₹{{$productInfo->price}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="class-footer" >
                                    <a href="{{route('users.addaddressview')}}" ><button style="margin-left:14px; margin-bottom:5px;" class= "btn btn-secondary btn-sm" >Buy</button></a>
                                    <a><button style="margin-bottom:5px;" class= "btn btn-dark btn-sm" >Add to cart</button></a>
                                    <a><button style="margin-bottom:5px;" class= "btn btn-danger btn-sm">Add to wish list</button></a>
                                </div>
                            </div>
                        @endif
                @endforeach
                </div>


        </div>
@endsection
