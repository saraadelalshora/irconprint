<?php $__env->startSection('content'); ?>
<section id="page-title" class="page-title bg-overlay bg-overlay-dark bg-parallax">
        <div class="bg-section">
            <img src="<?php echo e(asset('/')); ?>/assetfront/images/sliders/slide-bg/8.jpg" alt="Background"/>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-8 offset-lg-2">
                    <div class="title title-6 text-center">
                        <div class="title--heading">
                            <h1><?php echo app('translator')->getFromJson('massege.contact'); ?></h1>
                        </div>
                        <div class="clearfix"></div>
                        <ol class="breadcrumb d-flex justify-content-center">
                            <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>"><?php echo app('translator')->getFromJson('massege.home'); ?></a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?php echo app('translator')->getFromJson('massege.contact'); ?></li>
                        </ol>
                    </div><!-- .title end -->
                </div><!-- .col-md-12 end -->
            </div><!-- .row end -->
        </div><!-- .container end -->
    </section><!-- #page-title end -->
   <!-- Google maps
    ============================================= -->
<section class="google-maps pb-0 pt-0 mapsection">
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDtaIwmepScDMmCOqr7-WszNY0HU4uwhdY&libraries=places&callback=initAutocomplete" async defer></script>  
                  <div id="googleMap" class="googleMap" data-map-address="121 King St,Melbourne, Australia" data-map-zoom="12" data-map-maker-icon="images/gmap/maker.png" data-map-type="ROADMAP" data-map-info="Consultivo<br>info@7oroof.com" style="width:100%;height:490px;">
            </div>
      
</section>

<!-- Contact #1
============================================= -->

<section id="contact1" class="contact contact-1 pt-110 pb-110 text-center">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-6 offset-lg-3">
                    <div class="heading heading-2 mb-50 text--center">
                        <p class="heading--subtitle">Have A Question?</p>
                        <h2 class="heading--title">Get in touch</h2>
                        <p class="heading--desc mb-0">We understand the importance of approaching each work integrally and believe in the power of simple and easy communication.</p>
                    </div>
                </div>
                <!-- .col-lg-6 end -->
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-10 offset-lg-1">
                <form action="<?php echo e(route('contactus.store')); ?>" method="POST">
                                    <?php echo e(csrf_field()); ?>

                        <div class="row">
                            <div class="col-sm-12 col-md-4 col-lg-4">
                                 <input type="text"  name="fname" class="form-control" placeholder="<?php echo app('translator')->getFromJson('massege.fname'); ?>" />
                            </div>
                            <div class="col-sm-12 col-md-4 col-lg-4">
                                 <input type="text" name="lname" class="form-control" placeholder="<?php echo app('translator')->getFromJson('massege.lname'); ?>" />
                            </div>
                            <div class="col-sm-12 col-md-4 col-lg-4">
                                 <input type="text"  name="email"class="form-control" placeholder="<?php echo app('translator')->getFromJson('massege.email'); ?>" />
                            </div>
                        </div>
                        <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                                 <textarea class="form-control" name="massege" style="height: auto;" rows="5" placeholder="<?php echo app('translator')->getFromJson('massege.massege'); ?>"></textarea>
                            </div>
                        </div>
                        <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <input type="submit" value="Submit Request" name="submit" class="btn btn--primary">
                        </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <div class="contact-result"></div>
                            </div>
                        </div>
                    </form>
                    <!-- form end -->
                </div>
            </div>
            <!-- .row end -->
        </div>
        <!-- .container end -->
    </section>
<!-- #contact1 end -->


  <!-- Contact Info
    ============================================= -->
    <section id="contactInfo" class="contact contact-info bg-white text--center pt-90 pb-90">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <div class="contact--info">
                        <h3><?php echo e(trans('massege.address')); ?></h3>
                        <p><?php echo e($setting->address); ?></p>
                        <a class="link--styled" href="#mapsection"><?php echo app('translator')->getFromJson('massege.Get Directions'); ?></a>
                    </div>
                </div>
                <!-- .col-lg-4 end -->
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <div class="contact--info">
                        <h3><?php echo e(trans('massege.email')); ?></h3>
                        <p><?php echo e($setting->email); ?></p>
                        <a class="link--styled" href="mailto:<?php echo e($setting->email); ?>"><?php echo app('translator')->getFromJson('massege.Send a Message'); ?></a>
                    </div>
                </div>
                <!-- .col-lg-4 end -->
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <div class="contact--info">
                        <h3><?php echo e(trans('massege.phone')); ?></h3>
                        <p><?php echo e($setting->phone); ?></p>
                        <a class="link--styled" href="tel:<?php echo e($setting->phone); ?>"><?php echo app('translator')->getFromJson('massege.Waiting Your Call'); ?></a>
                    </div>
                </div>
                <!-- .col-lg-4 end -->
            </div>
            <!-- .row end -->
        </div>
        <!-- .container end -->
    </section>
    <!-- #contactInfo end -->
    

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>