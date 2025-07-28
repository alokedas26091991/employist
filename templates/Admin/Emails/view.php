<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Email $email
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Email'), ['action' => 'edit', $email->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Email'), ['action' => 'delete', $email->id], ['confirm' => __('Are you sure you want to delete # {0}?', $email->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Emails'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Email'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="emails view content">
            <h3><?= h($email->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($email->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Subject') ?></th>
                    <td><?= h($email->subject) ?></td>
                </tr>
                <tr>
                    <th><?= __('Send From') ?></th>
                    <td><?= h($email->send_from) ?></td>
                </tr>
                <tr>
                    <th><?= __('Send From Name') ?></th>
                    <td><?= h($email->send_from_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($email->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Type') ?></th>
                    <td><?= $this->Number->format($email->type) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created By') ?></th>
                    <td><?= $email->created_by === null ? '' : $this->Number->format($email->created_by) ?></td>
                </tr>
                <tr>
                    <th><?= __('Last Updated By') ?></th>
                    <td><?= $email->last_updated_by === null ? '' : $this->Number->format($email->last_updated_by) ?></td>
                </tr>
                <tr>
                    <th><?= __('Create Date') ?></th>
                    <td><?= h($email->create_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Last Update Date') ?></th>
                    <td><?= h($email->last_update_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Is Deleted') ?></th>
                    <td><?= $email->is_deleted ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Body') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($email->body)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
