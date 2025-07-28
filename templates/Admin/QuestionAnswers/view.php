<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\QuestionAnswer $questionAnswer
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Question Answer'), ['action' => 'edit', $questionAnswer->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Question Answer'), ['action' => 'delete', $questionAnswer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $questionAnswer->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Question Answers'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Question Answer'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="questionAnswers view content">
            <h3><?= h($questionAnswer->q_option) ?></h3>
            <table>
                <tr>
                    <th><?= __('Question') ?></th>
                    <td><?= $questionAnswer->has('question') ? $this->Html->link($questionAnswer->question->id, ['controller' => 'Questions', 'action' => 'view', $questionAnswer->question->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Q Option') ?></th>
                    <td><?= h($questionAnswer->q_option) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($questionAnswer->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Is Correct') ?></th>
                    <td><?= $questionAnswer->is_correct ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Is Deleted') ?></th>
                    <td><?= $questionAnswer->is_deleted ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
