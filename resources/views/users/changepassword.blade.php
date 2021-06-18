@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card">
                    <div class="card-header">
                        {{ __('Change Password') }}
                    </div>

                    <div class="card-body">
                        <form method="post" action="{{route('users.changepasswordmethod')}}" >
                            @csrf
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right" >Current Password</label>
                                <div class="col-md-6">
                                    <input class="form-control @error('password') is-invalid @enderror " style="position:absolute;"  placeholder="Enter Current Password" type="password" name="currentpassword" required autofocus> <br><br>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right" >New Password</label>
                                <div class="col-md-6">
                                    <input class="form-control @error('password') is-invalid @enderror " style="position:absolute;"  placeholder="Enter New Password" type="password"  name="password" required autofocus> <br><br>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right" >Confirm Password</label>
                                <div class="col-md-6">
                                    <input class="form-control @error('password') is-invalid @enderror " style="position:absolute;"  placeholder="Confirm New Password" type="password" name="confirmpassword" required autofocus> <br><br>
                                </div>
                            </div>


                            <button class="btn btn-primary" type="submit" style="float:right">Change Password</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
