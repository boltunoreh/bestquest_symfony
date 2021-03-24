!function () {
    "use strict";
    var e;
    (e = document.querySelectorAll(".gallery__container")) && e.forEach(function () {
        new Swiper(".gallery__container", {
            loop: !0,
            slidesPerView: "auto",
            spaceBetween: 0,
            speed: 400,
            navigation: {nextEl: ".gallery__arrow--next", prevEl: ".gallery__arrow--prev"}
        })
    }), $(document).ready(function () {
        var e = Array.from(document.querySelectorAll(".logotype span")), t = 0;
        setTimeout(function () {
            $(".unvisible").css("opacity", "1"), document.querySelector(".logotype .active") && setInterval(function () {
                document.querySelector(".logotype .active").classList.remove("active"), t % 2 ? e[0].classList.add("active") : t / 2 % 2 ? e[1].classList.add("active") : e[2].classList.add("active"), t++
            }, 5e3)
        }, 5e3);
        return $("<style type='text/css' id='dynamic' />").appendTo("head"), $("#dynamic").text(980 < $(window).width() ? ".b-skew-top:before{border-left-width: " + $(window).width() + "px;} .b-skew-bottom:after{border-right-width: " + $(window).width() + "px;}" : ".b-skew-top:before{border-left-width: 980px;} .b-skew-bottom:after{border-right-width: 980px;}"), $("#title-slide") && setTimeout(function () {
            return $("#title-slide").fadeOut()
        }, 5e3), $("img.svg").each(function () {
            var a, r, i, e;
            a = $(this), i = a.attr("id"), r = a.attr("class"), e = a.attr("src"), $.get(e, function (e) {
                var t;
                t = $(e).find("svg"), void 0 !== i && (t = t.attr("id", i)), void 0 !== r && (t = t.attr("class", r + " replaced-svg")), t = t.removeAttr("xmlns:a"), a.replaceWith(t)
            }, "xml")
        })
    }), document.addEventListener("DOMContentLoaded", function () {
        var t = document.querySelector(".mobile-overlay"), a = document.querySelector(".index"),
            r = screen.width > screen.height ? screen.width : screen.height,
            i = screen.width < screen.height ? screen.width : screen.height;
        if (t && a) {
            var e = function () {
                if ("none" === getComputedStyle(t).display && r < 1280) {
                    var e = r / 1280;
                    a.style.transform = "scale(".concat(i / (860 * e), ")")
                } else a.style.transform = ""
            };
            window.addEventListener("resize", e), e()
        }
    });
}();
//# sourceMappingURL=my-main.js.map
