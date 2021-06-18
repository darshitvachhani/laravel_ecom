@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add Category') }}</div>


                 <div class="card-body">
                        <form method="post" action="{{route('categories.store')}}" enctype="multipart/form-data" >
                            @csrf
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right" >Name</label>
                                <div class="col-md-6">
                                    <input class="form-control @error('name') is-invalid @enderror " style="position:absolute;"  placeholder="Enter Category Name" type="text" value="{{ old('name') }}" name="name" autofocus> <br><br>

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
                                    <textarea  class="form-control @error('description') is-invalid @enderror" style="position:absolute;" placeholder="Enter Category Desciption" type="text"  name="description" autofocus>{{ old('description') }}</textarea><br><br><br>

                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right" >Status</label>
                                <div class="col-md-6">
                                    <select   class="form-control @error('status') is-invalid @enderror" style="position:absolute;" name="status" value="{{ old('status') }}" autofocus>
                                        <option value = "">Please select status</option>
                                        <option value="2">Active</option>
                                        <option value="1">Inactive</option>
                                    </select><br><br>

                                    @error('status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>
                            </div>

                            <button class="btn btn-primary" type="submit" style="float:right">Add Category</button>
                        </form>

                </div><!--Card Body-->
        </div><!--Card-->
    </div><!--Col md-8-->
</div><!--Row justify content-->
</div>
@endsection
