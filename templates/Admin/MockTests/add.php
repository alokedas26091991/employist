<div class="row column1">
                        <div class="col-md-12">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>Add Mock Test <small></small></h2>
                                 </div>
                                 
                              </div>
                              <div class="full price_table padding_infor_info">
                                 <div class="row">
                                    <div class="col-lg-12">
                                 

                                       <?= $this->Form->create($mockTest,['class'=>'form form-horizontal']); ?>
   
 
    
			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Paper') ?></label>
			<div class="col-sm-9">
			<?php 
			      
						echo $this->Form->control('examination_id', ['options' => $examinations,'class'=>'form-control','label' => false,'div'=>false]);
			?>
	</div>
	</div>

			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Name') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->control('name',['class'=>'form-control','required','empty' => true,'label' => false,'div'=>false]);
			?>
	</div>
	</div>			
			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('No of Questions') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->control('question_no',['class'=>'form-control','required','empty' => true,'label' => false,'div'=>false]);
			?>
	</div>
	</div>	

			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Time in Minute') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->control('time_alloted',['type'=>'number','class'=>'form-control','required','empty' => true,'label' => false,'div'=>false]);
			?>
	</div>
	</div>	
			
   			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Is Demo') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->control('is_demo',['class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
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



