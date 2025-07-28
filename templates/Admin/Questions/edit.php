
 <?php

use Cake\ORM\TableRegistry;

$user = TableRegistry::getTableLocator()->get("Users");

$userrole = TableRegistry::getTableLocator()->get("UserRoles");
$dataentry1 = $userrole->find('all')
                ->where(['user_id' => $this->request->getSession()->read('Auth.User.id')])->first();
?>

                     <!-- row -->
                     <div class="row column1">
					 <?php
					 if($question->created_by)
					 {
						 $dataentry = $user->find('all')
                        ->where(['id' => $question->created_by])->first();
					 ?>
                        <div class="col-md-6 col-lg-2">
                           <div class="full white_shd margin_bottom_30">
                              <div class="info_people">
                                
                                 <div class="user_info_cont">
								 
                                    <h4><?=$dataentry->name?></h4>
                                    
                                    <p class="p_status">Data Entry</p>
                                 </div>
                              </div>
                           </div>
                        </div>
						<?php
					 }
					 ?>
                        <?php
					 if($question->supervisor)
					 {
						 $dataentry = $user->find('all')
                        ->where(['id' => $question->supervisor])->first();
					 ?>
                        <div class="col-md-6 col-lg-2">
                           <div class="full white_shd margin_bottom_30">
                              <div class="info_people">
                                
                                 <div class="user_info_cont">
								 
                                    <h4><?=$dataentry->name?></h4>
                                    
                                    <p class="p_status">Super Visor</p>
                                 </div>
                              </div>
                           </div>
                        </div>
						<?php
					 }
					 ?>
                        <?php
					 if($question->reviewer)
					 {
						 $dataentry = $user->find('all')
                        ->where(['id' => $question->reviewer])->first();
					 ?>
                        <div class="col-md-6 col-lg-2">
                           <div class="full white_shd margin_bottom_30">
                              <div class="info_people">
                                
                                 <div class="user_info_cont">
								 
                                    <h4><?=$dataentry->name?></h4>
                                    
                                    <p class="p_status">Reviewer</p>
                                 </div>
                              </div>
                           </div>
                        </div>
						<?php
					 }
					 ?>
					 
					 <?php
					 if($question->super_reviewer)
					 {
						 $dataentry = $user->find('all')
                        ->where(['id' => $question->super_reviewer])->first();
					 ?>
                        <div class="col-md-6 col-lg-2">
                           <div class="full white_shd margin_bottom_30">
                              <div class="info_people">
                                
                                 <div class="user_info_cont">
								 
                                    <h4><?=$dataentry->name?></h4>
                                    
                                    <p class="p_status">Super Reviewer</p>
                                 </div>
                              </div>
                           </div>
                        </div>
						<?php
					 }
					 ?>
					 
					  <?php
					 if($question->manager)
					 {
						 $dataentry = $user->find('all')
                        ->where(['id' => $question->manager])->first();
					 ?>
                        <div class="col-md-6 col-lg-2">
                           <div class="full white_shd margin_bottom_30">
                              <div class="info_people">
                                
                                 <div class="user_info_cont">
								 
                                    <h4><?=$dataentry->name?></h4>
                                    
                                    <p class="p_status">Manager</p>
                                 </div>
                              </div>
                           </div>
                        </div>
						<?php
					 }
					 ?>
                     </div>

