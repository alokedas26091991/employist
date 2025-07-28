<div class="row column1">
                        <div class="col-md-12">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>Add Package <small></small></h2>
                                 </div>
                                 
                              </div>
                              <div class="full price_table padding_infor_info">
                                 <div class="row">
                                    <div class="col-lg-12">
                                 

                                       <?= $this->Form->create($product,array('enctype'=>'multipart/form-data')); ?>
   
     			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Package Type') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->control('examination_category_id', ['options'=>$examination_cat,'class'=>'form-control','label' => false,'div'=>false]);
			?>
	</div>
	</div>
    
			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Name') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->control('name', ['class'=>'form-control','label' => false,'div'=>false]);
			?>
	</div>
	</div>

			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Mock Test No') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->control('no_mock_test',['class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
			?>
	</div>
	</div>
				<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Validity') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->control('valid_days',['class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
			?>
	</div>
	</div>
			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Price') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->control('price',['class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
			?>
	</div>
	</div>
			
   			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Status') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->control('is_active',['class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
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









