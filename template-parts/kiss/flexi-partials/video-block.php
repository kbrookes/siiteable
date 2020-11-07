<?php
	
	// GENERAL INIT
	$templatePath = get_template_directory();
	
	// GET THE BOX BACKGROUND COLOUR
	include $templatePath . "/template-parts/kiss/static-partials/box-background-color.php";
	
	$addButton = false;
	if(get_sub_field('cta-button_add_button') == true):
		$addButton = true;
	endif;
	
	$linkContent = '';
	$linkType = '';
	$externalLink = false;
	$mailto = false;
	$setLink = 'internal';
	$linkClass = '';
	if(get_sub_field('cta-button_button_options')):
		$buttonData = get_sub_field('cta-button_button_options');
		$linkType = $buttonData['button_link_type'];
		$linkText = $buttonData['button_text_copy'];
		//$linkType = $linkType['cta_button_link'];
		switch ($linkType) {
			case "page":
				$setLink = 'page';
				$linkContent = $buttonData['button_page_link'];
				break;
			case "link":
				$setLink = 'link';
				$linkContent = $buttonData['button_external_link'];
				$externalLink = true;
				break;
			case "email":
				$setLink = 'email';
				$linkContent = $buttonData['button_email_address'];
				$mailto = true;
				break;
			case "form":
				$setLink = 'form';
				$linkContent = '#';
				$linkClass = $buttonData['button_popup'];
				break;
		}
		
	endif;
	
	/// SEPARATORS INIT
	
	$sepPrefix = 'video';
	$separatorLayout = $templatePath . "/template-parts/kiss/static-partials/separators.php";
	
	include $separatorLayout;
	
	/// VIDEO SETTINGS
	$videoType = '';
	$videoID = '';
	$videoURL = '';
	$videoThumb = '';
	
	if(get_sub_field('embed_video_type')):
		$videoType = get_sub_field('embed_video_type');
	endif;
	
	$videoID = get_sub_field('embed_video_id');
	
	if($videoType == 'youtube'):
		$videoURL = 'https://www.youtube.com/embed/' . $videoID;
	elseif($videoType == 'vimeo'):
		$videoURL = 'https://player.vimeo.com/video/' . $videoID;
	endif;
	
	if(get_sub_field('embed_video_thumb') == 'Yes'):
		$videoThumb = get_sub_field('embed_add_poster_image');
	endif;
	
?>
<section id="videoBlock" class="video-block <?php echo $bgcolour . ' ' . $separatorClasses; ?>">
	<?php if($addSeparatorUpper == true):
		include $pathUpper;
	endif; ?>
	<div class="video-wrap flexi-inner">
		<div class="container">
			<div class="video-wrap__inner text-center">
				<?php if(get_sub_field('video_block_title')):?>
				<h2><?php the_sub_field('video_block_title'); ?></h2>
				<?php endif; ?>
				<div class="embed-responsive embed-responsive-16by9" id="videoContainer">
					<?php if($videoType == 'youtube'):?>
					<div class="embed-responsive-item" id="videoPlayer<?php echo $videoID; ?>"></div>
					<?php else: ?>
					<iframe class="embed-responsive-item" id="vimeoPlayer" src="<?php echo $videoURL; ?>"></iframe>
					<?php endif; ?>
				</div>
				<?php if($addButton){ ?>
				<div class="list-icons__actions">
					<a class="btn-custom <?php echo $btnColour; ?> <?php if($setLink=='form'): echo $linkClass; endif; ?>" href="<?php if($setLink=='email'):?>mailto:<?php endif; ?><?php echo $linkContent; ?>" <?php if($setLink=='link'):?>target="_blank"<?php endif; ?>><?php if($linkText){ echo $linkText; } else { ?>LEARN HOW<?php } ?></a>
				</div>
				<?php } ?>	
			</div>
		</div>
	</div>
	<?php if($addSeparatorLower == true):
		include $pathLower;
	endif; ?>
</section>

<?php if($videoType == 'youtube'):?>
<script>
	/// IF USING YOUTUBE, USE THE API
	function onYouTubeIframeAPIReady() {
	  var player;
	  player = new YT.Player('videoPlayer<?php echo $videoID; ?>', {
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
	              var videoHolder = document.getElementById('videoContainer');
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
</script>
<script async src="https://www.youtube.com/iframe_api"></script>
<?php endif; ?>