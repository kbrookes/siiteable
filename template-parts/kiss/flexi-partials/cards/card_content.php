<?

if($titlePos == false):
    if(!empty($title)):
        echo $title;
    endif;
    if(!empty($subTitle)):
        echo $subTitle;
    endif;
endif; ?>
<? if(!empty($cardContent)){?>
<div class="<?= $contentTextClass; ?>">
    <?= $cardContent; ?>
</div>
<? }

