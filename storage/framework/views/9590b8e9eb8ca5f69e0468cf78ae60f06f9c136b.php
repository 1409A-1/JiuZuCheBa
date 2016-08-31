<!DOCTYPE html>
<html lang="en"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"><script src="../resources/assets/home/public/b.js" charset="utf-8"></script><script src="../resources/assets/home/public/lxb.js" charset="utf-8"></script><script src="../resources/assets/home/public/v.htm" charset="utf-8"></script>
    <meta charset="UTF-8">
        <title>短期租车|短期自驾租车|价格 - 大方租车,中国互联网租车领跑者</title>
        <meta name="description" content="大方租车-中国互联网租车领跑者，连锁租车行业NO.1。短期租车预订频道为您提供大量短期租车车型,价格,短期自驾租车就上大方租车.客服热线400-0600-112.">
        <meta name="keywords" content="短期租车,短期自驾租车,租车价格">
    <link type="text/css" rel="stylesheet" href="../resources/assets/home/public/all.css">
    <link type="text/css" rel="stylesheet" href="../resources/assets/home/public/shortRent.css">
    <link type="text/css" rel="stylesheet" href="../resources/assets/home/public/calendar.css">
    <script src="../resources/assets/home/public/hm.js"></script><script type="text/javascript" src="../resources/assets/home/public/jquery-1.js"></script>
    <script type="text/javascript" src="../resources/assets/home/public/api"></script><script type="text/javascript" src="../resources/assets/home/public/getscript"></script>
    <script type="text/javascript" src="../resources/assets/home/public/ApiConfig.js"></script>
    <script type="text/javascript" src="../resources/assets/home/public/jquery.js"></script>
    <script type="text/javascript" src="../resources/assets/home/public/layer.js"></script><link style="" id="layui_layer_skinlayercss" href="../resources/assets/home/public/layer.css" rel="stylesheet">
    <script type="text/javascript" src="../resources/assets/home/public/linq.js"></script>
    <script type="text/javascript" src="../resources/assets/home/public/dateRange.js"></script>
    <script type="text/javascript" src="../resources/assets/home/public/dateTools.js"></script>
    <script type="text/javascript" src="../resources/assets/home/public/all.js"></script>
    <script type="text/javascript" src="../resources/assets/home/public/special_offers.js"></script>
    <script>
        var shopID = "";
        var StartDateTime = ""+" 10:00";
        var EndDateTime = "" + " 10:00";
        var carID = "";
        var IN_TYPE = 0;
        /*
         IN_TYPE
           0 : 直接进入  预订
           1 : 首页进入  预订
           2 : 套餐进入  预订
           3 : 门店进入  预订
        */
        var take_id, takeWeek, startHours1, endHours1, return_id, returnWeek, startHours2, endHours2, start_time, stop_time, begin_date, end_date;
        take_id = "";
        takeWeek = "";
        startHours1 = "";
        endHours1 = "";
        return_id = "";
        returnWeek = "";
        startHours2 = "";
        endHours2 = "";
        start_time = "";
        stop_time = "";
        begin_date = "";
        end_date = "";
        var autoclass_list_ = [];
        var offer_list_ = [];
        var order_info_;
    </script>
    <script type="text/javascript" src="../resources/assets/home/public/shortRent.js"></script>
