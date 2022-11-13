;(function($){
    function close(options, wrapper){
        wrapper.fadeOut('slow', function(){
            $(this).remove();
        });
    }

    function create_element(tag, cl){
        return $(document.createElement(tag)).addClass(cl);
    }

    $.extend({
        notify: function(options, duration) {
            var
            // Default options object
                defaults = {
                    html: '',
                    close: ''
                },

            // Useful variables
                clone,
                container,
                wrapper = $('<li></li>').addClass('notification'),
                content;
            options = $.extend(defaults, options);
            if($('ul#product_notification_area').length) {
                container = $('ul#product_notification_area');
            }
            else {
                container = $('<ul></ul>').attr('id', 'product_notification_area');
                $('body').append(container);
            }

            clone = $(options.html);
            wrapper.append(
                content = create_element('div', 'item_notify_content').append(clone)
            );
            wrapper.css("visibility", "hidden").appendTo(container);
            if(options.close){
                var close_elem = $('<span></span>').addClass('cl').html(options.close);
                content.append(close_elem);
            }

            var anim_length = 0 - parseInt(wrapper.outerHeight());
            wrapper.css('marginBottom', anim_length);
            wrapper.animate({marginBottom: 0}, 'slow', function(){
                wrapper.hide().css('visibility', 'visible').fadeIn('slow');
                if(duration){
                    setTimeout(function(){
                        close(options, wrapper);
                    }, duration);
                }
                if(options.close){
                    close_elem.bind('click', function(){
                        close(options, wrapper);
						$('ul#product_notification_area').css("display", "none");
                    })
                }

            });
        }
    });
})(jQuery);
