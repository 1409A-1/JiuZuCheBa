$(function(){
    index_Of();
    calendar();//日历
    slide();//幻灯片
    City();//城市
    $("#takeStoreList").hide();
    position();//定位、获取当前城市车型
    //baidu_lxb();//百度离线宝
});

//日历
function calendar(){
    $("#calendarLong").click(function(){
        $("#longCityList").hide();
        $("#longDurationBox").hide();
        $("#brandBox").hide();
        $("#carTypeBox").hide();
    });
    var date=new Date();
    var now_time=date_format(date,"yyyy-MM-dd");//当前日期
    var out_time=date_format(date_adddays(now_time,1),"yyyy-MM-dd");//默认取车日期
    var start=new Date(out_time).getTime();//开始日期
    var a=new Date("1980-01-02").getTime()-new Date("1970-01-02").getTime();
    var b=315507600/a;//参数
    start=start*b;

    //初始化默认日期
    $("#longDate>a").html(out_time);

    //加载日历
    var dateRange = new pickerDateRange('calendarLong', {
        isTodayValid : true,
        isSingleDay : true,//单天选择
        minValidDate:start,
        calendars : 1,
        autoSubmit : true,
        theme : 'ta',
        success : function(obj) {
            $("#longDate>a").html(obj.startDate);
        }
    });
}

//城市列表获取
function City(){
    //加载城市
    jQuery.ajax({
        url: city_list_url,
        dataType: 'jsonp',
        success: function (result) {
            var hotCity="",//热门城市
                touristCity='',//旅游城市
                letter=[];//首字母集合
            for(var i=0;i<result.length;i++)
            {
                if((result[i].city_type & 4)==4)//旅游城市
                {
                    touristCity+="<span><a>"+result[i].city_name+"</a></span>";
                }
                if((result[i].city_type & 2)==2)//热门城市
                {
                    hotCity+="<span><a>"+result[i].city_name+"</a></span>";
                }
                letter.push(result[i].city_abridge.substr(0,1));//取第一个首字母

            }
            bookCity(hotCity,touristCity,letter,result);
        }
    });
}

//城市添加
function bookCity(hotCity,touristCity,letter,result){
    var li=$(".city_list_body li");
    li.eq(0).html(hotCity);
    li.eq(1).html(touristCity);

    var data = []; //排序并去重的 首字母索引
    for(var i = 0; i < letter.length; i++){
        if (data.indexOf(letter[i]) == -1)
            data.push(letter[i]);
    }
    data.sort();//排序A-Z

    for(var j=0;j<data.length;j++){
        if(data[j]=="A"||data[j]=="B"||data[j]=="C"||data[j]=="D")
        {
            li.eq(2).append("<div class='"+data[j]+"'><b>"+data[j]+"</b></div>");
        }
        if(data[j]=="E"||data[j]=="F"||data[j]=="G"||data[j]=="H"||data[j]=="J")
        {
            li.eq(3).append("<div class='"+data[j]+"'><b>"+data[j]+"</b></div>");
        }
        if(data[j]=="K"||data[j]=="L"||data[j]=="M"||data[j]=="N"||data[j]=="P"||data[j]=="Q")
        {
            li.eq(4).append("<div class='"+data[j]+"'><b>"+data[j]+"</b></div>");
        }
        if(data[j]=="R"||data[j]=="S"||data[j]=="T"||data[j]=="W")
        {
            li.eq(5).append("<div class='"+data[j]+"'><b>"+data[j]+"</b></div>");
        }
        if(data[j]=="X"||data[j]=="Y"||data[j]=="Z")
        {
            li.eq(6).append("<div class='"+data[j]+"'><b>"+data[j]+"</b></div>");
        }
    }

    for(var k=0;k<result.length;k++)
    {
        $("."+letter[k]+"").append("<span><a>"+result[k].city_name+"</a></span>");
    }

    book();//长租
}


