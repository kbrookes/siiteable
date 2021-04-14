<?php 
	
	$page_id = get_queried_object_id();
	
	//// CUSTOMIZER OPTIONS
	$heroHeight = get_theme_mod( 'hero_header_height', 0 );
	
	$heroAlignment = 'align-items-center';
	$heroAlignment = get_theme_mod( 'hero_vertical_alignment', 0 );
	
	$heroTextColor = 'text-white';
	$heroTextColor = get_theme_mod( 'hero_text_color', 0 );
	
	$heroH1Size = 'font-md';
	$heroH1Size = get_theme_mod( 'hero_h1_size', 0 );
	
	$colWidth = 'w-75';
	$colWidth = get_theme_mod('header_content_width', 0 );
	
	$contentSize = 'text-md';
	$contentSize = get_theme_mod('hero_header_content_size', 0);
	
	//// HERO TYPE OPTIONS
	
	$heroType = '';
	$videoType = '';
	$videoID = '';
	$videoURL = '';
	$heroVideoPoster = '';
	$heroBG = '';
	
	if(get_field('hero_type')):
		$heroType = get_field('hero_type');
	endif;
	
	if($heroType == 'video' && get_field('hero_video_source')):
		$videoType = get_field('hero_video_source');
	endif;
	
	if(get_field('hero_video_id')):
		$videoID = get_field('hero_video_id');
	endif;
	
	if($videoType == 'local'):
		$videoURL = get_field('hero_choose_video');
	elseif($videoType == 'youtube'):
		$videoURL = 'https://www.youtube.com/embed/' . get_field('hero_choose_video');
	elseif($videoType == 'vimeo'):
		$videoURL = 'https://player.vimeo.com/video/' . get_field('hero_choose_video');
	endif;
	
	if(get_field('hero_video_poster')):
		$heroVideoPoster = get_field('hero_video_poster');
	elseif(get_field('hero_video_poster') == '' && get_field('hero_video_source') == 'youtube'):
		$heroVideoPoster == 'http://i3.ytimg.com/vi/' . $videoID . '/maxresdefault.jpg';
	endif; 
	
	if(get_field('hero_background_colour')):
		$heroBG = 'style="background-color: #' . get_field('hero_background_colour') . ';"';
	endif;
	
	/// COLUMNS SETUP
	$columnCount = 1;
	if(!empty(get_field('hero_column_count'))):
		$columnCount = get_field('hero_column_count');
	endif;
	
	$columnGroup = get_field('hero_columns_group');
	if(!empty($columnGroup)) {
		$col1Content = $columnGroup['col_1_content'];
		$col1Align = 'text-' . $columnGroup['col_1_align'];
		$col2Content = $columnGroup['col_2_content'];
		$col2Align = 'text-' . $columnGroup['col_2_align'];
		
		$columnPadding = '';
		$columnPadding = get_field('column_padding');
		if($columnPadding > 0){
			$columnPadding = 'p-' . $columnPadding;
		}
		
		/// TITLE POSITION
		$titleCol = 1;
		if($columnGroup['col_1_title'] == true){
			$titleCol = 1;
		} elseif($columnGroup['col_1_title'] == false){
			$titleCol = 2;
		}
		
		if(($columnGroup['col_1_title'] == false) && ($columnGroup['col_2_title'] == false)){
			$titleCol = 0;
		}
	}
	/// OVERLAY SETUP
	$hasOverlay = false;
	$overlayColor = null;
	$overlayOpacity = null;
	$colorClass = '';
	$opacityClass = '';
	$overlayClass = '';
	
	if(get_field('add_image_overlay') == true):
		$hasOverlay = true;
		$overlayColor = get_field('overlay_colour');
		switch ($overlayColor) {
			case "None":
				$colorClass = 'overlay-dark';
				break;
			case "primary":
				$colorClass = 'overlay-primary';
				break;
			case "secondary":
				$colorClass = 'overlay-secondary';
				break;
			case "dark":
				$colorClass = 'overlay-dark';
				break;
			case "light":
				$colorClass = 'overlay-light';
				break;
			case "white":
				$colorClass = 'overlay-white';
				break;
			case "alternate":
				$colorClass = 'overlay-alternate';
				break;
		}
		$overlayOpacity = get_field('overlay_opacity');
		switch ($overlayOpacity) {
			case "None":
				$opacityClass = 'overlay-90';
				break;
			case "05":
				$opacityClass = 'overlay-05';
				break;
			case "15":
				$opacityClass = 'overlay-15';
				break;
			case "25":
				$opacityClass = 'overlay-25';
				break;
			case "35":
				$opacityClass = 'overlay-35';
				break;
			case "50":
				$opacityClass = 'overlay-50';
				break;
			case "65":
				$opacityClass = 'overlay-65';
				break;
			case "75":
				$opacityClass = 'overlay-75';
				break;
			case "85":
				$opacityClass = 'overlay-85';
				break;
			case "95":
				$opacityClass = 'overlay-95';
				break;
		}
		$overlayClass = 'hasOverlay ' . $colorClass . ' ' . $opacityClass;
	endif;
	
	
	/// SEPARATORS INIT
	
	$testme = get_field('hero_separators');
	
	$sepPrefix = 'hero';
	$templatePath = get_template_directory();
	//$separatorLayout = $templatePath . "/template-parts/kiss/static-partials/separators.php";
	
	/// GENERAL
	$sepOptions = get_field($sepPrefix . '_sep_options');
	$svgPath = $templatePath . "/template-parts/kiss/flexi-partials/separators/separator-";
	$pathUpper = $templatePath . "/template-parts/kiss/flexi-partials/separator-upper.php";
	$pathLower = $templatePath . "/template-parts/kiss/flexi-partials/separator-lower.php";


	/// SET LOWER SEPARATORS
	$lowerSeparatorType = '';
	$lowerSeparatorDirection = '';
	$lowerSeparatorForeground = '';
	$lowerSeparatorShadow = '';
	$boxBackground = '';
	$hasSeparatorLower = '';
	$lowerClassVertical = '';
	$lowerClassHorizontal = '';
	$separatorClasses = '';
	
	$addSeparatorLower = false;
	if((get_field($sepPrefix . '_separators') != '') && ($sepOptions[$sepPrefix . '_lower_separator_separator_type'] != '')):
		$addSeparatorLower = true;
		$separatorClasses .= ' hasSeparatorLower hasLower';
		//$hasSeparatorLower = 'hasSeparatorLower';
		$lowerSeparatorType = $sepOptions[$sepPrefix . '_lower_separator_separator_type'];
		$lowerSeparatorDirection = $sepOptions[$sepPrefix . '_lower_separator_separator_direction'];
		$lowerSeparatorForeground = $sepOptions[$sepPrefix . '_lower_separator_separator_foreground'];
		$lowerSeparatorShadow = $sepOptions[$sepPrefix . '_lower_separator_separator_shadow'];
		$lowerContainerColor = $sepOptions[$sepPrefix . '_lower_separator_container_background'];
		$lowerClassVertical = $sepOptions[$sepPrefix . '_lower_separator_direction_vertical'];
		$lowerClassHorizontal = $sepOptions[$sepPrefix . '_lower_separator_direction_horizontal'];
	endif;
	
	if(!empty($lowerClassVertical)):
		if($lowerClassVertical == 'up'):
			$separatorClasses .= ' lowerUp';
		endif; 
		$lowerClassVertical = 'directionX' . $lowerClassVertical;
	endif; 
	
	if(!empty($lowerClassHorizontal)):
		$lowerClassHorizontal = 'directionY' . $lowerClassHorizontal;
	endif;
	
	$lowerSeparatorFile = $svgPath;
	$lowerSeparatorFile .= $lowerSeparatorType;
	$lowerSeparatorFile .= $lowerSeparatorDirection;
	$lowerSeparatorFile .= ".svg";
	
	if(!empty($lowerContainerColor)):
		$lowerBoxBackground = 'bg-' . $lowerContainerColor;
	endif;	
	
	$heroImage = '';
	if(get_field('hero_image')){
		$heroImage = get_field('hero_image');
	} elseif(get_the_post_thumbnail_url($page_id) != '') { 
		$heroImage = get_the_post_thumbnail_url($page_id);
	}
	
	$pageTitle = single_post_title('', FALSE);
	if(get_field('hero_title')):
		$heroTitle = get_field('hero_title');
	else:
		$heroTitle = $pageTitle;
	endif;
	
	$faType = get_theme_mod( 'fa_styles');
	
	if(get_field('hero_title') || $heroImage || get_field('hero_content'))	:?>
