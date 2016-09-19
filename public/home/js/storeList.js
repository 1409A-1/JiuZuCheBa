var _token = $('meta[name="_token"]').attr('content');
var NUM= 0,haveID=false;
if(CityName && CityName != ''){
    haveID=true;
}
$(function(){
    index_Of();
    loadCity(); //城市 加载
    //是否有指定城市
    if(haveID){
        // jQuery.ajax({
        //     url: city_info_code_url,
        //     dataType: 'jsonp',
        //     type: "get",
        //     data: { "city_id": CityName },
        //     success: function (result) {
        //         $("#city").html(result.city_name);
        //         add_marker(result.city_name);
        //     }
        // })
        $("#city").html(CityName + '市');
        add_marker(CityName);
    }else{
        position(); //定位
    }

    $("#map").height($(window).height()-28);
});

//定位 坐标
function position(){
    var geolocation = new BMap.Geolocation();
    geolocation.getCurrentPosition(function(r){//百度地图 浏览器定位
        if(this.getStatus() == BMAP_STATUS_SUCCESS){
            initMap(r.point);
        }
        else
        {
            layer.alert('failed'+this.getStatus());
        }
    },{enableHighAccuracy: true});
}

var map,mapIcon;
//百度地图
function initMap(point){
    map = new BMap.Map("map");// 初始化地图
    map.centerAndZoom(point, 11);     // 设置中心点坐标和地图级别,point为定位地点
    mapIcon = new BMap.Icon("home/images/map.png", new BMap.Size(25, 35));//门店标注样式
    map.enableScrollWheelZoom(true);  //开启鼠标滚轮缩放
    city_name(point);//获取 定位 城市
}

//定位 城市
function city_name(point){
    var geoc = new BMap.Geocoder();//根据定位点坐标 获取具体地址
    geoc.getLocation(point, function(rs){
        var location_city=rs.addressComponents.city;//当前定位所在城市
        add_marker(location_city); //添加门店标注
        //获取门店
    });
}

//添加 门店 标注，获取 门店 信息
function add_marker(location_city){
    jQuery.ajax({
        // url: district_shop_list_url,
        // dataType: 'jsonp',
        url: server,
        dataType: 'json',
        type: 'post',
        data:{"city_name":location_city, "_token":_token},
        success: function (result) {
            var pointCenter=new BMap.Point(result[0].coordinate.split(',')[0], result[0].coordinate.split(',')[1]);
            if(haveID){
                map = new BMap.Map("map");// 初始化地图
                map.centerAndZoom(pointCenter, 11);
                mapIcon = new BMap.Icon("home/images/map.png", new BMap.Size(25, 35));//门店标注样式
                map.enableScrollWheelZoom(true);  //开启鼠标滚轮缩放
                haveID=false;
            }else{
                map.clearOverlays();
                map.centerAndZoom(pointCenter, 11);//设置当前城市第一个门店为中心点
            }
            storeLoad(result);//门店加载
            for(var i=0;i<result.length;i++){
                //获取门店信息
                // var t1=result[i].start_work_date,
                //     t2=result[i].stop_work_date,
                //     id =result[i].id,
                //     address=result[i].street,
                //     start=t1.substr(11,5),
                //     end=t2.substr(11,5),
                //     traffic=result[i].traffic_line,
                //     name=result[i].structure_name,
                //     lat=result[i].latitude,//经度
                //     lon=result[i].longitude;//纬度
                var t1 = '2016-09-05'; // 取车日期
                    t2 = '2016-09-05'; // 还车日期
                    id = result[i].server_id; // 门店id
                    area = result[i].district; // 地区
                    address = result[i].street; // 街道信息
                    start = '08:00'; // 取车时间
                    end = '22:00'; // 还车时间
                    traffic = result[i].traffic_line; // 交通路线
                    name = result[i].server_name; // 门店名
                    lon = result[i].coordinate.split(',')[0]; // 经度
                    lat = result[i].coordinate.split(',')[1]; // 维度
                if(traffic==null){
                    traffic="";
                }

                //添加当前城市门店标注
                var storePoint= new BMap.Point(lon, lat),
                    storeMarker,infoWindow,
                    url="short?shop_id="+id,
                    html="<div class='box' id='"+id+"'>" +
                        "<a class='title' href='"+url+"'>就租车吧 "+name+"</a>" +
                        "<a class='comments' href='/home/appraise/"+id+"'>查看评论</a>" +
                        "<p class='address'>"+address+"</p>" +
                        "<div class='time'>营业时间：" + start + " - " + end + "</div>" +
                        "<div class='traffic'>交通路线：<br/>" + traffic + "</div>" +
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

                storeMarker= new BMap.Marker(storePoint,{icon: mapIcon});
                map.addOverlay(storeMarker);

                addClickHandler(storeMarker,storePoint,infoWindow,id);//开启信息窗口
            }
        }
    });
}

