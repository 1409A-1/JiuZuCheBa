var TYPE = 0,
//订单类型
N = 0,
isOneLoad = true;
var time;
$(function () {
    userIndex(); //用户中心 主页信息加载
    clickEvent(); //点击事件
    orderListLoad1(1); //订单列表初始化加载
    user(); //账户信息
    coupon(); //优惠券
    reviews(); //评价
    noEvaluate(1); //评价列表
    $("#toUpho").click(function () {

        layer.open({
            type: 1,
            area: ['520px', '260px'],
            shade: [0.8, '#000'],
            scrollbar: false,
            title: '修改手机号码',
            //不显示标题
            content: $(".updatePho")
        });
    });

});
function Trim(str) {
    return str.replace(/(^\s*)|(\s*$)/g, "");
}
//用户 信息加载
function userIndex() {
    var cus = JSON.parse(jQuery.cookie("login_user"));
    var zxcx = JSON.parse(jQuery.cookie("login_hyzxcx"));

    if (cus && cus.customer_id) {
        var C = cus;
        var gradeName = C.customer_grade;
        switch (gradeName) {
            case 4:
                gradeName = "银卡会员";
                break;
            case 5:
                gradeName = "金卡会员";
                break;
            case 6:
                gradeName = "白金会员";
                break;
            default:
                gradeName = "普通会员";
                C.customer_grade = 3;
                break;
        }
        //用户中心 页面
        $(".i_t1 i").attr({
            "class": ""
        }).addClass("icon_user icon_user" + C.customer_grade + "");
        if (C.customer_name != null) {
            $("#userName").html(C.customer_name);
            $("#name").val(C.customer_name);
        }
        if (C.customer_phone != null) $("#userPhone").html(C.customer_phone);

        $("#userGrade").html(gradeName);
        $("#jf").html(C.customer_total_score);

        //用户管理 页面
        $("#phone").val(C.customer_phone);
        if (C.alternate_contact_name != null && C.alternate_contact_name != "") {
            $("#name1").val(C.alternate_contact_name);
        }
        if (C.alternate_contact_phone != null && Trim(C.alternate_contact_phone) != "") $("#phone1").val(Trim(C.alternate_contact_phone));
        if (C.qq != "null") $("#qq").val(C.qq);
        if (C.customer_email != null) $("#email").val(C.customer_email);

        if (C.identity_card_no != null) $("#identity_card_no").val(Trim(C.identity_card_no));

        if (C.driver_license_no != null) $("#driver_license_no").val(Trim(C.driver_license_no));

        if (zxcx != null && zxcx.sfzhtg == 1) {
            $("#identity_card_no").attr("disabled", "disabled");
            $("#name").attr("disabled", "disabled");
        }
    } else {
        window.location.href = "/usercenter/login";
    }
}

function clickEvent() {
    var left = $(".left>a"),
    right = $(".right>div"),
    li = $(".i_t3 li");

    var index = $(".index"),
    shortOrder = $(".shortOrder"),
    pingjia = $("#pingjiadingdan"),
    user_info = $(".user_info"),
    coupon = $(".coupon"),
    integral = $(".integral");

    //左边跳转
    left.click(function () {
        left.removeClass("active");
        $(this).addClass("active");
        right.hide();
    });
    $("#toIndex").click(function () {
        left.removeClass("active");
        right.hide();
        index.show();
        //查看评价
        $(".operation a").click(function () {
            $(this).next().show();
        });
    }); //我的主页
    $("#toShort").click(function () {
        shortOrder.show();
        pingjia.hide();
    }); //短租订单
    $("#topingjia").click(function () {
        pingjia.show();
        shortOrder.hide();
        $("#dpj_box").show();
        $("#ypj_box").hide();
        $("#dpj_btn").addClass("active");
        $("#ypj_btn").removeClass("active");
        if ($("#dpj_box").height() > 0) {
            $(".noMore5").css("visibility", "hidden");
            $(".order5").css("visibility", "visible")
        } else {
            $(".noMore5").css("visibility", "visible");
            $(".order5").css("visibility", "hidden");

        }
    }); //评价订单
    $("#toUser").click(function () {
        user_info.show();
        N = 0;
        noEvaluate(1);
    }); //用户信息
    $("#toCoupon").click(function () {
        coupon.show();
    }); //优惠券
    $("#dpj_btn").click(function () {
        N = 0;
        noEvaluate(1)
        $("#dpj_box").show();
        $("#ypj_box").hide();
        $("#dpj_btn").addClass("active");
        $("#ypj_btn").removeClass("active");
        if ($("#dpj_box").height() > 0) {
            $(".noMore5").css("visibility", "hidden");
            $(".order5").css("visibility", "visible")
        } else {
            $(".noMore5").css("visibility", "visible");
            $(".order5").css("visibility", "hidden");

        }
    }); //待评价
    $("#ypj_btn").click(function () {
        N = 0;
        noEvaluate(1);
        $("#ypj_box").show();
        $("#dpj_box").hide();
        $("#ypj_btn").addClass("active ");
        $("#dpj_btn").removeClass("active");
        if ($("#ypj_box").height() > 0) {
            $(".noMore5").css("visibility", "hidden");
            $(".order5").css("visibility", "visible")
        } else {
            $(".noMore5").css("visibility", "visible");
            $(".order5").css("visibility", "hidden");
        }
    }); //已经评价
    $(".i_b1>a").click(function () {
        $("#toShort").click()
    }); //最近订单 查看全部
    var tit = $(".shortOrder .order1 li");

    //订单列表 查看不同类型 订单
    tit.click(function () {
        N = 0;
        var n = tit.index($(this));
        tit.removeClass("active");
        $(this).addClass("active");
        switch (n) {
            case 1:
                n = 1;
                break;
            case 2:
                n = 2;
                break;
            case 3:
                n = 4;
                break;
            case 4:
                n = 5;
                break;
            case 5:
                n = 4;
                break;
            default:
                break;
        }
        TYPE = n;
        if (n == 32) {
            noEvaluate(1); //待评价订单
        } else {
            orderListLoad(1);
        }
    });

    //主页图标跳转
    li.eq(1).click(function () {
        $("#toCoupon").click()
    }); //优惠券
    li.eq(2).click(function () {
        $("#toShort").click();
        tit.eq(1).click();
    }); //预约中
    li.eq(3).click(function () {
        $("#toShort").click();
        tit.eq(3).click();
    }); //已完成
    li.eq(4).click(function () {
        $("#toShort").click();
        tit.eq(5).click();
    }); //待评价
}

