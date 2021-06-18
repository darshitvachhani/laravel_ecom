@extends('layouts.app')

@section('content')

<html>
    <head>
        <style>
            table
            {
                position:absolute;
                top:20%;
                left:40%;
            }
        </style>
    </head>
<body>
<div class="container">
    @if ($productsArr->isEmpty() )
    <div style="position:absolute; top:39%; left:38%;" class="alert alert-danger"><h3 >You don't have any Advertisements</h3></div>

    @else
    <h1 style="position:absolute; top:12%; left:33%; " class="display-4" >Your Advertisments</h1>

        <div class="table_div">
            {{session('msg')}}
            @php
                        $serialno=0;
            @endphp
            <table class="table table-striped" style="position:absolute; top:35%;  left:0.5%">
                <tr >
                    <th style="padding-left:20px; padding-right:20px "> Sr No. </th>
                    <th style="padding-left:20px; padding-right:20px "> Name </th>
                    <!--<th style="padding-left:20px; padding-right:20px "> Seller </th>-->
                    <th style="padding-left:20px; padding-right:20px "> Category </th>
                    <th style="padding-left:20px; padding-right:20px "> Description </th>
                    <th style="padding-left:20px; padding-right:20px "> Price(₹) </th>
                    <th style="padding-left:20px; padding-right:20px "> Image </th>
                    <th style="padding-left:20px; padding-right:20px "> Status </th>
                    <th style="padding-left:20px; padding-right:20px "> Added On </th>
                    <th style="padding-left:20px; padding-right:20px "> Operations </th>
                </tr>
                <!--{{$productsArr}}-->

                @foreach($productsArr as $productInfo)

                    @if( Auth::user()->id != $productInfo->user_id )
                    @else
                        <tr>
                            @php
                                $serialno=$serialno + 1;
                                if($productInfo->status == 1) {
                                    $status = "Sold";
                                }
                                else if($productInfo->status == 2) {
                                    $status = "Unsold";
                                }
                                $creationDateOldFormat= date_create($productInfo->created_at);
                                $creationDateNewFormat = date_format($creationDateOldFormat,"d/m/Y H:i:s");

                                $sellerFullName=$productInfo->user->firstname.' '.$productInfo->user->lastname;
                            @endphp

                            <td style="padding-left:20px; padding-right:20px ">  {{ $serialno }} </td>
                            <td style="padding-left:20px; padding-right:20px "> {{$productInfo->name}} </td>
                        <!-- <td style="padding-left:20px; padding-right:20px "> {{$sellerFullName}}  </td>-->
                            <td style="padding-left:20px; padding-right:20px "> {{$productInfo->category->name}}  </td>
                            <td style="padding-left:20px; padding-right:20px "> {{$productInfo->description}}  </td>
                            <td style="padding-left:20px; padding-right:20px "> {{$productInfo->price}}  </td>
                            <td style="padding-left:20px; padding-right:20px "> <img style="height:70px; width:70px;" src= "{{'../storage/app/public/images/'.$productInfo->image}}"></td>
                            <td style="padding-left:20px; padding-right:20px "> {{ $status }}  </td>
                            <td style="padding-left:20px; padding-right:20px "> {{$creationDateNewFormat}} </td>
                            <td style="padding-left:20px; padding-right:20px "> <a href="{{route('products.edit',$productInfo->id)}}"><button style="border:0.5px solid grey" class="btn btn-light">Edit</button></a>&nbsp<a href="{{route('products.delete',$productInfo->id)}}"><button style="border:0.5px solid grey" class="btn btn-dark">Delete</button></a></td>
                        </tr>
                    @endif
                @endforeach
            </table>


        </div>
    @endif
    <a href="{{route('products.export')}}"><button class="btn btn-primary" style="position:absolute; top:25%; left:2%;">Export Product Listing as an Excel file</button></a>
    <a href="{{route('products.importview')}}"><button class="btn btn-danger" style="position:absolute; top:25%; left:23%;">Import Product Listing </button></a>
    <a href="{{route('helperfunctions.examples')}}"><button class="btn btn-warning" style="position:absolute; top:25%; left:39%;">Helper functions Example</button></a>
</div>
</body>
</html>
@endsection
