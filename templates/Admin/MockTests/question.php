<div class="row column1">
                        <div class="col-md-12">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>Examination Mock Test Questions <small></small></h2>
                                 </div>
                                 <div>

                                  <?= $this->Html->link(__('New Examination Mock Test Question'), ['action' => 'addquestion',$mock_test_id], ['class' => 'btn btn-success button float-right']) ?>

                                    </div>
                              </div>
                              <div class="full price_table padding_infor_info">
                                 <div class="row">
                                    <div class="col-lg-12">
                                       <div class="table-responsive-sm">
                                         <table class="table table-striped projects">
            <thead class="thead-dark">
                <tr>
                    <th><?= $this->Paginator->sort('sl no') ?></th>
                    <th><?= $this->Paginator->sort('mock_test_id') ?></th>
                    <th><?= $this->Paginator->sort('examination_category_id') ?></th>
                    <th><?= $this->Paginator->sort('question_id') ?></th>
                    <th><?= $this->Paginator->sort('examination_id') ?></th>
                   
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $k=0;
                foreach ($examinationMockTestQuestions as $examinationMockTestQuestion): 
                $k++;
                ?>
                <tr>
                    <td><?= $k ?></td>
                    <td><?= $examinationMockTestQuestion->has('mock_test') ? $this->Html->link($examinationMockTestQuestion->mock_test->name, ['controller' => 'MockTests', 'action' => 'view', $examinationMockTestQuestion->mock_test->id]) : '' ?></td>
                    <td><?= $examinationMockTestQuestion->has('examination_category') ? $this->Html->link($examinationMockTestQuestion->examination_category->name, ['controller' => 'ExaminationCategories', 'action' => 'view', $examinationMockTestQuestion->examination_category->id]) : '' ?></td>
                    <td><?= $examinationMockTestQuestion->question->question ?></td>
                    <td><?= $examinationMockTestQuestion->has('examination') ? $this->Html->link($examinationMockTestQuestion->examination->name, ['controller' => 'Examinations', 'action' => 'view', $examinationMockTestQuestion->examination->id]) : '' ?></td>
                    
                    <td class="actions">
                       <?= $this->Html->link('<span class="fa fa-edit"></span><span class="sr-only">' . __('Edit') . '</span>', ['controller' => 'Questions','action' => 'edit', $examinationMockTestQuestion->question_id], ['escape' => false, 'class' => 'btn-default', 'target'=>'_blank', 'title' => __('Edit')]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'deletequestion', $examinationMockTestQuestion->id,$examinationMockTestQuestion->mock_test_id], ['confirm' => __('Are you sure you want to delete # {0}?', $examinationMockTestQuestion->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
 
                                        

                                       </div>
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
                        <!-- end row -->
                     </div>



