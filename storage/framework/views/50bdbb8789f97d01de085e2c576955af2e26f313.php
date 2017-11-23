<div class="col-xs-9">
  <div class="box">
    <div class="box-body ">

        <div class="form-group <?php echo e($errors->has('title') ? 'has-error' : ''); ?>">
            <?php echo Form::label('title'); ?>

            <?php echo Form::text('title', null, ['class' => 'form-control']); ?>


            <?php if($errors->has('title')): ?>
                <span class="help-block"><?php echo e($errors->first('title')); ?></span>
            <?php endif; ?>
        </div>
        <div class="form-group <?php echo e($errors->has('slug') ? 'has-error' : ''); ?>">
            <?php echo Form::label('slug'); ?>

            <?php echo Form::text('slug', null, ['class' => 'form-control']); ?>


            <?php if($errors->has('slug')): ?>
                <span class="help-block"><?php echo e($errors->first('slug')); ?></span>
            <?php endif; ?>
        </div>
        <div class="form-group excerpt">
            <?php echo Form::label('excerpt'); ?>

            <?php echo Form::textarea('excerpt', null, ['class' => 'form-control']); ?>

        </div>
        <div class="form-group <?php echo e($errors->has('body') ? 'has-error' : ''); ?>">
            <?php echo Form::label('body'); ?>

            <?php echo Form::textarea('body', null, ['class' => 'form-control']); ?>


            <?php if($errors->has('body')): ?>
                <span class="help-block"><?php echo e($errors->first('body')); ?></span>
            <?php endif; ?>
        </div>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
</div>

<div class="col-xs-3">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Publish</h3>
        </div>
        <div class="box-body">
            <div class="form-group <?php echo e($errors->has('published_at') ? 'has-error' : ''); ?>">
                <?php echo Form::label('published_at', 'Publish Date'); ?>

                <div class='input-group date' id='datetimepicker1'>
                    <?php echo Form::text('published_at', null, ['class' => 'form-control', 'placeholder' => 'Y-m-d H:i:s']); ?>

                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>


                <?php if($errors->has('published_at')): ?>
                    <span class="help-block"><?php echo e($errors->first('published_at')); ?></span>
                <?php endif; ?>
            </div>
        </div>
        <div class="box-footer clearfix">
            <div class="pull-left">
                <a id="draft-btn" class="btn btn-default">Save Draft</a>
            </div>
            <div class="pull-right">
                <?php echo Form::submit('Publish', ['class' => 'btn btn-primary']); ?>

            </div>
        </div>
    </div>

    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Category</h3>
        </div>
        <div class="box-body">
            <div class="form-group <?php echo e($errors->has('post_type_id') ? 'has-error' : ''); ?>">
                <?php echo Form::select('post_type_id', App\Models\PostType::pluck('title', 'id'), null, ['class' => 'form-control', 'placeholder' => 'Choose category']); ?>


                <?php if($errors->has('post_type_id')): ?>
                    <span class="help-block"><?php echo e($errors->first('post_type_id')); ?></span>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Feature Image</h3>
        </div>
        <div class="box-body text-center">
            <div class="form-group <?php echo e($errors->has('image') ? 'has-error' : ''); ?>">
                <div class="fileinput fileinput-new" data-provides="fileinput">
                  <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                    <img src="<?php echo e(($post->image_thumb_url) ? $post->image_thumb_url : 'http://placehold.it/200x150&text=No+Image'); ?>" alt="...">
                  </div>
                  <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
                  <div>
                    <span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span><?php echo Form::file('image'); ?></span>
                    <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                  </div>
                </div>

                <?php if($errors->has('image')): ?>
                    <span class="help-block"><?php echo e($errors->first('image')); ?></span>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
