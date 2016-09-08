$(function(){
    //菜单
    var newsList_menu=$(".newsList_menu");
    $(".menu_l3").hover(function(){
        newsList_menu.slideDown();
    },function(){
        newsList_menu.hide();
    });

    baidu_lxb();//百度离线宝
});

//主页
function index(){
/*-----------以下-----幻灯片-----------------*/
    var t1=$(".tool1"),
        t2=$(".tool2"),
        t3=$(".tool3"),
        t4=$(".tool4"),
        t5=$(".tool5");
    var p=$(".slide_photo li");
    var p1=$(".photo1"),
        p2=$(".photo2"),
        p3=$(".photo3"),
        p4=$(".photo4"),
        p5=$(".photo5");
    var arrow=$(".slide_arrow");
    var w1=t1.width(); //导航标记宽度
    var m1=5; //导航标记之间的间距
    //鼠标悬浮在导航标记上时显示相应图片
    t1.hover(function(){
        arrow.animate({left:0},0);
        p1.show();
        p2.fadeOut(500);
        p3.fadeOut(500);
        p4.fadeOut(500);
        p5.fadeOut(500);
    });
    t2.hover(function(){
        arrow.animate({left:w1+m1},0);
        p2.fadeIn(500);
        p3.fadeOut(500);
        p4.fadeOut(500);
        p5.fadeOut(500);

    });
    t3.hover(function(){
        arrow.animate({left:(w1+m1)*2},0);
        p3.fadeIn(500);
        p4.fadeOut(500);
        p5.fadeOut(500);
    });
    t4.hover(function(){
        arrow.animate({left:(w1+m1)*3},0);
        p4.fadeIn(500);
        p5.fadeOut(500);
    });
    t5.hover(function(){
        arrow.animate({left:(w1+m1)*4},0);
        p5.fadeIn(500);
    });

    var m=0;/*标记 图片序号*/
    var tool=p;//图片
    //定时滚动
    function auto(){
        tool.eq(m).fadeOut(500);
        if(m==4)
            m=-1;
        tool.eq(m+1).fadeIn(500);
        arrow.animate({left:(w1+m1)*(m+1)},0);
        m++;
    }
    var autoMove;
    autoMove=setInterval(auto,3000);

    //鼠标悬浮在幻灯片上方时停止滚动
    $(".slide").hover(function(){
        clearInterval(autoMove);
    },function(){
        autoMove=setInterval(auto,3000);
    });
/*---------以上-----幻灯片-----------------*/


/*---------以下-----悬浮背景渐显-----------------*/

    var zx=$(".information_box li");
    zx.hover(
        function(){
            $(this).find(".info_bg").show().animate({opacity:1},500).css({flter:"Alpha(Opacity=100)"});
        },
        function(){
            $(this).find(".info_bg").hide().animate({opacity:0},0).css({flter:"Alpha(Opacity=0)"}).stop();
        }
    );

    var jms=$(".franchisee_box li");
    jms.hover(
        function(){
            $(this).find(".bor").show().animate({opacity:1},500).css({flter:"Alpha(Opacity=100)"});
        },
        function(){
            $(this).find(".bor").hide().css({opacity:0,flter:"Alpha(Opacity=0)"}).stop();
        }
    );

/*---------以上-----悬浮背景渐显-----------------*/

}

//主页--优秀加盟商左右拖动
function slide(){
    index();
    var oDiv1=document.getElementById("s1");
    var oDiv2=document.getElementById("s2");
    var oDiv3=document.getElementById("s3");
    var oDiv4=document.getElementById("s4");

    oDiv2.onmousedown=function(ev){
        var Event=ev||event;
        var disX=Event.clientX-oDiv2.offsetLeft;

        function Move(ev){
            var Event=ev||event;
            var oLeft=Event.clientX-disX;
            if(oLeft>oDiv1.offsetWidth-oDiv2.offsetWidth){
                oLeft=oDiv1.offsetWidth-oDiv2.offsetWidth
            }
            else if(oLeft<0){
                oLeft=0;
            }
            oDiv2.style.left=oLeft+'px';

            var n=oLeft / (oDiv1.offsetWidth-oDiv2.offsetWidth);
            oDiv4.style.left=-n*(oDiv4.offsetWidth-oDiv3.offsetWidth)+'px';
        }

        function Up(ev){
            var Event=ev||event;
            this.onmousemove=null;
            this.onmouseup=null;
            if(this.releaseCapture){
                this.releaseCapture();
            }
        }

        if(oDiv2.setCapture){
            oDiv2.onmousemove=Move;
            oDiv2.onmouseup=Up;
            oDiv2.setCapture();
        }
        else
        {
            document.onmousemove=Move;
            document.onmouseup=Up;
        }
        return false;
    }
}