//租车订单加载
function orderListLoad(page) {
    var typeNum;
    switch (TYPE) {
        case 0:
            typeNum = 0;
            break;
        case 1:
            typeNum = 1;
            break;
        case 2:
            typeNum = 2;
            break;
        case 8:
            typeNum = 4;
            break;
        case 16:
            typeNum = 3;
            break;
    }

    var token = jQuery.cookie('login_token');

    var url_orders = order_list.replace('{0}', encodeURIComponent(token));
    url_orders = url_orders.replace('{1}', 5);
    url_orders = url_orders.replace('{2}', page);
    url_orders = url_orders.replace('{3}', TYPE);

    jQuery.ajax({
        url: url_orders,
        type: "get",
        dataType: 'jsonp',
        success: function (result) {
            if (N == 0) { //类型切换后
                addPage(result.total_page); //根据总条数添加翻页按钮
            }
            $(".shortOrder .order1 a").eq(typeNum).html("(" + result.total_page + ")"); //总条数展示
            var html = '',
            num = result.Orders.length,
            order, car;
            for (var i = 0; i < num; i++) {
                order = result.Orders[i];
                car = order.auto.autoclass;
                var time1 = order.start_date.substring(0, 10) + " " + order.stop_date.substring(11, 16),
                //取车时间
                time2,
                //还车时间
                img = car.class_image;
                img = img.substr(1, img.length - 1);
                if (order.stop_date) { //长租还车时间可能为空
                    time2 = order.stop_date.substring(0, 10) + " " + order.stop_date.substring(11, 16); //还车时间
                } else {
                    time2 = "";
                }
                html += "<li><h5><a>订单号：</a>" + order.contract_file_id + "</h5>" + "<div><img src='" + api_url + img + "'>" + "<div class='info'><a>" + car.honda + " " + car.class_name + "</a>" + "<div class='carIcon'><div>" + "<i class='icon icon_car1'></i>" + "<a>" + car.body_construction + "</a></div><div><i class='icon icon_car2'></i>" + "<a>" + car.gearbox + "</a></div><div><i class='icon icon_car3'></i>" + "<a>" + car.let_litre + "</a></div><div><i class='icon icon_car4'></i>" + "<a>乘坐" + car.seat_count + "人</a></div></div></div>" + "<ul><li class='time'><div>取车时间<br>" + time1 + "</div>" + "<div>还车时间<br>" + time2 + "</div></li>" + "<li class='cen'>总额：￥" + order.standard_rent + "</li>" + "<li class='state'>" + get_state(order.order_state) + "</a></li>" + "<li class='operation'>";

                if (TYPE == 1 || (order.order_state & 1) == 1) { //预约中订单 添加 取消按钮
                    html += "<div><a href='/home/orderdetail?order_id=" + order.order_id + "'>订单详情</a><br>" + "<a onclick='cancelOrder(" + order.order_id + ")'>取消订单</a></div>" + "</li></ul></div></li>";
                } else {
                    html += "<a href='/home/orderdetail?order_id=" + order.order_id + "'>订单详情</a>" + "</li></ul></div></li>";
                }
                if (i == 0) {
                    if (isOneLoad) {
                        $(".Yes").hide();
                        $(".No").show().find(".order3").html(html); //添加最近订单
                        isOneLoad = false;
                    }
                }
            }
            $(".shortOrder>.order3").html(html);
        }
    });
}

//租车订单加载
function orderListLoad1(page) {
    var typeNum;
    switch (TYPE) {
        case 0:
            typeNum = 0;
            break;
        case 1:
            typeNum = 1;
            break;
        case 2:
            typeNum = 2;
            break;
        case 8:
            typeNum = 4;
            break;
        case 16:
            typeNum = 3;
            break;
    }

    var token = jQuery.cookie('login_token');

    var url_orders = order_list.replace('{0}', encodeURIComponent(token));
    url_orders = url_orders.replace('{1}', 5);
    url_orders = url_orders.replace('{2}', page);
    url_orders = url_orders.replace('{3}', TYPE);

    jQuery.ajax({
        url: url_orders,
        type: "get",
        dataType: 'jsonp',
        success: function (result) {
            addPage(result.total_page); //根据总条数添加翻页按钮
            $(".shortOrder .order1 a").eq(typeNum).html("(" + result.total_page + ")"); //总条数展示
            var html = '',
            num = result.Orders.length,
            order, car;
            for (var i = 0; i < num; i++) {
                order = result.Orders[i];
                car = order.auto.autoclass;
                var time1 = order.start_date.substring(0, 10) + " " + order.stop_date.substring(11, 16),
                //取车时间
                time2,
                //还车时间
                img = car.class_image;
                img = img.substr(1, img.length - 1);
                if (order.stop_date) { //长租还车时间可能为空
                    time2 = order.stop_date.substring(0, 10) + " " + order.stop_date.substring(11, 16); //还车时间
                } else {
                    time2 = "";
                }
                html += "<li><h5><a>订单号：</a>" + order.contract_file_id + "</h5>" + "<div><img src='" + api_url + img + "'>" + "<div class='info'><a>" + car.honda + " " + car.class_name + "</a>" + "<div class='carIcon'><div>" + "<i class='icon icon_car1'></i>" + "<a>" + car.body_construction + "</a></div><div><i class='icon icon_car2'></i>" + "<a>" + car.gearbox + "</a></div><div><i class='icon icon_car3'></i>" + "<a>" + car.let_litre + "</a></div><div><i class='icon icon_car4'></i>" + "<a>乘坐" + car.seat_count + "人</a></div></div></div>" + "<ul><li class='time'><div>取车时间<br>" + time1 + "</div>" + "<div>还车时间<br>" + time2 + "</div></li>" + "<li class='cen'>总额：￥" + order.standard_rent + "</li>" + "<li class='state'>" + get_state(order.order_state) + "</a></li>" + "<li class='operation'>";

                if (TYPE == 1 || (order.order_state & 1) == 1) { //预约中订单 添加 取消按钮
                    html += "<div><a href='/home/orderdetail?order_id=" + order.order_id + "'>订单详情</a><br>" + "<a onclick='cancelOrder(" + order.order_id + ")'>取消订单</a></div>" + "</li></ul></div></li>";
                } else {
                    html += "<a href='/home/orderdetail?order_id=" + order.order_id + "'>订单详情</a>" + "</li></ul></div></li>";
                }
                if (i == 0) {
                    if (isOneLoad) {
                        $(".Yes").hide();
                        $(".No").show().find(".order3").html(html); //添加最近订单
                        isOneLoad = false;
                    }
                }
            }
            $(".shortOrder>.order3").html(html);
        }
    });
}

