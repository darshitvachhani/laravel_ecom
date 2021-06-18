@extends('layouts.app')

@section('content')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Add Product') }}</div>

                        <div class="card-body">
                                <form method="post" action="{{route('products.store')}}" enctype="multipart/form-data" >
                                    @csrf

                                    <div class="form-group row">
                                        <label class="col-md-4 col-form-label text-md-right" >Name</label>
                                        <div class="col-md-6">
                                            <input style="position:absolute;"  placeholder="Enter name of your product here" type="text" class="form-control @error('name') is-invalid @enderror"  name="name" autofocus> <br><br>

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
                                            <textarea  class="form-control @error('description') is-invalid @enderror" style="position:absolute;" placeholder="Enter Description of your product here" type="text"  name="description"  autofocus></textarea><br><br><br>

                                            @error('description')
                                                        <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                        </span>
                                            @enderror

                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label class="col-md-4 col-form-label text-md-right" >Price</label>
                                        <div class="col-md-6">
                                            <input class="form-control @error('price') is-invalid @enderror" style="position:absolute;" placeholder="Enter price of your product here" type="text" class="form-control @error('price') is-invalid @enderror"  name="price"  autofocus> <br><br>

                                            @error('price')
                                                        <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                        </span>
                                            @enderror

                                        </div>
                                    </div>

                                    <!--<div class="form-group row">
                                    <label class="col-md-4 col-form-label text-md-right" >Image</label>
                                        <div class="col-md-6">
                                            <input   style="position:absolute;" type="file" name ="image" required autofocus> <br><br>
                                        </div>
                                    </div>-->
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
                                        <label class="col-md-4 col-form-label text-md-right" >Category</label>
                                        <div class="col-md-6">
                                            <select  class="form-control @error('category') is-invalid @enderror" style="position:absolute;" name="category" autofocus>
                                                <option value = "">Please select Category</option>
                                                @foreach ( $categoriesArr as $categoryInfo )
                                                    @if($categoryInfo->status==2)
                                                        <option value={{$categoryInfo->id}}> {{ $categoryInfo->name }} </option>
                                                    @endif
                                                @endforeach
                                            </select><br><br>

                                            @error('category')
                                                        <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                        </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!--<div class="form-group row">
                                            <label class="col-md-4 col-form-label text-md-right" >Status</label>
                                            <div class="col-md-6">
                                                <select   class="form-control"style="position:absolute;" name="status" required autofocus>
                                                    <option value = "">Please select status</option>
                                                    <option value="2">Active</option>
                                                    <option value="1">Inactive</option>
                                                </select><br><br>
                                            </div>
                                        </div>-->

                                    <button class="btn btn-primary" type="submit" style="float:right">Add product</button>
                                </form>

                        </div><!--Card Body-->
                </div><!--Card-->
            </div><!--Col md-8-->
        </div><!--Row justify content-->
    </div>
@endsection