<div class="row column1" ng-app="questions" ng-controller="questionsCrt">
    <div class="col-md-12">
        <div class="white_shd full margin_bottom_30">
            <div class="full graph_head">
                <div class="heading1 margin_0">
                    <h2>Update Question <small></small></h2>
                  
                                                   
                </div>

            </div>
            <div class="full price_table padding_infor_info">
                <div class="row">
                    <div class="col-lg-12">


                        <?= $this->Form->create($question, array('enctype' => 'multipart/form-data')); ?>





                        <div class="form-group row">		
                            <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
                                <?= __('Question') ?></label>
                            <div class="col-sm-9">
                                <?php
                                echo $this->Form->control('question', ['class' => 'form-control ckeditor', 'empty' => true, 'label' => false, 'div' => false]);
                                ?>
                            </div>
                        </div>


                        <?php
                        //pr($glossaryQuestion->glossary_answers);
                        $correct_option = [1 => 'Option 1', 2 => 'Option 2', 3 => 'Option 3', 4 => 'Option 4', 5 => 'Option 5'];
                        $i = 1;
                        $select_option = 0;

                        if ($create) {
                            $no_of_question = 5;
                        } else {
                            $no_of_question = count($question->question_answers);
                        }
                        for ($i = 1; $i <= $no_of_question; $i++) {

                            if ($create) {
                                ?>
                                <div class="form-group row">
                                    <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">Answer <?= $i ?></label>
                                    <div class="col-sm-9">
        <?= $this->Form->input('q_option[]', ['type' => 'textarea', 'id' => 'q_option_' . $i, 'class' => 'form-control ckeditor', 'label' => false, 'div' => false]); ?>
                                        <p class="help-block"></p>
                                    </div>
                                </div>
        <?php
    } else {
        //pr($glossaryQuestion->glossary_answers);
        ?>
                                <div class="form-group row">
                                    <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">Answer <?= $i ?></label>
                                    <div class="col-sm-9">
        <?php
        //echo count($glossaryQuestion->glossary_answers);
        if ($question->question_answers[$i - 1]->is_correct == 1) {

            $select_option = $i;
        }
        if ($i <= count($question->question_answers)) {
            echo $this->Form->input('q_option[]', ['type' => 'textarea', 'value' => $question->question_answers[$i - 1]->q_option, 'id' => 'q_option_' . $i, 'class' => 'form-control ckeditor', 'label' => false, 'div' => false]);
        } else {
            ?>
                                            <?= $this->Form->input('q_option[]', ['type' => 'textarea', 'id' => 'q_option_' . $i, 'class' => 'form-control ckeditor', 'label' => false, 'div' => false]); ?>
                                        <?php } ?>
                                        <p class="help-block"></p>
                                    </div>
                                </div>
        <?php
    }
}
?>

                        <div class="form-group row">		
                            <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
<?= __('Select Correct Answer') ?></label>
                            <div class="col-sm-9">
                                <?php
                                echo $this->Form->control('is_correct', ['options' => $correct_option, 'empty' => 'Select Correct Answer', 'class' => 'form-control', 'label' => false, 'div' => false, 'default' => $select_option]);
                                ?>
                            </div>
                        </div>
                        <div class="form-group row">		
                            <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
							<?= __('Difficulty') ?></label>
                            <div class="col-sm-9">
                                <select name="difficulty" class="form-control">
                                    <option value="1" <?=$question->difficulty == '1' ? ' selected="selected"' : '';?>>Easy</option>
                                    <option value="2" <?=$question->difficulty == '2' ? ' selected="selected"' : '';?>>Medium</option>
                                    <option value="3" <?=$question->difficulty == '3' ? ' selected="selected"' : '';?>>Hard</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">		
                            <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
<?= __('Explaination') ?></label>
                            <div class="col-sm-9">
                                <?php
                                echo $this->Form->control('explan', ['class' => 'form-control ckeditor', 'empty' => true, 'label' => false, 'div' => false]);
                                ?>
                            </div>
                        </div>

		
                        <div class="form-group row">		
                            <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
<?= __('Comment') ?></label>
                            <div class="col-sm-9">
                                <?= $this->Form->control('comment', ['class' => 'form-control', 'label' => false, 'div' => false]); ?>
                            </div>
                        </div>			
						<?php
						if($question->status==5)
						{
						?>
                        <div class="form-group row">		
                            <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
						<?= __('Is Active') ?></label>
                            <div class="col-sm-9">
                                <select name="is_active" class="form-control">
                                    <option value="1" <?=$question->is_active == '1' ? ' selected="selected"' : '';?>>Active</option>
                                    <option value="0" <?=$question->is_active == '0' ? ' selected="selected"' : '';?>>Inactive</option>

                                </select>
                            </div>
                        </div>	
						<?php
						}
						?>




