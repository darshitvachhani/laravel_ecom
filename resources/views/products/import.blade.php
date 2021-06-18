@extends('layouts.app')

@section('content')
        <div class="container">
            <div class="form_div" style="position:absolute; top:30%; left:40%;">
                <form method="post" action="import" enctype="multipart/form-data" >
                    @csrf
                    <h1>Import Product Listing</h1>

                    <label style="position:absolute; top:50%; margin-top:65px;">Upload File to Import</label>
                    <input style="position:absolute; left:50%; top:50%; margin-top:60px;" type="file" name ="import_file" required> <br><br>

                    <button style="position:absolute; top:180%;"  type="submit" name="import">Import</button>
                </form>
            </div>
        </div>
@endsection
