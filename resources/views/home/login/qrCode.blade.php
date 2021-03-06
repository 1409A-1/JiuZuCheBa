<!DOCTYPE html>
<head>
    <title>微信登录</title>
    <link rel="stylesheet" href="home/css/impowerApp.css">
    <script src="home/js/jquery.js"></script>
</head>
<body style="background-color: rgb(51, 51, 51); padding: 50px;">
    <div class="main impowerBox">
        <div class="loginPanel normalPanel">
            <div class="title">微信登录</div>
            <div class="waiting panelContent">
                <div class="wrp_code"><img class="qrcode lightBorder" src="home/images/login/qrcode.png"></div>
                <div class="info">
                    <div class="status status_browser js_status normal" id="wx_default_tip">
                        <p>请使用微信扫描二维码登录</p>
                        <p>“就租车吧”</p>
                    </div>
                    <div class="status status_succ js_status normal" style="display:none" id="wx_after_scan">
                        <i class="status_icon icon38_msg succ"></i>
                        <div class="status_txt">
                            <h4>扫描成功</h4>
                            <p>请在微信中点击确认即可登录</p>
                        </div>
                    </div>
                    <div class="status status_fail js_status normal" style="display:none" id="wx_after_cancel">
                        <i class="status_icon icon38_msg warn"></i>
                        <div class="status_txt">
                            <h4>您已取消此次登录</h4>
                            <p>您可再次扫描登录，或关闭窗口</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function AQ_SECAPI_ESCAPE(a, b) {
            console.log(a)
            console.log(b)
            return false;
            for (var c = new Array, d = 0; d < a.length; d++) if ("&" == a.charAt(d)) {
                var e = [3, 4, 5, 9],
                    f = 0;
                for (var g in e) {
                    var h = e[g];
                    if (d + h <= a.length) {
                        var i = a.substr(d, h).toLowerCase();
                        if (b[i]) {
                            c.push(b[i]), d = d + h - 1, f = 1;
                            break
                        }
                    }
                }
                0 == f && c.push(a.charAt(d))
            } else c.push(a.charAt(d));
            return c.join("")
        }
        function AQ_SECAPI_CheckXss() {
            for (var a = new Object, b = "'\"<>`script:daex/hml;bs64,", c = 0; c < b.length; c++) {
                for (var d = b.charAt(c), e = d.charCodeAt(), f = e, g = e.toString(16), h = 0; h < 7 - e.toString().length; h++) f = "0" + f;
                a["&#" + e + ";"] = d, a["&#" + f] = d, a["&#x" + g] = d
            }
            a["&lt"] = "<", a["&gt"] = ">", a["&quot"] = '"';
            var i = location.href,
                j = document.referrer;
            i = decodeURIComponent(AQ_SECAPI_ESCAPE(i, a)), j = decodeURIComponent(AQ_SECAPI_ESCAPE(j, a));
            var k = new RegExp("['\"<>`]|script:|data:text/html;base64,");
            if (k.test(i) || k.test(j)) {
                var l = "1.3",
                    m = "http://zyjc.sec.qq.com/dom",
                    n = new Image;
                n.src = m + "?v=" + l + "&u=" + encodeURIComponent(i) + "&r=" + encodeURIComponent(j), i = i.replace(/['\"<>`]|script:/gi, ""), i = i.replace(/data:text\/html;base64,/gi, "data:text/plain;base64,"), location.href = i
            }
        }
        AQ_SECAPI_CheckXss();
    </script>
    <script>
        !function() {
            console.log();
            return false;
            function a(c) {
                jQuery.ajax({
                    type: "GET",
                    url: "https://long.open.weixin.qq.com/connect/l/qrconnect?uuid=011cMzpuXTMhOwLw" + (c ? "&last=" + c : ""),
                    dataType: "script",
                    cache: !1,
                    timeout: 6e4,
                    success: function(c, d, e) {
                        var f = window.wx_errcode;
                        switch (f) {
                        case 405:
                            var g = "https://passport.yhd.com/wechat/callback.do";
                            if (g = g.replace(/&amp;/g, "&"), g += (g.indexOf("?") > -1 ? "&" : "?") + "code=" + wx_code + "&state=22eb66d79f91909302913a9d0ad5098e", b) try {
                                document.domain = "qq.com";
                                var h = window.top.location.host.toLowerCase();
                                h && (window.location = g)
                            } catch (i) {
                                window.top.location = g
                            } else window.location = g;
                            break;
                        case 404:
                            jQuery(".js_status").hide(), jQuery("#wx_after_scan").show(), setTimeout(a, 2e3, f);
                            break;
                        case 403:
                            jQuery(".js_status").hide(), jQuery("#wx_after_cancel").show(), setTimeout(a, 2e3, f);
                            break;
                        case 402:
                        case 500:
                            window.location.reload();
                            break;
                        case 408:
                            setTimeout(a, 2e3)
                        }
                    },
                    error: function(b, c, d) {
                        var e = window.wx_errcode;
                        408 == e ? setTimeout(a, 5e3) : setTimeout(a, 5e3, e)
                    }
                })
            }
            var b = window.top != window;
            if (b) {
                var c = "";
                "white" != c && (document.body.style.color = "#373737")
            } else {
                document.getElementsByClassName || (document.getElementsByClassName = function(a) {
                    for (var b = [], c = new RegExp("(^| )" + a + "( |$)"), d = document.getElementsByTagName("*"), e = 0, f = d.length; f > e; e++) c.test(d[e].className) && b.push(d[e]);
                    return b
                }), document.body.style.backgroundColor = "#333333", document.body.style.padding = "50px";
                for (var d = document.getElementsByClassName("status"), e = 0, f = d.length; f > e; ++e) {
                    var g = d[e];
                    g.className = g.className + " normal"
                }
            }
            var h = "";
            if (h) {
                var i = document.createElement("link");
                i.rel = "stylesheet", i.href = h, document.getElementsByTagName("head")[0].appendChild(i)
            }
            setTimeout(a, 2e3)
        }();
    </script>
    <!-- window.wx_errcode=408;window.wx_code=''; -->
</body>
</html>