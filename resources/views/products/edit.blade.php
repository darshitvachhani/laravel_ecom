@extends('layouts.app')


@section('content')
<div class="container">
    <div class="form_div" style="position:absolute; top:20%; left:35%;">
        <form method="post" action="{{route('products.update',$productArr->id)}}" enctype="multipart/form-data">
            @csrf
            @method('put')
            <h1>Update Product Details</h1>

            <div class="form-group row">
            <label class="col-md-4 col-form-label text-md-right" >Name</label>
                <div class="col-md-6">
                    <input class="form-control @error('name') is-invalid @enderror " style="position:absolute; left:80%;" placeholder="Enter name of your product here" type="text"  name="name" value="{{$productArr->name}}"  > <br><br>

                    @error('name')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                    @enderror

                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-4 col-form-label text-md-right" >Description</label>
                    <div class="col-md-6">
                        <textarea class="form-control @error('description') is-invalid @enderror " style="position:absolute; left:80%;" placeholder="Enter Description of your product here" type="text"  name="description" value="" > {{$productArr->description}} </textarea><br><br>

                        @error('description')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
            </div><br><br>

            <div class="form-group row">
                <label class="col-md-4 col-form-label text-md-right" >Price</label>
                    <div class="col-md-6">
                        <input class="form-control @error('price') is-invalid @enderror " style="position:absolute; left:80%;" placeholder="Enter expected price of your product here" type="text"  name="price" value="{{$productArr->price}}" > <br><br>

                        @error('price')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                        @enderror

                    </div>
            </div>

            <div class="form-group row">
                <label class="col-md-4 col-form-label text-md-right" >Image</label>
                <div class="col-md-6">
                        <div class="custom-file">
                            <input type="file" name ="image" class="form-control @error('image') is-invalid @enderror"  id="inputGroupFile01"
                                aria-describedby="inputGroupFileAddon01" autofocus>
                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>

                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-4 col-form-label text-md-right">Status</label>
                <div class="col-md-6">
                    <select style="position:absolute; left:80%;" class="form-control @error('status') is-invalid @enderror" style="position:absolute;" name="status">
                        <option @if($productArr->status === "2") selected @endif value="2">Unsold</option>
                        <option @if($productArr->status === "1") selected @endif value="1">Sold</option>
                    </select><br><br>

                    @error('status')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                    @enderror

                </div>
            </div>

            <button style="position:absolute; top:150%;" type="submit">Update</button>
        </form>
    </div>
</div>
@endsection
