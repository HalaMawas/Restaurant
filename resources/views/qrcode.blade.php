<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laravel Generate QR Code Examples</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
</head>
<body>
    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h2>Simple QR Code</h2>
            </div>
            <div class="card-body">
                    {!! QrCode::size(100)->generate(Request::url()); !!}

            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h2>Color QR Code</h2>
            </div>
            <div class="card-body">
               {!! QrCode::merge('/public/backend/images/logo.png')
                        ->size(400)                        
                        ->generate('hello')!!}
             <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->merge('/public/backend/images/admin.jpg')->size(100)->generate('Make me into an QrCode!')) !!} ">

                
            </div>
        </div>
    </div>
</body>
</html>