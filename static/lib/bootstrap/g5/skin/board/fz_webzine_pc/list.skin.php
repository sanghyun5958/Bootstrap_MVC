<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');

add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);
add_stylesheet('<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.css">', 0);
add_javascript('<script type="text/javascript" src="'.$board_skin_url.'/js/default.js"></script>', 100);
?>
<h2 id="container_title"><?php echo $board['bo_subject'] ?><span class="sound_only"> Index</span></h2>
<!-- 게시판 목록 시작 { -->
<div id="bo_list" class="fz_wrap">
    <!-- 게시판 카테고리 시작 { -->
    <?php if ($is_category) { ?>
    <nav id="bo_cate">
        <h2><?php echo $board['bo_subject'] ?> Category</h2>
        <ul id="bo_cate_ul">
            <?php echo $category_option ?>
        </ul>
    </nav>
    <?php } ?>
    <!-- } 게시판 카테고리 끝 -->

    <!-- 게시판 페이지 정보 및 RSS { -->
	<div class="fz_header">
		<div class="fz_total_count"><span> Total <strong><?php echo number_format($total_count) ?></strong> results</span></div>
		<? if ($rss_href) { ?><div class="fz_rss"><a class="list_btn btn_rss" href="<?=$rss_href?>" title="RSS">RSS</a></div><?php }?>
	</div>
    <!-- } 게시판 페이지 정보 및 RSS 끝 -->

    <form name="fboardlist" id="fboardlist" action="./board_list_update.php" method="post">
    <input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
    <input type="hidden" name="sfl" value="<?php echo $sfl ?>">
    <input type="hidden" name="stx" value="<?php echo $stx ?>">
    <input type="hidden" name="spt" value="<?php echo $spt ?>">
    <input type="hidden" name="sca" value="<?php echo $sca ?>">
    <input type="hidden" name="sst" value="<?php echo $sst ?>">
    <input type="hidden" name="sod" value="<?php echo $sod ?>">
    <input type="hidden" name="page" value="<?php echo $page ?>">
    <input type="hidden" name="sw" value="">
    <?php if ($is_checkbox) { ?>
    <div id="gall_allchk">
        <input type="checkbox" id="chkall">
		<label for="chkall">Select All</label>
    </div>
    <?php } ?>

	<ul class="fz_gallery_list">
		<?php
		for ($i=0; $i<count($list); $i++) {
			$thumb = get_list_thumbnail($board['bo_table'], $list[$i]['wr_id'], $board['bo_gallery_width'], $board['bo_gallery_height']);
			if($list[$i]['icon_secret']) $list[$i]['article_type'] = "<span class='icon_pack2 icon_secret2'>비밀글</span>";
			
			if($list[$i]['icon_new']) $list[$i]['icon_pack'] .= "<span class='icon_pack icon_new'>새글</span>";
			if($list[$i]['wr_reply']) $list[$i]['icon_reply'] = "<span class='icon_pack2 icon_reply'>답변</span>";
			if($thumb['src']) {
				$img_content = '<img src="'.$thumb['src'].'" alt="'.$thumb['alt'].'">';
			} else {
				$img_content = '<i class="fa fa-picture-o"></i>';
			}
		 ?>
		<li class="<?=$wr_id == $list[$i]['wr_id'] ? " active" : ''?>">
			<a href='<?php echo $list[$i]['href'];?>' class="fz_gallery_li_wrap">
				<span class="fz_gallery_thumb"><?php echo $img_content;?></span>
				<span class="fz_gallery_box">
					<span class="fz_gallery_title">
					<?php
						echo $list[$i]['icon_reply'];
						echo $list[$i]['article_type'];
						if ($is_category && $list[$i]['ca_name']) {echo "<span class=\"fz_cate_link\">[{$list[$i]['ca_name']}]</span>";}
						echo $list[$i]['subject'];
						echo $list[$i]['icon_pack'];
					?>
					</span>
					<span class="fz_gallery_content"><?=str_replace("&nbsp;", "", trim($list[$i]['wr_content']))?></span>
					<span class="fz_gallery_etc">
				
                
						<?php if ($is_good) { ?><span class="fz_gallery_etc_info"><i class="fa fa-thumbs-o-up"></i> <?php echo $list[$i]['wr_good'] ?></span><?php }?>
						<?php if ($is_nogood) { ?><span class="fz_gallery_etc_info"><i class="fa fa-thumbs-o-down"></i> <?php echo $list[$i]['wr_nogood'] ?></span><?php }?>
						
					</span>
				</span>
			</a>
			
		</li>
		<?php } ?>
		<?php if (count($list) == 0) { echo '<div class="fz_empty_list">게시물이 없습니다.</div>'; } ?>
	</ul>

	<div class="fz_footer">
        <?php if ($is_checkbox) { ?>
		<div id="fz_admin_select">
			<select name="btn_submit" id="">
				<option value="">command to selection</option>
				<option value="선택삭제">Delete to selection</option>
				<option value="선택복사">Copy to Selection</option>
				<option value="선택이동">Move to Selection</option>
			</select>
		</div>
        <?php } ?>
		<div class="fr">
          <?php if ($list_href) { ?><a href="<?php echo $list_href ?>" class="list_btn btn_list">Index</a><?php } ?>
            <?php if ($admin_href) { ?><a href="<?php echo $admin_href ?>" class="list_btn btn_adm">Administarator</a><?php } ?>
            <?php if ($write_href) { ?><a class="list_btn btn_write" href="<?=$write_href?>" title="글쓰기">Write</a><?php } ?>
		</div>
	</div>

    </form>


<?php if($is_checkbox) { ?>
<noscript>
<p>자바스크립트를 사용하지 않는 경우<br>별도의 확인 절차 없이 바로 선택삭제 처리하므로 주의하시기 바랍니다.</p>
</noscript>
<?php } ?>

<!-- 페이지 -->
<?php 
	$write_pages=str_replace("처음", "<i class='fa fa-angle-left'></i><i class='fa fa-angle-left'></i>", $write_pages);
	$write_pages=str_replace("이전", "<i class='fa fa-angle-left'></i>", $write_pages);
	$write_pages=str_replace("다음", "<i class='fa fa-angle-right'></i>", $write_pages);
	$write_pages=str_replace("맨끝", "<i class='fa fa-angle-right'></i><i class='fa fa-angle-right'></i>", $write_pages);
	echo $write_pages; 
?>

<!-- 게시판 검색 시작 { -->
<fieldset id="bo_sch">
    <legend>게시물 검색</legend>
    <form name="fsearch" method="get">
    <input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
    <input type="hidden" name="sca" value="<?php echo $sca ?>">
    <input type="hidden" name="sop" value="and">
    <label for="sfl" class="sound_only">검색대상</label>
	<span class="select_box">
    <select name="sfl" id="sfl">
  	    <option value="wr_subject"<?php echo get_selected($sfl, 'wr_subject', true); ?>>title</option>
        <option value="wr_content"<?php echo get_selected($sfl, 'wr_content'); ?>>contents</option>
        <option value="wr_subject||wr_content"<?php echo get_selected($sfl, 'wr_subject||wr_content'); ?>>title+contents</option>
        <option value="mb_id,1"<?php echo get_selected($sfl, 'mb_id,1'); ?>>ID</option>
        <option value="mb_id,0"<?php echo get_selected($sfl, 'mb_id,0'); ?>>ID(ko)</option>
        <option value="wr_name,1"<?php echo get_selected($sfl, 'wr_name,1'); ?>>Writer</option>
        <option value="wr_name,0"<?php echo get_selected($sfl, 'wr_name,0'); ?>>Writer(ko)</option>
    </select>
	</span>
	<span class="placeholder">
		<input type="text" name="stx" value="<?php echo stripslashes($stx) ?>" required id="stx" class="i_text w_sbox required" size="15" maxlength="20">
		<label for="stx">Search word</label>
	</span>
	<input type="image" src="<?=$board_skin_url?>/img/btn_search.gif" class="btn_search_submit" alt="검색" />

    </form>
</fieldset>
<!-- } 게시판 검색 끝 -->
</div>

<?php if ($is_checkbox) { ?>
<script type="text/javascript">
$(function(){
	$("#chkall").click(function(){
		$(".fz_gallery_list input[type='checkbox']").prop("checked", $(this).prop("checked"));
	});
	$("#fz_admin_select").select_box({
		height:24,
		onchange:function(p, $select, ul){
			if(!$select.val()) return false;

			if(!$(".fz_gallery_list input[type='checkbox']:checked").length)
			{
				alert($select.val()+" 할 게시물을 하나 이상 선택하세요.");
				$select.find("option").eq(0).prop("selected", true).change();
				return false;
			}

			if($select.val()=="선택복사" || $select.val()=="선택이동")
			{
				var sub_win = window.open("", "move", "left=50, top=50, width=500, height=550, scrollbars=1");

				$("#fboardlist input[name='sw']").val($select.val()=="선택복사" ? "copy" : "move");
				$("#fboardlist").attr("target", "move");
				$("#fboardlist").attr("action", "./move.php");
				$("#fboardlist").submit();
			}
			else if($select.val()=="선택삭제")
			{
				if (!confirm("선택한 게시물을 정말 삭제하시겠습니까?\n\n한번 삭제한 자료는 복구할 수 없습니다\n\n답변글이 있는 게시글을 선택하신 경우\n답변글도 선택하셔야 게시글이 삭제됩니다."))
					return false;

				$("#fboardlist").attr("target", "");
				$("#fboardlist").attr("action", "./board_list_update.php");
				$("#fboardlist").submit();
			}
		}
	});
});
</script>
<?php } ?>
<!-- } 게시판 목록 끝 -->

<script type="text/javascript">
$(function(){
	$(".select_box").select_box();
	set_placeholder($(".placeholder"));
});
</script>