//订单加载
function orderLoad(page) {
    switch (TYPE) {
        default:
            orderListLoad(page);
            break;
    }
}

//待评价订单列表
function noEvaluate(page) {
    jQuery.ajax({
        url:
        noCommentOrder,
        type: "get",
        dataType: 'jsonp',
        data: {
            customer_id: Customer.customer_id,
            type: 0,
            page: page
        },
        success: function (result) {
            if (N == 0) {
                addPage1(result.total); //根据总条数添加翻页按钮
            }

            $(".shortOrder .order1 a").eq(5).html("(" + result.total + ")"); //总条数展示
            var num = result.cus_app.length,
            order, car, id;
            var html = '';
            var html1 = '';
            for (var i = 0; i < num; i++) {
                order = result.cus_app[i].order;
                car = order.auto.autoclass;
                id = result.cus_app[i].order_id;
                var time1 = order.start_date.substring(0, 10) + " " + order.stop_date.substring(11, 16),
                //取车时间
                time2,
                //还车时间
                image = car.class_image;
                image = image.substr(1, image.length - 1);

                if (order.stop_date) {
                    time2 = order.stop_date.substring(0, 10) + " " + order.stop_date.substring(11, 16); //还车时间
                } else {
                    time2 = "";
                }
                var text = result.cus_app[i].appraise_note;
                var state = result.cus_app[i].check_status;
                var img1 = "&nbsp;<img style='width:18px; margin-left:14px;float:none; height:18px; margin:0' src='/content/images/user/star1.svg'/>";
                var img2 = "&nbsp;<img style='width:18px; margin-left:14px;float:none; height:18px; margin:0' src='/content/images/user/star2.svg'/>";
                var text = result.cus_app[i].appraise_note;
                var score = result.cus_app[i].score
                var text1 = result.cus_app[i].reply == null ? "感谢您对大方的支持" : result.cus_app[i].reply;

                var img = "";
                for (var k = 0; k < score; k++) {
                    img += img1;
                }
                for (var j = 0; j < 5 - score; j++) {
                    img += img2;
                }
                var date = new Date();
                var y = date.getFullYear();
                var m = date.getMonth();
                var d = date.getDate();
                var endDate = result.cus_app[i].order_over_time.substr(0, 10);
                var array = endDate.split("-");
                var endTime = new Date(parseInt(array[0]), parseInt(array[1]) - 1, parseInt(array[2]));
                var nowTime = new Date(parseInt(y), parseInt(m), parseInt(d));
                var day = (Number(nowTime) - Number(endTime)) / (1000 * 60 * 60 * 24);

                if (day > 30) {
                    html1 += "<li><h5><a>订单号：</a>" + order.contract_file_id + "</h5>" + "<div><img src='" + api_url + image + "'>" + "<div class='info'><a>" + car.honda + " " + car.class_name + "</a>" + "<div class='carIcon'><div>" + "<i class='icon icon_car1'></i>" + "<a>" + car.body_construction + "</a></div><div><i class='icon icon_car2'></i>" + "<a>" + car.gearbox + "</a></div><div><i class='icon icon_car3'></i>" + "<a>" + car.let_litre + "</a></div><div><i class='icon icon_car4'></i>" + "<a>乘坐" + car.seat_count + "人</a></div></div></div>" + "<ul><li class='time'><div>取车时间<br>" + time1 + "</div>" + "<div>还车时间<br>" + time2 + "</div></li>" + "<li class='cen'>总额：￥" + order.standard_rent + "</li>" + "<li class='state'>已完成</a></li><li class='operation'><div>";
                    html1 += "<a style='display:block;  width:90px; line-height:50px;margin: auto; text-decoration:none' class='chakan' >查看评价</a> <div class='showpngjia'>" + "<div class='my_coment_xing'>" + "<span>我的评分：</span> " + img + " <span style='color:#ea5506;float:right'>" + score + "分</span>" + " </div>" + " <br />" + " <p class='mycoment'>我的评价：</p>" + " <p class='mycoment' style='margin-top:25px'>门店回复：系统默认您对本次服务满意，感谢您对大方的支持 </p>" + " </div></li></div>" + "</li></ul></div>";

                } else {
                    if (state == 1) {

                        html += "<li><h5><a>订单号：</a>" + order.contract_file_id + "</h5>" + "<div><img src='" + api_url + image + "'>" + "<div class='info'><a>" + car.honda + " " + car.class_name + "</a>" + "<div class='carIcon'><div>" + "<i class='icon icon_car1'></i>" + "<a>" + car.body_construction + "</a></div><div><i class='icon icon_car2'></i>" + "<a>" + car.gearbox + "</a></div><div><i class='icon icon_car3'></i>" + "<a>" + car.let_litre + "</a></div><div><i class='icon icon_car4'></i>" + "<a>乘坐" + car.seat_count + "人</a></div></div></div>" + "<ul><li class='time'><div>取车时间<br>" + time1 + "</div>" + "<div>还车时间<br>" + time2 + "</div></li>" + "<li class='cen'>总额：￥" + order.standard_rent + "</li>" + "<li class='state'>已完成</a></li><li class='operation'><div>";
                        html += "<a class='goAppraise' appraise_id='" + id + "' style='display:block;  width:90px; line-height: 33px;margin: auto;border:1px solid #ea5506; color:#ea5506;text-decoration:none'>立即评价</a></div>" + "</li></ul></div></li>";

                    } else if (state == 2) {
                        html1 += "<li><h5><a>订单号：</a>" + order.contract_file_id + "</h5>" + "<div><img src='" + api_url + image + "'>" + "<div class='info'><a>" + car.honda + " " + car.class_name + "</a>" + "<div class='carIcon'><div>" + "<i class='icon icon_car1'></i>" + "<a>" + car.body_construction + "</a></div><div><i class='icon icon_car2'></i>" + "<a>" + car.gearbox + "</a></div><div><i class='icon icon_car3'></i>" + "<a>" + car.let_litre + "</a></div><div><i class='icon icon_car4'></i>" + "<a>乘坐" + car.seat_count + "人</a></div></div></div>" + "<ul><li class='time'><div>取车时间<br>" + time1 + "</div>" + "<div>还车时间<br>" + time2 + "</div></li>" + "<li class='cen'>总额：￥" + order.standard_rent + "</li>" + "<li class='state'>已完成</a></li><li class='operation'><div>";
                        html1 += "<a style='display:block;  width:90px; line-height:50px;margin: auto; text-decoration:none' class='chakan'>查看评价</a><div class='showpngjia'>" + "<div class='my_coment_xing'>" + "<span>我的评分：</span> " + img + " <span style='color:#ea5506;float:right'>" + score + "分</span>" + " </div>" + " <br />" + " <p class='mycoment'>我的评价：</p>" + " <p class='mycoment' style='margin-top:25px'>门店回复：系统默认您对本次服务满意，感谢您对大方的支持 </p>" + " </div></li></div>" + "</li></ul></div> ";

                    } else if (state == 3) {
                        if (text) {
                            html1 += "<li><h5><a>订单号：</a>" + order.contract_file_id + "</h5>" + "<div><img src='" + api_url + image + "'>" + "<div class='info'><a>" + car.honda + " " + car.class_name + "</a>" + "<div class='carIcon'><div>" + "<i class='icon icon_car1'></i>" + "<a>" + car.body_construction + "</a></div><div><i class='icon icon_car2'></i>" + "<a>" + car.gearbox + "</a></div><div><i class='icon icon_car3'></i>" + "<a>" + car.let_litre + "</a></div><div><i class='icon icon_car4'></i>" + "<a>乘坐" + car.seat_count + "人</a></div></div></div>" + "<ul><li class='time'><div>取车时间<br>" + time1 + "</div>" + "<div>还车时间<br>" + time2 + "</div></li>" + "<li class='cen'>总额：￥" + order.standard_rent + "</li>" + "<li class='state'>已完成</a></li><li class='operation'><div>";
                            html1 += "<a style='display:block;  width:90px; line-height:50px;margin: auto; text-decoration:none' class='chakan'>查看评价</a> <div class='showpngjia' id='" + id + "'>" + "<div class='my_coment_xing'>" + "<span>我的评分：</span> " + img + " <span style='color:#ea5506;float:right'>" + score + "分</span>" + " </div>" + " <br />" + " <p class='mycoment'>我的评价：" + text + "</p>" + " <p class='mycoment' style='margin-top:25px'>门店回复：" + text1 + " </p>" + " </div></li></div>" + "</li></ul></div>";

                        } else {
                            html += "<li><h5><a>订单号：</a>" + order.contract_file_id + "</h5>" + "<div><img src='" + api_url + image + "'>" + "<div class='info'><a>" + car.honda + " " + car.class_name + "</a>" + "<div class='carIcon'><div>" + "<i class='icon icon_car1'></i>" + "<a>" + car.body_construction + "</a></div><div><i class='icon icon_car2'></i>" + "<a>" + car.gearbox + "</a></div><div><i class='icon icon_car3'></i>" + "<a>" + car.let_litre + "</a></div><div><i class='icon icon_car4'></i>" + "<a>乘坐" + car.seat_count + "人</a></div></div></div>" + "<ul><li class='time'><div>取车时间<br>" + time1 + "</div>" + "<div>还车时间<br>" + time2 + "</div></li>" + "<li class='cen'>总额：￥" + order.standard_rent + "</li>" + "<li class='state'>已完成</a></li><li class='operation'><div>";
                            html += "<a class='goAppraise' appraise_id='" + id + "' style='display:block;  width:90px; line-height: 33px;margin: auto;border:1px solid #ea5506; color:#ea5506;text-decoration:none'>立即评价</a></div>" + "</li></ul></div></li>";

                        }
                    }
                }
            }
            $("#dpj_box").html(html);
            $("#ypj_box").html(html1);
            $(".chakan").click(function () {
                $(this).next().show();
                event.stopPropagation();
            });
            $(".userBox").click(function () {
                $(".showpngjia").hide();
                event.stopPropagation();

            });
            $(".goAppraise").click(function (e) {
                e.stopPropagation();
                $("#reviews").attr({
                    "appraise_id": $(this).attr("appraise_id")
                });
                $(".reviewsBox").fadeIn("fast");
            });
        }
    });
}