//预订事件
function book(){
    var longCity=$("#longCity"),
        li=longCity.find("li"),
        longDate=$("#longDate"),
        brand=$("#brand"),
        carType=$("#carType"),
        longCityList=$("#longCityList"),
        longDuration=$("#longDuration"),
        longDurationBox=$("#longDurationBox"),
        brandBox=$("#brandBox"),
        carTypeBox=$("#carTypeBox"),
        calendar=$(".ta_calendar");

    //城市分类选择
    var tit=longCity.find(".city_list_tit a");
    tit.hover(function(){
        tit.css({"color":"#24354b"});
        $(this).css({"color":"#EA5506"});
        var w=$(this).width(),
            left=$(this).position().left;
        longCity.find(".city_list_arrow").css({"left":left+w/2});
        var n=tit.index($(this));
        li.hide().eq(n).show();
        $(".city_list_body").show();
    });

    //城市列表
    longCity.find(".show").click(function(e){
        e.stopPropagation();

        if(longCityList.height()=="100")
            li.eq(0).show();//默认显示热门城市
        longDurationBox.hide();
        brandBox.hide();
        carTypeBox.hide();
        calendar.hide();
        $(".city_list_body").show();
        longCityList.fadeToggle("fast");
        if ($(this).find(".Arrow").hasClass('ArrowHover')) {
            $(this).find(".Arrow").removeClass('ArrowHover');
        }else{
            $(this).find(".Arrow").addClass('ArrowHover');
        }
        longDate.find(".Arrow").removeClass('ArrowHover');
        longDuration.find(".Arrow").removeClass('ArrowHover');
        brand.find(".Arrow").removeClass('ArrowHover');
        carType.find(".Arrow").removeClass('ArrowHover');
    });

    //城市选择
    city_store("武汉市", 0);
    longCity.find(".city_list_body a").click(function(){
        longCity.find(".show a").html($(this).html());
        longCityList.fadeToggle("fast");
        Brand($(this).html());
        longCity.find(".Arrow").removeClass('ArrowHover');
        city_store($(this).html(), 1);
    });

    //门店列表
    $(".longLine1_R").find(".show").click(function (e) {
        e.stopPropagation();
        if ($(this).find(".Arrow").hasClass('ArrowHover')) {
            $(this).find(".Arrow").removeClass('ArrowHover');
        } else {
            $(this).find(".Arrow").addClass('ArrowHover');
        }

        longCity.find(".Arrow").removeClass('ArrowHover');
        $("#longCityList").hide();
        $("#takeStoreList").fadeToggle("fast");

        if ($("#takeStoreList").find(".store").height() == 0) {
            $("#takeStoreList").find(".store ul").eq(0).show();
            $("#takeStoreList").find(".area a").eq(0).click();
        }
    });

    

    

        

        //点击空白处关闭
        $(document).click(function (e) {
            var target = $(e.target);
            if (target.closest(".city_list_body").length == 0) {
                $("#longCityList").fadeOut("fast");
                $(".city_list_body").fadeOut("fast");
            }
            if (target.closest("#takeStoreList").length == 0) {
                $("#takeStoreList").fadeOut("fast");
            }
            $(".Arrow").removeClass('ArrowHover');
        });

        //查看门店位置
        $(".toMap").click(function () {
            var temp = $(this).attr("out_in"), store;
            if (temp == "0") {
                store = $(".longLine1_R").find(".store a");
            }
            var id = $(this).attr("storeID"), name, lng, lat;
            for (var i = 0; i < store.length; i++) {
                if (id == store.eq(i).attr("store_id")) {
                    store.eq(i).click();
                    name = store.eq(i).html();
                    lng = store.eq(i).attr("lng");
                    lat = store.eq(i).attr("lat");
                    layer.open({
                        type: 1,
                        scrollbar: false,
                        area: '1000px',
                        shade: [0.8, '#000'],
                        title: false,
                        content: $("#storeMap")
                    });
                    storeMap(lng, lat, id, name);
                    break;
                }
            }
        });


    //租期
    longDuration.find(".show").click(function(e){
        e.stopPropagation();
        longCityList.hide();
        brandBox.hide();
        carTypeBox.hide();
        calendar.hide();
        longDurationBox.slideToggle("fast");
        if ($(this).find(".Arrow").hasClass('ArrowHover')) {
            $(this).find(".Arrow").removeClass('ArrowHover');
        }else{
            $(this).find(".Arrow").addClass('ArrowHover');
        }
        longCity.find(".Arrow").removeClass('ArrowHover');
        longDate.find(".Arrow").removeClass('ArrowHover');
        brand.find(".Arrow").removeClass('ArrowHover');
        carType.find(".Arrow").removeClass('ArrowHover');
    });
    longDuration.find("li").click(function(){
        longDuration.find(".show>a").html($(this).html());
        longDurationBox.slideToggle("fast");
    });

    brand.find(".show").click(function(e){
        e.stopPropagation();
        longCityList.hide();
        longDurationBox.hide();
        carTypeBox.hide();
        calendar.hide();
        brandBox.slideToggle("fast");
        if ($(this).find(".Arrow").hasClass('ArrowHover')) {
            $(this).find(".Arrow").removeClass('ArrowHover');
        }else{
            $(this).find(".Arrow").addClass('ArrowHover');
        }
        longCity.find(".Arrow").removeClass('ArrowHover');
        longDate.find(".Arrow").removeClass('ArrowHover');
        longDuration.find(".Arrow").removeClass('ArrowHover');
        carType.find(".Arrow").removeClass('ArrowHover');
    });

    //车型
    carType.find(".show").click(function(e){
        e.stopPropagation();
        longCityList.hide();
        longDurationBox.hide();
        brandBox.hide();
        calendar.hide();
        carTypeBox.slideToggle("fast");
        if ($(this).find(".Arrow").hasClass('ArrowHover')) {
            $(this).find(".Arrow").removeClass('ArrowHover');
        }else{
            $(this).find(".Arrow").addClass('ArrowHover');
        }
        longCity.find(".Arrow").removeClass('ArrowHover');
        longDate.find(".Arrow").removeClass('ArrowHover');
        longDuration.find(".Arrow").removeClass('ArrowHover');
        brand.find(".Arrow").removeClass('ArrowHover');
    });

    //预订按钮
    $("#longBook").click(function(){
        $(this).find("i").addClass("active");
        setTimeout(function(){
            $("#longBook").find("i").removeClass("active");
        },1000);
        var input=$("#carNumber").find("input"),
            city=$("#longCity").find(".show a").html(),
            date=$("#longDate").find("a").html(),
            duration=$("#longDuration").find(".show a").html(),
            carNum=input.val(),
            car_brand=$("#brand").find(".show a").html(),
            car_type=$("#carType").find(".show a").html(),
            brand_id=$("#carType").find(".show a").attr("brand_id"),
            type_id=$("#carType").find(".show a").attr("type_id"),
            num=/[\d]/;        //匹配数字

        input.removeClass("error");

        if (carNum) {
            if(num.test(carNum)){
                layer.open({
                    type: 1,
                    area: ['520px', '410px'],
                    scrollbar: false,
                    shade: [0.8, '#000'],
                    title: '联系信息',
                    content: $(".longRentApply")
                });
                apply();
            }else{
                input.addClass("error").val("");
                input.attr({"placeholder":"请输入数字"}).focus();
            }
        }
        else{
            input.addClass("error").focus();
        }
    });

    $("#carNumber").find("input").focus(function(){
        $(this).bind('keyup', function(){
            $(this).removeClass("error");
        });
    });

}

