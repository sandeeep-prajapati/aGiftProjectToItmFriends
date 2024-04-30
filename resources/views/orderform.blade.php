<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Genrate QR code for booking</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
@if(Session::has('success'))
                    <div class="alert alert-success">{{Session::get('success')}}</div>
                    
                    @endif
                    @if(Session::has('fail'))
                    <div class="alert alert-danger">{{Session::get('fail')}}</div>
                    @endif
    <div class="container-fluid">
        <h2 class="text-center text-success p-4">Kindly Enter amount you need in Liters</h2>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <form action="orderAmount" method="post">
                    @csrf
                    <input type="text" style="display: none;" name="id" value="{{$id}}">
                    <br>
                    <label for="amount">Enter amount in Liter</label>
                    <input type="text" name="amount" class="form-control" placeholder="eg : 0.5">
                    <br>
                    <input type="submit" class="form-control bg-success btn text-white">
                </form>
            </div>
            <div class="col-md-4"></div>
            <form action=""></form>
        </div>
        <div class="row ">
            <h1 class="text-center text-warning p-4">ALL your Orders</h1>
            @foreach ($data as $d1)
            <div class="col-md-3 col-sm-6">
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
                        Status : <a class="btn btn-info">Register</a>
                        @endif
                        @if($d1->status == 1)
                        status : <a class="btn btn-success">On the way</a>
                        @endif
                        @if($d1->status == 2)
                        status : <a class="btn btn-danger">delivered</a>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>


    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>