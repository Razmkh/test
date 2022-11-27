@extends('profileTrainee')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
    
        </div>
    </div>
    
                                <h3 class="card-info">Your Result</h3>
                                    <label for="html">Correct:</label> <small>{{Session::get('correctans')}}</small> <br>
                                    <label for="css">Incorrect:</label> <small>{{Session::get('wrongans')}}</small><br>
                                    <label for="javascript">Result:</label> <small>{{Session::get('correctans')}} / {{Session::get('correctans') + Session::get('wrongans') }}</small>

 @endsection
