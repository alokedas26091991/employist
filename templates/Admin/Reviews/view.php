<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Examination $examination
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Examination'), ['action' => 'edit', $examination->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Examination'), ['action' => 'delete', $examination->id], ['confirm' => __('Are you sure you want to delete # {0}?', $examination->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Examinations'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Examination'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="examinations view content">
            <h3><?= h($examination->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($examination->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Slug') ?></th>
                    <td><?= h($examination->slug) ?></td>
                </tr>
                <tr>
                    <th><?= __('Examination Category') ?></th>
                    <td><?= $examination->has('examination_category') ? $this->Html->link($examination->examination_category->name, ['controller' => 'ExaminationCategories', 'action' => 'view', $examination->examination_category->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($examination->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Subject Id') ?></th>
                    <td><?= $this->Number->format($examination->subject_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Each Question Mark') ?></th>
                    <td><?= $this->Number->format($examination->each_question_mark) ?></td>
                </tr>
                <tr>
                    <th><?= __('Negative Marks') ?></th>
                    <td><?= $this->Number->format($examination->negative_marks) ?></td>
                </tr>
                <tr>
                    <th><?= __('Time Alloted') ?></th>
                    <td><?= $this->Number->format($examination->time_alloted) ?></td>
                </tr>
                <tr>
                    <th><?= __('Allow Time') ?></th>
                    <td><?= $this->Number->format($examination->allow_time) ?></td>
                </tr>
                <tr>
                    <th><?= __('Price') ?></th>
                    <td><?= $this->Number->format($examination->price) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created By') ?></th>
                    <td><?= $this->Number->format($examination->created_by) ?></td>
                </tr>
                <tr>
                    <th><?= __('Last Update By') ?></th>
                    <td><?= $this->Number->format($examination->last_update_by) ?></td>
                </tr>
                <tr>
                    <th><?= __('Examination Date') ?></th>
                    <td><?= h($examination->examination_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Examination End Date') ?></th>
                    <td><?= h($examination->examination_end_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Start Time') ?></th>
                    <td><?= h($examination->start_time) ?></td>
                </tr>
                <tr>
                    <th><?= __('End Time') ?></th>
                    <td><?= h($examination->end_time) ?></td>
                </tr>
                <tr>
                    <th><?= __('Create Date') ?></th>
                    <td><?= h($examination->create_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Last Update Date') ?></th>
                    <td><?= h($examination->last_update_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('One Time') ?></th>
                    <td><?= $examination->one_time ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Is Paid') ?></th>
                    <td><?= $examination->is_paid ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Is Active') ?></th>
                    <td><?= $examination->is_active ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Is Deleted') ?></th>
                    <td><?= $examination->is_deleted ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Description') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($examination->description)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Photo') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($examination->photo)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Examination Questions') ?></h4>
                <?php if (!empty($examination->examination_questions)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Mock Test Id') ?></th>
                            <th><?= __('Examination Category Id') ?></th>
                            <th><?= __('Question Id') ?></th>
                            <th><?= __('Examination Id') ?></th>
                            <th><?= __('Create Date') ?></th>
                            <th><?= __('Created By') ?></th>
                            <th><?= __('Last Update Date') ?></th>
                            <th><?= __('Last Updated By') ?></th>
                            <th><?= __('Is Deleted') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($examination->examination_questions as $examinationQuestions) : ?>
                        <tr>
                            <td><?= h($examinationQuestions->id) ?></td>
                            <td><?= h($examinationQuestions->mock_test_id) ?></td>
                            <td><?= h($examinationQuestions->examination_category_id) ?></td>
                            <td><?= h($examinationQuestions->question_id) ?></td>
                            <td><?= h($examinationQuestions->examination_id) ?></td>
                            <td><?= h($examinationQuestions->create_date) ?></td>
                            <td><?= h($examinationQuestions->created_by) ?></td>
                            <td><?= h($examinationQuestions->last_update_date) ?></td>
                            <td><?= h($examinationQuestions->last_updated_by) ?></td>
                            <td><?= h($examinationQuestions->is_deleted) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'ExaminationQuestions', 'action' => 'view', $examinationQuestions->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'ExaminationQuestions', 'action' => 'edit', $examinationQuestions->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'ExaminationQuestions', 'action' => 'delete', $examinationQuestions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $examinationQuestions->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Mock Tests') ?></h4>
                <?php if (!empty($examination->mock_tests)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Examination Category Id') ?></th>
                            <th><?= __('Examination Id') ?></th>
                            <th><?= __('Slug') ?></th>
                            <th><?= __('Is Active') ?></th>
                            <th><?= __('Created By') ?></th>
                            <th><?= __('Create Date') ?></th>
                            <th><?= __('Is Deleted') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($examination->mock_tests as $mockTests) : ?>
                        <tr>
                            <td><?= h($mockTests->id) ?></td>
                            <td><?= h($mockTests->name) ?></td>
                            <td><?= h($mockTests->examination_category_id) ?></td>
                            <td><?= h($mockTests->examination_id) ?></td>
                            <td><?= h($mockTests->slug) ?></td>
                            <td><?= h($mockTests->is_active) ?></td>
                            <td><?= h($mockTests->created_by) ?></td>
                            <td><?= h($mockTests->create_date) ?></td>
                            <td><?= h($mockTests->is_deleted) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'MockTests', 'action' => 'view', $mockTests->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'MockTests', 'action' => 'edit', $mockTests->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'MockTests', 'action' => 'delete', $mockTests->id], ['confirm' => __('Are you sure you want to delete # {0}?', $mockTests->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related User Examinations') ?></h4>
                <?php if (!empty($examination->user_examinations)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Examination Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Time Taken') ?></th>
                            <th><?= __('Marks Obtained') ?></th>
                            <th><?= __('Attempt Date') ?></th>
                            <th><?= __('Is Last Attempted') ?></th>
                            <th><?= __('Last Attempted Question Id') ?></th>
                            <th><?= __('Is Start') ?></th>
                            <th><?= __('Is Completed') ?></th>
                            <th><?= __('Is Allow') ?></th>
                            <th><?= __('Is Deleted') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($examination->user_examinations as $userExaminations) : ?>
                        <tr>
                            <td><?= h($userExaminations->id) ?></td>
                            <td><?= h($userExaminations->examination_id) ?></td>
                            <td><?= h($userExaminations->user_id) ?></td>
                            <td><?= h($userExaminations->time_taken) ?></td>
                            <td><?= h($userExaminations->marks_obtained) ?></td>
                            <td><?= h($userExaminations->attempt_date) ?></td>
                            <td><?= h($userExaminations->is_last_attempted) ?></td>
                            <td><?= h($userExaminations->last_attempted_question_id) ?></td>
                            <td><?= h($userExaminations->is_start) ?></td>
                            <td><?= h($userExaminations->is_completed) ?></td>
                            <td><?= h($userExaminations->is_allow) ?></td>
                            <td><?= h($userExaminations->is_deleted) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'UserExaminations', 'action' => 'view', $userExaminations->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'UserExaminations', 'action' => 'edit', $userExaminations->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'UserExaminations', 'action' => 'delete', $userExaminations->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userExaminations->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