//门店信息 加载
function city_store(cityName, temp) {
    //temp：
    // 1为取车
    // 0为初始化加载
    jQuery.ajax({
        url: district_shop_list_url,
        dataType: 'jsonp',
        data: { "city_name": cityName },
        success: function (result) {
            switch (temp) {
                case 0: {
                    storeLoad(result);
                } break;
                case 1: {
                    takeStore(result);
                } break;
            }
        }
    });
}

//初始化
function storeLoad(result) {
    var id = [], area = [], address = [], start = [], end = [], traffic = [], name = [], data = [], lng = [], lat = [],
      startHours, endHours, t1, t2, html = "";
    //获取数据
    for (var i = 0; i < result.length; i++) {
        t1 = result[i].start_work_date;
        t2 = result[i].stop_work_date;
        id[i] = result[i].id;
        area[i] = result[i].district;
        address[i] = result[i].street;
        start[i] = t1.substr(11, 5);
        end[i] = t2.substr(11, 5);
        traffic[i] = result[i].traffic_line;
        name[i] = result[i].structure_name;
        lng[i] = result[i].latitude;
        lat[i] = result[i].longitude;
    }
    for (var j = 0; j < area.length; j++) {
        if (data.indexOf(area[j]) == -1) data.push(area[j]);
    }
    //添加区域
    for (var k = 0; k < data.length; k++) {
        html += "<a>" + data[k] + "</a>";
        $(".store").append("<ul></ul>");
    }
    $(".area").html(html);
    //添加门店
    for (var l = 0; l < area.length; l++) {
        for (var m = 0; m < data.length; m++) {
            if (area[l] == data[m]) {
                html = "<li><a store_id='" + id[l] + "' num='" + l + "' lng='" + lng[l] + "' lat='" + lat[l] + "'>" + name[l] + "</a></li>";
                $(".store ul").eq(m).append(html);
            }
        }
    }



    //默认门店初始化
    var defaultStore = $(".longLine1_R .store a").eq(0);
    $(".longLine1_R .show>a").html(defaultStore.html()).attr({
        "store_id": defaultStore.attr("store_id"),
        "lng": defaultStore.attr("lng"),
        "lat": defaultStore.attr("lat")
    });

    load_autoclass(defaultStore.attr("store_id"));

    //区域点击
    $(".longLine1_R .area a").click(function () {
        $(".longLine1_R .area a").removeClass("active");
        $(this).addClass("active");
        var m = $(".longLine1_R .area a").index($(this));
        $(".longLine1_R .store ul").hide().eq(m).show();
        $(".longLine1_R .store ul").eq(m).find("a").eq(0).addClass("active");
        var n = $(".longLine1_R .store ul").eq(m).find("a").eq(0).attr("num");
        $(".longLine1_R .storeAddress").html(address[n]);
        $(".longLine1_R .storeTime").html(start[n] + "—" + end[n]);
        $(".longLine1_R .storeWay").html(traffic[n]);
        $(".longLine1_R .toMap").attr({ "storeID": id[n], "out_in": 0 });
    });


    //初始化 默认门店信息
    $(".longLine1_R .area a").eq(0).click();



    //取车门店
    $(".longLine1_R .store a").hover(function () {
        $(".longLine1_R .store a").removeClass("active");
        $(this).addClass("active");
        var n = $(this).attr("num");
        $(".longLine1_R .storeAddress").html(address[n]);
        $(".longLine1_R .storeTime").html(start[n] + "—" + end[n]);
        $(".longLine1_R .storeWay").html(traffic[n]);
        $(".longLine1_R .toMap").attr({ "storeID": id[n], "out_in": 0 });
        startHours = start[n];
        endHours = end[n];
    }).click(function () {
        $(".longLine1_R .show>a").html($(this).html()).attr({
            "store_id": $(this).attr("store_id"),
            "lng": $(this).attr("lng"),
            "lat": $(this).attr("lat")
        });
        $(".longLine1_R .store_list").hide();
    });
}

