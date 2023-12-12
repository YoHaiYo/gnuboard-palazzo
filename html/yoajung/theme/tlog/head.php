<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if (G5_IS_MOBILE) {
    include_once(G5_THEME_MOBILE_PATH.'/head.php');
    return;
}

include_once(G5_THEME_PATH.'/head.sub.php');
include_once(G5_LIB_PATH.'/latest.lib.php');
include_once(G5_LIB_PATH.'/outlogin.lib.php');
include_once(G5_LIB_PATH.'/poll.lib.php');
include_once(G5_LIB_PATH.'/visit.lib.php');
include_once(G5_LIB_PATH.'/connect.lib.php');
include_once(G5_LIB_PATH.'/popular.lib.php');
include G5_THEME_PATH.'/menum.php';


add_stylesheet('<link rel="icon" href="' . G5_THEME_URL . '/favicon.ico">');
add_stylesheet('<link rel="shortcut icon" href="' . G5_THEME_URL . '/favicon.ico">');
add_javascript('<script src="'.G5_THEME_URL.'/js/jquery.bpopup.min.js"></script>');
add_javascript('<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.4/TweenMax.min.js"></script>');
add_javascript('<script src="'.G5_THEME_URL.'/js/owl.carousel.js"></script>');
add_javascript('<script src="'.G5_THEME_URL.'/js/jarallax.js"></script>');
add_javascript('<script src="'.G5_THEME_URL.'/js/jarallax-video.js"></script>');
add_javascript('<script src="'.G5_THEME_URL.'/js/jarallax-element.js"></script>');
add_javascript('<script src="'.G5_THEME_URL.'/js/lightslider.min.js"></script>');
add_javascript('<script src="'.G5_THEME_URL.'/js/sns.js"></script>');
add_javascript('<script src="https://unpkg.com/aos@2.3.1/dist/aos.js?ver=191202"></script>');

add_stylesheet('<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">');
add_stylesheet('<link rel="stylesheet" href="'.G5_THEME_URL.'/css/owl.carousel.css">');
add_stylesheet('<link rel="stylesheet" href="'.G5_THEME_URL.'/css/content.css">');
add_stylesheet('<link rel="stylesheet" href="'.G5_THEME_URL.'/css/layout.css">');
add_stylesheet('<link rel="stylesheet" href="'.G5_THEME_URL.'/css/table.css">');
add_stylesheet('<link rel="stylesheet" href="'.G5_THEME_URL.'/css/jarallax.css">');
add_stylesheet('<link rel="stylesheet" href="'.G5_THEME_URL.'/css/lightslider.min.css">');
add_stylesheet('<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">');
add_stylesheet('<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/xeicon@2.3.3/xeicon.min.css">');
// 커스텀
add_stylesheet('<link rel="stylesheet" href="'.G5_THEME_URL.'/css/ssh.css">');
?>
<script>
  AOS.init();
</script>


<script>
$(function() {
	
	$('#open-button').click(function(e) {
         e.preventDefault();
		 var $btn = $(this);
		 if($btn.hasClass('on')) {
		 	$('body').removeClass('right-side-on');
			$btn.removeClass('on');
			$btn.addClass('off');
		 } else {
		 	$('body').addClass('right-side-on');
			$btn.removeClass('off');
			$btn.addClass('on');
		 }
    	return false;
	});
	
    $('.gnb > li').mouseenter(function(e) {
        $(this).find('.snb').stop().slideDown(200);
		$('#header #gnb-bg').height($('.gnb').height()).show();
    });
	$('.gnb > li').mouseleave(function(e) {
        $(this).find('.snb').stop().slideUp(200);
		$('#header #gnb-bg').height($('.gnb').height()).show();
    });
	
	$(window).scroll(function(e) {
        if($(this).scrollTop() > 5) {
			$('body').addClass('scrolled');
		}
		else {
			$('body').removeClass('scrolled');		
		}
    });
	
	
	//사이드 메뉴 열림 닫힘	{{{=========================================
	$('.menu-list > li > a').click(function(e) {
    	var $this = $(this);
	  	if($this.parent().find('>ul').length) {
			e.preventDefault();
		}
		
		$('.menu-list > li > a').each(function(index, element) {
        	if($this[0] == $(this)[0]) {
				if(!$(this).parent().hasClass('on')) {
					$(this).parent().addClass('on');
					$(this).next().stop().slideDown(300);
				}
				else {
					$(this).parent().removeClass('on');
					$(this).next().stop().slideUp(300);
				
				}
			}
			else {
				if($(this).parent().hasClass('on')) {
					$(this).parent().removeClass('on');
					$(this).next().stop().slideUp(300);
				}
			}
		});
    });
	//사이드 메뉴 열림 닫힘	}}}=========================================
	
	
});