<section id="heroHeader" class="hero-header  <?php echo $separatorClasses . ' ' . $heroHeight; ?> <?php if($heroType == 'video'):?>video-hero video-type__<?php echo $videoType; ?><?php endif; ?>" <?php if($heroBG): echo $heroBG; endif; ?>>
	<div class="hero-header__wrap <?php echo $overlayClass; ?>" <?php if($heroImage):?>style="background-image:url(<?php echo $heroImage; ?>)"<?php endif; ?>>
		<?php if($heroType == 'video'):
			if($videoType == 'local'):?>
		<video class="video-hero__background lazy" poster="<?php echo $heroVideoPoster; ?>" autoplay loop muted playsinline type="video/mpeg">
			<source src="<?php echo $videoURL; ?>" type="video/mp4" />
		</video>
			<?php endif; ?>
			<?php if($videoType == 'youtube'):?>
		<div class="video-background">
			<div class="video-foreground" id="YouTubeBackgroundVideoPlayer">
		    </div>
		</div>
			<?php endif; ?>
			<?php if($videoType == 'vimeo'):?>
		<div class="video-hero__background">
			<iframe class="video-hero__foreground" width="x" height="y" src="<?php echo $videoURL; ?>" frameborder="0">
			</iframe>
		</div>
			<?php endif; ?>
		<?php endif; ?>
		<div class="container <?= $heroAlignment; ?>">
			<div class="hero-header__wrap-inner">
				<?php if($columnCount == 1):?>
					<div class="hero-header__content <?= $colWidth; ?>">
						<h1 class="<?= $heroH1Size . ' ' . $heroTextColor; ?>"><?= $heroTitle; ?></h1>
						<div class="<?= $heroTextColor . ' ' .  $contentSize; ?>">
						<?php echo get_field('hero_content'); ?>
						</div>
					</div>
				<?php else:?>
				<div class="row">
					<div class="col-12 col-md-6 <?php echo $col1Align; ?>">
						<div class="hero-header__column <?php echo $columnPadding; ?>">
							<?php if($titleCol == 1){ ?>
								<h1 class="<?= $heroH1Size . ' ' . $heroTextColor; ?>"><?= $heroTitle; ?></h1>
							<?php } ?>
							<div class="<?= $heroTextColor . ' ' .  $contentSize; ?>">
								<?php echo $col1Content; ?>
							</div>
						</div>
					</div>
					<div class="col-12 col-md-6 <?php echo $col2Align; ?>">
						<div class="hero-header__column <?php echo $columnPadding; ?>">
							<?php if($titleCol == 2){ ?>
								<h1 class="<?= $heroH1Size . ' ' . $heroTextColor; ?>"><?= $heroTitle; ?></h1>
							<?php } ?>
							<div class="<?= $heroTextColor . ' ' .  $contentSize; ?>">
								<?php echo $col2Content; ?>
							</div>
						</div>
					</div>
				</div>
				<?php endif; ?>
				<div class="hero_header__content-actions">
					<?php if( have_rows('header_multi_buttons') ): 
						$counter = 1;
					?>
					<?php endif; ?>
					<?php while( have_rows('header_multi_buttons') ): the_row();
						// vars
						$linkType = '';
						$externalLink = false;
						$mailto = false;
						$setLink = 'internal';
						$linkClass = '';
						$buttonCopy = 'LEARN HOW';
						$butPrefix = 'hero-button';
						$videoIDButton = '';
						$buttonOptions = get_sub_field($butPrefix . '_button_options');
						if(get_sub_field($butPrefix . '_add_button') == true):
							
							//$linkType = get_field($butPrefix . '_hero_link_type');
							$linkType = $buttonOptions['button_link_type'];
							$buttonCopy = $buttonOptions['button_text_copy'];
							switch ($linkType) {
								case "None":
									$setLink = null;
									$linkContent = null;
									break;
								case "page":
									$setLink = 'internal';
									$linkContent = $buttonOptions['button_page_link'];
									break;
								case "external":
									$setLink = 'external';
									$linkContent = $buttonOptions['button_external_link'];
									$externalLink = true;
									break;
								case "email":
									$setLink = 'email';
									$linkContent = $buttonOptions['button_email_address'];
									$mailto = true;
									break;
								case "form":
									$setLink = 'form';
									$linkContent = '';
									$linkClass = $buttonOptions['button_popup'];
									break;
								case "video":
									$setLink = 'video-popup';
									$linkContent = '';
									$linkClass = $buttonOptions['button_popup'];
									$videoIDButton = $buttonOptions['button_video_id'];
									break;
							}
						endif; ?>
						
						
					<?php if($setLink){ ?>
						<a class="btn btn-outline-primary <?php if($counter > 1):?>ml-4<?php endif; ?> <?php if($setLink=='form'): echo $linkClass; endif; ?>" href="<?php if($setLink=='email'):?>mailto:<?php endif; ?><?php echo $linkContent; ?>" <?php if($setLink=='external'):?>target="_blank"<?php endif; ?> <?php if($linkType == 'video'):?>data-toggle="modal" data-target="#videoModal<?php echo $counter;?>" data-youtubeid="<?php echo $videoIDButton; ?>"<?php endif; ?>><?php echo $buttonCopy; ?></a>
					<?php } ?>
					<?php 
						$counter++;
						endwhile; ?>
				</div>
			</div>
		</div>
		<div class="hero-header__icon">
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 82.1 57.2">
			  <g data-name="Layer 2">
				<g data-name="Layer 1">
				  <path d="M62 39.5A35 35 0 0113.1 9.3L0 15a48.6 48.6 0 0067.5 37l1.2-.6L63.2 39l-1.2.6z" class="fill-dark opacity-40"/>
				  <path d="M35 11.2A16.4 16.4 0 0134.3 0L21.7 5.5A28.3 28.3 0 0024 16a28.4 28.4 0 0035.9 15.3l-4.8-11A16.5 16.5 0 0135 11.2z" class="fill-white opacity-30" />
				  <path d="M75.4 40.6a35 35 0 01-48.9-30.2L13.4 16a48.6 48.6 0 0067.5 37l1.2-.6L76.7 40z" class="fill-dark opacity-10" />
				  <path d="M48.4 12.3a16.4 16.4 0 01-.7-11.2L35 6.6a28.3 28.3 0 002.4 10.5 28.4 28.4 0 0035.9 15.3l-4.8-11a16.5 16.5 0 01-20.1-9.1z" class="fill-white opacity-15" />
				</g>
			  </g>
			</svg>
		</div>
	</div>
	<?php if($addSeparatorLower == true):
		include $pathLower;
	endif; ?>
