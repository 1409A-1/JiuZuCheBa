<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style type="text/css">
        body,div,h2,h3,ul,li,p{margin:0;padding:0;}
        a{text-decoration:none;}
        a:hover{text-decoration:underline;}
        ul{list-style-type:none;}
        body{color:#333;background:#a7ab8c;font:12px/1.5 \5b8b\4f53;}
        #msgBox{width:800px;background:#fff;border-radius:5px;margin:10px auto;padding-top:10px;}
        #msgBox form h2{font-weight:400;font:400 18px/1.5 \5fae\8f6f\96c5\9ed1;}
        #msgBox form{background:url(img/boxBG.jpg) repeat-x 0 bottom;padding:0 20px 15px;}
        #userName,#conBox{color:#777;border:1px solid #d0d0d0;border-radius:6px;background:#fff url(img/inputBG.png) repeat-x;padding:3px 5px;font:14px/1.5 arial;}
        #userName.active,#conBox.active{border:1px solid #7abb2c;}
        #userName{height:30px; width:200px}
        #conBox{width:678px;resize:none;height:65px;overflow:auto;}
        #msgBox form div{position:relative;color:#999;margin-top:10px;}
        #msgBox img{border-radius:3px;}
        #face{position:absolute;top:0;left:172px;}
        #face img{width:30px;height:30px;cursor:pointer;margin-right:6px;opacity:0.5;filter:alpha(opacity=50);}
        #face img.hover,#face img.current{width:28px;height:28px;border:1px solid #f60;opacity:1;filter:alpha(opacity=100);}
        #sendBtn{border:0;width:112px;height:30px;cursor:pointer;margin-left:10px;background:url(../resources/assets/home/public/btn.png) no-repeat;}
        #sendBtn.hover{background-position:0 -30px;}
        #msgBox form .maxNum{font:26px/30px Georgia, Tahoma, Arial;padding:0 5px;}
        #msgBox .list{padding:10px;}
        #msgBox .list h3{position:relative;height:33px;font-size:14px;font-weight:400;background:#e3eaec;border:1px solid #dee4e7;}
        #msgBox .list h3 span{position:absolute;left:6px;top:6px;background:#fff;line-height:28px;display:inline-block;padding:0 15px;}
        #msgBox .list ul{overflow:hidden;zoom:1;}
        #msgBox .list ul li{float:left;clear:both;width:100%;border-bottom:1px dashed #d8d8d8;padding:10px 0;background:#fff;overflow:hidden;}
        #msgBox .list ul li.hover{background:#f5f5f5;}
        #msgBox .list .userPic{float:left;width:50px;height:50px;display:inline;margin-left:10px;border:1px solid #ccc;border-radius:3px;}
        #msgBox .list .content{float:left;width:400px;font-size:14px;margin-left:10px;font-family:arial;word-wrap:break-word;}
        #msgBox .list .userName{display:inline;padding-right:5px;}
        #msgBox .list .userName a{color:#2b4a78;}
        #msgBox .list .msgInfo{display:inline;word-wrap:break-word;}
        #msgBox .list .times{color:#889db6;font:12px/18px arial;margin-top:5px;overflow:hidden;zoom:1;}
        #msgBox .list .times span{float:left;}
        #msgBox .list .times a{float:right;color:#889db6;display:none;}
        .tr{overflow:hidden;zoom:1;}
        .tr p{float:right;line-height:30px;}
        .tr *{float:left;}
    </style>
<link type="text/css" rel="stylesheet" href="../resources/assets/home/public/all.css">
<link type="text/css" rel="stylesheet" href="../resources/assets/home/public/user.css">
<script type="text/javascript" src="../resources/assets/home/public/jquery-1.js"></script>
<ins id="qiao-wrap">
    <ins style="position: fixed; bottom: 0px;" class="qiao-flash-storage" id="qiao-flash-storage">
        <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0" id="FlashLocalStorage" align="middle" height="5" width="5">
            <param name="wmode" value="transparent"><param name="allowscriptaccess" value="always"><param name="movie" value="http://webim.qiao.baidu.com/f/pool/swf/local_storage.swf">
            <embed wmode="transparent" allowscriptaccess="always" src="../resources/assets/home/public/local_storage.swf" name="FlashLocalStorage" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" align="middle" height="5" width="5">
        </object></ins><ins style="visibility: hidden; display: none;" class="qiao-invite-wrap" id="qiao-invite-wrap"><ins class="qiao-invite-decoration"></ins><ins style="visibility: hidden;" class="qiao-invite-text"><p style="font-size:12px;font-family:宋体;font-color:#000000;">欢迎您，有什么可以帮助您的么？</p>
        </ins><ins class="qiao-invite-accept">现在咨询</ins><a class="qiao-invite-reject">稍后再说</a><a class="qiao-invite-close"></a><ins class="qiao-invite-form"><ins class="qiao-invite-form-inner"><textarea placeholder="您可直接在这里和我们联系！" class="qiao-invite-input"></textarea><a class="qiao-invite-send">发送</a></ins></ins></ins><ins style="visibility: hidden; display: none;" class="qiao-mess-wrap" id="qiao-mess-wrap"><ins class="qiao-mess-container" id="qiao-mess-container"><ins class="qiao-mess-head" id="qiao-mess-head"><ins id="qiao-mess-head-text" class="qiao-mess-head-text"></ins><a id="qiao-mess-head-close" data-status="max" class="qiao-mess-head-close"></a></ins><ins class="qiao-mess-body" id="qiao-mess-body"><iframe src="" style="display: none;" name="qiao-mess-iframe" id="qiao-mess-iframe"></iframe><form accept-charset="utf-8" action="http://qiao.baidu.com/v3/?module=default&amp;controller=index&amp;action=doMess&amp;siteid=6567291&amp;page_id=&amp;ucid=2941205" target="qiao-mess-iframe" method="post" class="qiao-mess-form qiao-mess-clearfix"><ins class="qiao-mess-clearfix"><ins class="qiao-mess-clearfix qiao-mess-item-mess"><ins style="display:none">留言内容</ins><textarea name="bd_bp_messText" class="" placeholder="请在此输入留言内容，我们会尽快与您联系。"></textarea><ins class="qiao-mess-star">*</ins></ins></ins><ins class="qiao-mess-item qiao-mess-clearfix"><ins class="qiao-mess-item-head">姓名<ins class="qiao-mess-star" style="display:none">*</ins></ins><ins class="qiao-mess-input-wrap"><input name="bd_bp_messName" class="qiao-mess-item-body" placeholder="最多100个字符"></ins></ins><ins class="qiao-mess-item qiao-mess-clearfix"><ins class="qiao-mess-item-head">电话<ins class="qiao-mess-star" style="display:none">*</ins></ins><ins class="qiao-mess-input-wrap"><input name="bd_bp_messPhone" class="qiao-mess-item-body" placeholder="请输入您的电话号码"></ins></ins><ins class="qiao-mess-item qiao-mess-clearfix"><ins class="qiao-mess-item-head">地址<ins class="qiao-mess-star" style="display:none">*</ins></ins><ins class="qiao-mess-input-wrap"><input name="bd_bp_messAddress" class="qiao-mess-item-body" placeholder="最多100个字符"></ins></ins><ins class="qiao-mess-item qiao-mess-clearfix"><ins class="qiao-mess-item-head">邮箱<ins class="qiao-mess-star" style="display:none">*</ins></ins><ins class="qiao-mess-input-wrap"><input name="bd_bp_messEmail" class="qiao-mess-item-body" placeholder="请输入合法邮箱名"></ins></ins><input style="display:none" value="大方租车—中国互联网租车领跑者,全国连锁.神速预订,48元起！" name="bd_bp_title" type="hidden"><input style="display:none" value="https://www.baidu.com/link?url=rBH8duhEszxR6WomeRnDLFrl4bnR8jhj-C2noO_xI2p_W5tZzyGs2rBgLdMEsVLj&amp;wd=&amp;eqid=e84d05c40006e7ee0000000257c61d1c" name="bd_bp_referer" type="hidden"><input style="display:none" value="1472601430611" name="bd_bp_tick" type="hidden"><input style="display:none" value="" name="bd_bp_bid" type="hidden"></form></ins><ins class="qiao-mess-foot" id="qiao-mess-foot"><a id="qiao-mess-foot-send-btn" class="qiao-mess-foot-send-btn">发送</a><ins class="qiao-mess-foot-logo"></ins></ins></ins></ins></ins><div class="top">    <div class="top_box">
        <a href="http://www.dafang24.com/" rel="nofollow">中国互联网连锁租车品牌</a>
        <ul class="top_menu">
            <li class="top_user">
                <div class="yes_user">
                    <a href="" rel="nofollow" id="user_Name">{{ Session::get('user_name') }}</a>
                    <div class="arrow"><div></div></div>
                    <div class="userInfo">
                        <a href="user_info" rel="nofollow">账户管理</a>
                        <a href="message" rel="nofollow">公开留言</a>
                        <a href="login_out">退出</a>
                    </div>
                </div>
            </li>
            <li class="top_mobile">
                <a href="" target="_blank" rel="nofollow">
                    <i class="icon icon_phone"></i>
                    手机预订
                    <div class="QR_code">
                        <div class="QR_code_caret"></div>
                        <div class="QR_code_img"><img src="../resources/assets/home/public/code.png"></div>
                        <div class="QR_code_text">扫一扫，即刻体验</div>
                    </div>
                </a>
            </li>
            <li class="top_phone">400-060-0112</li>
        </ul>
    </div>
</div>

</head>
<body>
<input type="hidden" id="p" value="1"/>
<div id="msgBox">
    <form>
        <h2>提建议 , 送优惠券</h2>
        <div>
            <input id="userName" class="f-text" value="" />
        </div>
        <div><textarea id="conBox" class="f-text"></textarea></div>
        <div class="tr">
            <p>
                <span class="countTxt">还能输入</span><strong class="maxNum">140</strong><span>个字</span>

                <input id="sendBtn" type="button" value="" title="快捷键 Ctrl+Enter" />
            </p>
        </div>
    </form>
    <div class="list">
        <h3><span>大家在说</span></h3>
        <ul>
               @foreach($message as $k=>$v)
                    <li id="cha">
                        <div><font style="color: #ff0000;font-size: 20px">{{$v['user_name']}} : </font></div>
                        <div class="content">
                            <div class="msgInfo">{{$v['message_con']}}。</div>
                            <div class="times"><span>{{date('Y/m/d H:i',$v['add_time'])}}</span></div>
                        </div>
                    </li>
                @endforeach
        </ul>
    </div>
</div>

</body>
</html>

    <script type="text/javascript">
        /*-------------------------- +
         获取id, class, tagName
         +-------------------------- */
        var get = {
            byId: function(id) {
                return typeof id === "string" ? document.getElementById(id) : id
            },
            byClass: function(sClass, oParent) {
                var aClass = [];
                var reClass = new RegExp("(^| )" + sClass + "( |$)");
                var aElem = this.byTagName("*", oParent);
                for (var i = 0; i < aElem.length; i++) reClass.test(aElem[i].className) && aClass.push(aElem[i]);
                return aClass
            },
            byTagName: function(elem, obj) {
                return (obj || document).getElementsByTagName(elem)
            }
        };
        /*-------------------------- +
         事件绑定, 删除
         +-------------------------- */
        var EventUtil = {
            addHandler: function (oElement, sEvent, fnHandler) {
                oElement.addEventListener ? oElement.addEventListener(sEvent, fnHandler, false) : (oElement["_" + sEvent + fnHandler] = fnHandler, oElement[sEvent + fnHandler] = function () {oElement["_" + sEvent + fnHandler]()}, oElement.attachEvent("on" + sEvent, oElement[sEvent + fnHandler]))
            },
            removeHandler: function (oElement, sEvent, fnHandler) {
                oElement.removeEventListener ? oElement.removeEventListener(sEvent, fnHandler, false) : oElement.detachEvent("on" + sEvent, oElement[sEvent + fnHandler])
            },
            addLoadHandler: function (fnHandler) {
                this.addHandler(window, "load", fnHandler)
            }
        };
        /*-------------------------- +
         设置css样式
         读取css样式
         +-------------------------- */
        function css(obj, attr, value)
        {
            switch (arguments.length)
            {
                case 2:
                    if(typeof arguments[1] == "object")
                    {
                        for (var i in attr) i == "opacity" ? (obj.style["filter"] = "alpha(opacity=" + attr[i] + ")", obj.style[i] = attr[i] / 100) : obj.style[i] = attr[i];
                    }
                    else
                    {
                        return obj.currentStyle ? obj.currentStyle[attr] : getComputedStyle(obj, null)[attr]
                    }
                    break;
                case 3:
                    attr == "opacity" ? (obj.style["filter"] = "alpha(opacity=" + value + ")", obj.style[attr] = value / 100) : obj.style[attr] = value;
                    break;
            }
        };

        //时间戳的转化
        function getLocalTime(nS) {
            return new Date(parseInt(nS) * 1000).toLocaleString().replace(/:\d{1,2}$/,' ');
        }

        EventUtil.addLoadHandler(function ()
        {
            var oMsgBox = get.byId("msgBox");
            var oUserName = get.byId("userName");
            var oConBox = get.byId("conBox");
            var oSendBtn = get.byId("sendBtn");
            var oMaxNum = get.byClass("maxNum")[0];
            var oCountTxt = get.byClass("countTxt")[0];
            var oList = get.byClass("list")[0];
            var bSend = false;
            var i = 0;
            var maxNum = 140;

            //禁止表单提交

            //为广播按钮绑定发送事件
            EventUtil.addHandler(oSendBtn, "click", fnSend);

            //为Ctrl+Enter快捷键绑定发送事件
            EventUtil.addHandler(document, "keyup", function(event)
            {
                var event = event || window.event;
                event.ctrlKey && event.keyCode == 13 && fnSend()
            });

            //发送广播函数
            function fnSend ()
            {
                var reg = /^\s*$/g;
                if(reg.test(oConBox.value))
                {
                    alert("\u968f\u4fbf\u8bf4\u70b9\u4ec0\u4e48\u5427\uff01");
                    oConBox.focus()
                }
                else if(!bSend)
                {
                    alert("\u4f60\u8f93\u5165\u7684\u5185\u5bb9\u5df2\u8d85\u51fa\u9650\u5236\uff0c\u8bf7\u68c0\u67e5\uff01");
                    oConBox.focus()
                } else {
                    var name = $('#userName').val();              //用户名
                    if(name==''){
                         name = $('#user_Name').html() ;
                    }
                    var con = $('#conBox').val();                 //评论内容
                    var str = "<li><div><font style=\"color: #ff0000;font-size: 20px\">"+name+" : </font></div><div class=\"content\">"+
                              "<div class=\"msgInfo\">"+con+"</div> <div class=\"times\"><span>"+getLocalTime(1473130950)+"</span></div></div></li>";
                    $("#cha").before( str );
                    get.byTagName("form", oMsgBox)[0].reset();
        //ajax进行提交
                    $.get("{{URL('message_add')}}", { name: name, con: con } );

                }
            };

            //事件绑定, 判断字符输入
            EventUtil.addHandler(oConBox, "keyup", confine);
            EventUtil.addHandler(oConBox, "focus", confine);
            EventUtil.addHandler(oConBox, "change", confine);

            //输入字符限制
            function confine ()
            {
                var iLen = 0;
                for (i = 0; i < oConBox.value.length; i++) iLen += /[^\x00-\xff]/g.test(oConBox.value.charAt(i)) ? 1 : 0.5;
                oMaxNum.innerHTML = Math.abs(maxNum - Math.floor(iLen));
                maxNum - Math.floor(iLen) >= 0 ? (css(oMaxNum, "color", ""), oCountTxt.innerHTML = "\u8fd8\u80fd\u8f93\u5165", bSend = true) : (css(oMaxNum, "color", "#f60"), oCountTxt.innerHTML = "\u5df2\u8d85\u51fa", bSend = false)
            }
            //加载即调用
            confine();

            //广播按钮鼠标划过样式
            EventUtil.addHandler(oSendBtn, "mouseover", function () {this.className = "hover"});

            //广播按钮鼠标离开样式
            EventUtil.addHandler(oSendBtn, "mouseout", function () {this.className = ""});
        });

        $(document).ready(function () { //本人习惯这样写了
            $(window).scroll(function () {
                var y = $('#p').val();
                //$(window).scrollTop()这个方法是当前滚动条滚动的距离
                //$(window).height()获取当前窗体的高度
                //$(document).height()获取当前文档的高度
                var bot = 0; //bot是底部距离的高度
                if ((bot + $(window).scrollTop()) >= ($(document).height() - $(window).height())) {
                    //当底部基本距离+滚动的高度〉=文档的高度-窗体的高度时；
                    //我们需要去异步加载数据了
                    $.getJSON("{{URL('message_down')}}", { page: y }, function (str) {
                       if(str){

                           $.each( str['str'], function(i, n){
                               var str1 = "<li><div><font style=\"color: #ff0000;font-size: 20px\">"+str['str'][i].user_name+" : </font></div><div class=\"content\">"+
                                          "<div class=\"msgInfo\">"+str['str'][i].message_con+"</div> <div class=\"times\"><span>"+getLocalTime(str['str'][i].add_time)+"</span></div></div></li>";
                               $("#cha").append( str1 );
                           });
                            $('#p').val(str['nextpage'])
                       } else {
                           alert('全部加载完毕');
                           return false;
                       }
                    });
                }
            });
        });

    </script>
