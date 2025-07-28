 <div class="main-content">
          <div class="content-wrapper">
	<section id="horizontal-form-layouts">
	
<div class="row">
	    <div class="col-md-12">
	        <div class="card">
	            
	            <div class="card-body">
	                <div class="px-3">

    <?= $this->Form->create($userRole,['class'=>'form form-horizontal']); ?>
   
      <div class="form-body">
	                    		<h4 class="form-section"><i class="fa fa-plus"></i> <?= $this->Html->link(__('User Role'), ['action' => 'index']) ?> <?= __('Add') ?> </h4>
       


			
	
			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Role Id') ?></label>
			<div class="col-sm-9">
			
			
			<select name="role_id" class="form-control">
			<?php
			
			foreach($roles as $r)
			{
			?>
                <option value="<?=$r->id?>" <?=$userroles->role_id == $r->id ? ' selected="selected"' : '';?>><?=$r->role_name?></option>
             <?php
			}
			?>			

            </select>
			
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
