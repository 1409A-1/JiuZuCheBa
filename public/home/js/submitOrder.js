var Car, Store, Price, OrderInfo,
    offersId, offersName = [], detailsPrice = [], Services = [],
    needBill = false, billType, bill1, bill2 = [];
$(function () {
    index_Of();
    getData();//订单数据获取
});

//点击事件
function clickEvent() {
    //支付方式
    var payMode = $(".payMode button");
    payMode.click(function () {
        payMode.removeClass("active");
        $(this).addClass("active");
        var n = payMode.index($(this));

        switch (n) {
            case 0: {//在线支付

            } break;
            case 1: {//门店支付

            } break;
        }
    });

    //可选服务
    var serverCheck = $(".service .check"),
        childSeat = $(".childSeat"),
        yesGo = $(".yesGo"), n1 = -1, n2 = -1;
    serverCheck.click(function () {
        var n = serverCheck.index($(this)),
            sumPrice = $("#sumPrice"),
            sumFee = parseInt(sumPrice.html());
        $(this).find("a").fadeToggle();
        switch (n) {
            case 0: {//儿童座椅
                childSeat.find("a").html("(" + Price.childSeat + "元*" + Store.leaseTerm + "天)");
                childSeat.find("b").html(Price.childSeat * Store.leaseTerm + "元");
                childSeat.slideToggle("fast");
                n1 = n1 * (-1);
                sumFee += n1 * Price.childSeat * Store.leaseTerm;
            } break;
            case 1: {//不计免赔
                yesGo.find("a").html("(" + Price.yesGo + "元*" + Store.leaseTerm + "天)");
                yesGo.find("b").html(Price.yesGo * Store.leaseTerm + "元");
                yesGo.slideToggle("fast");
                n2 = n2 * (-1);
                sumFee += n2 * Price.yesGo * Store.leaseTerm;
            } break;
        }
        sumPrice.html(sumFee);

        //存取增值服务ID
        if (n1 > 0) {
            if (Services.indexOf(Price.childSeatID) == -1)
                Services.push(Price.childSeatID);
        } else {
            removeByValue(Services, Price.childSeatID);
        }
        if (n2 > 0) {
            if (Services.indexOf(Price.yesGoID) == -1)
                Services.push(Price.yesGoID);
        } else {
            removeByValue(Services, Price.yesGoID);
        }
    });

    //发票
    var invoiceInfo = $(".invoiceInfo"),
        invoice1 = $(".invoice1").find("input"),
        invoice2 = $(".invoice2").find("input");
    //是否需要发票
    $(".invoice").find(".check").click(function () {
        if (!needBill) {
            $(this).find("a").fadeToggle();
        }
        invoiceInfo.slideToggle("fast");
    });
    $("#exitInvoice").click(function () {
        needBill = false;
        $(".invoice").find(".check").click();
    });//不需要发票
    //发票类型切换
    invoiceInfo.find("ul li").click(function () {
        invoiceInfo.find("ul li").removeClass("active");
        $(this).addClass("active");
        var n = invoiceInfo.find("ul li").index($(this));
        invoiceInfo.find("table").hide().eq(n).show();
    });
    //保存发票信息
    $("#saveInvoice").click(function () {
        needBill = true;
        var n = invoiceInfo.find("ul li").index(invoiceInfo.find("ul .active"));
        switch (n) {
            case 0: {//普通发票
                billType = 1;
                bill1 = invoice1.val();
            } break;
            case 1: {//增值税发票
                billType = 2;
                for (var j = 0; j < invoice2.length; j++) {
                    bill2.push(invoice2.eq(j).val());
                }
            } break;
        }
        invoiceInfo.slideToggle("fast");
    });

    //价格详情
    $(".basicPrice").click(function () {
        $(".priceDetail").slideToggle("fast");
    });

    //提交订单
    $(".submitButton button").click(function () {
        //提交之前，先判断姓名，身份证信息是否完整
        var Customers = JSON.parse(jQuery.cookie("login_user"));
        var customer_id;
        if (Customers && Customers.customer_id) {
            customer_id = Customers.customer_id;
        }
        var customer;
        $.ajax({
            type: 'get',
            data: { customer_id: customer_id },
            url: customer_info_url,
            success: function (d) {
                if (d != null && d.customer != null) {
                    customer = d.customer;

                    var name = customer.customer_name;
                    var idcard = customer.identity_card_no;
                    if (customer && customer.customer_id) {
                        if (name == null || Trim(name) == "" || idcard == null || Trim(idcard) == "") {
                            layer.confirm("您的身份信息未完善，请前去完善后再预订！", { title: '身份信息提示', btn: ['确认', '取消'] }, function () {
                                location.href = '/usercenter/proving';
                                return;
                            })
                        } else {

                            /********提交订单********/
                            var nowTime = new Date(),
                            outTime = $(".storeInfoR a").eq(0).html() + " " + $(".storeInfoR a").eq(2).find(".show a").html();
                            nowTime = date_format(nowTime, "yy-MM-dd HH-mm-ss");
                            outTime = date_format(outTime, "yy-MM-dd HH-mm-ss");
                            if (date_subtract(nowTime, outTime).times >= 0) {
                                //保存订单
                                orderSave(Store.takeTime, Store.returnTime, Car.id, Store.takeId, Store.returnId, offersId, Services);
                                /*********验证身份信息*******/
                                $.ajax({
                                    type: 'get',
                                    url: order_idcard__url,
                                    data: { idcard: idcard, name: name, customer_id: customer.customer_id }
                                })
                            } else {
                                layer.alert("取车时间不得小于当前时间，请重新下订单", function () {
                                    location.href = '/home/index';
                                });
                                setTimeout(function () { location.href = '/home/index' }, 2000);
                            }
                        }
                    }
                }
            }
        })
    })
}
function Trim(str) {
    return str.replace(/(^\s*)|(\s*$)/g, "");
}

