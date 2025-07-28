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
            <?= $this->Html->link(__('Edit Comment'), ['action' => 'edit', $comment->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Comment'), ['action' => 'delete', $comment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $comment->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Comments'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Comment'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="comments view content">
            <h3><?= h($comment->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($comment->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Post Id') ?></th>
                    <td><?= $this->Number->format($comment->post_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Message Date') ?></th>
                    <td><?= h($comment->message_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Admin Reply Date') ?></th>
                    <td><?= h($comment->admin_reply_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created Date') ?></th>
                    <td><?= h($comment->created_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Is Active') ?></th>
                    <td><?= $comment->is_active ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Is Deleted') ?></th>
                    <td><?= $comment->is_deleted ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Slug') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($comment->slug)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Post Name') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($comment->post_name)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Name') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($comment->name)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Email') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($comment->email)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Message') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($comment->message)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Admin Reply') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($comment->admin_reply)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
