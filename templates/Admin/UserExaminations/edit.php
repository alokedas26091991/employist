<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserExamination $userExamination
 * @var string[]|\Cake\Collection\CollectionInterface $examinations
 * @var string[]|\Cake\Collection\CollectionInterface $examinationCategories
 * @var string[]|\Cake\Collection\CollectionInterface $mockTests
 * @var string[]|\Cake\Collection\CollectionInterface $users
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $userExamination->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $userExamination->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List User Examinations'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="userExaminations form content">
            <?= $this->Form->create($userExamination) ?>
            <fieldset>
                <legend><?= __('Edit User Examination') ?></legend>
                <?php
                    echo $this->Form->control('examination_id', ['options' => $examinations]);
                    echo $this->Form->control('examination_category_id', ['options' => $examinationCategories]);
                    echo $this->Form->control('mock_test_id', ['options' => $mockTests]);
                    echo $this->Form->control('user_id', ['options' => $users]);
                    echo $this->Form->control('time_taken');
                    echo $this->Form->control('marks_obtained');
                    echo $this->Form->control('attempt_date');
                    echo $this->Form->control('is_last_attempted');
                    echo $this->Form->control('last_attempted_question_id');
                    echo $this->Form->control('is_start');
                    echo $this->Form->control('is_completed');
                    echo $this->Form->control('is_allow');
                    echo $this->Form->control('is_deleted');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
