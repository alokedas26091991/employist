<?php

 use Cake\ORM\TableRegistry;
?>

<div class="row column1" ng-app="questions" ng-controller="questionsCrt">
    <div class="col-md-12">
        <div class="white_shd full margin_bottom_30">
                                <div class="full graph_head">
                <div class="heading1 margin_0">
                    <h2>Select Paper<small></small></h2>
                    </br>
                </div>
                <div>
                   <?= $this->Form->create([],['class'=>'form-horizontal','type' => 'get']); ?>
                    <select name="exam_id"  class='form-control' >
                        <option value="">Select Paper</option>
                        <?php foreach ($exam_list as $list) { ?>
                        <option value="<?= $list->id ?>" <?=$list->id == $search ? ' selected="selected"' : '';?>><?= $list->name ?></option>
                        <?php } ?>

                    </select> 
                    </br>
                    

                    <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success']) ?>
                    <?= $this->Form->end() ?>

                    
					
                </div>
            </div>
            <div class="full price_table padding_infor_info">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive-sm">
                            <table class="table table-striped projects">
                                <thead class="thead-dark">
                                    <tr>
                                       
                                        <th><?= $this->Paginator->sort('Sl No') ?></th>
                                    
                                        <th><?= $this->Paginator->sort('Paper') ?></th>
                                        <th><?= $this->Paginator->sort('question') ?></th>
                                        <th><?= $this->Paginator->sort('status') ?></th>
                                        <th><?= $this->Paginator->sort('date') ?></th>

                                        <th class="actions"><?= __('Actions') ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                  
                                  <?php
                                  $c=0;
                                  foreach($question as $question1)
                                  {
                                      $c++;
                                      
                                     
                                      
                                      $paper = TableRegistry::getTableLocator()->get("Examinations");
                                      $paper_name=$paper->find('all')->where(['id'=>$question1->examination_id])->first();
                                  ?>
                                        <tr>
                                        <td><?=$c?></td>
                                           
                                            <td><?=$paper_name->name?></td>    
                                            <td><?=$question1->question->question?></td> 

                                            <td><?=$question1->question->is_active==1?"Active":"Inactive"?></td>
                                            
                                             <td><?=$question1->question->create_date?></td> 
                                            <td class="actions">

                                               <a href="/admin/questions/edit/<?=$question1->question->id?>" target="_blank"><span class="fa fa-edit"></span></a>
                                                
												<?= $this->Form->postLink('<span class="btn btn-success">Change Status</span><span class="sr-only">' . __('Change Status') . '</span>', ['action' => 'changequestionstatus', $question1->question->id], ['confirm' => __('Are you sure you want to Change the Status ?'), 'escape' => false, 'class' => 'btn-default', 'title' => __('Change Status')]) ?>
											
		
                                            </td>
                                        </tr>
                                   <?php
                                  }
                                  ?>
                                </tbody>
                            </table>

									       <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>


                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
 
</div>
<?= $this->Html->css(['/admin_template/bootstrap-multiselect-master/dist/css/bootstrap-multiselect.min', ["block" => "scriptTop"]]); ?>


