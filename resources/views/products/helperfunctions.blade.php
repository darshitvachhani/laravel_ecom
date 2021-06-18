@extends('layouts.app')

@section('content')

    <div style="position:absolute; top:20%; left:20%; width:80%">

        <h4>Examples</h4><br>

        <label>1.To check if any product of laptop category exsists</label><input style="position:absolute; right:45%;" value= "<?php echo $outputArr[0]?>" ><br><br>

        <label>2.Last Added product date</label><input style="position:absolute; right:45%;" value="<?php echo $outputArr[1]?>"><br><br>

        <label>3.Convert "Rs.25000" to "₹25000"</label><input style="position:absolute; right:36.8%; width:25%;" value="<?php echo $outputArr[2]?>" ><br><br>

    </div>
@endsection