//添加翻页
function addPage(n) {
    n = page_number(n, 5); //计算页数
    if (n == 0) {
        $(".shortOrder>.order4").hide();
        $(".shortOrder .noMore").show();
    } else {
        $(".shortOrder>.order4").show();
        $(".shortOrder .noMore").hide();
    }
    if (n > 0) {
        var init = function () {
            Pagination.Init(document.getElementById('pagination'), {
                size: n,
                page: 1,
                step: 1
            });
        };
        init();
        N = 1;
    }
    $("#pagination").find("span a").removeClass("current").eq(0).addClass("current");

}
function addPage1(n) {
    n = page_number(n, 5); //计算页数
    if (n == 0) {
        $(".order5").hide();
        $(".noMore5").show();
    } else {
        $(".order5").show();

    }

    if (n > 0) {
        var init1 = function () {
            Pagination1.Init1(document.getElementById('pagination1'), {
                size: n,
                page: 1,
                step: 1
            });
        };
        init1();
        N = 1;
    }
    $("#pagination1").find("span a").removeClass("current").eq(0).addClass("current");

}

//账户信息修改
function user() {
    var customer = JSON.parse(jQuery.cookie("login_user"));
    var hyzxcx = JSON.parse(jQuery.cookie("login_hyzxcx"));

    var QQ = $("#qq"),
    Email = $("#email"),
    pw = $("#pw"),
    pw1 = $("#pw1"),
    pw2 = $("#pw2"),
    pw3 = $("#pw3"),
    error = $("#error"),
    blank = /\s+/,
    //匹配空格
    tel = $("#pho"),
    mess = $("#mess"),
    phon = /^0?(13[0-9]|15[0-35-9]|18[0-9]|14[57]|17[0-9])[0-9]{8}$/,
    emailReg = /^[a-zA-Z0-9_-]+@[a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)+$/; //匹配Email
    var nameReg = /^([\u4e00-\u9fa5]){1,8}$/; //姓名
    var idCardReg = /^\d{17}(\d{1}|x|X)$/; //身份证号码
    //用户信息 确认修改
    $("#confirm").click(function () {

        $("#confirm").hide();
        $("#confirm1").show();

        var customer_name = $("#name").val();
        var identity_card_no = $("#identity_card_no").val();

        var alternate_contact_name = $("#name1").val();
        var alternate_contact_phone = $("#phone1").val();
        var qq = $("#qq").val();
        var email = $("#email").val();

        if (customer_name == "") {
            layer.tips('姓名不能为空！', '#confirm', {
                tips: [4, '#0FA6D8']
            });
            $("#name").focus();
            return;
        } else if (!nameReg.test(customer_name)) {
            layer.tips('姓名格式不正确！', '#confirm', {
                tips: [4, '#0FA6D8']
            });
            $("#name").focus();
            return;
        } else if (alternate_contact_phone != "" && !(phon.test(alternate_contact_phone))) {
            layer.tips('紧急联系人格式不正确！', '#confirm', {
                tips: [4, '#0FA6D8']
            });
            $("#phone1").focus();
            return;
        } else if (email != "" && !(emailReg.test(email))) {
            layer.tips('email格式不正确！', '#confirm', {
                tips: [4, '#0FA6D8']
            });
            $("#email").focus();
            return;
        } else if (hyzxcx == null || (hyzxcx != null && hyzxcx.sfzhtg != 1)) {
            if (!idCardReg.test(identity_card_no)) {
                layer.tips('身份证号格式不正确！', '#confirm', {
                    tips: [4, '#0FA6D8']
                });
                $("#identity_card_no").focus();
                return;
            }
        }
        check();
    });

    //修改密码 打开
    $("#toUpdatePw").click(function () {
        layer.open({
            type: 1,
            area: ['520px', '260px'],
            shade: [0.8, '#000'],
            scrollbar: false,
            title: '修改密码',
            //不显示标题
            content: $(".updatePw")
        });
    });

    //密码修改 确认
    $("#updatePw").click(function () {
        $(this).find("i").addClass("active");
        setTimeout(function () {
            $("#confirm").find("i").removeClass("active")
        },
        1000);

        if (pw1.val() == "") {
            layer.tips('旧密码不能为空', '#updatePw', {
                tips: [1, '#0FA6D8']
            });
            pw1.focus();
        } else {
            if (pw2.val() == "") {
                layer.tips('新密码不能为空', '#updatePw', {
                    tips: [1, '#0FA6D8']
                });
                pw2.focus();
            } else {
                if (blank.test(pw2.val())) {
                    layer.tips('新密码不能包含空格', '#updatePw', {
                        tips: [1, '#0FA6D8']
                    });
                    pw2.focus();
                } else {
                    if (pw2.val().length < 6) {
                        layer.tips('新密码不能少于6位', '#updatePw', {
                            tips: [1, '#0FA6D8']
                        });
                        pw2.focus();
                    } else {
                        if (pw2.val() == pw3.val()) {
                            updatePw(); //更新密码
                        } else {
                            layer.tips('确认新密码 和 新密码 不一致', '#updatePw', {
                                tips: [1, '#0FA6D8']
                            });
                            pw3.focus();
                        }
                    }
                }
            }
        }
    });
    //修改手机校验
    $("#updatePho").click(function () {

        if (tel.val() == "") {
            layer.tips('手机号码不能为空', '#updatePho', {
                tips: [1, '#0FA6D8']
            });
            tel.focus();
            return;
        } else {
            if (phon.test(tel.val())) {
                if (mess.val() == "") {
                    layer.tips('请输入验证码', '#updatePho', {
                        tips: [1, '#0FA6D8']
                    });
                    mess.focus();
                    return;
                } else if (Trim(tel.val()) == Trim(customer.customer_phone)) {
                    layer.tips('新手机号不能与原手机号相同！', '#updatePho', {
                        tips: [1, '#0FA6D8']
                    });
                    tel.focus();

                    clearInterval(time);
                    $("#sendmessage").show();
                    $("#sendmessage1").hide();
                    $("#sendmessage1").html("已发送");

                    return;
                } else {

                    check_phone();
                }
            } else {
                layer.tips('手机号码不正确', '#updatePho', {
                    tips: [1, '#0FA6D8']
                });
                tel.focus();
                return;
            }
        }

    });

    $("#sendmessage").click(function () {
        /*------验证码 重新发送 倒计时-----*/
        var i1 = $("#sendmessage"); //发送验证码按钮
        var i2 = $("#sendmessage1"); //显示倒计时 时间按钮
        var t = 60; //60s后可重新发送验证码
        if (tel.val() == "") {
            layer.tips('手机号码不能为空', '#updatePho', {
                tips: [1, '#0FA6D8']
            });
            tel.focus();
        } else if (Trim(tel.val()) == Trim(customer.customer_phone)) {
            layer.tips('新手机号不能与原手机号相同！', '#updatePho', {
                tips: [1, '#0FA6D8']
            });
            tel.focus();
            return;
        } else {

            if (phon.test(tel.val())) { //符合条件才发送验证码
                i1.hide();
                i2.show();
                time = setInterval(function () {
                    if (t == 0) {
                        i2.hide();
                        i2.val("已发送");
                        i1.show();
                        i1.val("发送验证码");
                        clearInterval(time);
                        t = 60;
                    } else i2.html(t-- + "秒后可重新发送");
                },
                1000);
                check_phone();
            } else {
                layer.tips('格式不正确', '#updatePho', {
                    tips: [1, '#0FA6D8']
                });
                tel.focus();
            }
        }
        /*------验证码 重新发送 倒计时-----*/
    })

    QQ.focus(function () {
        $(this).bind('keyup',
        function () {
            error.html("");
        });
    });
    Email.focus(function () {
        $(this).bind('keyup',
        function () {
            error.html("");
        });
    });
    pw1.focus(function () {
        $(this).bind('keyup',
        function () {
            error.html("");
        });
    });
    pw2.focus(function () {
        $(this).bind('keyup',
        function () {
            if (blank.test(pw2.val())) {
                error.html("新密码不能包含空格");
                pw2.focus();
            } else {
                error.html("");
            }
        });
    });
    pw3.focus(function () {
        $(this).bind('keyup',
        function () {
            error.html("");
        });
    });
}
function check() {

    var customer = JSON.parse(jQuery.cookie("login_user"));
    var hyzxcx = JSON.parse(jQuery.cookie("login_hyzxcx"));

    var customer_name = $("#name").val();
    var identity_card_no = $("#identity_card_no").val();

    var alternate_contact_name = $("#name1").val();
    var alternate_contact_phone = $("#phone1").val();
    var qq = $("#qq").val();
    var email = $("#email").val();

    var data = new Object();
    data.customer_name = customer_name;
    data.alternate_contact_name = alternate_contact_name;
    data.alternate_contact_phone = alternate_contact_phone;
    data.customer_id = customer.customer_id;
    data.qq = qq;
    data.email = email;
    if (hyzxcx == null || (hyzxcx != null && hyzxcx.sfzhtg != 1)) {
        data.identity_card_no = identity_card_no;
    }
    $.ajax({
        type: 'get',
        url: update_customer_something,
        data: data,
        success: function (d) {
            if (d.state == 1) {
                layer.tips('修改成功!重新登录后生效！', '#confirm', {
                    tips: [4, '#0FA6D8']
                });
                setTimeout(function () {
                    location.href = '/usercenter/login';
                },
                2000)
            } else {
                layer.tips('修改失败！', '#confirm', {
                    tips: [4, '#0FA6D8']
                });
                return;
            }
        },
        error: function () {
            layer.tips('ERROR', '#confirm', {
                tips: [4, '#0FA6D8']
            });
            return;
        }
    })

    $(this).find("i").addClass("active");
    setTimeout(function () {
        $("#confirm").find("i").removeClass("active")
    },
    1000);

    $("#confirm").show();
    $("#confirm1").hide();
}
function check_phone() {

    var token = jQuery.cookie('login_token');
    if (token == '' || token == null) return;
    var data = new Object();
    data.phone = $("#pho").val();
    data.code = $("#mess").val();
    data.password = token;
    jQuery.ajax({
        url: validation,
        dataType: 'jsonp',
        data: data,
        success: function (r) {
            if (r.state < 0) {
                var msg = "";
                switch (r.state) {
                    case -4: msg = '新手机号不能与原手机号相同';
                        break;
                    case -1: msg = '验证码发送失败';
                        break;
                    case -3: msg = '验证码错误';
                        break;
                    case -5: msg = '该手机号已被注册';
                        break;
                }
                layer.tips(msg, '#updatePho', {
                    tips: [1, '#0FA6D8']
                });
                clearInterval(time);
                $("#sendmessage").show();
                $("#sendmessage1").hide();
                $("#sendmessage1").html("已发送");
            } else if (r.state == 2) {
                layer.tips('修改成功，请重新登录！', '#updatePho', {
                    tips: [1, '#0FA6D8']
                });

                $("#updatePho").attr('disabled', 'disabled');

                setTimeout(function () {
                    location.href = '/usercenter/login'
                },
                2000);

            }
        },
        error: function () {
            layer.tips('系统繁忙，请稍后重试！', '#updatePho', {
                tips: [1, '#0FA6D8']
            });
        }
    })
}

