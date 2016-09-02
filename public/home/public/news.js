$(function(){


    var li=$(".nav li");
    //新闻 切换
    $(".nav li").click(function(){
        var n=li.index($(this));
        li.removeClass("active");
        $(this).addClass("active");
    });
});