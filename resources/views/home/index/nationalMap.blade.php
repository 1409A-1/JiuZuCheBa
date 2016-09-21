<!-- 头部 -->
@include('common.home_header')

<script src="home/js/echarts.js"></script>
<script src="home/js/map.js"></script>
<script src="home/js/area.js"></script>
<script src="home/js/storeMap.js"></script>
<style>
    body{background: #EEEEEE}
    /*全国地图*/
    #mapBox{width: 100%;padding: 30px 0}
    #mapBox>div{width: 90%;min-width: 1180px;height:750px;background: #fff!important;padding: 20px 0;margin:auto;box-shadow: 0 0 10px #aaa;position: relative}
    .toStoreList{display: block;width: 120px;height: 120px;text-align: center;position: absolute;top: 30px;right: 30px;font-size: 12px;color: #23454b;box-shadow: 0 0 5px #aaa;transition: 0.5s}
    .toStoreList:hover{box-shadow: 0 0 5px #fe5714}
    .toStoreList>img{margin: 15px auto;display: block}
    #Map{width: 100%;height: 100%}
    #Map a{color:white;font-size: 14px;padding: 0 10px;border-radius: 2px}
    #Map a:hover{background: #007b43}
    #Map a:hover span{color: #ccc}
    #Map hr{width: 97%;margin: 5px 5px;height: 1px;border:none;background: gray}
    #Map span{color: dodgerblue;font-size: 12px;margin-left: 5px}
    #Map .tit{width: 150%;height: 30px;line-height: 30px;color:yellow;text-indent: 0.5em}
    #Map .text{ color:gray;font-size: 14px;text-indent: 0.5em}
    #Map .store{margin-left: 0.5em;line-height: 25px}
    /* 城市列表 */
    .CityList{width: 1180px;margin: 50px auto;min-height: 300px}
    .CityList a{font-size: 13px;color: #24354b;display: inline-block;padding: 12px 30px 12px 0;}
    .CityList a:hover{ text-decoration:underline}
    .CityList b{display: inline-block;font-size: 15px;color: #ea5506;font-weight: 400;position: absolute;top: 8px}
    .hotCity{padding-left: 85px;position: relative}
    .hotCity b{width: 85px;height: 25px;left: 0}
    .otherCity li{padding-left: 85px;position: relative}
    .otherCity b{display: inline-block;width: 23px;height: 23px;/*border-radius: 23px; 圆形字母序号*/text-align: center;line-height: 23px;border: 1px solid #ea5506;left: 20px}
</style>

<!--地图-->
<div id="mapBox">
    <div>
        <div id="Map"></div>
        <!-- <div style="position: relative; overflow: hidden; width: 1713px; height: 750px;"><div class="zr-element" data-zr-dom-id="bg" style="position: absolute; left: 0px; top: 0px; width: 1713px; height: 750px;"></div><canvas class="zr-element" data-zr-dom-id="0" height="750" width="1713" style="position: absolute; left: 0px; top: 0px; width: 1713px; height: 750px;"></canvas><canvas class="zr-element" data-zr-dom-id="1" height="750" width="1713" style="position: absolute; left: 0px; top: 0px; width: 1713px; height: 750px;"></canvas><canvas class="zr-element" data-zr-dom-id="_zrender_hover_" height="750" width="1713" style="position: absolute; left: 0px; top: 0px; width: 1713px; height: 750px;"></canvas><div style="position: absolute; display: block; border-style: solid; white-space: nowrap; transition: left 0.4s ease 0s, top 0.4s ease 0s; background-color: rgba(0, 0, 0, 0.8); border-width: 0px; border-color: rgb(51, 51, 51); border-radius: 2px; color: rgb(255, 255, 255); padding: 5px; left: 714px; top: 232px;" class="echarts-tooltip"><div class="tit">新疆</div><div class="text">覆盖3座城市，共5家门店</div><hr><div class="store"><a href="http://www.dafang24.com/home/citymap?city_id=652800">巴音郭楞蒙古自治州<span>(1家门店)</span></a><br><a href="http://www.dafang24.com/home/citymap?city_id=650100">乌鲁木齐<span>(3家门店)</span></a><br><a href="http://www.dafang24.com/home/citymap?city_id=654000">伊犁哈萨克自治州<span>(1家门店)</span></a><br></div></div></div></div> -->
        <a class="toStoreList" href="{{ url('cityMap') }}">
            <img src="home/images/cityMap/toStore.png">
            切换到门店地图
        </a>
    </div>
</div>
<!--城市列表-->
<div class="CityList">
    <div class="hotCity">
        <b>热门城市</b>
    </div>
    <div class="hotCity">
        <b>旅游城市</b>
    </div><br>
    <div class="otherCity">
        <ul></ul>
    </div>
</div>

<!-- 底部 -->
@include('common.home_footer')
