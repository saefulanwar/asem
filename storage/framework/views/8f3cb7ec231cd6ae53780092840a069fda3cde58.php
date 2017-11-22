            <?php if($status): ?>
            <div class="box-body">
              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Abstract File</b> <a href="/img/abstract/<?php echo e($file); ?>" class="btn btn-md btn-link pull-right" target="_blank"><?php echo e($file); ?></a>
                </li>
                <li class="list-group-item">
                  <b>State</b> <a class="btn btn-xs btn-warning pull-right">Pending</a>
                </li>
              </ul>
            </div>
            <hr>
              <?php endif; ?>

            <!-- form start -->
              <?php echo Form::open(['url' => '/backend/home/uploadAbstract',
                              'method'=>'post',
                              'class'=>'form-horizontal',
                              'files'=>TRUE]); ?>

              <div class="box-body">
                
                <div class="form-group <?php echo $errors->has('email') ? 'has-error' : ''; ?>">
                <?php echo Form::label('participant', 'Speaker Name', ['class' => 'col-sm-3 control-label']); ?>

                  <div class="col-sm-9">
                    <?php echo Form::text('participant', Auth::user()->name, ['class'=>'form-control','disabled'=>true]); ?>

                  </div>
                </div>
                <div class="form-group <?php echo $errors->has('title') ? 'has-error' : ''; ?>">
                <?php echo Form::label('title', 'Title', ['class' => 'col-sm-3 control-label']); ?>

                  <div class="col-sm-9">
                    <?php echo Form::text('title', null, ['class'=>'form-control']); ?>

                  </div>
                </div>
                 <div class="form-group <?php echo $errors->has('category') ? 'has-error' : ''; ?>">
                <?php echo Form::label('category', 'Category', ['class' => 'col-sm-3 control-label']); ?>

                  <div class="col-sm-9">
                    <?php echo Form::select('category',App\Models\PaperStatus::pluck('name','id') , null, ['class'=>'form-control','placeholder'=>'Choose Category']); ?>

                  </div>
                </div>
                <div class="form-group <?php echo $errors->has('presentation') ? 'has-error' : ''; ?>">
                <?php echo Form::label('presentation', 'Presentation', ['class' => 'col-sm-3 control-label']); ?>

                  <div class="col-sm-9">
                    <?php echo Form::select('presentation',App\Models\Presentation::pluck('name','id') , null, ['class'=>'form-control','placeholder'=>'Choose Presentation']); ?>

                  </div>
                </div>
                <div class="form-group <?php echo $errors->has('file') ? 'has-error' : ''; ?>">
                <?php echo Form::label('file', 'Abstract File', ['class' => 'col-sm-3 control-label']); ?>

                  <div class="col-sm-9">
                    <?php echo Form::file('file', null, ['class'=>'form-control']); ?>

                    <?php echo $errors->first('file', '<p class="help-block">:message</p>'); ?>

                  </div>
                </div>

              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-default">Cancel</button>
                <?php echo Form::button('Lanjut <i class="fa fa-arrow-right"></i>', array('type' => 'submit', 'class' => 'btn btn-primary pull-right')); ?>

              </div>
              <!-- /.box-footer -->
              <?php echo Form::close(); ?>

