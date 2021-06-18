@extends('layouts.app')


@section('content')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Update Category') }}</div>
                         <div class="card-body">
                                    <form method="post" action="{{route('categories.update',$categoryArr->id)}}" enctype="multipart/form-data">
                                        @csrf
                                        @method('put')

                                        <div class="form-group row">
                                            <label class="col-md-4 col-form-label text-md-right" >Name</label>
                                            <div class="col-md-6">
                                                <input class="form-control @error('name') is-invalid @enderror "  style="position:absolute; " placeholder="Enter name of your category here" type="text"  name="name" value="{{$categoryArr->name}}" required > <br><br>

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
                                                <textarea class="form-control @error('description') is-invalid @enderror " style="position:absolute; " placeholder="Enter Description of your category here" type="text"  name="description"  required>{{$categoryArr->description}}</textarea><br><br><br>

                                                @error('description')
                                                        <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                        </span>
                                                @enderror


                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-4 col-form-label text-md-right">Status</label>
                                            <div class="col-md-6">
                                                <select class="form-control" style="position:absolute;" name="status">
                                                    <option @if($categoryArr->status === "2") selected @endif value="2">Active</option>
                                                    <option @if($categoryArr->status === "1") selected @endif value="1">Inactive</option>
                                                </select><br><br>
                                                
                                                @error('status')
                                                        <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                        </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <button class="btn btn-primary" type="submit" style="float:right">Update Category</button>
                                    </form>
            </div><!--Card Body-->
        </div><!--Card-->
    </div><!--Col md-8-->
</div><!--Row justify content-->
</div>
@endsection
