<?php
define('_INDEX_', true);
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if (G5_IS_MOBILE) {
    include_once(G5_THEME_MOBILE_PATH.'/index.php');
    return;
}

include_once(G5_THEME_PATH.'/head.php');
include G5_BBS_PATH.'/newwin.inc.php'; // 팝업레이어
?>

<!--■■■visual_slider■■■-->
<div class="visual_slider" id="visual">
  <div class="main-carousel owl-carousel">
    
    <div class="li img01">
      <div class="copy_area_wrap">
        <div class="copy_area">
          <h1>NEW RENEWABLE ENERGY - TLOG SOLAR</h1>
          <h2><strong>지구의 미래</strong>를 생각합니다<em>!</em></h2>
          <h3>티로그 솔라는 지구의 미래를 생각하는 태양광 시스템 전문 기업입니다.</h3>
        </div>
        <p class="cover"></p> 
      </div>
    </div>
    
    <div class="li img02">
      <div class="jarallax" data-jarallax-video="https://www.youtube.com/watch?v=4kEjifVhIRo">
        <div class="copy_area_wrap">
          <div class="copy_area">
           <h2><strong>유튜브 백그라운드</strong> 지원</h2>
           <h3>유튜브 주소만 변경하시면 됩니다.</h3>
          </div>
        </div>
        <!--<p class="cover"></p> 동영상에 어두운 배경이 필요없을 경우만 주석처리 해주세요--> 
      </div>
    </div>
    
    <div class="li img03">
      <div class="copy_area_wrap">
        <div class="copy_area">
          <h2><strong>그누보드5.5</strong> 기반</h2>
          <h3>UTF-8, PHP 7.0 버전 이상 설치, 풀반응형</h3>
        </div>
        <p class="cover"></p> 
      </div>
    </div>
  
  </div>
</div>
<script>
$(document).ready(function(){
	$('.main-carousel').owlCarousel({
		items:1,//보여줄 이미지 갯수
		nav:true,
		loop: true,
/*		autoplay:true,
        autoplayTimeout:9000,*/
		navText: ["PREV","NEXT"]
	});
	
	jarallax(document.querySelectorAll('.jarallax'));

});
</script> 
<!--■■■visual_slider■■■--> 





<!--■■■right_quick■■■-->
<section class="right_quick fixed">
  <ul class="quick_info<?php if($is_member && $is_admin) {echo ' admin';}?>">
    <li> <a href="https://blog.naver.com/tlogkr" target="_blank" style="background-color: rgb(52, 52, 52); width: 60px;"> <i class="ico"><i class="xi-bold"></i></i> <span style="opacity: 0; left: 0px;">블로그</span> </a> </li>
    <li> <a href="https://www.kakaocorp.com/page/service/service/KakaoTalk" target="_blank"  style="background-color: rgb(52, 52, 52); width: 60px;"> <i class="ico"><i class="xi-kakaotalk"></i></i> <span style="opacity: 0; left: 0px;">카톡상담</span> </a> </li>
    <li> <a href="/bbs/board.php?bo_table=tl_product01" style="background-color: rgb(52, 52, 52); width: 60px;"> <i class="ico"><i class="xi-paper"></i></i> <span style="opacity: 0; left: 0px;">제품소개</span> </a> </li>
    <li> <a href="<?=G5_THEME_URL?>/html/location.php" style="background-color: rgb(52, 52, 52); width: 60px;"> <i class="ico"><i class="xi-maker"></i></i> <span style="opacity: 0; left: 0px;">오시는길</span> </a> </li>
  </ul>
</section>
<script>
$(function() {
	var $btn = $(".quick_info li a");
   $btn.on('mouseenter focusin mouseleave focusout', function(e) {
	switch ( e.type ) {
		case 'mouseenter':
		case 'focusin':
			TweenLite.to($(this), 0.5, {width:"180px", backgroundColor:"#2253b8", ease:Cubic.easeOut});
			TweenLite.to($(this).find("span"), 0.7, {left:30, opacity:1, ease:Cubic.easeOut});
			break;
		case 'mouseleave':
		case 'focusout':
			TweenLite.to($(this).find("span"), 0.3, {left:0, opacity:0, ease:Cubic.easeOut});
			TweenLite.to($(this), 0.5, {width:"60px", backgroundColor:"#343434", ease:Cubic.easeOut});
			break;
		}
	});
});
</script> 
<!--■■■right_quick■■■--> 