//取车
function takeStore(result) {
    var id1 = [], area1 = [], address1 = [], start1 = [], end1 = [], traffic1 = [], name1 = [], data1 = [], lng1 = [], lat1 = [],
      startHours, endHours, t1, t2, html = "";
    $(".longLine1_R .store").html("");
    //获取数据
    for (var i = 0; i < result.length; i++) {
        t1 = result[i].start_work_date;
        t2 = result[i].stop_work_date;
        id1[i] = result[i].id;
        area1[i] = result[i].district;
        address1[i] = result[i].street;
        start1[i] = t1.substr(11, 5);
        end1[i] = t2.substr(11, 5);
        traffic1[i] = result[i].traffic_line;
        name1[i] = result[i].structure_name;
        lng1[i] = result[i].latitude;
        lat1[i] = result[i].longitude;
    }
    for (var j = 0; j < area1.length; j++) {
        if (data1.indexOf(area1[j]) == -1) data1.push(area1[j]);
    }
    //添加区域
    for (var k = 0; k < data1.length; k++) {
        html += "<a>" + data1[k] + "</a>";
        $(".longLine1_R .store").append("<ul></ul>");
    }
    $(".area").html(html);
    //添加门店
    for (var l = 0; l < area1.length; l++) {
        for (var m = 0; m < data1.length; m++) {
            if (area1[l] == data1[m]) {
                html = "<li><a store_id='" + id1[l] + "' num='" + l + "' lng='" + lng1[l] + "' lat='" + lat1[l] + "'>" + name1[l] + "</a></li>";
                $(".longLine1_R .store ul").eq(m).append(html);
            }
        }
    }
    //默认显示门店
    var defaultStore = $(".longLine1_R .store a").eq(0);
    $(".longLine1_R .show>a").html(defaultStore.html()).attr({
        "store_id": defaultStore.attr("store_id"),
        "lng": defaultStore.attr("lng"),
        "lat": defaultStore.attr("lat")
    });
    //区域点击
    $(".longLine1_R .area a").click(function () {
        $(".area a").removeClass("active");
        $(this).addClass("active");
        var m = $(".longLine1_R .area a").index($(this));
        $(".longLine1_R .store ul").hide().eq(m).show();

        $(".longLine1_R .store ul").eq(m).find("a").eq(0).addClass("active");
        var n = $(".longLine1_R .store ul").eq(m).find("a").eq(0).attr("num");
        $(".longLine1_R .storeAddress").html(address1[n]);
        $(".longLine1_R .storeTime").html(start1[n] + "—" + end1[n]);
        $(".longLine1_R .storeWay").html(traffic1[n]);
        $(".longLine1_R .toMap").attr({ "storeID": id1[n], "out_in": 0 });
    });

    //初始化 默认门店信息
    $(".longLine1_R .area a").eq(0).click();

    //取车门店
    $(".longLine1_R .store a").hover(function () {
        $(".longLine1_R .store a").removeClass("active");
        $(this).addClass("active");
        var n = $(this).attr("num");
        $(".longLine1_R .storeAddress").html(address1[n]);
        $(".longLine1_R .storeTime").html(start1[n] + "—" + end1[n]);
        $(".longLine1_R .storeWay").html(traffic1[n]);
        $(".longLine1_R .toMap").attr({ "storeID": id1[n], "out_in": 0 });
        startHours = start1[n];
        endHours = end1[n];
    }).click(function () {
        $(".longLine1_R .show>a").html($(this).html()).attr({
            "store_id": $(this).attr("store_id"),
            "lng": $(this).attr("lng"),
            "lat": $(this).attr("lat")
        });
        $(".longLine1_R .store_list").hide();
        load_autoclass($(".longLine1_R .show a").attr("store_id"));
    });
}

