$(function(){
    getData();
});
//获取订单信息
function getData(){
    //if (order_id && order_id > 0) {
    if (result) {
        var info1=$("#orderInfo").find("a"),
            info2=$(".carInfo"),
            info3=$("#takeInfo"),
            info4=$("#returnInfo");
        //jQuery.ajax({
        //    url: order_info_url,
        //    dataType: 'jsonp',
        //    data: { "order_id": order_id },
        //    success: function (result) {
                info1.eq(0).html(result.all_price+"元");  //总价
                info1.eq(1).html(result.ord_sn);          //订单号
                info1.eq(2).html(result.ord_peo);
                info1.eq(3).html(result.timeday+"天");
                info1.eq(4).html("3000元");             //预授权
                $("#carImg").attr('src', result.img);  //图片
                info2.find("b").html(result.car_info); //车辆名字
                info2.find("a").eq(0).html('2 厢');
                info2.find("a").eq(1).html('手动挡');
                info2.find("a").eq(2).html('2.0 L');
                info2.find("a").eq(3).html('乘坐 4 人');
                info3.find("p").html(result.start_shop.server_name);
                info3.find("a").eq(0).html(date_format(result.start_date, "yyyy-MM-dd HH:mm"));
                info3.find("a").eq(1).html(result.start_shop.street);
                info4.find("p").html(result.stop_shop.server_name);
                info4.find("a").eq(0).html(date_format(result.stop_date, "yyyy-MM-dd HH:mm"));
                info4.find("a").eq(1).html(result.stop_shop.street);
                //if ((result.online_bank_payment_amount + result.pos_payment_amount + result.cash_payment_amount + result.cheque_payment_amount + result.coupon_payment_amount + result.score_payment_amount + result.other_payment_amount) > 0) {
                //    $("#yifu_p").html('已付：￥' + Math.round((result.online_bank_payment_amount + result.pos_payment_amount + result.cash_payment_amount + result.cheque_payment_amount + result.coupon_payment_amount + result.score_payment_amount + result.other_payment_amount)) + '</b>');
                //}
                //$("#out_trade_no").val($.trim(result.contract_file_id));
                //$("#subject").val(result.auto.autoclass.honda + result.auto.autoclass.class_name);
                //$("#total_fee").val(result.define_rent_deposit);
                if(result.ord_pay!=0){
                       $(".go_carList>button").hide();
                }
        //    }
        //});
    }else{
        $('#orderSuccess').hide();
        $('#orderFail').show();
    }
}

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

//取消订单
function cancelOrder() {
    var kk=confirm("您确定取消订单吗?");
    if (kk==true)
    {
        var login_token = jQuery.cookie("login_token");
        if (login_token) {
            if (login_token == '' || login_token == null)
                return;
        }
        var data = new Object();
        data.order_id = order_id;
        data.token = login_token;

        jQuery.ajax({
            url: ordercancel,
            dataType: 'jsonp',
            data: data,
            success: function (r) {
                if (r > 0) {
                    $(".Success_tips").html("取消成功！").slideToggle();
                }
                else {
                    switch (r) {
                        case -2:
                            $(".Success_tips").html("已经支付的订单不能取消.请电话联系客服.！").slideToggle();
                            break;
                        default:
                            $(".Success_tips").html("取消失败！").slideToggle();
                            break;
                    }
                }
                setTimeout(function () { window.location.reload(); }, 2000);
            }
        });
    }
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

    if (a < 28) {
        location.href = "/home/onlinepayp?order_id=" + order_id;//在线支付页面
    } else {
        online_pay();
    }
}