<!DOCTYPE html>
<html>
    <head>
        <title>QR code Generator</title>
    </head>
<body>
<a class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2"  href="{{ route('dashboardfunc') }}">Back to Dashboard </a>
    <div class="visible-print text-center">
        <h1>Laravel 7 - QR Code Generator Example</h1> 
        {!! QrCode::size(200)->generate('Food On The Go - FoodCourt QR App '); !!}
       
    </div>
</body>
</html>