<div class="main-content">
          <div class="content-wrapper">
	<section id="horizontal-form-layouts">
<div class="row">
	    <div class="col-md-12">
	        <div class="card">
	            
	            <div class="card-body">
	                <div class="px-3">
    <?= $this->Form->create($user,['class'=>'form-horizontal','type'=>'file']); ?>
   
      <div class="form-body">
	                    		<h4 class="form-section"> <?= $this->Html->link(__('Users'), ['action' => 'index']) ?> <?= __('Add') ?> </h4>
       

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
			<?= __('Password') ?></label>
			<div class="col-sm-9">
			
			           <?php 
			            echo $this->Form->input('password',['class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
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
			<div class="col-sm-8 col-sm-offset-2">
    <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success']) ?>
				</div>
	</div>  
	</div>
	<?= $this->Form->end() ?>
 
	            </div>
	        </div>
	    </div>
	</div>
</section>
</div>
</div>