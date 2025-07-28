<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Service $service
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Service'), ['action' => 'edit', $service->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Service'), ['action' => 'delete', $service->id], ['confirm' => __('Are you sure you want to delete # {0}?', $service->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Services'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Service'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="services view content">
            <h3><?= h($service->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($service->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Image') ?></th>
                    <td><?= h($service->image) ?></td>
                </tr>
                <tr>
                    <th><?= __('Title 1') ?></th>
                    <td><?= h($service->title_1) ?></td>
                </tr>
                <tr>
                    <th><?= __('Title 2') ?></th>
                    <td><?= h($service->title_2) ?></td>
                </tr>
                <tr>
                    <th><?= __('Title 3') ?></th>
                    <td><?= h($service->title_3) ?></td>
                </tr>
                <tr>
                    <th><?= __('Title 4') ?></th>
                    <td><?= h($service->title_4) ?></td>
                </tr>
                <tr>
                    <th><?= __('Title 5') ?></th>
                    <td><?= h($service->title_5) ?></td>
                </tr>
                <tr>
                    <th><?= __('Title 6') ?></th>
                    <td><?= h($service->title_6) ?></td>
                </tr>
                <tr>
                    <th><?= __('Title 7') ?></th>
                    <td><?= h($service->title_7) ?></td>
                </tr>
                <tr>
                    <th><?= __('Title 8') ?></th>
                    <td><?= h($service->title_8) ?></td>
                </tr>
                <tr>
                    <th><?= __('Title 9') ?></th>
                    <td><?= h($service->title_9) ?></td>
                </tr>
                <tr>
                    <th><?= __('Title 10') ?></th>
                    <td><?= h($service->title_10) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($service->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Align') ?></th>
                    <td><?= $this->Number->format($service->align) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
