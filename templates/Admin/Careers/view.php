<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Career $career
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Career'), ['action' => 'edit', $career->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Career'), ['action' => 'delete', $career->id], ['confirm' => __('Are you sure you want to delete # {0}?', $career->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Careers'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Career'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="careers view content">
            <h3><?= h($career->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($career->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($career->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Phone') ?></th>
                    <td><?= h($career->phone) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($career->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= $this->Number->format($career->status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Is Deleted') ?></th>
                    <td><?= $this->Number->format($career->is_deleted) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created At') ?></th>
                    <td><?= h($career->created_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated At') ?></th>
                    <td><?= h($career->updated_at) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Resume') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($career->resume)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Message') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($career->message)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
