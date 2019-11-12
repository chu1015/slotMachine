<!DOCTYPE html>
<html lang="zh-TW">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>News</title>
    <link rel="Shortcut Icon" type="image/x-icon" href="img/fronted/logo.png" />

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/fronted/news.css" rel="stylesheet">
    <link href="css/fronted/style.css" rel="stylesheet">

    <!-- Bootstrap core JavaScript -->
    <script src="jquery/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>

    <script src="js/fronted/news.js"></script>
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
            <li class="breadcrumb-item active">最新消息</li>
        </ol>

        <div class="row">
            <!-- Blog Entries Column -->
            <div class="col-md-10">
                <div class="tab">
                    <button class="tablinks" onclick="openNews(event, 'All')" id="defaultOpen">全部公告</button>
                    <button class="tablinks" onclick="openNews(event, 'System')">系統公告</button>
                    <button class="tablinks" onclick="openNews(event, 'Activity')">活動公告</button>
                </div>
                <div id="All" class="tabcontent show">
                    <div id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <img class="img-fluid rounded" src="img/fronted/msg_1.jpg" alt="">
                                    </div>
                                    <div class="col-lg-8">
                                        <span class="badge badge-primary">系統公告</span>
                                        <h5 class="card-title font-weight-bolder">客服中心電話維護說明</h5>
                                        <p class="card-text">親愛的玩家您好：<br>
                                            為配合電信業者進行線路優化作業，屆時電話系統將暫停服務，造成不便敬請多加見諒。<br>
                                            影響時間：2019/10/19（六）11:00~12:00<br>
                                            遊戲伺服器正常運作不受影響，期間如有任何問題歡迎多加利用問題通報或客服信箱。</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-muted">
                                發佈日期：2019/10/16 上午 10:00:00
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <img class="img-fluid rounded" src="img/fronted/msg_2.jpg" alt="">
                                    </div>
                                    <div class="col-lg-8">
                                        <span class="badge badge-primary">系統公告</span>
                                        <h5 class="card-title font-weight-bolder">嚴正聲明：本公司從未對外徵求銀行存簿、金融卡，切勿受騙上當！</h5>
                                        <p class="card-text">親愛的玩家您好：<br>
                                            近期接獲玩家反應，有不肖之徒冒用本團隊名義，以調整財務為由蒐購銀行存摺、提款卡，企圖欺瞞大眾提供銀行帳戶，作為人頭帳戶使用。<br>
                                            對於此類不法行徑本公司已主動調查瞭解，並採取相關法律行動，也再次呼籲各位切勿提供重要財務資料予他人，以免淪為犯罪共犯！</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-muted">
                                發佈日期：2019/10/13 下午 14:00:00
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <img class="img-fluid rounded" src="img/fronted/msg_3.jpg" alt="">
                                    </div>
                                    <div class="col-lg-8">
                                        <span class="badge badge-danger">活動公告</span>
                                        <h5 class="card-title font-weight-bolder">Slot Machine之LINE官方帳號上線囉!!</h5>
                                        <p class="card-text">各位親愛的玩家您好：<br>
                                            即日起，Slot Machine之LINE官方帳號正式上線。<br>
                                            免費貼圖等你拿~立即加入好友以獲得最新消息!!<br>
                                            請注意，官方不會主動私訊索取個人資料，請勿受騙上當!!</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-muted">
                                發佈日期：2019/10/10 下午 15:00:00
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <img class="img-fluid rounded" src="img/fronted/msg_4.jpg" alt="">
                                    </div>
                                    <div class="col-lg-8">
                                        <span class="badge badge-primary">系統公告</span>
                                        <h5 class="card-title font-weight-bolder">網頁HD版優化說明</h5>
                                        <p class="card-text">各位親愛的玩家您好：<br>
                                            因進行網頁及遊戲優化作業，故網頁HD版將會於2019/10/08（二）更換登入介面。<br>
                                            新的網頁HD版遊戲館僅開放【拉霸機】、【小瑪莉】共二款遊戲館。<br>
                                            其餘遊戲館則陸續增加，若遇未開放遊戲館還請玩家透過PC版或手機裝置進行遊戲及新活動，造成不便，敬請見諒！謝謝。</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-muted">
                                發佈日期：2019/10/06 上午 11:00:00
                            </div>
                        </div>
                    </div>
                </div>
                <div id="System" class="tabcontent show">
                    <div id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <img class="img-fluid rounded" src="img/fronted/msg_1.jpg" alt="">
                                    </div>
                                    <div class="col-lg-8">
                                        <span class="badge badge-primary">系統公告</span>
                                        <h5 class="card-title font-weight-bolder">客服中心電話維護說明</h5>
                                        <p class="card-text">親愛的玩家您好：<br>
                                            為配合電信業者進行線路優化作業，屆時電話系統將暫停服務，造成不便敬請多加見諒。<br>
                                            影響時間：2019/10/19（六）11:00~12:00<br>
                                            遊戲伺服器正常運作不受影響，期間如有任何問題歡迎多加利用問題通報或客服信箱。</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-muted">
                                發佈日期：2019/10/16 上午 10:00:00
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <img class="img-fluid rounded" src="img/fronted/msg_2.jpg" alt="">
                                    </div>
                                    <div class="col-lg-8">
                                        <span class="badge badge-primary">系統公告</span>
                                        <h5 class="card-title font-weight-bolder">嚴正聲明：本公司從未對外徵求銀行存簿、金融卡，切勿受騙上當！</h5>
                                        <p class="card-text">親愛的玩家您好：<br>
                                            近期接獲玩家反應，有不肖之徒冒用本團隊名義，以調整財務為由蒐購銀行存摺、提款卡，企圖欺瞞大眾提供銀行帳戶，作為人頭帳戶使用。<br>
                                            對於此類不法行徑本公司已主動調查瞭解，並採取相關法律行動，也再次呼籲各位切勿提供重要財務資料予他人，以免淪為犯罪共犯！</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-muted">
                                發佈日期：2019/10/13 下午 14:00:00
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <img class="img-fluid rounded" src="img/fronted/msg_4.jpg" alt="">
                                    </div>
                                    <div class="col-lg-8">
                                        <span class="badge badge-primary">系統公告</span>
                                        <h5 class="card-title font-weight-bolder">網頁HD版優化說明</h5>
                                        <p class="card-text">各位親愛的玩家您好：<br>
                                            因進行網頁及遊戲優化作業，故網頁HD版將會於2019/10/08（二）更換登入介面。<br>
                                            新的網頁HD版遊戲館僅開放【拉霸機】、【小瑪莉】共二款遊戲館。<br>
                                            其餘遊戲館則陸續增加，若遇未開放遊戲館還請玩家透過PC版或手機裝置進行遊戲及新活動，造成不便，敬請見諒！謝謝。</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-muted">
                                發佈日期：2019/10/06 上午 11:00:00
                            </div>
                        </div>
                    </div>
                </div>
                <div id="Activity" class="tabcontent show">
                    <div id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <img class="img-fluid rounded" src="img/fronted/msg_3.jpg" alt="">
                                    </div>
                                    <div class="col-lg-8">
                                        <span class="badge badge-danger">活動公告</span>
                                        <h5 class="card-title font-weight-bolder">Slot Machine之LINE官方帳號上線囉!!</h5>
                                        <p class="card-text">各位親愛的玩家您好：<br>
                                            即日起，Slot Machine之LINE官方帳號正式上線。<br>
                                            免費貼圖等你拿~立即加入好友以獲得最新消息!!<br>
                                            請注意，官方不會主動私訊索取個人資料，請勿受騙上當!!</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-muted">
                                發佈日期：2019/10/10 下午 15:00:00
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar Widgets Column -->
            <div class="col-md-2">
                <div class="row">

                    <!-- Side Widget -->
                    <div class="card mb-4 col-md-12 col-lg-12 col-sm-4">
                        <div class="card-header">
                            <img src="img/fronted/news_1.jpg" style="width:100%;">
                        </div>
                    </div>
                    <div class="card mb-4 col-md-12 col-lg-12 col-sm-4">
                        <div class="card-header">
                            <img src="img/fronted/news_2.jpg" style="width:100%;">
                        </div>
                    </div>
                    <div class="card mb-4 col-md-12 col-lg-12 col-sm-4">
                        <div class="card-header">
                            <img src="img/fronted/news_3.jpg" style="width:100%;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <ul class="pagination justify-content-center mb-4">
            <li class="page-item disabled"><a class="page-link" href="#">上一頁</a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">下一頁</a></li>
        </ul>
    </div>
    @include('fronted.layouts.footer')

</body>

</html>