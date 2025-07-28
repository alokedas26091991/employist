<div class="main-content">
          <div class="content-wrapper">
	<section id="horizontal-form-layouts">
	
<div class="row">
	    <div class="col-md-12">
	        <div class="card">
	            
	            <div class="card-body">
	                <div class="px-3">

    <?= $this->Form->create($user,['class'=>'form form-horizontal','type'=>'file']); ?>
   
      <div class="form-body">
	                    		<h4 class="form-section"> <?= $this->Html->link(__(''), ['action' => 'index']) ?> <?= __('Edit') ?> </h4>
       


			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Name') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->input('name',['class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
			?>
	</div>
	</div>			
			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Email') ?></label>
			<div class="col-sm-9">
			
			           <?php 
			            echo $this->Form->input('email',['class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
			?>
			
	</div>
	</div>			
	<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Phone') ?></label>
			<div class="col-sm-9">
			
			           <?php 
			            echo $this->Form->input('phone_no',['class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
			?>
			
	</div>
	</div>	
	<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('User Type') ?></label>
			<div class="col-sm-9">
			
			   <select class="form-control" name="user_type">
			   <option value="1">Admin</option>
			   <option value="3">Staff</option>
			   <option value="4">Manager [HR Module]</option>
			   <option value="5">Employee [HR Module]</option>
			   </select>
			
	</div>
	</div>

	<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Photo') ?></label>
			<div class="col-sm-9">
			
			           <?php 
			            echo $this->Form->input('image_file',['type'=>'file','class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
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
</section>
</div>
</div>