function save(name, mobile, city, duration, carNum, type_id, date) {
        $.ajax({
            url: long_rent_url,
            data: {
                "contact_name": name,
                "contact_tel": mobile,
                "city_name": city,
                "rent_month_count": duration,
                "auto_count": carNum,
                "contact_class_id": type_id,
                "start_date": date,
                "start_shop_id": $(".longLine1_R .show a").attr("store_id")
            },
            dataType: "jsonp",
            type: "get",
            success: function (result) {
                if (result>0) {
                    layer.alert("提交成功,我们将在1个工作日内联系您.");
                    setTimeout(function () { location.reload() }, 2000);
                } else {
                    layer.alert("提交失败,请致电4000600112电话预定.");
                }
            }
        })
}

//定位当前城市
function position(){
    $.getScript('http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=js', function(_result) {
        var city="武汉市";
        if (remote_ip_info.ret == '1') {
            city = remote_ip_info.city + '市';
        }
        Brand(city);
    });
}

var carList;
//品牌
function Brand(city) {
        jQuery.ajax({
            url: district_shop_list_url,
            dataType: 'jsonp',
            data: { "city_name": city },
            success: function (result) {
                var id1 = [], area1 = [], address1 = [], start1 = [], end1 = [], traffic1 = [], name1 = [], data1 = [], lng1 = [], lat1 = [],
    startHours, endHours, t1, t2, html = "";
                $("#takeStore .store").html("");
                //获取数据
                for (var i = 0; i < result.length; i++) {
                    t1 = result[i].start_work_date;
                    t2 = result[i].stop_work_date;
                    id1[i] = result[i].id;
                    area1[i] = result[i].district;
                    address1[i] = result[i].street;
                    start1[i] = t1.substr(11, 5);
                    end1[i] = t2.substr(11, 5);
                    traffic1[i] = result[i].traffic_line;
                    name1[i] = result[i].structure_name;
                    lng1[i] = result[i].latitude;
                    lat1[i] = result[i].longitude;
                }
                for (var j = 0; j < area1.length; j++) {
                    if (data1.indexOf(area1[j]) == -1) data1.push(area1[j]);
                }
                //添加区域
                for (var k = 0; k < data1.length; k++) {
                    html += "<a>" + data1[k] + "</a>";
                    $("#takeStore .store").append("<ul></ul>");
                }
                $("#takeStore .area").html(html);
                //添加门店
                for (var l = 0; l < area1.length; l++) {
                    for (var m = 0; m < data1.length; m++) {
                        if (area1[l] == data1[m]) {
                            html = "<li><a store_id='" + id1[l] + "' num='" + l + "' lng='" + lng1[l] + "' lat='" + lat1[l] + "'>" + name1[l] + "</a></li>";
                            $("#takeStore .store ul").eq(m).append(html);
                        }
                    }
                }
                //默认显示门店
                var defaultStore = $("#takeStore .store a").eq(0);
                $("#takeStore .show>a").html(defaultStore.html()).attr({
                    "store_id": defaultStore.attr("store_id"),
                    "lng": defaultStore.attr("lng"),
                    "lat": defaultStore.attr("lat")
                });
                //区域点击
                $("#takeStore .area a").click(function () {
                    $(".area a").removeClass("active");
                    $(this).addClass("active");
                    var m = $("#takeStore .area a").index($(this));
                    $("#takeStore .store ul").hide().eq(m).show();

                    $("#takeStore .store ul").eq(m).find("a").eq(0).addClass("active");
                    var n = $("#takeStore .store ul").eq(m).find("a").eq(0).attr("num");
                    $("#takeStore .storeAddress").html(address1[n]);
                    $("#takeStore .storeTime").html(start1[n] + "—" + end1[n]);
                    $("#takeStore .storeWay").html(traffic1[n]);
                    $("#takeStore .toMap").attr({ "storeID": id1[n], "out_in": 0 });
                });
            }
        })
}

