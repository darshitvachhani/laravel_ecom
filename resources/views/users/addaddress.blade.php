@extends('layouts.app')

@section('content')
        <div class="container">
            <form method="post" action="{{route('users.addaddressmethod')}}" >
            @csrf

            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Delivery Address') }}</div>
                            <div class="card-body">
                                    <div class="form-group row">
                                        <label class="col-md-4 col-form-label text-md-right">House/Appartment Name</label>
                                        <div class="col-md-6">
                                            <input class="form-control " style="position:absolute;"  placeholder="Enter name of your product here" type="text" class="form-control @error('name') is-invalid @enderror"  name="name" required autofocus> <br><br>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-4 col-form-label text-md-right">Address line 1</label>
                                        <div class="col-md-6">
                                            <textarea  class="form-control" style="position:absolute;" placeholder="Enter Street and locality name" type="text"  name="addressline1" required autofocus></textarea><br><br><br>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-4 col-form-label text-md-right">Address line 2</label>
                                        <div class="col-md-6">
                                            <input class="form-control " style="position:absolute;" placeholder="Enter Nearbuy Landmark here" type="text" class="form-control @error('price') is-invalid @enderror"  name="addressline2" required autofocus> <br><br>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                            <label class="col-md-4 col-form-label text-md-right" >State</label>
                                            <div class="col-md-6">
                                                <select   class="form-control"style="position:absolute;" name="state" required autofocus>
                                                    <option value = "">State/UT</option>
                                                    <option value="Andhra Pradesh">Andhra Pradesh</option>
                                                    <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                                    <option value="Assam">Assam</option>
                                                    <option value="Bihar">Bihar</option>
                                                    <option value="Chattisgarh">Chattisgarh</option>
                                                    <option value="Goa">Goa</option>
                                                    <option value="Gujarat">Gujarat</option>
                                                    <option value="Haryana">Haryana</option>
                                                    <option value="Himachal Pradesh">Himachal Pradesh</option>
                                                    <option value="Jammu and kashmir">Jammu and kashmir</option>
                                                    <option value="Jharkhand">Jharkhand</option>
                                                    <option value="Karnataka">Karnataka</option>
                                                    <option value="Kerala">Kerala</option>
                                                    <option value="Madhya Pradesh">Madhya Pradesh</option>
                                                    <option value="Maharashtra">Maharashtra</option>
                                                    <option value="Manipur">Manipur</option>
                                                    <option value="Meghalaya">Meghalaya</option>
                                                    <option value="Mizoram">Mizoram</option>
                                                    <option value="Nagaland">Nagaland</option>
                                                    <option value="Orissa">Orissa</option>
                                                    <option value="Punjab">Punjab</option>
                                                    <option value="Rajasthan">Rajasthan</option>
                                                    <option value="Sikkim">Sikkim</option>
                                                    <option value="Tamil nadu">Tamil nadu</option>
                                                    <option value="Telangana">Telangana</option>
                                                    <option value="Tripura">Tripura</option>
                                                    <option value="Uttar Pradesh">Uttar Pradesh</option>
                                                    <option value="Uttrakhand">Uttrakhand</option>
                                                    <option value="West Bengal">West Bengal</option>
                                                    <option value="Andaman Nicobar Islands">Andaman Nicobar Islands</option>
                                                    <option value="Daman, Diu ,Dadra Nagar Haveli">Daman, Diu ,Dadra Nagar Haveli</option>
                                                    <option value="Delhi">Delhi</option>
                                                    <option value="Lakshwadeep">Lakshwadeep</option>
                                                    <option value="Pondichery">Pondichery</option>
                                                </select><br><br>
                                            </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-4 col-form-label text-md-right">Pin code</label>
                                        <div class="col-md-6">
                                            <input class="form-control " style="position:absolute;" placeholder="Enter pincode here" type="number" class="form-control @error('price') is-invalid @enderror"  name="pincode" required autofocus> <br><br>
                                        </div>
                                    </div>

                            </div><!--Card Body-->
                        </div><!--Card-->
                    </div><!--Col md-8-->
                </div><!--Row justify content-->
            <button class="btn btn-primary" type="submit" style="float:right">Add Address</button>
    </form>

    </div>
@endsection
