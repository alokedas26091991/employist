<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ExaminationQuestion $examinationQuestion
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Examination Question'), ['action' => 'edit', $examinationQuestion->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Examination Question'), ['action' => 'delete', $examinationQuestion->id], ['confirm' => __('Are you sure you want to delete # {0}?', $examinationQuestion->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Examination Questions'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Examination Question'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="examinationQuestions view content">
            <h3><?= h($examinationQuestion->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Examination Category') ?></th>
                    <td><?= $examinationQuestion->has('examination_category') ? $this->Html->link($examinationQuestion->examination_category->name, ['controller' => 'ExaminationCategories', 'action' => 'view', $examinationQuestion->examination_category->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Question') ?></th>
                    <td><?= $examinationQuestion->has('question') ? $this->Html->link($examinationQuestion->question->id, ['controller' => 'Questions', 'action' => 'view', $examinationQuestion->question->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Examination') ?></th>
                    <td><?= $examinationQuestion->has('examination') ? $this->Html->link($examinationQuestion->examination->name, ['controller' => 'Examinations', 'action' => 'view', $examinationQuestion->examination->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($examinationQuestion->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created By') ?></th>
                    <td><?= $this->Number->format($examinationQuestion->created_by) ?></td>
                </tr>
                <tr>
                    <th><?= __('Last Updated By') ?></th>
                    <td><?= $this->Number->format($examinationQuestion->last_updated_by) ?></td>
                </tr>
                <tr>
                    <th><?= __('Create Date') ?></th>
                    <td><?= h($examinationQuestion->create_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Last Update Date') ?></th>
                    <td><?= h($examinationQuestion->last_update_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Is Deleted') ?></th>
                    <td><?= $examinationQuestion->is_deleted ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related User Examination Answers') ?></h4>
                <?php if (!empty($examinationQuestion->user_examination_answers)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('User Examination Id') ?></th>
                            <th><?= __('Examination Mock Test Question Id') ?></th>
                            <th><?= __('Question Id') ?></th>
                            <th><?= __('Answer Id') ?></th>
                            <th><?= __('Is Correct') ?></th>
                            <th><?= __('Is Deleted') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($examinationQuestion->user_examination_answers as $userExaminationAnswers) : ?>
                        <tr>
                            <td><?= h($userExaminationAnswers->id) ?></td>
                            <td><?= h($userExaminationAnswers->user_examination_id) ?></td>
                            <td><?= h($userExaminationAnswers->examination_mock_test_question_id) ?></td>
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