//车型
function carType(opt_brand){
    var car=[],car1=[],car2=[],car3=[],car4=[],brand_id=[],type_id=[],html="";
    for(var i=0;i<carList.length;i++)
    {
        car.push(carList[i].brand.brand_name);//品 牌
        car1.push(carList[i].honda);     //车 型
        car2.push(carList[i].body_construction); //厢 数
        car3.push(carList[i].let_litre);  //排 量
        car4.push(carList[i].gearbox);    //手、自动
        brand_id.push(carList[i].brand_id);
        type_id.push(carList[i].class_id);
        if(car[i]==opt_brand)
        {
            html+="<li><a brand_id='"+brand_id[i]+"' type_id='"+type_id[i]+"'>"+
                car1[i]+" / "+car2[i]+" / "+car3[i]+" / "+car4[i]+"</a></li>";
        }
    }
    $("#carTypeBox ul").html(html);
    var load=$("#carTypeBox a").eq(0);
    $("#carType .show>a").attr({
        "brand_id":load.attr("brand_id"),
        "type_id":load.attr("type_id")
    }).html(load.html());
    //车型选择
    $("#carTypeBox a").click(function(){
        $("#carType .show>a").html($(this).html()).attr({
            "brand_id":$(this).attr("brand_id"),
            "type_id":$(this).attr("type_id")
        });
        $("#carTypeBox").slideUp("fast");
    });
}

