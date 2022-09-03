<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Prescription</title>
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <style>
        .main{
            min-height: 100vh;
            width: 100%;
            background-color: #48d5f1;
            display:flex;
            justify-content: center;
            align-items: center;
        }
        .container{
            width: 50%;
            border: 3px solid rgba(31, 18, 43, 0.808);
            background-color: #F6F6F6;
            box-shadow: 1px 1px 0 1px #f9f9fb, -1px 0 28px 0 rgba(34, 33, 81, 0.01),54px 54px 28px -10px rgba(34, 33, 81, 0.15);
        }
        .prescription{
            min-height: 40vh;
            border: 2px solid rgba(31, 18, 43, 0.808);
            
        }
        .pBody{
            border-top: #48d5f1 5px solid;
            border-bottom: #48d5f1 5px solid;
            min-height: 20vh;
        }
        span{
            border-bottom: 1px dotted #212121;
        }
        @media print{
            .container{
                width: 70%;
            }
            .pBtn{
                display: none;
            }
            .img-div{
                display: flex;
                justify-content: center;
            }

        }
        
       
    </style>
</head>
<body>
    <div class="w-100 text-dark main">
        <div class="container m-5 p-2">
            <div class="d-md-flex justify-content-end">
                <p>
                    <strong>Date and Time: </strong> <span>{{$app->updated_at->format('F d, Y')}} at {{$app->updated_at->format('g:ia')}}</span>
                </p>
            </div>
            <div class="row align-items-center justify-content-md-center">
                <div class="col-md-4">
                    <img src="{{asset('images/logo/hospital_logo.webp')}}" class="img align-self-md-center w-100" alt="">
                </div>
                <div class="col-md-8">
                    <h3 class="text-success text-center">Hospital Management System</h3>
                    <p class="text-dark text-center">Hamdard Nagar, Gazaria, Munshiganj - 1510</p>
                    <h3 class="text-info text-center">{{$app->doctor->user->name}}</h3>
                    <h6 class="text-center text-dark">{{$app->doctor->special->speciality}} | {{$app->doctor->degree}}</h6> 
                </div>
            </div> 
            
            <!-- prescription - body  -->
            <div class="prescription p-3 mt-2">
                <div class="d-md-flex justify-content-around align-items-center">
                   
                    <p>
                        <strong>Name: </strong> <span>{{$app->patient_name}}</span>
                    </p>
                    <p>
                        <strong>Age: </strong> <span>{{$app->patient_age}}</span>
                    </p>
                    <p>
                        <strong>Weight: </strong> <span>{{$app->patient_weight}}</span>
                    </p>
                </div>
                <div class="pBody">
                    <div class="mid">
                        {!!$app->prescription!!}
                    </div>
                </div>
                <div class="d-md-flex justify-content-around align-items-center mt-2">
                    <div class="">
                        <strong>Prescriped Before:</strong> {{$app->updated_at->diffForHumans()}}
                    </div>
                    <button class="btn btn-primary pBtn" onclick="window.print()">Print E-Prescription</button>
                    
                </div>
            </div>
            
        </div>
    </div>   
</body>
</html>