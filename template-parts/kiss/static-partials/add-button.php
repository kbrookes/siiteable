<? if(($addButton['add_button'] == true || $addButton == 1) && $btnHide == false){ ?>
<div class="btn-actions <?= $buttonAlign; ?>">
    <? if($buttonSecondary == true): ?>
    <a class="btn-custom <?= $btnClass2; ?>" 
    href="<?= $linkContent2; ?>" 
    <? if($setLink2=='link'):?>target="_blank"<? endif; ?>>
        <?= $linkText2; ?>
    </a>
    <? endif; ?>
    <a class="btn-custom <?= $btnClass; ?>" 
    href="<?= $linkContent; ?>" 
    <? if($setLink=='link'):?>target="_blank"<? endif; ?>>
        <?= $linkText; ?>
    </a>
</div>
<? } ?>