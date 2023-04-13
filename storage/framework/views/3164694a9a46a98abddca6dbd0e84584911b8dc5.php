
<?php $__env->startSection('content'); ?>
    <div class="container">


        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    ألخدمات

                </div>

                <br>

                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">name</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php if(isset($services) && $services -> count() > 0 ): ?>
                        <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <th scope="row"><?php echo e($service -> id); ?></th>
                                <td><?php echo e($service -> name); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>

                    </tbody>
                </table>
             
                <br><br>
                
                <form method="POST" action="<?php echo e(route('save.doctors.services')); ?>">
                    <?php echo csrf_field(); ?>
                    

                 
                    <div class="form-group">
                        <label for="exampleInputEmail1">أحتر طبيب</label>
                        <select class="form-control" name="doctor_id" >
                            <?php $__currentLoopData = $doctors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doctor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($doctor -> id); ?>"><?php echo e($doctor -> name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>

                    </div>


                    <div class="form-group">
                        <label for="exampleInputEmail1">أختر الخدمات </label>

                        <select class="form-control" name="servicesIds[]" multiple>
                            <?php $__currentLoopData = $allServices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $allService): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($allService -> id); ?>"><?php echo e($allService -> name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>

                    </div>

                    <button type="submit" class="btn btn-primary">save</button>
                </form>

                  
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\web\resources\views/doctors/services.blade.php ENDPATH**/ ?>