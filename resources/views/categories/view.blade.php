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
    @if ($categoriesArr->isEmpty())

        <div class="alert alert-danger" style="position:absolute; top:19%; left:40%;"><h1>No categories Added</h1></div>

    @else
        <h1 style="position:absolute; top:19%; left:43%; ">Categories</h1>
        <div class="table_div">
                <div style="position:absolute; top:10%; left:10%">
                    {{session('msg')}}
                </div>
            @php
                        $serialno=0;
            @endphp
            <table style="position:absolute; top:35%; left:1% " class="table table-striped">
                <tr>
                    <th style="padding-left:20px; padding-right:20px "> Sr No. </th>
                    <th style="padding-left:20px; padding-right:20px "> Name </th>
                    <th style="padding-left:20px; padding-right:20px "> Description </th>
                    <th style="padding-left:20px; padding-right:20px "> Status </th>
                    <th style="padding-left:20px; padding-right:20px "> Added On </th>
                    <th style="padding-left:20px; padding-right:20px "> Operations </th>
                </tr>


                @foreach($categoriesArr as $categoryInfo)

                <tr>

                    @php
                        $serialno=$serialno + 1;
                        if($categoryInfo->status == 1) {
                            $status = "Inactive";
                        }
                        else if($categoryInfo->status == 2) {
                            $status = "Active";
                        }
                        $creationDateOldFormat= date_create($categoryInfo->created_at);
                        $creationDateNewFormat = date_format($creationDateOldFormat,"d/m/Y H:i:s");
                    @endphp


                    <td style="padding-left:20px; padding-right:20px ">  {{ $serialno }} </td>
                    <td style="padding-left:20px; padding-right:20px "> {{$categoryInfo->name}} </td>
                    <td style="padding-left:20px; padding-right:20px "> {{$categoryInfo->description}}  </td>
                    <td style="padding-left:20px; padding-right:20px "> {{ $status }}  </td>
                    <td style="padding-left:20px; padding-right:20px "> {{$creationDateNewFormat}}  </td>
                    <td style="padding-left:20px; padding-right:20px "> <a href="{{route('categories.edit',$categoryInfo->id)}}"><button style="border:0.5px solid grey" class="btn btn-light">Edit</button></a>&nbsp<a href="{{route('categories.delete',$categoryInfo->id)}}"><button style="border:0.5px solid grey" class="btn btn-dark">Delete</button></a></td>
                </tr>
                @endforeach
            </table>
        </div>
    @endif
</div>
</body>
</html>
@endsection
