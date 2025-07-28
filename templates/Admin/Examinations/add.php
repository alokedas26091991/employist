<div class="row column1">
                        <div class="col-md-12">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>Add Paper <small></small></h2>
                                 </div>
                                 
                              </div>
                              <div class="full price_table padding_infor_info">
                                 <div class="row">
                                    <div class="col-lg-12">
                                 

                                       <?= $this->Form->create($examination,array('enctype'=>'multipart/form-data')); ?>
   
 
    
			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Category') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->control('examination_category_id', ['options' => $examinationCategories,'class'=>'form-control','label' => false,'div'=>false]);
			?>
	</div>
	</div>

			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Paper Name') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->control('name',['class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
			?>
	</div>
	</div>
	<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Order') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->control('ord',['class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
			?>
	</div>
	</div>
	<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Caption') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->control('caption',['class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
			?>
	</div>
	</div>
				<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Short Description') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->control('short_description',['class'=>'form-control ckeditor','empty' => true,'label' => false,'div'=>false]);
			?>
	</div>
	</div>
			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Description') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->control('description',['class'=>'form-control ckeditor','empty' => true,'label' => false,'div'=>false]);
			?>
	</div>
	</div>
			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Curriculum') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->control('curriculum',['class'=>'form-control ckeditor','empty' => true,'label' => false,'div'=>false]);
			?>
	</div>
	</div>

			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Model') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->control('model',['class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
			?>
	</div>
	</div>
			
			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Meta Title') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->control('meta_title',['class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
			?>
	</div>
	</div>			
			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Meta Keywords') ?></label>
			<div class="col-sm-9">
			<?= $this->Form->control('meta_keywords', ['class'=>'form-control','label'=>false,'div'=>false]); ?>
	</div>
	</div>			
			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Meta Description') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->control('meta_desc',['class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
			?>
	</div>
	</div>	

			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Robots') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->control('robots',['class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
			?>
	</div>
	</div>

			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Canonical') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->control('canonical',['class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
			?>
	</div>
	</div>

			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Photo') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->control('image_file',['type'=>'file','class'=>'form-control','label' => false,'div'=>false]);
			?>
	</div>
	</div>	
                 
         
                    

 <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success']) ?>
 <?= $this->Form->end() ?>

                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- end row -->
<?php $this->Html->script(['/admin_template/ckeditor/ckeditor'], ['block' => 'scriptBottom']) ?>




