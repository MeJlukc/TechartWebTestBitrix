<ul class="<?php echo e($block->elem('list')); ?>">

    <?php
    $isUlOpen = false;
    $previousLevel = 0;
    ?>

    <?php $__currentLoopData = $arResult; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $arItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <?php if($arItem['DEPTH_LEVEL'] == 1): ?>
            
            <?php if($isUlOpen): ?>
                </ul></li>

                <?php
                $isUlOpen = false
                ?>

            <?php elseif($previousLevel == 1): ?>
                </li>

            <?php endif; ?>

            <li 
            class="<?php echo e($block->elem('item')->mod(['active' => $arItem['SELECTED']])); ?>"
            >
                <a class="<?php echo e($block->elem('link')); ?>" href="<?php echo e($arItem['LINK']); ?>">
                    <?php echo e($arItem['TEXT']); ?>

                </a>
                
                <?php if($arItem['IS_PARENT']): ?>
                    <ul class="<?php echo e($block->elem('sub-list')); ?>">

                    <?php
                    $isUlOpen = true
                    ?>

                <?php endif; ?>

        <?php else: ?>
            <li class="<?php echo e($block->elem('sub-item')->mod(['active' => $arItem['SELECTED']])); ?>">
                <a class="<?php echo e($block->elem('sub-link')); ?>" href="<?php echo e($arItem['LINK']); ?>">
                    <?php echo e($arItem["TEXT"]); ?>

                </a>
            </li>
        <?php endif; ?>

        <?php
        $previousLevel = $arItem["DEPTH_LEVEL"]
        ?>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <?php if($isUlOpen): ?>
        </ul></li>
    <?php else: ?>
        </li>
    <?php endif; ?>

</ul><?php /**PATH /var/www/workspace/testBitrix/www/local/templates/galactic/frontend/src/block/common/menu/menu.blade.php ENDPATH**/ ?>