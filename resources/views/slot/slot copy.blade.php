<!DOCTYPE html>
<html lang="zh-TW">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    {{-- <meta name="description" content="">
    <meta name="author" content=""> --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Slot</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/slot/style copy.css" rel="stylesheet">

    <!-- Bootstrap core JavaScript -->
    <script src="jquery/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>

    <script src="js/slot/slotmachine.js"></script>
    <script src="js/fronted/index.js"></script>
    <script src="js/fronted/logout.js"></script>
</head>

<body>
    <div class="container-fluid">
        <div class="row" style="height: 600px;">
            @include('fronted.layouts.navbar')
            {{-- left --}}
            <div class="col-3" style="background: url(../../img/slot/money_bg.png);background-repeat: no-repeat;background-size:220%;">
                <div class="money">
                    <img id="chip0" alt="" src="../../img/slot/chip5.png" style="opacity:0.7;margin-bottom:15%">
                    <img id="chip1" alt="" src="../../img/slot/chip10.png" style="opacity:0.7;margin-bottom:15%">
                    <img id="chip2" alt="" src="../../img/slot/chip50.png" style="opacity:0.7;">
                    <img id="chip3" alt="" src="../../img/slot/chip100.png" style="opacity:0.7;">
                </div>
                <div class="btn-group" style="margin-top:10%;">
                    <h3 style="display:inline;color: #ffffff;font-weight:bolder;">已投入金額：$</h3>
                    <h3 style="display:inline;color: #ffffff;font-weight:bolder;" id="totalChip">0</h3>
                </div>
                <div class="btn-group" style="margin-top:4%;">
                    <button id="resetChip" class="button btn-light">重新輸入<br>RESET</button>
                </div>
            </div>
            {{-- middle --}}
            <div class="col-6">
                <div class="col-12">
                    <div class="machine">
                        <img alt="" src="../../img/slot/machine.png">
                    </div>
                    <div class="row justify-content:center no-gutters casino">
                        <div id="casino1" class="slotMachine col-sm-3">
                            <div id="img1" class="slot slot1"></div>
                        </div>
                        <div id="casino2" class="slotMachine col-sm-3">
                            <div id="img2" class="slot slot2"></div>
                        </div>
                        <div id="casino3" class="slotMachine col-sm-3">
                            <div id="img3" class="slot slot3"></div>
                        </div>
                    </div>
                </div>
                <div class="btn-group">
                    <button id="casinoShuffle" class="button btn-light col-sm-4">開始遊戲<br>START GAME</button>
                    <button id="casinoStop" class="button btn-light col-sm-4">結束遊戲<br>STOP GAME</button>
                </div>
            </div>
            {{-- right --}}
            <div class="col-3">
                <div class="result">
                    {{-- <img alt="" src="../../img/slot/winner2.gif"> --}}
                </div>
            </div>
        </div>
        @include('fronted.layouts.footer')
    </div>
</body>

</html>