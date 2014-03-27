<?php
// coder info
$track = "data/srm";
if ($tab == "algo") {
	$track = "data/srm";
} else if ($tab == "develop") {
	$track = "develop";
} else if ($tab == "design") {
	$track = "design";
}
global $coder;
$coder = get_member_statistics ( $handle, $track );
$WebDesign = $coder->Tracks->WebDesign;
$recentWins = get_stat_design_recentwins($handle)->recentWinningSubmissions;
#print_r($recentWins);
$img_locked = get_bloginfo( 'stylesheet_directory' )."/i/img-locked.png";
?>



<div id="develop" class="tab algoLayout designLayout">
	<div class="ratingInfo">
		<div class="submissonInfo">
			<figure class="submissionThumb">
				<!-- <img alt="" src="<?php // echo $WebDesign->recentWinningSubmission; ?>">  -->
				<img alt="" src="<?php echo ( $recentWins[0]->viewable == false ? $img_locked: $recentWins[0]->preview);?>" />
				
			</figure>
			<div class="rwsDetails">
				<header class="head">
					<h4>Recent Winning Submission</h4>
				</header>
				<div class="winInfo">
					<a href="#" class="contestTitle">
						<i></i><?php echo $recentWins[0]->contestName;?>
					</a>
					<div class="badgeImg"></div>
					<div class="prizeAmount">
						<span class="val"><i></i>$<?php echo $recentWins[0]->prize;?></span>
					</div>
					<div class="submittedOn">
						Submitted on: <span class="time"><?php echo date("M d, Y H:i",strtotime($r->submissionDate)) . " EST";?></span>
					</div>
				</div>
			</div>
			<!-- /.rwsDetails -->
			<div class="submissionCarousel">
				<div class="carouselWrap">
					<div class="slider">
						<?php
						foreach ( $recentWins as $r ):
						?>
						
						
						<div class="slide">
							<figure>
								<img alt="" src="<?php echo ( $r->viewable == false ? $img_locked: $r->preview);?>" />
							</figure>
							<div class="hide comptetionData">
								<input class="name" type="hidden" value="<?php echo $r->contestName;?>" />
								<input class="prize" type="hidden" value="$<?php echo $r->prize;?>" />
								<input class="submiissionDate" type="hidden" value="<?php echo date("M d, Y H:i",strtotime($r->submissionDate)) . " EST";?>" />
							</div>
						</div>
						<?php
						endforeach;
						?>						
					</div>
				</div>
			</div>
			<!-- /.submissionCarousel -->
		</div>
		<!-- /.submissonInfo -->

	</div>
	<!-- /.ratingInfo -->
	<aside class="badges">
		<header class="head">
			<h4>Badges</h4>
		</header>
		<?php get_template_part('content', 'badges');?>		
	</aside>
	<!-- /.badges -->
</div>
<!-- /.algoLayout -->