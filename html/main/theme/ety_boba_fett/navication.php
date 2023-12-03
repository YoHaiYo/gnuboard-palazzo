
<!-------------------------- 네비게이션 -------------------------->
<!-- 상단메뉴 -->
<div id="top-nav" class="container-fluidxxx top-linexxx fixed-headerxxx">
	<div class="container d-flex">
		
					<div id="tnb_index_left">
						<!-- social -->
						<div class="sns_icon">
						<a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a>
						</div>
						<div class="sns_icon">
						<a href="#"><i class="fab fa-twitter"></i></a>
						</div>
						<div class="sns_icon">
						<a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
						</div>
					</div>
						<div class="logo">
							<a class="navbar-brand" href="<?php echo G5_URL?>"><img src="<?php echo G5_THEME_URL?>/img/logo.png" class="logoxxx"></a>
						</div>
					
					<!-- 로그인메뉴 -->
					<div id="tnb_index">
						<ul>
						<?php if($is_member) { ?>
							<li><a href="<?php echo G5_URL?>/bbs/logout.php">로그아웃</a></li>
							<li><a href="<?php echo G5_BBS_URL ?>/member_confirm.php?url=<?php echo G5_BBS_URL ?>/register_form.php">정보수정</a></li>
						<?php }else{ ?>
							<li><a href="<?php echo G5_URL?>/bbs/register.php"><i class="fa fa-user-plus" aria-hidden="true"></i> 회원가입</a></li>
							<li><a href="<?php echo G5_URL?>/bbs/login.php"><i class="fas fa-sign-in-alt"></i> 로그인</a></li>
						<?php }?>
							<li><a href="<?php echo G5_URL?>/bbs/qalist.php"><i class="fa fa-comments" aria-hidden="true"></i> <span>1:1문의</span></a></li>
							<?php if($is_admin) { ?>
							<li><a href="<?php echo G5_URL?>/adm">관리자</a></li>
							<?php } ?>
						</ul>
					</div>

	</div><!-- /container -->
</div>


<!-- 하단메뉴 -->
<nav id="bottom-nav" class="navbar fixed-topxxx navbar-expand-lg navbar-white bg-white">
	
  <div class="container">
	<button class="navbar-toggler navbar-dark navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
	  <span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarResponsive" data-hover="dropdown" data-animations="fadeIn fadeIn fadeInUp fadeInRight">
	  <div class="w-100">
			<ul class="ssh--bottom-nav navbar-navxxx ml-autoxxx d-flex">
					<?php
					$sql = " select *
								from {$g5['menu_table']}
								where me_use = '1'
									and length(me_code) = '2'
								order by me_order, me_id ";
					$result = sql_query($sql, false);
					$gnb_zindex = 999; // gnb_1dli z-index 값 설정용
					$menu_datas = array();
					for ($i=0; $row=sql_fetch_array($result); $i++) {
						$menu_datas[$i] = $row;
			
						$sql2 = " select *
									from {$g5['menu_table']}
									where me_use = '1'
										and length(me_code) = '4'
										and substring(me_code, 1, 2) = '{$row['me_code']}'
									order by me_order, me_id ";
						$result2 = sql_query($sql2);
						for ($k=0; $row2=sql_fetch_array($result2); $k++) {
							$menu_datas[$i]['sub'][$k] = $row2;
						}
					}
					$i = 0;
					foreach( $menu_datas as $row ){
						if( empty($row) ) continue; 
					?>			
						<?php if($row['sub']['0']) { ?>
							<li class="nav-item dropdown megamenu-li">
								<!-- `ssh 대메뉴도 클릭되게 하려면 data-toggle 없애기 -->
								<a class="nav-link dropdown-toggle ks4 f16" href="<?php echo $row['me_link']; ?>" id="navbarDropdownBlog" data-toggle="dropdownxxx" aria-haspopup="true" aria-expanded="false" target="_<?php echo $row['me_target']; ?>">
								<?php echo $row['me_name'] ?>
								</a>
									<!-- 서브 -->
									<ul class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
										<?php
										// 하위 분류
										$k = 0;
										foreach( (array) $row['sub'] as $row2 ){
			
										if( empty($row2) ) continue; 
			
										?>
										<a class="dropdown-item ks4 f15 fw4" href="<?php echo $row2['me_link']; ?>" target="_<?php echo $row2['me_target']; ?>"><?php echo $row2['me_name'] ?></a>
			
										<?php
										$k++;
										}   //end foreach $row2
			
										if($k > 0)
										echo '</ul>'.PHP_EOL;
										?>
						<?php }else{?>
							<li class="nav-item">
							<a class="nav-link ks4 f16" href="<?php echo $row['me_link']; ?>" target="_<?php echo $row['me_target']; ?>"><?php echo $row['me_name'] ?></a>
							</li>
						<?php }?>
					</li>
			
					<?php
					$i++;
					}   //end foreach $row
			
					if ($i == 0) {  ?>
						<li class="gnb_empty">메뉴 준비 중입니다.<?php if ($is_admin) { ?> <br><a href="<?php echo G5_ADMIN_URL; ?>/menu_list.php">관리자모드 &gt; 환경설정 &gt; 메뉴설정</a>에서 설정하실 수 있습니다.<?php } ?></li>
					<?php } ?>
					<li class="nav-item dropdown login">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						LOGIN
						</a>
						<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBlog">
						
						<?php if($is_admin) { ?><a class="dropdown-item" href="<?php echo G5_URL?>/adm">관리자</a><?php } ?>
						<a class="dropdown-item" href="<?php echo G5_URL?>/bbs/new.php">새글</a>
						<a class="dropdown-item" href="<?php echo G5_URL?>/bbs/qalist.php">1:1문의</a>
						<?php if($is_member) { ?>
						<a class="dropdown-item" href="<?php echo G5_BBS_URL ?>/member_confirm.php?url=<?php echo G5_BBS_URL ?>/register_form.php">정보수정</a>
						<a class="dropdown-item" href="<?php echo G5_URL?>/bbs/logout.php">로그아웃</a>
						<?php }else{ ?>
						<a class="dropdown-item" href="<?php echo G5_URL?>/bbs/login.php">로그인A</a>
						<a class="dropdown-item" href="<?php echo G5_URL?>/bbs/register.php">회원가입</a>
						<?php } ?>
						</div>
					</li>
			</ul>
		</div>
	</div>
  </div>
</nav>