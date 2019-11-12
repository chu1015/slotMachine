<!DOCTYPE html>
<html lang="zh-TW">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Update</title>
    <link rel="Shortcut Icon" type="image/x-icon" href="img/fronted/logo.png" />

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/fronted/style.css" rel="stylesheet">
    <link href="css/fronted/login.css" rel="stylesheet">

    <!-- Bootstrap core JavaScript -->
    <script src="jquery/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>

    {{-- sweet alert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

    <script src="js/fronted/update.js"></script>
    <script src="js/fronted/index.js"></script>
    <script src="js/fronted/logout.js"></script>

</head>

<body>
    @include('fronted.layouts.navbar')

    <div class="container">
        <ol class="breadcrumb" style="font-weight: bold;font-size:14pt;">
            <li class="breadcrumb-item">
                <a href="/">首頁</a>
            </li>
            <li class="breadcrumb-item active">更改個人資料</li>
        </ol>
        <div id="user_login" class="form-signin">
            @csrf
            <div class="text-center mb-1">
                <img class="mb-4" src="img/fronted/member.png" alt="" width="85" height="85">
            </div>
            <div class="form-group">
                <input type="text" id="phone" class="form-control" placeholder="電話" required autofocus>
            </div>
            <div class="form-group">
                <input type="text" id="address" class="form-control" placeholder="地址" required>
            </div>
            <button class="btn btn-info btn-primary btn-block" id="send" type="submit">送出</button>
            <br><br>
        </div>
    </div>

    {{-- <footer class="py-1 bg-dark fixed-bottom" style="opacity:0.9">
        <div class="container">
            <div class="f-copyright" style="text-align:center;color:white;margin:15px;font-size:14px">
                <span>&copy; Copyright Slot Machine - 2019 </span>
            </div>
        </div>
    </footer> --}}
    @include('fronted.layouts.footer')

</body>

</html>