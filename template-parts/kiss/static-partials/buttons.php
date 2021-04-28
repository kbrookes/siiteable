<?php 
	$addButton = true;
	$buttonAlign = 'text-left';
	$buttonAlign = 'text-' . get_sub_field($sepPrefix . '_button_alignment');
	$linkContent = '';
	$linkType = '';
	$externalLink = false;
	$mailto = false;
	$linkText = 'VIEW MORE';
	$setLink = 'internal';
	$linkClass = '';
	$linkSubject = '';
	if(get_sub_field($sepPrefix . '_button_button_options')):
		$buttonData = get_sub_field($sepPrefix . '_button_button_options');
		$linkType = $buttonData['button_link_type'];
		$linkText = $buttonData['button_text_copy'];
		$btnColor = $buttonData['btn_color'];
		$btnSize = $buttonData['button_size'];
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
		}
		$btnClass = $btnSize . ' ' . $btnColor . ' ' . $linkClass;
	endif;
	
// Button Options
$btnAddLinks = false;
$btnAddLinks = get_sub_field($sepPrefix . "_links");
if($btnAddLinks == true):
	$btnLinkOpen = '<a href=' . $linkContent . '>';
	$btnLinkClose = '</a>';
else:
	$btnLinkOpen = null;
	$btnLinkClose = null;
endif;

$btnHide = false;
$btnHide = get_sub_field($sepPrefix . "_hide_button");