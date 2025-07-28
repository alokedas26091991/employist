<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\UserExamination> $userExaminations
 */
?>
<div class="userExaminations index content">
    <?= $this->Html->link(__('New User Examination'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('User Examinations') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('examination_id') ?></th>
                    <th><?= $this->Paginator->sort('examination_category_id') ?></th>
                    <th><?= $this->Paginator->sort('mock_test_id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('time_taken') ?></th>
                    <th><?= $this->Paginator->sort('marks_obtained') ?></th>
                    <th><?= $this->Paginator->sort('attempt_date') ?></th>
                    <th><?= $this->Paginator->sort('is_last_attempted') ?></th>
                    <th><?= $this->Paginator->sort('last_attempted_question_id') ?></th>
                    <th><?= $this->Paginator->sort('is_start') ?></th>
                    <th><?= $this->Paginator->sort('is_completed') ?></th>
                    <th><?= $this->Paginator->sort('is_allow') ?></th>
                    <th><?= $this->Paginator->sort('is_deleted') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($userExaminations as $userExamination): ?>
                <tr>
                    <td><?= $this->Number->format($userExamination->id) ?></td>
                    <td><?= $userExamination->has('examination') ? $this->Html->link($userExamination->examination->name, ['controller' => 'Examinations', 'action' => 'view', $userExamination->examination->id]) : '' ?></td>
                    <td><?= $userExamination->has('examination_category') ? $this->Html->link($userExamination->examination_category->name, ['controller' => 'ExaminationCategories', 'action' => 'view', $userExamination->examination_category->id]) : '' ?></td>
                    <td><?= $userExamination->has('mock_test') ? $this->Html->link($userExamination->mock_test->name, ['controller' => 'MockTests', 'action' => 'view', $userExamination->mock_test->id]) : '' ?></td>
                    <td><?= $userExamination->has('user') ? $this->Html->link($userExamination->user->name, ['controller' => 'Users', 'action' => 'view', $userExamination->user->id]) : '' ?></td>
                    <td><?= $this->Number->format($userExamination->time_taken) ?></td>
                    <td><?= $this->Number->format($userExamination->marks_obtained) ?></td>
                    <td><?= h($userExamination->attempt_date) ?></td>
                    <td><?= h($userExamination->is_last_attempted) ?></td>
                    <td><?= $this->Number->format($userExamination->last_attempted_question_id) ?></td>
                    <td><?= h($userExamination->is_start) ?></td>
                    <td><?= h($userExamination->is_completed) ?></td>
                    <td><?= h($userExamination->is_allow) ?></td>
                    <td><?= h($userExamination->is_deleted) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $userExamination->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $userExamination->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $userExamination->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userExamination->id)]) ?>
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
