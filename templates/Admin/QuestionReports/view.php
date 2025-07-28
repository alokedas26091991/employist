<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Question $question
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Question'), ['action' => 'edit', $question->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Question'), ['action' => 'delete', $question->id], ['confirm' => __('Are you sure you want to delete # {0}?', $question->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Questions'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Question'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="questions view content">
            <h3><?= h($question->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($question->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created By') ?></th>
                    <td><?= $this->Number->format($question->created_by) ?></td>
                </tr>
                <tr>
                    <th><?= __('Supervisor') ?></th>
                    <td><?= $question->supervisor === null ? '' : $this->Number->format($question->supervisor) ?></td>
                </tr>
                <tr>
                    <th><?= __('Reviewer') ?></th>
                    <td><?= $question->reviewer === null ? '' : $this->Number->format($question->reviewer) ?></td>
                </tr>
                <tr>
                    <th><?= __('Data Entry') ?></th>
                    <td><?= $question->data_entry === null ? '' : $this->Number->format($question->data_entry) ?></td>
                </tr>
                <tr>
                    <th><?= __('Super Reviewer') ?></th>
                    <td><?= $question->super_reviewer === null ? '' : $this->Number->format($question->super_reviewer) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= $this->Number->format($question->status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Last Updated By') ?></th>
                    <td><?= $this->Number->format($question->last_updated_by) ?></td>
                </tr>
                <tr>
                    <th><?= __('Create Date') ?></th>
                    <td><?= h($question->create_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Last Update Date') ?></th>
                    <td><?= h($question->last_update_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Is Deleted') ?></th>
                    <td><?= $question->is_deleted ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Question') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($question->question)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Examination Questions') ?></h4>
                <?php if (!empty($question->examination_questions)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Mock Test Id') ?></th>
                            <th><?= __('Examination Category Id') ?></th>
                            <th><?= __('Question Id') ?></th>
                            <th><?= __('Examination Id') ?></th>
                            <th><?= __('Create Date') ?></th>
                            <th><?= __('Created By') ?></th>
                            <th><?= __('Last Update Date') ?></th>
                            <th><?= __('Last Updated By') ?></th>
                            <th><?= __('Is Deleted') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($question->examination_questions as $examinationQuestions) : ?>
                        <tr>
                            <td><?= h($examinationQuestions->id) ?></td>
                            <td><?= h($examinationQuestions->mock_test_id) ?></td>
                            <td><?= h($examinationQuestions->examination_category_id) ?></td>
                            <td><?= h($examinationQuestions->question_id) ?></td>
                            <td><?= h($examinationQuestions->examination_id) ?></td>
                            <td><?= h($examinationQuestions->create_date) ?></td>
                            <td><?= h($examinationQuestions->created_by) ?></td>
                            <td><?= h($examinationQuestions->last_update_date) ?></td>
                            <td><?= h($examinationQuestions->last_updated_by) ?></td>
                            <td><?= h($examinationQuestions->is_deleted) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'ExaminationQuestions', 'action' => 'view', $examinationQuestions->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'ExaminationQuestions', 'action' => 'edit', $examinationQuestions->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'ExaminationQuestions', 'action' => 'delete', $examinationQuestions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $examinationQuestions->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Question Answers') ?></h4>
                <?php if (!empty($question->question_answers)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Question Id') ?></th>
                            <th><?= __('Q Option') ?></th>
                            <th><?= __('Is Correct') ?></th>
                            <th><?= __('Is Deleted') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($question->question_answers as $questionAnswers) : ?>
                        <tr>
                            <td><?= h($questionAnswers->id) ?></td>
                            <td><?= h($questionAnswers->question_id) ?></td>
                            <td><?= h($questionAnswers->q_option) ?></td>
                            <td><?= h($questionAnswers->is_correct) ?></td>
                            <td><?= h($questionAnswers->is_deleted) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'QuestionAnswers', 'action' => 'view', $questionAnswers->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'QuestionAnswers', 'action' => 'edit', $questionAnswers->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'QuestionAnswers', 'action' => 'delete', $questionAnswers->id], ['confirm' => __('Are you sure you want to delete # {0}?', $questionAnswers->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related User Examination Answers') ?></h4>
                <?php if (!empty($question->user_examination_answers)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('User Examination Id') ?></th>
                            <th><?= __('Examination Question Id') ?></th>
                            <th><?= __('Question Id') ?></th>
                            <th><?= __('Examination Answer Id') ?></th>
                            <th><?= __('Is Correct') ?></th>
                            <th><?= __('Is Deleted') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($question->user_examination_answers as $userExaminationAnswers) : ?>
                        <tr>
                            <td><?= h($userExaminationAnswers->id) ?></td>
                            <td><?= h($userExaminationAnswers->user_examination_id) ?></td>
                            <td><?= h($userExaminationAnswers->examination_question_id) ?></td>
                            <td><?= h($userExaminationAnswers->question_id) ?></td>
                            <td><?= h($userExaminationAnswers->examination_answer_id) ?></td>
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
