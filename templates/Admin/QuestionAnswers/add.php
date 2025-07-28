<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\QuestionAnswer $questionAnswer
 * @var \Cake\Collection\CollectionInterface|string[] $questions
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Question Answers'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="questionAnswers form content">
            <?= $this->Form->create($questionAnswer) ?>
            <fieldset>
                <legend><?= __('Add Question Answer') ?></legend>
                <?php
                    echo $this->Form->control('question_id', ['options' => $questions]);
                    echo $this->Form->control('q_option');
                    echo $this->Form->control('is_correct');
                    echo $this->Form->control('is_deleted');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
