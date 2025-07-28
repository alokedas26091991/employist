<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ExaminationMockTestQuestion $examinationMockTestQuestion
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Examination Mock Test Question'), ['action' => 'edit', $examinationMockTestQuestion->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Examination Mock Test Question'), ['action' => 'delete', $examinationMockTestQuestion->id], ['confirm' => __('Are you sure you want to delete # {0}?', $examinationMockTestQuestion->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Examination Mock Test Questions'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Examination Mock Test Question'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="examinationMockTestQuestions view content">
            <h3><?= h($examinationMockTestQuestion->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Mock Test') ?></th>
                    <td><?= $examinationMockTestQuestion->has('mock_test') ? $this->Html->link($examinationMockTestQuestion->mock_test->name, ['controller' => 'MockTests', 'action' => 'view', $examinationMockTestQuestion->mock_test->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Examination Category') ?></th>
                    <td><?= $examinationMockTestQuestion->has('examination_category') ? $this->Html->link($examinationMockTestQuestion->examination_category->name, ['controller' => 'ExaminationCategories', 'action' => 'view', $examinationMockTestQuestion->examination_category->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Question') ?></th>
                    <td><?= $examinationMockTestQuestion->has('question') ? $this->Html->link($examinationMockTestQuestion->question->id, ['controller' => 'Questions', 'action' => 'view', $examinationMockTestQuestion->question->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Examination') ?></th>
                    <td><?= $examinationMockTestQuestion->has('examination') ? $this->Html->link($examinationMockTestQuestion->examination->name, ['controller' => 'Examinations', 'action' => 'view', $examinationMockTestQuestion->examination->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($examinationMockTestQuestion->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created By') ?></th>
                    <td><?= $this->Number->format($examinationMockTestQuestion->created_by) ?></td>
                </tr>
                <tr>
                    <th><?= __('Last Updated By') ?></th>
                    <td><?= $this->Number->format($examinationMockTestQuestion->last_updated_by) ?></td>
                </tr>
                <tr>
                    <th><?= __('Create Date') ?></th>
                    <td><?= h($examinationMockTestQuestion->create_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Last Update Date') ?></th>
                    <td><?= h($examinationMockTestQuestion->last_update_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Is Deleted') ?></th>
                    <td><?= $examinationMockTestQuestion->is_deleted ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
