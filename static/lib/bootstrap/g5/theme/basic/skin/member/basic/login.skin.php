<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
?>

<style>
.ms-box {position:relative;padding-right:13px;}
.ms-box-lbl {position:absolute;left:22px;color:#666; font-size:15px;letter-spacing:-0.1em;cursor:text;}
.ms-box-lbl-focus {color:#ccc}
.ms-box-inp {border:1px solid #d2d2db; border-radius:4px; padding-left:10px;font-size:15px; }

.ms-confirm { background-color:#FFF; border:#CCC 1px solid; border-radius:5px; margin:150px auto; padding:30px 38px 50px 40px; width:350px; 
-webkit-box-shadow: 0 0 7px 2px #ddd;  /* Safari and Chrome */
-moz-box-shadow: 0 0 7px 2px #ddd;  /* Firefox */
box-shadow: 0 0 7px 2px #ddd;  /* CSS3 */
!important}

.ms-confirm h1 {margin:0 0 30px;font-size:20px; color:#999; text-align:center}
.ms-confirm h2 {margin:0 0 10px}
.ms-confirm p {margin:0 0 10px;line-height:1.8em}
.ms-confirm .ms-box {margin:0 0 10px}
.ms-confirm .ms-box-lbl {top:13px}
.ms-confirm .ms-box-inp {width:100%;height:45px;line-height:3em}
.ms-confirm-id {height:40px;line-height:3em}
.ms-confirm-submit {display:block;margin:0 0 15px; padding:0;width:100%;height:50px;border:0; background: #4A99D9; color:#fff;text-decoration:none;cursor:pointer; font-size:15px; border-radius:4px;}
.ms-confirm-links {text-align:right}
.ms-confirm-link-left {float:left}
.ms-confirm-link-right {float:right}
.ms-confirm-links {text-align:right}
.ms-confirm-links a {color:#666;font-size:12px;}
.ms-confirm-links #login_password_lost {display:inline-block;margin:0 20px 0 0}
body {
	background-color: #F7F7F7;
}
</style>

<!-- 로그인 시작 { -->
<div id="mb_login" class="ms-confirm">
<img src="http://e-learning.unapcict.org/wifiinfobank/img/logo.jpg"/>
   <h1>Infobank Login </h1>

    <div id="mb_login_mb">
        <form name="flogin" action="<?php echo $login_action_url ?>" onsubmit="return flogin_submit(this);" method="post">
        <input type="hidden" name="url" value='<?php echo $login_url ?>'>

        <div class="ms-box ms-lbl-wrap">
            <label for="login_id" class="ms-box-lbl">ID<strong class="sound_only"> 필수</strong></label>
            <input type="text" name="mb_id" id="login_id" required class="required ms-box-inp" maxLength="20">
        </div>

        <div class="ms-box ms-lbl-wrap">
            <label for="login_pw" class="ms-box-lbl">Password<strong class="sound_only"> 필수</strong></label>
            <input type="password" name="mb_password" id="login_pw" required class="required ms-box-inp" maxLength="20">
        </div>

        <input type="submit" value="로그인" class="ms-confirm-submit">

        </form>
    </div>
<div class="ms-confirm-links">
    <div class="ms-confirm-link-left">
		 <input type="checkbox" name="auto_login" value="1" id="auto_login">
            <label for="auto_login" id="auto_login_label">Auto Login</label>
			</div>
<!-- 자동로그인 스크립트-->
<script>
$omi = $('#ol_id');
$omi.css('display','inline-block').css('width',110);
$omp = $('#ol_pw');
$omp.css('display','inline-block').css('width',110);
$omi_label = $('#ol_idlabel');
$omi_label.addClass('ol_idlabel');
$omp_label = $('#ol_pwlabel');
$omp_label.addClass('ol_pwlabel');

$(function() {
    $omi.focus(function() {
        $omi_label.css('visibility','hidden');
    });
    $omp.focus(function() {
        $omp_label.css('visibility','hidden');
    });
    $omi.blur(function() {
        $this = $(this);
        if($this.attr('id') == "ol_id" && $this.attr('value') == "") $omi_label.css('visibility','visible');
    });
    $omp.blur(function() {
        $this = $(this);
        if($this.attr('id') == "ol_pw" && $this.attr('value') == "") $omp_label.css('visibility','visible');
    });

    $("#auto_login").click(function(){
        if ($(this).is(":checked")) {
            if(!confirm("자동로그인은 다음부터 아이디와 비밀번호 입력없이 자동으로 로그인하는 기능입니다.\n\n공공장소 등에서는 위험할 수 있으니 주의하시기 바랍니다.\n\n자동로그인 기능을 사용하시겠습니까?"))
                return false;
        }
    });
});

function fhead_submit(f)
{
    return true;
}
</script>
<!-- 자동로그인 스크립트-->
</div>
	<div class="ms-confirm-link-right">
        <a href="<?php echo G5_BBS_URL ?>/password_lost.php" target="_blank" id="login_password_lost">Find ID/Password</a> | 
        <a href="./register.php">Join us</a>
    </div>

</div>
</div>

<script>
$(function(){
    $("#login_id").focus();
});
function flogin_submit(f)
{
    return true;
}

// ms-box-lbl {
$(function() {
    var $msBoxInp = $('.ms-lbl-wrap .ms-box-inp');
    $msBoxInp.each(function() {
        var $this = $(this);
        var thisId = $(this).attr('id');
        var $msBoxLbl = $("label[for='"+thisId+"']");
        if ($this.attr('value') == "") $msBoxLbl.css('visibility','visible');
        else $msBoxLbl.css('visibility','hidden');
    });
    $msBoxInp.focus(function() {
        var $this = $(this);
        var thisId = $(this).attr('id');
        var $msBoxLbl = $("label[for='"+thisId+"']");
        if ($this.attr('value') == "") $msBoxLbl.addClass("ms-box-lbl-focus");
        else $msBoxLbl.css('visibility','hidden');
    });
    $msBoxInp.keydown(function() {
        var $this = $(this);
        var thisId = $(this).attr('id');
        var $msBoxLbl = $("label[for='"+thisId+"']");
        if ($this.attr('value') == "") $msBoxLbl.addClass("ms-box-lbl-focus");
        else $msBoxLbl.css('visibility','hidden');
    });
    $msBoxInp.change(function() {
        var $this = $(this);
        var thisId = $(this).attr('id');
        var $msBoxLbl = $("label[for='"+thisId+"']");
        if ($this.attr('value') == "") $msBoxLbl.addClass("ms-box-lbl-focus");
        else $msBoxLbl.css('visibility','hidden');
    });
    $msBoxInp.blur(function() {
        var $this = $(this);
        var thisId = $(this).attr('id');
        var $msBoxLbl = $("label[for='"+thisId+"']");
        if ($this.attr('value') == "") $msBoxLbl.css("visibility","visible").removeClass("ms-box-lbl-focus");
    });
});
// } ms-box-lbl
</script>

<!-- } 로그인 끝 -->