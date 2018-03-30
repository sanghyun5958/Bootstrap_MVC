<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);
add_javascript('<script type="text/javascript" src="'.$board_skin_url.'/js/default.js"></script>', 100);

// 파일, 링크, 트랙백 버튼
$ad_btn = "";
if($is_file) {
	$ad_btn .= "<a id='ad-btn_file' href=\"javascript:ad_layer('file');\" class='btn_file' title='첨부파일'><span>파일첨부</span>";
	if($w=="u") $ad_btn .= "<em>{$file['count']}</em>";
	$ad_btn .= "</a>";
}

if($is_link) {
	$ad_btn .= "<a id='ad-btn_link' href=\"javascript:ad_layer('link');\" class='btn_link' title='링크'><span>링크</span>";
	if($w=="u") $ad_btn .= "<em>{$link['count']}</em>";
	$ad_btn .= "</a>";
}
// 파일, 링크, 트랙백 리스트
if($w=="u") {

	$k = 0;
	$ad_list = "";
	for($i=0; $i<$file_count; $i++) { 
		if($file[$i]['source'] && $file[$i]['size'])
		{
			$ad_list .= "<li id='ad-file_list_{$i}'";
			if($k==0) $ad_list .= " class='first' ";
			$ad_list .= ">";
				$ad_list .= "<span class='txt_name'>{$file[$i][source]}</span>";
				$ad_list .= "<span class='txt_size'>".((int)$file[$i][size] ? '('.$file[$i][size].')' : '')."</span>";
				$ad_list .= "<span class='txt_date'>".($file[$i][source] ? $file[$i][datetime] : '')."</span>";
				$ad_list .= $file[$i][source] ? "<a href='javascript:delete_ad_file($i);' class='btn_del'>삭제</a>" : '&nbsp;';
				if($file[$i][bf_content]) $ad_list .= "<p class='txt_file_content'>{$file[$i][bf_content]}</p>";
			$ad_list .= "</li>";
			$ad_list .= "<input type='hidden' id='bf_file_del_$i' name='bf_file_del[$i]' value='0' />";
			$k++;
		}
	}

	if($is_link && $link) {
		$link['count']=0;
		foreach($link as $value) {
			if(!$value) continue;
			$ad_list .= "<li";
			if($k==0) $ad_list .= " class='first' ";
			$ad_list .= ">";
			$ad_list .= "<span class='txt_link'>".cut_str($value, 70)."</span>";
			$ad_list .= "</li>";

			$k++;
			$link['count']++;
		}
	}
}
?>
<section id="bo_w" class="fz_wrap">
	<div class="fz_title_box"><?php echo $g5['title'] ?></div>

    <!-- 게시물 작성/수정 시작 { -->
    <form name="fwrite" id="fwrite" action="<?php echo $action_url ?>" onsubmit="return fwrite_submit(this);" method="post" enctype="multipart/form-data" autocomplete="off" style="width:<?php echo $width; ?>">
    <input type="hidden" name="uid" value="<?php echo get_uniqid(); ?>">
    <input type="hidden" name="w" value="<?php echo $w ?>">
    <input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
    <input type="hidden" name="wr_id" value="<?php echo $wr_id ?>">
    <input type="hidden" name="sca" value="<?php echo $sca ?>">
    <input type="hidden" name="sfl" value="<?php echo $sfl ?>">
    <input type="hidden" name="stx" value="<?php echo $stx ?>">
    <input type="hidden" name="spt" value="<?php echo $spt ?>">
    <input type="hidden" name="sst" value="<?php echo $sst ?>">
    <input type="hidden" name="sod" value="<?php echo $sod ?>">
    <input type="hidden" name="page" value="<?php echo $page ?>">
    <?php
    $option = '';
    $option_hidden = '';
    if ($is_notice || $is_html || $is_secret || $is_mail) {
        $option = '';
        if ($is_notice) {
            $option .= "\n".'<span class="checkbox"><input type="checkbox" id="notice" name="notice" value="1" '.$notice_checked.'>'."\n".'<label for="notice">공지</label></span>';
        }

        if ($is_html) {
            if ($is_dhtml_editor) {
                $option_hidden .= '<input type="hidden" value="html1" name="html">';
            } else {
                $option .= "\n".'<span class="checkbox"><input type="checkbox" id="html" name="html" onclick="html_auto_br(this);" value="'.$html_value.'">'."\n".'<label for="html"'.($html_checked ? " class='ui-state-active'" : "").'>html</label></span>';
            }
        }

        if ($is_secret) {
            if ($is_admin || $is_secret==1) {
                $option .= "\n".'<span class="checkbox"><input type="checkbox" id="secret" name="secret" value="secret" '.$secret_checked.'>'."\n".'<label for="secret">비밀글</label></span>';
            } else {
                $option_hidden .= '<input type="hidden" name="secret" value="secret">';
            }
        }

        if ($is_mail) {
            $option .= "\n".'<span class="checkbox"><input type="checkbox" id="mail" name="mail" value="mail" '.$recv_email_checked.'>'."\n".'<label for="mail">답변메일받기</label></span>';
        }
    }

    echo $option_hidden;
    ?>
	<div class="bo_w_form">
		<div class="bo_w_title<?php if($is_category){ echo " use_category";}?>">
			<?php if($is_category){?>
			<div class="bo_w_ca_name">
				<select name="ca_name" id="ca_name">
					<option value="">선택하세요</option>
					<?php echo $category_option ?>
				</select>
			</div>
			<?php }?>
			<span class="placeholder">
				<input type="text" name="wr_subject" value="<?php echo $subject ?>" id="wr_subject" required class="i_text_large required" size="50" maxlength="255">
				<label for="wr_subject">제목입력</label>
			</span>
		</div>
		<?php if($option){?>
		<div class="bo_write_body">
			<div class="bo_write_option"><?php echo $option ?></div>
		</div>
		<?php }?>
		<?php if(!$member['mb_id']){?>
		<div class="bo_write_mbinfo">
			<ul>
				<?php if($is_name) { ?>
				<li><span class="placeholder"><input type="text" name="wr_name" value="<?php echo $name; ?>" id="wr_name" required class="i_text required" maxLength="20"><label for='wr_name'>이름</label></span></li>
				<?php }?>
				<?php if($is_password){?>
				<li><span class='placeholder'><input type="password" name="wr_password" id="wr_password" <?php echo $password_required ?> class="i_text <?php echo $password_required ?>" maxLength="20"><label for="wr_password">비밀번호</label></span></li>
				<?php }?>
				<?php if($is_email){?>
				<li><span class="placeholder"><input type="text" name="wr_email" value="<?php echo $email ?>" id="wr_email" class="i_text email" maxlength="100"><label for="wr_email">이메일</label></span></li>
				<?php }?>
				<?php if($is_homepage){?>
				<li><span class="placeholder"><input type="text" name="wr_homepage" value="<?php echo $homepage ?>" id="wr_homepage" class="i_text"><label for="wr_homepage">홈페이지</label></span></li>
				<?php }?>
			</ul>
			<?php echo $captcha_html; ?>
		</div>
		<?php }?>
		<div class="bo_editor_wrap">
			<?php if($write_min || $write_max) { ?>
			<!-- 최소/최대 글자 수 사용 시 -->
			<p id="char_count_desc">이 게시판은 최소 <strong><?php echo $write_min; ?></strong>글자 이상, 최대 <strong><?php echo $write_max; ?></strong>글자 이하까지 글을 쓰실 수 있습니다.</p>
			<?php } ?>
			<?php 
				if(!$is_dhtml_editor){echo "<span class='placeholder'>";}
				echo $editor_html; // 에디터 사용시는 에디터로, 아니면 textarea 로 노출 
				if(!$is_dhtml_editor){echo "<label for='wr_content'>게시물을 입력해 주세요.</label></span>";}
			?>
			<?php if($write_min || $write_max) { ?>
			<!-- 최소/최대 글자 수 사용 시 -->
			<div id="char_count_wrap"><span id="char_count"></span>글자</div>
			<?php } ?>
		</div>
		<? if($ad_btn) { ?>
		<div class="ad_sector">
			<div class="ad_btn_area">
				<?=$ad_btn?>
				<div class="btn_wrap">
				<a id="ad-handle" class="btn_close" href="javascript:close_ad_layer();" title="접기">접기</a>
				</div>
			</div>
			<div id="ad-form-sector">
				<? if($is_file) { ?>
				<fieldset id="ad-form_file" class="ad_form_area">
					<legend>파일첨부</legend>
					<ul>
			        <?php 
					for ($i=0; $is_file && $i<$file_count; $i++) 
					{ 
						echo "<li id='ad-file_input_{$i}'><input type='text' name='file_path_{$i}' class='filebox' disabled='disabled' value='".($w=="u" ? $file[$i][source] : '')."'><span class='file_search'><input type='file' name='bf_file[]' class='btn_file' onchange='file_path_{$i}.value=this.value' title='파일 용량 {$upload_max_filesize} 바이트 이하만 업로드 가능'></span>";
						if($is_file_content){
							echo "<span class='placeholder bf_content_input'><input type='text' id='bf_content_{$i}' name='bf_content[]' class='i_text' value='".($w=="u" ? $file[$i]['bf_content'] : '')."' /><label for='bf_content_{$i}'>파일설명입력</label></span>";
						}
						echo "</li>";
					}
					?>
					</ul>
					<div class='file_btm'><p class='txt_file_add'>파일첨부는 <strong><?=$file_count?></strong>개 까지 가능합니다</p></div>
				</fieldset>
				<? } ?>
				<? if($is_link) { ?>
				<fieldset id="ad-form_link" class="ad_form_area">
					<legend>링크</legend>
					<ul>
				        <?php for ($i=1; $is_link && $i<=G5_LINK_COUNT; $i++) { ?>
						<li class="<?=$i==1?"first":"";?>">
							<span class="placeholder dblock">
								<input type='text' id="wr_link<?=$i?>" name='wr_link<?=$i?>' class='i_text_large input-max' value="<?=$write["wr_link{$i}"]?>" />
								<label for="wr_link<?=$i?>">http://</label>
							</span>
						</li>
						<? } ?>
					</ul>
				</fieldset>
				<? } ?>
			</div>
			<? if($ad_list) { ?><ul class='ad_list_area'><?=$ad_list?></ul><? } ?>
		</div>
		<? } ?>
	</div>

	<div class="write_foot">
		<input type="image" id="btn_submit" src="<?=$board_skin_url?>/img/btn_<?=!$w || $w=="r" ? "write3" : "mody"?>.gif" alt="글쓰기" title="글쓰기" /> <a href="./board.php?bo_table=<?=$bo_table?>" class="btn_list mleft1" title="목록">목록</a>
	</div>

    </form>

	<script type="text/javascript">
    <?php if($write_min || $write_max) { ?>
    // 글자수 제한
    var char_min = parseInt(<?php echo $write_min; ?>); // 최소
    var char_max = parseInt(<?php echo $write_max; ?>); // 최대
    check_byte("wr_content", "char_count");

    $(function() {
        $("#wr_content").on("keyup", function() {
            check_byte("wr_content", "char_count");
        });
    });
    <?php } ?>
    function html_auto_br(obj)
    {
        if (obj.checked) {
            result = confirm("자동 줄바꿈을 하시겠습니까?\n\n자동 줄바꿈은 게시물 내용중 줄바뀐 곳을<br>태그로 변환하는 기능입니다.");
            if (result)
                obj.value = "html2";
            else
                obj.value = "html1";
        }
        else
            obj.value = "";
    }

    function fwrite_submit(f)
    {
		<?php if($is_category){?>
		if(!$("#ca_name").val())
		{
			alert("카테고리는 필수 입력사항입니다. 카테고리를 선택해 주세요.");
			$("#ca_name").siblings("a").focus();
			return false;
		}
		<?php }?>
        <?php echo $editor_js; // 에디터 사용시 자바스크립트에서 내용을 폼필드로 넣어주며 내용이 입력되었는지 검사함   ?>

        var subject = "";
        var content = "";
        $.ajax({
            url: g5_bbs_url+"/ajax.filter.php",
            type: "POST",
            data: {
                "subject": f.wr_subject.value,
                "content": f.wr_content.value
            },
            dataType: "json",
            async: false,
            cache: false,
            success: function(data, textStatus) {
                subject = data.subject;
                content = data.content;
            }
        });

        if (subject) {
            alert("제목에 금지단어('"+subject+"')가 포함되어있습니다");
            f.wr_subject.focus();
            return false;
        }

        if (content) {
            alert("내용에 금지단어('"+content+"')가 포함되어있습니다");
            if (typeof(ed_wr_content) != "undefined")
                ed_wr_content.returnFalse();
            else
                f.wr_content.focus();
            return false;
        }

        if (document.getElementById("char_count")) {
            if (char_min > 0 || char_max > 0) {
                var cnt = parseInt(check_byte("wr_content", "char_count"));
                if (char_min > 0 && char_min > cnt) {
                    alert("내용은 "+char_min+"글자 이상 쓰셔야 합니다.");
                    return false;
                }
                else if (char_max > 0 && char_max < cnt) {
                    alert("내용은 "+char_max+"글자 이하로 쓰셔야 합니다.");
                    return false;
                }
            }
        }

        <?php echo $captcha_js; // 캡챠 사용시 자바스크립트에서 입력된 캡챠를 검사함  ?>

        document.getElementById("btn_submit").disabled = "disabled";

        return true;
    }

	// ad 레이어 조작
	var ad_layer = function(kind) {

		var $button = $("#ad-btn_"+kind);
		var $form = $("#ad-form_"+kind);

		if($button.hasClass("on")) {
			clean_ad_layer();
			$("#ad-handle").hide();
		} else {
			clean_ad_layer();
			$button.addClass("on");
			$button.children("span").addClass("on");
			$form.show();
			$("#ad-handle").show();
		}
	}

	// ad 레이어 모두닫기
	var clean_ad_layer = function() {
		$("#ad-form-sector fieldset").hide();;
		$(".ad_btn_area a").removeClass("on");
		$(".ad_btn_area a span").removeClass("on");
	}


	// ad 파일 삭제
	var delete_ad_file = function(num) {

		var $wrap = $("#ad-file_input_"+num);
		$wrap.children("[name^=file_path_]").val("");
		$wrap.children("span").children("[name^=bf_content]").val("");

		$("#ad-file_list_"+num).remove();
		$("#bf_file_del_"+num).val('1');
	}

	// ad 레이어 닫기
	var close_ad_layer = function() {
		ad_layer($(".ad_btn_area a.on").attr("id").split("_")[1]);
	}

	$(function(){
		var $width = $("#bo_w").width();
		<?php if(!$board['bo_use_dhtml_editor']){?>
		$("#wr_content").css({width:$width-18+"px", padding:'8px'});
		<?php }?>
		$(".ad_form_area .filebox").width($width-111);
		$(".ad_form_area .i_text, .ad_form_area .i_text_large").width($width-50);
		<?php if(!$is_category){?>
		$("#wr_subject").width($width-14);
		<?php }?>

		$(".bo_w_ca_name").select_box({
			'height':31
			<?php if($is_category){?>
			, onload:function($select){
				$select.css('float', 'left');
				$("#wr_subject").width($width-$select.width()-26);
				$("#wr_subject").parent().css('float', 'right');
			}
			<?php }?>
		});
		$(".checkbox").check_box({fontSize:11});
		set_placeholder($(".placeholder"));
	});
    </script>
</section>
<!-- } 게시물 작성/수정 끝 -->