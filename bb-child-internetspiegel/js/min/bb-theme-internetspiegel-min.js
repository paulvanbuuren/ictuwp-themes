jQuery(function(){jQuery(".fl-page-header nav .menu-item-has-children a").focus(function(){jQuery(this).parents(".menu-item-has-children").addClass("fl-sub-menu-open")}).blur(function(){jQuery(this).parents(".menu-item-has-children").removeClass("fl-sub-menu-open")})}),function($){FLTheme={init:function(){this._bind(),this._initRetinaImages()},_bind:function(){0!=$(".fl-page-bar-nav ul.sub-menu").length&&(this._setupDropDowns(),this._enableTopNavDropDowns()),0!=$(".fl-page-nav ul.sub-menu").length&&($(window).on("resize.fl-page-nav-sub-menu",$.throttle(500,this._enablePageNavDropDowns)),this._setupDropDowns(),this._enablePageNavDropDowns()),0!=$(".fl-page-nav-search").length&&$(".fl-page-nav-search a.fa-search").on("click",this._toggleNavSearch),0!=$(".fl-fixed-width.fl-nav-vertical-right").length&&($(window).on("resize",$.throttle(500,this._updateVerticalRightPos)),this._updateVerticalRightPos()),0!=$(".fl-page-nav-centered-inline-logo").length&&($(window).on("resize",$.throttle(500,this._centeredInlineLogo)),this._centeredInlineLogo()),0!=$("body.fl-nav-left").length&&($(window).on("resize",$.throttle(500,this._navLeft)),this._navLeft()),0!=$("body.fl-shrink").length&&0==$("html.fl-builder-edit").length&&($(window).on("resize",$.throttle(500,this._shrinkHeaderEnable)),this._shrinkHeaderInit(),this._shrinkHeaderEnable()),0!=$(".fl-page-header-fixed").length&&($(window).on("resize.fl-page-header-fixed",$.throttle(500,this._enableFixedHeader)),this._enableFixedHeader()),0!=$("body.fl-fixed-header").length&&0==$("html.fl-builder-edit").length&&($(window).on("resize",$.throttle(500,this._fixedHeader)),this._fixedHeader()),0!=$("body.fl-scroll-header").length&&0==$("html.fl-builder-edit").length&&($(window).on("resize",$.throttle(500,this._scrollHeader)),this._scrollHeader()),0!=$(".fl-page-header-primary").find("li.mega-menu").length&&($(window).on("resize",$.throttle(500,this._megaMenu)),this._megaMenu()),0!=$(".fl-page-header-fixed").length&&($(window).on("scroll.fl-mega-menu-on-scroll",$.throttle(500,this._megaMenuOnScroll)),$(window).on("resize.fl-mega-menu-on-scroll",$.throttle(500,this._megaMenuOnScroll))),0!=$("html.fl-builder-edit").length&&this._fixedHeadersWhenBuilderActive(),0!=$(".fl-full-width.fl-footer-effect").length&&($(window).on("resize",$.throttle(500,this._footerEffect)),this._footerEffect()),0!=$("body.fl-scroll-to-top").length&&this._toTop(),void 0!==$("body").magnificPopup&&this._enableLightbox(),void 0===$.fn.fitVids||$("body").hasClass("fl-builder")||this._enableFitVids()},_isMobile:function(){return/Mobile|Android|Silk\/|Kindle|BlackBerry|Opera Mini|Opera Mobi|webOS/i.test(navigator.userAgent)},_initRetinaImages:function(){(window.devicePixelRatio?window.devicePixelRatio:1)>1&&$("img[data-retina]").each(FLTheme._convertImageToRetina)},_convertImageToRetina:function(){var e=$(this),a=new Image,n=e.attr("src"),l=e.data("retina");""!=l&&(a.onload=function(){e.css("max-height",a.height),e.width(a.width),e.attr("src",l)},a.src=n)},_setupDropDowns:function(){$("ul.sub-menu").each(function(){$(this).closest("li").attr("aria-haspopup","true")})},_enableTopNavDropDowns:function(){var e=$(".fl-page-bar-nav"),a=e.find(" > li"),n=e.find("> li").has("> ul.sub-menu").find("> a");FLTheme._isMobile()?(a.hover(function(){},FLTheme._navItemMouseout),n.on("click",FLTheme._navSubMenuToggleClick)):a.hover(FLTheme._navItemMouseover,FLTheme._navItemMouseout)},_enablePageNavDropDowns:function(){var e=$(".fl-page-nav .fl-page-nav-collapse"),a=e.find("ul li"),n=e.find("li").has("> ul.sub-menu").find("> a"),l=a.find("ul.sub-menu");$(".fl-page-nav .navbar-toggle").is(":visible")?(a.off("mouseenter mouseleave"),e.find("> ul > li").has("ul.sub-menu").find("> a").on("click",FLTheme._navItemClickMobile),n.off("click",FLTheme._navSubMenuToggleClick)):(e.find("a").off("click",FLTheme._navItemClickMobile),e.removeClass("in").addClass("collapse"),a.removeClass("fl-mobile-sub-menu-open"),a.find("a").width(0).width("auto"),FLTheme._isMobile()?(a.hover(function(){},FLTheme._navItemMouseout),n.on("click",FLTheme._navSubMenuToggleClick)):a.hover(FLTheme._navItemMouseover,FLTheme._navItemMouseout))},_navItemClickMobile:function(e){var a=$(this).parent();a.hasClass("fl-mobile-sub-menu-open")||(e.preventDefault(),a.addClass("fl-mobile-sub-menu-open"))},_navItemMouseover:function(){if(0!==$(this).find("ul.sub-menu").length){var e=$(this),a=e.parent(),n=e.find("ul.sub-menu"),l=n.width(),i=0,t=$(window).width();0!==e.closest(".fl-sub-menu-right").length?e.addClass("fl-sub-menu-right"):$("body").hasClass("rtl")?(i=a.is("ul.sub-menu")?a.offset().left-l:e.offset().left-l)<=0&&e.addClass("fl-sub-menu-right"):(i=a.is("ul.sub-menu")?a.offset().left+2*l:e.offset().left+l)>t&&e.addClass("fl-sub-menu-right"),e.addClass("fl-sub-menu-open"),n.hide(),n.stop().fadeIn(200),FLTheme._hideNavSearch()}},_navItemMouseout:function(){$(this).find("ul.sub-menu").stop().fadeOut({duration:200,done:FLTheme._navItemMouseoutComplete})},_navItemMouseoutComplete:function(){var e=$(this).parent();e.removeClass("fl-sub-menu-open"),e.removeClass("fl-sub-menu-right"),$(this).show()},_navSubMenuToggleClick:function(e){var a=$(this).closest("li").eq(0);a.hasClass("fl-sub-menu-open")||(FLTheme._navItemMouseover.apply(a[0]),e.preventDefault())},_toggleNavSearch:function(){var e=$(".fl-page-nav-search form");e.is(":visible")?e.stop().fadeOut(200):(e.stop().fadeIn(200),$("body").on("click.fl-page-nav-search",FLTheme._hideNavSearch),$(".fl-page-nav-search .fl-search-input").focus())},_hideNavSearch:function(e){var a=$(".fl-page-nav-search form");void 0!==e&&$(e.target).closest(".fl-page-nav-search").length>0||(a.stop().fadeOut(200),$("body").off("click.fl-page-nav-search"))},_updateVerticalRightPos:function(){var e=$(window).width(),a=$(".fl-page").width(),n=(e-a)/2;$(".fl-page-header-vertical").css("right",n)},_navLeft:function(){var e=$(window);e.width()<992&&$(".fl-page-header-primary .fl-page-logo-wrap").insertBefore(".fl-page-header-primary .fl-page-nav-col"),e.width()>=992&&$(".fl-page-header-primary .fl-page-nav-col").insertBefore(".fl-page-header-primary .fl-page-logo-wrap"),0!=$(".fl-page-header-fixed").length&&$(".fl-page-header-fixed .fl-page-fixed-nav-wrap").insertBefore(".fl-page-header-fixed .fl-page-logo-wrap")},_shrinkHeaderInit:function(){$("body").addClass("fl-shrink-header-enabled"),$(window).load(function(){var e=$(".fl-logo-img");e.css("max-height",e.height()),setTimeout(function(){$(".fl-page-header").addClass("fl-shrink-header-transition")},100)})},_shrinkHeaderEnable:function(){var e=$(window);if(e.width()>=992){var a=$(".fl-page-header"),n=a.outerHeight(),l=$(".fl-page-bar"),i=0,t=0;0!=l.length?(i+=l.outerHeight(),t=i+n,0!=$("body.admin-bar").length&&(i+=32),a.css("top",i)):t=n,$(".fl-page").css("padding-top",t),$(e).on("scroll.fl-shrink-header",FLTheme._shrinkHeader)}else $(".fl-page").css("padding-top",0),$(e).off("scroll.fl-shrink-header")},_shrinkHeader:function(){var e=$(this).scrollTop(),a=250,n=$(".fl-page-header");e>250?n.addClass("fl-shrink-header"):n.removeClass("fl-shrink-header")},_fixedHeader:function(){var e=$(window),a=$(".fl-page-header"),n=0,l=0,i=$(".fl-page-bar"),t=0;if(e.width()>=992){if(n=a.outerHeight(),0!=i.length){if(t=i.outerHeight(),l=t+n,0!=$("body.admin-bar").length&&(t+=32),0!=$("html.fl-builder-edit").length)var o=o+11;a.css("top",t)}else l=n;0===$("body.fl-scroll-header").length&&$(".fl-page").css("padding-top",l)}else $(".fl-page").css("padding-top",0)},_enableFixedHeader:function(){var e=$(window);$(".fl-page-header-fixed").addClass("startheader"),e.width()<992?e.off("scroll.fl-page-header-fixed"):e.on("scroll.fl-page-header-fixed",FLTheme._toggleFixedHeader)},_toggleFixedHeader:function(){var e=$(window),a=$(".fl-page-header-fixed"),n=a.hasClass("fixedheader"),l=$(".fl-page-header-primary"),i=!1;i=0===l.length?e.scrollTop()>100:e.scrollTop()>l.height()+l.offset().top,i?n?(a.hasClass("unfixedheader")&&a.removeClass("unfixedheader"),a.hasClass("fixedheader")||a.addClass("fixedheader")):a.hasClass("fixedheader")||a.addClass("fixedheader"):n&&(a.hasClass("fixedheader")&&a.removeClass("fixedheader"),a.hasClass("unfixedheader")||a.addClass("unfixedheader"))},_centeredInlineLogo:function(){var e=$(window),a=$(".fl-page-nav-centered-inline-logo .fl-page-header-logo"),n=$(".fl-logo-centered-inline > .fl-page-header-logo"),l=$(".fl-page-nav-centered-inline-logo .fl-page-nav .navbar-nav"),i=l.children("li").length,t=Math.round(i/2)-1;e.width()>=992&&n.length<1&&(a.hasClass("fl-inline-logo-left")&&i%2!=0?l.children("li:nth( "+t+" )").before('<li class="fl-logo-centered-inline"></li>'):l.children("li:nth( "+t+" )").after('<li class="fl-logo-centered-inline"></li>'),l.children(".fl-logo-centered-inline").append(a)),e.width()<992&&($(".fl-page-nav-centered-inline-logo .fl-page-header-row").prepend(n),$(".fl-logo-centered-inline").remove())},_scrollHeader:function(){var e=$(window),a=null,n=$(".fl-page-header-primary").data("fl-distance");a=$(0!=$(".fl-page-bar").length?".fl-page-header-primary, .fl-page-bar":".fl-page-header-primary"),e.width()>=992?e.on("scroll.fl-show-header-on-scroll",function(){$(this).scrollTop()>n?a.addClass("fl-show"):a.removeClass("fl-show")}):e.off("scroll.fl-show-header-on-scroll")},_megaMenu:function(){var e=$(window),a=$(".fl-page-header-primary"),n=a.find(".fl-page-header-container"),l=n.outerWidth(),i=null,t=0;a.find("li.mega-menu, li.mega-menu-disabled").each(function(){i=$(this),t=i.find("> ul.sub-menu").outerWidth(),void 0!==i.data("megamenu-width")&&(t=i.data("megamenu-width")),i.hasClass("mega-menu")&&l<t?(i.data("megamenu-width",t),i.removeClass("mega-menu"),i.hasClass("mega-menu-disabled")||i.addClass("mega-menu-disabled")):i.hasClass("mega-menu-disabled")&&l>=t&&(i.removeClass("mega-menu-disabled"),i.hasClass("mega-menu")||i.addClass("mega-menu"),i.addClass("mega-menu-items-"+i.children("ul").children("li").length))})},_megaMenuOnScroll:function(){var e=$(window),a=$(".fl-page-header-fixed"),n=a.find(".fl-page-header-container"),l=a.is(":visible"),i=null,t=null;l&&(console.log("_megaMenuOnScroll - fixed_hasClass_fixed: "+l),a.find("li.mega-menu").each(function(){i=$(this),t=i.find("> ul.sub-menu"),n.outerWidth()<t.outerWidth()?(i.removeClass("mega-menu"),i.hasClass("mega-menu-disabled")||i.addClass("mega-menu-disabled")):(i.removeClass("mega-menu-disabled"),i.hasClass("mega-menu")||i.addClass("mega-menu"),i.addClass("mega-menu-items-"+i.children("ul").children("li").length))}),e.off("scroll.fl-mega-menu-on-scroll"),e.off("resize.fl-mega-menu-on-scroll"))},_fixedHeadersWhenBuilderActive:function(){0!=$("body.fl-shrink").length&&$("body").removeClass("fl-shrink"),0!=$("body.fl-fixed-header").length&&$("body").removeClass("fl-fixed-header"),0!=$("body.fl-scroll-header").length&&$("body").removeClass("fl-scroll-header")},_footerEffect:function(){$(window).width()>=768?$(".fl-page").css("margin-bottom",$(".fl-page-footer-wrap").height()):$(".fl-page").css("margin-bottom",0)},_toTop:function(){var e=$("#fl-to-top");e.each(function(){$(this).click(function(){return $("html,body").animate({scrollTop:0},"linear"),!1})}),$(window).scroll(function(){$(this).scrollTop()>800?e.fadeIn():e.fadeOut()})},_enableLightbox:function(){var e=$("body");e.hasClass("fl-builder")||e.hasClass("woocommerce")||$(".fl-content a").filter(function(){return/\.(png|jpg|jpeg|gif)(\?.*)?$/i.test(this.href)}).magnificPopup({closeBtnInside:!1,type:"image",gallery:{enabled:!0}})},_enableFitVids:function(){$(".fl-post-content").fitVids()}},$(function(){FLTheme.init()})}(jQuery);