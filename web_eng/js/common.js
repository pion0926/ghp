/* [S] Resiponsive */
$(function(){
    var wid_w = $(window).width();
    if(wid_w < 767){
        $("body").addClass("mobile");
    }else{
        $("body").addClass("pc");
    }

    $(window).on("load resize", function() {
        viewResize();
        /*if($("body").hasClass("pc")){
            $(".tel").click(function(e){
                e.preventDefault();
            });
            $("#nav").removeClass("nav_active");
        }*/
    });
});

dev = "pc";//기본이 pc일경우 
function viewResize(){
var myWidth = 0, myHeight = 0;
        if (typeof (window.innerWidth) == 'number') { //Chrome
                 myWidth = window.innerWidth;
                 myHeight = window.innerHeight;
        } else if (document.documentElement && (document.documentElement.clientWidth || document.documentElement.clientHeight)) {
                 myWidth = document.documentElement.clientWidth;
                 myHeight = document.documentElement.clientHeight;
        } else if (document.body && (document.body.clientWidth || document.body.clientHeight)) { //IE9
                 myWidth = document.body.clientWidth;
                 myHeight = document.body.clientHeight;
        }
if (myWidth > 767) {
    if (dev == "mobile") {
        pcInit();
        dev = "pc"
    }
}else{
        if (dev == "pc") {
                mcInit();
                dev = "mobile"
        }
    }
}

function pcInit(){
    $('body').removeClass("mobile").addClass('pc'); //body태그에 class="pc" 를 추가해준다.
}

function mcInit(){
    $('body').removeClass("pc").addClass('mobile'); //body태그에 class="mobile" 를 추가해준다.
}
/* [E] Resiponsive */

