<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Enquiry $enquiry
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Enquiry'), ['action' => 'edit', $enquiry->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Enquiry'), ['action' => 'delete', $enquiry->id], ['confirm' => __('Are you sure you want to delete # {0}?', $enquiry->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Enquiries'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Enquiry'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="enquiries view content">
            <h3><?= h($enquiry->company_name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Company Name') ?></th>
                    <td><?= h($enquiry->company_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Contact Person Name') ?></th>
                    <td><?= h($enquiry->contact_person_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Contact Person Phone') ?></th>
                    <td><?= h($enquiry->contact_person_phone) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($enquiry->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($enquiry->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created At') ?></th>
                    <td><?= h($enquiry->created_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated At') ?></th>
                    <td><?= h($enquiry->updated_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= $enquiry->status ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Is Deleted') ?></th>
                    <td><?= $enquiry->is_deleted ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Purpose') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($enquiry->purpose)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Message') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($enquiry->message)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
