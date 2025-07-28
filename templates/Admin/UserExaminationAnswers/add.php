<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserExaminationAnswer $userExaminationAnswer
 * @var \Cake\Collection\CollectionInterface|string[] $userExaminations
 * @var \Cake\Collection\CollectionInterface|string[] $examinationQuestions
 * @var \Cake\Collection\CollectionInterface|string[] $questions
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List User Examination Answers'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="userExaminationAnswers form content">
            <?= $this->Form->create($userExaminationAnswer) ?>
            <fieldset>
                <legend><?= __('Add User Examination Answer') ?></legend>
                <?php
                    echo $this->Form->control('user_examination_id', ['options' => $userExaminations]);
                    echo $this->Form->control('examination_mock_test_question_id');
                    echo $this->Form->control('question_id', ['options' => $questions]);
                    echo $this->Form->control('answer_id');
                    echo $this->Form->control('is_correct');
                    echo $this->Form->control('is_deleted');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
