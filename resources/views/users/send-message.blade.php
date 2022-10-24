<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Message</title>
    <link rel="stylesheet" href="/bootstrap.min.css">
    <style>
     body{
    background-color: rgba(125, 163, 197, 0.623);
}
h6{
    font-family:cursive;
}
    </style>
</head>
<body>
    <div class="container">
        <div class="row w-100 d-flex justify-content-center align-items-center" style="height:100vh">
            <div class="col-md-5 col-10">
                <div class="card shadow rounded">
                    <div class="card-header">
                        <h6 class="text-center">Kirim Pesan Misterius</h6>
                        <p class="text-center"><small><em>Kirim apa yang anda inginkan secara misterius kepada ...</em></small></p>
                
                </div>
                    <div class="card-body">
                            <form action="/message" method="post">
                                @csrf
                                <div class="my-3">
                            
                                    <input type="text" name="content_message" class="form-control" placeholder="PESAN ANDA" required maxlength="200">
                                    <input type="hidden" name="id_users_message" value="{{$id_users_message}}">
                                </div>
                                <div class="mb-2">
                                    <button type="submit" class="btn btn-primary w-100 rounded-pill">Kirim</button>
                                </div>
                            </form>
                    </div>
                    <div class="p-3">
                        <small class="d-block text-center">CopyRight @ {{date('Y')}}</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>