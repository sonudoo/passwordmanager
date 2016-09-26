(function(){var l=0;var d=document.getElementById("form_init_script").getAttribute("data-name");var h=d+"common/libs_js/jquery-1.4.4.min.js";var b;var g=[d+"common/libs_js/jquery-ui-1.8.9.custom.min.js",d+"common/libs_js/jquery.ui.datepicker.js",d+"common/js/jquery.validate.js",d+"common/libs_js/jquery.metadata.js",d+"common/libs_js/jquery.placeholder.min.js",d+"validation_data.js?"+Math.floor(Math.random()*1001),d+"common/js/validation.js"];if(navigator.appName=="Microsoft Internet Explorer"){g.splice(0,0,d+"common/libs_js/json2.js")}var j=[d+"common/css/jquery-ui-1.8.5.custom.css",d+"common/css/normalize.css"];var a=function(){$.noConflict();b=jQuery;b(document).ready(function(){for(var p=0;p<g.length;p++){c(g[p],m)}})};var m=function(){if(l<g.length-1){l++;return}else{n()}};function k(){b.each(b("#docContainer img"),function(r,q){var s=b(q).attr("src");var i=s.search("common");if(i==-1){i=s.search("theme")}var p=s.substr(0,i);s=s.replace(p,"");b(q).attr("src",s)});b.each(b("#docContainer, #docContainer *"),function(s,r){if(r.style.backgroundImage){var p=b(r).css("background-image");var t=p.search("http");if(t==-1){t=p.search("file")}var i=p.search("common");if(i==-1){i=p.search("theme")}if(t>=0){var q=p.substr(t,i-t);p=p.replace(q,"")}b(r).css("background-image",p)}})}function f(){jQuery.validator.addMethod("phoneUS",function(i,p){i=i.replace(/[ext]{1,3}\.?\s*[\d]+$/,"");i=i.replace(/\s+/g,"");return this.optional(p)||i.match(/^\(\d{3}\)\d{3}-\d{4}$/)||i.match(/^1-[\d-]{12}$/)||i.match(/^[\d-.]{12}$/)},"Please specify a valid phone number");jQuery.validator.addMethod("phoneUK",function(i,p){i=i.replace(/[ext]{1,3}\.?\s*[\d]+$/,"");i=i.replace(/\s+/g,"");return this.optional(p)||i.match(/^\(0\d{2}\)\d{8}$/)||i.match(/^\(0\d{3}\)\d{7}$/)||i.match(/^\(0\d{4}\)\d{5,6}$/)||i.match(/^\(0\d{5}\)\d{4,5}$/)||i.match(/^0\d{9,10}$/)},"Please specify a valid phone number");jQuery.validator.addMethod("mobileUK",function(i,p){i=i.replace(/[ext]{1,3}\.?\s*[\d]+$/,"");i=i.replace(/\s+/g,"");return this.optional(p)||i.match(/^07\d{9}$/)},"Please specify a valid mobile number");jQuery.validator.addMethod("international",function(i,p){i=i.replace(/[ext]{1,3}\.?\s*[\d]+$/,"");i=i.replace(/\s+/g,"");i=i.replace(/[^\d+]/g,"");return this.optional(p)||i.match(/^\+?\d{9,15}$/)},"Please enter a valid phone number")}function n(){if(document.getElementById("docContainer")==null){return}f();var q=document.getElementById("docContainer").getAttribute("data-form")=="preview";var u=new ValidateClient(b);u.init_client(q);if(b('input[name="fb_form_custom_html"]').length&&b("#docContainer").attr("data-form")=="automated"&&b("#docContainer").attr("action")!="./"){b('input[name="fb_form_custom_html"]').get(0).value=parent.location.href}if(b('input[name="fb_form_embedded"]').length&&parent.frames.length!=0&&b("#docContainer").attr("data-form")=="publish"){b('input[name="fb_form_embedded"]').get(0).value="1"}if(b("#docContainer").attr("data-form")=="automated"&&b("#docContainer").attr("action")==document.location.href){k()}if((b("#docContainer").attr("data-form")=="publish"||b("#docContainer").attr("data-form")=="automated")&&parent.frames.length!=0||b("#docContainer").attr("action").indexOf("http")!=-1||b("#docContainer").attr("action")=="./"){b('#docContainer input[type!="submit"],#docContainer select,#docContainer textarea').change(function(i){b('#docContainer input[type!="submit"],#docContainer select,#docContainer textarea').unbind(i);var w=b("#docContainer").attr("action");w=w.replace(/(?:\.php)|\/$/i,"/fbapp/api/formchangestats.php");b.get(w)})}b("#docContainer .fb-checkbox, #docContainer .fb-radio, #docContainer .fb-dropdown, #docContainer .fb-listbox").parent().mouseleave(function(){var i=b(".showing_hint",this);if(i!=undefined){i.removeClass("showing_hint").addClass("hidden_hint")}});b("#docContainer input:file").parent().parent().mouseleave(function(){var i=b(".showing_hint",this);if(i!=undefined){i.removeClass("showing_hint").addClass("hidden_hint")}});b("#docContainer input:checkbox, #docContainer input:radio").blur(function(){var i=b(".showing_hint",b(this).parent().parent().parent());if(i!=undefined){i.removeClass("showing_hint").addClass("hidden_hint")}});b("#docContainer .column select, #docContainer .column input, #docContainer .column textarea").blur(function(){var i=b(".showing_hint",b(this).parent().parent());if(i!=undefined){i.removeClass("showing_hint").addClass("hidden_hint")}});b("#docContainer .fb-checkbox, #docContainer .fb-radio, #docContainer .fb-dropdown, #docContainer .fb-listbox").parent().mouseenter(function(){var i=b(".hidden_hint",this);if(i!=undefined){i.removeClass("hidden_hint").addClass("showing_hint")}});b("#docContainer input:file").parent().parent().mouseenter(function(){var i=b(".hidden_hint",this);if(i!=undefined){i.removeClass("hidden_hint").addClass("showing_hint")}});b("#docContainer input:checkbox, #docContainer input:radio").focus(function(){var i=b(".hidden_hint",b(this).parent().parent().parent());if(i!=undefined){i.removeClass("hidden_hint").addClass("showing_hint")}});b("#docContainer .column select, #docContainer .column input, #docContainer .column textarea").focus(function(){var i=b(".hidden_hint",b(this).parent().parent());if(i!=undefined){i.removeClass("hidden_hint").addClass("showing_hint")}});b("input:file").change(function(){b("#docContainer").validate().element(this)});b("input[type=url]").blur(function(){b("#docContainer").validate().element(this)});b("input[type=email]").blur(function(){b("#docContainer").validate().element(this)});b("input[type=password]").blur(function(){b("#docContainer").validate().element(this)});b("input[type=tel]").blur(function(){b("#docContainer").validate().element(this)});if(navigator.appName=="Microsoft Internet Explorer"){b("input[type=tel]").keyup(function(){return false})}b("input[type=number]").keyup(function(){var i=b("#docContainer").validate().element(this);if(navigator.appName!="Microsoft Internet Explorer"&&b("#"+this.id+":invalid").length>0&&(i==undefined||i==true)){var x=this.name;var w={};w[x]="Input must be a valid number";b("#docContainer").validate().showErrors(w)}else{b('label[for="'+this.id+'"]').remove();b("#docContainer").validate().element(this)}}).blur(function(){b('label[for="'+this.id+'"]').remove();b("#docContainer").validate().element(this)});var t="placeholder" in document.createElement("input");var p="placeholder" in document.createElement("textarea");if(!t){b("#docContainer input").placeholder()}if(!p){b("#docContainer textarea").placeholder()}var r=[];var v=[];if(data_jsplugins!=undefined&&data_jsplugins.length>0){r=JSON.parse(data_jsplugins)}if(data_cssplugins!=undefined&&data_cssplugins.length>0){v=JSON.parse(data_cssplugins)}for(var s=0;s<r.length;s++){c(r[s])}for(var s=0;s<v.length;s++){o(v[s])}}var c=function(i,q){var p=document.createElement("script");p.setAttribute("type","text/javascript");p.setAttribute("src",i);if(q!=undefined){if(p.addEventListener){p.addEventListener("load",q,false)}else{if(p.attachEvent){p.attachEvent("onreadystatechange",function(){if(p.readyState=="complete"||p.readyState=="loaded"){q()}})}}}document.getElementsByTagName("head")[0].appendChild(p)};var o=function(i){var p=document.createElement("link");p.setAttribute("rel","stylesheet");p.setAttribute("type","text/css");p.setAttribute("href",i);document.getElementsByTagName("head")[0].appendChild(p)};for(var e=0;e<j.length;e++){o(j[e])}c(h,a)})();