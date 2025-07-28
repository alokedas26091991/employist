<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserExaminationAnswer $userExaminationAnswer
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit User Examination Answer'), ['action' => 'edit', $userExaminationAnswer->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete User Examination Answer'), ['action' => 'delete', $userExaminationAnswer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userExaminationAnswer->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List User Examination Answers'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New User Examination Answer'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="userExaminationAnswers view content">
            <h3><?= h($userExaminationAnswer->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('User Examination') ?></th>
                    <td><?= $userExaminationAnswer->has('user_examination') ? $this->Html->link($userExaminationAnswer->user_examination->id, ['controller' => 'UserExaminations', 'action' => 'view', $userExaminationAnswer->user_examination->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Question') ?></th>
                    <td><?= $userExaminationAnswer->has('question') ? $this->Html->link($userExaminationAnswer->question->id, ['controller' => 'Questions', 'action' => 'view', $userExaminationAnswer->question->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($userExaminationAnswer->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Examination Mock Test Question Id') ?></th>
                    <td><?= $this->Number->format($userExaminationAnswer->examination_mock_test_question_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Answer Id') ?></th>
                    <td><?= $this->Number->format($userExaminationAnswer->answer_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Is Correct') ?></th>
                    <td><?= $userExaminationAnswer->is_correct ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Is Deleted') ?></th>
                    <td><?= $userExaminationAnswer->is_deleted ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
