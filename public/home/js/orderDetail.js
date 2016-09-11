$(function () {
    getData(result);
});

console.log(result)
//获取订单信息
function getData(result) {
    if (true) {
        var basicInfo = $(".basicInfo a");
        basicInfo.eq(0).html(result.ord_sn);        //订单号
        basicInfo.eq(2).html(result.status);                  //订单转台
        basicInfo.eq(3).html("3000元");               //预售金额
        //车辆信息
        $(".carInfoL>img").attr({src: result.car_img});   //图片
        $(".carInfoL>b").html("共" + result.timeday + "天");   //租期
        $(".carInfoR>h2").html(result.brand_name + " " + result.car_name);   //车名字
        var carIcon = $(".carIcon>a");
        carIcon.eq(0).html('2 厢');
        carIcon.eq(1).html('手动挡');
        carIcon.eq(2).html('2.0 L');
        carIcon.eq(3).html("乘坐 4 人");
        //门店信息
        var shopInfo = $(".storeInfoR");
        shopInfo.find("h5").eq(0).html(result.start_shop.district+" - "+result.start_shop.server_name);  //取车门店
        shopInfo.find("h5").eq(1).html(result.stop_shop.district+" - "+result.stop_shop.server_name);
        shopInfo.find("a").eq(0).html(date_format(result.start_date, "yyyy-MM-dd HH:mm"));       //取车时间
        shopInfo.find("a").eq(1).html(result.start_shop.street);
        shopInfo.find("a").eq(2).html(date_format(result.stop_date, "yyyy-MM-dd HH:mm"));        //还车时间
        shopInfo.find("a").eq(3).html(result.stop_shop.street);
        //2016.5.24 按需求添加门店联系电话
        //if (result.order_state == 1) {
            var div = $(".contactphone");
            //var phone = result.start_id.office_tel;
            var str = "门店联系电话: 114";
            div.html(str);
       // }
        //租金信息
        $(".basicPrice>b").html(result.price.base_price + "元");
        //每日价格
        addPriceDetail(result.start_date, result.timeday, result.car_price);  //下拉菜单每日价格
        $("#basic>a").html("(" + 30 + "元*" + result.timeday + "天)");        //基本保险费
        $("#basic>b").html(result.price.basic_insurance + "元");                //基本保险费
        $("#counterFee>b").html(20 + "元");                                   //手续费
        $("#sumPrice").html(result.define_rent);
        //异店还车费
        if (result.price.other_shop==1) {
            $(".differentStore").show().find("b").html("100元");               //异地还车费
        }
//优惠券展示
        if(result.benefit==1){//使用的优惠券
            $(".yesGo>c").html(result.benefit_info.benefit_name);
            $(".yesGo>b").html('-'+result.benefit_info.ord_price);
            $(".yesGo").show();
        }

        $("#yifu>b").html(result.price.money + "元");                //已付的钱
        $("#sumPrice").text(result.ord_price);     //总价格
        var yusq = result.define_rent_deposit;
        //var old_rent = result.rent_deposit_pre_authorization_amount + result.rent_deposit_online_bank_payment_amount
        //    + result.rent_deposit_pos_payment_amount + result.rent_deposit_cash_payment_amount + result.rent_deposit_cheque_payment_amount + result.rent_deposit_coupon_payment_amount + result.rent_deposit_score_payment_amount + result.rent_deposit_other_payment_amount;
        if (result.ord_pay == 0) {
            $("#ysq_button").show();
        }

    } else {
        $('#orderSuccess').hide();
        $('#orderFail').show();
    }
}

//计算基本租车费
function sum(price_list) {
    var s = 0;
    if (price_list) {
        for (var i = 0; i < price_list.length; i++) {
            s += price_list[i].ok_price;
        }
    }
    return s;
}

//每日价格
function addPriceDetail(takeTime, leaseTerm, priceList) {
    var startTime = date_format(takeTime),
        html = '', day, week, day1;
    for (var i = 0; i < leaseTerm; i++) {
        day1 = date_format(date_adddays(startTime, i));
        day = date_format(day1, "MM-dd");
        week = day_in_week(day1, true);
        html += "<li>" + day + "&nbsp;&nbsp;" + week + "<br/>" + result.car_price + "元"
    }
    $(".priceDetail").html(html);
    $(".basicPrice").click(function () {
        $(".priceDetail").slideToggle("fast");
    });
}

//订单状态
function order_state(order_state) {
    var stateText = '';
    if ((order_state & 1) == 1)
        stateText = '已预定';
    else if ((order_state & 2) == 2)
        stateText = '租赁中';
    else if ((order_state & 8) == 8)
        stateText = '已取消';
    else if ((order_state & 16) == 16)
        stateText = '已完成';
    return stateText;
}

function online_pay() {
    $("#fm").submit();
}
function pay() {
    var myDate = new Date();
    var time = myDate.toLocaleDateString();     //获取当前日期
    var stop_time = $("#time").text();
    daysBetween(time, stop_time);
}
//| 求两个时间的天数差 日期格式为 YYYY-MM-dd  
function daysBetween(time, stop_time) {
    var OneMonth = time.substring(5, time.lastIndexOf('/'));
    var OneDay = time.substring(time.length, time.lastIndexOf('/') + 1);
    var OneYear = time.substring(0, time.indexOf('/'));

    var TwoMonth = stop_time.substring(5, stop_time.lastIndexOf('-'));
    var TwoDay = stop_time.substring(10, stop_time.lastIndexOf('-') + 1);
    var TwoYear = stop_time.substring(0, stop_time.indexOf('-'));

    var cha = ((Date.parse(TwoMonth + '/' + TwoDay + '/' + TwoYear) - Date.parse(OneMonth + '/' + OneDay + '/' + OneYear)) / 86400000);
    var a = Math.abs(cha);

    //if (a < 28) {
    //    location.href = "/home/onlinepayp?order_id=" + orderId;//在线支付页面
    //} else {
    //    online_pay();
    //}
}