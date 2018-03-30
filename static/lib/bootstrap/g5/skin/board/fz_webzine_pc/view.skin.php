<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);
add_stylesheet('<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.css">', 0);
add_javascript('<script type="text/javascript" src="'.$board_skin_url.'/js/default.js"></script>', 100);
?>
<script src="<?php echo G5_JS_URL; ?>/viewimageresize.js"></script>
<!-- 게시물 읽기 시작 { -->
<article id="bo_v" style="width:<?php echo $width; ?>" class="fz_wrap">
    <!-- 게시물 상단 버튼 시작 { -->
    <div id="bo_v_top">
        <?php
        ob_start();
         ?>
        <?php if ($copy_href || $move_href) { ?>
        <ul class="bo_v_nb">
            <?php if ($copy_href) { ?><li><a href="<?php echo $copy_href ?>" class="list_btn btn_copy" onclick="board_move(this.href); return false;">복사</a></li><?php } ?>
            <?php if ($move_href) { ?><li><a href="<?php echo $move_href ?>" class="list_btn btn_move" onclick="board_move(this.href); return false;">이동</a></li><?php } ?>
        </ul>
        <?php } ?>

        <ul class="bo_v_com">
            <?php if ($update_href) { ?><li><a href="<?php echo $update_href ?>" class="list_btn btn_edit"><i class="fa fa-rotate-right"></i> 수정</a></li><?php } ?>
            <?php if ($delete_href) { ?><li><a href="<?php echo $delete_href ?>" class="list_btn btn_del" onclick="del(this.href); return false;"><i class="fa fa-remove"></i> 삭제</a></li><?php } ?>
            <li><a href="<?php echo $list_href ?>" class="list_btn btn_list"><i class="fa fa-list"></i> 목록</a></li>
            <?php if ($reply_href) { ?><li><a href="<?php echo $reply_href ?>" class="list_btn btn_reply">답변</a></li><?php } ?>
            <?php if ($write_href) { ?><li><a href="<?php echo $write_href ?>" class="list_btn btn_write"><i class="fa fa-pencil"></i> 글쓰기</a></li><?php } ?>
        </ul>
        <?php
        $link_buttons = ob_get_contents();
        ob_end_flush();
         ?>
    </div>
    <!-- } 게시물 상단 버튼 끝 -->

    <header>
        <h1 id="bo_v_title">
            <?php
            if ($category_name) echo "[".$view['ca_name'].'] '; // 분류 출력 끝
            echo cut_str(get_text($view['wr_subject']), 70); // 글제목 출력
            ?>
        </h1>
    </header>

	<section id="bo_v_info">
		<div class="fl">
			<span class="bo_v_user"><i class="fa fa-user"><span class="sound_only">Writer</span></i> <strong><?php echo $view['name'] ?></strong><?php if ($is_ip_view) { echo "<em>$ip</em>"; } ?></span>
		</div>
		<div class="fr">
			<span class="bo_v_date"><i class="fa fa-calendar-check-o"><span class="sound_only">Date</span></i> <strong><?php echo date("y-m-d H:i", strtotime($view['wr_datetime'])) ?></strong></span> <span class="bar">|</span>
			<span class="bo_v_hit"><i class="fa fa-eye"></i> hits <strong><?php echo number_format($view['wr_hit']) ?></strong></span> <span class="bar">|</span>
			<span class="bo_v_comment"><i class="fa fa-comments"></i> Comment <strong><?php echo number_format($view['wr_comment']) ?></strong></span>
		</div>
	</section>

	<?php
		$i = 0; $str = "";
		// 가변 파일
		foreach($view[file] as $value) {
			if($value[source] && !$value[view]) {

				$str .= "<li id='file_sector_{$i}'";
				if($i==0) $str .= " class='first'";
				$str .= ">";
				if($value[content]) $str .= "<a href=\"javascript:layer_file('{$i}');\" class='btn_handle'>보기</a>";
				$str .= "<a href=\"{$view['file'][$i]['href']}\" class='txt_name view_file_download' title='{$value[content]}'>{$value[source]}</a>";
				$str .= "<span class='txt_size'>({$value[size]})</span>";
				$str .= "<span class='txt_hit'>[{$value[download]}]</span>";
				$str .= "<span class='txt_date'>{$value[datetime]}</span>";
				if($value[content]) $str .= "<p class='txt_file_content' style='display:none;'>{$value[content]}</p>";
				$str .= "</li>";
				$i++;
			}
		}
		// 링크
		foreach($view[link] as $key => $value) {
			if(!$value) continue;
			$str .= "<li";
			if($i==0) $str .= " class='first'";
			$str .= ">";
			$str .= "<a href='{$view[link_href][$key]}' class='txt_link' target='_blank'>".cut_str($value, 70)."</a>";
			$str .= "<span class='txt_hit'>[{$view[link_hit][$key]}]</span>";
			$str .= "</li>";
			$i++;
		}
		if($i>0) echo "<ul class='ad_list_area'>{$str}</ul>";
	?>

    <section id="bo_v_atc">
        <h2 id="bo_v_atc_title">본문</h2>
        <?php
        // 파일 출력
        $v_img_count = count($view['file']);
        if($v_img_count) {
            echo "<div id=\"bo_v_img\">\n";

            for ($i=0; $i<=count($view['file']); $i++) {
                if ($view['file'][$i]['view']) {
                    //echo $view['file'][$i]['view'];
                    echo "<div class='editor_img_wrap'>".get_view_thumbnail($view['file'][$i]['view'])."</div>";
                }
            }

            echo "</div>\n";
        }
         ?>

        <!-- 본문 내용 시작 { -->
        <div id="bo_v_con"><?php echo get_view_thumbnail($view['content']); ?></div>
        <?php//echo $view['rich_content']; // {이미지:0} 과 같은 코드를 사용할 경우 ?>
        <!-- } 본문 내용 끝 -->

		<?php /* 추천 비추천 모두 사용 */
		if($is_good && $is_nogood) {
			$length = 194;
			if(!$view[wr_good] && !$view[wr_nogood]) {
				$abbab = "0.5";
			} else {
			$score_sum = $view[wr_nogood] + $view[wr_good];
			$abbab = $view[wr_good] / $score_sum;
		}
		$size = round($length * $abbab);
		?>
		<div class="article_score">
			<a class="btn_good" href="<?php echo $good_href ? $good_href.'&amp;'.$qstr : '#no_member' ?>" id="good_button" title="추천"></a>
			<div class="graph">
				<em id="txt_good" class="txt_good"><?=number_format($view[wr_good])?></em>
				<span id="score_bar" class="score_bar" style="width:<?=$size?>px;"></span>
				<span class="line_border"></span>
				<em id="txt_nogood" class="txt_nogood"><?=number_format($view[wr_nogood])?></em>
			</div>
			<a class="btn_nogood" href="<?php echo $nogood_href ? $nogood_href.'&amp;'.$qstr : '#no_member' ?>" id="nogood_button" title="비추천"></a>
		</div>
		<? } else if($is_good) { /* 추천만 사용 */ ?>
		<div class="article_score limit_score">
			<a class="btn_good" href="<?php echo $good_href ? $good_href.'&amp;'.$qstr : '#no_member' ?>" id="good_button" title="추천"></a>
			<em id="txt_good" class="txt_good"><?=number_format($view[wr_good])?></em>
		</div>
		<? } else if($is_nogood) { /* 비추천만 사용 */ ?>
		<div class="article_score limit_score">
			<a class="btn_nogood" href="<?php echo $nogood_href ? $nogood_href.'&amp;'.$qstr : '#no_member' ?>" id="nogood_button" title="비추천"></a>
			<em id="txt_nogood" class="txt_nogood"><?=number_format($view[wr_nogood])?></em>
		</div>
		<? } ?>
		<!-- //추천영역 !-->


		<? if ($is_signature) { ?>
		<!-- 네임카드 !-->
		<div class="namecard">
			<div class="ncard_head">
				<span class="txt_name"><?=$view[name]?>(<?=$mb[mb_id]?>)</span>
				<a id="btn_namecard" href="<?php echo G5_BBS_URL;?>/new.php?mb_id=<?=$view[mb_id]?>" class="btn_link"><span><?=$view[wr_name]?></span>님의 게시물전체보기</a>
			</div>
			<div class="ncard_body">
				<span class="txt_introduce"><?=$signature?nl2br($signature):"입력된 서명이 없습니다."?></span>
			</div>
		</div>
		<!-- //네임카드 !-->
		<? } ?>
    </section>
	<div class="fz_middle_btn">
		<div class="fl">
			<?php if ($prev_href) { ?><a href="<?php echo $prev_href ?>" class="list_btn btn_prev">이전글</a><?php } ?><?php if ($next_href) { ?><a href="<?php echo $next_href ?>" class="list_btn btn_next">다음글</a><?php } ?>
		</div>
		<div class="fr">
			<?php
				include_once(G5_SNS_PATH."/view.sns.skin.php");
				if ($scrap_href) { echo "<a href='{$scrap_href}' target='_blank' class='list_btn btn_scrap' onclick='win_scrap(this.href); return false;'>스크랩</a>";}
			?>
		</div>
	</div>

    <?php
    // 코멘트 입출력
    include_once('./view_comment.php');
     ?>

    <!-- 링크 버튼 시작 { -->
    <div id="bo_v_bot">
        <?php echo $link_buttons ?>
    </div>
    <!-- } 링크 버튼 끝 -->

</article>
<!-- } 게시판 읽기 끝 -->

