<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserProductDetail $userProductDetail
 * @var string[]|\Cake\Collection\CollectionInterface $users
 * @var string[]|\Cake\Collection\CollectionInterface $userProducts
 * @var string[]|\Cake\Collection\CollectionInterface $examinations
 * @var string[]|\Cake\Collection\CollectionInterface $mockTests
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $userProductDetail->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $userProductDetail->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List User Product Details'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="userProductDetails form content">
            <?= $this->Form->create($userProductDetail) ?>
            <fieldset>
                <legend><?= __('Edit User Product Detail') ?></legend>
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