//申请信息验证
function apply() {
    var company = $("#company"),
        name = $("#name"),
        tel = $("#tel"),
        email = $("#email"),
        nameReg = /^([\u4e00-\u9fa5]+|([a-z]+\s?)+)$/,
        telReg = /^0?(13[0-9]|14[0-9]|15[0-9]|16[0-9]|17[0-9]|18[0-9]|19[0-9])[0-9]{8}$/,
        city = $("#longCity").find(".show a").html(),
        date = $("#longDate").find("a").html(),
        duration = $("#longDuration").find(".show a").html(),
        carNum = $("#carNumber").find("input").val(),
        type_id = $("#carType").find(".show a").attr("type_id");

    $("#submit").click(function () {
        if (name.val() == '') {
            name.focus();
            layer.tips('姓名不能为空', '#submit', { tips: [3, '#0FA6D8'] });
        } else {
            if (nameReg.test(name.val())) {
                if (tel.val() == '') {
                    tel.focus();
                    layer.tips('手机号不能为空', '#submit', { tips: [3, '#0FA6D8'] });
                } else {
                    if (telReg.test(tel.val())) {
                        save(name.val(), tel.val(), city, duration, carNum, type_id, date);
                    } else {
                        tel.focus();
                        layer.tips('手机号格式不正确', '#submit', { tips: [3, '#0FA6D8'] });
                    }
                }
            } else {
                name.focus();
                layer.tips('姓名请输入中文', '#submit', { tips: [3, '#0FA6D8'] });
            }
        }
    });
    if ($.browser.msie && ($.browser.version == "8.0" || "9.0")) {
        company.val("请输入企业名称 或 个人名称")
            .focus(function () {
                if ($(this).val() == "请输入企业名称 或 个人名称") {
                    $(this).val("")
                }
            })
            .blur(function () {
                if ($(this).val() == "") {
                    $(this).val("请输入企业名称 或 个人名称")
                }
            });
        name.val("请输入联系人姓名")
            .focus(function () {
                if ($(this).val() == "请输入联系人姓名") {
                    $(this).val("")
                }
            })
            .blur(function () {
                if ($(this).val() == "") {
                    $(this).val("请输入联系人姓名")
                }
            });
        tel.val("请输入联系人电话")
            .focus(function () {
                if ($(this).val() == "请输入联系人电话") {
                    $(this).val("")
                }
            })
            .blur(function () {
                if ($(this).val() == "") {
                    $(this).val("请输入联系人电话")
                }
            });
        email.val("请输入您的Email地址")
            .focus(function () {
                if ($(this).val() == "请输入您的Email地址") {
                    $(this).val("")
                }
            })
            .blur(function () {
                if ($(this).val() == "") {
                    $(this).val("请输入您的Email地址")
                }
            });
    }
}

