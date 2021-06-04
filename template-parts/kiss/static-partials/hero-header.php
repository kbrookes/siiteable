<? 
	
	$page_id = get_queried_object_id();
	$blogID = get_option( 'page_for_posts' );
	$isBlogPage = false;
	if($blogID == $page_id){
		$isBlogPage = true;
	} else {
		$isBlogPage = false;
	}
	
	/// SEPARATORS INIT
	$postType = get_post_type();
	$sepPrefix = 'hero';
	$templatePath = get_template_directory();
	$templatePartials = $templatePath . '/template-parts/kiss/static-partials/';
	
	/// TEXT CONTROLS
	include $templatePartials . 'text-controls.php';
	
	//// CUSTOMIZER OPTIONS
	$heroHeight = get_theme_mod( 'hero_header_height', 0 );
	if($isBlogPage){
		$heroHeightOverride = get_field('override_height', 'options');
	} else {
		$heroHeightOverride = get_field($sepPrefix . '_override_height');
	}
	// Override on a per-post basis
	if($heroHeightOverride == "false"):
		$heroHeight = get_theme_mod( 'hero_header_height', 0 );
	else:
		$heroHeight = $heroHeightOverride;
	endif;
	
	$heroAlignment = 'align-items-center';
	$heroAlignOverride = get_field($sepPrefix . '_override_vertical');
	if($heroAlignOverride == "false"):
		$heroAlignment = get_theme_mod( 'hero_vertical_alignment', 0 );
	else:
		$heroAlignment = $heroAlignOverride;
	endif;
	
	$heroTextColor = 'text-white';
	$heroTextColor = get_theme_mod( 'hero_text_color', 0 );
	
	$heroH1Size = 'font-md';
	$heroH1Size = get_theme_mod( 'hero_h1_size', 0 );
	
	if($titleTextClassG == 'default default default text-left'):
		$titleTextClassG = $heroTextColor . ' ' . $heroH1Size;
	endif;
	
	$colWidth = 'w-75';
	$colWidth = get_theme_mod('header_content_width', 0 );
	
	$contentSize = 'text-md';
	$contentSize = get_theme_mod('hero_header_content_size', 0);
	
	if(empty($introTextClassG)) {
		$introTextClassG  = $contentSize . ' ' . $heroTextColor;
	}
	
	$paddingY = 'py-0';
	$paddingY = get_theme_mod('hero_padding', 0);
	
	$heroDevice = '';
	if( get_theme_mod( 'siiteable_device_hero', '' ) != '' ):
		$heroDevice = get_theme_mod( 'siiteable_device_hero', 0 );
	endif;
	
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
		$heroBG = get_field('hero_background_colour');
	endif;
	
	
	$hasOverlay = false;
	if(get_field($sepPrefix . '_overlay_add_overlay') == true):
		include $templatePartials . "overlay-partial.php";
	endif;
	
	include $templatePartials . "column-selector.php";
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
	if(get_the_archive_title() == 'Archives'):
		$isArchives = true;
	endif;
	
	
	if($postType == 'post' && $isArchives == true && (is_singular() != true)) {
		$heroImage = get_field('hero_image_news', 'options');
	} elseif(get_field('hero_image')){
		$heroImage = get_field('hero_image');
	} elseif(get_the_post_thumbnail_url($page_id) != '') { 
		$heroImage = get_the_post_thumbnail_url($page_id);
	}
	
	$pageTitle = single_post_title('', FALSE);
	if(get_post_meta( get_the_ID(), 'hero_title', true )):
		$heroTitle = get_post_meta( get_the_ID(), 'hero_title', true );
	else:
		$heroTitle = $pageTitle;
	endif;
	
	$titleLocation = 'hero';
	if($postType == 'post' && $isArchives == true && (is_singular() == true)) {
		$titleLocation = get_field('post_title_location', 'options');	
	}
	
	$heroContent = get_post_meta( get_the_ID(), 'hero_content', true );
	
	$heroTopImage = get_field('hero_content_image');
	
	$faType = get_theme_mod( 'fa_styles');
	
	
	if($heroTitle || $heroImage || $heroContent)	:?>
