<?php 
	$faType = get_theme_mod( 'fa_styles');
	$buttonAlign = 'justify-content-start';
	$buttonAlign = $addButton['button_alignment'];
	$linkContent = '';
	$linkType = '';
	$externalLink = false;
	$mailto = false;
	$setLink = 'internal';
	$linkClass = '';
	$linkSubject = '';
	if($addButton['button_options']):
		$buttonData = $addButton['button_options'];
		$linkType = $buttonData['button_link_type'];
		$linkText = $buttonData['button_text_copy'];
		$btnColor = $buttonData['btn_color'];
		$btnSize = $buttonData['button_size'];
		$buttonIcon = $buttonData['button_icon'];
		$buttonIcon = '<i class="' . $faType . ' ' . $buttonIcon . '"></i>';
		$iconAlign = $buttonData['button_icon_placement'];
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
				$linkSubject = $buttonData['button_subject_line'];
				if(!empty($linkSubject)) {
					$linkContent = 'mailto:' . $linkContent . '?subject=' . $linkSubject;
				}
				$mailto = true;
				break;
			case "form":
				$setLink = 'form';
				$linkContent = '';
				$dataTarget = $buttonData['button_popup'];
				break;
			case "file":
				$setLink = 'file';
				$linkContent = $buttonData['button_file'];
				$externalLink = true;
			break;
			case "video":
				$setLink = 'video';
				$linkContent = $buttonData['button_video_id'];
			break;
			case "post":
				$setLink = 'post';
				$linkContent = get_permalink($pageID);
			break;
		}
		$btnClass = $btnSize . ' ' . $btnColor . ' ' . $linkClass;
		if($iconAlign == 'left'):
			$iconLeft = $buttonIcon . ' ';
		elseif($iconAlign == 'right'):
			$iconRight = ' ' . $buttonIcon;
		endif;
		$linkText = $iconLeft . $linkText . $iconRight;
	endif;
	
// Button Options
$btnAddLinks = false;
$btnAddLinks = get_sub_field($sepPrefix . "_links");
if($btnAddLinks = true):
	$btnLinkOpen = '<a class="d-block w-100" href=' . $linkContent . '>';
	$btnLinkClose = '</a>';
else:
	$btnLinkOpen = null;
	$btnLinkClose = null;
endif;

$btnHide = false;
$btnHide = get_sub_field($sepPrefix . "_hide_button");