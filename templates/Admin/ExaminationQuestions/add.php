<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ExaminationQuestion $examinationQuestion
 * @var \Cake\Collection\CollectionInterface|string[] $examinationCategories
 * @var \Cake\Collection\CollectionInterface|string[] $questions
 * @var \Cake\Collection\CollectionInterface|string[] $examinations
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Examination Questions'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="examinationQuestions form content">
            <?= $this->Form->create($examinationQuestion) ?>
            <fieldset>
                <legend><?= __('Add Examination Question') ?></legend>
                <?php
                    echo $this->Form->control('examination_category_id', ['options' => $examinationCategories]);
                    echo $this->Form->control('question_id', ['options' => $questions]);
                    echo $this->Form->control('examination_id', ['options' => $examinations]);
                    echo $this->Form->control('create_date');
                    echo $this->Form->control('created_by');
                    echo $this->Form->control('last_update_date');
                    echo $this->Form->control('last_updated_by');
                    echo $this->Form->control('is_deleted');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