<!--■■■tl_company_box_wrap■■■-->

<!-- `ssh -->
<div>
		<?php echo latest("pic_block", "gallery", 5, 100); ?>
</div>


<section class="tl_company_box_wrap" id="company">
    <div class="inner clearfix">
        <h2>사업영역<span>정확한 아이덴티티가 묻어있는 맞춤형 웹서비스</span></h2>
        <ul>
			<li class="aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
				<div class="box">
					<div class="icon"><i class="xi-desktop xi-3x"></i></div>
					<dl>
						<dt>WEB/MOBILE</dt>
						<dd class="lead">다양한 분야의 웹/모바일 사이트 구축</dd>
                        <a href="../bbs/content.php?code=business_01">더보기</a>
					</dl>
					
				</div>
			</li>

			<li class="aos-init aos-animate" data-aos="fade-up" data-aos-delay="400">
				<div class="box">
					<div class="icon"><i class="xi-mobile xi-3x"></i> </div>
					<dl>
						<dt>HYBRID APP</dt>
						<dd class="lead">안드로이드/IOS 하이브리드앱 개발</dd>
                        <a href="../bbs/content.php?code=business_02">더보기</a>
					</dl>
					
				</div>
			</li>

			<li class="aos-init aos-animate" data-aos="fade-up" data-aos-delay="600">
				<div class="box">
					<div class="icon"><i class="xi-comment-o xi-3x"></i> </div>
					<dl>
						<dt>CAFE/BLOG</dt>
						<dd class="lead">다음/네이버/티스토리등 블로그 개설</dd>
                        <a href="../bbs/content.php?code=business_02">더보기</a>
					</dl>
					
				</div>
			</li>

			<li class="aos-init aos-animate" data-aos="fade-up" data-aos-delay="800">
				<div class="box">
					<div class="icon"><i class="xi-taxi xi-3x"></i> </div>
					<dl>
						<dt>PRINT</dt>
						<dd class="lead">옥외광고, 지하철 광고, 버스광고 광고</dd>
                        <a href="../bbs/content.php?code=business_01">더보기</a>
					</dl>
					
				</div>
			</li>
		</ul>
    </div>
</section>
<!--■■■tl_company_box_warp■■■--> 






<section class="tl_main_gallery_wrap">
    <div class="inner clearfix">
        <?php
		$bo_table = 'tl_gallery';
		$rows = 4;
		$subject_len = 20;
		$cache_time = 1;
		$options = array(
		  'thumb_width'=>400,
		  'thumb_height'=>0,
		  'content_len'=>50,
		  'title'=>'뉴스갤러리',
		  'sub_title'=>'갤러리 게시판 업로드시 자동으로 추출됩니다 .',
		);
		echo latest('theme/tl_news_gallery', $bo_table, $rows, $subject_len, $cache_time, $options);
		?>  
    </div>
</section>







<!--■■■tl_business_now_box■■■-->
<section class="tl_business_now_box_warp" class="animated fadeInUp">
    <div class="inner clearfix">
        <h2>제품소개<span>게시판과의 연동만 가능합니다.</span></h2>

        <?php
		$options = array(
			'content_length'=>60
		);
		echo latest("theme/tl_slide_gallery", 'tl_product01', 10, 20,1,$options);
		?>
    </div>
</section>
<!--■■■tl_business_now_box■■■--> 







<!--■■■tl_product_box_wrap■■■-->
<section class="tl_product_box_wrap">
  <div class="inner clearfix">
    <h2>TLOG PRODUCTS<span>이미지가 업로드된 모든 게시판과 연동됩니다.<br />탭은 해당 게시판 관리자에서 탭메뉴명 입력시 자동으로 갯수가 조절됩니다.</span></h2>
    <?php
    include_once(G5_THEME_PATH . '/lib/latest-tab.lib.php');
    echo latest_tab('theme/pic_block_tab', 'tl_product03', 3, 23); /* 8:이미지 노출 갯수, 23:제목 글자 갯수*/
    ?>
  </div>
</section>
<!--■■■tl_product_box_wrap■■■-->




     
 
     


<!--■■■notice_latest_warp■■■-->
<section class="tl_latest_box_warp">
    <div class="inner clearfix">
        <div class="notice_latest" class="aos-init aos-animate" data-aos="fade-right" data-aos-delay="400"><?php echo latest("theme/basic", "tl_notice", 8, 20); ?></div>
        <div class="counsel_latest" class="aos-init aos-animate" data-aos="fade-left" data-aos-delay="600"><?php echo latest("theme/basic", "tl_qa", 8, 20); ?></div>
    </div>
</section>
<!--■■■notice_latest_warp■■■-->





<section class="tl_contact_box_wrap" id="contact">
<div class="inner clearfix">
<form id="contact-form" name="contact-form" method="post" action="<?php echo G5_THEME_URL.'/html/contact_mail_x.php' ?>" style="position:relative" class="aos-init aos-animate" data-aos="fade-down" data-aos-delay="400">
<h2>CONTACT US<span>관리자에서 기본메일을 변경해주세요.</span></h2>
<div class="input_page">
  <input type="text" name="co_name" id="co_name" maxlength="100" value="NAME" onfocus="if (this.value == 'NAME') this.value = '';" onblur="if (this.value == '') this.value = 'NAME';">
 </div>
 
 <div class="input_page">
  <input type="text" name="co_email" id="co_email" maxlength="100" value="E-MAIL" onfocus="if (this.value == 'E-MAIL') this.value = '';" onblur="if (this.value == '') this.value = 'E-MAIL';">
 </div>

 <div class="txtarea_page">
   <textarea name="co_message" id="co_message" maxlength="100" onBlur=OnExit(this) onFocus=OnEnter(this) cols="30">MEMO</textarea>
 </div>
 <div class="send_page">
  <button type="submit" class="send">SEND</button>
 </div>

 <div id="x_message" class="x-msg1" style="overflow: hidden; display: none;"></div>
 <div id="x_loading"><i class="fa fa-spinner fa-spin" aria-hidden="true"></i></div>
 </form></div>
</section>

<script>
    $(function() {
			function validateEmail(email) {
					var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
					return re.test(email);
			}
			function x_message(msg, type) {
				console.log(msg);
				$('#x_message').html(msg).removeClass("x-msg1").removeClass("x-msg2").addClass("x-msg"+type).show(400);
				setTimeout(function() {
					$('#x_message').hide(400);
				},3000);
				
			}
			var is_sending = false;

			$('#contact-form').submit(function(e) {
				e.preventDefault();
				var co_name = $('#co_name').val();
				var co_email = $('#co_email').val();
				var co_message = $('#co_message').val();
				var data = {'co_name':co_name,'co_email':co_email,'co_message':co_message};
				console.log(co_name);
				if(co_name == '' || co_name == 'NAME') {
					x_message('이름을 입력하세요',1);
					$('#co_name').focus();
					return false;
				}
				if(co_email == '' || co_email == 'E-MAIL') {
					x_message('이메일을 입력하세요',1);
					$('#co_email').focus();
					return false;
				}
				if(!validateEmail(co_email)) {
					x_message('이메일 형식이 유효하지 않습니다.',1);
					$('#co_email').focus();
					return false;
				}
				
				
				if(co_message == '' ||co_message == 'MEMO') {
					x_message('내용을 입력하세요',1);
					$('#co_message').focus();
					return false;
				}
				
				is_sending = true;
				$('#x_loading').show();
				
				var url = $(this).attr('action');
				$.ajax({
						method: "POST",
						type: "POST",
						url: url,
						data: data,
						dataType: "json"
				})
					.done(function(data) {
							if(data['error']) {
								x_message(data['error'],1);
							}
							else {
								x_message('메일을 전송하였습니다.',2);
								$('#contact-form')[0].reset();
								
							}
							is_sending = false;
							$('#x_loading').hide();
					});
				
				
				
				return false;			
			});
		});
</script>


<script language="javascript">
function OnEnter( field ) { if( field.value == field.defaultValue ) { field.value = ""; } }
function OnExit( field ) { if( field.value == "" ) { field.value = field.defaultValue; } }
</script>
<?php
include_once(G5_THEME_PATH.'/tail.php');
?>
