<?php 
	
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
		$btnClass = $btnSize . ' ' . $btnColor;
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
					$linkContent = $linkContent . '?subject=' . $linkSubject;
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
		
	endif;