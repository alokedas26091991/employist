<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserProductDetail $userProductDetail
 * @var \Cake\Collection\CollectionInterface|string[] $users
 * @var \Cake\Collection\CollectionInterface|string[] $userProducts
 * @var \Cake\Collection\CollectionInterface|string[] $examinations
 * @var \Cake\Collection\CollectionInterface|string[] $mockTests
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List User Product Details'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="userProductDetails form content">
            <?= $this->Form->create($userProductDetail) ?>
            <fieldset>
                <legend><?= __('Add User Product Detail') ?></legend>
                <?php
                    echo $this->Form->control('user_id', ['options' => $users]);
                    echo $this->Form->control('user_product_id', ['options' => $userProducts]);
                    echo $this->Form->control('examination_id', ['options' => $examinations]);
                    echo $this->Form->control('mock_test_id', ['options' => $mockTests]);
                    echo $this->Form->control('create_date');
                    echo $this->Form->control('is_deleted');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
