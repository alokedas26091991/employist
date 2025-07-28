<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserExamination $userExamination
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit User Examination'), ['action' => 'edit', $userExamination->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete User Examination'), ['action' => 'delete', $userExamination->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userExamination->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List User Examinations'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New User Examination'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="userExaminations view content">
            <h3><?= h($userExamination->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Examination') ?></th>
                    <td><?= $userExamination->has('examination') ? $this->Html->link($userExamination->examination->name, ['controller' => 'Examinations', 'action' => 'view', $userExamination->examination->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Examination Category') ?></th>
                    <td><?= $userExamination->has('examination_category') ? $this->Html->link($userExamination->examination_category->name, ['controller' => 'ExaminationCategories', 'action' => 'view', $userExamination->examination_category->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Mock Test') ?></th>
                    <td><?= $userExamination->has('mock_test') ? $this->Html->link($userExamination->mock_test->name, ['controller' => 'MockTests', 'action' => 'view', $userExamination->mock_test->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $userExamination->has('user') ? $this->Html->link($userExamination->user->name, ['controller' => 'Users', 'action' => 'view', $userExamination->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($userExamination->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Time Taken') ?></th>
                    <td><?= $this->Number->format($userExamination->time_taken) ?></td>
                </tr>
                <tr>
                    <th><?= __('Marks Obtained') ?></th>
                    <td><?= $this->Number->format($userExamination->marks_obtained) ?></td>
                </tr>
                <tr>
                    <th><?= __('Last Attempted Question Id') ?></th>
                    <td><?= $this->Number->format($userExamination->last_attempted_question_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Attempt Date') ?></th>
                    <td><?= h($userExamination->attempt_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Is Last Attempted') ?></th>
                    <td><?= $userExamination->is_last_attempted ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Is Start') ?></th>
                    <td><?= $userExamination->is_start ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Is Completed') ?></th>
                    <td><?= $userExamination->is_completed ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Is Allow') ?></th>
                    <td><?= $userExamination->is_allow ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Is Deleted') ?></th>
                    <td><?= $userExamination->is_deleted ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related User Examination Answers') ?></h4>
                <?php if (!empty($userExamination->user_examination_answers)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('User Examination Id') ?></th>
                            <th><?= __('Examination Question Id') ?></th>
                            <th><?= __('Question Id') ?></th>
                            <th><?= __('Answer Id') ?></th>
                            <th><?= __('Is Correct') ?></th>
                            <th><?= __('Is Deleted') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($userExamination->user_examination_answers as $userExaminationAnswers) : ?>
                        <tr>
                            <td><?= h($userExaminationAnswers->id) ?></td>
                            <td><?= h($userExaminationAnswers->user_examination_id) ?></td>
                            <td><?= h($userExaminationAnswers->examination_question_id) ?></td>
                            <td><?= h($userExaminationAnswers->question_id) ?></td>
                            <td><?= h($userExaminationAnswers->answer_id) ?></td>
                            <td><?= h($userExaminationAnswers->is_correct) ?></td>
                            <td><?= h($userExaminationAnswers->is_deleted) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'UserExaminationAnswers', 'action' => 'view', $userExaminationAnswers->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'UserExaminationAnswers', 'action' => 'edit', $userExaminationAnswers->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'UserExaminationAnswers', 'action' => 'delete', $userExaminationAnswers->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userExaminationAnswers->id)]) ?>
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
