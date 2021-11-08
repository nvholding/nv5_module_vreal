var nice = !1;
! function(e) {
    "use strict";

    function a(a) {
        e(a).attr("checked") ? e(a).parents(".method-row").next(".method-option").slideDown() : e(a).parents(".method-row").next(".method-option").slideUp()
    }

    function t() {
        if (e(".header-media .banner-parallax").length) {
            var a = e(".header-media").offset().top + 15,
                t = e(window).scrollTop() - a;
            e(window).scrollTop() >= a ? e(".banner-bg-wrap").css("transform", "translate3d(0," + -.3 * -t + "px,0)") : e(window).scrollTop() < a && e(".banner-bg-wrap").css("transform", "translate3d(0,0px,0)")
        }
    }

    function s(a) {
        e(a + " .login-tabs > li").on("click", function() {
            1 != e(this).hasClass("active") && (e(".login-tabs > li").removeClass("active"), e(this).addClass("active"), e(a + " .login-block .tab-pane").removeClass("in active"), e(a + " .login-block .tab-pane").eq(e(this).index()).addClass("in active"))
        })
    }

    function n() {
        e(".navi ul li").each(function() {
            e(this).has("ul").not(".houzez-megamenu li").addClass("has-child")
        }), e(".navi ul .has-child").hover(function() {
            e(this).addClass("active")
        }, function() {
            e(this).removeClass("active")
        })
    }

    function i() {
        if (e(window).width() > 991) {
            var a = e(".container"),
                t = e(".header-section,#header-section"),
                s = a.innerWidth(),
                n = e(window).width(),
                i = a.offset();
            e(".navi ul li").hasClass("houzez-megamenu") && e(".navi ul .houzez-megamenu").each(function() {
                e("> .sub-menu", this).wrap("<div class='houzez-megamenu-inner'></div>");
                var a = e(this).offset();
                t.children(".container").length > 0 ? e("> .houzez-megamenu-inner", this).css({
                    width: s,
                    left: -(a.left - i.left)
                }) : e("> .houzez-megamenu-inner", this).css({
                    width: n,
                    left: -a.left
                })
            })
        }
    }

    function o(a) {
        function t() {
            if (e("#wpadminbar").length > 0 && p() > 600) {
                var a = e("#wpadminbar").outerHeight();
                l.css("top", a)
            } else l.css("top", "0")
        }
        a.outerHeight();
        var s = a.clone().removeAttr("style").removeClass("houzez-header-transparent nav-left"),
            o = s.attr("class");
        e(s).hasClass("header-bottom") && (o = e(".header-bottom").parent("#header-section").attr("class"));
        var l = e(s).wrap("<div class='sticky_nav'></div>").parent().addClass(o);
        e("body").append(l), e(l).hasClass("header-section-4") && e(".sticky_nav .logo-desktop img").attr("src", HOUZEZ_ajaxcalls_vars.simple_logo), e(window).on("scroll", function() {
            if (e("#wpadminbar").length > 0 && p() > 600) {
                var a = e("#wpadminbar").outerHeight();
                l.css("top", a)
            }
            e(window).scrollTop() >= 600 ? l.addClass("sticky-on") : l.removeClass("sticky-on")
        }), t(), e(window).resize(function() {
            t()
        }), i(), n()
    }

    function l() {
        var a = null,
            t = null,
            s = null;
        p() > 991 ? (a = e(".advance-search-header"), t = e(".advance-search-header").outerHeight()) : (a = e(".advanced-search-mobile"), t = e(".advanced-search-mobile").outerHeight()), a.data("sticky") && (e(".splash-search")[0] ? (s = e(".splash-search").offset().top, s += 200) : s = p() > 991 ? e(".advance-search-header").offset().top + 65 : e(".advanced-search-mobile").offset().top, 0 == s && (s = e("#header-section").height()), e(window).scroll(function() {
            var n = e(window).scrollTop(),
                i = e("#wpadminbar").height() + "px";
            "nullpx" == i && (i = "0px"), n >= s ? (a.addClass("advanced-search-sticky"), a.css("top", i), e("#section-body").css("padding-top", t)) : (a.removeClass("advanced-search-sticky"), a.removeAttr("style"), e("#section-body").css("padding-top", 0))
        }))
    }

    function r() {
        var a = e(".search-panel .search-bottom").outerHeight();
        e(".search-scroll").css("padding-bottom", a), e(window).width() < 991 && e(".search-panel").removeClass("panel-open")
    }

    function c(e, a) {
        var t, s = a;
        if (s && (s = s.match(/^url\("?(.+?)"?\)$/))[1]) return s = s[1], t = new Image, t.src = s, "height" == e ? t.height : t.width
    }

    function h() {
        var a = e(window).innerHeight(),
            t = e("#wpadminbar"),
            s = t.outerHeight();
        ie = a - N - $, T ? e(".fave-screen-fix-inner").css("height", ie - 1) : e(".fave-screen-fix-inner").css("height", ie), p() >= 992 ? (R.length && (ne = G), R.length && V.length && !V.hasClass("search-hidden") && (ne = parseInt(J) + parseInt(G)), R.is("*") && V.hasClass("search-hidden") && (ne = G), R.length && F.length && (ne = parseInt(G) + parseInt(X)), R.length && V.length && !V.hasClass("search-hidden") && F.length && (ne = parseInt(G) + parseInt(X) + parseInt(J)), R.length && t.length && (ne = parseInt(G) + parseInt(s)), R.length && t.length && F.length && (ne = parseInt(G) + parseInt(s) + parseInt(X)), R.length && t.length && V.length && !V.hasClass("search-hidden") && (ne = parseInt(G) + parseInt(s) + parseInt(J)), R.length && t.length && V.length && !V.hasClass("search-hidden") && F.length && (ne = parseInt(G) + parseInt(s) + parseInt(J) + parseInt(X)), R.length && t.length && V.length && V.hasClass("search-hidden") && F.length && (ne = parseInt(G) + parseInt(s) + parseInt(X))) : (L.length && !L.hasClass("search-hidden") && K.length && (ne = parseInt(ee) + parseInt(Y)), L.hasClass("search-hidden") && K.is("*") && (ne = Y), K.length && (ne = Y), K.length && F.length && (ne = parseInt(Y) + parseInt(X)), K.length && L.length && !L.hasClass("search-hidden") && F.length && (ne = parseInt(Y) + parseInt(X) + parseInt(ee)), K.length && t.length && (ne = parseInt(Y) + parseInt(s)), K.length && t.length && L.length && !L.hasClass("search-hidden") && (ne = parseInt(Y) + parseInt(s) + parseInt(ee)), K.length && t.length && L.length && !L.hasClass("search-hidden") && F.length && (ne = parseInt(Y) + parseInt(s) + parseInt(ee) + parseInt(X)), K.length && t.length && L.length && L.hasClass("search-hidden") && F.length && (ne = parseInt(Y) + parseInt(s) + parseInt(X)), K.length && t.length && F.length && (ne = parseInt(Y) + parseInt(s) + parseInt(X)));
        var n = 0;
        if (n = R.hasClass("houzez-header-transparent") ? u() - ne + G : u() - ne, T ? e(".fave-screen-fix").css("height", n - 1) : e(".fave-screen-fix").css("height", n), e(".banner-parallax-fix").css("height", n), p() > 768) {
            var i = e(".banner-parallax-auto .banner-inner").css("background-image");
            if ("none" != i) {
                var o = e(".banner-parallax-auto").width() * c("height", i) / c("width", i);
                o > u() ? e(".banner-parallax-auto").css("height", n) : e(".banner-parallax-auto").css("height", o - ne)
            } else e(".banner-parallax-auto").css("height", n)
        } else e(".banner-parallax-auto").css("height", 300)
    }

    function d() {
        var a = e("#wpadminbar"),
            t = e(".board-header"),
            s = e(".steps-nav"),
            n = s.outerHeight(),
            i = a.outerHeight(),
            o = e(window).outerHeight(),
            l = t.outerHeight(),
            r = 0;
        r = o - G, t.length && (t.is(":hidden") ? r = r : r -= l), F.length && (r -= X), a.length && (r -= i), s.length && (r -= n), e(window).width() > 991 ? T ? e(".dashboard-fix").css("height", r - 1) : e(".dashboard-fix").css("height", r) : e(".dashboard-fix").css("height", "100%")
    }

    function p() {
        return Math.max(e(window).width(), window.innerWidth)
    }

    function u() {
        return Math.max(e(window).height(), window.innerHeight)
    }

    function g(e, a) {
        e = encodeURI(e), a = encodeURI(a);
        for (var t, s = document.location.search.substr(1).split("&"), n = s.length; n--;)
            if ((t = s[n].split("="))[0] == e) {
                t[1] = a, s[n] = t.join("=");
                break
            }
        n < 0 && (s[s.length] = [e, a].join("=")), document.location.search = s.join("&")
    }

    function m(a, t) {
        var s = e(a).html();
        e(t).html(s), e(t + " ul li").each(function() {
            e(this).children(".houzez-megamenu-inner").length && e(t + " .houzez-megamenu-inner > ul").unwrap(), e(this).has("ul").addClass("has-child")
        }), e(t + " ul .has-child").append('<span class="expand-me"></span>'), e(t + " .expand-me").on("click", function() {
            var a = e(this).parent("li");
            1 == a.hasClass("active") ? (a.removeClass("active"), a.children("ul").slideUp()) : (a.addClass("active"), a.children("ul").slideDown())
        })
    }

    function v(a, t) {
        var s = e(".nav-dropdown"),
            n = e(".account-dropdown");
        e(document).mouseup(function(i) {
            var o = e(a);
            o.is(i.target) || 0 !== o.has(i.target).length || s.is(i.target) || 0 !== s.has(i.target).length || n.is(i.target) || 0 !== n.has(i.target).length || e(a).removeClass(t)
        })
    }

    function f() {
        de.show(function() {
            de.owlCarousel({
                rtl: C,
                dots: !1,
                items: 1,
                autoPlay: 1200,
                smartSpeed: 1200,
                autoplay: !0,
                slideBy: 1,
                nav: !1,
                stopOnHover: !0,
                autoHeight: !0,
                navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
                responsive: {
                    768: {
                        nav: !0
                    }
                }
            })
        }), e(".lightbox-arrow-left").on("click", function() {
            de.trigger("prev.owl.carousel", [1200])
        }), e(".lightbox-arrow-right").on("click", function() {
            de.trigger("next.owl.carousel", [1200])
        }), e(document).keydown(function(e) {
            37 == e.keyCode ? de.trigger("prev.owl.carousel", [1200]) : 39 == e.keyCode && de.trigger("next.owl.carousel", [1200])
        })
    }

    function w() {
        var a = b() - 60;
        if (e(".lightbox-popup").css("width", a), e(".lightbox-right").length > 0) {
            var t = e(".lightbox-right").innerWidth();
            e(".lightbox-left").css("width", a - t), e(".gallery-inner").css("width", a - t - 40), e(".lightbox-right").addClass("in"), e(".lightbox-left .lightbox-close").removeClass("show"), Modernizr.mq("(max-width: 1199px)") && (e(".expand-icon").removeClass("compress"), e(".popup-inner").removeClass("pop-expand")), Modernizr.mq("(max-width: 1024px)") && (e(".lightbox-left").css("width", "100%"), e(".lightbox-right").removeClass("in"), e(".gallery-inner").css("width", "100%"), e(".expand-icon").addClass("compress"), e(".lightbox-left .lightbox-close").addClass("show"))
        } else e(".lightbox-left").css("width", "100%"), e(".gallery-inner").css("width", "100%"), e(".lightbox-left .lightbox-close").addClass("show")
    }

    function b() {
        return Math.max(e(window).width(), e(window).innerWidth())
    }
    var C = HOUZEZ_ajaxcalls_vars.houzez_rtl,
        y = HOUZEZ_ajaxcalls_vars.houzez_date_language,
        _ = HOUZEZ_ajaxcalls_vars.currency_position,
        x = HOUZEZ_ajaxcalls_vars.stripe_page,
        k = HOUZEZ_ajaxcalls_vars.twocheckout_page;
    C = "yes" == C;
    var z = e("#detail-slider");
    z.length && z.owlCarousel({
        loop: !0,
        autoWidth: !0,
        dots: !1,
        items: 1,
        smartSpeed: 700,
        slideBy: 1,
        nav: !0,
        navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"]
    });
    var I = e(".clickToShow").text().substring(0, 6);
    e(".clickToShow").hide().after('<span class="clickToShowButton">' + I + "........"), e(".clickToShowButton").click(function(a) {
        a.preventDefault(), e(".clickToShow").show(), e(".clickToShowButton").hide()
    });
    var H = e(".clickToShowPhone").text().substring(0, 6);
    e(".clickToShowPhone").hide().after('<span class="clickToShowButtonPhone">' + H + "........"), e(".clickToShowButtonPhone").click(function(a) {
        a.preventDefault(), e(".clickToShowPhone").show(), e(".clickToShowButtonPhone").hide()
    });
    var T = /Chrome/.test(navigator.userAgent) && /Google Inc/.test(navigator.vendor);
    /Safari/.test(navigator.userAgent) && /Apple Computer/.test(navigator.vendor);
    e(window).on("load", function() {
        e(".body-splash").length > 0 && e(".body-splash").addClass("loaded")
    }), e(".map-zoom-actions #houzez-gmap-full").on("click", function() {
        1 == e(this).hasClass("active") ? (e(this).removeClass("active").children("span").text("Fullscreen"), e(this).children("i").removeClass("fa-square-o").addClass("fa-arrows-alt"), e("#houzez-gmap-main").removeClass("mapfull"), e(".header-media").delay(1e3).queue(function(a) {
            e(".header-media").css("height", "auto"), a()
        })) : (e(".header-media").height(e("#houzez-gmap-main").height()), e(this).addClass("active").children("span").text("Default"), e(this).children("i").removeClass("fa-arrows-alt").addClass("fa fa-square-o"), e("#houzez-gmap-main").addClass("mapfull"))
    }), e(".panel-btn, .panel-btn-close").on("click", function() {
        e(".compare-panel").hasClass("panel-open") ? e(".compare-panel").removeClass("panel-open") : e(".compare-panel").addClass("panel-open")
    }), e(".method-select input").on("change", function() {
        e(this).is(":checked") ? (e(".method-option").slideUp(), e(this).parents(".method-row").next(".method-option").slideDown()) : e(".method-option").slideUp()
    }), a(".payment-paypal"), a(".payment-stripe"), e("button.stripe-button-el span").prepend('<i class="fa fa-credit-card"></i>'), e("#stripe_package_recurring").click(function() {
        e(this).attr("checked") ? e(".houzez_payment_form").append('<input type="hidden" name="houzez_stripe_recurring" id="houzez_stripe_recurring" value="1">') : e("#houzez_stripe_recurring").remove()
    }), e("input[name='houzez_payment_type']").click(function() {
        var a = e(this).parents("form");
        "2checkout" === e(this).val() ? (a.attr("action", k), e("#houzez_complete_membership, #houzez_complete_order").addClass("hidden"), e("#houzez_complete_membership_2checkout, #houzez_complete_order_2checkout").removeClass("hidden")) : (a.attr("action", x), e("#houzez_complete_membership, #houzez_complete_order").removeClass("hidden"), e("#houzez_complete_membership_2checkout, #houzez_complete_order_2checkout").addClass("hidden"))
    }), e(".btn-number").click(function(a) {
        a.preventDefault();
        var t = e(this).attr("data-field"),
            s = e(this).attr("data-type"),
            n = e("input[name='" + t + "']"),
            i = parseInt(n.val());
        isNaN(i) ? n.val(0) : "minus" == s ? (i > n.attr("min") && n.val(i - 1).change(), parseInt(n.val()) == n.attr("min") && e(this).attr("disabled", !0)) : "plus" == s && (i < n.attr("max") && n.val(i + 1).change(), parseInt(n.val()) == n.attr("max") && e(this).attr("disabled", !0))
    }), e(".input-number").focusin(function() {
        e(this).data("oldValue", e(this).val())
    }), e(".input-number").change(function() {
        var a = parseInt(e(this).attr("min")),
            t = parseInt(e(this).attr("max")),
            s = parseInt(e(this).val()),
            n = e(this).attr("name");
        s >= a ? e(".btn-number[data-type='minus'][data-field='" + n + "']").removeAttr("disabled") : (alert("Sorry, the minimum value was reached"), e(this).val(e(this).data("oldValue"))), s <= t ? e(".btn-number[data-type='plus'][data-field='" + n + "']").removeAttr("disabled") : (alert("Sorry, the maximum value was reached"), e(this).val(e(this).data("oldValue")))
    }), e(".input-number").keydown(function(a) {
        -1 !== e.inArray(a.keyCode, [46, 8, 9, 27, 13, 190]) || 65 == a.keyCode && !0 === a.ctrlKey || a.keyCode >= 35 && a.keyCode <= 39 || (a.shiftKey || a.keyCode < 48 || a.keyCode > 57) && (a.keyCode < 96 || a.keyCode > 105) && a.preventDefault()
    });
    var S = e("#header-section").data("sticky"),
        U = e("#header-section .header-bottom").data("sticky"),
        Z = e(".advance-search-header").data("sticky"),
        j = (e(".top-bar").length, e("#header-section").innerHeight()),
        q = e(".advance-search-header").innerHeight(),
        D = e("#header-section .header-bottom").innerHeight(),
        O = 0;
    1 == S && (O = j), 1 == Z && (O = q), 1 == U && (O = D), e("#header-section").hasClass("header-section-3") && (O = D), e("#header-section").hasClass("header-section-2") && (O = D), e(document).ready(function() {
        var a = e("#wpadminbar");
        a.length && (O += a.outerHeight())
    });
    var B = e(".scrolltop-btn");
    e(window).on("scroll", function() {
        e(this).scrollTop() > 100 ? B.fadeIn(1e3) : B.fadeOut(1e3)
    }), e(".back-top").on("click", function() {
        return e("html, body").animate({
            scrollTop: 0
        }, "slow"), !1
    });
    var M = e(".property-menu-wrap").innerHeight();
    e(".property-menu-wrap").length && (e(".target").each(function() {
        e(this).on("click", function(a) {
            var t = e(this).attr("href"),
                s = e(t).offset().top;
            s = s - O - (M - 2), e("html, body").animate({
                scrollTop: s
            }, {
                duration: 1e3,
                easing: "easeInOutExpo",
                queue: !1
            }), a.preventDefault()
        })
    }), e(window).on("scroll", function() {
        e(".target-block").each(function() {
            if (e(window).scrollTop() >= e(this).offset().top - O - M) {
                var a = e(this).attr("id");
                e(".target").removeClass("active"), e(".target[href=#" + a + "]").addClass("active")
            } else e(window).scrollTop() <= 0 && e(".target").removeClass("active")
        })
    }), e(window).on("scroll", function() {
        e(window).scrollTop() >= e(".detail-media").offset().top + 200 ? e(".property-menu-wrap").css({
            top: O
        }).fadeIn() : e(window).scrollTop() <= e(".detail-media").offset().top + 200 && e(".property-menu-wrap").css({
            top: O
        }).fadeOut()
    })), e(function() {
        e('#header-section a[href*="#"]:not([href="#"])').click(function() {
            if (location.pathname.replace(/^\//, "") == this.pathname.replace(/^\//, "") && location.hostname == this.hostname) {
                var a = e(this.hash);
                if ((a = a.length ? a : e("[name=" + this.hash.slice(1) + "]")).length) return e("html, body").animate({
                    scrollTop: a.offset().top
                }, 1e3), !1
            }
        })
    }), e("#commentform input.submit").addClass("btn btn-primary"), e(".widget_nav_menu, .widget_pages").addClass("widget-pages"), e(".footer-widget.widget_mc4wp_form_widget").addClass("widget-newsletter"), e(".blog-article .pagination-main ul.pagination a").wrap("<li></li>"), e(".houzez_sticky").theiaStickySidebar({
        additionalMarginTop: function(a) {
            var t = O;
            return e(".property-menu-wrap").length && (t = a + e(".property-menu-wrap").innerHeight()), t
        }(O),
        minWidth: 768,
        updateSidebarHeight: !1
    }), e("#houzez_mortgage_calculate").length > 0 && e("#houzez_mortgage_calculate").click(function(a) {
        a.preventDefault();
        var t, s, n = HOUZEZ_ajaxcalls_vars.monthly_payment,
            i = HOUZEZ_ajaxcalls_vars.weekly_payment,
            o = HOUZEZ_ajaxcalls_vars.bi_weekly_payment,
            l = HOUZEZ_ajaxcalls_vars.currency_symbol,
            r = 0,
            c = 0,
            h = 0,
            d = 0,
            p = 0;
        t = e("#mc_payment_period").val(), c = e("#mc_total_amount").val().replace(/,/g, "") - e("#mc_down_payment").val().replace(/,/g, ""), r = parseInt(e("#mc_term_years").val(), 10) * t, p = (d = c * ((h = parseFloat(e("#mc_interest_rate").val(), 10) / (100 * t)) / (1 - Math.pow(1 + h, -r)))) * t, "12" == t ? s = n : "26" == t ? s = o : "52" == t && (s = i), "after" == _ ? (e("#mortgage_mwbi").html("<h3>" + s + ":<span> " + Math.round(100 * d) / 100 + l + "</span></h3>"), e("#amount_financed").html(Math.round(100 * c) / 100 + l), e("#mortgage_pay").html(Math.round(100 * d) / 100 + l), e("#annual_cost").html(Math.round(100 * p) / 100 + l)) : (e("#mortgage_mwbi").html("<h3>" + s + ":<span> " + l + Math.round(100 * d) / 100 + "</span></h3>"), e("#amount_financed").html(l + Math.round(100 * c) / 100), e("#mortgage_pay").html(l + Math.round(100 * d) / 100), e("#annual_cost").html(l + Math.round(100 * p) / 100)), e("#total_mortgage_with_interest").html(), e(".morg-detail").show()
    }), e(".input_date").length > 0 && e(".input_date").datepicker(jQuery.datepicker.regional[y]), e(".search-date").length > 0 && e(".search-date").datepicker(jQuery.datepicker.regional[y]), t(), e(window).scroll(function(e) {
        t()
    }), e("a[data-fancy^='property_video']").length > 0 && e("a[data-fancy^='property_video']").prettyPhoto({
        allow_resize: !0,
        default_width: 1900,
        default_height: 1e3,
        animation_speed: "normal",
        theme: "default",
        slideshow: 3e3,
        autoplay_slideshow: !1
    }), e("a[data-fancy^='property_gallery']").length > 0 && e("a[data-fancy^='property_gallery']").prettyPhoto({
        allow_resize: !0,
        default_width: 1900,
        default_height: 1e3,
        animation_speed: "normal",
        theme: "facebook",
        slideshow: 3e3,
        autoplay_slideshow: !1
    }), e("#property_name").keyup(function() {
        var a = e(this).val(),
            t = 0;
        e(".my-property-listing .item-wrap").each(function() {
            e(this).text().search(new RegExp(a, "i")) < 0 ? e(this).fadeOut() : (e(this).show(), t++)
        });
        e(".my-property-search button").text(t)
    }), e(".banner-search-tabs .search-tab").on("click", function() {
        1 != e(this).hasClass("active") && (e(".banner-search-tabs .search-tab").removeClass("active"), e(this).addClass("active"), e(".banner-search-taber .tab-pane").removeClass("active in"), e(".banner-search-taber .tab-pane").eq(e(this).index()).addClass("active").delay(5).queue(function(a) {
            e(this).addClass("in"), a()
        }))
    }), e(".detail-tabs > li").on("click", function() {
        1 != e(this).hasClass("active") && (e(".detail-tabs > li").removeClass("active"), e(this).addClass("active"), e(".detail-content-tabber .tab-pane").removeClass("active in"), e(".detail-content-tabber .tab-pane").eq(e(this).index()).addClass("active in"))
    }), e(".plan-tabs > li").on("click", function() {
        1 != e(this).hasClass("active") && (e(".plan-tabs > li").removeClass("active"), e(this).addClass("active"), e(".plan-tabber .tab-pane").removeClass("active in"), e(".plan-tabber .tab-pane").eq(e(this).index()).addClass("active in"))
    }), e(".houzez-tabs > li").on("click", function() {
        1 != e(this).hasClass("active") && (e(".houzez-tabs > li").removeClass("active"), e(this).addClass("active"), e(".houzez-taber-body .tab-pane").removeClass("active in"), e(".houzez-taber-body .tab-pane").eq(e(this).index()).addClass("active").delay(50).queue(function(a) {
            e(this).addClass("in"), a()
        }))
    }), e(".profile-tabs > li").on("click", function() {
        1 != e(this).hasClass("active") && (e(".profile-tabs > li").removeClass("active"), e(this).addClass("active"), e(".profile-tab-pane").removeClass("active in"), e(".profile-tab-pane").eq(e(this).index()).addClass("active in"))
    }), s(".widget"), s(".footer-widget"), s(".modal"), e(".add-title-tab > .add-expand").click(function() {
        e(this).toggleClass("active"), e(this).parent().next(".add-tab-content").slideToggle()
    }), e(".accord-tab").click(function() {
        e(".accord-tab").not(this).removeClass("active"), e(this).toggleClass("active"), e(".accord-tab").not(this).next(".accord-content").slideUp(), e(this).next(".accord-content").slideToggle()
    }), e('a[data-toggle="tab"]').on("shown.bs.tab", function(e) {
        e.target, e.relatedTarget
    });
    var E = e("#houzez-simple-map");
    if (E.length) {
        E.data("styles");
        e("#mapTab").click(function() {
            document.getElementById("houzez-simple-map").style.display = "block", W()
        });
        var A = null,
            P = {
                center: new google.maps.LatLng(E.data("latitude"), E.data("longitude")),
                zoom: E.data("zoom")
            },
            W = function() {
                A = new google.maps.Map(document.getElementById("houzez-simple-map"), P);
                var e = {
                    lat: E.data("latitude"),
                    lng: E.data("longitude")
                };
                new google.maps.Marker({
                    position: e,
                    map: A
                })
            }
    }
    e(".selectpicker").length > 0 && e(".selectpicker").selectpicker({
        dropupAuto: !1
    }), e(window).on("load", function() {
        e(".grid-block").length > 0 && e(".grid-block").isotope({
            itemSelector: ".grid-item"
        })
    }), 1 == ("ontouchstart" in window || window.DocumentTouch && document instanceof DocumentTouch) == !1 && e('[data-toggle="tooltip"]').tooltip(), e(".actions li").on("click", function() {
        e(this).children(".share_tooltip").hasClass("in") ? e(this).children(".share_tooltip").removeClass("in") : (e(".actions li").children(".share_tooltip").removeClass("in"), e(this).children(".share_tooltip").addClass("in"))
    }), e(document).mouseup(function(a) {
        var t = e(".share-btn");
        t.is(a.target) || 0 !== t.has(a.target).length || e(".share_tooltip").removeClass("in")
    }), e(".grid").length > 0 && e(".grid").each(function() {
        e(this).children().find("img").matchHeight({
            byRow: !0,
            property: "height",
            target: null,
            remove: !1
        })
    }), n(), i(), e(window).on("resize", function() {
        i()
    }), e(window).bind("load", function() {
        i()
    }), e(".view-btn").on("click", function() {
        e(".view-btn").removeClass("active"), e(this).addClass("active"), e(this).hasClass("btn-list") ? e(".property-listing").removeClass("grid-view grid-view-3-col").addClass("list-view") : e(this).hasClass("btn-grid") ? e(".property-listing").removeClass("list-view grid-view-3-col").addClass("grid-view") : e(this).hasClass("btn-grid-3-col") && e(".property-listing").removeClass("list-view grid-view").addClass("grid-view grid-view-3-col")
    });
    var F = e(".top-bar"),
        R = e("#header-section"),
        Q = R.find(".header-bottom"),
        V = e(".advance-search-header"),
        K = e(".header-mobile"),
        L = e(".advanced-search-mobile"),
        N = e(".header-section").outerHeight(),
        G = R.outerHeight(),
        $ = e(".splash-footer").outerHeight(),
        J = V.outerHeight(),
        X = F.outerHeight(),
        Y = K.outerHeight(),
        ee = L.outerHeight(),
        ae = R.data("sticky"),
        te = Q.data("sticky"),
        se = K.data("sticky");
    1 === te && o(Q), 1 === ae && o(R), 1 === se && o(K), l(), e(".search-panel-btn").on("click", function() {
        e(".search-panel").hasClass("panel-open") ? e(".search-panel").removeClass("panel-open") : e(".search-panel").addClass("panel-open")
    }), r(), e(window).on("resize", function() {
        r()
    });
    var ne = 0,
        ie = 0;
    h(), d(), e(window).on("resize", function() {
        h(), l(), d()
    }), e(window).bind("load", function() {
        h(), d()
    }), e(".search-expand-btn").on("click", function() {
        e(this).toggleClass("active"), 1 == e(this).hasClass("active") ? e(".search-expandable .advanced-search").slideDown() : (e(".search-expandable .advanced-search").add(".search-expandable .advance-fields").slideUp(), e(".advance-btn").removeClass("active"))
    }), e(".advanced-search .advance-btn").on("click", function() {
        e(this).toggleClass("active"), 1 == e(this).hasClass("active") ? e(this).closest(".advanced-search").find(".advance-fields").slideDown() : e(this).closest(".advanced-search").find(".advance-fields").slideUp()
    }), e(".advanced-search-mobile .advance-btn").on("click", function() {
        e(this).toggleClass("active"), 1 == e(this).hasClass("active") ? e(this).closest(".advanced-search-mobile").find(".advance-fields").slideDown() : e(this).closest(".advanced-search-mobile").find(".advance-fields").slideUp()
    }), e(".advance-trigger").on("click", function() {
        e(this).toggleClass("active"), 1 == e(this).hasClass("active") ? (e(this).children("i").removeClass("fa-plus-square").addClass("fa-minus-square"), e(".field-expand").slideDown()) : (e(this).children("i").removeClass("fa-minus-square").addClass("fa-plus-square"), e(".field-expand").slideUp())
    });
    var oe = e(".owl-carousel");
    if (oe.on("initialized.owl.carousel", function() {
            setTimeout(function() {
                oe.animate({
                    opacity: 1
                }, 800), e(".gallery-area .slider-placeholder").remove()
            }, 800)
        }), e("#banner-slider").length > 0 && e("#banner-slider").owlCarousel({
            rtl: C,
            loop: !0,
            dots: !1,
            slideBy: 1,
            autoplay: !0,
            autoplaySpeed: 700,
            items: 1,
            smartSpeed: 1e3,
            nav: !0,
            navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
            addClassActive: !0,
            callbacks: !0,
            responsive: {
                0: {
                    nav: !1,
                    dots: !0
                },
                768: {
                    nav: !0,
                    dots: !1
                }
            }
        }), e("#carousel-post-card").length > 0) {
        var le = e("#carousel-post-card");
        le.owlCarousel({
            rtl: C,
            loop: !1,
            dots: !0,
            autoplay: !0,
            autoplaySpeed: 700,
            slideBy: 1,
            nav: !1,
            responsive: {
                0: {
                    items: 1
                },
                320: {
                    items: 1
                },
                480: {
                    items: 1
                },
                768: {
                    items: 2
                },
                1e3: {
                    items: 3
                },
                1280: {
                    items: 4
                }
            }
        }), e(".btn-prev-post-card").on("click", function() {
            le.trigger("prev.owl.carousel", [700])
        }), e(".btn-next-post-card").on("click", function() {
            le.trigger("next.owl.carousel", [700])
        })
    }

    if (e("#agents-carousel").length > 0) {
        var ce = e("#agents-carousel");
        ce.owlCarousel({
            rtl: C,
            loop: !0,
            dots: !1,
            slideBy: 1,
            autoplay: !0,
            autoplaySpeed: 700,
            nav: !1,
            responsive: {
                0: {
                    items: 1
                },
                320: {
                    items: 1
                },
                480: {
                    items: 1
                },
                768: {
                    items: 2
                },
                1e3: {
                    items: 3
                },
                1280: {
                    items: 4
                }
            }
        }), e(".btn-prev-agents").on("click", function() {
            ce.trigger("prev.owl.carousel", [700])
        }), e(".btn-next-agents").on("click", function() {
            ce.trigger("next.owl.carousel", [700])
        })
    }
    if (e("#partner-carousel").length > 0 && (e("#partner-carousel").owlCarousel({
            rtl: C,
            loop: !1,
            dots: !0,
            slideBy: 2,
            autoplay: !0,
            autoplaySpeed: 700,
            nav: !1,
            responsive: {
                0: {
                    items: 1
                },
                320: {
                    items: 1
                },
                480: {
                    items: 3
                },
                768: {
                    items: 4
                },
                992: {
                    items: 4
                }
            }
        }), e(".btn-prev-partners").on("click", function() {
            e("#partner-carousel").trigger("prev.owl.carousel", [700])
        }), e(".btn-next-partners").on("click", function() {
            e("#partner-carousel").trigger("next.owl.carousel", [700])
        })), e("#agency-carousel").length > 0) {
        var he = e("#agency-carousel");
        he.owlCarousel({
            rtl: C,
            loop: !0,
            dots: !0,
            items: 4,
            slideBy: 4,
            nav: !1,
            smartSpeed: 400
        }), e(".btn-crl-agency-prev").on("click", function() {
            he.trigger("prev.owl.carousel", [400])
        }), e(".btn-crl-agency-next").on("click", function() {
            he.trigger("next.owl.carousel", [400])
        })
    }
    e(".property-widget-slider").length > 0 && e(".property-widget-slider").owlCarousel({
            rtl: C,
            dots: !0,
            items: 1,
            smartSpeed: 700,
            slideBy: 1,
            nav: !0,
            navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"]
        }), e(".prop_featured").change(function() {
            var a, t, s, n = HOUZEZ_ajaxcalls_vars.currency_symbol,
                i = HOUZEZ_ajaxcalls_vars.currency_position,
                o = e(this).parents(".payment-side-block"),
                l = e(this).parents(".houzez-per-listing-buttons-main"),
                r = parseFloat(o.find(".submission_price").text());
            return a = r + parseFloat(o.find(".submission_featured_price").text()), "after" === i ? (s = r + " " + n, t = a + " " + n) : (s = n + " " + r, t = n + " " + a), e(this).is(":checked") ? (o.find(".submission_total_price").text(t), e("#featured_pay").val(1), e('input[name="pay_ammout"]').val(100 * a), e("#houzez_listing_price").val(a), l.find("#stripe_form_simple_listing").hide(), l.find("#stripe_form_featured_listing").show()) : (o.find(".submission_total_price").text(s), e("#featured_pay").val(0), e('input[name="pay_ammout"]').val(100 * r), e("#houzez_listing_price").val(r), l.find("#stripe_form_featured_listing").hide(), l.find("#stripe_form_simple_listing").show()), !1
        }), e(".my-actions .pay-btn").on("click", function(a) {
            1 != e(this).parent().hasClass("open") ? (e(".my-actions .pay-btn").parent().removeClass("open"), e(this).parent().addClass("open")) : e(this).parent().removeClass("open")
        }), e("body").on("click", function(a) {
            e(".my-actions .pay-btn").is(a.target) || 0 !== e(".my-actions .pay-btn").has(a.target).length || 0 !== e(".open").has(a.target).length || e(".my-actions .pay-btn").parent().removeClass("open")
        }), e("#sort_properties").on("change", function() {
            g("sortby", e(this).val())
        }), e(".header-user .account-action > li").on("click", function(a) {
            e(this).hasClass("active") ? e(this).removeClass("active") : e(this).addClass("active")
        }), e(".header-right .account-action > li").on({
            mouseenter: function(a) {
                e(this).addClass("active")
            },
            mouseleave: function(a) {
                e(this).removeClass("active")
            }
        }), m(".main-nav", ".main-nav-dropdown"), m(".top-nav", ".top-nav-dropdown"), e(".nav-trigger").on("click", function() {
            e(this).hasClass("mobile-open") ? e(this).removeClass("mobile-open") : e(this).addClass("mobile-open")
        }), e(".header-single-page").length > 0 && e(".header-single-page .main-nav-dropdown li a").on("click", function(a) {
            e(".nav-trigger").removeClass("mobile-open")
        }), v(".header-mobile .nav-trigger", "mobile-open"), v(".top-bar .nav-trigger", "mobile-open"), v(".account-action > li", "active"),
        function(a) {
            e(document).mouseup(function(t) {
                e(a).is(t.target) || 0 !== e(a).has(t.target).length || e(a).fadeOut()
            })
        }(".auto-complete"), e(".show-morg").on("click", function() {
            e(this).hasClass("active") ? (e(".morg-summery").slideUp(), e(this).removeClass("active")) : (e(".morg-summery").slideDown(), e(this).addClass("active"))
        });
    var de = e(".lightbox-slide");
    de.on("resized.owl.carousel", function() {
        var a = e(this);
        a.find(".owl-height").css("height", a.find(".owl-item.active").height())
    });
    var pe = e(".lightbox-right").innerWidth();
    e(".popup-trigger").on("click", function() {
        e("#lightbox-popup-main").addClass("active").addClass("in"), f()
    }), e(".lightbox-close").on("click", function() {
        de.trigger("destroy.owl.carousel"), de.html(de.find(".owl-stage-outer").html()).removeClass("owl-loaded"), e("#lightbox-popup-main").removeClass("active").removeClass("in")
    }), e(document).keydown(function(a) {
        27 == a.keyCode && e("#lightbox-popup-main").removeClass("active").removeClass("in")
    }), w(), e(".lightbox-expand").on("click", function() {
        e(".lightbox-left .lightbox-close").toggleClass("show");
        var a = b(),
            t = b() - 60 - pe;
        a >= 1024 && (e(this).hasClass("compress") ? (e(".lightbox-right").addClass("in"), e(".lightbox-left").css("width", t), e(this).removeClass("compress"), e(".popup-inner").removeClass("pop-expand")) : (e(".lightbox-left").css("width", "100%"), e(".lightbox-right").removeClass("in"), e(this).addClass("compress"), e(".popup-inner").addClass("pop-expand"))), a <= 1024 && (e(this).hasClass("compress") ? (e(".lightbox-right").addClass("in"), e(".lightbox-left").css("width", t), e(this).removeClass("compress")) : (e(".lightbox-left").css("width", "100%"), e(".lightbox-right").removeClass("in"), e(this).addClass("compress"))), a < 768 && e(".lightbox-left").css("width", "100%")
    });
    var ue = e(".login-here"),
        ge = e(".register-here"),
        me = e(".step-tab-login"),
        ve = e(".step-tab-register");
    e(".step-login-btn a").on("click", function(a) {
        var t = e(this);
        t.hasClass("login-here") ? (t.hide(), ge.show(), me.addClass("in active"), ve.removeClass("in active"), e("#submit_property_form").append('<input type="hidden" name="login_while_submission" id="login_while_submission" value="1">')) : (t.hide(), ue.show(), me.removeClass("in active"), ve.addClass("in active"), e("#login_while_submission").remove()), a.preventDefault()
    }), e(".dsidx-prop-summary").length && (e(".dsidx-prop-summary .dsidx-prop-title").next("div").addClass("item-thumb"), e(".item-thumb a").addClass("hover-effect")), e(".impress-showcase-photo").length && e(".impress-showcase-photo").addClass("hover-effect"), e(window).on("load", function() {
        w()
    }), e(window).on("resize", function() {
        w()
    }), e(document).ready(function() {
        e(".tagcloud a").removeAttr("style")
    }), e('[data-toggle="popover"]').popover({
        trigger: "hover",
        html: !0
    }), e(".dropdown-toggle").dropdown()
}(jQuery);