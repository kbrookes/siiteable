<?php

/**
 * Testimonial Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'vidModal-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'vidModal';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

// Load values and assign defaults.
$vidLink = '';
$vidID = get_field('video_id') ?: 'Enter your video ID';
$vidBrand = get_field('youtube_or_vimeo') ?: 'Choose video provider';
$baseURL = '';
$vidBg = '';

if($vidBrand == 'youtube') {
	$baseURL = 'https://www.youtube.com/embed/';
} elseif($vidBrand == 'vimeo') {
	$baseURL = 'https://player.vimeo.com/video/';
}


$vidLink = $baseURL . $vidID;


$vidBg = get_field('video_custom_image');
if($vidBg == false) {
	if($vidBrand == 'youtube') {
		$vidBg = 'http://i3.ytimg.com/vi/' . $vidID . '/maxresdefault.jpg';
	} elseif($vidBrand == 'vimeo') {
	    $data = json_decode( file_get_contents( 'http://vimeo.com/api/oembed.json?url=' . $vidLink ) );
	    if( !$data ) return false;
	    $vidBg = $data->thumbnail_url;
	}
}

?>


<div id="<?php echo esc_attr($id); ?>" class="video-block <?php echo esc_attr($className); ?> style-widescreen">
	<a class="video-btn" href="#postModal" class="nav-link" data-src="<?php echo $vidLink; ?>" data-toggle="modal" data-target="#postModal">
		<div class=" image-box style-widescreen " style="background-image: url(<?php echo $vidBg; ?>);">
			<div class="post-thumbnail__inner image-box__inner">
				<span class="image-box__icon"><i class="fad fa-play-circle"></i></span>
			</div>
		</div>
	</a>
</div>