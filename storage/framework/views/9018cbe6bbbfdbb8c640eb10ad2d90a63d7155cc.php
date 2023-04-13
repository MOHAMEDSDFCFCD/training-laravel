
<?php $__env->startSection('content'); ?>
    <div class="container">


        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    الاطباء

                </div>

                <br>

                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">name</th>
                        <th scope="col">title</th>
                        <th scope="col">operation</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php if(isset($doctors) && $doctors -> count() > 0 ): ?>
                        <?php $__currentLoopData = $doctors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doctor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <th scope="row"><?php echo e($doctor -> id); ?></th>
                                <td><?php echo e($doctor -> name); ?></td>
                                <td><?php echo e($doctor -> title); ?></td>
                             <td><a href="<?php echo e(route('doctors.services',$doctor -> id)); ?>" class="btn btn-success">عرض الخدمات </a></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>

                    </tbody>
                </table>


            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\web\resources\views/doctors/doctors.blade.php ENDPATH**/ ?>