//优惠券
function coupon() {
    var span = $(".coupon_tit>span"),
    coupon = $(".coupon_body");
    span.click(function () {
        span.removeClass("active");
        $(this).addClass("active");
        var n = span.index($(this)) + 1;
        coupon.hide();
        $("#coupon" + n + "").show();
    })
}

//翻页
Pagination = {
    code: '',
    Extend: function (data) {
        Pagination.size = data.size;
        Pagination.page = data.page;
        Pagination.step = data.step;
    },
    Add: function (s, f) {
        for (var i = s; i < f; i++) {
            Pagination.code += '<a>' + i + '</a>';
        }
    },
    Last: function () {
        Pagination.code += '<i>...</i><a>' + Pagination.size + '</a>';
    },
    First: function () {
        Pagination.code += '<a>1</a><i>...</i>';
    },

    Click: function () {
        Pagination.page = +this.innerHTML;
        Pagination.Start();
    },
    Prev: function () {
        Pagination.page--;
        if (Pagination.page < 1) {
            Pagination.page = 1;
        }
        Pagination.Start();
    },
    Next: function () {
        Pagination.page++;
        if (Pagination.page > Pagination.size) {
            Pagination.page = Pagination.size;
        }
        Pagination.Start();
    },

    Bind: function () {
        var a = Pagination.e.getElementsByTagName('a');
        for (var i = 0; i < a.length; i++) {
            if (a[i].innerHTML == Pagination.page) {
                a[i].className = 'current';
                orderLoad(Pagination.page);
                //orderListLoad(Pagination.page,TYPE);
            }
            a[i].onclick = Pagination.Click;
        }
    },
    Finish: function () {
        Pagination.e.innerHTML = Pagination.code;
        Pagination.code = '';
        Pagination.Bind();
    },
    Start: function () {
        if (Pagination.size < Pagination.step * 2 + 6) {
            Pagination.Add(1, Pagination.size + 1);
        } else if (Pagination.page < Pagination.step * 2 + 1) {
            Pagination.Add(1, Pagination.step * 2 + 4);
            Pagination.Last();
        } else if (Pagination.page > Pagination.size - Pagination.step * 2) {
            Pagination.First();
            Pagination.Add(Pagination.size - Pagination.step * 2 - 2, Pagination.size + 1);
        } else {
            Pagination.First();
            Pagination.Add(Pagination.page - Pagination.step, Pagination.page + Pagination.step + 1);
            Pagination.Last();
        }
        Pagination.Finish();
    },

    Create: function (e) {
        e.innerHTML = "<a onclick='Pagination.Prev()'>&lt;</a>" + // previous button
        "<span></span>" + // pagination containe
        "<a onclick='Pagination.Next()'>&gt;</a>"; // next button
        Pagination.e = e.getElementsByTagName('span')[0];
    },
    Init: function (e, data) {
        Pagination.Extend(data);
        Pagination.Create(e);
        Pagination.Start();
    }
};
//评价翻页
Pagination1 = {
    code: '',
    Extend: function (data) {
        Pagination1.size = data.size;
        Pagination1.page = data.page;
        Pagination1.step = data.step;
    },
    Add: function (s, f) {
        for (var i = s; i < f; i++) {
            Pagination1.code += '<a>' + i + '</a>';
        }
    },
    Last: function () {
        Pagination1.code += '<i>...</i><a>' + Pagination1.size + '</a>';
    },
    First: function () {
        Pagination1.code += '<a>1</a><i>...</i>';
    },

    Click: function () {
        Pagination1.page = +this.innerHTML;
        Pagination1.Start();
    },
    Prev: function () {
        Pagination1.page--;
        if (Pagination1.page < 1) {
            Pagination1.page = 1;
        }
        Pagination1.Start();
    },
    Next: function () {
        Pagination1.page++;
        if (Pagination1.page > Pagination1.size) {
            Pagination1.page = Pagination1.size;
        }
        Pagination1.Start();
    },

    Bind: function () {
        var a = Pagination1.e.getElementsByTagName('a');
        for (var i = 0; i < a.length; i++) {
            if (a[i].innerHTML == Pagination1.page) {
                a[i].className = 'current';
                noEvaluate(Pagination1.page);
            }
            a[i].onclick = Pagination1.Click;
        }
    },
    Finish: function () {
        Pagination1.e.innerHTML = Pagination1.code;
        Pagination1.code = '';
        Pagination1.Bind();
    },
    Start: function () {
        if (Pagination1.size < Pagination1.step * 2 + 6) {
            Pagination1.Add(1, Pagination1.size + 1);
        } else if (Pagination1.page < Pagination1.step * 2 + 1) {
            Pagination1.Add(1, Pagination1.step * 2 + 4);
            Pagination1.Last();
        } else if (Pagination1.page > Pagination1.size - Pagination1.step * 2) {
            Pagination1.First();
            Pagination1.Add(Pagination1.size - Pagination1.step * 2 - 2, Pagination1.size + 1);
        } else {
            Pagination1.First();
            Pagination1.Add(Pagination1.page - Pagination1.step, Pagination1.page + Pagination1.step + 1);
            Pagination1.Last();
        }
        Pagination1.Finish();
    },

    Create: function (e) {
        e.innerHTML = "<a onclick='Pagination1.Prev()'>&lt;</a>" + // previous button
        "<span></span>" + // pagination container
        "<a onclick='Pagination1.Next()'>&gt;</a>"; // next button
        Pagination1.e = e.getElementsByTagName('span')[0];
    },
    Init1: function (e, data) {
        Pagination1.Extend(data);
        Pagination1.Create(e);
        Pagination1.Start();
    }
};

