<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ExaminationCategory $examinationCategory
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Examination Category'), ['action' => 'edit', $examinationCategory->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Examination Category'), ['action' => 'delete', $examinationCategory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $examinationCategory->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Examination Categories'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Examination Category'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="examinationCategories view content">
            <h3><?= h($examinationCategory->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Parent Examination Category') ?></th>
                    <td><?= $examinationCategory->has('parent_examination_category') ? $this->Html->link($examinationCategory->parent_examination_category->name, ['controller' => 'ExaminationCategories', 'action' => 'view', $examinationCategory->parent_examination_category->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($examinationCategory->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Slug') ?></th>
                    <td><?= h($examinationCategory->slug) ?></td>
                </tr>
                <tr>
                    <th><?= __('Meta Title') ?></th>
                    <td><?= h($examinationCategory->meta_title) ?></td>
                </tr>
                <tr>
                    <th><?= __('Meta Keywords') ?></th>
                    <td><?= h($examinationCategory->meta_keywords) ?></td>
                </tr>
                <tr>
                    <th><?= __('Robots') ?></th>
                    <td><?= h($examinationCategory->robots) ?></td>
                </tr>
                <tr>
                    <th><?= __('Canonical') ?></th>
                    <td><?= h($examinationCategory->canonical) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($examinationCategory->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Is Active') ?></th>
                    <td><?= $examinationCategory->is_active ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Is Deleted') ?></th>
                    <td><?= $examinationCategory->is_deleted ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Meta Desc') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($examinationCategory->meta_desc)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Examination Categories') ?></h4>
                <?php if (!empty($examinationCategory->child_examination_categories)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Parent Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Slug') ?></th>
                            <th><?= __('Is Active') ?></th>
                            <th><?= __('Meta Title') ?></th>
                            <th><?= __('Meta Keywords') ?></th>
                            <th><?= __('Meta Desc') ?></th>
                            <th><?= __('Robots') ?></th>
                            <th><?= __('Canonical') ?></th>
                            <th><?= __('Is Deleted') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($examinationCategory->child_examination_categories as $childExaminationCategories) : ?>
                        <tr>
                            <td><?= h($childExaminationCategories->id) ?></td>
                            <td><?= h($childExaminationCategories->parent_id) ?></td>
                            <td><?= h($childExaminationCategories->name) ?></td>
                            <td><?= h($childExaminationCategories->slug) ?></td>
                            <td><?= h($childExaminationCategories->is_active) ?></td>
                            <td><?= h($childExaminationCategories->meta_title) ?></td>
                            <td><?= h($childExaminationCategories->meta_keywords) ?></td>
                            <td><?= h($childExaminationCategories->meta_desc) ?></td>
                            <td><?= h($childExaminationCategories->robots) ?></td>
                            <td><?= h($childExaminationCategories->canonical) ?></td>
                            <td><?= h($childExaminationCategories->is_deleted) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'ExaminationCategories', 'action' => 'view', $childExaminationCategories->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'ExaminationCategories', 'action' => 'edit', $childExaminationCategories->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'ExaminationCategories', 'action' => 'delete', $childExaminationCategories->id], ['confirm' => __('Are you sure you want to delete # {0}?', $childExaminationCategories->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Examination Questions') ?></h4>
                <?php if (!empty($examinationCategory->examination_questions)) : ?>
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
                        <?php foreach ($examinationCategory->examination_questions as $examinationQuestions) : ?>
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
                <h4><?= __('Related Examinations') ?></h4>
                <?php if (!empty($examinationCategory->examinations)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Slug') ?></th>
                            <th><?= __('Examination Category Id') ?></th>
                            <th><?= __('Subject Id') ?></th>
                            <th><?= __('Description') ?></th>
                            <th><?= __('Each Question Mark') ?></th>
                            <th><?= __('Negative Marks') ?></th>
                            <th><?= __('Time Alloted') ?></th>
                            <th><?= __('Examination Date') ?></th>
                            <th><?= __('Examination End Date') ?></th>
                            <th><?= __('Start Time') ?></th>
                            <th><?= __('End Time') ?></th>
                            <th><?= __('Allow Time') ?></th>
                            <th><?= __('One Time') ?></th>
                            <th><?= __('Is Paid') ?></th>
                            <th><?= __('Is Active') ?></th>
                            <th><?= __('Price') ?></th>
                            <th><?= __('Photo') ?></th>
                            <th><?= __('Create Date') ?></th>
                            <th><?= __('Created By') ?></th>
                            <th><?= __('Last Update Date') ?></th>
                            <th><?= __('Last Update By') ?></th>
                            <th><?= __('Is Deleted') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($examinationCategory->examinations as $examinations) : ?>
                        <tr>
                            <td><?= h($examinations->id) ?></td>
                            <td><?= h($examinations->name) ?></td>
                            <td><?= h($examinations->slug) ?></td>
                            <td><?= h($examinations->examination_category_id) ?></td>
                            <td><?= h($examinations->subject_id) ?></td>
                            <td><?= h($examinations->description) ?></td>
                            <td><?= h($examinations->each_question_mark) ?></td>
                            <td><?= h($examinations->negative_marks) ?></td>
                            <td><?= h($examinations->time_alloted) ?></td>
                            <td><?= h($examinations->examination_date) ?></td>
                            <td><?= h($examinations->examination_end_date) ?></td>
                            <td><?= h($examinations->start_time) ?></td>
                            <td><?= h($examinations->end_time) ?></td>
                            <td><?= h($examinations->allow_time) ?></td>
                            <td><?= h($examinations->one_time) ?></td>
                            <td><?= h($examinations->is_paid) ?></td>
                            <td><?= h($examinations->is_active) ?></td>
                            <td><?= h($examinations->price) ?></td>
                            <td><?= h($examinations->photo) ?></td>
                            <td><?= h($examinations->create_date) ?></td>
                            <td><?= h($examinations->created_by) ?></td>
                            <td><?= h($examinations->last_update_date) ?></td>
                            <td><?= h($examinations->last_update_by) ?></td>
                            <td><?= h($examinations->is_deleted) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Examinations', 'action' => 'view', $examinations->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Examinations', 'action' => 'edit', $examinations->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Examinations', 'action' => 'delete', $examinations->id], ['confirm' => __('Are you sure you want to delete # {0}?', $examinations->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Mock Tests') ?></h4>
                <?php if (!empty($examinationCategory->mock_tests)) : ?>
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
                        <?php foreach ($examinationCategory->mock_tests as $mockTests) : ?>
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
        </div>
    </div>
</div>
