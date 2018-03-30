// SELECT_BOX Plugin이 없을경우 
if(!$.select_box)
{
	(function(c){c.fn.extend({select_box:function(e){e=c.extend({},c.select_box.defaults,e);this.each(function(){new c.select_box(this,e)})}});c.select_box=function(e,b){var q="",d="",g,l,a=c(e),m=!1,r=0;a.unbind();a.find("ul li a").unbind();a.find(">a").remove();a.find(">ul").remove();a.hasClass("select-box")||a.addClass("select-box");$select_tag=a.find("select");$select_tag.find("option").each(function(){q+="<li><a href='#'>"+c(this).text()+"</a></li>\n";r++});d=a.find("option:selected").text();a.append("<a href='#'>"+
	d+"</a>");a.append("<ul>"+q+"</ul>");a.find("ul li:eq("+a.find("option:selected").index()+") a").addClass("active");g=b.height?b.height:$select_tag.attr("height")?$select_tag.attr("height"):27;g-=2;l=b.maxScroll?b.maxScroll:$select_tag.attr("max-scroll")?$select_tag.attr("max-scroll"):240;g*r>l&&(m=!0);a.css("height",g+(b.useBorderbox?2:0));a.find("a").css({height:g+"px","line-height":g+"px"});a.find("ul").css({top:g+"px"});(b.maxScroll||$select_tag.attr("max-scroll"))&&a.find("ul").css({"max-height":l+
	"px"});d=b.width?b.width:$select_tag.attr("width")?$select_tag.attr("width"):parseInt($select_tag.css("width"))+(m?20:10);a.css("width",d-(b.useBorderbox?0:2));a.find("ul").css("width",d-(b.useBorderbox?0:2));if(b.minWidth||$select_tag.attr("min-width"))d=b.minWidth?b.minWidth:$select_tag.attr("min-width"),a.css("min-width",d-(b.useBorderbox?0:2)),a.find("ul").css("min-width",d-(b.useBorderbox?0:2));if(b.maxWidth||$select_tag.attr("max-width"))d=b.maxWidth?b.maxWidth:$select_tag.attr("max-width"),
	a.css("max-width",d-(b.useBorderbox?0:2)),a.find("ul").css("max-width",d-(b.useBorderbox?0:2));$select_tag.change(function(){var a=c(">option:selected",this).index(),b=c(this).parent().find("ul");n(b.find("li:eq("+a+") a"))});a.on({click:function(){n(c(this))},mouseover:function(){c(this).addClass("hover")},mouseout:function(){c(this).removeClass("hover")}},"ul li a");a.on({click:function(){c(this).hasClass("select-active")?p(a):t(a);return!1},keydown:function(f){if(38==f.keyCode)return u(a,"up"),
	!1;if(40==f.keyCode)return u(a,"down"),!1;if(32==f.keyCode)return c(this).hasClass("select-active")||t(a),!1}});var n=function(f){var c=f.parent().index(),d=f.text(),h=f.parent().parent(),k=h.siblings("select"),e=k.val();k.find("option:eq("+c+")").prop("selected",!0);h.siblings("a").text(d);h.find(".active").removeClass("active");f.addClass("active");f=k.val();if(e!=f)b.onchange(a,k,h);a.find(">a").focus();m&&(c*=g,k=c+g,e=h.scrollTop(),f=e+l,c<e?h.scrollTop(c):k>f&&h.scrollTop(h.scrollTop()+k-f))},
	p=function(a){var b=c(">ul",a);a.removeClass("select-active");c(b).slideUp(100)},t=function(a){var b=a.find("ul");p(c(".select-box.select-active"));a.addClass("select-active");c(b).slideDown(100,function(){a.data("close_func")||(c(document).on("click",function(b){c(b.target).parents(".select-box.select-active ul").length||p(a)}),a.data("close_func","1"))})},u=function(a,b){var c=a.find(".active").parent(),d=a.find("ul li").length-1;if("up"==b){if(0==c.index())return;var e=c.prev().find("a")}else if("down"==
	b){if(c.index()>=d)return;e=c.next().find("a")}n(e)};b.onload(a,a.find("select"),a.find("ul"))};c.select_box.defaults={useBorderbox:!1,width:"",maxWidth:"",minWidth:"",height:"",maxScroll:"",onchange:function(){},onload:function(){}}})(jQuery);
}

// CHCEK_BOX Plugin이 없을경우 
if(!$.check_box)
{
	(function(c){c.fn.extend({check_box:function(f){f=c.extend({},c.check_box.defaults,f);this.each(function(){new c.check_box(this,f)})}});c.check_box=function(f,a){var d=c(f),b=d.find("label"),e=d.find("input");d.unbind();d.hasClass("check-box")||d.addClass("check-box");a.fontSize&&b.css("fontSize",a.fontSize);a.fontColor&&b.css("color",a.fontColor);b.on("click",function(){!1!==a.before(d,e,b)&&(b.removeClass("checkbox-active"),e.prop("checked")?(e.prop("checked",!1),a.normalBg&&b.css("backgroundImage",
	"url("+a.normalBg+")")):(b.addClass("checkbox-active"),e.prop("checked",!0),a.checkBg&&b.css("backgroundImage","url("+a.checkBg+")")),a.onchange(d,e,b));return!1});e.on("change",function(){g("change");return!1});var g=function(c){b.removeClass("checkbox-active");e.prop("checked")?(b.addClass("checkbox-active"),a.checkBg&&b.css("backgroundImage","url("+a.checkBg+")")):a.normalBg&&b.css("backgroundImage","url("+a.normalBg+")");if("change"==c)a.onchange(d,e,b)};g("init")};c.check_box.defaults={fontSize:"",
	fontColor:"",normalBg:"",checkBg:"",before:function(){},onchange:function(){}}})(jQuery);
}

var set_placeholder=function($ele){
	$ele.each(function(){
		if($(this).data('is_set_placeholder')) return;
		var $input=$(this).find("input, textarea");
		if($input.get(0).tagName=="TEXTAREA"){$(this).addClass('placeholder_textarea');}
		var $label=$(this).find("label");
		if($label.length || $input.attr('title'))
		{
			if(!$label.length)
			{
				$label=$("<label for='"+$input.attr('id')+"'>"+$input.attr('title')+"</label>");
				$(this).append($label);
			}
			if($input.val()) $label.hide();
			$input.focus(function(){
				$label.hide();
			}).blur(function(){
				if(trim($input.val())) $label.hide();
				else $label.show();
			});
			$label.click(function(){
				$input.focus();
			});
		}
		$(this).data('is_set_placeholder', '1');
	});
}