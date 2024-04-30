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
        <h1 class="text-center text-info p-4">
        <b>Get Started Today</b>! Ready to experience the convenience of QuickMilk?
        </h1>
        <p class="text-danger text-center">
            Introducing QuickMilk: Your Hassle-Free Milk Booking Solution
        </p>
        <div class="row">
            <div class="col-md-6">
            <p class="pt-3">
            Are you tired of the hassle involved in ordering milk for your hostel? Say goodbye to long queues and manual order forms! Introducing QuickMilk – the innovative QR-based milk booking system designed specifically for college hostels.
            </p>

            <h3>How Does QuickMilk Work?</h3>
            <p>QuickMilk simplifies the milk ordering process into just a single click. Here's how it works:</p>
            <ol>
                <li><b>Scan the QR Code</b> : Each hostel room will have a unique QR code assigned to it. Simply scan the QR code using your smartphone camera or QR code scanner.</li>
                <li>
                <b>Place Your Order</b> : Once you scan the QR code, you'll be directed to our user-friendly interface where you can select your preferred type of milk (regular, low-fat, or soy) and quantity.
                </li>
                <li>
                <b>Confirm and Enjoy</b> : After confirming your order, our dedicated team will ensure that your glass of milk is delivered to your doorstep at your preferred time.
                </li>
                <li>
                <h4>Why Choose QuickMilk?</h4>
                <ul>
                    <li>
                    <b>Convenience</b> : No more waiting in line or filling out paper forms. With QuickMilk, ordering milk is as easy as scanning a QR code.
                    </li>
                    <li>
                    <b>Time-Saving</b> : Save valuable time and focus on your studies while QuickMilk takes care of your milk needs.
                    </li>
                    <li>
                    <b>Customizable Options</b> :  Choose from a variety of milk options and quantities to suit your preferences.
                    </li>
                    <li>
                        <b>Efficiency</b> : Our streamlined system ensures prompt delivery of fresh milk to your doorstep.
                    </li>
                </ul>
            </ol>


**Get Started Today!**

Ready to experience the convenience of QuickMilk?

            </div>
            <div class="col-md-6">
            <h2 class="text-center text-info">Generate Qr for booking by simply scanning it...</h2>
                <form action="/qr_code_generator" method="post">
                    @csrf
                    <br>
                    <Label class="p-1">ENTER YOUR FULL NAME</Label>
                    <br>
                    <input class="form-control  p-2" type="text" name="name" placeholder="eg : Mark Zuckerberg" value="{{old('name')}}">
                    <span style="color : red">@error('name'){{$message}}@enderror</span>
                    <br>
                    <Label class="p-1">ENTER YOUR ROOM NO</Label>
                    <br>
                    <input class="form-control  p-2" type="number" name="roomno" placeholder="eg : 307" value="{{old('roomno')}}">
                    <span style="color : red">@error('roomno'){{$message}}@enderror</span>
                    <br>
                    <Label class="p-1">Enter delivery instruction</Label>
                    <br>
                    <textarea class="form-control  p-2" name="description" id="" cols="5"></textarea>
                    <span style="color : red">@error('description'){{$message}}@enderror</span>
                    <br>
                    <Label class="p-1">ENTER YOUR PERFECT TIME TO RECIVE</Label>
                    <br>
                    <select name="time" class="form-control" id="">
                        <option value="{{old('roomno')}}">Select Timing</option>
                        <option value="morning">Morning</option>
                        <option value="after_noon">After noon</option>
                        <option value="evening">Evening</option>
                    </select>
                    <span style="color : red">@error('time'){{$message}}@enderror</span>
                    <br>
                    <Label class="p-1">SELECT TYPE OF HOSTEL</Label>
                    <select name="hostel" class="form-control" id="">
                        <option value="{{old('hostel')}}">Choose hostel type</option>
                        <option value="girls_hostel">Girls Hostel</option>
                        <option value="boys_hostel">Boys Hostel</option>
                    </select>
                    <span style="color : red">@error('hostel'){{$message}}@enderror</span>
                    <br>
                    <Label class="p-1">ENTER YOUR CONTACT NO</Label>
                    <br>
                    <input class="form-control  p-2" type="number" name="contactNo" placeholder="eg : 639242XXXX" value="{{old('contactNo')}}">
                    <span style="color : red">@error('contactNo'){{$message}}@enderror</span>
                    <br>
                    <input class="form-control bg-success p-2 text-white btn" type="submit" value="Generate QR for Easy booking">
                </form>

            </div>

        </div>


    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>