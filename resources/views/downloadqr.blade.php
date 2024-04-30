<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Genrate QR code for booking</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src=
"https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js">
    </script>
</head>

<body>
    @if(Session::has('success'))
                    <div class="alert alert-success">{{Session::get('success')}}</div>
                    
                    @endif
                    @if(Session::has('fail'))
                    <div class="alert alert-danger">{{Session::get('fail')}}</div>
                    @endif
    <div class="container-fluid">
        <h1 class="text-center text-info p-4">
            Take screen-shot of this QR code
        </h1>
        <div class="row">
            <h2 class="text-center">now you no need to fill previous form again, just scan it an book a glass of milk. it better to take printout of this QR</h2>
            <div class="col-md-3 col-sm-2">
            </div>
            <div class="col-md-6 col-sm-8">
                <h4>your basic details for booking milk to drink</h4>
                @foreach ($data as $d)
                <div class="row">
                <div id="qrcode{{$d->id}}"></div>
                <p><b>Name</b> : {{$d->name}}</p>
                <p><b>Discription</b> : {{$d->discription}}</p>
                <p><b>Hostel</b> : {{$d->hostel}}</p>
                <p><b>Room No</b> : {{$d->roomnu}}</p>
                <p><b>Reciving Time</b> : {{$d->perfecttime}}</p>
                <p><b>Contact No</b> : {{$d->contactNo}}</p>
                <form action="deleteqr" method="post">
                    @csrf
                    <input type="number" style="display: none;" value="{{$d->id}}">
                    <button class="btn btn-danger mb-3" type="submit">Delete this QR Details</button>
                </form>
                <br>
                <br>
                <script>
                    var qrcode = new QRCode("qrcode{{$d->id}}",
                    "http://127.0.0.1:8000/order?id={{$d->id}}");
                </script>
                </div>
                @endforeach
            </div>
            <div class="col-md-3 col-sm-2"></div>
        </div>


    </div>
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>