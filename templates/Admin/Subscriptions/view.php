<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Subscription $subscription
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Subscription'), ['action' => 'edit', $subscription->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Subscription'), ['action' => 'delete', $subscription->id], ['confirm' => __('Are you sure you want to delete # {0}?', $subscription->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Subscriptions'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Subscription'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="subscriptions view content">
            <h3><?= h($subscription->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($subscription->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Slug') ?></th>
                    <td><?= h($subscription->slug) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($subscription->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Duration') ?></th>
                    <td><?= $this->Number->format($subscription->duration) ?></td>
                </tr>
                <tr>
                    <th><?= __('Price') ?></th>
                    <td><?= $this->Number->format($subscription->price) ?></td>
                </tr>
                <tr>
                    <th><?= __('Create Date') ?></th>
                    <td><?= h($subscription->create_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Is Active') ?></th>
                    <td><?= $subscription->is_active ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Is Deleted') ?></th>
                    <td><?= $subscription->is_deleted ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Description') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($subscription->description)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Carts') ?></h4>
                <?php if (!empty($subscription->carts)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Purchase Type') ?></th>
                            <th><?= __('Course Lms Detail Id') ?></th>
                            <th><?= __('Subscription Id') ?></th>
                            <th><?= __('Invoice No') ?></th>
                            <th><?= __('Order Id') ?></th>
                            <th><?= __('Gross Amount') ?></th>
                            <th><?= __('Net Amount') ?></th>
                            <th><?= __('Tax Amount') ?></th>
                            <th><?= __('Is Subscription') ?></th>
                            <th><?= __('Is Active') ?></th>
                            <th><?= __('Create Date') ?></th>
                            <th><?= __('Is Deleted') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($subscription->carts as $carts) : ?>
                        <tr>
                            <td><?= h($carts->id) ?></td>
                            <td><?= h($carts->user_id) ?></td>
                            <td><?= h($carts->purchase_type) ?></td>
                            <td><?= h($carts->course_lms_detail_id) ?></td>
                            <td><?= h($carts->subscription_id) ?></td>
                            <td><?= h($carts->invoice_no) ?></td>
                            <td><?= h($carts->order_id) ?></td>
                            <td><?= h($carts->gross_amount) ?></td>
                            <td><?= h($carts->net_amount) ?></td>
                            <td><?= h($carts->tax_amount) ?></td>
                            <td><?= h($carts->is_subscription) ?></td>
                            <td><?= h($carts->is_active) ?></td>
                            <td><?= h($carts->create_date) ?></td>
                            <td><?= h($carts->is_deleted) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Carts', 'action' => 'view', $carts->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Carts', 'action' => 'edit', $carts->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Carts', 'action' => 'delete', $carts->id], ['confirm' => __('Are you sure you want to delete # {0}?', $carts->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Invoices') ?></h4>
                <?php if (!empty($subscription->invoices)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Order Id') ?></th>
                            <th><?= __('Purchase Type') ?></th>
                            <th><?= __('Course Lms Detail Id') ?></th>
                            <th><?= __('Subscription Id') ?></th>
                            <th><?= __('Invoice No') ?></th>
                            <th><?= __('Transaction No') ?></th>
                            <th><?= __('Gross Amount') ?></th>
                            <th><?= __('Net Amount') ?></th>
                            <th><?= __('Tax Amount') ?></th>
                            <th><?= __('Is Subscription') ?></th>
                            <th><?= __('Is Active') ?></th>
                            <th><?= __('Create Date') ?></th>
                            <th><?= __('Is Deleted') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($subscription->invoices as $invoices) : ?>
                        <tr>
                            <td><?= h($invoices->id) ?></td>
                            <td><?= h($invoices->user_id) ?></td>
                            <td><?= h($invoices->order_id) ?></td>
                            <td><?= h($invoices->purchase_type) ?></td>
                            <td><?= h($invoices->course_lms_detail_id) ?></td>
                            <td><?= h($invoices->subscription_id) ?></td>
                            <td><?= h($invoices->invoice_no) ?></td>
                            <td><?= h($invoices->transaction_no) ?></td>
                            <td><?= h($invoices->gross_amount) ?></td>
                            <td><?= h($invoices->net_amount) ?></td>
                            <td><?= h($invoices->tax_amount) ?></td>
                            <td><?= h($invoices->is_subscription) ?></td>
                            <td><?= h($invoices->is_active) ?></td>
                            <td><?= h($invoices->create_date) ?></td>
                            <td><?= h($invoices->is_deleted) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Invoices', 'action' => 'view', $invoices->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Invoices', 'action' => 'edit', $invoices->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Invoices', 'action' => 'delete', $invoices->id], ['confirm' => __('Are you sure you want to delete # {0}?', $invoices->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related User Subscriptions') ?></h4>
                <?php if (!empty($subscription->user_subscriptions)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Subscription Id') ?></th>
                            <th><?= __('Start Date') ?></th>
                            <th><?= __('End Date') ?></th>
                            <th><?= __('Create Date') ?></th>
                            <th><?= __('Is Active') ?></th>
                            <th><?= __('Is Deleted') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($subscription->user_subscriptions as $userSubscriptions) : ?>
                        <tr>
                            <td><?= h($userSubscriptions->id) ?></td>
                            <td><?= h($userSubscriptions->user_id) ?></td>
                            <td><?= h($userSubscriptions->subscription_id) ?></td>
                            <td><?= h($userSubscriptions->start_date) ?></td>
                            <td><?= h($userSubscriptions->end_date) ?></td>
                            <td><?= h($userSubscriptions->create_date) ?></td>
                            <td><?= h($userSubscriptions->is_active) ?></td>
                            <td><?= h($userSubscriptions->is_deleted) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'UserSubscriptions', 'action' => 'view', $userSubscriptions->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'UserSubscriptions', 'action' => 'edit', $userSubscriptions->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'UserSubscriptions', 'action' => 'delete', $userSubscriptions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userSubscriptions->id)]) ?>
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