<script type="text/javascript">
<?php if ($board['bo_download_point'] < 0) { ?>
$(function() {
    $("a.view_file_download").click(function() {
        if(!g5_is_member) {
            alert("다운로드 권한이 없습니다.\n회원이시라면 로그인 후 이용해 보십시오.");
            return false;
        }

        var msg = "파일을 다운로드 하시면 포인트가 차감(<?php echo number_format($board['bo_download_point']) ?>점)됩니다.\n\n포인트는 게시물당 한번만 차감되며 다음에 다시 다운로드 하셔도 중복하여 차감하지 않습니다.\n\n그래도 다운로드 하시겠습니까?";

        if(confirm(msg)) {
            var href = $(this).attr("href")+"&js=on";
            $(this).attr("href", href);

            return true;
        } else {
            return false;
        }
    });
});
<?php } ?>

function board_move(href)
{
    window.open(href, "boardmove", "left=50, top=50, width=500, height=550, scrollbars=1");
}

$(function() {
    $("a.view_image").click(function() {
        window.open(this.href, "large_image", "location=yes,links=no,toolbar=no,top=10,left=10,width=10,height=10,resizable=yes,scrollbars=no,status=no");
        return false;
    });

    // 추천, 비추천
    $("#good_button, #nogood_button").click(function() {
		if($(this).attr('href')=="#no_member"){alert("회원만 참여 가능합니다.");return false;}
		excute_good(this.href, this.id=="good_button" ? 1:0);
        return false;
    });

    // 이미지 리사이즈
    $("#bo_v_atc").viewimageresize();
});

function excute_good(href, $tx)
{
    $.post(
        href,
        { js: "on" },
        function(data) {
            if(data.error) {
                alert(data.error);
                return false;
            }

            if(data.count) {
				if($tx)
				{
					$("#txt_good").text(number_format(String(data.count)));
					var score_good=parseInt(data.count);
					var score_nogood=parseInt($("#txt_nogood").text());
				}
				else
				{
					$("#txt_nogood").text(number_format(String(data.count)));
					var score_good=parseInt($("#txt_good").text());
					var score_nogood=parseInt(data.count);
				}
				var length = 194;
				var score_sum = score_good + score_nogood;
				var rate = score_good / score_sum;
				var size = Math.round(length * rate);
				$("#score_bar").width(size);
				alert((!$tx ? "비" :"")+"추천이 반영되었습니다.");
            }
        }, "json"
    );
}
var layer_file = function(file) {

	var $file = jQuery("#file_sector_"+file);

	if($file.children(".btn_handle").hasClass("on")) {
		$file.children(".btn_handle").removeClass("on");
		$file.children(".txt_file_content").hide();
	} else {
		$file.children(".btn_handle").addClass("on");
		$file.children(".txt_file_content").show();
	}
}
</script>
<!-- } 게시글 읽기 끝 -->