//关于加盟
function duction(){
    $(".sdzc_img .sdzc_box").hover(function(){//.filter(':not(:animated)')
        $(this).find(".sdzc_box1 img").filter(':not(:animated)').animate({opacity:0},500).css({flter:"Alpha(Opacity=0)"});
        $(this).find(".sdzc_box1").filter(':not(:animated)').animate({"height": "80px"},200);
    },function(){
        $(this).find(".sdzc_box1 img").animate({opacity:1},0).css({flter:"Alpha(Opacity=100)"});
        $(this).find(".sdzc_box1").animate({"height": "100%"},100);
    });
}

//资讯中心
function zxzx(){
    var box=$(".slideTxtBox_tit"),
        show_img=$(".bd img"),
        move_h=100,
        src=box.find("img").eq(0).attr("src"),
        n=3;//每次切换图片个数
    show_img.attr({"src":src});
    box.find("li").eq(0).addClass("zxzx_bor");

    $("#exit").click(function(){
        $(".zxzx_bg").fadeOut();
        $("html,body").removeClass("zzc");
    });

    $("#up").click(function(){
        var h=parseInt(box.find("ul").css("marginTop"));
        if(h!=0)
        {
            box.find("ul").filter(':not(:animated)').animate({marginTop:h+move_h*n},300);
        }
    });

    $("#down").click(function(){
        var h=parseInt(box.find("ul").css("marginTop"));
        if(-h+box.height()<=box.find("ul").height())
        {
            box.find("ul").filter(':not(:animated)').animate({marginTop:h-move_h*n},300);
        }
    });

    box.find("li").click(function(){
        box.find("li").removeClass("zxzx_bor");
        $(this).addClass("zxzx_bor");
        var img1=show_img.eq(0),
            img2=show_img.eq(1);
        src=$(this).find("img").attr("src");
        img2.attr({"src":src}).hide().filter(':not(:animated)').fadeIn(500);
        setTimeout(function(){
            img1.attr({"src":src}).show();
        },500);
    });

    $("#join").click(function(){
        $("#join_dynamic").show();
        $("#company_dynamic").hide();
        $(".dynamic_arrow1").animate({"left":"280px"});
        $(".slide1_box div").css({"font-weight": "400"});
        $(this).css({"font-weight": "700"});
    });
    $("#company").click(function(){
        $("#join_dynamic").hide();
        $("#company_dynamic").show();
        $(".dynamic_arrow1").animate({"left":"875px"});
        $(".slide1_box div").css({"font-weight": "400"});
        $(this).css({"font-weight": "700"});
    });
}

//加盟盛况列表
function join_pomp(){
    //查看更多
    $(".join_pomp_img").hover(function(){
        $(this).find("div").show().animate({opacity:0.7},500).css({flter:"Alpha(Opacity=70)"});
    },function(){
        $(this).find("div").hide().css({opacity:0,flter:"Alpha(Opacity=0)"}).stop();
    });

    //关闭查看图片
    $("#exit").click(function(){
        $(".zxzx_bg").fadeOut();
        $("html,body").removeClass("zzc");
    });

    var box=$(".slideTxtBox_tit"),
        show_img=$(".bd img"),
        move_h=100,
        src=box.find("img").eq(0).attr("src"),
        n=3;//每次切换图片个数
    show_img.attr({"src":src});
    box.find("li").eq(0).addClass("zxzx_bor");



    $("#up").click(function(){
        var h=parseInt(box.find("ul").css("marginTop"));
        if(h!=0)
        {
            box.find("ul").filter(':not(:animated)').animate({marginTop:h+move_h*n},300);
        }
        else{
            $("#up").html("已经到顶了...");
            setTimeout(function(){
                $("#up").html("<img src='/webcon/images/zxzx_arrow_up.png'>");
            },1000);
        }
    });

    $("#down").click(function(){
        var h=parseInt(box.find("ul").css("marginTop"));
        if(-h+box.height()<=box.find("ul").height())
        {
            box.find("ul").filter(':not(:animated)').animate({marginTop:h-move_h*n},300);
        }
        else{
            $("#down").html("已经到底了...");
            setTimeout(function(){
                $("#down").html("<img src='/webcon/images/zxzx_arrow_down.png'>");
            },1000);
        }
    });

    //放大图片
    box.find("li").click(function(){
        box.find("li").removeClass("zxzx_bor");
        $(this).addClass("zxzx_bor");
        var img1=show_img.eq(0),
            img2=show_img.eq(1);
        src=$(this).find("img").attr("src");
        img2.attr({"src":src}).hide().filter(':not(:animated)').fadeIn(500);
        setTimeout(function(){
            img1.attr({"src":src}).show();
        },500);
    });

}

//百度离线宝
function baidu_lxb(){
    //使用提示
    $("#telInput").focus(function(){
        $(".explain").slideDown(300);
    });
    $(".phone").hover(function(){},function(){
        $("#telInput").blur();
        $(".explain").slideUp(300)
    });

    //拨打电话
    document.getElementById("callBtn").onclick = function () {
        lxb.call(document.getElementById("telInput"));
    };
}