</section>
<?php endif; ?>
<script>
    /// ADD HERO CLASS TO BODY TO DYNAMICALLY CHANGE PADDING
    (function($) {
	    $('body').addClass('hasHero')
	    $('body').removeClass('noHero');
	})(jQuery);
	
	<?php if($heroType == 'video' && $videoType == 'youtube'):?>
	/// IF USING YOUTUBE, USE THE API
	function onYouTubeIframeAPIReady() {
	  var player;
	  player = new YT.Player('YouTubeBackgroundVideoPlayer', {
	      videoId: '<?php echo $videoID; ?>', // YouTube Video ID
	      width: 1280,               // Player width (in px)
	      height: 720,              // Player height (in px)
	      playerVars: {
	        playlist: '<?php echo $videoID; ?>',
	          autoplay: 1,        // Auto-play the video on load
	          autohide: 1,
	          disablekb: 1, 
	          controls: 0,        // Hide pause/play buttons in player
	          showinfo: 0,        // Hide the video title
	          modestbranding: 1,  // Hide the Youtube Logo
	          loop: 1,            // Run the video in a loop
	          fs: 0,              // Hide the full screen button
	          autohide: 0,         // Hide video controls when playing
	          rel: 0,
	          enablejsapi: 1
	      },
	      events: {
	        onReady: function(e) {
	            e.target.mute();
	            e.target.setPlaybackQuality('hd1080');
	        },
	        onStateChange: function(e) {
	          if(e && e.data === 1){
	              var videoHolder = document.getElementById('heroHeader');
	              if(videoHolder && videoHolder.id){
	                videoHolder.classList.remove('loading');
	              }
	          }else if(e && e.data === 0){
	            e.target.playVideo()
	          }
	        }
	      }
	  });
	}
	<?php endif; ?>
