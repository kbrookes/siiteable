<?

if($btnAddLinks == true):
    $btnLinkOpen = '<a class="d-block w-100 array" href=' . $linkContent . '>';
    $btnLinkClose = '</a>';
else:
    $btnLinkOpen = null;
    $btnLinkClose = null;
endif;