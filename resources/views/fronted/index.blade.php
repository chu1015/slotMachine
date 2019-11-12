<!DOCTYPE html>
<html lang="zh-TW">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>Index</title>
    <link rel="Shortcut Icon" type="image/x-icon" href="img/fronted/logo.png" />

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/fronted/index.css" rel="stylesheet">
    <link href="css/fronted/style.css" rel="stylesheet">

    <!-- Bootstrap core JavaScript -->
    <script src="jquery/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>

    {{-- sweet alert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

    <script src="js/fronted/index.js"></script>
    <script src="js/fronted/news.js"></script>
    <script src="js/fronted/logout.js"></script>
    <script src="js/fronted/gameStatus.js"></script>

</head>

<body>
    @include('fronted.layouts.navbar')

    <header>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active" style="background-image: url('img/fronted/carousel_1.jpg')"></div>
                <div class="carousel-item" style="background-image: url('img/fronted/carousel_2.jpg')"></div>
                <div class="carousel-item" style="background-image: url('img/fronted/carousel_3.jpg')"></div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </header>

    <div class="container">
        <h3 class="mt-4 mb-3" style="font-weight:bolder;">最新消息</h3>

        <div class="tab">
            <button class="tablinks" onclick="openNews(event, 'All')" id="defaultOpen">全部公告</button>
            <button class="tablinks" onclick="openNews(event, 'System')">系統公告</button>
            <button class="tablinks" onclick="openNews(event, 'Activity')">活動公告</button>
        </div>

        <div id="All" class="tabcontent show">
            <div id="accordion" role="tablist" aria-multiselectable="true">
                <div class="card">
                    <div class="card-header" role="tab" id="heading1-1">
                        <h5 class="mb-0">
                            <span class="badge badge-primary">系統公告</span>
                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse1-1"
                                aria-expanded="false" aria-controls="collapse1-1"
                                style="color:black;font-size:14pt;font-weight:bolder;">客服中心電話維護說明
                            </a>
                        </h5>
                    </div>
                    <div id="collapse1-1" class="collapse" role="tabpanel" aria-labelledby="heading1-1">
                        <div class="card-body" style="font-weight:bold">
                            親愛的玩家您好：<br>
                            為配合電信業者進行線路優化作業，屆時電話系統將暫停服務，造成不便敬請多加見諒。<br>
                            影響時間：2019/10/12（六）11:00~12:00<br>
                            遊戲伺服器正常運作不受影響，期間如有任何問題歡迎多加利用問題通報或客服信箱。
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" role="tab" id="heading1-2">
                        <h5 class="mb-0">
                            <span class="badge badge-primary">系統公告</span>
                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse1-2"
                                aria-expanded="false" aria-controls="collapse1-2"
                                style="color:black;font-size:14pt;font-weight:bolder;">嚴正聲明：本公司從未對外徵求銀行存簿、金融卡，切勿受騙上當！
                            </a>
                        </h5>
                    </div>
                    <div id="collapse1-2" class="collapse" role="tabpanel" aria-labelledby="heading1-2">
                        <div class="card-body">
                            親愛的玩家您好：<br>
                            近期接獲玩家反應，有不肖之徒冒用本團隊名義，以調整財務為由蒐購銀行存摺、提款卡，企圖欺瞞大眾提供銀行帳戶，作為人頭帳戶使用。<br>
                            對於此類不法行徑本公司已主動調查瞭解，並採取相關法律行動，也再次呼籲各位切勿提供重要財務資料予他人，以免淪為犯罪共犯！<br>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" role="tab" id="heading1-3">
                        <h5 class="mb-0">
                            <span class="badge badge-danger">活動公告</span>
                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse1-3"
                                aria-expanded="false" aria-controls="collapse1-3"
                                style="color:black;font-size:14pt;font-weight:bolder;">Slot Machine之LINE官方帳號上線囉!!</a>
                        </h5>
                    </div>
                    <div id="collapse1-3" class="collapse" role="tabpanel" aria-labelledby="heading1-3">
                        <div class="card-body">
                            親愛的玩家您好：<br>
                            即日起，Slot Machine之LINE官方帳號正式上線。<br>
                            免費貼圖等你拿~立即加入好友以獲得最新消息!!<br>
                            請注意，官方不會主動私訊索取個人資料，請勿受騙上當!!<br>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" role="tab" id="heading1-4">
                        <h5 class="mb-0">
                            <span class="badge badge-primary">系統公告</span>
                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse1-4"
                                aria-expanded="false" aria-controls="collapse1-4"
                                style="color:black;font-size:14pt;font-weight:bolder;">網頁HD版優化說明</a>
                        </h5>
                    </div>
                    <div id="collapse1-4" class="collapse" role="tabpanel" aria-labelledby="heading1-4">
                        <div class="card-body">
                            各位親愛的玩家您好：<br>
                            因進行網頁及遊戲優化作業，故網頁HD版將會於2019/10/08（二）更換登入介面。<br>
                            新的網頁HD版遊戲館僅開放【拉霸機】、【小瑪莉】共二款遊戲館。<br>
                            其餘遊戲館則陸續增加，若遇未開放遊戲館還請玩家透過PC版或手機裝置進行遊戲及新活動，造成不便，敬請見諒！謝謝。<br>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="System" class="tabcontent">
            <div id="accordion" role="tablist" aria-multiselectable="true">
                <div class="card">
                    <div class="card-header" role="tab" id="heading2-1">
                        <h5 class="mb-0">
                            <span class="badge badge-primary">系統公告</span>
                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse2-1"
                                aria-expanded="false" aria-controls="collapse2-1"
                                style="color:black;font-size:14pt;font-weight:bolder;">客服中心電話維護說明
                            </a>
                        </h5>
                    </div>
                    <div id="collapse2-1" class="collapse" role="tabpanel" aria-labelledby="heading2-1">
                        <div class="card-body">
                            親愛的玩家您好：<br>
                            為配合電信業者進行線路優化作業，屆時電話系統將暫停服務，造成不便敬請多加見諒。<br>
                            影響時間：2019/10/12（六）11:00~12:00<br>
                            遊戲伺服器正常運作不受影響，期間如有任何問題歡迎多加利用問題通報或客服信箱。
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" role="tab" id="heading2-2">
                        <h5 class="mb-0">
                            <span class="badge badge-primary">系統公告</span>
                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse2-2"
                                aria-expanded="false" aria-controls="collapse2-2"
                                style="color:black;font-size:14pt;font-weight:bolder;">嚴正聲明：本公司從未對外徵求銀行存簿、金融卡，切勿受騙上當！
                            </a>
                        </h5>
                    </div>
                    <div id="collapse2-2" class="collapse" role="tabpanel" aria-labelledby="heading2-2">
                        <div class="card-body">
                            親愛的玩家您好：<br>
                            近期接獲玩家反應，有不肖之徒冒用本團隊名義，以調整財務為由蒐購銀行存摺、提款卡，企圖欺瞞大眾提供銀行帳戶，作為人頭帳戶使用。<br>
                            對於此類不法行徑本公司已主動調查瞭解，並採取相關法律行動，也再次呼籲各位切勿提供重要財務資料予他人，以免淪為犯罪共犯！<br>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" role="tab" id="heading2-3">
                        <h5 class="mb-0">
                            <span class="badge badge-primary">系統公告</span>
                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse2-3"
                                aria-expanded="false" aria-controls="collapse2-3"
                                style="color:black;font-size:14pt;font-weight:bolder;">網頁HD版優化說明</a>
                        </h5>
                    </div>
                    <div id="collapse2-3" class="collapse" role="tabpanel" aria-labelledby="heading2-3">
                        <div class="card-body">
                            各位親愛的玩家您好：<br>
                            因進行網頁及遊戲優化作業，故網頁HD版將會於2019/10/08（二）更換登入介面。<br>
                            新的網頁HD版遊戲館僅開放【拉霸機】、【小瑪莉】共二款遊戲館。<br>
                            其餘遊戲館則陸續增加，若遇未開放遊戲館還請玩家透過PC版或手機裝置進行遊戲及新活動，造成不便，敬請見諒！謝謝。<br>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="Activity" class="tabcontent">
            <div id="accordion" role="tablist" aria-multiselectable="true">
                <div class="card">
                    <div class="card-header" role="tab" id="heading3-1">
                        <h5 class="mb-0">
                            <span class="badge badge-danger">活動公告</span>
                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse3-1"
                                aria-expanded="false" aria-controls="collapse3-1"
                                style="color:black;font-size:14pt;font-weight:bolder;">Slot Machine之LINE官方帳號上線囉!!</a>
                        </h5>
                    </div>
                    <div id="collapse3-1" class="collapse" role="tabpanel" aria-labelledby="heading3-1">
                        <div class="card-body">
                            親愛的玩家您好：<br>
                            即日起，Slot Machine之LINE官方帳號正式上線。<br>
                            免費貼圖等你拿~立即加入好友以獲得最新消息!!<br>
                            請注意，官方不會主動私訊索取個人資料，請勿受騙上當!!<br>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <h3 class="mt-4 mb-3" style="font-weight:bolder;">遊戲列表</h3>
        <div class="row">
            <div class="col-lg-2 col-sm-4 portfolio-item zoom">
                <div class="card">
                    <a onclick="indexslot()"id="indexSlotBtn"><img class="card-img-top" src="img/fronted/game_1.jpg" alt=""></a>
                    <h4 class="card-title">拉霸機</h4>
                </div>
            </div>
            <div class="col-lg-2 col-sm-4 portfolio-item zoom">
                <div class="card">
                    <a href="LittleMary"><img class="card-img-top" src="img/fronted/game_2.jpg" alt=""></a>
                    <h4 class="card-title">小瑪莉</h4>
                </div>
            </div>
            <div class="col-lg-2 col-sm-4 portfolio-item zoom">
                <div class="card">
                    <a href="#"><img class="card-img-top" src="img/fronted/game_3.jpg" alt=""></a>
                    <h4 class="card-title">賓果彈珠台</h4>
                </div>
            </div>
            <div class="col-lg-2 col-sm-4 portfolio-item zoom">
                <div class="card">
                    <a href="#"><img class="card-img-top" src="img/fronted/game_4.jpg" alt=""></a>
                    <h4 class="card-title">逗陣捕魚季</h4>
                </div>
            </div>
            <div class="col-lg-2 col-sm-4 portfolio-item zoom">
                <div class="card">
                    <a href="#"><img class="card-img-top" src="img/fronted/game_5.jpg" alt=""></a>
                    <h4 class="card-title">瘋狂農場</h4>
                </div>
            </div>
            <div class="col-lg-2 col-sm-4 portfolio-item zoom">
                <div class="card">
                    <a href="#"><img class="card-img-top" src="img/fronted/game_6.png" alt=""></a>
                    <h4 class="card-title">百家樂</h4>
                </div>
            </div>
        </div>
    </div>

    @include('fronted.layouts.footer')

</body>

</html>