//订单数据获取
function getData() {
    console.log(data);
            var car_info = data.car_info,
                startShop = data.start_shop,
                endShop = data.stop_shop;
            //车辆信息
            Car = {
                id: car_info.car_id,// ID
                img: car_info.car_img,// 图片
                brand_honda: car_info.brand_name + " " + car_info.car_name,// 品牌、型号
                con: 2+' 厢',// 厢数
                vol: 2.0 +' L',// 排量
                gear: '手动',// 手自动
                seat_count: "乘坐4人"// 乘坐人数
            };
            //门店信息
            Store = {
                takeId: startShop.server_id,   //取车id
                takeStore: startShop.server_name,  //取车详细信息
                takeTime: startShop.start_date, //取车时间
                takeAddress: startShop.city_name+' '+startShop.district+' '+startShop.traffic_line, //取车详细信息
                takeLng: startShop.coordinate.split(',')[0],
                takeLat: startShop.coordinate.split(',')[1],
                returnId: endShop.server_id,
                returnStore: endShop.server_name,
                returnTime: endShop.stop_date,
                returnAddress: endShop.city_name+' '+startShop.district+' '+startShop.traffic_line,
                returnLng: endShop.coordinate.split(',')[0],
                returnLat: endShop.coordinate.split(',')[1],
                leaseTerm: 2//租期
            };
            //价格信息
            Price = {
                totalFee: 111//总金额
                //rentalFee: data.ok_amount,//基本租车费
                //discount: data.real_amount - data.ok_amount,//优惠金额
                //basic: data.standard_price.basic_insurance,//基本保险费
                //counterFee: data.order_info.commission_charge,//手续费
                //childSeat: data.order_info.services[0].unit_price,//儿童座椅
                //yesGo: data.order_info.services[1].unit_price, //不计免赔
                //childSeatID: data.order_info.services[0].services_id,
                //yesGoID: data.order_info.services[1].services_id,
                //otherStoreFee: data.other_stop_end_billing_charge//异店换车费
            };

            setData();//订单数据添加
       // }
   // });
    clickEvent();
}

//订单数据添加
function setData() {
    //车辆信息
    $(".carInfoL>img").attr({ "src": Car.img });
    $(".carInfoL>b").html("共" + Store.leaseTerm + "天");
    $(".carInfoR>h2").html(Car.brand_honda);       //车的名字
    var carIcon = $(".carIcon>a");
    carIcon.eq(0).html(Car.con);
    carIcon.eq(1).html(Car.vol);
    carIcon.eq(2).html(Car.gear);
    carIcon.eq(3).html(Car.seat_count);

    //优惠活动信息
    if (offersName && offersName.length != 0) {
        $(".discountInfo>p").hide();
        for (var i = 0; i < offersName.length; i++) {
            $(".discountInfo").append("<a>" + offersName[i] + "</a>");
        }
    }

    //取还车门店信息
    var shopInfo = $(".storeInfoR");
    shopInfo.find("h5").eq(0).html(Store.takeStore);        //取车店名
    shopInfo.find("h5").eq(1).html(Store.returnStore);      //还车点名
    shopInfo.find("a").eq(0).html(Store.takeTime);
    shopInfo.find("a").eq(1).html(Store.takeAddress);
    shopInfo.find("a").eq(2).html(Store.returnTime);
    shopInfo.find("a").eq(3).html(Store.returnAddress);

    //shopInfo.find("h5").eq(0).html('取车店名');        //取车店名
    //shopInfo.find("h5").eq(1).html('还车点名');      //还车点名
    //shopInfo.find("a").eq(0).html('取车时间');       //取车时间
    //shopInfo.find("a").eq(1).html('取车地点');      //还车时间
    //shopInfo.find("a").eq(2).html('还车时间');          //还车时间
    //shopInfo.find("a").eq(3).html('还车地点');      //还车地点

    //增值服务信息
    $("#childSeat").html(Price.childSeat + "元/日");
    $("#yesGo").html(Price.yesGo + "元/日");
    //租金信息
    $(".basicPrice>b").html(Price.rentalFee + "元");//基本租金
    if (parseInt(Price.discount) != 0) {
        $("#discount").html("(已优惠" + Price.discount + "元)");
    }//优惠金额
    addPriceDetail();//每日价格
    $("#basic>a").html("(" + Price.basic + "元*" + Store.leaseTerm + "天)");//基本保险
    $("#basic>b").html(Store.leaseTerm * Price.basic + "元");
    $("#counterFee>b").html(Price.counterFee + "元");//手续费

    //判断是否为 异店还车
    if (Price.otherStoreFee != 0) {
        $(".differentStore").show().find("b").html(Price.otherStoreFee + "元");
    }
    $("#sumPrice").html(Price.totalFee);//总金额
}

