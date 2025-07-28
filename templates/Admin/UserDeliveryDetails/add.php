<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserDeliveryDetail $userDeliveryDetail
 * @var \Cake\Collection\CollectionInterface|string[] $users
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List User Delivery Details'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="userDeliveryDetails form content">
            <?= $this->Form->create($userDeliveryDetail) ?>
            <fieldset>
                <legend><?= __('Add User Delivery Detail') ?></legend>
                <?php
                    echo $this->Form->control('user_id', ['options' => $users]);
                    echo $this->Form->control('name');
                    echo $this->Form->control('company');
                    echo $this->Form->control('address1');
                    echo $this->Form->control('address2');
                    echo $this->Form->control('country');
                    echo $this->Form->control('state');
                    echo $this->Form->control('city');
                    echo $this->Form->control('pin');
                    echo $this->Form->control('create_date', ['empty' => true]);
                    echo $this->Form->control('is_deleted');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
