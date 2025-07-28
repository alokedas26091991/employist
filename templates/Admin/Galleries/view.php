<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Gallery $gallery
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Gallery'), ['action' => 'edit', $gallery->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Gallery'), ['action' => 'delete', $gallery->id], ['confirm' => __('Are you sure you want to delete # {0}?', $gallery->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Galleries'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Gallery'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="galleries view content">
            <h3><?= h($gallery->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($gallery->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Slug') ?></th>
                    <td><?= h($gallery->slug) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($gallery->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created At') ?></th>
                    <td><?= h($gallery->created_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated At') ?></th>
                    <td><?= h($gallery->updated_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Is Active') ?></th>
                    <td><?= $gallery->is_active ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Is Deleted') ?></th>
                    <td><?= $gallery->is_deleted ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Gallery Images') ?></h4>
                <?php if (!empty($gallery->gallery_images)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Gallery Id') ?></th>
                            <th><?= __('Image') ?></th>
                            <th><?= __('Is Active') ?></th>
                            <th><?= __('Is Deleted') ?></th>
                            <th><?= __('Created At') ?></th>
                            <th><?= __('Updated At') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($gallery->gallery_images as $galleryImages) : ?>
                        <tr>
                            <td><?= h($galleryImages->id) ?></td>
                            <td><?= h($galleryImages->gallery_id) ?></td>
                            <td><?= h($galleryImages->image) ?></td>
                            <td><?= h($galleryImages->is_active) ?></td>
                            <td><?= h($galleryImages->is_deleted) ?></td>
                            <td><?= h($galleryImages->created_at) ?></td>
                            <td><?= h($galleryImages->updated_at) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'GalleryImages', 'action' => 'view', $galleryImages->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'GalleryImages', 'action' => 'edit', $galleryImages->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'GalleryImages', 'action' => 'delete', $galleryImages->id], ['confirm' => __('Are you sure you want to delete # {0}?', $galleryImages->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