</script>
<?php if($heroType == 'video' && $videoType == 'youtube'):?>
<script async src="https://www.youtube.com/iframe_api"></script>
<?php endif; ?>

<?php if( have_rows('header_multi_buttons') ): 
	$counterModal = 1;
	while( have_rows('header_multi_buttons') ): the_row();
		$linkType = ''; 
		$buttonOptions = get_sub_field($butPrefix . '_button_options');
		$linkType = $buttonOptions['button_link_type'];
		$videoIDButton = $buttonOptions['button_video_id'];
		if($videoType == 'local'):
			$videoURL = get_sub_field('hero_choose_video');
		elseif($videoType == 'youtube'):
			$videoURL = 'https://www.youtube.com/embed/' . $videoIDButton;
		elseif($videoType == 'vimeo'):
			$videoURL = 'https://player.vimeo.com/video/' . $videoIDButton;
		endif;
		
		parse_str(parse_url($videoURL, PHP_URL_QUERY), $variables);
		
		if($linkType == 'video'):
	?>
<div class="modal fade" id="videoModal<?php echo $counterModal; ?>" tabindex="-1" role="dialog" aria-labelledby="videoModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-body bg-dark">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<div class="embed-responsive embed-responsive-16by9" id="videoContainer">
					
				</div>
			</div>
		</div>
	</div>