//订单状态
function get_state(order_state) {
    var stateText = '';
    if ((order_state & 1) == 1) stateText = '预约中';
    else if ((order_state & 2) == 2) stateText = '租赁中';
    else if ((order_state & 8) == 8) stateText = '已取消';
    else if ((order_state & 16) == 16) stateText = '已完成';
    return stateText;
}

//评价
function reviews() {
    var text = $("textarea"),
    temp,
    val;

    //发表评价
    $("#reviews").click(function () {
        if (text.val() && text.val() != "") {
            var data = {
                "score": $(".score i").attr("score"),
                "appraise_note": text.val(),
                "order_id": $(this).attr("appraise_id")
            };
            console.info(data);
            jQuery.ajax({
                url: shop_appraiselist_update,
                dataType: 'jsonp',
                data: data,
                success: function () {
                    $("#reviewsError").html("恭喜您提交成功！");
                    $("#reviewsError").css("color", "green");
                    $("#reviewsError").fadeIn();
                    setTimeout(function () {
                        location.href = "/usercenter/ordermanager";
                    },
                    2000);

                }
            });
        } else {
            text.focus();
            $("#reviewsError").html("亲，评价内容不能为空哦！");
            $("#reviewsError").css("color", "red");
            $("#reviewsError").fadeIn();
        }
    });

    //评分
    $(".score li").click(function () {
        var n = $(".score li").index($(this)) + 1;
        $(".score i").attr({
            class: "icon_eva icon_eva" + n + "",
            score: n
        });
    });
    //可选评价
    $(".reviews li").click(function () {
        if ($(this).hasClass("active")) {
            $(this).removeClass("active");
            val = $(this).html() + "、";
            temp = text.val();
            temp = temp.replace(val, "");
            text.val(temp);
        } else {
            $(this).addClass("active");
            temp = text.val();
            temp += $(this).html() + "、";
            text.val(temp);
        }
        text.focus();
    });
    //判断可输入文字数量
    text.focus(function () {
        var num = 200 - text.val().length;
        $(".textHint a").html(num);
        $(this).bind('keyup',
        function () {
            $("#error").fadeOut();
            var num = 200 - text.val().length;
            $(".textHint a").html(num);
        });
    });

    //关闭 评价窗口
    $(document).click(function (e) {
        var target = $(e.target);
        if (target.closest(".reviewsBox>div").length == 0) {
            $(".reviewsBox").fadeOut("fast");
        }
    });
    $("#close").click(function () {
        $(".reviewsBox").fadeOut("fast");
        $(".reviewsBox textarea").val("");
        $(".reviews li").removeClass("active");
    });

}