<section id="heroHeader" class="hero-header  <? echo $separatorClasses . ' ' . $heroHeight; ?> <? if($heroBG): echo $heroBG; endif; ?> <? if($heroType == 'video'):?>video-hero video-type__<? echo $videoType; ?><? endif; ?>">
	<div class="hero-header__wrap <? echo $overlayClass; ?>" <? if($heroImage):?>style="background-image:url(<? echo $heroImage; ?>)"<? endif; ?>>
		<? if($heroType == 'video'):
			if($videoType == 'local'):?>
		<video class="video-hero__background lazy" poster="<? echo $heroVideoPoster; ?>" autoplay loop muted playsinline type="video/mpeg">
			<source src="<? echo $videoURL; ?>" type="video/mp4" />
		</video>
			<? endif; ?>
			<? if($videoType == 'youtube'):?>
		<div class="video-background">
			<div class="video-foreground" id="YouTubeBackgroundVideoPlayer">
		    </div>
		</div>
			<? endif; ?>
			<? if($videoType == 'vimeo'):?>
		<div class="video-hero__background">
			<iframe class="video-hero__foreground" width="x" height="y" src="<? echo $videoURL; ?>" frameborder="0">
			</iframe>
		</div>
			<? endif; ?>
		<? endif; ?>
		<div class="container <?= $heroAlignment . ' ' . $paddingY; ?>">
			<div class="hero-header__wrap-inner">
				<div class="hero-header__content">
					<div class="row">
						<div class="<?= $colClassLeft; ?>">
							<? if(!empty($heroTitle)): ?>
							<h1 class="<?= $titleTextClassG; ?>"><?= $heroTitle; ?></h1>
							<? endif; ?>
							<div class="<?= $introTextClassG; ?> mb-4">
							<?= apply_filters('the_content', $heroContent); ?>
							</div>
						</div>
						<div class="<?= $colClassRight; ?>">
							<? if(!empty($heroTopImage)): ?>
							<img src="<?= $heroTopImage['url']; ?>" alt="<?= $heroTopImage['alt'];?>" class="w-full" />
							<? endif; ?>
						</div>
					</div>
				</div>
				<div class="hero_header__content-actions">
					<? if( have_rows('header_multi_buttons') ): 
						$counter = 1;
					?>
					<? endif; ?>
					<? while( have_rows('header_multi_buttons') ): the_row();
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
							$btnColor = $buttonOptions['btn_color'];
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
						
						
					<? if($setLink){ ?>
						<a class="btn-custom <?= $btnColor; ?> <? if($counter > 1):?>ml-4<? endif; ?> <? if($setLink=='form'): echo $linkClass; endif; ?>" href="<? if($setLink=='email'):?>mailto:<? endif; ?><? echo $linkContent; ?>" <? if($setLink=='external'):?>target="_blank"<? endif; ?> <? if($linkType == 'video'):?>data-toggle="modal" data-target="#videoModal<? echo $counter;?>" data-youtubeid="<? echo $videoIDButton; ?>"<? endif; ?>><? echo $buttonCopy; ?></a>
					<? } 
						$counter++;
						endwhile; ?>
				</div>
			</div>
		</div>
		<? if(!empty($heroDevice)){?>
		<div class="hero-header__icon">
			<img src="<?= $heroDevice; ?>" class="style-svg img-fluid" alt="hero brand device" />
		</div>
		<? } ?>
	</div>
	<? if($addSeparatorLower == true):
		include $pathLower;
	endif; ?>
</section>
<? endif; ?>
<script>
    /// ADD HERO CLASS TO BODY TO DYNAMICALLY CHANGE PADDING
    (function($) {
	    $('body').addClass('hasHero')
	    $('body').removeClass('noHero');
	})(jQuery);
	
	<? if($heroType == 'video' && $videoType == 'youtube'):?>
	/// IF USING YOUTUBE, USE THE API
	function onYouTubeIframeAPIReady() {
	  var player;
	  player = new YT.Player('YouTubeBackgroundVideoPlayer', {
	      videoId: '<? echo $videoID; ?>', // YouTube Video ID
	      width: 1280,               // Player width (in px)
	      height: 720,              // Player height (in px)
	      playerVars: {
	        playlist: '<? echo $videoID; ?>',
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
	<? endif; ?>
</script>
<? if($heroType == 'video' && $videoType == 'youtube'):?>
<script async src="https://www.youtube.com/iframe_api"></script>
<? endif; ?>

<? if( have_rows('header_multi_buttons') ): 
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
<div class="modal fade" id="videoModal<? echo $counterModal; ?>" tabindex="-1" role="dialog" aria-labelledby="videoModalLabel" aria-hidden="true">
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
	$('#videoModal<? echo $counterModal; ?>').on('show.bs.modal', function (event) {
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
	$('#videoModal<? echo $counterModal; ?>').on('hide.bs.modal', function (e) {
		$('div.modal-body .embed-responsive').html('');
	});
});
</script>
<? 
	
	
		endif;
	$counter++;
	endwhile;
endif; ?>

