function openNav() { document.getElementById("mySidenav").style.width = "80%" }

function closeNav() { document.getElementById("mySidenav").style.width = "0" }

function submit_form_search() { url = "", $("#link_search").val(); var t = document.getElementById("txt-search").value; if ("" != (t = change_alias(t))) { url += t; var e = 1 } else e = 0; if (0 == e) return alert("Bạn phải nhập từ khóa tìm kiếm"), !1; var n = document.getElementById("link_search2").value + url; return window.location.href = n, !1 }

function submit_form_search_mb() { url = "", $("#link_search").val(); var t = document.getElementById("txt-searchMB").value; if ("" != (t = change_alias(t))) { url += t; var e = 1 } else e = 0; if (0 == e) return alert("Bạn phải nhập từ khóa tìm kiếm"), !1; var n = document.getElementById("link_search2").value + url; return window.location.href = n, !1 }

function change_alias(t) { return t.toLowerCase().replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g, "a").replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g, "e").replace(/ì|í|ị|ỉ|ĩ/g, "i").replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g, "o").replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g, "u").replace(/ỳ|ý|ỵ|ỷ|ỹ/g, "y").replace(/đ/g, "d").replace(/!|@|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.|\:|\;|\'|\"|\&|\#|\[|\]|~|\$|_|`|-|{|}|\||\\/g, " ").replace(/ + /g, " ").replace(" ", "-").trim() }

function hideListPushContent() { $("#mp-notification-content").slideUp().hide() }

function showListPushContent() { $("#mp-notification-content").show().slideDown() }

function openProductCampaign(t, e) { $.ajax({ type: "get", url: "https://sieuthithuoc365.com/update-campaign", data: { postId: e }, success: function(e) { 1 == t.includes("domain", 0) ? window.open(t.replace("domain_", "https://"), "_blank") : window.open("https://sieuthithuoc365.com/" + t, "_self") } }) }

function clickBannerAds(t, e) { $.ajax({ type: "get", url: "https://sieuthithuoc365.com/update-banner-ads", data: { postId: e }, success: function(e) { 1 == t.includes("domain", 0) ? window.open(t.replace("domain_", "https://"), "_blank") : window.open("https://sieuthithuoc365.com/" + t, "_self") } }) }

function subcribeEmailSubmit(t) { var e = $(t).find(".emailSubmit").val(),
        n = $(t).find("input[name=_token]").val(); return $.ajax({ type: "POST", url: "https://sieuthithuoc365.com/subcribe-email", data: { email: e, _token: n }, success: function(t) { var e = jQuery.parseJSON(t);
            alert(e.message) } }), !1 }

function addToOrder(t) { var e = $(t).serialize(); return $.ajax({ type: "POST", url: "https://sieuthithuoc365.com/dat-hang", data: e, success: function(t) { jQuery.parseJSON(t), window.location.replace("/gio-hang") }, error: function(t) {} }), !1 }

function contact(t) { var e = $(t).serialize(); return $.ajax({ type: "POST", url: "https://sieuthithuoc365.com/submit/contact", data: e, success: function(t) { var e = jQuery.parseJSON(t);
            200 != e.status ? e.status : alert(e.message) }, error: function(t) {} }), !1 }

function numberRandom(t) { var e = Math.ceil(20 * Math.random());
    $("#customer-count").animate({ bottom: "+=50px" }, "slow"), $(".ins-dynamic-element-tag", "#customer-count").text(e) }

function closePopupContact() { $("#popupVitural").slideUp().hide() }

function showPopupContact() { $("#popupVitural").show().slideDown() }

function changeImage(t) { var e = $(t).attr("src");
    $("#imageProductMobile").removeAttr("src"), $("#imageProductMobile").attr("src", e) }

function changeImageDesktop(t) { var e = $(t).attr("src");
    $("#imageProductDesktop").removeAttr("src"), $("#imageProductDesktop").attr("src", e) }

function checkFilter(t) { var e = $(t).attr("data-value"); return $("#filterProduct").append('<input type="hidden" value="' + e + '" name="filter[]">'), $("#filterProduct").submit(), !0 }
$(function() {}),
    function(t) { "use strict"; "function" == typeof define && define.amd ? define(["jquery"], t) : "undefined" != typeof module && module.exports ? module.exports = t(require("jquery")) : t(jQuery) }(function(t) { var e = -1,
            n = -1,
            a = function(t) { return parseFloat(t) || 0 },
            i = function(e) { var n = t(e),
                    i = null,
                    o = []; return n.each(function() { var e = t(this),
                        n = e.offset().top - a(e.css("margin-top")),
                        s = o.length > 0 ? o[o.length - 1] : null;
                    null === s ? o.push(e) : Math.floor(Math.abs(i - n)) <= 1 ? o[o.length - 1] = s.add(e) : o.push(e), i = n }), o },
            o = function(e) { var n = { byRow: !0, property: "height", target: null, remove: !1 }; return "object" == typeof e ? t.extend(n, e) : ("boolean" == typeof e ? n.byRow = e : "remove" === e && (n.remove = !0), n) },
            s = t.fn.matchHeight = function(e) { var n = o(e); if (n.remove) { var a = this; return this.css(n.property, ""), t.each(s._groups, function(t, e) { e.elements = e.elements.not(a) }), this } return this.length <= 1 && !n.target ? this : (s._groups.push({ elements: this, options: n }), s._apply(this, n), this) };
        s.version = "master", s._groups = [], s._throttle = 80, s._maintainScroll = !1, s._beforeUpdate = null, s._afterUpdate = null, s._rows = i, s._parse = a, s._parseOptions = o, s._apply = function(e, n) { var c = o(n),
                r = t(e),
                u = [r],
                l = t(window).scrollTop(),
                d = t("html").outerHeight(!0),
                m = r.parents().filter(":hidden"); return m.each(function() { var e = t(this);
                e.data("style-cache", e.attr("style")) }), m.css("display", "block"), c.byRow && !c.target && (r.each(function() { var e = t(this),
                    n = e.css("display"); "inline-block" !== n && "flex" !== n && "inline-flex" !== n && (n = "block"), e.data("style-cache", e.attr("style")), e.css({ display: n, "padding-top": "0", "padding-bottom": "0", "margin-top": "0", "margin-bottom": "0", "border-top-width": "0", "border-bottom-width": "0", height: "100px", overflow: "hidden" }) }), u = i(r), r.each(function() { var e = t(this);
                e.attr("style", e.data("style-cache") || "") })), t.each(u, function(e, n) { var i = t(n),
                    o = 0; if (c.target) o = c.target.outerHeight(!1);
                else { if (c.byRow && i.length <= 1) return void i.css(c.property, "");
                    i.each(function() { var e = t(this),
                            n = e.attr("style"),
                            a = e.css("display"); "inline-block" !== a && "flex" !== a && "inline-flex" !== a && (a = "block"); var i = { display: a };
                        i[c.property] = "", e.css(i), e.outerHeight(!1) > o && (o = e.outerHeight(!1)), n ? e.attr("style", n) : e.css("display", "") }) }
                i.each(function() { var e = t(this),
                        n = 0;
                    c.target && e.is(c.target) || ("border-box" !== e.css("box-sizing") && (n += a(e.css("border-top-width")) + a(e.css("border-bottom-width")), n += a(e.css("padding-top")) + a(e.css("padding-bottom"))), e.css(c.property, o - n + "px")) }) }), m.each(function() { var e = t(this);
                e.attr("style", e.data("style-cache") || null) }), s._maintainScroll && t(window).scrollTop(l / d * t("html").outerHeight(!0)), this }, s._applyDataApi = function() { var e = {};
            t("[data-match-height], [data-mh]").each(function() { var n = t(this),
                    a = n.attr("data-mh") || n.attr("data-match-height");
                e[a] = a in e ? e[a].add(n) : n }), t.each(e, function() { this.matchHeight(!0) }) }; var c = function(e) { s._beforeUpdate && s._beforeUpdate(e, s._groups), t.each(s._groups, function() { s._apply(this.elements, this.options) }), s._afterUpdate && s._afterUpdate(e, s._groups) };
        s._update = function(a, i) { if (i && "resize" === i.type) { var o = t(window).width(); if (o === e) return;
                e = o }
            a ? -1 === n && (n = setTimeout(function() { c(i), n = -1 }, s._throttle)) : c(i) }, t(s._applyDataApi), t(window).bind("load", function(t) { s._update(!1, t) }), t(window).bind("resize orientationchange", function(t) { s._update(!0, t) }) }), $(document).ready(function() { $(".t_p").click(function() { $(".mask_1").toggle(), $(".product_views").toggleClass("show_p_s") }), $(".mask_1").click(function() { $(".product_views").toggleClass("show_p_s"), $(".mask_1").toggle() }), $("#submitform").click(function() { validateRegister() && document.getElementById("frmRegister").submit() }), $(".user_name_login").click(function() { $(".div_log").toggle() }), $(".danhmuc").click(function() { $(".bmb-menu").toggleClass("action_menu_cat_mb") }) }), $(document).ready(function() { var t = !1;
        $(window).width() < 768 && (t = !0), $(".block-menu-banner ul li").mouseover(function() { $(".block-menu-banner ul li").removeClass("active"), $(this).addClass("active") }), $(".block-menu-banner ul").mouseout(function(t) { $(".block-menu-banner ul li").removeClass("active") }), $(".danhmuc").click(function() { $(".block-menu-banner").toggle() }), $("#same_products .block-content").owlCarousel({ loop: !0, nav: !0, items: 5, autoplay: !0, autoWidth: t, autoplayTimeout: 5e3, responsive: { 0: { items: 2 }, 500: { items: 3 }, 800: { items: 3 }, 900: { items: 5 } } }), $("footer .block-news-product .block-content").owlCarousel({ nav: !0, items: 5, margin: 15, autoplay: !0, autoplayTimeout: 5e3, responsive: { 0: { items: 2 }, 500: { items: 3 }, 800: { items: 3 }, 900: { items: 5 } } }), $(".block-categories-default .block-news-product .block-content").owlCarousel({ nav: !0, items: 4, margin: 15, autoplay: !0, autoplayTimeout: 5e3, responsive: { 0: { items: 2 }, 500: { items: 3 }, 800: { items: 3 }, 900: { items: 4 } } }), $(".web-pagination .disable").click(function(t) {}) }), $(document).ready(function() { $(".owl-carousel-story").owlCarousel({ loop: !0, margin: 10, nav: !0, dots: !0, autoplay: !0, autoplayTimeout: 5e3, dotData: !0, responsive: { 0: { items: 1 }, 600: { items: 3 }, 800: { items: 3 }, 1200: { items: 4 } } }), $(".block-news-product .block-content").owlCarousel({ loop: !0, nav: !0, items: 4, margin: 15, autoplay: !0, autoplayTimeout: 5e3, responsive: { 0: { items: 2 }, 500: { items: 3 }, 650: { items: 4 }, 900: { items: 4 } } }) }), $(document).ready(function() { $(".navigation .main-nav").click(function() { $(this).children(".block-menu-banner-default").toggleClass("active"), $(".navigation .block-menu-tablet ul").removeClass("active") }), $(".navigation .block-menu-tablet .view-more").click(function() { $(this).siblings("ul").toggleClass("active"), $(".navigation .main-nav .block-menu-banner-default").removeClass("active") }), $(".block-news-slideshow .block-heading .show").click(function() { $(this).siblings(".mb").slideToggle() }) }), $(document).ready(function() { $(".danhmuc").click(function() { $(".bmb-menu").toggle() }) }), $("#txt-search").keypress(function() { var t = $("#txt-search").val();
        search($(".cate_search").attr("id"), t) }), $("#select-search > div").click(function() { $(this).toggleClass("show-sub"), $(this).children(".sub-select-search").toggle() }), $(".item-cate-search").click(function() { $(this).addClass("active-cat"), $(".text").html($(this).html()), $(".text").attr("id", $(this).attr("id")), $("#ccode_search").attr("value", $(this).attr("data")), $("#cid").attr("value", $(this).attr("id")), $(this).siblings(".item-cate-search").removeClass("active-cat") }), $("#txt-search").click(function(t) { var e = document.getElementById("mp-notification-content");
        null != e && (e.style.display = "none") }), $(function() { $(".itemProductheight2").matchHeight() }), $(document).ready(function() { var t, e = document.getElementById("cateId"),
            n = document.getElementById("productId"),
            a = 0; if (null == e || null == document.getElementById("notineva")) return !0;
        t = e.value, null != n && (a = n.value), $.ajax({ type: "get", url: "https://sieuthithuoc365.com/customer-notify", data: { productId: a, cateId: t }, success: function(t) { var e = jQuery.parseJSON(t); if (500 == e.httpCode) return !0; if (200 == e.httpCode) { var n = e.notifications; if (n.length <= 0) return !0; var a = document.getElementById("notineva");
                    setInterval(function() { a.innerHTML = n[Math.floor(Math.random() * n.length)].content, setTimeout(function() { a.classList.add("hidden") }, 1e4), setTimeout(function() { a.classList.remove("hidden") }, 5e3) }, 2e4) } } }) }), $(document).ready(function() { var t = document.getElementById("mp-notification-content"); if (null == t) return !0;
        $.ajax({ type: "get", url: "https://sieuthithuoc365.com/campaigns", data: {}, success: function(e) { var n = jQuery.parseJSON(e); if (500 == n.httpCode) return !0; if (200 == n.httpCode) { var a = n.campaigns; if (a.length < 3) return !0;
                    t.style.display = "block"; var i = document.getElementById("campagn_slot_1");
                    null != i && (i.innerHTML = a[0].content); var o = document.getElementById("campagn_slot_2");
                    null != o && (o.innerHTML = a[1].content); var s = document.getElementById("campagn_slot_3");
                    null != s && (s.innerHTML = a[2].content) } } }) }), $(document).ready(function() { var t = document.getElementById("cateId"),
            e = document.getElementById("banner_ads_1"); if (null == t || null == e) return !0;
        $.ajax({ type: "get", url: "https://sieuthithuoc365.com/banner-ads", data: { cateId: document.getElementById("cateId").value }, success: function(t) { var e = jQuery.parseJSON(t); if (500 == e.httpCode) return !0; if (200 == e.httpCode) { var n = e.bannerAds; if (n.length <= 0) return !0; var a = document.getElementById("banner_ads_1");
                    null != a && (a.innerHTML = n[0].content); var i = document.getElementById("banner_ads_2");
                    null != i && n.length > 1 && (i.innerHTML = n[1].content) } } }) }), $(".single_add_to_cart_button", ".sticky-add-to-cart").off("click").on("click", () => ($(window).width() < 768 ? document.getElementById("btn-add-cart-type").value = "MOBILE-TOP" : document.getElementById("btn-add-cart-type").value = "DESKTOP-BOTTOM", addToOrder("#add-to-cart-form"))), $(".number-minus,.number-plus", ".quantity-selector,.quantity").off("click").on("click", function() { var t = parseInt($("#input_quantity", ".quantity-selector,.quantity").val(), 10);
        $(this).is(".number-minus", ".quantity-selector,.quantity") ? (t -= 1) <= 0 && (t = 0) : t += 1, $("#input_quantity", ".quantity-selector,.quantity").val(t), $("#quantity_popup").val(t) }), $(function() { $(window).scroll(function() { if ($(".qo-product-detail").find(".buy-tools").length > 0) { var t = $(".buy-tools").offset().top + 127;
                $(this).scrollTop() >= t ? $(".sticky-add-to-cart").hasClass("sticky-add-to-cart--active") || $(".sticky-add-to-cart").addClass("sticky-add-to-cart--active") : $(".sticky-add-to-cart").removeClass("sticky-add-to-cart--active") } }) }), $(document).ready(function() { var t, e;
        $(window).width() < 768 ? null != document.getElementById("btn-add-cart-type") && (document.getElementById("btn-add-cart-type").value = "MOBILE-MID") : null != document.getElementById("btn-add-cart-type") && (document.getElementById("btn-add-cart-type").value = "DESKTOP-MID"), $("#popupVitural").hide(), clearTimeout(t), t = setTimeout(function() { $("#popupVitural").show().slideDown() }, 15e3), $("#popupVitural .Closed").click(function() { $("#popupVitural").slideUp().hide() }), $(".ins-dynamic-element-tag", "#customer-count-desktop").text(Math.ceil(20 * Math.random())), clearTimeout(e), e = setTimeout(function() { numberRandom() }, 5e3) }), $(document).ready(function() { $(".sidebar>ul.submenu-mb>li").click(function() { $(this).hasClass("active") ? ($(this).find("ul").slideUp(), $(this).find("i.fa-angle-down").css("transform", "rotate(360deg)"), $(this).find("i.fa-angle-down").css("transition", "all 1s ease"), $(this).removeClass("active"), $(this).addClass("color")) : ($(this).find("ul").slideDown(), $(this).addClass("active"), $(this).find("i.fa-angle-down").css("transform", "rotate(180deg)"), $(this).find("i.fa-angle-down").css("transition", "all 1s ease")) }) }), $(".submenu-mb li").click(function() { $(this).find(".submenu-mb1").is(":hidden") ? ($(this).find(".submenu-mb1").slideDown(), $(this).find(".show-hidden").removeClass("fa-angle-down"), $(this).find(".show-hidden").addClass("fa-angle-up")) : ($(this).find(".submenu-mb1").slideUp(), $(this).find(".show-hidden").removeClass("fa-angle-up"), $(this).find(".show-hidden").addClass("fa-angle-down")) }), document.addEventListener("touchstart", t => {}, { passive: !0 }), document.addEventListener("touchmove", t => {}, { passive: !0 }), document.addEventListener("scroll", t => {}, { passive: !0 }), document.addEventListener("wheel", t => {}, { passive: !0 });