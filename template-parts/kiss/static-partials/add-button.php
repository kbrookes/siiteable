<? if(($addButton['add_button'] == true || $addButton == 1) && $btnHide == false){ ?>
<div class="btn-actions <?= $buttonAlign; ?>">
    <a class="btn-custom <?= $btnClass; ?>" 
    href="<?= $linkContent; ?>" 
    <? if($setLink=='link'):?>target="_blank"<? endif; ?>>
        <?= $linkText; ?>
    </a>
</div>
<? } ?>