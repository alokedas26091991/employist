<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\ExaminationMockTestQuestion> $examinationMockTestQuestions
 */
?>
<div class="examinationMockTestQuestions index content">
    <?= $this->Html->link(__('New Examination Mock Test Question'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Examination Mock Test Questions') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('mock_test_id') ?></th>
                    <th><?= $this->Paginator->sort('examination_category_id') ?></th>
                    <th><?= $this->Paginator->sort('question_id') ?></th>
                    <th><?= $this->Paginator->sort('examination_id') ?></th>
                    <th><?= $this->Paginator->sort('create_date') ?></th>
                    <th><?= $this->Paginator->sort('created_by') ?></th>
                    <th><?= $this->Paginator->sort('last_update_date') ?></th>
                    <th><?= $this->Paginator->sort('last_updated_by') ?></th>
                    <th><?= $this->Paginator->sort('is_deleted') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($examinationMockTestQuestions as $examinationMockTestQuestion): ?>
                <tr>
                    <td><?= $this->Number->format($examinationMockTestQuestion->id) ?></td>
                    <td><?= $examinationMockTestQuestion->has('mock_test') ? $this->Html->link($examinationMockTestQuestion->mock_test->name, ['controller' => 'MockTests', 'action' => 'view', $examinationMockTestQuestion->mock_test->id]) : '' ?></td>
                    <td><?= $examinationMockTestQuestion->has('examination_category') ? $this->Html->link($examinationMockTestQuestion->examination_category->name, ['controller' => 'ExaminationCategories', 'action' => 'view', $examinationMockTestQuestion->examination_category->id]) : '' ?></td>
                    <td><?= $examinationMockTestQuestion->has('question') ? $this->Html->link($examinationMockTestQuestion->question->id, ['controller' => 'Questions', 'action' => 'view', $examinationMockTestQuestion->question->id]) : '' ?></td>
                    <td><?= $examinationMockTestQuestion->has('examination') ? $this->Html->link($examinationMockTestQuestion->examination->name, ['controller' => 'Examinations', 'action' => 'view', $examinationMockTestQuestion->examination->id]) : '' ?></td>
                    <td><?= h($examinationMockTestQuestion->create_date) ?></td>
                    <td><?= $this->Number->format($examinationMockTestQuestion->created_by) ?></td>
                    <td><?= h($examinationMockTestQuestion->last_update_date) ?></td>
                    <td><?= $this->Number->format($examinationMockTestQuestion->last_updated_by) ?></td>
                    <td><?= h($examinationMockTestQuestion->is_deleted) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $examinationMockTestQuestion->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $examinationMockTestQuestion->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $examinationMockTestQuestion->id], ['confirm' => __('Are you sure you want to delete # {0}?', $examinationMockTestQuestion->id)]) ?>
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
