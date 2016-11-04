<head>
    <?php echo $__env->make('layouts.link', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</head>
<body>

<?php if(Session::has('m_info')): ?>
   
    <?php if(Session::get('div_member') == 1): ?>
        <?php echo $__env->make('Main.DesignerMain', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php endif; ?>

    <?php if(Session::get('div_member') == 2): ?>
        <?php echo $__env->make('Main.DeveloperMain', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php endif; ?>

    <?php else: ?>
        <?php echo $__env->make('Main.MainPage', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php endif; ?>

</body>