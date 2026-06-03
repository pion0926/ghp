$(function () {
    var wid_w = $(window).width();
    if (wid_w < 767) {
        $("body").addClass("mobile");
    } else {
        $("body").addClass("pc");
    }

    $(window).on("load resize", function () {
        viewResize();
    });

    $(window).on("load scroll resize", function () {
        var winTop = $(window).scrollTop();
        if (winTop >= 1) {
            $("#header").addClass("scroll");
            imgOver();
        } else {
            $("#header").removeClass("scroll");
            if ($("#header").hasClass("typeHover")) {
                imgOver();
            } else {
                imgOff();
            }
        }
    });

    $(".btnAllNav").on("click", function () {
        $(".allNavView").addClass("active");
    });

    $(".allNavClose").on("click", function () {
        $(".allNavView").removeClass("active");
    });

    $(document).mouseup(function (e) {
        var container = $(".allNavView .allNavCont");
        if (!container.is(e.target) && container.has(e.target).length === 0) {
            $(".allNavView").removeClass("active");
        }
    });

    $("#header #gnb").mouseenter(function () {
        $("#header").addClass("typeHover");
        imgOver();
    });

    $("#header #gnb").mouseleave(function () {
        $("#header").removeClass("typeHover");
        if ($("#header").hasClass("scroll")) {
            imgOver();
        } else {
            imgOff();
        }
    });
});

var dev = "pc";

function viewResize() {
    var myWidth = 0;
    if (typeof window.innerWidth == 'number') {
        myWidth = window.innerWidth;
    } else if (document.documentElement && document.documentElement.clientWidth) {
        myWidth = document.documentElement.clientWidth;
    } else if (document.body && document.body.clientWidth) {
        myWidth = document.body.clientWidth;
    }

    if (myWidth > 767) {
        if (dev === "mobile") {
            pcInit();
            dev = "pc";
        }
    } else {
        if (dev === "pc") {
            mcInit();
            dev = "mobile";
        }
    }
}

function pcInit() {
    $("body").removeClass("mobile").addClass("pc");
}

function mcInit() {
    $("body").removeClass("pc").addClass("mobile");
}

function imgOver() {
    $(".imgOver").each(function () {
        var nowImg = $(this);
        var srcName = nowImg.attr("src");
        var onActive = srcName.replace("_off.", "_on.");
        nowImg.attr("src", onActive);
    });
}

function imgOff() {
    $(".imgOver").each(function () {
        var nowImg = $(this);
        var srcName = nowImg.attr("src");
        var offActive = srcName.replace("_on.", "_off.");
        nowImg.attr("src", offActive);
    });
}

$(document).ready(function () {
  $(document).on("click", ".mobileMenuToggle", function (e) {
    e.preventDefault(); // Prevents accidental link jumps if <a> is used

    const $this = $(this);
    const $depth = $this.closest("li").children(".depth");
    const $arrow = $this.find(".arrow");

    // Toggle submenu
    $depth.stop(true, true).slideToggle(200);

    // Toggle active class
    $this.toggleClass("active");

    // Change arrow icon
    if ($this.hasClass("active")) {
      $arrow.text("▲");
    } else {
      $arrow.text("▼");
    }
  });
});
