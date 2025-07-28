<div class="row column1">
                        <div class="col-md-12">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>Add Email <small></small></h2>
                                 </div>
                                 
                              </div>
                              <div class="full price_table padding_infor_info">
                                 <div class="row">
                                    <div class="col-lg-12">
                                 

                                       <?= $this->Form->create($email,['class'=>'form form-horizontal']); ?>
   
 
    


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
         <?= __('Subject') ?></label>
         <div class="col-sm-9">
         <?php 
         
         echo $this->Form->control('subject', ['class'=>'form-control','label' => false,'div'=>false]);


         ?>
         
     
         
 </div>
 </div>
          <div class="form-group row">		
<label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
         <?= __('Body') ?></label>
         <div class="col-sm-9">
         <?php 
         
         echo $this->Form->control('body', ['class'=>'form-control','label' => false,'div'=>false]);


         ?>
         
     
         
 </div>
 </div>
	         <div class="form-group row">		
<label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
         <?= __('Send Form') ?></label>
         <div class="col-sm-9">
         <?php 
         
         echo $this->Form->control('send_from', ['class'=>'form-control','label' => false,'div'=>false]);


         ?>
         
     
         
 </div>
 </div>	
           <div class="form-group row">		
<label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
         <?= __('Send From Name') ?></label>
         <div class="col-sm-9">
         <?php 
         
         echo $this->Form->control('send_from_name', ['class'=>'form-control','label' => false,'div'=>false]);


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
                




