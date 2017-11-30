<?php $__env->startSection('title', 'Welcome'); ?>

<?php $__env->startSection('content'); ?>


 <div class="header_wrap">
  <div class="info">
     <div class="container">
         <div class="row">
         
            <div class="col-md-7">
                 <div class="header_info">
                    <div class="descrip">
                        <a href="#">
                        <h1 style="color:#ece705; font-weight: bold; margin-top: 0;">WELCOME</h1>
                          </a> 
                         <p>
                           Let’s welcome ISPHE; the 4th International Seminar on Public Health and Education, Wellbeing Promotion and Technologies: Health, Physical Activity  and Medicine. ISPHE will take place in May 8-9, 2018 held by Universitas Negeri Semarang and co-located with The Wujil Resort & Conventions.
                           </p><br>
                           <div>
                           <p>
                            <a href="#" class="btn btn-danger" >Registration</a>
                             <a href="#" class="btn btn-danger" >Login</a>
                            </p>

                            </div>
                         </div>
                    </div>
                </div>
            </div>
        </div>
  </div>
</div>
 
        <section class="wp-separator">
            <article class="section">
                <div class="container">
                    <div class="row">
                    
                    <div id="myCarousel" class="carousel slide" data-ride="carousel">          

                    <div class="carousel-inner" role="listbox">

                    <ol class="carousel-indicators">
                      <?php $__currentLoopData = $carousels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $carousel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo e($loop->index); ?>" class="<?php echo e($loop->first ? 'active' : ''); ?>"></li>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ol>

                    <div class="carousel-inner" role="listbox">
                            <?php $__currentLoopData = $carousels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $carousel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                               <div class="carousel-item <?php echo e($loop->first ? 'active' : ''); ?>">
                                   <img class="d-block img-fluid img-responsive col-xs-12" src="../img/<?php echo e($carousel->image); ?>" alt="<?php echo e($carousel->title); ?>">
                               </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </div>
                    </div>

                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                          </a>
                          <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                          </a>
                        </div>
                      </div>
                    </div>


                    
                        <!-- End Of Carousel -->


                    </div>
                </div>
            </article>
        </section>

<div class="container-fluid">
        <section class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                <div class="well well-sm wl">
                    
                    <div class="btn-group">
                        <a href="#" id="list" class="btn btn-default btn-sm"><span class="fa fa-th-list">
                        </span> List</a> <a href="#" id="grid" class="btn btn-default btn-sm"><span
                            class="fa fa-th"></span> Grid</a>
                    </div>
                </div>
  
      <div id="grid_post" class="row list-group">
        <?php $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
         <div class="item  col-xs-4 col-lg-4">
            <div class="thumbnail as">
               <img class="group list-group-image" src="../img/<?php echo e($post->image); ?>" alt="" />
                <div class="caption">
                    <div class="c_hr">
                    <h4 class="group inner list-group-item-heading"><a href="<?php echo e(url('posts/'.$post->slug)); ?>"><?php echo e($post->title); ?></a></h4>
                         <small><?php echo e(date('j F Y, h:ia', strtotime($post->published_at))); ?></small> | by <a href="#"><?php echo e($post->author->name); ?></a>

                     </div>
                    <p class="group inner list-group-item-text"><?php echo str_limit($post->body, 50); ?></p>
                    <div class="row"></div>
                </div>
                
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </div><!-- end grid -->
</div>
    <?php echo $__env->make('includes.frontend.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div><!-- end row -->
</div>
        </section>
        <!-- FOOTER --> 
         <div class="text-center">
                <?php echo e($news->render()); ?>

         </div>
        <!-- END FOOTER --> 
</div><!-- end con fluid -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('includes.frontend.head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>