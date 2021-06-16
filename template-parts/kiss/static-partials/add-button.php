<? if(($addButton['add_button'] == true || $addButton == 1) && $btnHide == false){ ?>
<div class="btn-actions align-items-center <?= $buttonAlign; ?><? if($buttonSecondary == true): ?> btn-count__2<? endif; ?>">
    <a class="btn-custom btn-custom__first <?= $btnClass; ?> order-last order-md-first d-block d-md-inline-block" 
    href="<?= $linkContent; ?>" 
    <? if($setLink=='link'):?>target="_blank"<? endif; ?>>
        <?= $linkText; ?>
    </a>
    <? if($buttonSecondary == true): ?>
    <span class="btn-separator <?= $buttonPadding; ?>">OR</span>
    <a class="btn-custom btn-custom__second <?= $btnClass2; ?> order-first order-md-last d-block d-md-inline-block" 
    href="<?= $linkContent2; ?>" 
    <? if($setLink2=='link'):?>target="_blank"<? endif; ?>>
        <?= $linkText2; ?>
    </a>
    <? endif; ?>
</div>
<? } ?>