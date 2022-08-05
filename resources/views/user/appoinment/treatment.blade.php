@extends('layouts.app')
@section('content')
<body>
    <div class="card mt-4">
        <div class="card-header">
            <div class="card-title">Doctor Appoinment Related Questions</div>
        </div>
        <div class="card-body">
            <form action="{{route('user.appoinment.treatment.update', $app->id)}}" method="POST">
                @csrf 
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label for="patient_name">What is the name of the Patient?</label>
                            <input type="text" name="patient_name" class="form-control" placeholder="Patient Name">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label for="patient_age">How old is the Patient?</label>
                            <input type="number" name="patient_age" class="form-control" placeholder="Patient Age">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label for="patient_weight">What is the weight of the patient?</label>
                            <input type="number" name="patient_weight" class="form-control" placeholder="Patient Weight">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label for="test">Was the patient committed any test??</label>
                            <br>
                            Yes
                            <input type="checkbox" name="test" class="form-check-input"> 
                        </div>
                    </div>
                   <input type="submit" value="Next" class="btn btn-primary w-100"> 
                </div>
            </form>
        </div>
    </div>
</body>
@endsection