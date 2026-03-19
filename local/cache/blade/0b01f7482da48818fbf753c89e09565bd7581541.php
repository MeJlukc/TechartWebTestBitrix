<header class="<?php echo e($block); ?>">

    <a href="/" class="<?php echo e($block->elem('logo')); ?>">
        <img
        class="<?php echo e($block->elem('logo_image')); ?>"
        src="<?=SITE_TEMPLATE_PATH?>/images/logo.svg" alt="Logo"
        >
        <p class="<?php echo e($block->elem('logo__title')); ?>">
            Галактический<br>
            вестник
        </p>
    </a>

    <nav class="<?php echo e($block->elem('navigation')); ?>">
        <?php echo $menu; ?>

    </nav>

    <div class="<?php echo e($block->elem('auth-field')); ?>">
        <?php echo $auth; ?>

    </div>

</header><?php /**PATH /var/www/workspace/testBitrix/www/local/templates/galactic/frontend/src/block/common/header/header.blade.php ENDPATH**/ ?>