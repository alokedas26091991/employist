<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MockTest $mockTest
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Mock Test'), ['action' => 'edit', $mockTest->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Mock Test'), ['action' => 'delete', $mockTest->id], ['confirm' => __('Are you sure you want to delete # {0}?', $mockTest->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Mock Tests'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Mock Test'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="mockTests view content">
            <h3><?= h($mockTest->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($mockTest->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Examination Category') ?></th>
                    <td><?= $mockTest->has('examination_category') ? $this->Html->link($mockTest->examination_category->name, ['controller' => 'ExaminationCategories', 'action' => 'view', $mockTest->examination_category->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Examination') ?></th>
                    <td><?= $mockTest->has('examination') ? $this->Html->link($mockTest->examination->name, ['controller' => 'Examinations', 'action' => 'view', $mockTest->examination->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Slug') ?></th>
                    <td><?= h($mockTest->slug) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($mockTest->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created By') ?></th>
                    <td><?= $this->Number->format($mockTest->created_by) ?></td>
                </tr>
                <tr>
                    <th><?= __('Create Date') ?></th>
                    <td><?= h($mockTest->create_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Is Active') ?></th>
                    <td><?= $mockTest->is_active ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Is Deleted') ?></th>
                    <td><?= $mockTest->is_deleted ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Examination Questions') ?></h4>
                <?php if (!empty($mockTest->examination_questions)) : ?>
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
                        <?php foreach ($mockTest->examination_questions as $examinationQuestions) : ?>
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
        </div>
    </div>
</div>
