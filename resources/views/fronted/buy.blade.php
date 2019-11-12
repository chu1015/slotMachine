<!DOCTYPE html>
<html lang="zh-TW">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Buy</title>
    <link rel="Shortcut Icon" type="image/x-icon" href="img/fronted/logo.png" />

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/fronted/style.css" rel="stylesheet">
    {{-- <script src="jquery/jquery.min.js"></script> --}}
    <link href="css/fronted/buy.css" rel="stylesheet">
    <!-- Bootstrap core JavaScript -->
    <script src="jquery/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/fronted/buy.js"></script>
    <script src="js/fronted/index.js"></script>
    <script src="js/fronted/logout.js"></script>
</head>

<body>
    @include('fronted.layouts.navbar')
    <div class="container" style="position:relative">
        <div class="container" id="bodydiv">
            <ol class="breadcrumb" style="font-weight: bold;font-size:14pt;">
                <li class="breadcrumb-item">
                    <a href="/">首頁</a>
                </li>
                <li class="breadcrumb-item active">購點儲值</li>
            </ol>
            <div>
                <p id="storeway">儲值方法</p>
            </div>

            <nav class="navbar navbar-expand-lg">
                <div id='imgdiv'>
                    <ul class="nav navbar-nav mr-auto">
                        <li class="nav-item active imgborder">
                            <a class="nav-link" href="#jkopay" data-toggle="tab"><img
                                    src="img\fronted\buy\jkopay.png"></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#cht" data-toggle="tab"><img src="img\fronted\buy\CHT.png"></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#farpass" data-toggle="tab"><img
                                    src="img\fronted\buy\FarPass.png"></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#taiwanmobile" data-toggle="tab"><img
                                    src="img\fronted\buy\TaiwanMobile.png"></a>
                        </li>
                    </ul>
                </div>
            </nav>

            {{-- 用js更改敘述內容 --}}

            <div class="tab-content">
                {{-- 街口支付 --}}
                <div id="jkopay" class="tab-pane fade show active">
                    <form>
                        <div class="paytitle">街口支付</div>
                        <div>
                            <p id="buyDesc">使用街口支付App掃描網頁內付款QRCode碼，並以「街口帳戶」餘額付款或連結「銀行帳戶」付款</p>
                        </div>

                        <div>
                            <div id="jkoleftdiv">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>價格</th>
                                            <th>點數</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><input type="radio" name="jkoprice" id="jko100" value="100,300"
                                                    checked><label for="jko100">NT$ 100</label></td>
                                            <td><label for="jko100">遊戲幣 × 300</label></td>
                                        </tr>
                                        <tr>
                                            <td><input type="radio" name="jkoprice" id="jko250" value="250,800"><label
                                                    for="jko250">NT$ 250</label></td>
                                            <td><label for="jko250">遊戲幣 × 800</label></td>

                                        </tr>
                                        <tr>
                                            <td><input type="radio" name="jkoprice" id="jko500" value="500,1700"><label
                                                    for="jko500">NT$ 500</label></td>
                                            <td><label for="jko500">遊戲幣 × 1700</label></td>
                                        </tr>
                                        <tr>
                                            <td><input type="radio" name="jkoprice" id="jko1000" value="1000,3500"><label
                                                    for="jko1000">NT$1000</label></td>
                                            <td><label for="jko1000">遊戲幣 × 3500</label></td>
                                        </tr>
                                        <tr>
                                            <td><input type="radio" name="jkoprice" id="jko2500" value="2500,10000"><label
                                                    for="jko2500">NT$2500</label></td>
                                            <td><label for="jko2500">遊戲幣 × 10000</label></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div id="buycontent">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th colspan="2">確認購買內容</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>商品</td>
                                            <td id="cointable">遊戲幣 × 300</td>
                                        </tr>
                                        <tr>
                                            <td>價格</td>
                                            <td id="pricetable">NT$ 100</td>
                                        </tr>
                                        <tr>
                                            <td>付費方式</td>
                                            <td>街口支付</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">

                                                <div class="form-group form-check">
                                                    <input type="checkbox" class="form-check-input" id="agree">
                                                    <label class="form-check-label" for="agree">
                                                        我同意會員系統服務合約、個人資料隱私權保護政策未滿20歲之消費者，應由法定代理人閱讀並同意上述合約後，方得使用本儲值服務。
                                                    </label>
                                                </div>
                                                <button class="btn btn-primary btn-lg btn-block  " data-toggle="button"
                                                    id="confirm" disabled>確認</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div id="QRdiv">
                                <div id="QRtext">請開啟「街口支付App」，點選「掃描條碼」功能，掃描下方</div>
                                <div id="QRcodetext2rd"> QRCode</div>
                                <div>
                                    <img src="img\fronted\buy\jkoQR.png" alt="" id="QRcode">
                                </div>
                                <div id="QRdescript">付款完成後，請點選下方按鈕</div>
                                <button type="button" class="btn btn-primary btn-lg btn-block"
                                    id="jkofinishstore">付款完成</button>
                            </div>

                        </div>
                    </form>
                </div>


                {{-- cht --}}
                <div id="cht" class="tab-pane fade">
                    <form>
                        <div class="paytitle">中華電信手機</div>
                        <div>
                            <p id="buyDesc">輸入您的手機號碼，系統將發送驗證碼至您的手機號碼，填入驗證碼後在頁面上按下「確定」按鈕，即完成流程並獲得遊戲幣。</p>
                        </div>

                        <div>
                            <div class="helf">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>價格</th>
                                            <th>點數</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><input type="radio" name="chtprice" id="cht100" value="100,300"
                                                    checked><label for="cht100">NT$ 100</label></td>
                                            <td><label for="cht100">遊戲幣 × 300</label></td>
                                        </tr>
                                        <tr>
                                            <td><input type="radio" name="chtprice" id="cht250" value="250,800"><label
                                                    for="cht250">NT$ 250</label></td>
                                            <td><label for="cht250">遊戲幣 × 800</label></td>
                                        </tr>
                                        <tr>
                                            <td><input type="radio" name="chtprice" id="cht500" value="500,1700"><label
                                                    for="cht500">NT$ 500</label></td>
                                            <td><label for="cht500">遊戲幣 × 1700</label></td>
                                        </tr>
                                        <tr>
                                            <td><input type="radio" name="chtprice" id="cht1000" value="1000,3500"><label
                                                    for="cht1000">NT$ 1000</label></td>
                                            <td><label for="cht1000">遊戲幣 × 3500</label></td>
                                        </tr>
                                        <tr>
                                            <td><input type="radio" name="chtprice" id="cht2500" value="2500,10000"><label
                                                    for="cht2500">NT$ 2500</label></td>
                                            <td><label for="cht2500">遊戲幣 × 10000</label></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="helf" id="chtbuycontent">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th colspan="2">確認購買內容</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>商品</td>
                                            <td id="chtcointable">遊戲幣 × 300</td>
                                        </tr>
                                        <tr>
                                            <td>價格</td>
                                            <td id="chtpricetable">NT$ 100</td>
                                        </tr>
                                        <tr>
                                            <td>付費方式</td>
                                            <td>中華電信</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <div class="form-group phoneletter">
                                                    <label>中華電信手機門號</label>
                                                    <div class="input-group mb-3" style="margin-bottom:0px !important ">

                                                        <input type="text" class="form-control" id="celphonenumber"
                                                            placeholder="輸入您的手機號碼" aria-label="輸入您的手機號碼"
                                                            aria-describedby="phoneerror" required>
                                                        {{-- <div class="input-group-append"> --}}
                                                        <button class="btn btn-outline-secondary"
                                                            type="button">傳送驗證碼</button>
                                                        {{-- </div>   --}}
                                                    </div>
                                                    {{-- <div style="display: block"> --}}
                                                    <small id="phoneerror"></small>
                                                    {{-- </div>  --}}


                                                </div>


                                                <div class="form-group phoneletter">
                                                    <label>輸入您所收到的簡訊驗證碼</label>
                                                    <div class="input-group mb-3 "
                                                        style="margin-bottom:0px !important ">
                                                        <input type="text" class="form-control lettertext" id="verification"
                                                            placeholder="驗證碼" required>
                                                    </div>
                                                    <small id="verificationerror"></small>
                                                </div>
                                                <small id="nullerror"></small>

                                            </td>
                                        <tr>
                                            <td colspan="2">

                                                <span class="form-group form-check">
                                                    <input type="checkbox" class="form-check-input" id="chtagree">
                                                    <label class="form-check-label" for="chtagree">
                                                        我同意會員系統服務合約、個人資料隱私權保護政策未滿20歲之消費者，應由法定代理人閱讀並同意上述合約後，方得使用本儲值服務。
                                                    </label>

                                                    <button class="btn btn-primary btn-lg btn-block  "
                                                        data-toggle="button" id="chtfinishstore" disabled>確認</button>
                                                </span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </form>
                </div>

                {{-- farpass --}}
                <div id="farpass" class="tab-pane fade">
                    <form>
                        <div class="paytitle">遠傳電信手機</div>
                        <div>
                            <p id="buyDesc">輸入您的手機號碼，系統將發送驗證碼至您的手機號碼，填入驗證碼後在頁面上按下「確定」按鈕，即完成流程並獲得遊戲幣。</p>
                        </div>

                        <div>
                            <div class="helf">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>價格</th>
                                            <th>點數</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><input type="radio" name="farprice" id="farpass100" value="100,300"
                                                    checked><label for="farpass100">NT$ 100</label></td>
                                            <td><label for="farpass100">遊戲幣 × 300</label></td>
                                        </tr>
                                        <tr>
                                            <td><input type="radio" name="farprice" id="farpass250" value="250,800"><label
                                                    for="farpass250">NT$ 250</label></td>
                                            <td><label for="farpass250">遊戲幣 × 800</label></td>
                                        </tr>
                                        <tr>
                                            <td><input type="radio" name="farprice" id="farpass500" value="500,1700"><label
                                                    for="farpass500">NT$ 500</label></td>
                                            <td><label for="farpass500">遊戲幣 × 1700</label></td>
                                        </tr>
                                        <tr>
                                            <td><input type="radio" name="farprice" id="farpass1000"
                                                    value="1000,3500"><label for="farpass1000">NT$ 1000</label></td>
                                            <td><label for="farpass1000">遊戲幣 × 3500</label></td>
                                        </tr>
                                        <tr>
                                            <td><input type="radio" name="farprice" id="farpass2500"
                                                    value="2500,10000"><label for="farpass2500">NT$ 2500</label></td>
                                            <td><label for="farpass2500">遊戲幣 × 10000</label></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="helf" id="farpassbuycontent">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th colspan="2">確認購買內容</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>商品</td>
                                            <td id="farpasscointable">遊戲幣 × 300</td>
                                        </tr>
                                        <tr>
                                            <td>價格</td>
                                            <td id="farpasspricetable">NT$ 100</td>
                                        </tr>
                                        <tr>
                                            <td>付費方式</td>
                                            <td>遠傳電信</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <div class="form-group phoneletter">
                                                    <label>遠傳電信手機門號</label>
                                                    <div class="input-group mb-3" style="margin-bottom:0px !important ">

                                                        <input type="text" class="form-control" id="farpasscelphone"
                                                            placeholder="輸入您的手機號碼" aria-label="輸入您的手機號碼"
                                                            aria-describedby="farpassphoneerror" required>
                                                        {{-- <div class="input-group-append"> --}}
                                                        <button class="btn btn-outline-secondary"
                                                            type="button">傳送驗證碼</button>
                                                        {{-- </div>   --}}
                                                    </div>
                                                    {{-- <div style="display: block"> --}}
                                                    <small id="farpassphoneerror"></small>
                                                    {{-- </div>  --}}


                                                </div>


                                                <div class="form-group phoneletter">
                                                    <label>輸入您所收到的簡訊驗證碼</label>
                                                    <div class="input-group mb-3 "
                                                        style="margin-bottom:0px !important ">
                                                        <input type="text" class="form-control lettertext" id="farpassverification"
                                                            placeholder="驗證碼" required>
                                                    </div>
                                                    <small id="farpassverificationerror"></small>
                                                </div>
                                                <small id="farpassnullerror"></small>

                                            </td>
                                        <tr>
                                            <td colspan="2">

                                                <span class="form-group form-check">
                                                    <input type="checkbox" class="form-check-input" id="farpassagree">
                                                    <label class="form-check-label" for="farpassagree">
                                                        我同意會員系統服務合約、個人資料隱私權保護政策未滿20歲之消費者，應由法定代理人閱讀並同意上述合約後，方得使用本儲值服務。
                                                    </label>

                                                    <button class="btn btn-primary btn-lg btn-block  "
                                                        data-toggle="button" id="farpassfinishstore"
                                                        disabled>確認</button>
                                                </span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </form>
                </div>
                {{-- taiwanmobile --}}
                <div id="taiwanmobile" class="tab-pane fade">
                    <form>
                        <div class="paytitle">台哥大電信手機</div>
                        <div>
                            <p id="buyDesc">輸入您的手機號碼，系統將發送驗證碼至您的手機號碼，填入驗證碼後在頁面上按下「確定」按鈕，即完成流程並獲得遊戲幣。</p>
                        </div>

                        <div>
                            <div class="helf">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>價格</th>
                                            <th>點數</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><input type="radio" name="taiprice" id="taiwanmobile100" value="100,300"
                                                    checked><label for="taiwanmobile100">NT$ 100</label></td>
                                            <td><label for="taiwanmobile100">遊戲幣 × 300</label></td>
                                        </tr>
                                        <tr>
                                            <td><input type="radio" name="taiprice" id="taiwanmobile250"
                                                    value="250,800"><label for="taiwanmobile250">NT$ 250</label></td>
                                            <td><label for="taiwanmobile250">遊戲幣 × 800</label></td>
                                        </tr>
                                        <tr>
                                            <td><input type="radio" name="taiprice" id="taiwanmobile500"
                                                    value="500,1700"><label for="taiwanmobile500">NT$ 500</label></td>
                                            <td><label for="taiwanmobile500">遊戲幣 × 1700</label></td>
                                        </tr>
                                        <tr>
                                            <td><input type="radio" name="taiprice" id="taiwanmobile1000"
                                                    value="1000,3500"><label for="taiwanmobile1000">NT$ 1000</label>
                                            </td>
                                            <td><label for="taiwanmobile1000">遊戲幣 × 3500</label></td>
                                        </tr>
                                        <tr>
                                            <td><input type="radio" name="taiprice" id="taiwanmobile2500"
                                                    value="2500,10000"><label for="taiwanmobile2500">NT$ 2500</label>
                                            </td>
                                            <td><label for="taiwanmobile2500">遊戲幣 × 10000</label></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="helf" id="taiwanmobilebuycontent">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th colspan="2">確認購買內容</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>商品</td>
                                            <td id="taiwanmobilecointable">遊戲幣 × 300</td>
                                        </tr>
                                        <tr>
                                            <td>價格</td>
                                            <td id="taiwanmobilepricetable">NT$ 100</td>
                                        </tr>
                                        <tr>
                                            <td>付費方式</td>
                                            <td>台哥大電信</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <div class="form-group phoneletter">
                                                    <label>台哥大電信手機門號</label>
                                                    <div class="input-group mb-3" style="margin-bottom:0px !important ">

                                                        <input type="text" class="form-control"
                                                            id="taiwanmobilecelphone" placeholder="輸入您的手機號碼"
                                                            aria-label="輸入您的手機號碼"
                                                            aria-describedby="taiwanmobilephoneerror" required>
                                                        {{-- <div class="input-group-append"> --}}
                                                        <button class="btn btn-outline-secondary"
                                                            type="button">傳送驗證碼</button>
                                                        {{-- </div>   --}}
                                                    </div>
                                                    {{-- <div style="display: block"> --}}
                                                    <small id="taiwanmobilephoneerror"></small>
                                                    {{-- </div>  --}}


                                                </div>


                                                <div class="form-group phoneletter">
                                                    <label>輸入您所收到的簡訊驗證碼</label>
                                                    <div class="input-group mb-3 "
                                                        style="margin-bottom:0px !important ">
                                                        <input type="text" class="form-control lettertext"
                                                            id="taiwanmobileverification" placeholder="驗證碼"
                                                            required>
                                                    </div>
                                                    <small id="taiwanmobileverificationerror"></small>
                                                </div>
                                                <small id="taiwanmobilenullerror"></small>

                                            </td>
                                        <tr>
                                            <td colspan="2">

                                                <span class="form-group form-check">
                                                    <input type="checkbox" class="form-check-input"
                                                        id="taiwanmobileagree">
                                                    <label class="form-check-label" for="taiwanmobileagree">
                                                        我同意會員系統服務合約、個人資料隱私權保護政策未滿20歲之消費者，應由法定代理人閱讀並同意上述合約後，方得使用本儲值服務。
                                                    </label>

                                                    <button class="btn btn-primary btn-lg btn-block  "
                                                        data-toggle="button" id="taiwanmobilefinishstore"
                                                        disabled>確認</button>
                                                </span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>

    </div>
    <!-- 成功後彈跳視窗  -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">儲值成功</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="modaltext">
                    遊戲幣已成功儲值進您的帳號
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div style="clear:both"></div>
    </div>

    </div>

    @include('fronted.layouts.footer')


</body>

</html>