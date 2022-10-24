<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Message</title>
    <link rel="stylesheet" href="/bootstrap.min.css">
    <style>
        body{
            background-image:url('/img/bg-5.jpg');
        }
        .content{
            width:70%;
            min-height:100vh;
        }
        .border-b{
            border-bottom:1px solid black;
        }
        h5,p{
            font-family:cursive;
        }
        @media screen and (max-width:699px) {
            .content{
                width:100%;
            }
            .table{
                font-size:0.7em;
            }
        }
    </style>
</head>
<body>
   <div class="content shadow mx-auto bg-light">
          <header class="w-100 p-3 border-b">
            <h6 class="text-center">Pesan Masuk</h6>
            <div class="w-100 d-flex justify-content-center align-items-center">
                <small class="url-text">{{url()->current()}}/{{$users->hash_users}}</small>
                <button class="btn btn-sm btn-info mx-3 rounded-pill" id="btn-copy">Copy Url</button>
            </div>
        </header>
<div class="my-5 p-3 overflow-auto">
    <a href="/logout" class="btn btn-sm btn-danger mb-2">Logout</a>
    @if(session()->get('delete_success'))
    <div class="my-2">
        <div class="alert alert-danger w-75 mx-auto">{{session('delete_success')}}</div>
    </div>
    @endif
    @if(count($message)>=1)
    <table class="table table-striped text-center">
        <thead>
            <tr>
                <th>No</th>
                <th>Pesan</th>
                <th>Detail</th>
                <th>Hapus</th>
            </tr>
        </thead>
        <tbody>
            @php
            $x=1
            @endphp
            @foreach($message as $m)
            <tr>
                <td>{{$x++}}</td>
                <td>{{$m->content_message}}</td>
                <td><button class="btn btn-warning btn- btn-detail" data-bs-toggle="modal"  data-bs-target="#detail" dataid="{{$m->id_message}}">V</button></td>
                <td>
                    <form action="/message/{{$m->id_message}}" method="post">
                        @csrf 
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" type="submit">H</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mt-2">

        {{$message->links()}}
    </div>
    @else
    <h4 class="text-center text-danger">Belum ada pesan masuk</h4>
    @endif
</div>
   </div>
   <!-- modal -->
   <div class="modal fade " id="detail">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body modal-detail">
                <span class="spinner-border mx-auto d-block"></span>
            </div>
        </div>

    </div>
   </div>
   <script src="/js/app.js"> </script>
   <script src="/bootstrap.min.js"></script>
</body>
</html>