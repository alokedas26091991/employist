<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Comment $comment
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Comments'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="comments form content">
            <?= $this->Form->create($comment) ?>
            <fieldset>
                <legend><?= __('Add Comment') ?></legend>
                <?php
                    echo $this->Form->control('post_id');
                    echo $this->Form->control('slug');
                    echo $this->Form->control('post_name');
                    echo $this->Form->control('name');
                    echo $this->Form->control('email');
                    echo $this->Form->control('message');
                    echo $this->Form->control('message_date');
                    echo $this->Form->control('admin_reply');
                    echo $this->Form->control('admin_reply_date');
                    echo $this->Form->control('created_date');
                    echo $this->Form->control('is_active');
                    echo $this->Form->control('is_deleted');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