//标注 点击
function addClickHandler(storeMarker,storePoint,infoWindow,id){
    var dom=$("."+id+"");
    dom.click(function(){
        $(".store li").removeClass("active");
        $(this).addClass("active");
        map.openInfoWindow(infoWindow,storePoint); //开启信息窗口
        $(".storeInfo a").html($(this).html());
        $(".storeInfo p").html($(this).attr("address"));
        nav(storePoint,id);//导航

        var lng=parseFloat($(this).attr("lng")),
            lat=parseFloat($(this).attr("lat"));
        lat+=0.01;//使 地图中心点下移
        var point=new BMap.Point(lng,lat);
        map.centerAndZoom(point, 15);
    });
    storeMarker.addEventListener("click",function() {
        NUM=0;
        $(".area a").eq(dom.attr("m")).click();
        dom.click();
    });
}

//导航
function nav(point,id){
    var title=$(".nav>div"),
        body=$(".navBox>div"),
        n;
    //功能切换
    $(".toHere").click(function(){
        title.removeClass("active");
        $(this).addClass("active").
            find("i").removeClass("icon_M3").addClass("icon_M2");
        title.eq(1).find("i").removeClass("icon_M2").addClass("icon_M4");
        title.eq(2).find("i").removeClass("icon_M6").addClass("icon_M5");

        n=title.index($(this));
        body.hide().eq(n).show();
    });
    $(".goHere").click(function(){
        title.removeClass("active");
        $(this).addClass("active").
            find("i").removeClass("icon_M4").addClass("icon_M2");
        title.eq(0).find("i").removeClass("icon_M2").addClass("icon_M3");
        title.eq(2).find("i").removeClass("icon_M6").addClass("icon_M5");

        n=title.index($(this));
        body.hide().eq(n).show();
    });
    $(".find").click(function(){
        title.removeClass("active");
        $(this).addClass("active").
            find("i").removeClass("icon_M5").addClass("icon_M6");
        title.eq(0).find("i").removeClass("icon_M2").addClass("icon_M3");
        title.eq(1).find("i").removeClass("icon_M2").addClass("icon_M4");

        n=title.index($(this));
        body.hide().eq(n).show();
    });

    var dom=$("#"+id+""),
        start,end,search;

    //到这里去
    dom.find(".to .car").click(function(){
        //map.clearOverlays();
        start=dom.find(".to .place").val();//输入起点
        var driving = new BMap.DrivingRoute(map,
            {renderOptions:{
                map: map,
                panel: "way",
                autoViewport: true},policy: 1});
        driving.search(start,point);
    });//驾车
    dom.find(".to .bus").click(function(){
        //map.clearOverlays();
        start=dom.find(".to .place").val();
        var transit = new BMap.TransitRoute(map, {
            renderOptions: {map: map}
        });
        transit.search(start,point);
    });//公交

    //从这里出发
    dom.find(".go .car").click(function(){
        //map.clearOverlays();
        end=dom.find(".go .place").val();//输入终点
        var driving = new BMap.DrivingRoute(map, {renderOptions:{map: map, autoViewport: true},policy: 1});
        driving.search(point,end);
    });
    dom.find(".go .bus").click(function(){
        //map.clearOverlays();
        end=dom.find(".go .place").val();
        var transit = new BMap.TransitRoute(map, {
            renderOptions: {map: map}
        });
        transit.search(point,end);
    });

    //搜索
    dom.find(".seaBut").click(function(){
        var local = new BMap.LocalSearch(map, {
            renderOptions:{
                map: map,
                autoViewport: false
            }
        });
        search=dom.find(".search .place").val();
        local.searchNearby(search,point,1000);
        map.setZoom(16);//放大地图
    });
}

