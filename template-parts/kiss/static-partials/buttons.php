<?php 
$addButton = true;
// ALGINMENT
$buttonAlign = 'justify-content-start';
$buttonAlign = get_sub_field($sepPrefix . '_button_button_alignment');
// CONTENT
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
	$buttonShadow = $buttonData['button_shadow_shadow_select'];
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
	$btnClass = $btnSize . ' ' . $btnColor . ' ' . $linkClass . ' ' . $buttonShadow;
endif;
	
$buttonSecondary = false;
$buttonSecondary = get_sub_field($sepPrefix . '_button_add_button_secondary');
// CONTENT SECONDARY
$linkContent2 = '';
$linkType2 = '';
$externalLink2 = false;
$mailto2 = false;
$linkText2 = 'VIEW MORE';
$setLink2 = 'internal';
$linkClass2 = '';
$linkSubject2 = '';

if(get_sub_field($sepPrefix . '_button_button_options_secondary')):
$buttonData2 = get_sub_field($sepPrefix . '_button_button_options_secondary');
$linkType2 = $buttonData2['button_link_type'];
$linkText2 = $buttonData2['button_text_copy'];
$btnColor2 = $buttonData2['btn_color'];
$btnSize2 = $buttonData2['button_size'];
$buttonShadow2 = $buttonData2['button_shadow_shadow_select'];
//$linkType = $linkType['cta_button_link'];
switch ($linkType2) {
	case "page":
		$setLink2 = 'page';
		$linkContent2 = $buttonData2['button_page_link'];
		break;
	case "link":
		$setLink2 = 'link';
		$linkContent2 = $buttonData2['button_external_link'];
		$externalLink2 = true;
		break;
	case "email":
		$setLink2 = 'email';
		$linkContent2 = $buttonData2['button_email_address'];
		$linkSubject2 = $buttonData2['button_subject_line'];
		if(!empty($linkSubject2)) {
			$linkContent2 = 'mailto:' . $linkContent2 . '?subject=' . $linkSubject2;
		}
		$mailto2 = true;
		break;
	case "form":
		$setLink2 = 'form';
		$linkContent2 = '';
		$dataTarget2 = $buttonData2['button_popup'];
		break;
	case "file":
		$setLink2 = 'file';
		$linkContent2 = $buttonData2['button_file'];
		$externalLink2 = true;
	break;
	case "video":
		$setLink2 = 'video';
		$linkContent2 = $buttonData2['button_video_id'];
	break;
}
$btnClass2 = $btnSize2 . ' ' . $btnColor2 . ' ' . $linkClass2 . ' ' . $buttonShadow2;
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