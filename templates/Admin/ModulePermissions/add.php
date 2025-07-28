<div class="row column1">
                        <div class="col-md-12">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>Add Module Permission <small></small></h2>
                                 </div>
                                 
                              </div>
                              <div class="full price_table padding_infor_info">
                                 <div class="row">
                                    <div class="col-lg-12">
                                 

                                       <?= $this->Form->create($modulePermission,['class'=>'form form-horizontal']); ?>
   
 
    


         <div class="form-group row">		
<label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
         <?= __('Role Id') ?></label>
         <div class="col-sm-9">
         <?php 
         
         echo $this->Form->control('role_id', ['options' => $roles,'class'=>'form-control','label' => false,'div'=>false]);


         ?>
         
     
         
 </div>
 </div>
 
         <div class="form-group row">		
<label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
         <?= __('Module Id') ?></label>
         <div class="col-sm-9">
         <?php 
         
         echo $this->Form->control('module_id', ['options' => $modules,'class'=>'form-control','label' => false,'div'=>false]);


         ?>
         
 </div>
 </div>
 
         <div class="form-group row">		
<label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
         <?= __('View') ?></label>
         <div class="col-sm-9">
         <?php 
                     echo $this->Form->control('perm_view',['class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
         ?>
 </div>
 </div>			
         <div class="form-group row">		
<label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
         <?= __('Insert') ?></label>
         <div class="col-sm-9">
         <?php 
                     echo $this->Form->control('perm_insert',['class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
         ?>
 </div>
 </div>			
         <div class="form-group row">		
<label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
         <?= __('Update') ?></label>
         <div class="col-sm-9">
         <?php 
                     echo $this->Form->control('perm_update',['class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
         ?>
 </div>
 </div>			
         <div class="form-group row">		
<label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
         <?= __('Delete') ?></label>
         <div class="col-sm-9">
         <?php 
                     echo $this->Form->control('perm_delete',['class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
         ?>
 </div>
 </div>			
         <div class="form-group row" style="display:none;">		
<label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
         <?= __('Seo') ?></label>
         <div class="col-sm-9">
         <?php 
                     echo $this->Form->control('perm_seo',['class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
         ?>
 </div>
 </div>			
         <div class="form-group row" style="display:none;">		
<label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
         <?= __('Approve') ?></label>
         <div class="col-sm-9">
         <?php 
                     echo $this->Form->control('perm_approve',['class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
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
                


















