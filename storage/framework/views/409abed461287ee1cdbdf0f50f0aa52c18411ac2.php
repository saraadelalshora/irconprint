<?php $__env->startSection('content'); ?>
       

                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor"> المعرض</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                        <a href="<?php echo e(route('Slider.create')); ?>"><button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> إضافة جديد</button></a>
                         
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                                <div class="card-header">
                                        <h4 class="card-title m-b-0"> المعرض  </h4>
                                </div>
                            <div class="card-body">
                                
                                <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                        <th data-field="state" data-checkbox="true"></th>
                                        <th data-field="name">أسم السلايدر </th>
                                            <th data-field="name">وصف قصير الصورة</th>                                
                                            <th data-field="status">الصورة</th>
                                            <th data-field="status">الحالة</th>
                                            <th data-field="edit">تعديل</th>
                                        </tr>
                                    </thead>
                                    <tbody >
                                 
                                        <?php $__currentLoopData = $all; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                     
                                        <tr>
                                            <td data-field="state" data-checkbox="true"></td>
                                            <td data-field="name"><?php echo e($value->title_ar); ?></td>
                                            <td data-field="status"><?php echo e($value->short_desc_ar); ?></td>
                                            
                                            <?php if($value->img): ?>
                                            <td data-field="status">
                                                <img src="<?php echo e(asset($value->img)); ?>"  width="80" >
                                                </td>
                                                <?php else: ?>
                                                <td data-field="status">
                                                </td>
                                                <?php endif; ?>
                                           
                                            
                                            <td data-field="status"><?php if($value->status == 1): ?> مفعل <?php else: ?> غير مفعل <?php endif; ?></td>
                        
                                            <td data-field="edit"><button type="button" class="btn btn-sm btn-success btn-rounded m-l-15" ><i class="fa fa-check"></i><a href="<?php echo e(route('Slider.edit',$value->id)); ?>" style="color: #ffffff;"> تعديل</a></button>
                                            <form  action="<?php echo e(route('Slider.destroy',$value->id)); ?>"  style="display: inline;"  method="POST" accept-charset="utf-8">
                                                <?php echo e(csrf_field()); ?>

                                                <?php echo e(method_field('DELETE')); ?>

                        
                                            <button  class="btn btn-sm btn-danger btn-rounded m-l-15" type="submit" onclick="return confirm('هل تريد الحذف')"><i class="fa fa-times"></i> حذف</button>
                                             </form>
                                        </td>
                                        </tr>
                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                              
                            </div>
                        </div>
                    </div>
                </div>
               


                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>