<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserProduct $userProduct
 * @var string[]|\Cake\Collection\CollectionInterface $users
 * @var string[]|\Cake\Collection\CollectionInterface $products
 * @var string[]|\Cake\Collection\CollectionInterface $examinations
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $userProduct->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $userProduct->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List User Products'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="userProducts form content">
            <?= $this->Form->create($userProduct) ?>
            <fieldset>
                <legend><?= __('Edit User Product') ?></legend>
                <?php
                    echo $this->Form->control('user_id', ['options' => $users]);
                    echo $this->Form->control('invoice_id');
                    echo $this->Form->control('product_id', ['options' => $products]);
                    echo $this->Form->control('exam_id', ['options' => $examinations, 'empty' => true]);
                    echo $this->Form->control('start_date');
                    echo $this->Form->control('end_date');
                    echo $this->Form->control('create_date');
                    echo $this->Form->control('created_by');
                    echo $this->Form->control('is_deleted');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
