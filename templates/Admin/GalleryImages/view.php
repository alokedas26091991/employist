<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\GalleryImage $galleryImage
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Gallery Image'), ['action' => 'edit', $galleryImage->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Gallery Image'), ['action' => 'delete', $galleryImage->id], ['confirm' => __('Are you sure you want to delete # {0}?', $galleryImage->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Gallery Images'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Gallery Image'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="galleryImages view content">
            <h3><?= h($galleryImage->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Gallery') ?></th>
                    <td><?= $galleryImage->has('gallery') ? $this->Html->link($galleryImage->gallery->name, ['controller' => 'Galleries', 'action' => 'view', $galleryImage->gallery->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($galleryImage->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created At') ?></th>
                    <td><?= h($galleryImage->created_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated At') ?></th>
                    <td><?= h($galleryImage->updated_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Is Active') ?></th>
                    <td><?= $galleryImage->is_active ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Is Deleted') ?></th>
                    <td><?= $galleryImage->is_deleted ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Image') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($galleryImage->image)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