//取消订单
function cancelOrder(order_id) {
    layer.confirm('您确定取消订单吗?',
    function (index) {
        if (index == 1) {
            layer.close(index);

            var login_token = jQuery.cookie("login_token");

            if (login_token) {
                if (login_token == '' || login_token == null) return;
            }
            // encodeURIComponent
            var data = {
                order_id: order_id,
                token: login_token
            };

            console.info(data);

            jQuery.ajax({
                url: order_cancel,
                dataType: 'jsonp',
                data: data,
                success: function (r) {
                    if (r > 0) {
                        layer.alert("取消成功！");
                    } else {
                        switch (r) {
                            case -2: layer.alert("已经支付的订单不能取消.请电话联系客服.！");
                                break;
                            default:
                                layer.alert("取消失败！");
                                break;
                        }
                    }
                    setTimeout(function () {
                        window.location.reload();
                    },
                    2000);
                }
            });
        } else {
            layer.close(index);
        }
    });
}

//更新用户信息
function updateUser() {
    var error = $("#error"),
    confirm = $("#confirm");
    var token = jQuery.cookie('login_token');
    if (token == '' || token == null) {
        location.href = '/usercenter/login';
        return;
    }
    confirm.attr('disabled', true).css({
        "background": "#ddd"
    });
    var data = {};
    data.token = token;
    data.password = $("#pw").val();
    data.customer = {
        qq: $("#qq").val(),
        webchat: Customer.webchat,
        customer_email: $("#email").val(),
        alternate_contact_name: Customer.alternate_contact_name,
        alternate_contact_phone: Customer.alternate_contact_phone
    };

    jQuery.ajax({
        url: update_user,
        dataType: 'jsonp',
        data: data,
        success: function (r) {
            if (r.state < 0) {
                var msg = "";
                switch (r.state) {
                    case -1: msg = 'Email已被占用';
                        break;
                    case -3: msg = "手机号重复";
                        break;
                    case -200: msg = '输入的密码不正确';
                        break;
                }
                layer.tips(msg, '#confirm', {
                    tips: [4, '#0FA6D8']
                });
                confirm.attr('disabled', false).css({
                    "background": "#ea5506"
                });
            } else {
                layer.tips('修改成功', '#confirm', {
                    tips: [4, '#0FA6D8']
                });
                $.cookie("login_user", JSON.stringify(r.customer), {
                    expires: 7,
                    path: "/"
                });
                setTimeout(function () {
                    location.reload();
                },
                2000);
            }
        },
        error: function () {
            layer.tips('修改失败，请重试', '#confirm', {
                tips: [4, '#0FA6D8']
            });
            confirm.attr('disabled', false).css({
                "background": "#ea5506"
            });
        }
    })
}

