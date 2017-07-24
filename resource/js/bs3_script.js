$(document).ajaxStart(function (e) {
    var tpl = '<div id="cf-loading-tips">Loading...</div>';
    var url = window.location.href;
    if (url.indexOf('/zh/') != -1)
        tpl = '<div id="cf-loading-tips">加载中...</div>';
    $(tpl).appendTo("body");
    $('#cf-loading-tips').fadeIn();
});

$(document).ajaxStop(function () {
    $('#cf-loading-tips').fadeOut(function () {
        $('#cf-loading-tips').remove();
    });
});

$(document).ready(function () {

   

    $('form.form-ajax').live('submit', function () {
        var $form = $(this);
        var $alert = $form.find('.form-alert');

        var $form = $(this);

        var is_confirm = $(this).data('confirm');

        if (is_confirm == undefined || is_confirm.length == 0 || confirm($(this).data('confirm'))) {
            $form.find('textarea.kindeditor').each(function () {
                if (typeof KindEditor != 'undefined') {
                    KindEditor.sync('#' + $(this).attr('id'));
                }
            });

            var $btns = $form.find(".btn").not('.btn-noreset');

            $btns.prop('disabled', true).addClass("disabled");

            $alert.html('').addClass('hidden').removeClass('alert-success alert-danger').hide();

            $.ajax({
                type: "post",
                url: $form.attr("action"),
                dataType: "json",
                data: $form.serialize(),
                success: function (req) {
                    if (req.needlogin) {
                        var $login_btn = $("#web-login-btn-group").find('a.btn-login').first();
                        $login_btn.click();
                    } else {
                        if (req.success) {
                            $alert.html(req.message).removeClass('hidden').addClass('alert-success').show();

                            if (req.callback) {
                                if (req.immediately != undefined && req.immediately != null && req.immediately == 1) {
                                    window.location = req.callback;
                                } else {
                                    $.timeout(3000).done(function () {
                                        window.location = req.callback;
                                    });
                                }
                            }
                        } else {
                            $alert.html(req.message).removeClass('hidden').addClass('alert-danger').show();
                        }

                        if ($alert.hasClass('auto-hide')) {
                            $alert.fadeOut(2000);
                        }
                    }

                    $btns.prop('disabled', false).removeClass("disabled");
                },
                error: function (a, b, c) {
                    console.log(a, b, c);
                }
            });
        }

        return false;
    });
});

function getUrlParameter(url, param) {
    return decodeURIComponent(
        (url.match(RegExp("[?|&]" + param + '=(.+?)(&|$)')) || [, null])[1]
    );
}

function updateUrlParameter(url, param, paramVal) {
    var TheAnchor = null;
    var newAdditionalURL = "";
    var tempArray = url.split("?");
    var baseURL = tempArray[0];
    var additionalURL = tempArray[1];
    var temp = "";

    if (additionalURL) {
        var tmpAnchor = additionalURL.split("#");
        var TheParams = tmpAnchor[0];
        TheAnchor = tmpAnchor[1];
        if (TheAnchor)
            additionalURL = TheParams;

        tempArray = additionalURL.split("&");

        for (i = 0; i < tempArray.length; i++) {
            if (tempArray[i].split('=')[0] != param) {
                newAdditionalURL += temp + tempArray[i];
                temp = "&";
            }
        }
    } else {
        var tmpAnchor = baseURL.split("#");
        var TheParams = tmpAnchor[0];
        TheAnchor = tmpAnchor[1];

        if (TheParams)
            baseURL = TheParams;
    }

    if (TheAnchor)
        paramVal += "#" + TheAnchor;

    var rows_txt = temp + "" + param + "=" + paramVal;
    return baseURL + "?" + newAdditionalURL + rows_txt;
}

function loadScripts(scripts, callback) {
    var scripts = scripts || new Array();
    var callback = callback || function () {
    };

    for (var i = 0; i < scripts.length; i++) {
        (function (i) {
            $.getScript(scripts[i], function () {
                if (i + 1 == scripts.length) {
                    callback();
                }
            });
        })(i);
    }
}

function formatMoney(number, places) {
    number = number || 0;
    places = !isNaN(places = Math.abs(places)) ? places : 2;
    var thousand = ",";
    var decimal = ".";
    var negative = number < 0 ? "-" : "",
        i = parseInt(number = Math.abs(+number || 0).toFixed(places), 10) + "",
        j = (j = i.length) > 3 ? j % 3 : 0;
    return negative + (j ? i.substr(0, j) + thousand : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + thousand) + (places ? decimal + Math.abs(number - i).toFixed(places).slice(2) : "");
}

function parseDate(date) {
    var reggie = /(\d{4})-(\d{2})-(\d{2}) (\d{2}):(\d{2}):(\d{2})/;
    var date_array = reggie.exec(date);
    return new Date((+date_array[1]), (+date_array[2]) - 1, (+date_array[3]), (+date_array[4]), (+date_array[5]), (+date_array[6]));
}

function padLeft(val, pad, len) {
    for (var i = 0; i < len; i++) {
        pad += pad;
    }
    return (pad + val).slice(len * -1);
}

function formatDate(date, format) {
    var o = {
        "M+": date.getMonth() + 1, //month
        "d+": date.getDate(), //day
        "h+": date.getHours(), //hour
        "m+": date.getMinutes(), //minute
        "s+": date.getSeconds(), //second
        "q+": Math.floor((date.getMonth() + 3) / 3), //quarter
        "S": date.getMilliseconds() //millisecond
    }

    if (/(y+)/.test(format))
        format = format.replace(RegExp.$1, (date.getFullYear() + "").substr(4 - RegExp.$1.length));

    for (var k in o)
        if (new RegExp("(" + k + ")").test(format))
            format = format.replace(RegExp.$1, RegExp.$1.length == 1 ? o[k] : ("00" + o[k]).substr(("" + o[k]).length));

    return format;
}

function parseToInt(v) {
    var i = parseInt(v);
    if (isNaN(i)) return 0;
    return i;
}

function shopcartAnimate(number, title) {
    var image = $("#product-image");
    var shopcart = $("#page_shopcart");

    var gx = shopcart.offset().left - image.offset().left;
    var gy = shopcart.offset().top - image.offset().top;
    image.clone()
        .prependTo(image.parent())
        .css({
            'position': 'absolute'
        })
        .animate({
            opacity: 0.9
        }, 100)
        .animate({
            opacity: 0.3,
            marginLeft: gx,
            marginTop: gy,
            width: image.width() / 3,
            height: image.height() / 3
        },
        1200,
        function () {
            $(this).remove();
            shopcart.animate({
                opacity: 0.76,
                backgroundColor: "#188d13"
            }, 500, function () {
                $(this).animate({
                    opacity: 1,
                    backgroundColor: "#FFF"
                }, 500);
            });

            shopcart.find('a strong').html(number).attr('title', title);
        });
}

function isURL(str) {
    return /(^|\s)((https?:\/\/)?[\w-]+(\.[\w-]+)+\.?(:\d+)?(\/\S*)?)/gi.test(str);
}

;
(function ($) {
    $.timeout = function (delay) {
        var args = Array.prototype.slice.call(arguments, 1);

        var deferred = $.Deferred(function (deferred) {
            deferred.timeoutID = window.setTimeout(function () {
                deferred.resolveWith(deferred, args);
            }, delay);

            deferred.fail(function () {
                window.clearTimeout(deferred.timeoutID);
            });
        });

        return $.extend(deferred.promise(), {
            clear: function () {
                deferred.rejectWith(deferred, arguments);
            }
        });
    };
})(jQuery);