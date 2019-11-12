<!DOCTYPE html>
<html lang="zh-TW">

<head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    {{-- <meta name="description" content="">
    <meta name="author" content=""> --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Manager</title>
    <link rel="Shortcut Icon" type="image/x-icon" href="img/fronted/logo.png" />

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/fronted/style.css" rel="stylesheet">
    <link href="css/fronted/manager.css" rel="stylesheet">


    <!-- Bootstrap core JavaScript -->
    <script src="jquery/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>

    {{-- sweet alert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

    <script src="js/fronted/manager.js"></script>
    <script src="js/fronted/index.js"></script>
    <script src="js/fronted/logout.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0/dist/Chart.min.js"></script>
</head>

<body>
    @include('fronted.layouts.navbar')

    <div class="container">
        <ol class="breadcrumb" style="font-weight: bold;font-size:14pt;">
                <li class="breadcrumb-item">
                <a href="/">首頁</a>
            </li>
            <li class="breadcrumb-item active">管理者</li>
        </ol>
    

    <div class="tab">
        <button class="tablinks" onclick="openManager(event, 'chart')" id="defaultOpen">遊戲報表</button>
        <button class="tablinks" onclick="openManager(event, 'game')">遊戲管理</button>
      </div>

    <!--圖表測試-->
    <div id="chart" class="tabcontent show">
        <div class="container">

                <!-- 統計圖畫在這裡 -->
                <div class="row">
                    <div class=col-sm-6>
                        <canvas id="playTimesCanvas"></canvas>
                    </div>
                    <div class=col-sm-6>
                        <canvas id="profitCanvas"></canvas>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class=col-sm-6>
                        <canvas id="winrateSlotCanvas"></canvas>
                    </div>
                    <div class=col-sm-6>
                        <canvas id="winrateMaryCanvas"></canvas>
                    </div>
                </div>
                <hr>
        </div>
    </div>
    <div id="game" class="tabcontent">
        <h3>上下架</h3><label ></label>
        <div class="row">
            <p id="slotStatus"></p>
            <button class="btn btn-primary" id="slotOpen" style="display:none">開啟</button>
            <button class="btn btn-danger" id="slotClose" style="display:none">關閉</button>
        </div>
        <br><br>
        <div class="row">
            <p id="maryStatus"></p>
            <button class="btn btn-primary" id="maryOpen" style="display:none">開啟</button>
            <button class="btn btn-danger" id="maryClose" style="display:none">關閉</button>
        </div>
        
    </div>
    
</div>

    @include('fronted.layouts.footer')

</body>

</html>
