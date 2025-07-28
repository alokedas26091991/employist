<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\UserExaminationAnswer> $userExaminationAnswers
 */
?>
<div class="userExaminationAnswers index content">
    <?= $this->Html->link(__('New User Examination Answer'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('User Examination Answers') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('user_examination_id') ?></th>
                    <th><?= $this->Paginator->sort('examination_mock_test_question_id') ?></th>
                    <th><?= $this->Paginator->sort('question_id') ?></th>
                    <th><?= $this->Paginator->sort('answer_id') ?></th>
                    <th><?= $this->Paginator->sort('is_correct') ?></th>
                    <th><?= $this->Paginator->sort('is_deleted') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($userExaminationAnswers as $userExaminationAnswer): ?>
                <tr>
                    <td><?= $this->Number->format($userExaminationAnswer->id) ?></td>
                    <td><?= $userExaminationAnswer->has('user_examination') ? $this->Html->link($userExaminationAnswer->user_examination->id, ['controller' => 'UserExaminations', 'action' => 'view', $userExaminationAnswer->user_examination->id]) : '' ?></td>
                    <td><?= $this->Number->format($userExaminationAnswer->examination_mock_test_question_id) ?></td>
                    <td><?= $userExaminationAnswer->has('question') ? $this->Html->link($userExaminationAnswer->question->id, ['controller' => 'Questions', 'action' => 'view', $userExaminationAnswer->question->id]) : '' ?></td>
                    <td><?= $this->Number->format($userExaminationAnswer->answer_id) ?></td>
                    <td><?= h($userExaminationAnswer->is_correct) ?></td>
                    <td><?= h($userExaminationAnswer->is_deleted) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $userExaminationAnswer->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $userExaminationAnswer->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $userExaminationAnswer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userExaminationAnswer->id)]) ?>
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