</script>
<div id="right-side">
  <div class="quick_menu">
        <ul>
            <?php if ($is_member) {  ?>
            <?php if ($is_admin) {  ?>
            <li><a href="<?php echo G5_ADMIN_URL ?>"><b>관리자</b></a></li>
            <?php }  ?>
            <li><a href="<?php echo G5_BBS_URL ?>/member_confirm.php?url=<?php echo G5_BBS_URL ?>/register_form.php">정보수정</a></li>
            <li><a href="<?php echo G5_BBS_URL ?>/logout.php">로그아웃</a></li>
            <?php } else {  ?>
            <li><a href="<?php echo G5_BBS_URL ?>/register.php">회원가입</a></li>
            <li><a href="<?php echo G5_BBS_URL ?>/login.php"><b>로그인</b></a></li>
            <?php }  ?>
        </ul>
    </div>
    <nav class="side_gnb">
        <div class="call"><a href="tel:051-325-6700"><li><i class="xi-call xi-fw"></i>티로그 전화걸기</li></a></div>
        <ul class="menu-list">
            <?php foreach($MENUM as $k=>$l_menu) { ?>
            <li class=""> 
                <a href="<?=$l_menu['me_link']?>" target="_<?=$l_menu['me_target']?>"> <?=get_text($l_menu['me_name'])?> <i class="fa fa-arrow-left"></i></a>
                <?php if(is_array($l_menu['ms'])) { ?>
                <ul class="depth-2">
                    <?php foreach($l_menu['ms'] as $kk=>$s_menu) { ?>
                    <li><a href="<?=$s_menu['me_link']?>" target="_<?=$s_menu['me_target']?>"> <?=get_text($s_menu['me_name'])?></a></li>
                    <?php } ?>
                </ul>
                <?php
				}
				?>
            </li>
            <?php } ?>
        </ul>
    </nav>
</div>
<!--right-side끝--> 

<!-- {{{ #wrapper -->
<div id="wrap">
<div style="position:relative">
    <header id="header">
        <div class="header-inner">
            <div id="logo"><a href="/yoajung"><img src="<?=G5_THEME_URL?>/img/logo-color.png"></a></div>
            <ul class="gnb">
                <?php foreach($MENUM as $k=>$l_menu) { ?>
                <li class="lm"> 
                    <a href="<?=$l_menu['me_link']?>" target="_<?=$l_menu['me_target']?>"> <?=get_text($l_menu['me_name'])?></a>
                    <?php if(is_array($l_menu['ms'])) { ?>
                    <ul class="snb">
                        <?php foreach($l_menu['ms'] as $kk=>$s_menu) { ?>
                        <li class="sm"><a href="<?=$s_menu['me_link']?>" target="_<?=$s_menu['me_target']?>"> <?=get_text($s_menu['me_name'])?></a></li>
                        <?php } ?>
                    </ul>
                    <?php
                    }
                    ?>
                </li>
                <?php } ?>
                
		    <?php if ($is_member) {  ?>
            <?php if ($is_admin) {  ?>
            <li class="join"><a href="<?php echo G5_ADMIN_URL ?>"><i class="xi-profile"></i> 관리자</a></li>
            <?php }  ?>
            <li class="login" style="border-right:1px solid #2a5eca"><a href="<?php echo G5_BBS_URL ?>/member_confirm.php?url=<?php echo G5_BBS_URL ?>/register_form.php"><i class="xi-wrench"></i> 정보수정</a></li>
            <li class="login"><a href="<?php echo G5_BBS_URL ?>/logout.php"><i class="xi-unlock"></i> 로그아웃</a></li>
            <?php } else {  ?>
            <li class="join"><a href="<?php echo G5_BBS_URL ?>/register.php"><i class="xi-user-plus-o"></i> 회원가입</a></li>
            <li class="login"><a href="<?php echo G5_BBS_URL ?>/login.php"><i class="xi-lock"></i> 로그인</a></li>
            <?php }  ?>
             </ul>
             <button type="button" class="menu">메뉴</button>
           </div>    
       
    </header> 

    

</div>
<script>
$(function() {
	$('#header button.menu').click(function(e) {
		var $this = $(this);
		if($this.hasClass('on')) {
			$this.removeClass('on');
			//$('body').removeClass('all');
			$this.blur();
			$('#header .all').stop().slideUp();
		} else {
			$this.addClass('on');
			//$('body').addClass('all');
			$this.blur();
			$('#header .all').stop().slideDown();
		}
	});
});
</script>
     
         
         
    <div id="open-button">
        <div style="position:relative;">
            <div class="navicon-line nl1"></div>
            <div class="navicon-line nl2"></div>
            <div class="navicon-line nl3"></div>
        </div>
    </div>
<?php
if($bo_table) {
	include G5_THEME_PATH.'/html/bbs_head.php';
}
?>
