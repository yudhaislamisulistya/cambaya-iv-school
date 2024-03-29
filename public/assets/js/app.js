! function (e) {
    "use strict";
    e(document).ready((function () {
        e('[data-toggle="popover"]').popover(), e('[data-toggle="tooltip"]').tooltip(), $(window).on("scroll", (function () {
            $(window).scrollTop() > 0 ? $(".iq-top-navbar").addClass("fixed") : $(".iq-top-navbar").removeClass("fixed")
        })), $(window).on("scroll", (function () {
            $(window).scrollTop() > 0 ? $(".white-bg-menu").addClass("sticky-menu") : $(".white-bg-menu").removeClass("sticky-menu")
        })), void 0 !== $.fn.magnificPopup && (e(".popup-gallery").magnificPopup({
            delegate: "a.popup-img",
            type: "image",
            tLoading: "Loading image #%curr%...",
            mainClass: "mfp-img-mobile",
            gallery: {
                enabled: !0,
                navigateByImgClick: !0,
                preload: [0, 1]
            },
            image: {
                tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
                titleSrc: function (e) {
                    return e.el.attr("title") + "<small>by Marsel Van Oosten</small>"
                }
            }
        }), e(".popup-youtube, .popup-vimeo, .popup-gmaps").magnificPopup({
            disableOn: 700,
            type: "iframe",
            mainClass: "mfp-fade",
            removalDelay: 160,
            preloader: !1,
            fixedContentPos: !1
        })), e(document).on("click", ".iq-waves-effect", (function (t) {
            e(".ripple").remove();
            let l = e(this).offset().left,
                a = e(this).offset().top,
                n = e(this).width(),
                i = e(this).height();
            e(this).prepend("<span class='ripple'></span>"), n >= i ? i = n : n = i;
            let o = t.pageX - l - n / 2,
                s = t.pageY - a - i / 2;
            e(".ripple").css({
                width: n,
                height: i,
                top: s + "px",
                left: o + "px"
            }).addClass("rippleEffect")
        })), e(document).on("click", ".iq-menu > li > a", (function () {
            e(".iq-menu > li > a").parent().removeClass("active"), e(this).parent().addClass("active")
        }));
        var t = e("li.active").parents(".iq-submenu.collapse");
        if (t.addClass("show"), t.parents("li").addClass("active"), e('li.active > a[aria-expanded="false"]').attr("aria-expanded", "true"), e(document).on("click", ".iq-full-screen", (function () {
                let t = e(this);
                document.fullscreenElement || document.mozFullScreenElement || document.webkitFullscreenElement || document.msFullscreenElement ? document.cancelFullScreen ? document.cancelFullScreen() : document.mozCancelFullScreen ? document.mozCancelFullScreen() : document.webkitCancelFullScreen ? document.webkitCancelFullScreen() : document.msExitFullscreen && document.msExitFullscreen() : document.documentElement.requestFullscreen ? document.documentElement.requestFullscreen() : document.documentElement.mozRequestFullScreen ? document.documentElement.mozRequestFullScreen() : document.documentElement.webkitRequestFullscreen ? document.documentElement.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT) : document.documentElement.msRequestFullscreen && document.documentElement.msRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT), t.find("i").toggleClass("ri-fullscreen-line").toggleClass("ri-fullscreen-exit-line")
            })), e("#load").fadeOut(), e("#loading").delay().fadeOut(""), void 0 !== window.counterUp) {
            const e = window.counterUp.default;
            $(".counter").each((function (t, l) {
                new Waypoint({
                    element: $(this),
                    handler: function () {
                        e(l, {
                            duration: 1e3,
                            delay: 10
                        }), this.destroy()
                    },
                    offset: "bottom-in-view"
                })
            }))
        }
        e(".iq-progress-bar > span").each((function () {
            let t = e(this),
                l = e(this).data("percent");
            t.css({
                transition: "width 2s"
            }), setTimeout((function () {
                t.appear((function () {
                    t.css("width", l + "%")
                }))
            }), 100)
        })), e(".progress-bar-vertical > span").each((function () {
            let t = e(this),
                l = e(this).data("percent");
            t.css({
                transition: "height 2s"
            }), setTimeout((function () {
                t.appear((function () {
                    t.css("height", l + "%")
                }))
            }), 100)
        })), e(document).on("click", ".wrapper-menu", (function () {
            e(this).toggleClass("open")
        })), e(document).on("click", ".wrapper-menu", (function () {
            e("body").toggleClass("sidebar-main")
        })), e(".close-toggle").on("click", (function () {
            e(".h-collapse.navbar-collapse").collapse("hide")
        })), e(document).on("click", "ul.iq-email-sender-list li", (function () {
            e(this).next().addClass("show")
        })), e(document).on("click", ".email-app-details li h4", (function () {
            e(".email-app-details").removeClass("show")
        })), e(document).on("click", ".chat-head .chat-user-profile", (function () {
            e(this).parent().next().toggleClass("show")
        })), e(document).on("click", ".user-profile .close-popup", (function () {
            e(this).parent().parent().removeClass("show")
        })), e(document).on("click", ".chat-search .chat-profile", (function () {
            e(this).parent().next().toggleClass("show")
        })), e(document).on("click", ".user-profile .close-popup", (function () {
            e(this).parent().parent().removeClass("show")
        })), e(document).on("click", "#chat-start", (function () {
            e(".chat-data-left").toggleClass("show")
        })), e(document).on("click", ".close-btn-res", (function () {
            e(".chat-data-left").removeClass("show")
        })), e(document).on("click", ".iq-chat-ui li", (function () {
            e(".chat-data-left").removeClass("show")
        })), e(document).on("click", ".sidebar-toggle", (function () {
            e(".chat-data-left").addClass("show")
        })), e(document).on("click", ".todo-task-list > li > a", (function () {
            e(".todo-task-list li").removeClass("active"), e(".todo-task-list .sub-task").removeClass("show"), e(this).parent().toggleClass("active"), e(this).next().toggleClass("show")
        })), e(document).on("click", ".todo-task-list > li li > a", (function () {
            e(".todo-task-list li li").removeClass("active"), e(this).parent().toggleClass("active")
        })), e(document).on("click", ".iq-user-toggle", (function () {
            e(this).parent().addClass("show-data")
        })), e(document).on("click", ".close-data", (function () {
            e(".iq-user-toggle").parent().removeClass("show-data")
        })), e(document).on("click", (function (t) {
            var l = e(".iq-user-toggle");
            l === t.target || l.has(t.target).length || e(".iq-user-toggle").parent().removeClass("show-data")
        })), e(window).scroll((function () {
            e(window).scrollTop() >= 10 && e(".iq-user-toggle").parent().hasClass("show-data") && e(".iq-user-toggle").parent().removeClass("show-data")
        }));
        let l = window.Scrollbar;
        e(".data-scrollbar").length && l.init(document.querySelector(".data-scrollbar"), {
            continuousScrolling: !1
        }), $.fn.DataTable && $(".data-table").DataTable( {
            dom: 'lBfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        } ), window.addEventListener("load", (function () {
            var e = document.getElementsByClassName("needs-validation");
            Array.prototype.filter.call(e, (function (e) {
                e.addEventListener("submit", (function (t) {
                    !1 === e.checkValidity() && (t.preventDefault(), t.stopPropagation()), e.classList.add("was-validated")
                }), !1)
            }))
        }), !1), e("#my-table tr th").click((function () {
            e("#my-table tr th").children().removeClass("active"), e(this).children().addClass("active"), e("#my-table td").each((function () {
                e(this).hasClass("active") && e(this).removeClass("active")
            }));
            var t = e(this).index();
            e("#my-table tr td:nth-child(" + parseInt(t + 1) + ")").addClass("active")
        })), e(".date-input").hasClass("basicFlatpickr") && (e(".basicFlatpickr").flatpickr(), e("#inputTime").flatpickr({
            enableTime: !0,
            noCalendar: !0,
            dateFormat: "H:i"
        }), e("#inputDatetime").flatpickr({
            enableTime: !0
        }), e("#inputWeek").flatpickr({
            weekNumbers: !0
        }), e("#inline-date").flatpickr({
            inline: !0
        }), e("#inline-date1").flatpickr({
            inline: !0
        })), e(window).on("resize", (function () {
            e(this).width() <= 1299 ? e("#salon-scrollbar").addClass("data-scrollbar") : e("#salon-scrollbar").removeClass("data-scrollbar")
        })).trigger("resize"), e(".data-scrollbar").each((function () {
            var t = $(this).attr("data-scroll");
            if (void 0 !== t && !1 !== t) {
                let t = window.Scrollbar;
                var l = e(this).data("scroll");
                t.init(document.querySelector('div[data-scroll= "' + l + '"]'))
            }
        })), e(".data-tables").length && $(".data-tables").DataTable(), $(".form_gallery-upload").on("change", (function () {
            var e = $(this).get(0).files.length,
                t = $(this).attr("data-name");
            e > 1 ? $(t).text(e + " files selected") : $(t).text($(this)[0].files[0].name)
        })), $(document).ready((function () {
            $(".form_video-upload input").change((function () {
                $(".form_video-upload p").text(this.files.length + " file(s) selected")
            }))
        })), e(".qty-btn").on("click", (function () {
            var t = e(this).attr("id"),
                l = parseInt(e("#quantity").val());
            "btn-minus" == t ? 0 != l ? e("#quantity").val(l - 1) : e("#quantity").val(0) : e("#quantity").val(l + 1)
        })), void 0 !== $.fn.select2 && ($("#single").select2({
            placeholder: "Select a Option",
            allowClear: !0
        }), $("#multiple").select2({
            placeholder: "Select a Multiple Option",
            allowClear: !0
        }), $("#multiple2").select2({
            placeholder: "Select a Multiple Option",
            allowClear: !0
        })), e(window).on("scroll", (function (t) {
            var l = e("#pricing-pills-tab");
            if (l.length) {
                var a = l.offset().top - window.outerHeight;
                e(window).scrollTop() >= a && (t.preventDefault(), e("#pricing-pills-tab li a").removeClass("active"), e("#pricing-pills-tab li a[aria-selected=true]").addClass("active"))
            }
        }))
    }))
}(jQuery);