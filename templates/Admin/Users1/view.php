<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Users'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New User'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="users view content">
            <h3><?= h($user->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($user->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($user->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Department') ?></th>
                    <td><?= h($user->department) ?></td>
                </tr>
                <tr>
                    <th><?= __('Designation') ?></th>
                    <td><?= h($user->designation) ?></td>
                </tr>
                <tr>
                    <th><?= __('Gender') ?></th>
                    <td><?= h($user->gender) ?></td>
                </tr>
                <tr>
                    <th><?= __('Phone No') ?></th>
                    <td><?= h($user->phone_no) ?></td>
                </tr>
                <tr>
                    <th><?= __('Image') ?></th>
                    <td><?= h($user->image) ?></td>
                </tr>
                <tr>
                    <th><?= __('School') ?></th>
                    <td><?= h($user->school) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($user->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('User Type') ?></th>
                    <td><?= $this->Number->format($user->user_type) ?></td>
                </tr>
                <tr>
                    <th><?= __('Last Login Date') ?></th>
                    <td><?= h($user->last_login_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Create Date') ?></th>
                    <td><?= h($user->create_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Dob') ?></th>
                    <td><?= h($user->dob) ?></td>
                </tr>
                <tr>
                    <th><?= __('Is Active') ?></th>
                    <td><?= $user->is_active ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Is Deleted') ?></th>
                    <td><?= $user->is_deleted ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Carts') ?></h4>
                <?php if (!empty($user->carts)) : ?>
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
                        <?php foreach ($user->carts as $carts) : ?>
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
                <?php if (!empty($user->invoices)) : ?>
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
                        <?php foreach ($user->invoices as $invoices) : ?>
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
                <h4><?= __('Related User Branches') ?></h4>
                <?php if (!empty($user->user_branches)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Branch Id') ?></th>
                            <th><?= __('Is Active') ?></th>
                            <th><?= __('Is Deleted') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($user->user_branches as $userBranches) : ?>
                        <tr>
                            <td><?= h($userBranches->id) ?></td>
                            <td><?= h($userBranches->user_id) ?></td>
                            <td><?= h($userBranches->branch_id) ?></td>
                            <td><?= h($userBranches->is_active) ?></td>
                            <td><?= h($userBranches->is_deleted) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'UserBranches', 'action' => 'view', $userBranches->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'UserBranches', 'action' => 'edit', $userBranches->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'UserBranches', 'action' => 'delete', $userBranches->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userBranches->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related User Course Lms Details') ?></h4>
                <?php if (!empty($user->user_course_lms_details)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Course Lms Detail Id') ?></th>
                            <th><?= __('Valid Date') ?></th>
                            <th><?= __('Purchase Date') ?></th>
                            <th><?= __('Create Date') ?></th>
                            <th><?= __('Is Deleted') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($user->user_course_lms_details as $userCourseLmsDetails) : ?>
                        <tr>
                            <td><?= h($userCourseLmsDetails->id) ?></td>
                            <td><?= h($userCourseLmsDetails->user_id) ?></td>
                            <td><?= h($userCourseLmsDetails->course_lms_detail_id) ?></td>
                            <td><?= h($userCourseLmsDetails->valid_date) ?></td>
                            <td><?= h($userCourseLmsDetails->purchase_date) ?></td>
                            <td><?= h($userCourseLmsDetails->create_date) ?></td>
                            <td><?= h($userCourseLmsDetails->is_deleted) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'UserCourseLmsDetails', 'action' => 'view', $userCourseLmsDetails->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'UserCourseLmsDetails', 'action' => 'edit', $userCourseLmsDetails->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'UserCourseLmsDetails', 'action' => 'delete', $userCourseLmsDetails->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userCourseLmsDetails->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related User Examinations') ?></h4>
                <?php if (!empty($user->user_examinations)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Examination Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Time Taken') ?></th>
                            <th><?= __('Marks Obtained') ?></th>
                            <th><?= __('Attempt Date') ?></th>
                            <th><?= __('Is Last Attempted') ?></th>
                            <th><?= __('Last Attempted Question Id') ?></th>
                            <th><?= __('Is Start') ?></th>
                            <th><?= __('Is Completed') ?></th>
                            <th><?= __('Is Allow') ?></th>
                            <th><?= __('Is Deleted') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($user->user_examinations as $userExaminations) : ?>
                        <tr>
                            <td><?= h($userExaminations->id) ?></td>
                            <td><?= h($userExaminations->examination_id) ?></td>
                            <td><?= h($userExaminations->user_id) ?></td>
                            <td><?= h($userExaminations->time_taken) ?></td>
                            <td><?= h($userExaminations->marks_obtained) ?></td>
                            <td><?= h($userExaminations->attempt_date) ?></td>
                            <td><?= h($userExaminations->is_last_attempted) ?></td>
                            <td><?= h($userExaminations->last_attempted_question_id) ?></td>
                            <td><?= h($userExaminations->is_start) ?></td>
                            <td><?= h($userExaminations->is_completed) ?></td>
                            <td><?= h($userExaminations->is_allow) ?></td>
                            <td><?= h($userExaminations->is_deleted) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'UserExaminations', 'action' => 'view', $userExaminations->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'UserExaminations', 'action' => 'edit', $userExaminations->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'UserExaminations', 'action' => 'delete', $userExaminations->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userExaminations->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related User Roles') ?></h4>
                <?php if (!empty($user->user_roles)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Role Id') ?></th>
                            <th><?= __('Is Deleted') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($user->user_roles as $userRoles) : ?>
                        <tr>
                            <td><?= h($userRoles->id) ?></td>
                            <td><?= h($userRoles->user_id) ?></td>
                            <td><?= h($userRoles->role_id) ?></td>
                            <td><?= h($userRoles->is_deleted) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'UserRoles', 'action' => 'view', $userRoles->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'UserRoles', 'action' => 'edit', $userRoles->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'UserRoles', 'action' => 'delete', $userRoles->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userRoles->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related User Subscriptions') ?></h4>
                <?php if (!empty($user->user_subscriptions)) : ?>
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
                        <?php foreach ($user->user_subscriptions as $userSubscriptions) : ?>
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
