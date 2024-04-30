<!doctype html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <title>User Login</title>
    <link rel="stylesheet" href="style2.css">
</head>

<body>
    @if(Session::has('success'))
    <div class="alert alert-success">{{Session::get('success')}}</div>

    @endif
    @if(Session::has('fail'))
    <div class="alert alert-danger">{{Session::get('fail')}}</div>
    @endif
    <div class="container register register-background custBack">
        <div class="row ">
            <h1 class="text-center text-warning p-4">All active orders</h1>
            @foreach ($data as $d1)
            <div class="col-md-3 col-sm-6">
                <div class="card">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><b>Name : {{$d1->name}}</b></h5>
                            <h5 class="card-title"><b>Instructions : {{$d1->discription}}</b></h5>
                            <h5 class="card-title">Hostel : {{$d1->hostel}}</h5>
                            <h5 class="card-title">Room No : {{$d1->roomnu}}</h5>
                            <h5 class="card-title">Deliver time : {{$d1->perfecttime}}</h5>
                            <h5 class="card-text">Contact No : {{$d1->contactNo}}</h5>
                            <h5 class="card-text">Amount : {{$d1->amount}}</h5>
                            @if($d1->status == 0)
                            Change Status :
                            <br>
                            <a href="/comming?id={{$d1->orderid}}" class="btn btn-info">On the way</a>
                            <a href="/delivered?id={{$d1->orderid}}" class="btn btn-success">Delivered</a>
                            <a href="/cancel?id={{$d1->orderid}}" class="btn btn-danger">Cancel</a>
                            @endif
                            @if($d1->status == 1)
                            Change Status :
                            <br>
                            <a href="/delivered?id={{$d1->orderid}}" class="btn btn-success">Delivered</a>
                            <a href="/cancel?id={{$d1->orderid}}" class="btn btn-danger">Cancel</a>
                            @endif
                            @if($d1->status == 2)
                            Change Status :
                            <br>
                            <a href="/cancel?id={{$d1->orderid}}" class="btn btn-danger">Cancel</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row">
            <h1 class="text-center text-primary p-4">Some one going for delivery</h1>
            @foreach ($data1 as $d1)
            <div class="col-md-3 col-sm-6">
                <div class="card">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><b>Name : {{$d1->name}}</b></h5>
                            <h5 class="card-title"><b>Instructions : {{$d1->discription}}</b></h5>
                            <h5 class="card-title">Hostel : {{$d1->hostel}}</h5>
                            <h5 class="card-title">Room No : {{$d1->roomnu}}</h5>
                            <h5 class="card-title">Deliver time : {{$d1->perfecttime}}</h5>
                            <h5 class="card-text">Contact No : {{$d1->contactNo}}</h5>
                            <h5 class="card-text">Amount : {{$d1->amount}}</h5>
                            Change Status : 
                            <br>
                            <a href="/delivered?id={{$d1->orderid}}" class="btn btn-success">Delivered</a>
                            <a href="/cancel?id={{$d1->orderid}}" class="btn btn-danger">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="row">
            <h1 class="text-center text-success p-4">Successfully delivery</h1>
            @foreach ($data2 as $d1)
            <div class="col-md-3 col-sm-6">
                <div class="card">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><b>Name : {{$d1->name}}</b></h5>
                            <h5 class="card-title"><b>Instructions : {{$d1->discription}}</b></h5>
                            <h5 class="card-title">Hostel : {{$d1->hostel}}</h5>
                            <h5 class="card-title">Room No : {{$d1->roomnu}}</h5>
                            <h5 class="card-title">Deliver time : {{$d1->perfecttime}}</h5>
                            <h5 class="card-text">Contact No : {{$d1->contactNo}}</h5>
                            <h5 class="card-text">Amount : {{$d1->amount}}</h5>
                            Change Status : <a href="/cancel?id={{$d1->orderid}}" class="btn btn-danger">Cancel</a>

                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <div class="p-4"></div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
</body>

</html>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>