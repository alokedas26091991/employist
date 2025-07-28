<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserSubscription $userSubscription
 * @var string[]|\Cake\Collection\CollectionInterface $users
 * @var string[]|\Cake\Collection\CollectionInterface $subscriptions
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $userSubscription->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $userSubscription->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List User Subscriptions'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="userSubscriptions form content">
            <?= $this->Form->create($userSubscription) ?>
            <fieldset>
                <legend><?= __('Edit User Subscription') ?></legend>
                <?php
                    echo $this->Form->control('user_id', ['options' => $users]);
                    echo $this->Form->control('subscription_id', ['options' => $subscriptions]);
                    echo $this->Form->control('start_date');
                    echo $this->Form->control('end_date');
                    echo $this->Form->control('create_date');
                    echo $this->Form->control('is_active');
                    echo $this->Form->control('is_deleted');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
