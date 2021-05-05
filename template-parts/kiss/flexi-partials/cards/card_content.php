<?

if($titlePos == false):
    echo $title;
    echo $subTitle;
endif; ?>
<? if(!empty($cardContent)){?>
<div class="<?= $contentTextClass; ?>">
    <?= wpautop($cardContent); ?>
</div>
<? }