//更新密码
function updatePw() {
    var updatePw = $("#updatePw");
    updatePw.attr('disabled', true).css("background", "#ddd");
    var token = jQuery.cookie('login_token');
    if (token == '' || token == null) {
        location.href = '/usercenter/login';
        return;
    }
    var data = {};
    data.password_old = $("#pw1").val();
    data.password_new = $("#pw2").val();
    data.token = token;
    jQuery.ajax({
        url: password_change,
        dataType: 'jsonp',
        data: data,
        success: function (r) {
            if (r < 0) {
                var msg = "";
                switch (r) {
                    case -1: msg = '修改失败';
                        break;
                    case -2: msg = '参数错误';
                        break;
                    case -3: msg = '新密码不能与旧密码相同';
                        break;
                    case -200: msg = '输入原始的密码不正确';
                        break;
                }
                layer.tips(msg, '#updatePw', {
                    tips: [1, '#0FA6D8']
                });
                updatePw.attr('disabled', false).css({
                    "background": "#ea5506"
                });
            } else {
                layer.tips('修改成功！请重新登录', '#updatePw', {
                    tips: [1, '#0FA6D8']
                });
                setTimeout(function () {
                    location.href = '/usercenter/login'
                },
                2000);
            }
        },
        error: function () {
            layer.tips('服务器错误,请稍后再试', '#updatePw', {
                tips: [1, '#0FA6D8']
            });
            updatePw.attr('disabled', false).css({
                "background": "#ea5506"
            });
        }
    })
}