</div>

<script>
jQuery(document).ready(function ($) {
	var $midlayer  = $('.modal-body .embed-responsive'); 
	$('#videoModal<?php echo $counterModal; ?>').on('show.bs.modal', function (event) {
		var $video  = $('a.video');
		var button  = $(event.relatedTarget);   // Button that triggered the modal
		var vid  = button.data('youtubeid');  // Extract info from data-youtubeid attributes
		var iframe  = '<iframe />';
		var url  = "//youtube.com/embed/"+vid+"?autoplay=1&autohide=1&modestbranding=1&rel=0&hd=1"; // To turn off Auto play, set autoplay=0
		//var width_f = '100%';
		//var height_f  = 400;
		var frameborder = 0;
		jQuery(iframe, {
			name: 'videoframe',
		    id : 'videoframe',
		    src : url,
		    //width :  width_f,
		    //height : height_f,
		    frameborder: 0,
		    class : 'embed-responsive-item youtube-player',
		    type : 'text/html',
		    allowfullscreen: true
		}).appendTo($midlayer);
	});
	$('#videoModal<?php echo $counterModal; ?>').on('hide.bs.modal', function (e) {
		$('div.modal-body .embed-responsive').html('');
	});
});
</script>
<?php 
	
	
		endif;
	$counter++;
	endwhile;
endif; ?>

