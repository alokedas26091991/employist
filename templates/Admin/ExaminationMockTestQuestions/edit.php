<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ExaminationMockTestQuestion $examinationMockTestQuestion
 * @var string[]|\Cake\Collection\CollectionInterface $mockTests
 * @var string[]|\Cake\Collection\CollectionInterface $examinationCategories
 * @var string[]|\Cake\Collection\CollectionInterface $questions
 * @var string[]|\Cake\Collection\CollectionInterface $examinations
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $examinationMockTestQuestion->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $examinationMockTestQuestion->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Examination Mock Test Questions'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="examinationMockTestQuestions form content">
            <?= $this->Form->create($examinationMockTestQuestion) ?>
            <fieldset>
                <legend><?= __('Edit Examination Mock Test Question') ?></legend>
                <?php
                    echo $this->Form->control('mock_test_id', ['options' => $mockTests]);
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
