<!-- Navigation -->
<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top" style="opacity:0.9">
    <div class="container">
        <a class="navbar-brand" style="width:150px" href="/"><img src="img/fronted/logo_casino8.png" height="55">
        </a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
            data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto" style="font-size:14pt">
                <li class="nav-item">
                    <a class="nav-link" href="game">遊戲介紹</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="news">最新消息</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="buy" id="navBuy" style="display:none">購點 / 儲值</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact">客服中心</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login" id="navLogin" style="display:none">登入</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="register" id="navRegister" style="display:none">註冊</a>
                </li>

                {{-- 登入成功才會顯示的下拉式選單 --}}
                <li class="nav-item dropdown" id="navAccount" style="display:none">
                    <a class="nav-link dropdown-toggle" href=".dropdown-menu" id="navbardrop" data-toggle="dropdown">
                        使用者帳號
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="manager" style="color:red; display:none;" id="manager">管理者</a>
                        <a class="dropdown-item" href="update">更改個人資料</a>
                        <a class="dropdown-item" id="navLogout">登出</a>
                    </div>
                </li>
                {{-- 登入成功才會顯示的下拉式選單 --}}
                <li class="nav-item">
                    <a class="nav-link" id="navCoin" style="display:none"></a>
                </li>

            </ul>
        </div>
    </div>
</nav>