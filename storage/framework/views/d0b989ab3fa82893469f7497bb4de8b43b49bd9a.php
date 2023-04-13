
<?php $__env->startSection('content'); ?>
    <div class="container">


        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    المستشفيات

                </div>

                <br>

                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">name</th>
                        <th scope="col">address</th>
                        <th scope="col">الاجراءات</th>
                    </tr>
                    </thead>
                    <tbody>


                    <?php if(isset($hospitals) && $hospitals -> count() > 0 ): ?>
                        <?php $__currentLoopData = $hospitals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hospital): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <th scope="row"><?php echo e($hospital -> id); ?></th>
                            <td><?php echo e($hospital -> name); ?></td>
                            <td><?php echo $hospital -> address; ?></td>
                            <td>
                                <a href="<?php echo e(route('hospital.doctors',$hospital -> id)); ?>" class="btn btn-success"> عرض الاطباء</a>
                               <a href="<?php echo e(route('hospital.delete',$hospital -> id)); ?>" class="btn btn-danger">حذف</a>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>

                    </tbody>
                </table>


            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\web\resources\views/doctors/hospitals.blade.php ENDPATH**/ ?>