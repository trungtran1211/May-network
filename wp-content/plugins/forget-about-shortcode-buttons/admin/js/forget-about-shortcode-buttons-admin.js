function addFascToEditor(t){function e(t){t.stopPropagation()}function n(){var e=tinymce.activeEditor.dom.select(".fasc-button"),n=!1;jQuery(e).each(function(){if(jQuery(this).is("[data-fasc-style]")){var e=jQuery(this).attr("data-fasc-style").replace(/\s+/,""),o="";jQuery(this).is("[style]")&&(o=jQuery(this).attr("style").replace(/\s+/,"")),e!=o&&(jQuery(this).attr("style",jQuery(this).attr("data-fasc-style")),t.nodeChanged(),n=!0)}})}function o(e){t.undoManager.transact(function(){t.dom.remove(e),c(),t.focus()})}function a(e){var n=t.dom;e&&(e!==r&&(t.getBody().focus(),c(),r=e,n.setAttrib(e,"data-mce-selected",1)),t.nodeChanged())}function c(){var n=t.dom;r&&(n.unbind(r,"beforedeactivate focusin focusout click mouseup",e),n.setAttrib(r,"data-mce-selected",null)),r=null}function s(e){var n=m(e),o=n.find(".fasc-button");o.attr("data-fasc-temp",null),o.attr("data-fasc-style",null);var a=1;return m(o).each(function(){var t=m(this);a++;var e=t.attr("data-fasc-href");t.attr("href",e),t.attr("data-fasc-href",null),t.attr("data-fasc-id",null)}),t.dom.getOuterHTML(n)}function i(){for(var e=t.dom.select(".fasc-button"),n=0;n<e.length;n++){var o=e[n],a=t.dom.getAttrib(o,"href"),c=t.dom.getAttrib(o,"data-fasc-href"),s=t.dom.getAttrib(o,"style");""==c&&""!=a&&(t.dom.setAttrib(o,"data-fasc-href",a),t.dom.setAttrib(o,"href",null)),t.dom.setAttrib(o,"data-fasc-style",s)}}function d(t,e,n,o,s){if(void 0===s)var s="";"function"!=typeof o&&(o=function(o,s){var i=t.$(o);n?t.$(e).replaceWith(i):t.selection.setContent(o);t.$("[data-fasc-id='"+s+"']");c(),t.focus(),t.nodeChanged(),a(t.dom.select("a[data-fasc-id='"+s+"']")[0]),t.undoManager.add()}),wp.mce.fascpopup.open(e,"button",o,n,s)}var r,u,f,l,m=t.$,p=(tinymce.Env,tinymce.util.VK,tinymce.dom.TreeWalker,!0),b=function(){return!1};/iPad|iPod|iPhone/.test(navigator.userAgent);if(t.addButton("button_fasc_insert_button",{title:"Insert Button",icon:"fascbutton-ico",onclick:function(){t.execCommand("popup_insert_fasc_button",0,0)}}),t.addCommand("popup_insert_fasc_button",function(e,n){var o=!1;t.dom.hasClass(t.selection.getNode(),"fasc-button")&&(o=!0);var a=t.selection.getContent({format:"text"});d(t,t.selection.getNode(),o,{},a)}),"undefined"==typeof wp||!wp.mce)return{getView:b};t.on("SetContent",function(){i()}),t.on("init",function(){t.on("dblClick",function(e){if(t.dom.hasClass(e.target,"fasc-button"))return e.preventDefault(),d(t,e.target,!0),!1},!0),t.addCommand("popup_insert_fasc_button",function(e,n){var o=!1;t.dom.hasClass(t.selection.getNode(),"fasc-button")&&(o=!0);var a=t.selection.getContent({format:"text"});d(t,t.selection.getNode(),o,{},a)});var e=!1;t.selection,window.MutationObserver||window.WebKitMutationObserver;t.dom.bind(t.getDoc(),"touchmove",function(){e=!0}),t.on("mousedown mouseup click touchend",function(n){p=!1,t.dom.hasClass(n.target,"fasc-button")?"touchend"===n.type&&e?e=!1:a(n.target):"touchend"!==n.type&&"mousedown"!==n.type||c(),"touchend"===n.type&&e&&(e=!1)},!0)}),t.on("PreProcess",function(t){},!0),t.on("hide",function(){c()}),t.on("PostProcess",function(e){e.content&&t.$("<div>"+e.content+"</div>").clone().find(".fasc-button").length>0&&(e.content=s(e.content))}),t.on("keydown",function(e){if(c(),32==e.keyCode&&t.dom.hasClass(t.selection.getNode(),"fasc-button")&&t.selection.getRng().startOffset==m(t.selection.getNode()).text().length){var n=tinymce.DOM.uniqueId(),o=t.dom.create("span",{id:n},"&nbsp;");t.dom.insertAfter(o,t.selection.getNode());var a=t.dom.select("span#"+n);return t.selection.select(a[0]),t.selection.collapse(0),t.dom.setAttrib(n,"id",""),!1}}),t.on("focus",function(){f=!0,p=!1}),t.on("blur",function(){f=!1}),t.on("NodeChange",function(e){t.dom,t.dom.select(".fascview-wrap"),e.element.className;u=!1,clearInterval(void 0)}),t.on("BeforeExecCommand",function(){t.selection.getNode()}),t.on("ExecCommand",function(){}),t.on("ResolveName",function(t){}),t.on("PastePostProcess",function(){n()}),t.addButton("fasc_view_edit",{tooltip:"Edit ",icon:"dashicon dashicons-edit",onclick:function(){r&&d(t,r,!0)}}),t.addButton("fasc_view_remove",{tooltip:"Remove",icon:"dashicon dashicons-no",onclick:function(){r&&o(r)}}),t.once("preinit",function(){t.wp&&t.wp._createToolbar&&(l=t.wp._createToolbar(["fasc_view_edit","fasc_view_remove"]))}),t.on("wptoolbar",function(t){r&&(t.element=r,t.toolbar=l)}),t.wp=t.wp||{}}!function(t){"use strict";jQuery(document).on("tinymce-editor-setup",function(t,e){-1===e.settings.plugins.indexOf("fascbutton")&&(e.settings.toolbar1+=",button_fasc_insert_button",e.on("PreInit",function(t){e.dom.loadCSS(Fasc.plugin_url+"css/forget-about-shortcode-buttons-mce.css")}),Fasc.load_js&&addFascToEditor(e))})}(jQuery);