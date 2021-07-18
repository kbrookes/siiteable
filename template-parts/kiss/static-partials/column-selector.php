<?
$colXsRight = 'd-none';
$colXsLeft = 'col-12';
$colSmRight = '';
$colSmLeft = '';
$colMdRight = '';
$colMdLeft = '';
$colLgRight = '';
$colLgLeft = '';
$colXlRight = '';
$colXlLeft = '';
$colClassLeft = '';
$colClassRight = '';


$xsCol = get_field($sepPrefix . '_col_xs');
switch($xsCol){
    case "0":
        $colXsRight = 'd-none';
        $colXsLeft = 'col-12';
        break;
    case "100":
        $colXsRight = 'col-12';
        $colXsLeft = 'col-12';
        break;
    case "50":
        $colXsRight = 'col-6';
        $colXsLeft = 'col-6';
        break;
    case "30":
        $colXsRight = 'col-4';
        $colXsLeft = 'col-8';
        break;
    case "25":
        $colXsRight = 'col-3';
        $colXsLeft = 'col-9';
        break;
    case "20":
        $colXsRight = 'col-2';
        $colXsLeft = 'col-10';
        break;
}

$smCol = get_field($sepPrefix . '_col_sm');
switch($smCol){
    case "0":
        $colSmRight = '';
        $colSmLeft = '';
        break;
    case "100":
        $colSmRight = 'col-sm-12';
        $colSmLeft = 'col-sm-12';
        break;
    case "50":
        $colSmRight = 'col-sm-6';
        $colSmLeft = 'col-sm-6';
        break;
    case "30":
        $colSmRight = 'col-sm-4';
        $colSmLeft = 'col-sm-8';
        break;
    case "25":
        $colSmRight = 'col-sm-3';
        $colSmLeft = 'col-sm-9';
        break;
    case "20":
        $colSmRight = 'col-sm-2';
        $colSmLeft = 'col-sm-10';
        break;
}
if($smCol != "0"){
    $colSmRight = $colSmRight . ' ' . "d-sm-block";
}

$mdCol = get_field($sepPrefix . '_col_md');
switch($mdCol){
    case "0":
        $colMdRight = '';
        $colMdLeft = '';
        break;
    case "100":
        $colMdRight = 'col-md-12';
        $colMdLeft = 'col-md-12';
        break;
    case "50":
        $colMdRight = 'col-md-6';
        $colMdLeft = 'col-md-6';
        break;
    case "30":
        $colMdRight = 'col-md-4';
        $colMdLeft = 'col-md-8';
        break;
    case "25":
        $colMdRight = 'col-md-3';
        $colMdLeft = 'col-md-9';
        break;
    case "25":
        $colMdRight = 'col-md-2';
        $colMdLeft = 'col-md-10';
        break;
}
if($mdCol != "0" && $smCol != "0"){
    $colMdRight = $colMdRight . ' ' . "d-md-block";
}


$lgCol = get_field($sepPrefix . '_col_lg');
switch ($lgCol){
    case "0":
        $colLgRight = '';
        $colLgLeft = '';
        break;
    case "100":
        $colLgRight = 'col-lg-12';
        $colLgLeft = 'col-lg-12';
        break;
    case "50":
        $colLgRight = 'col-lg-6';
        $colLgLeft = 'col-lg-6';
        break;
    case "30":
        $colLgRight = 'col-lg-4';
        $colLgLeft = 'col-lg-8';
        break;
    case "25":
        $colLgRight = 'col-lg-3';
        $colLgLeft = 'col-lg-9';
        break;
    case "25":
        $colLgRight = 'col-lg-2';
        $colLgLeft = 'col-lg-10';
        break;
}

if($mdCol != "0" && $smCol != "0" && $lgCol != "0"){
    $colLgRight = $colLgRight . ' ' . "d-lg-block";
}

$xlCol = get_field($sepPrefix . '_col_xl');
switch ($xlCol){
    case "0":
        $colXlRight = '';
        $colXlLeft = '';
        break;
    case "100":
        $colXlRight = 'col-xl-12';
        $colXlLeft = 'col-xl-12';
        break;
    case "50":
        $colXlRight = 'col-xl-6';
        $colXlLeft = 'col-xl-6';
        break;
    case "30":
        $colXlRight = 'col-xl-4';
        $colXlLeft = 'col-xl-8';
        break;
    case "25":
        $colXlRight = 'col-xl-3';
        $colXlLeft = 'col-xl-9';
        break;
    case "20":
    $colXlRight = 'col-xl-2';
    $colXlLeft = 'col-xl-10';
    break;
}

if($mdCol != "0" && $smCol != "0" && $lgCol != "0" && $xlCol != "0"){
    $colXlRight = $colXlRight . ' ' . "d-xl-block";
}

$colClassLeft = $colXsLeft . ' ' . $colSmLeft . ' ' . $colMdLeft . ' ' . $colLgLeft . ' ' . $colXlLeft;
$colClassRight = $colXsRight . ' ' . $colSmRight . ' ' . $colMdRight . ' ' . $colLgRight . ' ' . $colXlRight;