<style type="text/css">.BMap_mask{background:transparent url(http://api0.map.bdimg.com/images/blank.gif);}.BMap_noscreen{display:none;}.BMap_button{cursor:pointer;}.BMap_zoomer{background-image:url(http://api0.map.bdimg.com/images/mapctrls1d3.gif);background-repeat:no-repeat;overflow:hidden;font-size:1px;position:absolute;width:7px;height:7px;}.BMap_stdMpCtrl div{position:absolute;}.BMap_stdMpPan{width:44px;height:44px;overflow:hidden;background:url(http://api0.map.bdimg.com/images/mapctrls2d0.png) no-repeat;}.BMap_ie6 .BMap_stdMpPan{background:none;}.BMap_ie6 .BMap_smcbg{left:0;width:44px;height:464px;filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src="http://api0.map.bdimg.com/images/mapctrls2d0.png");}.BMap_ie6 .BMap_stdMpPanBg{z-index:-1;}.BMap_stdMpPan .BMap_button{height:15px;width:15px;}.BMap_panN,.BMap_panW,.BMap_panE,.BMap_panS{overflow:hidden;}.BMap_panN{left:14px;top:0;}.BMap_panW{left:1px;top:12px;}.BMap_panE{left:27px;top:12px;}.BMap_panS{left:14px;top:25px;}.BMap_stdMpZoom{top:45px;overflow:hidden;}.BMap_stdMpZoom .BMap_button{width:22px;height:21px;left:12px;overflow:hidden;background-image:url(http://api0.map.bdimg.com/images/mapctrls2d0.png);background-repeat:no-repeat;z-index:10;}.BMap_ie6 .BMap_stdMpZoom .BMap_button{background:none;}.BMap_stdMpZoomIn{background-position:0 -221px;}.BMap_stdMpZoomOut{background-position:0 -265px;}.BMap_ie6 .BMap_stdMpZoomIn div{left:0;top:-221px;}.BMap_ie6 .BMap_stdMpZoomOut div{left:0;top:-265px;}.BMap_stdMpType4 .BMap_stdMpZoom .BMap_button{left:0;overflow:hidden;background:-webkit-gradient(linear,50% 0,50% 100%,from(rgba(255,255,255,0.85)),to(rgba(217,217,217,0.85)));z-index:10;-webkit-border-radius:22px;width:34px;height:34px;border:1px solid rgba(255,255,255,0.5);-webkit-box-shadow:0 2px 3.6px #CCC;display:-webkit-box;-webkit-box-align:center;-webkit-box-pack:center;-webkit-box-sizing:border-box;}.BMap_stdMpType4 .BMap_smcbg{position:static;background:url(http://api0.map.bdimg.com/images/mapctrls2d0_mb.png) 0 0 no-repeat;-webkit-background-size:24px 32px;}.BMap_stdMpType4 .BMap_stdMpZoomIn{background-position:0 0;}.BMap_stdMpType4 .BMap_stdMpZoomIn .BMap_smcbg{width:24px;height:24px;background-position:0 0;}.BMap_stdMpType4 .BMap_stdMpZoomOut{background-position:0 0;}.BMap_stdMpType4 .BMap_stdMpZoomOut .BMap_smcbg{width:24px;height:6px;background-position:0 -25px;}.BMap_stdMpSlider{width:37px;top:18px;}.BMap_stdMpSliderBgTop{left:18px;width:10px;overflow:hidden;background:url(http://api0.map.bdimg.com/images/mapctrls2d0.png) no-repeat -23px -226px;}.BMap_stdMpSliderBgBot{left:19px;height:8px;width:10px;top:124px;overflow:hidden;background:url(http://api0.map.bdimg.com/images/mapctrls2d0.png) no-repeat -33px bottom;}.BMap_ie6 .BMap_stdMpSliderBgTop,.BMap_ie6 .BMap_stdMpSliderBgBot{background:none;}.BMap_ie6 .BMap_stdMpSliderBgTop div{left:-23px;top:-226px;}.BMap_ie6 .BMap_stdMpSliderBgBot div{left:-33px;bottom:0;}.BMap_stdMpSliderMask{height:100%;width:24px;left:10px;cursor:pointer;}.BMap_stdMpSliderBar{height:11px;width:19px;left:13px;top:80px;overflow:hidden;background:url(http://api0.map.bdimg.com/images/mapctrls2d0.png) no-repeat 0 -309px;}.BMap_stdMpSliderBar.h{background:url(http://api0.map.bdimg.com/images/mapctrls2d0.png) no-repeat 0 -320px;}.BMap_ie6 .BMap_stdMpSliderBar,.BMap_ie6 .BMap_stdMpSliderBar.h{background:none;}.BMap_ie6 .BMap_stdMpSliderBar div{top:-309px;}.BMap_ie6 .BMap_stdMpSliderBar.h div{top:-320px;}.BMap_zlSt,.BMap_zlCity,.BMap_zlProv,.BMap_zlCountry{position:absolute;left:34px;height:21px;width:28px;background-image:url(http://api0.map.bdimg.com/images/mapctrls2d0.png);background-repeat:no-repeat;font-size:0;cursor:pointer;}.BMap_ie6 .BMap_zlSt,.BMap_ie6 .BMap_zlCity,.BMap_ie6 .BMap_zlProv,.BMap_ie6 .BMap_zlCountry{background:none;overflow:hidden;}.BMap_zlHolder{display:none;position:absolute;top:0;}.BMap_zlHolder.hvr{display:block;}.BMap_zlSt{background-position:0 -380px;top:21px;}.BMap_zlCity{background-position:0 -401px;top:52px;}.BMap_zlProv{background-position:0 -422px;top:76px;}.BMap_zlCountry{background-position:0 -443px;top:100px;}.BMap_ie6 .BMap_zlSt div{top:-380px;}.BMap_ie6 .BMap_zlCity div{top:-401px;}.BMap_ie6 .BMap_zlProv div{top:-422px;}.BMap_ie6 .BMap_zlCountry div{top:-443px;}.BMap_stdMpType1 .BMap_stdMpSlider,.BMap_stdMpType2 .BMap_stdMpSlider,.BMap_stdMpType3 .BMap_stdMpSlider,.BMap_stdMpType4 .BMap_stdMpSlider,.BMap_stdMpType2 .BMap_stdMpZoom,.BMap_stdMpType3 .BMap_stdMpPan,.BMap_stdMpType4 .BMap_stdMpPan{display:none;}.BMap_stdMpType3 .BMap_stdMpZoom{top:0;}.BMap_stdMpType4 .BMap_stdMpZoom{top:0;}.BMap_cpyCtrl a{font-size:11px;color:#7979CC;}.BMap_scaleCtrl{height:23px;overflow:hidden;}.BMap_scaleCtrl div.BMap_scaleTxt{font-size:11px;font-family:Arial,sans-serif;}.BMap_scaleCtrl div{position:absolute;overflow:hidden;}.BMap_scaleHBar img,.BMap_scaleLBar img,.BMap_scaleRBar img{position:absolute;width:37px;height:442px;left:0;}.BMap_scaleHBar{width:100%;height:5px;font-size:0;bottom:0;}.BMap_scaleHBar img{top:-437px;width:100%;}.BMap_scaleLBar,.BMap_scaleRBar{width:3px;height:9px;bottom:0;font-size:0;z-index:1;}.BMap_scaleLBar img{top:-427px;left:0;}.BMap_scaleRBar img{top:-427px;left:-5px;}.BMap_scaleLBar{left:0;}.BMap_scaleRBar{right:0;}.BMap_scaleTxt{text-align:center;width:100%;cursor:default;line-height:18px;}.BMap_omCtrl{background-color:#fff;overflow:hidden;}.BMap_omOutFrame{position:absolute;width:100%;height:100%;left:0;top:0;}.BMap_omInnFrame{position:absolute;border:1px solid #999;background-color:#ccc;overflow:hidden;}.BMap_omMapContainer{position:absolute;overflow:hidden;width:100%;height:100%;left:0;top:0;}.BMap_omViewMv{border-width:1px;border-style:solid;border-left-color:#84b0df;border-top-color:#adcff4;border-right-color:#274b8b;border-bottom-color:#274b8b;position:absolute;z-index:600;}.BMap_omViewInnFrame{border:1px solid #3e6bb8;}.BMap_omViewMask{width:1000px;height:1000px;position:absolute;left:0;top:0;background-color:#68c;opacity:.2;filter:progid:DXImageTransform.Microsoft.Alpha(opacity=20);}.BMap_omBtn{height:13px;width:13px;position:absolute;cursor:pointer;overflow:hidden;background:url(http://api0.map.bdimg.com/images/mapctrls1d3.gif) no-repeat;z-index:1210;}.anchorBR .BMap_omOutFrame{border-top:1px solid #999;border-left:1px solid #999;}.quad4 .BMap_omBtn{background-position:-26px -27px;}.quad4 .BMap_omBtn.hover{background-position:0 -27px;}.quad4 .BMap_omBtn.BMap_omBtnClosed{background-position:-39px -27px;}.quad4 .BMap_omBtn.BMap_omBtnClosed.hover{background-position:-13px -27px;}.anchorTR .BMap_omOutFrame{border-bottom:1px solid #999;border-left:1px solid #999;}.quad1 .BMap_omBtn{background-position:-39px -41px;}.quad1 .BMap_omBtn.hover{background-position:-13px -41px;}.quad1 .BMap_omBtn.BMap_omBtnClosed{background-position:-26px -41px;}.quad1 .BMap_omBtn.BMap_omBtnClosed.hover{background-position:0 -41px;}.anchorBL .BMap_omOutFrame{border-top:1px solid #999;border-right:1px solid #999;}.quad3 .BMap_omBtn{background-position:-27px -40px;}.quad3 .BMap_omBtn.hover{background-position:-1px -40px;}.quad3 .BMap_omBtn.BMap_omBtnClosed{background-position:-40px -40px;}.quad3 .BMap_omBtn.BMap_omBtnClosed.hover{background-position:-14px -40px;}.anchorTL .BMap_omOutFrame{border-bottom:1px solid #999;border-right:1px solid #999;}.quad2 .BMap_omBtn{background-position:-40px -28px;}.quad2 .BMap_omBtn.hover{background-position:-14px -28px;}.quad2 .BMap_omBtn.BMap_omBtnClosed{background-position:-27px -28px;}.quad2 .BMap_omBtn.BMap_omBtnClosed.hover{background-position:-1px -28px;}.anchorR .BMap_omOutFrame{border-bottom:1px solid #999;border-left:1px solid #999;border-top:1px solid #999;}.anchorL .BMap_omOutFrame{border-bottom:1px solid #999;border-right:1px solid #999;border-top:1px solid #999;}.anchorB .BMap_omOutFrame{border-top:1px solid #999;border-left:1px solid #999;border-right:1px solid #999;}.anchorT .BMap_omOutFrame{border-bottom:1px solid #999;border-right:1px solid #999;border-left:1px solid #999;}.anchorNon .BMap_omOutFrame,.withOffset .BMap_omOutFrame{border:1px solid #999;}.BMap_zoomMask0,.BMap_zoomMask1{position:absolute;left:0;top:0;width:100%;height:100%;background:transparent url(http://api0.map.bdimg.com/images/blank.gif);z-index:1000;}.BMap_contextMenu{position:absolute;border-top:1px solid #adbfe4;border-left:1px solid #adbfe4;border-right:1px solid #8ba4d8;border-bottom:1px solid #8ba4d8;padding:0;margin:0;width:auto;visibility:hidden;background:#fff;z-index:10000000;}.BMap_cmShadow{position:absolute;background:#000;opacity:.3;filter:alpha(opacity=30);visibility:hidden;z-index:9000000;}div.BMap_cmDivider{border-bottom:1px solid #adbfe4;font-size:0;padding:1px;margin:0 6px;}div.BMap_cmFstItem{margin-top:2px;}div.BMap_cmLstItem{margin-bottom:2px;}.BMap_shadow img{border:0 none;margin:0;padding:0;height:370px;width:1144px;}.BMap_pop .BMap_top{border-top:1px solid #ababab;background-color:#fff;}.BMap_pop .BMap_center{border-left:1px solid #ababab;border-right:1px solid #ababab;background-color:#fff;}.BMap_pop .BMap_bottom{border-bottom:1px solid #ababab;background-color:#fff;}.BMap_shadow,.BMap_shadow img,.BMap_shadow div{-moz-user-select:none;-webkit-user-select:none;}.BMap_checkbox{background:url(http://api0.map.bdimg.com/images/mapctrls1d3.gif);vertical-align:middle;display:inline-block;width:11px;height:11px;margin-right:4px;background-position:-14px 90px;}.BMap_checkbox.checked{background-position:-2px 90px;}.BMap_pop .BMap_top img,.BMap_pop .BMap_center img,.BMap_pop .BMap_bottom img{display:none;}@media  print{.BMap_noprint{display:none;}.BMap_noscreen{display:block;}.BMap_mask{background:none;}.BMap_pop .BMap_top img,.BMap_pop .BMap_center img,.BMap_pop .BMap_bottom img{display:block;}}.BMap_vectex{cursor:pointer;width:11px;height:11px;position:absolute;background-repeat:no-repeat;background-position:0 0;}.BMap_vectex_nodeT{background-image:url(http://api0.map.bdimg.com/images/nodeT.gif);}.BMap_vectex_node{background-image:url(http://api0.map.bdimg.com/images/node.gif);}.iw{width:100%;-webkit-box-sizing:border-box;border:.3em solid transparent;-webkit-background-clip:padding;}.iw_rt{position:relative;height:46px;width:195px;-webkit-box-sizing:border-box;display:-webkit-box;-webkit-box-align:center;margin:2px 5px 0 2px;background-color:rgba(0,0,0,0.8);-webkit-box-shadow:2px 2px 7px rgba(0,0,0,0.3);-webkit-border-radius:2px;color:#fff;}.iw_rt:after{content:"";position:absolute;left:50%;bottom:-8px;width:0;height:0;border-left:5px solid transparent;border-top:8px solid rgba(0,0,0,0.8);border-right:5px solid transparent;margin:0 0 0 -6px;}.iw_s{text-align:center;vertical-align:middle;height:100%;-webkit-box-sizing:border-box;}.iw_rt .iw_s1{color:#cbcbcb;}.iw_rt b{color:#fff;font-weight:bold;}.iw_rt_gr{margin-left:-4px;}.iw_busline{margin:32px 0 0 -3px;}.iw_busline .iw_cc{text-align:center;white-space:nowrap;text-overflow:ellipsis;overflow:hidden;padding:0 6px;}.iw_r{-webkit-box-ordinal-group:3;}.iw_r,.iw_l{height:100%;font-size:4.5em;text-align:center;color:#747474;border:none;-webkit-box-sizing:border-box;-webkit-border-radius:0;line-height:.7em;border:1px solid rgba(255,255,255,0.2);width:41px;}.iw_r{border-style:none none none solid;}.iw_l{border-style:none solid none none;}.iw_search,.iw_l{background:url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACYAAAAlCAYAAAAuqZsAAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJ bWFnZVJlYWR5ccllPAAAAyJpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdp bj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6 eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMC1jMDYwIDYxLjEz NDc3NywgMjAxMC8wMi8xMi0xNzozMjowMCAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJo dHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlw dGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAv IiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RS ZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpD cmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNSBNYWNpbnRvc2giIHhtcE1NOkluc3RhbmNl SUQ9InhtcC5paWQ6QjA3NjMyREJDNzQ2MTFFMTlBQUM5QzlCRDZGODZCQkYiIHhtcE1NOkRvY3Vt ZW50SUQ9InhtcC5kaWQ6QjA3NjMyRENDNzQ2MTFFMTlBQUM5QzlCRDZGODZCQkYiPiA8eG1wTU06 RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDpCMDc2MzJEOUM3NDYxMUUxOUFB QzlDOUJENkY4NkJCRiIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDpCMDc2MzJEQUM3NDYxMUUx OUFBQzlDOUJENkY4NkJCRiIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1w bWV0YT4gPD94cGFja2V0IGVuZD0iciI/PllB9T8AAAKuSURBVHjaxFjRcdpAEAX+mVEqiFxB5AoQ HZAKElcArsBWBSgVQCoAVwCuwEoFlivwGQpI7jKrzGXn7ep0EsPO7BjLp/O73bdv9xifTqdRpCXW c+sz65n1lNy3mvzZemX9aN34C6bTKdx8HAHMgVlaX0QeaGv9J4EcBJgD9EA/hzAH7N4Cq/oAW1tf KX+vKEXP7PlMSLFvhQX32BWY49GBOIRO7FKy57wBlnoUQHu5yJX+g4mymdvgFWzkAM3JtwGgmiJw a2/pvQoEYBQCLKNI8RfuaeNjT245gAUdqgHdmkqUPiOctLdJVYkithkAVO/K5cC+M30KAZVSxboo /ybnn1eIR5r5qUyI7P4GX6nqJHskbQsxQ7wqu6aSn2qrgHLrXjqAat5ZC0WlRuzVE0J3uhtBCjRt a3qjX92JIMiOIqYtYgumzpo+7RRtu/E0zvknokMF5GgdQv4Ze/5DWL8CFVe2aNuedGsLCi1vS+WL F4WKNkL2Dnh414FnO1b1R5vKuRaxjKUF2YKBqjuCGtF6nyL5+XxOJWCcL2/CpjzdRYRuGpDShQQs ARUj9U/OnRh7Yr9/CW1JXU4fYxXoHIMCu+iB+gBLIt/LgShDYCYktGCDfCBgvyRgVQgZwTy/jIzy EnQNMZV1QCT4bJ+3XFCkS81/WijdkiYAdSak04BWtabWEmIbsNZYgU00YE+gjyErQeo31GpShVMH Yc+/dwsEzh97/D6ojT2ZMlM1XwN8WP9Ma7NAbZvbtBoEjE+jBT2TusCu5SIbI7z/wLWN1rdKi0o6 cqwTuAmYyTm5NQW/82atWvlnBbo7apxD98qDJxl7mkC76JQ2Qm0CI1xKF95Gb4oLXHJDwJlxjy/u LgruGtNFM8lqnNtfK2JqN3CVeW1gzWj9jThd0xd59R8BBgAAiefGO1Bt1gAAAABJRU5ErkJggg==") no-repeat 50% 50%;-webkit-background-size:19px 19px;}.iw_line_s,.iw_r{background:url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACUAAAAmCAYAAABDClKtAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJ bWFnZVJlYWR5ccllPAAAAyJpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdp bj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6 eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMC1jMDYwIDYxLjEz NDc3NywgMjAxMC8wMi8xMi0xNzozMjowMCAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJo dHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlw dGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAv IiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RS ZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpD cmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNSBNYWNpbnRvc2giIHhtcE1NOkluc3RhbmNl SUQ9InhtcC5paWQ6QjA3NjMyREZDNzQ2MTFFMTlBQUM5QzlCRDZGODZCQkYiIHhtcE1NOkRvY3Vt ZW50SUQ9InhtcC5kaWQ6QjA3NjMyRTBDNzQ2MTFFMTlBQUM5QzlCRDZGODZCQkYiPiA8eG1wTU06 RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDpCMDc2MzJEREM3NDYxMUUxOUFB QzlDOUJENkY4NkJCRiIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDpCMDc2MzJERUM3NDYxMUUx OUFBQzlDOUJENkY4NkJCRiIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1w bWV0YT4gPD94cGFja2V0IGVuZD0iciI/PqheQ+MAAAEtSURBVHja7JftDYIwEIbB8JeEUXACZQPd oGygE+gGxAnQEZzAOgEdwREIDKBXUgjBIqW5Npj0kvcHpG0erveFX1WVZ8l2oBhEhRoLw/BroW8J KgeR3vMVlI5BrSwAHQZAnngmYxtMe4oIL41ZAp6iNqF4/BQTa0oBxmxAcaAHKFJY+wKtAaw0CRUJ oHjGHiY8VpqCKmYCdRkJUKmJ7Ms1gZqkqOs6w/bUGXRCOGePCcXjaItwDsW8PoZ0zhM70IeeyiZi jH/Isf+CF9MAOdCppDj+LJ6yim6j9802B6VqQa818BFjY6AHakHp9Crj15ctCaiFIi7Q/wCKLRHq vjSoVNKWunH4rTBDv5Cv7NKeKfvvU2nINzHAuexzUA7KQTkoB6UxDicKvc+qfQQYABaiUBxugCsr AAAAAElFTkSuQmCC") no-repeat 50% 50%;-webkit-background-size:19px 19px;}.iw_line{height:64px;width:228px;padding:0 11px;line-height:20px;}.iw_bustrans .iw_cc{text-align:center;}.iw_c{color:#FFFFFF;text-decoration:none;overflow:hidden;display:-webkit-box;-webkit-box-align:center;-webkit-box-flex:1;}.iw_cc{-webkit-box-sizing:border-box;width:100%;border:none;}.gray_background{filter:alpha(opacity=50);-moz-opacity:0.5;-khtml-opacity:0.5;opacity: 0.5} .light_gray_background {filter:alpha(opacity=70);-moz-opacity:0.7;-khtml-opacity:0.7;opacity: 0.7} .panoInfoBox {cursor: pointer; } .panoInfoBox {position: relative; width: 323px; height: 101px; margin-bottom: 4px; cursor: pointer; } .panoInfoBox .panoInfoBoxTitleBg {width: 323px; height: 19px; position: absolute; left: 0; bottom: 0; z-index: 2; background-color: #000; opacity: .7; } .panoInfoBox .panoInfoBoxTitleContent {font-size: 12px; color: #fff; position: absolute; bottom: 2px; left: 5px; z-index: 3; text-decoration: none; } .RouteAddressOuterBkg{position:relative; padding: 32px 4px 4px 3px; background-color:#ffdd99; } .RouteAddressInnerBkg{padding: 3px 5px 8px 8px; background-color:#ffffff; } #RouteAddress_DIV1{margin-top: 5px; } .RouteAddressTip{position:absolute; width:100%; top:0px; text-align:center; height:30px; line-height:30px; color:#994c00; } .route_tip_con {position:absolute;top:145px;} .route_tip_con .route_tip{position:absolute;width:233px;height:29px;color:#803300;text-align:center;line-height:29px;border:#cc967a solid 1px;background:#fff2b2;z-index:100000;} .route_tip_con .route_tip span{position:absolute;top:0;right:0;_right:-1px;width:14px;height:13px;background:url(http://api0.map.bdimg.com/images/addrPage.png?v=20121107) no-repeat 0 -121px;cursor:pointer;} .route_tip_con .route_tip_shadow{width:233px;height:29px;  position:absolute;left:1px;top:1px;background:#505050;border:1px solid #505050;opacity:0.2;filter:alpha(opacity=20)} .sel_body_body_page{margin:5px 0} .sel_n{margin-top:5px;overflow:hidden;} .sel_n .sel_top{background:url(http://api0.map.bdimg.com/images/bgs.gif) no-repeat 0 -418px;height:4px;font-size:0px;} .sel_n .sel_body_top{height:32px;width:100%;background:url(http://api0.map.bdimg.com/images/addrPage.png?v=20121107) no-repeat 0 -41px;} .sel_n .sel_body_title{float:left;width:100%;height:31px;} .sel_n .sel_body_sign{margin-top:1px;width:30px;height:31px;float:left;background:url(http://api0.map.bdimg.com/images/bgs.gif) no-repeat -79px -387px;} .sel_n .sel_body_name{height: 10px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; margin:0 20px 0 30px;padding:8px 7px 7px;font-size:14px;color:#FA8722;} .sel_n .sel_body_button{float:left;width:55px;margin-left:-55px;padding-top:8px;} .sel_n .sel_body_button a{} .sel_n .sel_bottom{background:url(http://api0.map.bdimg.com/images/bgs.gif) no-repeat 0 -415px;height:4px;font-size:0px;} .sel_n .sel_body_body{padding:3px 0 0 0} .sel_n1{margin-top:5px;width:329px;overflow:hidden;} .sel_n1 .sel_top{background:url(http://api0.map.bdimg.com/images/bgs.gif) no-repeat 0 -418px;height:4px;font-size:0px;} .sel_n1 .sel_body_top{height:31px;width:100%;background:url(http://api0.map.bdimg.com/images/sel_body_n_top.gif) repeat-x;} .sel_n1 .sel_body_top{height:32px;width:100%;background:url(http://api0.map.bdimg.com/images/addrPage.png?v=20121107) no-repeat 0 -41px} .sel_n1 .sel_body_title{float:left;width:100%;height:31px;cursor:pointer;} .sel_n1 .sel_body_sign{margin-top:1px;width:30px;height:31px;float:left;background:url(http://api0.map.bdimg.com/images/bgs.gif) no-repeat -79px -387px;} .sel_n1 .sel_body_name{margin:0 20px 0 30px;padding:8px 7px 7px;font-size:14px;color:#FA8722;} .sel_n1 .sel_body_button{float:left;width:20px;height:31px;margin-left:-23px;background:url(http://api0.map.bdimg.com/images/bgs.gif) no-repeat -253px -382px;overflow:hidden;zoom:1;cursor:pointer;} .sel_n1 .sel_body_button a{display:none;} .sel_n1 .sel_body_body{display:none} .sel_n1 .sel_bottom{background:url(http://api0.map.bdimg.com/images/bgs.gif) no-repeat 0 -415px;height:4px;font-size:0px;} .sel_y{margin-top:5px;overflow:hidden;} .sel_y .sel_top{background:url(http://api0.map.bdimg.com/images/bgs.gif) no-repeat 0 -439px;height:4px;zoom:1;font-size:0px;} .sel_y .sel_body_top{height:32px;width:100%;background:url(http://api0.map.bdimg.com/images/addrPage.png?v=20121107) no-repeat 0 0} .sel_y .sel_body_title{float:left;width:100%;height:31px;cursor:pointer;} .sel_y .sel_body_sign{margin-top:1px;width:30px;height:31px;float:left;background:url(http://api0.map.bdimg.com/images/bgs.gif) no-repeat -167px -384px;} .sel_y .sel_body_name{margin:0 20px 0 30px;padding:8px 7px 7px;font-size:14px;color:#5B7BCB;} .sel_y .sel_body_button{float:left;width:20px;height:31px;margin-left:-20px;background:url(http://api0.map.bdimg.com/images/bgs.gif) no-repeat -269px -297px;cursor:pointer;} .sel_y .sel_body_button a{display:none;} .sel_y .sel_body_body{display:none;height:0px} .sel_y .sel_body_body_div{} .sel_y .sel_bottom{background:url(http://api0.map.bdimg.com/images/bgs.gif) no-repeat 0 -436px;height:4px;font-size:0px;} .sel_y .sel_body_body_page{display:none;height:0px;} .sel_x{margin-top:5px;width:329px;overflow:hidden;} .sel_x .sel_top{background:url(http://api0.map.bdimg.com/images/bgs.gif) no-repeat 0 -418px;height:4px;font-size:0px;} .sel_x .sel_body_top{height:32px;width:100%;background:url(http://api0.map.bdimg.com/images/addrPage.png?v=20121107) no-repeat 0 -41px;} .sel_x .sel_body_title{float:left;width:100%;height:31px;} .sel_x .sel_body_sign{margin-top:1px;width:30px;height:31px;float:left;background:url(http://api0.map.bdimg.com/images/bgs.gif) no-repeat -122px -384px;} .sel_x .sel_body_name{margin:0 20px 0 30px;padding:8px 7px 7px;font-size:14px;color:#FA8722;} .sel_x .sel_body_button{float:left;width:55px;margin-left:-55px;padding-top:8px;} .sel_x .sel_body_button a{} .sel_x .sel_body_body{} .sel_x .sel_body_body_div{padding:5px 5px 0 5px;} .sel_x .sel_bottom{background:url(http://api0.map.bdimg.com/images/bgs.gif) no-repeat 0 -415px;height:4px;font-size:0px;} .sel_x1{margin-top:5px;width:329px;overflow:hidden;} .sel_x1 .sel_top{background:url(http://api0.map.bdimg.com/images/bgs.gif) no-repeat 0 -418px;height:4px;font-size:0px;} .sel_x1 .sel_body_top{height:32px;width:100%;background:url(http://api0.map.bdimg.com/images/addrPage.png?v=20121107) no-repeat 0 -41px} .sel_x1 .sel_body_title{float:left;width:100%;height:31px;cursor:pointer;} .sel_x1 .sel_body_sign{margin-top:1px;width:30px;height:31px;float:left;background:url(http://api0.map.bdimg.com/images/bgs.gif) no-repeat -122px -384px;} .sel_x1 .sel_body_name{margin:0 20px 0 30px;padding:8px 7px 7px;font-size:14px;color:#FA8722;} .sel_x1 .sel_body_button{float:left;width:55px;height:31px;margin-left:-55px;} .sel_x1 .sel_body_button a{display:none;} .sel_x1 .sel_body_body{display:none;height:0px;} .sel_x1 .sel_body_body_div{padding:5px 5px 0 5px;} .sel_x1 .sel_bottom{background:url(http://api0.map.bdimg.com/images/bgs.gif) no-repeat 0 -415px;height:4px;font-size:0px;} .sel_body_citylist{height:100px;padding: 0 0 0 5px} .sel_body_resitem{table-layout:fixed;overflow-x:hidden;overflow-y:hidden;} .sel_body_resitem table {margin-right:5px;} .sel_body_resitem tr{cursor:pointer;} .sel_body_resitem th{padding-top:5px;padding-left:5px;text-align:left;vertical-align:top;width:22px;} .sel_body_resitem th div.iconbg{background:url(http://api0.map.bdimg.com/images/markers_new_ie6.png) no-repeat scroll 0 0;height:29px;width:24px;} .sel_body_resitem th div.icon{cursor:pointer} .sel_body_resitem th div#no_0_1, .sel_body_resitem th div#no_1_1{background-position:0 -64px} .sel_body_resitem th div#no_0_2, .sel_body_resitem th div#no_1_2{background-position:-24px -64px} .sel_body_resitem th div#no_0_3, .sel_body_resitem th div#no_1_3{background-position:-48px -64px} .sel_body_resitem th div#no_0_4, .sel_body_resitem th div#no_1_4{background-position:-72px -64px} .sel_body_resitem th div#no_0_5, .sel_body_resitem th div#no_1_5{background-position:-96px -64px} .sel_body_resitem th div#no_0_6, .sel_body_resitem th div#no_1_6{background-position:-120px -64px} .sel_body_resitem th div#no_0_7, .sel_body_resitem th div#no_1_7{background-position:-144px -64px} .sel_body_resitem th div#no_0_8, .sel_body_resitem th div#no_1_8{background-position:-168px -64px} .sel_body_resitem th div#no_0_9, .sel_body_resitem th div#no_1_9{background-position:-192px -64px} .sel_body_resitem th div#no_0_10, .sel_body_resitem th div#no_1_10{background-position:-216px -64px} .sel_body_resitem td{line-height:160%;padding:3px 0 3px 3px;vertical-align:top;} .sel_body_resitem div.ra_td_title{float:left;margin-right:40px;} .sel_body_resitem div.ra_td_button{float:right; width:40px;} .sel_body_resitem div.ra_td_button input{height:18px;font-size:12px;width:40px;} .sel_body_resitem div.clear{clear:both;height:0px;width:100%;} .sel_body_resitem td .selBtn {width:70px;height:29px;background:url(http://api0.map.bdimg.com/images/addrPage.png?v=20121107) no-repeat -21px -81px;text-align:center;line-height:29px;visibility:hidden;color:#b35900;display:inline-block;*display:inline;*zoom:1;} .sel_body_resitem td .list_street_view_poi {display:inline-block;float:none;margin-right:6px;position:static;*vertical-align:-3px;_vertical-align:-5px;*display:inline;*zoom:1;} .selInfoWndBtn {width:70px;height:29px;background:url(http://api0.map.bdimg.com/images/addrPage.png?v=20121107) no-repeat -21px -81px;text-align:center;line-height:29px;margin: 0 auto;cursor:pointer;color:#b35900} .sel_body_body td a{text-decoration: none; cursor: auto; } .sel_body_body td a:hover,.sel_body_body td a:focus{text-decoration:underline; }.panoInfoBox{cursor:pointer}.panoInfoBox{position:relative;width:323px;height:101px;margin-bottom:4px;cursor:pointer}.panoInfoBox .panoInfoBoxTitleBg{width:323px;height:19px;position:absolute;left:0;bottom:0;z-index:2;background-color:#000;opacity:.7}.panoInfoBox .panoInfoBoxTitleContent{font-size:12px;color:#fff;position:absolute;bottom:2px;left:5px;z-index:3;text-decoration:none}.pano_switch_left,.pano_switch_right{position:absolute;width:28px;height:38px;cursor:pointer;background-color:#252525;background-color:rgba(37,37,37,.9)}.pano_switch_left{background:url(http://api0.map.bdimg.com/images/panorama/zuojiantou.png) no-repeat;-webkit-background-size:100% 100%;background-size:100% 100%}.pano_switch_right{background:url(http://api0.map.bdimg.com/images/panorama/youjiantou.png) no-repeat;-webkit-background-size:100% 100%;background-size:100% 100%}.pano_switch_left:hover{background:url(http://api0.map.bdimg.com/images/panorama/zuojiantou_hover.png) no-repeat;-webkit-background-size:100% 100%;background-size:100% 100%}.pano_switch_right:hover{background:url(http://api0.map.bdimg.com/images/panorama/youjiantou_hover.png) no-repeat;-webkit-background-size:100% 100%;background-size:100% 100%}.pano_switch_left.pano_switch_disable,.pano_switch_right.pano_switch_disable{background:0 0;border:none}.pano_poi_1,.pano_poi_2,.pano_poi_4{display:inline-block;width:16px;height:16px;vertical-align:middle;background:url(http://webmap0.map.bdimg.com/newmap/static/common/images/pano_whole/guide_icons_4b871b2.png) no-repeat;background-position:0 0}.pano_photo_arrow_l,.pano_photo_arrow_r{position:absolute;top:0;width:20px;height:100%;background:#f3eeee}.pano_photo_arrow_l{left:0}.pano_photo_arrow_r{right:0}.pano_arrow_l,.pano_arrow_r{display:inline-block;width:18px;height:18px;background:url(http://webmap0.map.bdimg.com/newmap/static/common/images/pano_whole/pano-icons_223a291.png) no-repeat}.pano_catlogLi{cursor:pointer;position:relative;line-height:10px;font-size:10px;text-align:center;color:#abb0b2;border:1px solid #53565c;padding:3px 0;margin-top:3px;margin-left:2px;width:90%}.pano_catlogLi:hover{color:#3DAAFC;border:1px solid #3DAAFC}.pano_catlogLiActive{color:#3DAAFC;border:1px solid #3DAAFC}.pano_arrow_l{background-position:0 -36px}.pano_arrow_r{background-position:-54px -36px}.pano_photo_arrow_l:hover .pano_arrow_l{background-position:-18px -36px}.pano_photo_arrow_r:hover .pano_arrow_r{background-position:-72px -36px}.pano_photo_arrow_l.pano_arrow_disable .pano_arrow_l{background-position:-36px -36px}.pano_photo_arrow_r.pano_arrow_disable .pano_arrow_r{background-position:-90px -36px}.pano_photo_item{position:relative;float:left;line-height:0;padding-left:8px}.pano_photo_decs{position:absolute;bottom:1px;left:0;padding:2px 0;text-indent:5px;margin-left:8px;display:inline-block;color:#fff;background:#000;opacity:.5;filter:alpha(opacity=50)9;text-overflow:ellipsis;overflow:hidden;white-space:nowrap}.pano_photo_item img{display:inline-block;border:solid 1px #252525}.pano_photo_item:hover img{border-color:#005efc}.pano_photo_item_seleted{position:absolute;top:0;left:-100000px;border:3px solid #097df3}.pano_close{position:absolute;right:10px;top:10px;width:40px;cursor:pointer;height:40px;line-height:40px;border-radius:3px;background-color:rgba(37,37,37,.9);background-image:url(http://api0.map.bdimg.com/images/panorama/close.png);background-repeat:no-repeat;background-position:center center;background-size:90%}.pano_close:hover{background-image:url(http://api0.map.bdimg.com/images/panorama/close_hover.png)}.pano_pc_indoor_exit{position:absolute;right:60px;top:10px;width:89px;cursor:pointer;height:40px;line-height:40px;color:#ebedf0;border-radius:3px;background-color:#252525;background-color:rgba(37,37,37,.9);background-image:url(http://api0.map.bdimg.com/images/panorama/indoor_exit.png);background-repeat:no-repeat;background-position:15px 12px}.pano_pc_indoor_exit:hover{background-image:url(http://api0.map.bdimg.com/images/panorama/indoor_exit_hover.png);color:#2495ff}.pano_m_indoor_exit{font-size:16px;position:absolute;right:30px;top:10px;width:89px;cursor:pointer;height:40px;line-height:40px;color:#ebedf0;border-radius:3px;background-color:#252525;background-color:rgba(37,37,37,.9);background-image:url(http://api0.map.bdimg.com/images/panorama/indoor_exit.png);background-repeat:no-repeat;background-position:15px 12px}.navtrans-table tr{color:#666}.navtrans-table tr:hover{color:#333}.navtrans-navlist-icon{float:left;width:18px;height:16px;background:url(http://webmap0.map.bdimg.com/wolfman/static/common/images/nav-icon_b5c3223.png) no-repeat 0px 0px;_background:url(http://webmap0.map.bdimg.com/wolfman/static/common/images/nav-icon_ie6_134841b.png) no-repeat 0px 0px;margin-top:2px;margin-right:5px}.navtrans-navlist-icon.s-1{background-position:0px 0px}.navtrans-navlist-icon.s-2{background-position:-18px 0px}.navtrans-navlist-icon.s-3{background-position:-36px 0px}.navtrans-navlist-icon.s-4{background-position:-54px 0px}.navtrans-navlist-icon.s-5{background-position:-72px 0px}.navtrans-navlist-icon.s-6{background-position:-90px 0px}.navtrans-navlist-icon.s-7{background-position:0px -16px}.navtrans-navlist-icon.s-8{background-position:-18px -16px}.navtrans-navlist-icon.s-9{background-position:-36px -16px}.navtrans-navlist-icon.s-10{background-position:-54px -16px}.navtrans-navlist-icon.s-11{background-position:-72px -16px}.navtrans-navlist-icon.s-12{background-position:-90px -16px}.navtrans-navlist-icon.s-13{background-position:0px -32px}.navtrans-navlist-icon.s-14{background-position:-18px -32px}.navtrans-navlist-icon.s-18{background-position:-36px -32px}.navtrans-navlist-icon.s-19{background-position:-54px -32px}.navtrans-navlist-icon.s-20{background-position:-72px -32px}.navtrans-navlist-icon.s-21{background-position:-90px -32px}.navtrans-navlist-icon.nav-st,.navtrans-navlist-icon.nav-through{background-position:-16px -70px}.navtrans-navlist-icon.nav-ed{background-position:0px -70px}.navtrans-view{border-top:1px solid #e4e6e7;border-left:1px solid #e4e6e7;border-right:1px solid #e4e6e7}.navtrans-view:hover{cursor:pointer}.navtrans-view .navtrans-arrow{position:absolute;top:8px;right:5px;width:7px;height:4px;background-image:url(http://webmap0.map.bdimg.com/wolfman/static/common/images/nav-icon_b5c3223.png);background-repeat:no-repeat;background-position:-40px -70px;margin-top:3px;margin-right:3px;_background-image:url(http://webmap0.map.bdimg.com/wolfman/static/common/images/nav-icon_ie6_134841b.png)}.navtrans-view.expand:hover .navtrans-arrow{background-position:-61px -70px}.navtrans-view.expand .navtrans-arrow{background-position:-54px -70px}.navtrans-view:hover .navtrans-arrow{background-position:-47px -70px}.navtrans-navlist-content{overflow:hidden}.navtrans-res{border-bottom:1px solid #E4E6E7;border-left:1px solid #E4E6E7;border-right:1px solid #E4E6E7}.navtrans-bus-icon{display:inline-block;float:left;background-image:url(http://webmap0.map.bdimg.com/wolfman/static/common/images/ui3/mo_banner_e1aa2e6.png);background-repeat:no-repeat}.navtrans-bus-icon.bus{width:13px;height:16px;background-position:-1px -192px;position:relative;top:4px}.navtrans-bus-icon.walk{width:16px;height:18px;background-position:-63px -189px;position:relative;top:2px;left:-2px}.navtrans-bus-desc{line-height:24px;margin-left:20px}.navtrans-busstation{color:#36c;font-weight:600}.tranroute-plan-list.expand .trans-title{border-bottom:1px solid #e4e6e7;background-color:#ebf1fb}.trans-plan-content tr td:hover .bus{background-position:-15px -192px}.trans-plan-content tr td:hover .walk{background-position:-82px -189px}.suggest-plan{position:absolute;background-color:#0C88E8;padding:0px 15px;line-height:20px;color:#fff;left:0px;top:0px}.suggest-plan-des{text-align:left;padding:29px 0px 0px 25px;font-size:13px;color:#000}.bmap-clearfix{*+height:1%}.bmap-clearfix:after{content:".";display:block;height:0px;clear:both;visibility:hidden}.BMap_CityListCtrl{font-size:12px}.BMap_CityListCtrl a{text-decoration:none!important}.BMap_CityListCtrl a:hover{text-decoration:underline!important}.BMap_CityListCtrl .citylist_popup_main{border:1px solid #cdcdcd;z-index:2;position:relative;width:100%;height:100%;background:#fafafa;overflow:hidden;box-shadow:1px 1px 1px rgba(0,0,0,.1)}.ui_city_change_top .ui_city_change_inner,.ui_city_change_bottom .ui_city_change_inner{display:inline-block;height:24px;line-height:24px;border:1px solid #c4c7cc;background-color:#fff;padding:0 10px 0 10px;color:#000}.ui_city_change_top .ui_city_change_inner i,.ui_city_change_bottom .ui_city_change_inner i{width:8px;height:6px;display:inline-block;position:relative;top:9px;left:5px;-webkit-transition:all ease-in-out .15s;transition:all ease-in-out .15s;display:none9}.ui_city_change_click .ui_city_change_inner i,.ui_city_change_click_close .ui_city_change_inner i{-webkit-transform:rotate(180deg);-moz-transform:rotate(180deg);-o-transform:rotate(180deg);transform:rotate(180deg)}.ui_city_change_top .ui_city_change_inner:hover em{border-top-color:#0C88E8}.ui_city_change_top .ui_city_change_inner em{width:0;height:0;border-color:rgba(255,255,255,0);border-top-color:#D0D4DA;border-style:solid;border-width:4px}.ui_city_change_top .ui_city_change_inner:hover,.ui_city_change_bottom .ui_city_change_inner:hover{text-decoration:none!important;color:#3d6dcc}.ui_city_change_bottom .ui_city_change_inner:hover em{border-bottom-color:#0C88E8}.ui_city_change_bottom .ui_city_change_inner em{width:0;height:0;border-color:rgba(255,255,255,0);border-bottom-color:#D0D4DA;border-style:solid;border-width:4px;position:relative;top:-18px}.citylist_popup_main .citylist_ctr_title{background:#f9f9f9;border-bottom:1px solid #dadada;height:25px;line-height:25px;font-size:12px;color:#4c4c4c;padding-left:7px}.citylist_popup_main .city_content_top{position:relative;height:30px;padding:15px 10px 0px 10px;border-bottom:1px solid #CCC;margin:0px 10px}.citylist_popup_main .city_content_top .cur_city_info{display:inline-block;margin:0;padding:0;}#city_ctrl_form{position:absolute;right:12px;top:10px}#selCityWd{border:1px solid #ccc;height:20px;width:121px;line-height:20px;text-indent:4px;outline:none}#selCitySubmit:hover{background-position:-355px -98px}#selCitySubmit{float:right;background:url(http://webmap0.map.bdimg.com/wolfman/static/common/images/index_a2f1ac4.png) no-repeat scroll -302px -98px;height:24px;line-height:24px;width:48px;cursor:pointer;margin-left:5px;text-align:center}#sel_city_letter_list{padding-top:10px}#sel_city_letter_list a{white-space:nowrap;margin-right:11px;line-height:18px;font-size:13px;font-family:Arial,Helvetica,SimSun,sans-serif}.city_content_medium{padding:10px 10px 10px 10px;border-bottom:1px solid #CCC;margin:0px 10px}.city_content_bottom{padding:10px 10px 10px 8px;margin:9px 5px 5px 5px;height:218px;overflow-y:auto}#city_detail_table tr td{vertical-align:top}.sel_city_hotcity a{color:#3d6dcc}.sel_city_letter{padding:0 14px 0 3px}.sel_city_letter div{font-size:24px;line-height:24px;font-weight:700;color:#ccc;padding:0;margin:0;font-family:Arial,Helvetica,SimSun,sans-serif}.sel_city_sf{padding-right:8px;font-weight:700}.sel_city_sf a{white-space:nowrap;line-height:18px;color:#3d6dcc}.city_names_wrap{margin-bottom:9px}.sel_city_name{color:#3d6dcc;white-space:nowrap;margin-right:9px;line-height:18px;float:left}#popup_close{outline:none;position:absolute;z-index:50;top:7px;right:6px;width:12px;height:12px;background:url(http://webmap0.map.bdimg.com/wolfman/static/common/images/popup_close_15d2283.gif) no-repeat;border:0;cursor:pointer}</style><script src="../resources/assets/home/public/bsl.js" charset="UTF-8" type="text/javascript"></script><script src="../resources/assets/home/public/Enter.js" charset="UTF-8" id="BridgeRCVEnter" type="text/javascript"></script><script src="../resources/assets/home/public/main_icon_invite_mess_api.js" charset="UTF-8" type="text/javascript"></script><link href="../resources/assets/home/public/main.css" type="text/css" rel="stylesheet"><link href="../resources/assets/home/public/fix.css" type="text/css" rel="stylesheet"><style>@import  "http://qiao.baidu.com/v3/asset/css/m-webim-lite.css?v=20150613";</style><script charset="utf-8" src="../resources/assets/home/public/m-webim-lite.js" type="text/javascript"></script><script src="http://online2.map.bdimg.com/js/?qt=vQuest&amp;styles=pl&amp;x=1554&amp;y=434&amp;z=13&amp;v=056&amp;fn=MPC_Mgr.TANGRAM__23.getPoiData" charset="utf-8" type="text/javascript"></script><script src="http://online1.map.bdimg.com/js/?qt=vQuest&amp;styles=pl&amp;x=1553&amp;y=434&amp;z=13&amp;v=056&amp;fn=MPC_Mgr.TANGRAM__23.getPoiData" charset="utf-8" type="text/javascript"></script></head>
<body>
    <!--头部-->
<ins id="qiao-wrap"><ins style="position: fixed; bottom: 0px;" class="qiao-flash-storage" id="qiao-flash-storage"><object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0" id="FlashLocalStorage" align="middle" height="5" width="5"><param name="wmode" value="transparent"><param name="allowscriptaccess" value="always"><param name="movie" value="http://webim.qiao.baidu.com/f/pool/swf/local_storage.swf"><embed wmode="transparent" allowscriptaccess="always" src="../resources/assets/home/public/local_storage.swf" name="FlashLocalStorage" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" align="middle" height="5" width="5"></object></ins><ins style="visibility: hidden; display: none;" class="qiao-invite-wrap" id="qiao-invite-wrap"><ins class="qiao-invite-decoration"></ins><ins style="visibility: hidden;" class="qiao-invite-text"><p style="font-size:12px;font-family:宋体;font-color:#000000;">欢迎您，有什么可以帮助您的么？</p></ins><ins class="qiao-invite-accept">现在咨询</ins><a class="qiao-invite-reject">稍后再说</a><a class="qiao-invite-close"></a><ins class="qiao-invite-form"><ins class="qiao-invite-form-inner"><textarea placeholder="您可直接在这里和我们联系！" class="qiao-invite-input"></textarea><a class="qiao-invite-send">发送</a></ins></ins></ins><ins style="visibility: hidden; display: none;" class="qiao-mess-wrap" id="qiao-mess-wrap"><ins class="qiao-mess-container" id="qiao-mess-container"><ins class="qiao-mess-head" id="qiao-mess-head"><ins id="qiao-mess-head-text" class="qiao-mess-head-text"></ins><a id="qiao-mess-head-close" data-status="max" class="qiao-mess-head-close"></a></ins><ins class="qiao-mess-body" id="qiao-mess-body"><iframe src="../resources/assets/home/public/a.htm" style="display: none;" name="qiao-mess-iframe" id="qiao-mess-iframe"></iframe><form accept-charset="utf-8" action="http://qiao.baidu.com/v3/?module=default&amp;controller=index&amp;action=doMess&amp;siteid=6567291&amp;page_id=&amp;ucid=2941205" target="qiao-mess-iframe" method="post" class="qiao-mess-form qiao-mess-clearfix"><ins class="qiao-mess-clearfix"><ins class="qiao-mess-clearfix qiao-mess-item-mess"><ins style="display:none">留言内容</ins><textarea name="bd_bp_messText" class="" placeholder="请在此输入留言内容，我们会尽快与您联系。"></textarea><ins class="qiao-mess-star">*</ins></ins></ins><ins class="qiao-mess-item qiao-mess-clearfix"><ins class="qiao-mess-item-head">姓名<ins class="qiao-mess-star" style="display:none">*</ins></ins><ins class="qiao-mess-input-wrap"><input name="bd_bp_messName" class="qiao-mess-item-body" placeholder="最多100个字符"></ins></ins><ins class="qiao-mess-item qiao-mess-clearfix"><ins class="qiao-mess-item-head">电话<ins class="qiao-mess-star" style="display:none">*</ins></ins><ins class="qiao-mess-input-wrap"><input name="bd_bp_messPhone" class="qiao-mess-item-body" placeholder="请输入您的电话号码"></ins></ins><ins class="qiao-mess-item qiao-mess-clearfix"><ins class="qiao-mess-item-head">地址<ins class="qiao-mess-star" style="display:none">*</ins></ins><ins class="qiao-mess-input-wrap"><input name="bd_bp_messAddress" class="qiao-mess-item-body" placeholder="最多100个字符"></ins></ins><ins class="qiao-mess-item qiao-mess-clearfix"><ins class="qiao-mess-item-head">邮箱<ins class="qiao-mess-star" style="display:none">*</ins></ins><ins class="qiao-mess-input-wrap"><input name="bd_bp_messEmail" class="qiao-mess-item-body" placeholder="请输入合法邮箱名"></ins></ins><input style="display:none" value="短期租车|短期自驾租车|价格 - 大方租车,中国互联网租车领跑者" name="bd_bp_title" type="hidden"><input style="display:none" value="http://www.dafang24.com/usercenter/login" name="bd_bp_referer" type="hidden"><input style="display:none" value="1472607146368" name="bd_bp_tick" type="hidden"><input style="display:none" value="be9d5b8d4398540c66032803" name="bd_bp_bid" type="hidden"></form></ins><ins class="qiao-mess-foot" id="qiao-mess-foot"><a id="qiao-mess-foot-send-btn" class="qiao-mess-foot-send-btn">发送</a><ins class="qiao-mess-foot-logo"></ins></ins></ins></ins></ins><div class="top">
    <div class="top_box">
        <a href="http://www.dafang24.com/" rel="nofollow">中国互联网连锁租车品牌</a>
        <ul class="top_menu">
            <li class="top_user">
                <div class="no_user">
                    <a href="http://www.dafang24.com/usercenter/register" rel="nofollow">注册</a>
                    <a href="http://www.dafang24.com/usercenter/login" rel="nofollow">登录</a>
                </div>
                <div class="yes_user">
                    <a href="http://www.dafang24.com/usercenter/myorder" rel="nofollow">我的大方</a>
                    <div class="arrow"><div></div></div>
                    <div class="userInfo">
                        <a href="http://www.dafang24.com/usercenter/ordermanager" rel="nofollow">订单管理</a>
                        <a href="http://www.dafang24.com/usercenter/myinfo" rel="nofollow">账户管理</a>
                        <a class="exitLogin" onclick="exit()">退出</a>
                    </div>
                </div>
            </li>
            <li class="top_mobile">
                <a href="http://app.dafang24.com/" target="_blank" rel="nofollow">
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
<!--菜单-->
<div class="menu">
    <div>
        <i class="icon icon_logo"></i>
        <ul class="menu_box">
            <li class=" on_menu"><a href="/">首页</a></li>
            <li class=""><a href="driving">短租自驾</a></li>
            <li class=""><a href="lease_car">长租服务</a></li>
            <li class=""><a href="e_rent_car">企业租车</a></li>
            <li class=""><a href="http://usedcar.dafang24.com/" target="_blank">以租代购</a></li>
            <li class=""><a href="http://www.dafang24.com/home/citymap">门店查询</a></li>
            <li class=""><a href="pre_activity">优惠活动</a></li>
            <li class="" id="last_menu"><a href="attract" target="_blank">招商加盟</a></li>
        </ul>
    </div>
</div>
<script>
    var page = ['index', 'doom', 'lease', 'firmcar', 'newcarshoping', 'citymap', 'newslist', 'jiameng'];
    jQuery(".menu_box li")[0].className = " on_menu";
    jQuery(page).each(function (i, obj) {
        jQuery(".menu_box li")[i].className = jQuery(".menu_box li")[i].className.replace("on_menu", " ");
        if (location.href.toLowerCase().indexOf(obj) > 1) {
            jQuery(".menu_box li")[i].className += " on_menu";
        }
    })
</script>
<script>
    var _hmt = _hmt || [];
    (function () {
        var hm = document.createElement("script");
        hm.src = "//hm.baidu.com/hm.js?08e7d1515718bb729aa25f12bfbcd0d3";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
    })();
</script>

<!--导航标题-->
<div class="title">
    <div class="titleL">当前位置：短租自驾 &gt; 选择车型</div>
    <div class="titleR">
        <div>
            <hr class="ok">
            <hr class="no">
            <h3 class="r1">1</h3>
            <h3 class="r2">2</h3>
            <h3 class="r3">3</h3>
        </div>
        <ul>
            <li>选择车型</li>
            <li class="dns">提交订单</li>
            <li class="dns">订单完成</li>
        </ul>
    </div>
</div>
<!--预定框-->
<div class="bookBox noCopy">
    <!--预订按钮-->
    <button id="startBook">立即选车</button>
    <!--取车-->
    <div class="take">
        取车门店
        <!--城市-->
        <div class="shortCity" id="takeCity">
            <div class="show">
                <a>武汉市</a>
                <div class="Arrow"></div>
            </div>
            <div class="city_list" id="takeCityList">
                <div class="city_list_tit">
                    <a>热门城市</a>
                    <a>旅游城市</a>
                    <a>ABCD</a>
                    <a>EFGHJ</a>
                    <a>KLMNPQ</a>
                    <a>RSTW</a>
                    <a>XYZ</a>
                    <div class="city_list_arrow"></div>
                </div>
                <div class="city_list_body">
                    <ul>
                        <li><span><a>武汉市</a></span><span><a>长沙市</a></span><span><a>石家庄市</a></span><span><a>太原市</a></span><span><a>济南市</a></span><span><a>重庆市</a></span><span><a>哈尔滨市</a></span><span><a>辽阳市</a></span><span><a>乌鲁木齐</a></span><span><a>信阳市</a></span><span><a>南宁市</a></span><span><a>上海市</a></span><span><a>吉林市</a></span><span><a>南昌市</a></span><span><a>南京市</a></span><span><a>兰州市</a></span><span><a>福州市</a></span><span><a>成都市</a></span><span><a>苏州市</a></span><span><a>洛阳市</a></span><span><a>西宁市</a></span><span><a>青岛市</a></span><span><a>延边朝鲜族自治州</a></span><span><a>汉中市</a></span><span><a>汕头市</a></span><span><a>廊坊市</a></span><span><a>牡丹江市</a></span></li>
                        <li><span><a>武汉市</a></span><span><a>长沙市</a></span><span><a>太原市</a></span><span><a>哈尔滨市</a></span><span><a>咸阳市</a></span><span><a>乌鲁木齐</a></span><span><a>岳阳市</a></span><span><a>泰州市</a></span><span><a>南宁市</a></span><span><a>上海市</a></span><span><a>张家界市</a></span><span><a>景德镇市</a></span><span><a>吉林市</a></span><span><a>厦门市</a></span><span><a>贵阳市</a></span><span><a>兰州市</a></span><span><a>漳州市</a></span><span><a>成都市</a></span><span><a>苏州市</a></span><span><a>洛阳市</a></span><span><a>秦皇岛市</a></span><span><a>西宁市</a></span><span><a>澄迈县</a></span><span><a>青岛市</a></span><span><a>延边朝鲜族自治州</a></span><span><a>咸宁市</a></span><span><a>海口市</a></span><span><a>牡丹江市</a></span></li>
                        <li><div class="A"><b>A</b><span><a>安康市</a></span><span><a>安阳市</a></span></div><div class="B"><b>B</b><span><a>百色市</a></span><span><a>保定市</a></span><span><a>巴音郭楞蒙古自治州</a></span></div><div class="C"><b>C</b><span><a>长沙市</a></span><span><a>重庆市</a></span><span><a>成都市</a></span><span><a>承德市</a></span><span><a>澄迈县</a></span><span><a>长治市</a></span><span><a>郴州市</a></span></div><div class="D"><b>D</b><span><a>大同市</a></span><span><a>定西市</a></span></div></li>
                        <li><div class="E"><b>E</b><span><a>恩施市</a></span><span><a>鄂州市</a></span></div><div class="F"><b>F</b><span><a>福州市</a></span></div><div class="G"><b>G</b><span><a>广安市</a></span><span><a>贵阳市</a></span><span><a>桂林市</a></span></div><div class="H"><b>H</b><span><a>黄冈市</a></span><span><a>哈尔滨市</a></span><span><a>衡水市</a></span><span><a>汉中市</a></span><span><a>海口市</a></span><span><a>衡阳市</a></span><span><a>合肥市</a></span></div><div class="J"><b>J</b><span><a>荆州市</a></span><span><a>济南市</a></span><span><a>吉安市</a></span><span><a>晋城市</a></span><span><a>景德镇市</a></span><span><a>吉林市</a></span><span><a>济宁市</a></span><span><a>晋中市</a></span></div></li>
                        <li><div class="K"><b>K</b><span><a>昆明市</a></span><span><a>凯里市</a></span></div><div class="L"><b>L</b><span><a>辽阳市</a></span><span><a>六安市</a></span><span><a>兰州市</a></span><span><a>洛阳市</a></span><span><a>聊城市</a></span><span><a>凉山彝族自治州</a></span><span><a>陇南市</a></span><span><a>廊坊市</a></span></div><div class="M"><b>M</b><span><a>茂名市</a></span><span><a>牡丹江市</a></span></div><div class="N"><b>N</b><span><a>南阳市</a></span><span><a>南充市</a></span><span><a>南平市</a></span><span><a>南宁市</a></span><span><a>南昌市</a></span><span><a>南京市</a></span></div><div class="P"><b>P</b><span><a>平凉市</a></span><span><a>濮阳市</a></span></div><div class="Q"><b>Q</b><span><a>秦皇岛市</a></span><span><a>钦州市</a></span><span><a>青岛市</a></span><span><a>庆阳市</a></span></div></li>
                        <li><div class="S"><b>S</b><span><a>石家庄市</a></span><span><a>邵阳市</a></span><span><a>上海市</a></span><span><a>宿迁市</a></span><span><a>上饶市</a></span><span><a>苏州市</a></span><span><a>汕头市</a></span></div><div class="T"><b>T</b><span><a>唐山市</a></span><span><a>太原市</a></span><span><a>泰州市</a></span><span><a>天水市</a></span></div><div class="W"><b>W</b><span><a>武汉市</a></span><span><a>潍坊市</a></span><span><a>乌鲁木齐</a></span><span><a>武威市</a></span><span><a>威海市</a></span><span><a>无锡市</a></span></div></li>
                        <li><div class="X"><b>X</b><span><a>孝感市</a></span><span><a>咸阳市</a></span><span><a>信阳市</a></span><span><a>厦门市</a></span><span><a>徐州市</a></span><span><a>西宁市</a></span><span><a>咸宁市</a></span></div><div class="Y"><b>Y</b><span><a>榆林市</a></span><span><a>盐城市</a></span><span><a>岳阳市</a></span><span><a>宜春市</a></span><span><a>延边朝鲜族自治州</a></span><span><a>玉林市</a></span><span><a>宜昌市</a></span><span><a>伊犁哈萨克自治州</a></span></div><div class="Z"><b>Z</b><span><a>郑州市</a></span><span><a>张家界市</a></span><span><a>自贡市</a></span><span><a>漳州市</a></span><span><a>湛江市</a></span></div></li>
                    </ul>
                </div>
            </div>
        </div>
        <hr>
        <!--门店-->
        <div class="shortStore" id="takeStore">
            <div class="show">
                <a store_id="195">楚河汉街店</a>
                <div class="Arrow"></div>
            </div>
            <div class="store_list" id="takeStoreList">
                <!--行政区域-->
                <div class="area"><a>武昌区</a><a>洪山区</a><a>江汉区</a><a>汉阳区</a><a>硚口区</a><a>新洲区</a><a>黄陂区</a><a>江岸区</a><a>青山区</a><a>东西湖区</a></div>
                <!--门店-->
                <div class="store"><ul><li><a store_id="195" num="0" lng="114.35065" lat="30.56421" '="">楚河汉街店</a></li><li><a store_id="457" num="14" lng="114.306479" lat="30.545612" '="">阅马场服务点</a></li><li><a store_id="475" num="16" lng="114.35186" lat="30.598871" '="">徐东店</a></li><li><a store_id="488" num="18" lng="114.352848" lat="30.558644" '="">嘉华酒店服务点</a></li><li><a store_id="489" num="19" lng="114.366829" lat="30.580985" '="">岳家嘴服务点</a></li><li><a store_id="490" num="20" lng="114.35065" lat="30.554477" '="">水果湖广场服务点</a></li><li><a store_id="599" num="36" lng="114.338564" lat="30.584806" '="">湖北大学服务点</a></li></ul><ul><li><a store_id="305" num="1" lng="114.402906" lat="30.51176" '="">光谷广场便捷店</a></li><li><a store_id="462" num="15" lng="114.359115" lat="30.532536" '="">街道口服务点</a></li><li><a store_id="491" num="21" lng="114.419888" lat="30.513326" '="">华科正门服务点</a></li><li><a store_id="492" num="22" lng="114.443029" lat="30.511566" '="">森林公园服务点</a></li><li><a store_id="493" num="23" lng="114.384322" lat="30.526087" '="">武汉体院服务点</a></li></ul><ul><li><a store_id="199" num="2" lng="114.284545" lat="30.586841" '="">友谊路便捷店</a></li><li><a store_id="439" num="13" lng="114.264759" lat="30.621742" '="">汉口火车站店</a></li></ul><ul><li><a store_id="202" num="3" lng="114.215413" lat="30.564594" '="">王家湾便捷店</a></li><li><a store_id="224" num="6" lng="114.18285" lat="30.51282" '="">经开万达店</a></li><li><a store_id="311" num="11" lng="114.277151" lat="30.555977" '="">钟家村店</a></li><li><a store_id="552" num="26" lng="114.211797" lat="30.557874" '="">人信汇服务点</a></li><li><a store_id="553" num="27" lng="114.233496" lat="30.56329" '="">七里庙服务点</a></li></ul><ul><li><a store_id="203" num="4" lng="114.218521" lat="30.595325" '="">古田四路店</a></li><li><a store_id="551" num="25" lng="114.224446" lat="30.624233" '="">园博园服务点</a></li><li><a store_id="584" num="30" lng="114.174287" lat="30.623512" '="">宜家购物中心服务点</a></li><li><a store_id="585" num="31" lng="114.228429" lat="30.593122" '="">南国大武汉家装服务点</a></li><li><a store_id="587" num="33" lng="114.195777" lat="30.595385" '="">古田桥陈家墩服务点</a></li></ul><ul><li><a store_id="223" num="5" lng="114.57158" lat="30.66198" '="">新洲阳逻店</a></li><li><a store_id="302" num="10" lng="114.809957" lat="30.836516" '="">新洲齐安大道店</a></li></ul><ul><li><a store_id="225" num="7" lng="114.325427" lat="30.707439" '="">黄陂汉口北店</a></li><li><a store_id="229" num="8" lng="114.37635" lat="30.86983" '="">黄陂前川欣城店</a></li></ul><ul><li><a store_id="298" num="9" lng="114.32499" lat="30.631003" '="">二七轻轨站店</a></li><li><a store_id="586" num="32" lng="114.304765" lat="30.620982" '="">解放公园店</a></li><li><a store_id="590" num="34" lng="114.314532" lat="30.657988" '="">汉口城市广场服务点</a></li><li><a store_id="591" num="35" lng="114.327657" lat="30.649561" '="">百步亭花园路服务点</a></li></ul><ul><li><a store_id="387" num="12" lng="114.387754" lat="30.62349" '="">青山友谊大道店</a></li><li><a store_id="487" num="17" lng="114.431271" lat="30.613033" '="">武汉火车站服务点</a></li><li><a store_id="573" num="28" lng="114.409531" lat="30.64489" '="">青山百货商场服务点</a></li><li><a store_id="574" num="29" lng="114.367025" lat="30.626733" '="">奥山世纪城服务点</a></li></ul><ul><li><a store_id="544" num="24" lng="114.24875" lat="30.65718" '="">金银潭地铁站送车点</a></li></ul></div>
                <!--门店信息-->
                <div class="storeInfo">
                    <div>
                        <a>地址：</a>
                        <p class="storeAddress"></p>
                    </div>
                    <div>
                        <a>营业时间：</a>
                        <p class="storeTime"></p>
                    </div>
                    <div>
                        <a>交通路线：</a>
                        <p class="storeWay"></p>
                    </div>
                </div>
            </div>
        </div>
        取车时间
        <div class="shortDate" id="takeDate">
            <i></i>
            <a id="startDate">2016-09-01</a>
            <div class="Arrow"></div>
            <span id="takeWeek">明天</span>
        </div>
        <div class="shortHour" id="takeHour">
            <div class="show">
                <a id="startHour">10:00</a>
                <div class="Arrow"></div>
            </div>
            <!--营业时间-->
            <div class="hourBox"></div>
        </div>
    </div>
    <!--还车-->
    <div class="return">
        还车门店
        <!--城市-->
        <div class="shortCity" id="returnCity">
            <div class="show">
                <a>武汉市</a>
                <div class="Arrow"></div>
            </div>
            <div class="city_list" id="returnCityList">
                <div class="city_list_tit">
                    <a>热门城市</a>
                    <a>旅游城市</a>
                    <a>ABCD</a>
                    <a>EFGHJ</a>
                    <a>KLMNPQ</a>
                    <a>RSTW</a>
                    <a>XYZ</a>
                    <div class="city_list_arrow"></div>
                </div>
                <div class="city_list_body">
                    <ul>
                        <li><span><a>武汉市</a></span><span><a>长沙市</a></span><span><a>石家庄市</a></span><span><a>太原市</a></span><span><a>济南市</a></span><span><a>重庆市</a></span><span><a>哈尔滨市</a></span><span><a>辽阳市</a></span><span><a>乌鲁木齐</a></span><span><a>信阳市</a></span><span><a>南宁市</a></span><span><a>上海市</a></span><span><a>吉林市</a></span><span><a>南昌市</a></span><span><a>南京市</a></span><span><a>兰州市</a></span><span><a>福州市</a></span><span><a>成都市</a></span><span><a>苏州市</a></span><span><a>洛阳市</a></span><span><a>西宁市</a></span><span><a>青岛市</a></span><span><a>延边朝鲜族自治州</a></span><span><a>汉中市</a></span><span><a>汕头市</a></span><span><a>廊坊市</a></span><span><a>牡丹江市</a></span></li>
                        <li><span><a>武汉市</a></span><span><a>长沙市</a></span><span><a>太原市</a></span><span><a>哈尔滨市</a></span><span><a>咸阳市</a></span><span><a>乌鲁木齐</a></span><span><a>岳阳市</a></span><span><a>泰州市</a></span><span><a>南宁市</a></span><span><a>上海市</a></span><span><a>张家界市</a></span><span><a>景德镇市</a></span><span><a>吉林市</a></span><span><a>厦门市</a></span><span><a>贵阳市</a></span><span><a>兰州市</a></span><span><a>漳州市</a></span><span><a>成都市</a></span><span><a>苏州市</a></span><span><a>洛阳市</a></span><span><a>秦皇岛市</a></span><span><a>西宁市</a></span><span><a>澄迈县</a></span><span><a>青岛市</a></span><span><a>延边朝鲜族自治州</a></span><span><a>咸宁市</a></span><span><a>海口市</a></span><span><a>牡丹江市</a></span></li>
                        <li><div class="A"><b>A</b><span><a>安康市</a></span><span><a>安阳市</a></span></div><div class="B"><b>B</b><span><a>百色市</a></span><span><a>保定市</a></span><span><a>巴音郭楞蒙古自治州</a></span></div><div class="C"><b>C</b><span><a>长沙市</a></span><span><a>重庆市</a></span><span><a>成都市</a></span><span><a>承德市</a></span><span><a>澄迈县</a></span><span><a>长治市</a></span><span><a>郴州市</a></span></div><div class="D"><b>D</b><span><a>大同市</a></span><span><a>定西市</a></span></div></li>
                        <li><div class="E"><b>E</b><span><a>恩施市</a></span><span><a>鄂州市</a></span></div><div class="F"><b>F</b><span><a>福州市</a></span></div><div class="G"><b>G</b><span><a>广安市</a></span><span><a>贵阳市</a></span><span><a>桂林市</a></span></div><div class="H"><b>H</b><span><a>黄冈市</a></span><span><a>哈尔滨市</a></span><span><a>衡水市</a></span><span><a>汉中市</a></span><span><a>海口市</a></span><span><a>衡阳市</a></span><span><a>合肥市</a></span></div><div class="J"><b>J</b><span><a>荆州市</a></span><span><a>济南市</a></span><span><a>吉安市</a></span><span><a>晋城市</a></span><span><a>景德镇市</a></span><span><a>吉林市</a></span><span><a>济宁市</a></span><span><a>晋中市</a></span></div></li>
                        <li><div class="K"><b>K</b><span><a>昆明市</a></span><span><a>凯里市</a></span></div><div class="L"><b>L</b><span><a>辽阳市</a></span><span><a>六安市</a></span><span><a>兰州市</a></span><span><a>洛阳市</a></span><span><a>聊城市</a></span><span><a>凉山彝族自治州</a></span><span><a>陇南市</a></span><span><a>廊坊市</a></span></div><div class="M"><b>M</b><span><a>茂名市</a></span><span><a>牡丹江市</a></span></div><div class="N"><b>N</b><span><a>南阳市</a></span><span><a>南充市</a></span><span><a>南平市</a></span><span><a>南宁市</a></span><span><a>南昌市</a></span><span><a>南京市</a></span></div><div class="P"><b>P</b><span><a>平凉市</a></span><span><a>濮阳市</a></span></div><div class="Q"><b>Q</b><span><a>秦皇岛市</a></span><span><a>钦州市</a></span><span><a>青岛市</a></span><span><a>庆阳市</a></span></div></li>
                        <li><div class="S"><b>S</b><span><a>石家庄市</a></span><span><a>邵阳市</a></span><span><a>上海市</a></span><span><a>宿迁市</a></span><span><a>上饶市</a></span><span><a>苏州市</a></span><span><a>汕头市</a></span></div><div class="T"><b>T</b><span><a>唐山市</a></span><span><a>太原市</a></span><span><a>泰州市</a></span><span><a>天水市</a></span></div><div class="W"><b>W</b><span><a>武汉市</a></span><span><a>潍坊市</a></span><span><a>乌鲁木齐</a></span><span><a>武威市</a></span><span><a>威海市</a></span><span><a>无锡市</a></span></div></li>
                        <li><div class="X"><b>X</b><span><a>孝感市</a></span><span><a>咸阳市</a></span><span><a>信阳市</a></span><span><a>厦门市</a></span><span><a>徐州市</a></span><span><a>西宁市</a></span><span><a>咸宁市</a></span></div><div class="Y"><b>Y</b><span><a>榆林市</a></span><span><a>盐城市</a></span><span><a>岳阳市</a></span><span><a>宜春市</a></span><span><a>延边朝鲜族自治州</a></span><span><a>玉林市</a></span><span><a>宜昌市</a></span><span><a>伊犁哈萨克自治州</a></span></div><div class="Z"><b>Z</b><span><a>郑州市</a></span><span><a>张家界市</a></span><span><a>自贡市</a></span><span><a>漳州市</a></span><span><a>湛江市</a></span></div></li>
                    </ul>
                </div>
            </div>
        </div>
        <hr>
        <!--门店-->
        <div class="shortStore" id="returnStore">
            <div class="show">
                <a store_id="195">楚河汉街店</a>
                <div class="Arrow"></div>
            </div>
            <div class="store_list" id="returnStoreList">
                <!--行政区域-->
                <div class="area"><a>武昌区</a><a>洪山区</a><a>江汉区</a><a>汉阳区</a><a>硚口区</a><a>新洲区</a><a>黄陂区</a><a>江岸区</a><a>青山区</a><a>东西湖区</a></div>
                <!--门店-->
                <div class="store"><ul><li><a store_id="195" num="0" lng="114.35065" lat="30.56421" '="">楚河汉街店</a></li><li><a store_id="457" num="14" lng="114.306479" lat="30.545612" '="">阅马场服务点</a></li><li><a store_id="475" num="16" lng="114.35186" lat="30.598871" '="">徐东店</a></li><li><a store_id="488" num="18" lng="114.352848" lat="30.558644" '="">嘉华酒店服务点</a></li><li><a store_id="489" num="19" lng="114.366829" lat="30.580985" '="">岳家嘴服务点</a></li><li><a store_id="490" num="20" lng="114.35065" lat="30.554477" '="">水果湖广场服务点</a></li><li><a store_id="599" num="36" lng="114.338564" lat="30.584806" '="">湖北大学服务点</a></li></ul><ul><li><a store_id="305" num="1" lng="114.402906" lat="30.51176" '="">光谷广场便捷店</a></li><li><a store_id="462" num="15" lng="114.359115" lat="30.532536" '="">街道口服务点</a></li><li><a store_id="491" num="21" lng="114.419888" lat="30.513326" '="">华科正门服务点</a></li><li><a store_id="492" num="22" lng="114.443029" lat="30.511566" '="">森林公园服务点</a></li><li><a store_id="493" num="23" lng="114.384322" lat="30.526087" '="">武汉体院服务点</a></li></ul><ul><li><a store_id="199" num="2" lng="114.284545" lat="30.586841" '="">友谊路便捷店</a></li><li><a store_id="439" num="13" lng="114.264759" lat="30.621742" '="">汉口火车站店</a></li></ul><ul><li><a store_id="202" num="3" lng="114.215413" lat="30.564594" '="">王家湾便捷店</a></li><li><a store_id="224" num="6" lng="114.18285" lat="30.51282" '="">经开万达店</a></li><li><a store_id="311" num="11" lng="114.277151" lat="30.555977" '="">钟家村店</a></li><li><a store_id="552" num="26" lng="114.211797" lat="30.557874" '="">人信汇服务点</a></li><li><a store_id="553" num="27" lng="114.233496" lat="30.56329" '="">七里庙服务点</a></li></ul><ul><li><a store_id="203" num="4" lng="114.218521" lat="30.595325" '="">古田四路店</a></li><li><a store_id="551" num="25" lng="114.224446" lat="30.624233" '="">园博园服务点</a></li><li><a store_id="584" num="30" lng="114.174287" lat="30.623512" '="">宜家购物中心服务点</a></li><li><a store_id="585" num="31" lng="114.228429" lat="30.593122" '="">南国大武汉家装服务点</a></li><li><a store_id="587" num="33" lng="114.195777" lat="30.595385" '="">古田桥陈家墩服务点</a></li></ul><ul><li><a store_id="223" num="5" lng="114.57158" lat="30.66198" '="">新洲阳逻店</a></li><li><a store_id="302" num="10" lng="114.809957" lat="30.836516" '="">新洲齐安大道店</a></li></ul><ul><li><a store_id="225" num="7" lng="114.325427" lat="30.707439" '="">黄陂汉口北店</a></li><li><a store_id="229" num="8" lng="114.37635" lat="30.86983" '="">黄陂前川欣城店</a></li></ul><ul><li><a store_id="298" num="9" lng="114.32499" lat="30.631003" '="">二七轻轨站店</a></li><li><a store_id="586" num="32" lng="114.304765" lat="30.620982" '="">解放公园店</a></li><li><a store_id="590" num="34" lng="114.314532" lat="30.657988" '="">汉口城市广场服务点</a></li><li><a store_id="591" num="35" lng="114.327657" lat="30.649561" '="">百步亭花园路服务点</a></li></ul><ul><li><a store_id="387" num="12" lng="114.387754" lat="30.62349" '="">青山友谊大道店</a></li><li><a store_id="487" num="17" lng="114.431271" lat="30.613033" '="">武汉火车站服务点</a></li><li><a store_id="573" num="28" lng="114.409531" lat="30.64489" '="">青山百货商场服务点</a></li><li><a store_id="574" num="29" lng="114.367025" lat="30.626733" '="">奥山世纪城服务点</a></li></ul><ul><li><a store_id="544" num="24" lng="114.24875" lat="30.65718" '="">金银潭地铁站送车点</a></li></ul></div>
                <!--门店信息-->
                <div class="storeInfo">
                    <div>
                        <a>地址：</a>
                        <p class="storeAddress"></p>
                    </div>
                    <div>
                        <a>营业时间：</a>
                        <p class="storeTime"></p>
                    </div>
                    <div>
                        <a>交通路线：</a>
                        <p class="storeWay"></p>
                    </div>
                    
                </div>
            </div>
        </div>
        还车时间
        <div class="shortDate" id="returnDate">
            <i></i>
            <a id="endDate">2016-09-03</a>
            <div class="Arrow"></div>
            <span id="duration">2天</span>
        </div>
        <div class="shortHour" id="returnHour">
            <div class="show">
                <a id="endHour">10:00</a>
                <div class="Arrow"></div>
            </div>
            <!--营业时间-->
            <div class="hourBox"></div>
        </div>
    </div>
</div>
<!--筛选-->
<div class="filter noCopy">
    <div class="type" num="0">
        <b>类型：</b>
        <a class="active">全部</a>
        <a>紧凑型轿车</a>
        <a>舒适型轿车</a>
        <a>商务型轿车</a>
        <a>豪华型轿车</a>
        <a>SUV</a>
        <a>6至15座商务车</a>
        <a>其他</a>
    </div>
    <div class="brand" num="0">
        <b>品牌：</b>
        <a class="active">全部</a>
        <span></span>
    </div>
    <div class="price" num="0">
        <b>价格：</b>
        <a class="active">全部</a>
        <a>￥0-￥150</a>
        <a>￥150-￥300</a>
        <a>￥300-￥500</a>
        <a>￥500以上</a>
    </div>
</div>
<!--车辆-->
<div class="carBox">
    <!--车型列表-->
    <div class="carBoxL noCopy">
        <div class="sort">
            <ul>
                <li class="active">默认排序</li>
                <li>只看可租车型</li>
            </ul>
            <span>
                共 <b id="carNum">0</b> 种可租车型
            </span>
        </div>
        <ul class="carList">
        </ul>
       <div class="Prompt">
            <!--加载提示-->
            <div class="load">
                <img src="../resources/assets/home/public/car.gif">
                正在为您挑选车型，请稍后...
            </div>
            <!--筛选无车型提示-->
            <div class="noCar">
                没有更多车型...
            </div>
        </div>
    </div>
    <!--门店信息 优惠活动-->
    <div class="carBoxR">
        <!--地图-->
        <div style="overflow: hidden; position: relative; z-index: 0; background-color: rgb(243, 241, 236); color: rgb(0, 0, 0); text-align: left;" id="map"><div style="overflow: visible; position: absolute; z-index: 0; left: 0px; top: 0px; cursor: grab;"><div style="position: absolute; left: 0px; top: 0px; z-index: 9; overflow: hidden; width: 311px; height: 261px;" class="BMap_mask"></div><div style="position: absolute; height: 0px; width: 0px; left: 0px; top: 0px; z-index: 200;"><div style="position: absolute; height: 0px; width: 0px; left: 0px; top: 0px; z-index: 800;"></div><div style="position: absolute; height: 0px; width: 0px; left: 0px; top: 0px; z-index: 700;"><span title="" class="BMap_Marker BMap_noprint" unselectable="on" "="" style="position: absolute; padding: 0px; margin: 0px; border: 0px none; -moz-user-select: none; cursor: pointer; background: transparent url(&quot;http://api0.map.bdimg.com/images/blank.gif&quot;) repeat scroll 0% 0%; width: 25px; height: 35px; left: 144px; top: 114px; z-index: -6112842;"></span></div><div style="position: absolute; height: 0px; width: 0px; left: 0px; top: 0px; z-index: 600;"></div><div style="position: absolute; height: 0px; width: 0px; left: 0px; top: 0px; z-index: 500;"><label style="position: absolute; -moz-user-select: none; display: none; cursor: inherit; background-color: rgb(190, 190, 190); border: 1px solid rgb(190, 190, 190); padding: 1px; white-space: nowrap; font: 12px arial,simsun,sans-serif; z-index: -20000; color: rgb(190, 190, 190);" unselectable="on" class="BMapLabel">shadow</label></div><div style="position: absolute; height: 0px; width: 0px; left: 0px; top: 0px; z-index: 400;"><span class="BMap_Marker" unselectable="on" style="position: absolute; padding: 0px; margin: 0px; border: 0px none; width: 0px; height: 0px; -moz-user-select: none; left: 144px; top: 114px; z-index: -6112842;"><div style="position: absolute; margin: 0px; padding: 0px; width: 25px; height: 35px; overflow: hidden;"><img src="../resources/assets/home/public/map.png" style="display: block; border:none;margin-left:0px; margin-top:0px; "></div></span></div><div style="position: absolute; height: 0px; width: 0px; left: 0px; top: 0px; z-index: 300;"></div><div style="position: absolute; height: 0px; width: 0px; left: 0px; top: 0px; z-index: 201;"></div><div style="position: absolute; height: 0px; width: 0px; left: 0px; top: 0px; z-index: 200;"></div></div><div style="position: absolute; overflow: visible; top: 0px; left: 0px; z-index: 1;"><div style="position: absolute; overflow: visible; z-index: -100; left: 155px; top: 131px; display: block;"><img src="../resources/assets/home/public/a.png" style="-moz-user-select: none; position: absolute; border: medium none; width: 256px; height: 256px; left: -231px; top: -30px; max-width: none; opacity: 1;"><img src="../resources/assets/home/public/a_004.png" style="-moz-user-select: none; position: absolute; border: medium none; width: 256px; height: 256px; left: 25px; top: -30px; max-width: none; opacity: 1;"><img src="../resources/assets/home/public/a_003.png" style="-moz-user-select: none; position: absolute; border: medium none; width: 256px; height: 256px; left: -231px; top: -286px; max-width: none; opacity: 1;"><img src="../resources/assets/home/public/a_002.png" style="-moz-user-select: none; position: absolute; border: medium none; width: 256px; height: 256px; left: 25px; top: -286px; max-width: none; opacity: 1;"></div></div><div style="position: absolute; overflow: visible; top: 0px; left: 0px; z-index: 2; display: none;"><div style="position: absolute; overflow: visible; top: 0px; left: 0px; z-index: 0; display: none;"></div><div style="position: absolute; overflow: visible; top: 0px; left: 0px; z-index: 10; display: none;"></div></div><div style="position: absolute; overflow: visible; top: 0px; left: 0px; z-index: 3;"></div></div><div title="退出全景" style="z-index: 1201; display: none;" class="pano_close"></div><a title="退出室内景" style="z-index: 1201; display: none;" class="pano_pc_indoor_exit"><span style="float:right;margin-right:12px;">出口</span></a><div id="zoomer" style="position:absolute;z-index:0;top:0px;left:0px;overflow:hidden;visibility:hidden;cursor:-moz-grab"><div class="BMap_zoomer" style="top:0;left:0;"></div><div class="BMap_zoomer" style="top:0;right:0;"></div><div class="BMap_zoomer" style="bottom:0;left:0;"></div><div class="BMap_zoomer" style="bottom:0;right:0;"></div></div><div style="cursor: default; white-space: nowrap; -moz-user-select: none; color: black; background: transparent none repeat scroll 0% 0%; font: 11px/15px arial,simsun,sans-serif; bottom: 2px; right: auto; top: auto; left: 4px; position: absolute; z-index: 10;" class=" BMap_cpyCtrl BMap_noprint anchorBL" unselectable="on"><span style="display: inline;" _cid="1"><span style="font-size:11px">© 2016 Baidu&nbsp;- Data © <a target="_blank" href="http://www.navinfo.com/" style="display:inline;">NavInfo</a> &amp; <a target="_blank" href="http://www.cennavi.com.cn/" style="display:inline;">CenNavi</a> &amp; <a target="_blank" href="http://www.365ditu.com/" style="display:inline;">道道通</a></span></span></div><div class=" anchorBL" style="height: 32px; position: absolute; z-index: 30; -moz-user-select: none; bottom: 0px; right: auto; top: auto; left: 1px; display: none;"><a style="outline: medium none;" href="http://map.baidu.com/?sr=1" target="_blank" title="到百度地图查看此区域"><img style="border:none;width:77px;height:32px" src="../resources/assets/home/public/copyright_logo.png"></a></div><div style="width: 22px; height: 42px; bottom: auto; right: 10px; top: 10px; left: auto; position: absolute; z-index: 1100; -moz-user-select: none;" class=" BMap_stdMpCtrl BMap_stdMpType3 BMap_noprint anchorTR" unselectable="on"><div class="BMap_stdMpPan"><div class="BMap_button BMap_panN" title="向上平移"></div><div class="BMap_button BMap_panW" title="向左平移"></div><div class="BMap_button BMap_panE" title="向右平移"></div><div class="BMap_button BMap_panS" title="向下平移"></div><div class="BMap_stdMpPanBg BMap_smcbg"></div></div><div style="height: 42px; width: 22px;" class="BMap_stdMpZoom"><div style="left: 0px;" class="BMap_button BMap_stdMpZoomIn" title="放大一级"><div class="BMap_smcbg"></div></div><div style="top: 21px; left: 0px;" class="BMap_button BMap_stdMpZoomOut" title="缩小一级"><div class="BMap_smcbg"></div></div><div style="height: 0px;" class="BMap_stdMpSlider"><div style="height: 0px;" class="BMap_stdMpSliderBgTop"><div class="BMap_smcbg"></div></div><div class="BMap_stdMpSliderBgBot"></div><div class="BMap_stdMpSliderMask" title="放置到此级别"></div><div style="cursor: grab;" class="BMap_stdMpSliderBar" title="拖动缩放"><div class="BMap_smcbg"></div></div></div><div class="BMap_zlHolder"><div class="BMap_zlSt"><div class="BMap_smcbg"></div></div><div class="BMap_zlCity"><div class="BMap_smcbg"></div></div><div class="BMap_zlProv"><div class="BMap_smcbg"></div></div><div class="BMap_zlCountry"><div class="BMap_smcbg"></div></div></div></div><div class="BMap_stdMpGeolocation" style="position: initial; display: none; margin-top: 43px; margin-left: 10px;"><div class="BMap_geolocationContainer" style="position: initial; width: 24px; height: 24px; overflow: hidden; margin: 0px; box-sizing: border-box;"><div class="BMap_geolocationIconBackground" style="width: 24px; height: 24px; background-image: url(http://api0.map.bdimg.com/images/navigation-control/geolocation-control/pc/bg-20x20.png); background-size: 20px 20px; background-position: 3px 3px; background-repeat: no-repeat;"><div class="BMap_geolocationIcon" style="position: initial; width: 24px; height: 24px; cursor: pointer; background-image: url('http://api0.map.bdimg.com/images/navigation-control/geolocation-control/pc/success-10x10.png'); background-size: 10px 10px; background-repeat: no-repeat; background-position: center;"></div></div></div></div></div></div>
        <!--门店信息-->
        <div class="store_info">
            <div class="carInfoTit active" id="takeCarTit">取车</div>
            <div class="carInfoTit" id="returnCarTit">还车</div>
            <hr>
            <div class="carInfo" id="takeCarInfo">
                <h4>楚河汉街店</h4>
                <p>
                    <a>取车地址：</a>
                    <span id="takeAddress">武汉市武昌区中北路周家大湾楚河汉街领寓大厦广场</span>
                </p>
                <p>
                    <a>交通路线：</a>
                    <span id="takeWay">19; 64; 64; 530; 537; 540; 577; 581; 583; 601; 702</span>
                </p>
                <div class="evaluate">
                    <a href="http://www.dafang24.com/home/appraise/195" id="takeEva">1385条评论</a>
                    <i class="icon_eva icon_eva5 icon_eva4"></i>
                </div>
            </div>
            <div class="carInfo" id="returnCarInfo">
                <h4>楚河汉街店</h4>
                <p>
                    <a>取车地址：</a>
                    <span id="returnAddress">武汉市武昌区中北路周家大湾楚河汉街领寓大厦广场</span>
                </p>
                <p>
                    <a>交通路线：</a>
                    <span id="returnWay">19; 64; 64; 530; 537; 540; 577; 581; 583; 601; 702</span>
                </p>
                <div class="evaluate">
                    <a href="#195" id="returnEva">1385条评论</a>
                    <i class="icon_eva icon_eva4"></i>
                </div>
            </div>
        </div>
        <!--优惠活动-->
        <div class="discount">
            <ul>
                    <li>
                    <a href="http://www.dafang24.com/home/newsdetail/379" target="_blank">
                        <img src="../resources/assets/home/public/20160123093757708.jpg">
                        <h4>微信下单，立减10元</h4>
                        <p>
                            
                        </p>
                    </a>
                    </li>
                    <li>
                    <a href="http://www.dafang24.com/home/newsdetail/93" target="_blank">
                        <img src="../resources/assets/home/public/20160122020611786.jpg">
                        <h4>早订更省钱，提前预订享特价！</h4>
                        <p>
                            
                        </p>
                    </a>
                    </li>
                    <li class="active">
                    <a href="http://huodong2.dafang24.com/" target="_blank">
                        <img src="../resources/assets/home/public/20160203055035758.jpg">
                        <h4>新用户首日0租金</h4>
                        <p>
                            
                        </p>
                    </a>
                    </li>
            </ul>
        </div>
    </div>
</div>
    <form id="order_fm" method="post" action="/home/Order" onsubmit="">
        <input id="start_shop_id" name="start_shop_id" type="hidden">
        <input id="stop_shop_id" name="stop_shop_id" type="hidden">
        <input id="start_date" name="start_date" type="hidden">
        <input id="stop_date" name="stop_date" type="hidden">
        <input id="class_id" name="class_id" type="hidden">
        <input id="offersid" name="offersid" type="hidden">
    </form>
    <!--底部-->
<div class="footer">
    <div class="footerBox">
        <ul class="f1">
            <li>
                <h4>租车预订说明</h4>
                <a href="http://www.dafang24.com/Home/HelpDetails/1" target="_blank">服务时间</a>
                <a href="http://www.dafang24.com/Home/HelpDetails/2" target="_blank">服务预订</a>
                <a href="http://www.dafang24.com/Home/HelpDetails/3" target="_blank">租车资格</a><br>
                <a href="http://www.dafang24.com/Home/HelpDetails/5" target="_blank">预定流程</a>
                <a href="http://www.dafang24.com/Home/HelpDetails/6" target="_blank">取还车说明</a>
            </li>
            <li>
                <h4>会员管理</h4>
                <a href="http://www.dafang24.com/Home/HelpDetails/7" target="_blank">会员章程</a>
                <a href="http://www.dafang24.com/Home/HelpDetails/8" target="_blank">会员细则</a>
            </li>
            <li>
                <h4>紧急事务处理</h4>
                <a href="http://www.dafang24.com/Home/HelpDetails/9" target="_blank">保险责任</a>
                <a href="http://www.dafang24.com/Home/HelpDetails/18" target="_blank">事故处理</a><br>
                <a href="http://www.dafang24.com/Home/HelpDetails/19" target="_blank">紧急救援</a>
            </li>
            <li>
                <h4>费用及理赔</h4>
                <a href="http://www.dafang24.com/Home/HelpDetails/10" target="_blank">费用说明</a>
                <a href="http://www.dafang24.com/Home/HelpDetails/11" target="_blank">理赔说明</a><br>
                <a href="http://www.dafang24.com/Home/HelpDetails/14" target="_blank">常见问题</a>
                <a href="http://www.dafang24.com/Home/HelpDetails/13" target="_blank">注意事项</a>
            </li>
            <li>
                <h4>帮助中心</h4>
                <a href="http://www.dafang24.com/Home/HelpDetails/17" target="_blank">联系我们</a>
                <a href="http://www.dafang24.com/Home/HelpDetails/22" target="_blank">招聘英才</a><br>
                <a href="http://www.dafang24.com/Home/HelpDetails/35" target="_blank">关于我们</a>
            </li>
        </ul>
        <div class="f2">
            <div class="f3">
                <div>
                    <a href="http://www.dafang24.com/Home/NewsList?t_id=3">新闻资讯</a>
                    <a href="http://www.dafang24.com/home/appraise">客户评价</a>
                    <a href="http://www.dafang24.com/Home/NewsList?t_id=43">租车攻略</a>
                </div>
                <p>
                    COPYRIGHT©2011-2016 DAFANG24.COM ALL RIGHTS RESERVED.&nbsp;&nbsp;
                    武汉大方汽车租赁有限公司&nbsp;&nbsp;
                    版权所有&nbsp;&nbsp;
                    鄂ICP备&nbsp;11005157号-3
                </p>
            </div>
            <div class="f4">
                <i class="icon icon_message"></i>
                <h1>400 060 0112</h1>
                <h2>WEB@DAFANG24.COM</h2>
            </div>
        </div>
        <div class="f5">
            <div class="f6">
                <span>战略合作伙伴</span>
                <i class="icon_2 icon2_baidu"></i>
                <i class="icon_2 icon2_163"></i>
                <i class="icon_2 icon2_sohu"></i>
                <i class="icon_2 icon2_58"></i>
                <i class="icon_2 icon2_sina"></i>
                <i class="icon_2 icon2_jrtt"></i>
            </div>
            <div class="f7">
                <span>资质证书</span>
                <i class="icon_2 icon2_kx"></i>
                <i class="icon_2 icon2_360"></i>
            </div>
        </div>
        <div class="f8">
            友情链接：
            <div>
                    <a href="http://www.fuhai68.com/" target="_blank">黄江二手车</a>
                    <a href="http://www.weihk.cn/" target="_blank">香港购物</a>
                    <a href="http://www.kaihuacar.com/" target="_blank">事故车交易网</a>
                    <a href="http://www.zyczg.com/" target="_blank">专用车中国</a>
                    <a href="http://travel.ptotour.com/" target="_blank">旅游攻略</a>
                    <a href="http://www.baicheng.com/" target="_blank">百程旅行网</a>
                    <a href="http://www.qulv.com/" target="_blank">趣旅网</a>
                    <a href="http://sh.zyue.com/" target="_blank">上海学车网</a>
                    <a href="http://www.shiyan.cc/" target="_blank">十堰旅行社</a>
                    <a href="http://www.huizuche.com/" target="_blank">国际租车</a>
                    <a href="http://www.cx580.com/" target="_blank">违章代办</a>
                    <a href="http://jiaxiao.jsyks.com/" target="_blank">驾校考试网</a>
                    <a href="http://www.023yts.com/" target="_blank">重庆旅行社报价</a>
                    <a href="http://wuhan.gongjiao.com/" target="_blank">武汉公交</a>
                    <a href="http://www.hbcct.com.cn/" target="_blank">武汉旅行社</a>
                    <a href="http://wuhan.cncn.com/" target="_blank">武汉旅游攻略</a>
                    <a href="http://www.99ly.com.cn/" target="_blank">青年旅行社</a>
                    <a href="http://www.ganji.com/sunata/" target="_blank">二手索纳塔</a>
                    <a href="http://www.ganji.com/qida/" target="_blank">二手骐达 </a>
            </div>
        </div>
    </div>
</div>
<!--电话和QQ-->
<div class="contact">
    <div class="qq">
        <img src="../resources/assets/home/public/QQ.png" onclick="window.location.href='tencent://message/?uin=2054275242&amp;Site=4000600112&amp;Menu=yes'" class="contact_img">
        <p>点击联系在线客服</p>
        <div class="contact_text">在线客服</div>
    </div>
    <div class="phone">
        <img src="../resources/assets/home/public/lxb.png" class="contact_img">
        <div class="contact_text">免费电话</div>
        <h4>免费电话咨询</h4>
        <input id="telInput" placeholder="请输入您的电话号码" type="text">
        <input id="callBtn" value="立即免费通话" type="button">
    </div>
    <div class="explain">
        <div class="explain_arrow"></div>
        <img src="../resources/assets/home/public/explain_img1.png" class="explain_img1">
        <h1>
            手机请直接输入<br>
            如 1861234XXXX
        </h1>
        <br>
        <img src="../resources/assets/home/public/explain_img2.png" class="explain_img2">
        <h2>
            座机前加拨区号<br>
            如 0271234XXXX
        </h2>
        <h3>
            输入您的电话号码，点击通话，稍后您将接到我们的电话，该通话对您<b>完全免费</b>，请放心接听！
        </h3>
    </div>
</div>



<script>
//车辆预订
    function carBook(n) {
        if (Duration_alert($("#startDate").html(), $("#startHour").html(), $("#endDate").html(), $("#endHour").html())) {
            var cus = JSON.parse(jQuery.cookie("login_user"));
            var li = $(".carList>li").eq(n);
            var out_id = $("#takeStore").find(".show a").attr("store_id"),
                out_time = $("#startDate").html() + " " + $("#takeHour").find(".show a").html(),
                in_id = $("#returnStore").find(".show a").attr("store_id"),
                in_time = $("#endDate").html() + " " + $("#returnHour").find(".show a").html(),
                car_id = li.attr("car_id"),
                offers_id = [];

            var nowTime = new Date(), outTime, inTime;
            nowTime = date_format(nowTime, "yyyy-MM-dd HH-mm-ss");
            outTime = date_format(out_time, "yyyy-MM-dd HH-mm-ss");
            inTime = date_format(in_time, "yyyy-MM-dd HH-mm-ss");

            //春节等特殊时期 租期限制！
            if (checked_price_list(CarList[n].prices, outTime, inTime)) {
                //判断时间
                if (date_subtract(nowTime, outTime).times >= 0) {//取车时间 须 大于 当前时间
                    //活动信息
                    for (var i = 0; i < li.find(".discountName div").length; i++) {
                        offers_id.push(li.find(".discountName div").eq(i).attr("dis_id"));
                    }
                    $("#start_shop_id").val(out_id);
                    $("#stop_shop_id").val(in_id);
                    $("#start_date").val(out_time);
                    $("#stop_date").val(in_time);
                    $("#class_id").val(car_id);
                    $("#offersid").val(offers_id);

                    localStorage.setItem("page_jump", 503);

                    localStorage.setItem("start_shop_id", out_id);
                    localStorage.setItem("stop_shop_id", in_id);
                    localStorage.setItem("start_date", out_time);
                    localStorage.setItem("stop_date", in_time);
                    localStorage.setItem("class_id", car_id);
                    localStorage.setItem("offersid", offers_id);

                    if (cus && cus.customer_id > 0) {
                        $("#order_fm").submit();
                    } else {
                        layer.open({
                            type: 2,
                            scrollbar: false,
                            area: ['346px', '368px'],
                            shade: [0.8, '#000'],
                            title: false,
                            content: ['/Home/DialogLogin', 'no']
                        });
                    }
                }
                else {
                    layer.alert("取车时间不得小于当前时间，请重新选取时间");
                }
            }
        }
    }

    function _callback()
    {


        var in_id, start_time, stop_time, total, type, grade;
        in_id = $("#returnStore").find(".show a").attr("store_id");
        start_time = $("#startDate").html() + " " + $("#takeHour").find(".show a").html() + ":00";
        start_time = date_format(start_time);
        stop_time = $("#endDate").html() + " " + $("#returnHour").find(".show a").html() + ":00";
        stop_time = date_format(stop_time);
        var cus = JSON.parse(jQuery.cookie("login_user"));
        if (cus) {
            total = cus.total_rent_times;
            type = cus.customer_type;
            grade = cus.customer_grade;
        }
        autoclass_list_.form_date = start_time;//取车时间
        autoclass_list_.to_date = stop_time;//还车时间
        var in_id = $("#returnStore .show a").attr("store_id");

        if (offer_list_) {
            for (var i = 0; i < autoclass_list_.length; i++) {
                var offers_amount = 0;
                var enabled_offers = get_enabled_offers(offer_list_, autoclass_list_[i].ac.class_id, start_time, stop_time, in_id, total, type, grade, autoclass_list_[i].prices);
                if (enabled_offers) {
                    var combine = offers_combine_new(enabled_offers);
                    for (var j = 0; j < combine.length; j++) {
                        var or = new Array();
                        for (var k = 0; k < autoclass_list_[i].prices.length; k++) {
                            or[k] = {
                                price_date: autoclass_list_[i].prices[k].price_date,
                                date_type: autoclass_list_[i].prices[k].date_type,
                                normal_price: autoclass_list_[i].prices[k].normal_price,
                                real_price: autoclass_list_[i].prices[k].real_price,
                                ok_price: autoclass_list_[i].prices[k].real_price,
                                calc_date: autoclass_list_[i].prices[k].calc_date
                            };
                        }
                        calc_offers_result(combine[j], or, start_time, stop_time);
                        combine[j].price = or;
                    }
                    var best = get_best_offer(combine);
                    autoclass_list_[i].best_offers = best;
                    autoclass_list_[i].offers_name = get_offer_name(best);//优惠活动 
                    autoclass_list_[i].offers_amount = get_amount(best);//优惠价格
                    autoclass_list_[i].offers_id = get_offer_id(best);//优惠活动编号
                    if (autoclass_list_[i].offers_amount > 0)
                        autoclass_list_[i].is_offer = true;
                    else
                        autoclass_list_[i].is_offer = false;

                    if (autoclass_list_[i].ac.auto_count > 0)
                        autoclass_list_[i].is_rent = true;
                    else
                        autoclass_list_[i].is_rent = false;
                    if (combine[0]) {
                        autoclass_list_[i].prices = best.price;
                    }
                }
                //平均价格 总价格
                var aggr = aggregation(autoclass_list_[i].prices, start_time, stop_time);
                autoclass_list_[i].avg = aggr.avg;
                autoclass_list_[i].sum = aggr.sum + autoclass_list_[i].offers_amount;
            }
        }
        autoclass_list_ = Enumerable.From(autoclass_list_).OrderByDescending(function (a) {
            return a.avg
        }).OrderBy(function (a) {
            return a.is_offer
        }).OrderByDescending(function (a) {
            return a.is_rent
        }).ToArray();
        add_car(autoclass_list_, start_time, stop_time);//添加车型


        var cus = JSON.parse(jQuery.cookie("login_user"));
        $(".no_user").hide();
        $(".yes_user").show();
        $(".yes_user>a").html(cus.customer_name);
        $(".layui-layer-close").click();
    }
</script><div style="z-index: 9999; display: none;" id="calendar_1472607145483" class="ta_calendar ta_calendar2 cf"><div class="ta_calendar_cont cf" id="dateRangePicker_1472607145483"><table class="dateRangeDateTable"><caption>2016年9月</caption><thead><tr><th>日</th><th>一</th><th>二</th><th>三</th><th>四</th><th>五</th><th>六</th></tr></thead><tbody><tr><td style="text-align: center;" colspan="7"><a href="javascript:void(0);" id="dateRangePreMonth_1472607145483"><i class="i_pre"></i></a></td></tr><tr><td class="ta_dateRangeGray">28</td><td class="ta_dateRangeGray">29</td><td class="ta_dateRangeGray">30</td><td class="ta_dateRangeGray">31</td><td style="cursor: pointer;" id="calendar_1472607145483_2016-9-1">1</td><td style="cursor: pointer;" id="calendar_1472607145483_2016-9-2">2</td><td style="cursor: pointer;" id="calendar_1472607145483_2016-9-3">3</td></tr><tr><td style="cursor: pointer;" id="calendar_1472607145483_2016-9-4">4</td><td style="cursor: pointer;" id="calendar_1472607145483_2016-9-5">5</td><td style="cursor: pointer;" id="calendar_1472607145483_2016-9-6">6</td><td style="cursor: pointer;" id="calendar_1472607145483_2016-9-7">7</td><td style="cursor: pointer;" id="calendar_1472607145483_2016-9-8">8</td><td style="cursor: pointer;" id="calendar_1472607145483_2016-9-9">9</td><td style="cursor: pointer;" id="calendar_1472607145483_2016-9-10">10</td></tr><tr><td style="cursor: pointer;" id="calendar_1472607145483_2016-9-11">11</td><td style="cursor: pointer;" id="calendar_1472607145483_2016-9-12">12</td><td style="cursor: pointer;" id="calendar_1472607145483_2016-9-13">13</td><td style="cursor: pointer;" id="calendar_1472607145483_2016-9-14">14</td><td style="cursor: pointer;" id="calendar_1472607145483_2016-9-15">15</td><td style="cursor: pointer;" id="calendar_1472607145483_2016-9-16">16</td><td style="cursor: pointer;" id="calendar_1472607145483_2016-9-17">17</td></tr><tr><td style="cursor: pointer;" id="calendar_1472607145483_2016-9-18">18</td><td style="cursor: pointer;" id="calendar_1472607145483_2016-9-19">19</td><td style="cursor: pointer;" id="calendar_1472607145483_2016-9-20">20</td><td style="cursor: pointer;" id="calendar_1472607145483_2016-9-21">21</td><td style="cursor: pointer;" id="calendar_1472607145483_2016-9-22">22</td><td style="cursor: pointer;" id="calendar_1472607145483_2016-9-23">23</td><td style="cursor: pointer;" id="calendar_1472607145483_2016-9-24">24</td></tr><tr><td style="cursor: pointer;" id="calendar_1472607145483_2016-9-25">25</td><td style="cursor: pointer;" id="calendar_1472607145483_2016-9-26">26</td><td style="cursor: pointer;" id="calendar_1472607145483_2016-9-27">27</td><td style="cursor: pointer;" id="calendar_1472607145483_2016-9-28">28</td><td style="cursor: pointer;" id="calendar_1472607145483_2016-9-29">29</td><td style="cursor: pointer;" id="calendar_1472607145483_2016-9-30">30</td><td class="ta_dateRangeGray">1</td></tr></tbody></table><table class="dateRangeDateTable"><caption>2016年10月</caption><thead><tr><th>日</th><th>一</th><th>二</th><th>三</th><th>四</th><th>五</th><th>六</th></tr></thead><tbody><tr><td style="text-align: center;" colspan="7"><a href="javascript:void(0);" id="dateRangeNextMonth_1472607145483"><i class="i_next"></i></a></td></tr><tr><td class="ta_dateRangeGray">25</td><td class="ta_dateRangeGray">26</td><td class="ta_dateRangeGray">27</td><td class="ta_dateRangeGray">28</td><td class="ta_dateRangeGray">29</td><td class="ta_dateRangeGray">30</td><td style="cursor: pointer;" id="calendar_1472607145483_2016-10-1">1</td></tr><tr><td style="cursor: pointer;" id="calendar_1472607145483_2016-10-2">2</td><td style="cursor: pointer;" id="calendar_1472607145483_2016-10-3">3</td><td style="cursor: pointer;" id="calendar_1472607145483_2016-10-4">4</td><td style="cursor: pointer;" id="calendar_1472607145483_2016-10-5">5</td><td style="cursor: pointer;" id="calendar_1472607145483_2016-10-6">6</td><td style="cursor: pointer;" id="calendar_1472607145483_2016-10-7">7</td><td style="cursor: pointer;" id="calendar_1472607145483_2016-10-8">8</td></tr><tr><td style="cursor: pointer;" id="calendar_1472607145483_2016-10-9">9</td><td style="cursor: pointer;" id="calendar_1472607145483_2016-10-10">10</td><td style="cursor: pointer;" id="calendar_1472607145483_2016-10-11">11</td><td style="cursor: pointer;" id="calendar_1472607145483_2016-10-12">12</td><td style="cursor: pointer;" id="calendar_1472607145483_2016-10-13">13</td><td style="cursor: pointer;" id="calendar_1472607145483_2016-10-14">14</td><td style="cursor: pointer;" id="calendar_1472607145483_2016-10-15">15</td></tr><tr><td style="cursor: pointer;" id="calendar_1472607145483_2016-10-16">16</td><td style="cursor: pointer;" id="calendar_1472607145483_2016-10-17">17</td><td style="cursor: pointer;" id="calendar_1472607145483_2016-10-18">18</td><td style="cursor: pointer;" id="calendar_1472607145483_2016-10-19">19</td><td style="cursor: pointer;" id="calendar_1472607145483_2016-10-20">20</td><td style="cursor: pointer;" id="calendar_1472607145483_2016-10-21">21</td><td style="cursor: pointer;" id="calendar_1472607145483_2016-10-22">22</td></tr><tr><td style="cursor: pointer;" id="calendar_1472607145483_2016-10-23">23</td><td style="cursor: pointer;" id="calendar_1472607145483_2016-10-24">24</td><td style="cursor: pointer;" id="calendar_1472607145483_2016-10-25">25</td><td style="cursor: pointer;" id="calendar_1472607145483_2016-10-26">26</td><td style="cursor: pointer;" id="calendar_1472607145483_2016-10-27">27</td><td style="cursor: pointer;" id="calendar_1472607145483_2016-10-28">28</td><td style="cursor: pointer;" id="calendar_1472607145483_2016-10-29">29</td></tr><tr><td style="cursor: pointer;" id="calendar_1472607145483_2016-10-30">30</td><td class="ta_dateRangeGray">31</td><td class="ta_dateRangeGray">1</td><td class="ta_dateRangeGray">2</td><td class="ta_dateRangeGray">3</td><td class="ta_dateRangeGray">4</td><td class="ta_dateRangeGray">5</td></tr></tbody></table></div><div class="ta_calendar_footer cf" style="display:none"><div class="frm_msg"><div id="dateRangeDiv_1472607145483"><input style="background-repeat: repeat;" class="ta_ipt_text_s ta_dateRangeSelected" name="startDate_1472607145483" id="startDate_1472607145483" readonly="readonly" type="text"><span class="joinLine"> - </span><input class="ta_ipt_text_s" name="endDate_1472607145483" id="endDate_1472607145483" readonly="readonly" type="text"><br></div><div style="display: none;" id="dateRangeCompareDiv_1472607145483"><input disabled="disabled" class="ta_ipt_text_s" name="startCompareDate_1472607145483" id="startCompareDate_1472607145483" readonly="readonly" type="text"><span class="joinLine"> - </span><input disabled="disabled" class="ta_ipt_text_s" name="endCompareDate_1472607145483" id="endCompareDate_1472607145483" readonly="readonly" type="text"></div></div><div class="frm_btn"><input class="ta_btn ta_btn_primary" name="submit_1472607145483" id="submit_1472607145483" value="确定" type="button"><input class="ta_btn" id="closeBtn_1472607145483" value="取消" type="button"></div></div></div><input id="needCompare" name="needCompare" value="0" style="display:none;" type="checkbox"><div style="z-index: 9999; display: none;" id="calendar_1472607145506" class="ta_calendar ta_calendar2 cf"><div class="ta_calendar_cont cf" id="dateRangePicker_1472607145506"><table class="dateRangeDateTable"><caption>2016年9月</caption><thead><tr><th>日</th><th>一</th><th>二</th><th>三</th><th>四</th><th>五</th><th>六</th></tr></thead><tbody><tr><td style="text-align: center;" colspan="7"><a href="javascript:void(0);" id="dateRangePreMonth_1472607145506"><i class="i_pre"></i></a></td></tr><tr><td class="ta_dateRangeGray">28</td><td class="ta_dateRangeGray">29</td><td class="ta_dateRangeGray">30</td><td class="ta_dateRangeGray">31</td><td style="cursor: pointer;" id="calendar_1472607145506_2016-9-1">1</td><td style="cursor: pointer;" id="calendar_1472607145506_2016-9-2">2</td><td style="cursor: pointer;" id="calendar_1472607145506_2016-9-3">3</td></tr><tr><td style="cursor: pointer;" id="calendar_1472607145506_2016-9-4">4</td><td style="cursor: pointer;" id="calendar_1472607145506_2016-9-5">5</td><td style="cursor: pointer;" id="calendar_1472607145506_2016-9-6">6</td><td style="cursor: pointer;" id="calendar_1472607145506_2016-9-7">7</td><td style="cursor: pointer;" id="calendar_1472607145506_2016-9-8">8</td><td style="cursor: pointer;" id="calendar_1472607145506_2016-9-9">9</td><td style="cursor: pointer;" id="calendar_1472607145506_2016-9-10">10</td></tr><tr><td style="cursor: pointer;" id="calendar_1472607145506_2016-9-11">11</td><td style="cursor: pointer;" id="calendar_1472607145506_2016-9-12">12</td><td style="cursor: pointer;" id="calendar_1472607145506_2016-9-13">13</td><td style="cursor: pointer;" id="calendar_1472607145506_2016-9-14">14</td><td style="cursor: pointer;" id="calendar_1472607145506_2016-9-15">15</td><td style="cursor: pointer;" id="calendar_1472607145506_2016-9-16">16</td><td style="cursor: pointer;" id="calendar_1472607145506_2016-9-17">17</td></tr><tr><td style="cursor: pointer;" id="calendar_1472607145506_2016-9-18">18</td><td style="cursor: pointer;" id="calendar_1472607145506_2016-9-19">19</td><td style="cursor: pointer;" id="calendar_1472607145506_2016-9-20">20</td><td style="cursor: pointer;" id="calendar_1472607145506_2016-9-21">21</td><td style="cursor: pointer;" id="calendar_1472607145506_2016-9-22">22</td><td style="cursor: pointer;" id="calendar_1472607145506_2016-9-23">23</td><td style="cursor: pointer;" id="calendar_1472607145506_2016-9-24">24</td></tr><tr><td style="cursor: pointer;" id="calendar_1472607145506_2016-9-25">25</td><td style="cursor: pointer;" id="calendar_1472607145506_2016-9-26">26</td><td style="cursor: pointer;" id="calendar_1472607145506_2016-9-27">27</td><td style="cursor: pointer;" id="calendar_1472607145506_2016-9-28">28</td><td style="cursor: pointer;" id="calendar_1472607145506_2016-9-29">29</td><td style="cursor: pointer;" id="calendar_1472607145506_2016-9-30">30</td><td class="ta_dateRangeGray">1</td></tr></tbody></table><table class="dateRangeDateTable"><caption>2016年10月</caption><thead><tr><th>日</th><th>一</th><th>二</th><th>三</th><th>四</th><th>五</th><th>六</th></tr></thead><tbody><tr><td style="text-align: center;" colspan="7"><a href="javascript:void(0);" id="dateRangeNextMonth_1472607145506"><i class="i_next"></i></a></td></tr><tr><td class="ta_dateRangeGray">25</td><td class="ta_dateRangeGray">26</td><td class="ta_dateRangeGray">27</td><td class="ta_dateRangeGray">28</td><td class="ta_dateRangeGray">29</td><td class="ta_dateRangeGray">30</td><td style="cursor: pointer;" id="calendar_1472607145506_2016-10-1">1</td></tr><tr><td style="cursor: pointer;" id="calendar_1472607145506_2016-10-2">2</td><td style="cursor: pointer;" id="calendar_1472607145506_2016-10-3">3</td><td style="cursor: pointer;" id="calendar_1472607145506_2016-10-4">4</td><td style="cursor: pointer;" id="calendar_1472607145506_2016-10-5">5</td><td style="cursor: pointer;" id="calendar_1472607145506_2016-10-6">6</td><td style="cursor: pointer;" id="calendar_1472607145506_2016-10-7">7</td><td style="cursor: pointer;" id="calendar_1472607145506_2016-10-8">8</td></tr><tr><td style="cursor: pointer;" id="calendar_1472607145506_2016-10-9">9</td><td style="cursor: pointer;" id="calendar_1472607145506_2016-10-10">10</td><td style="cursor: pointer;" id="calendar_1472607145506_2016-10-11">11</td><td style="cursor: pointer;" id="calendar_1472607145506_2016-10-12">12</td><td style="cursor: pointer;" id="calendar_1472607145506_2016-10-13">13</td><td style="cursor: pointer;" id="calendar_1472607145506_2016-10-14">14</td><td style="cursor: pointer;" id="calendar_1472607145506_2016-10-15">15</td></tr><tr><td style="cursor: pointer;" id="calendar_1472607145506_2016-10-16">16</td><td style="cursor: pointer;" id="calendar_1472607145506_2016-10-17">17</td><td style="cursor: pointer;" id="calendar_1472607145506_2016-10-18">18</td><td style="cursor: pointer;" id="calendar_1472607145506_2016-10-19">19</td><td style="cursor: pointer;" id="calendar_1472607145506_2016-10-20">20</td><td style="cursor: pointer;" id="calendar_1472607145506_2016-10-21">21</td><td style="cursor: pointer;" id="calendar_1472607145506_2016-10-22">22</td></tr><tr><td style="cursor: pointer;" id="calendar_1472607145506_2016-10-23">23</td><td style="cursor: pointer;" id="calendar_1472607145506_2016-10-24">24</td><td style="cursor: pointer;" id="calendar_1472607145506_2016-10-25">25</td><td style="cursor: pointer;" id="calendar_1472607145506_2016-10-26">26</td><td style="cursor: pointer;" id="calendar_1472607145506_2016-10-27">27</td><td style="cursor: pointer;" id="calendar_1472607145506_2016-10-28">28</td><td style="cursor: pointer;" id="calendar_1472607145506_2016-10-29">29</td></tr><tr><td style="cursor: pointer;" id="calendar_1472607145506_2016-10-30">30</td><td style="cursor: pointer;" id="calendar_1472607145506_2016-10-31">31</td><td class="ta_dateRangeGray">1</td><td class="ta_dateRangeGray">2</td><td class="ta_dateRangeGray">3</td><td class="ta_dateRangeGray">4</td><td class="ta_dateRangeGray">5</td></tr></tbody></table></div><div class="ta_calendar_footer cf" style="display:none"><div class="frm_msg"><div id="dateRangeDiv_1472607145506"><input style="background-repeat: repeat;" class="ta_ipt_text_s ta_dateRangeSelected" name="startDate_1472607145506" id="startDate_1472607145506" readonly="readonly" type="text"><span class="joinLine"> - </span><input class="ta_ipt_text_s" name="endDate_1472607145506" id="endDate_1472607145506" readonly="readonly" type="text"><br></div><div style="display: none;" id="dateRangeCompareDiv_1472607145506"><input disabled="disabled" class="ta_ipt_text_s" name="startCompareDate_1472607145506" id="startCompareDate_1472607145506" readonly="readonly" type="text"><span class="joinLine"> - </span><input disabled="disabled" class="ta_ipt_text_s" name="endCompareDate_1472607145506" id="endCompareDate_1472607145506" readonly="readonly" type="text"></div></div><div class="frm_btn"><input class="ta_btn ta_btn_primary" name="submit_1472607145506" id="submit_1472607145506" value="确定" type="button"><input class="ta_btn" id="closeBtn_1472607145506" value="取消" type="button"></div></div></div><div style="z-index: 9999; display: none;" id="calendar_1472607145758" class="ta_calendar ta_calendar2 cf"><div class="ta_calendar_cont cf" id="dateRangePicker_1472607145758"><table class="dateRangeDateTable"><caption>2016年8月</caption><thead><tr><th>日</th><th>一</th><th>二</th><th>三</th><th>四</th><th>五</th><th>六</th></tr></thead><tbody><tr><td style="text-align: center;" colspan="7"><a href="javascript:void(0);" id="dateRangePreMonth_1472607145758"><i class="i_pre"></i></a></td></tr><tr><td class="ta_dateRangeGray">31</td><td class="ta_dateRangeGray">1</td><td class="ta_dateRangeGray">2</td><td class="ta_dateRangeGray">3</td><td class="ta_dateRangeGray">4</td><td class="ta_dateRangeGray">5</td><td class="ta_dateRangeGray">6</td></tr><tr><td class="ta_dateRangeGray">7</td><td class="ta_dateRangeGray">8</td><td class="ta_dateRangeGray">9</td><td class="ta_dateRangeGray">10</td><td class="ta_dateRangeGray">11</td><td class="ta_dateRangeGray">12</td><td class="ta_dateRangeGray">13</td></tr><tr><td class="ta_dateRangeGray">14</td><td class="ta_dateRangeGray">15</td><td class="ta_dateRangeGray">16</td><td class="ta_dateRangeGray">17</td><td class="ta_dateRangeGray">18</td><td class="ta_dateRangeGray">19</td><td class="ta_dateRangeGray">20</td></tr><tr><td class="ta_dateRangeGray">21</td><td class="ta_dateRangeGray">22</td><td class="ta_dateRangeGray">23</td><td class="ta_dateRangeGray">24</td><td class="ta_dateRangeGray">25</td><td class="ta_dateRangeGray">26</td><td class="ta_dateRangeGray">27</td></tr><tr><td class="ta_dateRangeGray">28</td><td class="ta_dateRangeGray">29</td><td class="ta_dateRangeGray">30</td><td style="cursor: pointer;" id="calendar_1472607145758_2016-8-31" class="ta_dateRangeToday">31</td><td class="ta_dateRangeGray">1</td><td class="ta_dateRangeGray">2</td><td class="ta_dateRangeGray">3</td></tr></tbody></table><table class="dateRangeDateTable"><caption>2016年9月</caption><thead><tr><th>日</th><th>一</th><th>二</th><th>三</th><th>四</th><th>五</th><th>六</th></tr></thead><tbody><tr><td style="text-align: center;" colspan="7"><a href="javascript:void(0);" id="dateRangeNextMonth_1472607145758"><i class="i_next"></i></a></td></tr><tr><td class="ta_dateRangeGray">28</td><td class="ta_dateRangeGray">29</td><td class="ta_dateRangeGray">30</td><td class="ta_dateRangeGray">31</td><td style="cursor: pointer;" id="calendar_1472607145758_2016-9-1">1</td><td style="cursor: pointer;" id="calendar_1472607145758_2016-9-2">2</td><td style="cursor: pointer;" id="calendar_1472607145758_2016-9-3">3</td></tr><tr><td style="cursor: pointer;" id="calendar_1472607145758_2016-9-4">4</td><td style="cursor: pointer;" id="calendar_1472607145758_2016-9-5">5</td><td style="cursor: pointer;" id="calendar_1472607145758_2016-9-6">6</td><td style="cursor: pointer;" id="calendar_1472607145758_2016-9-7">7</td><td style="cursor: pointer;" id="calendar_1472607145758_2016-9-8">8</td><td style="cursor: pointer;" id="calendar_1472607145758_2016-9-9">9</td><td style="cursor: pointer;" id="calendar_1472607145758_2016-9-10">10</td></tr><tr><td style="cursor: pointer;" id="calendar_1472607145758_2016-9-11">11</td><td style="cursor: pointer;" id="calendar_1472607145758_2016-9-12">12</td><td style="cursor: pointer;" id="calendar_1472607145758_2016-9-13">13</td><td style="cursor: pointer;" id="calendar_1472607145758_2016-9-14">14</td><td style="cursor: pointer;" id="calendar_1472607145758_2016-9-15">15</td><td style="cursor: pointer;" id="calendar_1472607145758_2016-9-16">16</td><td style="cursor: pointer;" id="calendar_1472607145758_2016-9-17">17</td></tr><tr><td style="cursor: pointer;" id="calendar_1472607145758_2016-9-18">18</td><td style="cursor: pointer;" id="calendar_1472607145758_2016-9-19">19</td><td style="cursor: pointer;" id="calendar_1472607145758_2016-9-20">20</td><td style="cursor: pointer;" id="calendar_1472607145758_2016-9-21">21</td><td style="cursor: pointer;" id="calendar_1472607145758_2016-9-22">22</td><td style="cursor: pointer;" id="calendar_1472607145758_2016-9-23">23</td><td style="cursor: pointer;" id="calendar_1472607145758_2016-9-24">24</td></tr><tr><td style="cursor: pointer;" id="calendar_1472607145758_2016-9-25">25</td><td style="cursor: pointer;" id="calendar_1472607145758_2016-9-26">26</td><td style="cursor: pointer;" id="calendar_1472607145758_2016-9-27">27</td><td style="cursor: pointer;" id="calendar_1472607145758_2016-9-28">28</td><td style="cursor: pointer;" id="calendar_1472607145758_2016-9-29">29</td><td style="cursor: pointer;" id="calendar_1472607145758_2016-9-30">30</td><td class="ta_dateRangeGray">1</td></tr></tbody></table></div><div class="ta_calendar_footer cf" style="display:none"><div class="frm_msg"><div id="dateRangeDiv_1472607145758"><input style="background-repeat: repeat;" class="ta_ipt_text_s ta_dateRangeSelected" name="startDate_1472607145758" id="startDate_1472607145758" readonly="readonly" type="text"><span class="joinLine"> - </span><input class="ta_ipt_text_s" name="endDate_1472607145758" id="endDate_1472607145758" readonly="readonly" type="text"><br></div><div style="display: none;" id="dateRangeCompareDiv_1472607145758"><input disabled="disabled" class="ta_ipt_text_s" name="startCompareDate_1472607145758" id="startCompareDate_1472607145758" readonly="readonly" type="text"><span class="joinLine"> - </span><input disabled="disabled" class="ta_ipt_text_s" name="endCompareDate_1472607145758" id="endCompareDate_1472607145758" readonly="readonly" type="text"></div></div><div class="frm_btn"><input class="ta_btn ta_btn_primary" name="submit_1472607145758" id="submit_1472607145758" value="确定" type="button"><input class="ta_btn" id="closeBtn_1472607145758" value="取消" type="button"></div></div></div><div style="z-index: 9999; display: none;" id="calendar_1472607145772" class="ta_calendar ta_calendar2 cf"><div class="ta_calendar_cont cf" id="dateRangePicker_1472607145772"><table class="dateRangeDateTable"><caption>2016年8月</caption><thead><tr><th>日</th><th>一</th><th>二</th><th>三</th><th>四</th><th>五</th><th>六</th></tr></thead><tbody><tr><td style="text-align: center;" colspan="7"><a href="javascript:void(0);" id="dateRangePreMonth_1472607145772"><i class="i_pre"></i></a></td></tr><tr><td class="ta_dateRangeGray">31</td><td class="ta_dateRangeGray">1</td><td class="ta_dateRangeGray">2</td><td class="ta_dateRangeGray">3</td><td class="ta_dateRangeGray">4</td><td class="ta_dateRangeGray">5</td><td class="ta_dateRangeGray">6</td></tr><tr><td class="ta_dateRangeGray">7</td><td class="ta_dateRangeGray">8</td><td class="ta_dateRangeGray">9</td><td class="ta_dateRangeGray">10</td><td class="ta_dateRangeGray">11</td><td class="ta_dateRangeGray">12</td><td class="ta_dateRangeGray">13</td></tr><tr><td class="ta_dateRangeGray">14</td><td class="ta_dateRangeGray">15</td><td class="ta_dateRangeGray">16</td><td class="ta_dateRangeGray">17</td><td class="ta_dateRangeGray">18</td><td class="ta_dateRangeGray">19</td><td class="ta_dateRangeGray">20</td></tr><tr><td class="ta_dateRangeGray">21</td><td class="ta_dateRangeGray">22</td><td class="ta_dateRangeGray">23</td><td class="ta_dateRangeGray">24</td><td class="ta_dateRangeGray">25</td><td class="ta_dateRangeGray">26</td><td class="ta_dateRangeGray">27</td></tr><tr><td class="ta_dateRangeGray">28</td><td class="ta_dateRangeGray">29</td><td class="ta_dateRangeGray">30</td><td style="cursor: pointer;" id="calendar_1472607145772_2016-8-31" class="ta_dateRangeToday">31</td><td class="ta_dateRangeGray">1</td><td class="ta_dateRangeGray">2</td><td class="ta_dateRangeGray">3</td></tr></tbody></table><table class="dateRangeDateTable"><caption>2016年9月</caption><thead><tr><th>日</th><th>一</th><th>二</th><th>三</th><th>四</th><th>五</th><th>六</th></tr></thead><tbody><tr><td style="text-align: center;" colspan="7"><a href="javascript:void(0);" id="dateRangeNextMonth_1472607145772"><i class="i_next"></i></a></td></tr><tr><td class="ta_dateRangeGray">28</td><td class="ta_dateRangeGray">29</td><td class="ta_dateRangeGray">30</td><td class="ta_dateRangeGray">31</td><td style="cursor: pointer;" id="calendar_1472607145772_2016-9-1">1</td><td style="cursor: pointer;" id="calendar_1472607145772_2016-9-2">2</td><td style="cursor: pointer;" id="calendar_1472607145772_2016-9-3">3</td></tr><tr><td style="cursor: pointer;" id="calendar_1472607145772_2016-9-4">4</td><td style="cursor: pointer;" id="calendar_1472607145772_2016-9-5">5</td><td style="cursor: pointer;" id="calendar_1472607145772_2016-9-6">6</td><td style="cursor: pointer;" id="calendar_1472607145772_2016-9-7">7</td><td style="cursor: pointer;" id="calendar_1472607145772_2016-9-8">8</td><td style="cursor: pointer;" id="calendar_1472607145772_2016-9-9">9</td><td style="cursor: pointer;" id="calendar_1472607145772_2016-9-10">10</td></tr><tr><td style="cursor: pointer;" id="calendar_1472607145772_2016-9-11">11</td><td style="cursor: pointer;" id="calendar_1472607145772_2016-9-12">12</td><td style="cursor: pointer;" id="calendar_1472607145772_2016-9-13">13</td><td style="cursor: pointer;" id="calendar_1472607145772_2016-9-14">14</td><td style="cursor: pointer;" id="calendar_1472607145772_2016-9-15">15</td><td style="cursor: pointer;" id="calendar_1472607145772_2016-9-16">16</td><td style="cursor: pointer;" id="calendar_1472607145772_2016-9-17">17</td></tr><tr><td style="cursor: pointer;" id="calendar_1472607145772_2016-9-18">18</td><td style="cursor: pointer;" id="calendar_1472607145772_2016-9-19">19</td><td style="cursor: pointer;" id="calendar_1472607145772_2016-9-20">20</td><td style="cursor: pointer;" id="calendar_1472607145772_2016-9-21">21</td><td style="cursor: pointer;" id="calendar_1472607145772_2016-9-22">22</td><td style="cursor: pointer;" id="calendar_1472607145772_2016-9-23">23</td><td style="cursor: pointer;" id="calendar_1472607145772_2016-9-24">24</td></tr><tr><td style="cursor: pointer;" id="calendar_1472607145772_2016-9-25">25</td><td style="cursor: pointer;" id="calendar_1472607145772_2016-9-26">26</td><td style="cursor: pointer;" id="calendar_1472607145772_2016-9-27">27</td><td style="cursor: pointer;" id="calendar_1472607145772_2016-9-28">28</td><td style="cursor: pointer;" id="calendar_1472607145772_2016-9-29">29</td><td style="cursor: pointer;" id="calendar_1472607145772_2016-9-30">30</td><td class="ta_dateRangeGray">1</td></tr></tbody></table></div><div class="ta_calendar_footer cf" style="display:none"><div class="frm_msg"><div id="dateRangeDiv_1472607145772"><input style="background-repeat: repeat;" class="ta_ipt_text_s ta_dateRangeSelected" name="startDate_1472607145772" id="startDate_1472607145772" readonly="readonly" type="text"><span class="joinLine"> - </span><input class="ta_ipt_text_s" name="endDate_1472607145772" id="endDate_1472607145772" readonly="readonly" type="text"><br></div><div style="display: none;" id="dateRangeCompareDiv_1472607145772"><input disabled="disabled" class="ta_ipt_text_s" name="startCompareDate_1472607145772" id="startCompareDate_1472607145772" readonly="readonly" type="text"><span class="joinLine"> - </span><input disabled="disabled" class="ta_ipt_text_s" name="endCompareDate_1472607145772" id="endCompareDate_1472607145772" readonly="readonly" type="text"></div></div><div class="frm_btn"><input class="ta_btn ta_btn_primary" name="submit_1472607145772" id="submit_1472607145772" value="确定" type="button"><input class="ta_btn" id="closeBtn_1472607145772" value="取消" type="button"></div></div></div><div style="display: none;"><form action="http://lxbjs.baidu.com/vt/lxb.gif" method="post" target="lxbHideIframe"><input name="p" value="MSwlRTclOUYlQUQlRTYlOUMlOUYlRTclQTclOUYlRTglQkQlQTYlN0MlRTclOUYlQUQlRTYlOUMlOUYlRTglODclQUElRTklQTklQkUlRTclQTclOUYlRTglQkQlQTYlN0MlRTQlQkIlQjclRTYlQTAlQkMlMjAtJTIwJUU1JUE0JUE3JUU2JTk2JUI5JUU3JUE3JTlGJUU4JUJEJUE2JTJDJUU0JUI4JUFEJUU1JTlCJUJEJUU0JUJBJTkyJUU4JTgxJTk0JUU3JUJEJTkxJUU3JUE3JTlGJUU4JUJEJUE2JUU5JUEyJTg2JUU4JUI3JTkxJUU4JTgwJTg1LGh0dHAlM0ElMkYlMkZ3d3cuZGFmYW5nMjQuY29tJTJGdXNlcmNlbnRlciUyRmxvZ2luLGh0dHAlM0ElMkYlMkZ3d3cuZGFmYW5nMjQuY29tJTJGaG9tZSUyRmRvb20sMA=="><input name="sid" value="6567291"><input name="bdcbid" value="48e71d55-8b82-4cf5-92a6-c754ff00cba9"><input name="t" value="1472607146040"></form><iframe id="lxbHideIframe" name="lxbHideIframe" src="../resources/assets/home/public/a.htm"></iframe></div></body></html>