//城市 加载
function loadCity(){
    $.post(getCityList, {'_token': _token}, function(result){
        var hotCity = "",//热门城市
            touristCity = '',//旅游城市
            letter = [];//首字母集合
        for (var i = 0; i < result.length; i++) {
            if (result[i].city_type == 1)//旅游城市
            {
                touristCity += "<span><a>" + result[i].city_name + "</a></span>";
            }

            if (result[i].city_type == 2)//热门城市
            {
                hotCity += "<span><a>" + result[i].city_name + "</a></span>";
            }

            //取第一个首字母
            letter.push(result[i].city_abridge.substr(0, 1));//取第一个首字母

        }
        addCity(hotCity,touristCity,letter,result);//城市 添加
    }, 'json');
}

//城市 添加
function addCity(hotCity,touristCity,letter,result){
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

    for(var k=0;k<result.length;k++){
        $("."+letter[k]+"").append("<span><a id='"+result[k].city_id+"'>"+result[k].city_name+"</a></span>");
    }

    choiceCity();//城市选择
}

//城市 选择
function choiceCity(){
    var cityList=$(".city_list"),
        tit=$(".city_list_tit"),
        a=tit.find("a");

    $(".left").click(function(){
        cityList.fadeToggle("fast");
        if(cityList.height()=="100")
            cityList.find("li").eq(0).show();//默认显示热门城市
    });

    a.hover(function(){
        a.css({"color":"#24354b"});
        $(this).css({"color":"#EA5506"});
        var w=$(this).width(),
            left=$(this).position().left;
        tit.find(".city_list_arrow").css({"left":left+w/2});

        var n=a.index($(this));
        $(".city_list_body li").hide().eq(n).show();
    });
    //选择城市
    $(".city_list_body").find("li a").click(function(){
        $("#city").html($(this).html() + '市');
        add_marker($(this).html());
    });
}

//门店信息 加载
function storeLoad(result){
    NUM=0;
    var Area=$(".area"),
        Store=$(".store"),
        Area_a,
        Store_ul;
    Area.html("");
    Store.html("");
    var id=[],area=[],address=[],name=[],data=[],lng=[],lat=[],html="";
    //获取数据
    for(var i=0;i<result.length;i++){
        // id[i]=result[i].id;
        // area[i]=result[i].district;
        // address[i]=result[i].street;
        // name[i]=result[i].structure_name;
        // lng[i]=result[i].latitude;
        // lat[i]=result[i].longitude;
        id[i] = result[i].server_id; // 门店id
        area[i] = result[i].district; // 地区
        address[i] = result[i].street; // 街道信息
        name[i] = result[i].server_name; // 门店名
        lng[i] = result[i].coordinate.split(',')[0]; // 经度
        lat[i] = result[i].coordinate.split(',')[1]; // 维度
    }
    for(var j = 0; j < area.length; j++){
        if (data.indexOf(area[j]) == -1) data.push(area[j]);
    }
    //添加区域
    for(var k=0;k<data.length;k++){
        Area.append("<a>"+data[k]+"</a>");
        Store.append("<ul></ul>");
    }
    Area_a=Area.find("a");
    Store_ul=Store.find("ul");

    //添加门店
    for(var l=0;l<area.length;l++){
        for(var m=0;m<data.length;m++){
            if(area[l]==data[m]){
                html="<li class='"+id[l]+"' " +
                    "lng='"+lng[l]+"'" +
                    "lat='"+lat[l]+"'" +
                    "num='"+l+"'" +
                    "m='"+m+"'" +
                    "address='"+address[l]+"'>"+name[l]+"</li>";
                Store_ul.eq(m).append(html);
            }
        }
    }

    var city=$("#city").html();
    if(city!="乌鲁木齐")
        city=city.substr(0,city.length-1);
    $(".storeInfo h5").html(city+"租车 （"+result.length+"家门店期待为您服务）");

    //区域点击
    Area_a.click(function(){
        Area_a.removeClass("active");
        $(this).addClass("active");
        var m=Area_a.index($(this));

        if(Store_ul.hide().eq(m).show().find("li").hasClass("active")==false){
            Store_ul.hide().eq(m).show().find("li").eq(0).addClass("active");
        }

        var n=Store_ul.eq(m).find("li").eq(0);
        $(".storeInfo a").html(n.html());
        $(".storeInfo p").html(address[n.attr("num")]);
        $(".storeInfo").show();

        if(NUM!=0){
            var point=new BMap.Point(n.attr("lng"),n.attr("lat"));
            map.centerAndZoom(point, 14);
        }
        NUM++;
    });

    //初始化
    Area_a.eq(0).click();
}




















