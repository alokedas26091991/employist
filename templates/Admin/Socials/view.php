<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Social $social
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Social'), ['action' => 'edit', $social->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Social'), ['action' => 'delete', $social->id], ['confirm' => __('Are you sure you want to delete # {0}?', $social->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Socials'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Social'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="socials view content">
            <h3><?= h($social->email) ?></h3>
            <table>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($social->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Phone') ?></th>
                    <td><?= h($social->phone) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($social->id) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Address') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($social->address)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Fb') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($social->fb)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Instagram') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($social->instagram)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Youtube') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($social->youtube)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Office Hour') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($social->office_hour)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
