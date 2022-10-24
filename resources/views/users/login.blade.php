<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="/bootstrap.min.css">
    <style>
        body{
            background-image:url('/img/bg-4.jpg');
            background-size:cover;
            background-repeat:no-repeat;
        }
        .row{
            width:100%;
            height:100vh;
        }
        .copy::after{
            content:"---"
        }
        .copy::before{
            content:"---"
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-md-5 col-lg-4 col-11 mx-auto">
                <div class="card shadow">
                    <div class="card-body bg-light">
                            <h3 class="text-center my-2">BERGABUNG</h3>
                            <p class="text-center"><em id="text"> "Kirim pesan secara anonymus"</em></p>
                            <form action="/login" method="post" autocomplete="off">
                                @csrf
                                <div class="my-3">
                                    <input type="text" name="username"  class="form-control rounded-pill" placeholder="Username" required>
                                    @if(session()->get('join_failed'))
                                    <small class="text-danger">{{session('join_failed')}}</small>
                                    @endif
                                </div>
                                <div class="my-3">
                                    <input type="password" name="password" minlength="8" class="form-control rounded-pill" placeholder="Password" required>
                                    <small class="text-danger">Password minimal 8 karakter</small>
                                </div>
                                <div class="my-3">
                                    <button type="submit" class="btn btn-warning w-100">Bergabung</button>
                                </div>
                                <div class="my-1">
                                    <ul class="d-flex justify-content-center list-unstyled gap-3">
                                        <li><a href=""><img src="/img/fb.jpg" class="rounded-circle" width="30px" height="30px"></a></li>
                                        <li><a href=""><img src="/img/ig.jpg" class="rounded-circle" width="30px" height="30px"></a></li>
                                        <li><a href=""><img src="/img/gmail.jpg" class="rounded-circle" width="30px" height="30px"></a></li>
                                    </ul>
                                </div>
                                <div class="mb-3 text-center">
                                    <small class="copy mx-2">Copyright</small>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function theme(){
            const time=new Date().getHours();
            if (time>=18) {
                document.querySelector('body').style.backgroundImage="url('/img/bg-3.jpg')"
            } else {
                
                document.querySelector('body').style.backgroundImage="url('/img/bg-4.jpg')"
            }
        }
        
        window.addEventListener('load',theme())

    </script>
</body>
</html>