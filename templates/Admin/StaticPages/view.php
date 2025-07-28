<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StaticPage $staticPage
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Static Page'), ['action' => 'edit', $staticPage->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Static Page'), ['action' => 'delete', $staticPage->id], ['confirm' => __('Are you sure you want to delete # {0}?', $staticPage->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Static Pages'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Static Page'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="staticPages view content">
            <h3><?= h($staticPage->page_name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Page Name') ?></th>
                    <td><?= h($staticPage->page_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Slug') ?></th>
                    <td><?= h($staticPage->slug) ?></td>
                </tr>
                <tr>
                    <th><?= __('Meta Title') ?></th>
                    <td><?= h($staticPage->meta_title) ?></td>
                </tr>
                <tr>
                    <th><?= __('Robots') ?></th>
                    <td><?= h($staticPage->robots) ?></td>
                </tr>
                <tr>
                    <th><?= __('Canonical') ?></th>
                    <td><?= h($staticPage->canonical) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($staticPage->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created By') ?></th>
                    <td><?= $staticPage->created_by === null ? '' : $this->Number->format($staticPage->created_by) ?></td>
                </tr>
                <tr>
                    <th><?= __('Last Updated By') ?></th>
                    <td><?= $staticPage->last_updated_by === null ? '' : $this->Number->format($staticPage->last_updated_by) ?></td>
                </tr>
                <tr>
                    <th><?= __('Create Date') ?></th>
                    <td><?= h($staticPage->create_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Last Update Date') ?></th>
                    <td><?= h($staticPage->last_update_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Is Deleted') ?></th>
                    <td><?= $staticPage->is_deleted ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Description') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($staticPage->description)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Meta Keywords') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($staticPage->meta_keywords)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Meta Desc') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($staticPage->meta_desc)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