$(function(){
$(window).on("load scroll resize", function() {
    //header scroll
    var winTop = $(window).scrollTop();
    if (winTop >= 1)  {
        $("#header").addClass("scroll");
        imgOver();
    } else {
        $("#header").removeClass("scroll");
        //$(this).removeClass("headerHover");

        if($("#header").hasClass("typeHover")){
            imgOver();
        }else{
            imgOff();
        }
    }
});

 $(function() {
    $(".sponsorListDesign ul li:nth-child(1)").on("click", function(){
         $( window ).on( "load", function() {

        $('input:checkbox[name=questionItem]').prop("checked", true);
         });
        
    });
});





/*$(".navList").hover(function(){
    $("#header").addClass("typeHover");
    imgOver();
}, function(){
    $("#header").removeClass("typeHover");
    if($("#header").hasClass("typeWhiteBg")){
        //imgOver();
    }else if($("#header").hasClass("typeBlackText")){
        imgOver();
    }else{
        imgOff();
    }
});*/


/*$("#header").mouseenter(function(){
    $(this).addClass("headerHover");
    imgOver();
});

$("#header").mouseleave(function(){
    $(this).removeClass("headerHover");
    if($(this).hasClass("scroll")){
        imgOver();
    }else{
        imgOff();
    }
});*/

$("#header #gnb").mouseenter(function(){
    $("#header").addClass("typeHover");
    imgOver();
});

$("#header #gnb").mouseleave(function(){
    $("#header").removeClass("typeHover");
    if($("#header").hasClass("scroll")){
        imgOver();
    }else{
        imgOff();
    }
});


$(".btnAllNav a").click(function(){
//$(window).on("load", function(){
    var navList = $(".navList").html();
    var topList = $("#header .memberList").html();
    var btnSeare = $("#header .rightCont .btnGo").html();
    $("#header").after("<div class='allNavView'><div class='allNavCont'>"+ navList + "<!--<ul class='topList'>"+ topList +"</ul>--><p class='allNavClose'>＋</p></div></div>");
    $(".allNavView .allNavCont").animate({'right' : '0'}, 200);
});

$(document).on("click", ".allNavCont li span a", function(e){
    e.preventDefault();
    $(".allNavCont li span a").removeClass("allTitleActive");
    if($(this).parent().next(".depth").css("display") == "block"){
        $(".allNavCont .depth").slideUp(200);
    }else{
        $(".allNavCont .depth").slideUp(200);
        $(this).addClass("allTitleActive");
        $(this).parent().next(".depth").slideDown(200);
    }
});
$(document).on("click", ".allNavClose", function(){
    allNavClose();
});
$(document).mouseup(function (e){
    var container = $(".allNavView");
    if(container.has(e.target).length == 0){
        allNavClose();
    }
});

function imgOver(){
    $(".imgOver").each(function(){
        var nowImg = $(this);
        var srcName = nowImg.attr('src');
        var onActive = srcName.replace("_off.", "_on.");
        var offActive = srcName.replace("_on.", "_off.");
        $(this).attr('src', onActive);
    });
}

function imgOff(){
    $(".imgOver").each(function(){
        var nowImg = $(this);
        var srcName = nowImg.attr('src'); 
        var onActive = srcName.replace("_off.", "_on.");
        var offActive = srcName.replace("_on.", "_off.");
        $(this).attr('src', offActive);
    });
}

// 전체메뉴 닫기
function allNavClose(){
    $(".allNavView .allNavCont").animate({'right' : '-300px'}, 300);
    $(".allNavView").fadeOut(300, function(){
        $(this).remove();
    });
}

/* Footer Slide */
/*var swiper = new Swiper('.familySiteSlide', {
    //slidesPerView: "auto",
    slidesPerView: 4,
    spaceBetween: 10,
    loop: true,
    speed: 300,
    autoplay: {
        enabled: true,
        delay: 3000,
    },
    navigation: {
        nextEl: '.footerBanner .swiper-next',
        prevEl: '.footerBanner .swiper-prev',
    },
    breakpoints: {
        768: {
            slidesPerView: 4,
        },
        1024: {
            slidesPerView: 5,
        },
        1279: {
            slidesPerView: 5,
        },
    },
});*/

/* Sub Menu */
/*$(".depth01Title").click(function(){
    $(this).next().slideToggle(100);
});*/

//달력
/*var datepicker_year = new Date();
$.datepicker.setDefaults({
    dateFormat: 'yy-mm-dd',
    showOn:"both",
    buttonImage:"/img/common/btn_calendar.gif",
    buttonImageOnly:true,
    prevText: '이전 달',
    nextText: '다음 달',
    monthNames: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'],
    monthNamesShort: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'],
    dayNames: ['일', '월', '화', '수', '목', '금', '토'],
    dayNamesShort: ['일', '월', '화', '수', '목', '금', '토'],
    dayNamesMin: ['일', '월', '화', '수', '목', '금', '토'],
    showMonthAfterYear: true,
    changeMonth: true,
    changeYear: true,
    yearRange: '-100:+5',
    yearSuffix: ' '
});

$(function() {
    $(".datepicker").datepicker();
});*/
});

/* [S] PC버전 보기 */
function getCookie(name) {
var cookies = document.cookie.split(";");
for (var i = 0; i < cookies.length; i++) {
    if (cookies[i].indexOf("=") == -1) {
        if (name == cookies[i])
            return "";
    } else {
        var crumb = cookies[i].split("=");
        if (name == crumb[0].trim())
            return unescape(crumb[1].trim());
    }
}
};
var desktopModeTF = getCookie("DesktopMode");
var Scale = getCookie("DesktopModeScale");
var defWidth = 1280;
if (desktopModeTF == "true") {
document.write('<meta name="viewport" content="width='+defWidth+', user-scalable=yes, initial-scale='+Scale+'">');
} else {
document.write('<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=0,maximum-scale=10,user-scalable=yes">');
}
function desktopMode() {
if(getCookie("DesktopMode") == "true"){
    //setModeCookie(false);
}else{
    //alert("다시한번 클릭하시면 원래대로 돌아옵니다.");
    setModeCookie(true);
    window.scrollTo(0, 0);
}
/*if(getCookie("DesktopMode") == "false"){
    //setModeCookie(true);
    window.scrollTo(0, 0);
    alert("pc버전으로 전환합니다.");
}else{
}*/
location.reload();

}
function setModeCookie(switchOn){
var now = new Date();
var time = now.getTime();
time += 3600 * 1000;
now.setTime(time);
document.cookie ='DesktopMode='+switchOn +'; expires=' + now.toUTCString() ;
if(switchOn){
    document.cookie = "DesktopModeScale=" + $('html').width() / defWidth +'; expires=' + now.toUTCString() ;;
}
}
/* [E] PC버전 보기 */