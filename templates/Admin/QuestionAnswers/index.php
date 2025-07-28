<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\QuestionAnswer> $questionAnswers
 */
?>
<div class="questionAnswers index content">
    <?= $this->Html->link(__('New Question Answer'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Question Answers') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('question_id') ?></th>
                    <th><?= $this->Paginator->sort('q_option') ?></th>
                    <th><?= $this->Paginator->sort('is_correct') ?></th>
                    <th><?= $this->Paginator->sort('is_deleted') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($questionAnswers as $questionAnswer): ?>
                <tr>
                    <td><?= $this->Number->format($questionAnswer->id) ?></td>
                    <td><?= $questionAnswer->has('question') ? $this->Html->link($questionAnswer->question->id, ['controller' => 'Questions', 'action' => 'view', $questionAnswer->question->id]) : '' ?></td>
                    <td><?= h($questionAnswer->q_option) ?></td>
                    <td><?= h($questionAnswer->is_correct) ?></td>
                    <td><?= h($questionAnswer->is_deleted) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $questionAnswer->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $questionAnswer->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $questionAnswer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $questionAnswer->id)]) ?>
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
