<div class="row column1">
   <div class="col-md-12">
      <div class="white_shd full margin_bottom_30">
         <div class="full graph_head">
            <div class="heading1 margin_0">
               <h2>Update Page <small></small></h2>
            </div>
         </div>
         <div class="full price_table padding_infor_info">
            <div class="row">
               <div class="col-lg-12">
                  <?= $this->Form->create($staticPage, ['type' => 'file', 'class' => 'form form-horizontal', 'id' => 'myForm', 'name' => 'myForm']); ?>
                  <div class="form-group row">
                     <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
                        <?= __('Status') ?></label>
                     <div class="col-sm-9">
                        <?= $this->Form->control('page_name', [
                           'type' => 'select',
                           'options' => ['1' => 'Home', '2' => 'About Us'],
                           'class' => 'form-control',
                           'label' => false,
                           'div' => false
                        ]) ?>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
                        <?= __('title') ?></label>
                     <div class="col-sm-9">
                        <?php

                        echo $this->Form->control('title', ['class' => 'form-control', 'label' => false, 'div' => false]);
                        ?>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
                        <?= __('Description') ?></label>
                     <div class="col-sm-9">
                        <?php
                        echo $this->Form->control('description', ['class' => 'form-control ckeditor', 'label' => false, 'div' => false]);
                        ?>
                     </div>
                  </div>
                   <div class="form-group row">
                     <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
                        <?= __('Details') ?></label>
                     <div class="col-sm-9">
                        <?php

                        echo $this->Form->control('details', ['class' => 'form-control', 'label' => false, 'div' => false]);
                        ?>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
                        <?= __('Image') ?></label>
                     <div class="col-sm-9">
                        <?= $this->Form->control('image', [
                           'type' => 'file',
                           'label' => false,
                           'div' => false,
                           'required' =>false,
                           'class' => 'form-control'
                        ]) ?>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
                        <?= __('Status') ?></label>
                     <div class="col-sm-9">
                        <?= $this->Form->control('section', [
                           'type' => 'select',
                           'options' => ['1' => 'Section 1', '2' => 'Section 2','3' => 'Section 3', '4' => 'Section 4', '5' => 'Section 5'],
                           'class' => 'form-control',
                           'label' => false,
                           'div' => false
                        ]) ?>
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
<?php $this->Html->script(['/admin_template/ckeditor/ckeditor'], ['block' => 'scriptBottom']) ?>