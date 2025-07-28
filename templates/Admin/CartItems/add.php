<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CartItem $cartItem
 * @var \Cake\Collection\CollectionInterface|string[] $carts
 * @var \Cake\Collection\CollectionInterface|string[] $products
 * @var \Cake\Collection\CollectionInterface|string[] $examinations
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Cart Items'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="cartItems form content">
            <?= $this->Form->create($cartItem) ?>
            <fieldset>
                <legend><?= __('Add Cart Item') ?></legend>
                <?php
                    echo $this->Form->control('cart_id', ['options' => $carts]);
                    echo $this->Form->control('gross_amount');
                    echo $this->Form->control('net_amount');
                    echo $this->Form->control('discount');
                    echo $this->Form->control('tax_amount');
                    echo $this->Form->control('product_id', ['options' => $products]);
                    echo $this->Form->control('examination_id', ['options' => $examinations]);
                    echo $this->Form->control('create_date');
                    echo $this->Form->control('is_deleted');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