//保存订单
function orderSave(takeTime, returnTime, carId, start_id, stop_id, offers, services) {
    if (Customer && Customer.customer_id) {
        var order = {
            start_shop_id: start_id,
            stop_shop_id: stop_id,
            start_date: date_format(takeTime, "yyyy-MM-dd HH:mm"),
            stop_date: date_format(returnTime, "yyyy-MM-dd HH:mm"),
            customer_id: Customer.customer_id,
            class_id: carId,
            order_source: 2,//订单来源
            coupon: ''//优惠券
        };
        //优惠活动
        if (offers) {
            for (var i = 0; i < offers.length; i++) {
                order["offers[" + i + "]"] = offers[i];
            }
        }
        //增值服务
        if (services) {
            for (var j = 0; j < services.length; j++) {
                order["services[" + j + "]"] = services[j];
            }
        }
        //发票
        if (needBill) {
            if (billType == 1) {
                order.invoice_needed = 1;
                order.invoice_header = bill1;
            } else {
                order.invoice_needed = 2;
                order.invoice_header = bill2[0];
                order.invoice_recipient = bill2[1];
                order.invoice_tel = bill2[2];
                order.invoice_address = bill2[3];
                order.invoice_bank = bill2[4];
                order.invoice_bankno = bill2[5];
            }
        } else {
            order.invoice_needed = 0;
        }
        $.ajax({
            url: saveorder_url,
            type: "get",
            data: order,
            dataType: "jsonp",
            success: function (result) {
                if (result > 0) {
                    //创建订单成功 
                    location.href = "/home/pay?o_id=" + result;
                }
                else {
                    var id = parseInt(result / -1000);
                    result %= 1000;
                    switch (result) {
                        case -301:
                        case -302:
                            layer.alert("您已经被停用或者被禁租!创建订单失败！请联系客服 4000600112");
                            break;
                        case -305:
                            layer.alert("没有分配到合适的车辆!创建订单失败！请联系客服 4000600112");
                            break;
                        case -400:
                            layer.alert("您有已经预定/在租的订单,暂时不能下单！请联系客服 4000600112");
                            break;
                        default:
                            layer.alert("创建订单失败！错误码:" + result + "请联系客服 4000600112");
                            break;
                    }
                }
            },
            error: function () {
                alert("数据提交失败，请重新选择车型后再进行提交订单");
            }
        })
    } else {
        layer.alert("请先登录！", function () {
            location.href = "/usercenter/login";
        });
    }
}

//每日价格
function addPriceDetail() {
    var startTime = date_format(Store.takeTime, "yyyy-MM-dd"),
        html = '', day, week, day1;
    for (var i = 0; i < Store.leaseTerm; i++) {
        day1 = date_format(date_adddays(startTime, i));
        day = date_format(day1, "MM-dd");
        week = day_in_week(day1, true);
        html += "<li>" + day + "&nbsp;&nbsp;" + week + "<br/>" + detailsPrice[i] + "元"
    }
    $(".priceDetail").html(html);
}

//计算异店换车费
function differentStore() {
    var price = 0;
    $(".differentStore").show().find("b").html(price + "元");
    return price;
}

//删除数组中指定值
function removeByValue(arr, val) {
    for (var i = 0; i < arr.length; i++) {
        if (arr[i] == val) {
            arr.splice(i, 1);
            break;
        }
    }
    return arr;
}








