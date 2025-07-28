<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\ExaminationQuestion> $examinationQuestions
 */
?>
<div class="examinationQuestions index content">
    <?= $this->Html->link(__('New Examination Question'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Examination Questions') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
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
                <?php foreach ($examinationQuestions as $examinationQuestion): ?>
                <tr>
                    <td><?= $this->Number->format($examinationQuestion->id) ?></td>
                    <td><?= $examinationQuestion->has('examination_category') ? $this->Html->link($examinationQuestion->examination_category->name, ['controller' => 'ExaminationCategories', 'action' => 'view', $examinationQuestion->examination_category->id]) : '' ?></td>
                    <td><?= $examinationQuestion->has('question') ? $this->Html->link($examinationQuestion->question->id, ['controller' => 'Questions', 'action' => 'view', $examinationQuestion->question->id]) : '' ?></td>
                    <td><?= $examinationQuestion->has('examination') ? $this->Html->link($examinationQuestion->examination->name, ['controller' => 'Examinations', 'action' => 'view', $examinationQuestion->examination->id]) : '' ?></td>
                    <td><?= h($examinationQuestion->create_date) ?></td>
                    <td><?= $this->Number->format($examinationQuestion->created_by) ?></td>
                    <td><?= h($examinationQuestion->last_update_date) ?></td>
                    <td><?= $this->Number->format($examinationQuestion->last_updated_by) ?></td>
                    <td><?= h($examinationQuestion->is_deleted) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $examinationQuestion->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $examinationQuestion->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $examinationQuestion->id], ['confirm' => __('Are you sure you want to delete # {0}?', $examinationQuestion->id)]) ?>
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