//门店地图 查看
function storeMap(lng, lat, id, name) {
    var storePoint = new BMap.Point(lng, lat),
      mapIcon = new BMap.Icon("/content/images/index/map.png", new BMap.Size(25, 35)),
      storeMarker = new BMap.Marker(storePoint, { icon: mapIcon });
    var map = new BMap.Map("storeMap");
    map.centerAndZoom(storePoint, 20);
    map.enableScrollWheelZoom(true);
    map.addOverlay(storeMarker);
    //添加地图标注 点击 打开窗口信息
    var infoWindow, url, html;
    url = "http://www.dafang24.com/home/doom?shop_id=" + id;
    html = "<div class='box' id='" + id + "'>" +
      "<a class='title' href='" + url + "'>大方租车 " + name + "</a>" +
      "<a class='comments' href='#" + id + "'>查看评论</a>" +
      "<a class='toStore' href='" + url + "'>立 即 订 车<i></i></a>" +
      "<div class='nav'><div class='toHere active'>" +
      "<i class='iconMap icon_M2'></i>到这里去</div>" +
      "<div class='goHere'>从这里出发<i class='iconMap icon_M4'></i></div>" +
      "<div class='find'>在附近找<i class='iconMap icon_M5'></i></div></div>" +
      "<div class='navBox'><div class='to'>" +
      "<input type='text' placeholder='请输入起点' class='place'>" +
      "<input type='button' value='驾车' class='car'>" +
      "<input type='button' value='公交' class='bus'></div>" +
      "<div class='go'>" +
      "<input type='text' placeholder='请输入终点' class='place'>" +
      "<input type='button' value='驾车' class='car'>" +
      "<input type='button' value='公交' class='bus'></div>" +
      "<div class='search'>" +
      "<input type='text' placeholder='请输入您要查找的地方' class='place'>" +
      "<input type='button' value='搜索' class='seaBut'></div></div>" +
      "</div>";
    infoWindow = new BMap.InfoWindow(html); // 创建信息窗口对象
    addClickHandler(storeMarker, storePoint, infoWindow, id);//开启信息窗口

    //标注 点击
    function addClickHandler(storeMarker, storePoint, infoWindow) {
        storeMarker.addEventListener("click", function () {
            map.openInfoWindow(infoWindow, storePoint); //开启信息窗口
            nav(storePoint);//导航
        });
    }

    //导航
    function nav(point) {
        var title = $(".nav>div"), body = $(".navBox>div"), n;
        //功能切换
        $(".toHere").click(function () {
            title.removeClass("active");
            $(this).addClass("active").
              find("i").removeClass("icon_M3").addClass("icon_M2");
            title.eq(1).find("i").removeClass("icon_M2").addClass("icon_M4");
            title.eq(2).find("i").removeClass("icon_M6").addClass("icon_M5");
            n = title.index($(this));
            body.hide().eq(n).show();
        });
        $(".goHere").click(function () {
            title.removeClass("active");
            $(this).addClass("active").
              find("i").removeClass("icon_M4").addClass("icon_M2");
            title.eq(0).find("i").removeClass("icon_M2").addClass("icon_M3");
            title.eq(2).find("i").removeClass("icon_M6").addClass("icon_M5");
            n = title.index($(this));
            body.hide().eq(n).show();
        });
        $(".find").click(function () {
            title.removeClass("active");
            $(this).addClass("active").
              find("i").removeClass("icon_M5").addClass("icon_M6");
            title.eq(0).find("i").removeClass("icon_M2").addClass("icon_M3");
            title.eq(1).find("i").removeClass("icon_M2").addClass("icon_M4");
            n = title.index($(this));
            body.hide().eq(n).show();
        });
        var dom = $("#storeMap"),
          start, end, search;
        //到这里去
        dom.find(".to .car").click(function () {
            start = dom.find(".to .place").val();//输入起点
            var driving = new BMap.DrivingRoute(map,
              {
                  renderOptions: {
                      map: map,
                      panel: "way",
                      autoViewport: true
                  }, policy: 1
              });
            driving.search(start, point);
        });
        dom.find(".to .bus").click(function () {
            start = dom.find(".to .place").val();
            var transit = new BMap.TransitRoute(map, {
                renderOptions: { map: map }
            });
            transit.search(start, point);
        });
        //从这里出发
        dom.find(".go .car").click(function () {
            end = dom.find(".go .place").val();//输入终点
            var driving = new BMap.DrivingRoute(map, { renderOptions: { map: map, autoViewport: true }, policy: 1 });
            driving.search(point, end);
        });
        dom.find(".go .bus").click(function () {
            end = dom.find(".go .place").val();
            var transit = new BMap.TransitRoute(map, {
                renderOptions: { map: map }
            });
            transit.search(point, end);
        });
        //搜索
        dom.find(".seaBut").click(function () {
            var local = new BMap.LocalSearch(map, {
                renderOptions: {
                    map: map,
                    autoViewport: false
                }
            });
            search = dom.find(".search .place").val();
            local.searchNearby(search, point, 1000);
            map.setZoom(16);//放大地图
        });
    }
}

function load_autoclass(shop_id) {
    var html="";
    jQuery.ajax({
        url: shopCarType,
        dataType: 'jsonp',
        data: { shop_id: shop_id },
        success: function (result) {
            carList=result;
            var brand=[];
            for(var i=0;i<result.length;i++)
            {
                brand.push(result[i].brand.brand_name);
            }
            var data = []; //去重
            for(var j = 0; j < brand.length; j++){
                if (data.indexOf(brand[j]) == -1)
                    data.push(brand[j]);
            }

            for(var k=0;k<data.length;k++){
                html+="<li><a>"+data[k]+"</a></li>";//品牌名称
            }
            $("#brandBox ul").html(html);

            //品牌选择
            $("#brandBox a").click(function(){
                var opt_brand=$(this).html();
                $("#brand .show>a").html(opt_brand);
                $("#brandBox").slideUp("fast");
                carType(opt_brand);
            });
            //车型初始化
            $("#brandBox a").eq(0).click();
        }
    });
}