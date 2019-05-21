<?php if($breadcrumbs): ?>
    <ul class="breadcrumb">
        <?php foreach($breadcrumbs as $breadcrumb): ?>
            <?php if(!$breadcrumb->last): ?>
                <li><a href="<?php echo e($breadcrumb->url); ?>"><?php echo e($breadcrumb->title); ?></a></li>
            <?php else: ?>
                <li class="active"><?php echo e($breadcrumb->title); ?></li>
            <?php endif; ?>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>