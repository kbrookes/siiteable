<? if($addButton['add_button'] == true || $addButton == 1){ ?>
<div class="btn-actions <?= $buttonAlign; ?>">
    <a class="btn-custom <?= $btnClass; ?>" 
    href="<? if($setLink=='email'):?>mailto:<? endif; ?><?= $linkContent; ?>" 
    <? if($setLink=='link'):?>target="_blank"<? endif; ?>>
        <?= $linkText; ?>
    </a>
</div>
<? } ?>