!function(n,e,t,i){"use strict";var c={},o={};e.mce=e.mce||{},e.mce.fascviews={register:function(n,e){},unregister:function(n){delete c[n]},get:function(n){return c[n]},unbind:function(){_.each(o,function(n){n.unbind()})},render:function(n){_.each(o,function(e){e.render(n)})},edit:function(n,e){var t=this.getInstance(e);t&&t.edit&&t.edit(t.text,function(i,c){t.update(i,n,e,c)})},remove:function(n,e){var t=this.getInstance(e);t&&t.remove(n,e)}}}(window,window.wp,window.wp.shortcode,window.jQuery);