<?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success']) ?>
<?php
if ($dataentry1->role_id == 4 || $dataentry1->role_id == 1 || $dataentry1->role_id == 7) {
?>
 <a href="javascript:void(0)" ng-click="openModal(<?=$question->id?>)" class="btn btn-success"><span class="fa fa-database"></span> Assign Question</a>
 <?php
}
?> 
<?= $this->Form->end() ?>



                    </div>
                </div>
            </div>
        </div>
    </div>
     <div modal="showModal" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalAtert" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">


                <div class="modal-header"> <h1>Add Paper</h1> </div>
                <div class="modal-body">  
                    <div class="row"><div class="col-12">
                            <form>
                                <div class="form-group row">		
                                    <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
                                        <?= __('Category') ?></label>
                                    <div class="col-sm-9">
                                        <?php
                                        //echo $this->Form->input('category_id', ['options' => $categories,'class'=>'form-control','label' => false,'div'=>false]);
                                        ?>
                                        <select name="category_id" ng-model="examination_category_id" ng-change="categorieslist()" class='form-control' convert-to-number><option ng-repeat="c in categories" ng-value="c.id" ng-selected="c.id==category_id">{{c.name}}</option> </select>

                                    </div>
                                </div>

                                <div class="form-group row">		
                                    <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
                                        <?= __('Paper') ?></label>
                                    <div class="col-sm-9">
                                        <?php
                                        //echo $this->Form->input('category_id', ['options' => $categories,'class'=>'form-control','label' => false,'div'=>false]);
                                        ?>
                                        <select name="examination_id" ng-model="examination_id" class='form-control' convert-to-number>
                                            <option ng-repeat="item in subcategories" ng-value="item.id" >{{item.name}}</option>

                                            ></select>

                                    </div>
                                </div>
                                <div class="form-group row"><div class="col-3"></div><div class="col-9"><a class="btn btn-success " ng-click="addData($event)">Save</a></div>	</div></form></div></div>
                    <div class="table-responsive-sm">
                        <table class="table table-striped projects">
                            <thead class="thead-dark">
                                <tr><th>#</th><th>Category</th><th>Paper</th><th>Action</th></tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="q in examinationQuestion">
                                    <td>{{$index+1}}</td>
                                    <td >{{q.examination_category.name}}</td>
                                    <td>{{q.examination.name}}</td>
                                    <td><a href="javascript:void(0);" ng-click="deleteExamination(q.id)"><i class="fa fa-trash"></i></a></td>
                                </tr>
                            </tbody></table></div>
                </div>

                <div class="modal-footer">
                    <button type="button" ng-click="showModal=false;" class="btn btn-default" data-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>

</div>
<!-- end row -->
<?php $this->Html->script(['/admin_template/ckeditor/ckeditor'], ['block' => 'scriptBottom']) ?>
<script>
       var examination_id = 0;
    var examination_category_id = 0;
    var categories =<?= json_encode($examinations); ?>;
    var ajxUrl = "<?= $this->Url->build('/admin/questions') ?>";
    var token = "<?= $this->request->getAttribute('csrfToken') ?>";

</script>
<?= $this->Html->script(['/admin_template/js/angular-1.8.2/angular.min.js', '/admin_template/js/angular-1.8.2/angular-sanitize.min', '/admin_template/js/angular-1.8.2/angular-animate.min', '/admin_template/js/angular-1.8.2/ui-bootstrap-tpls-2.5.0.min.js',  '/admin_template/js/angular-1.8.2/angular-ui-bootstrap-modal.js', '/admin_template/bootstrap-multiselect-master/dist/js/bootstrap-multiselect.min', '/admin_template/js/angular/option_category_edit.js?v=1'], ['block' => 'scriptBottom']); ?>

