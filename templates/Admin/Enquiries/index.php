<div class="main-content">
    <div class="content-wrapper">
        <section id="simple-table">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4 class="card-title"><?= __('Enquiries') ?></h4>
                         
                        </div>
                        <div class="card-body">
                            <div class="card-block">
                                <div class="tables table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Enquiry Date</th>
                                                <th>Contact Person</th>
                                                <th>Phone Number</th>
                                                <th>Email</th>
                                                <th>Message</th>
                                          
                                                <th class="actions">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $k = 1;
                                            foreach ($enquiries as $enquiry):
                                            ?>
                                                <tr>
                                                    <td><?= $k++ ?></td>
                                                    <td><?php
                                                        if ($enquiry->created_at) {
                                                        ?>
                                                            <?= date("d-m-Y", strtotime($enquiry->created_at)) ?>
                                                        <?php
                                                        }
                                                        ?></td>
                                                    <td><?= h($enquiry->contact_person_name) ?></td>
                                                    <td><?= h($enquiry->contact_person_phone) ?></td>
                                                    <td><?= h($enquiry->email) ?></td>
                                                    <td><?= h($enquiry->message) ?></td>
                                                 
                                                    <td class="actions">
                                                        <!-- <?= $this->Html->link('<span class="fa fa-edit"></span>', ['action' => 'edit', $enquiry->id], ['escape' => false, 'class' => 'btn-default', 'title' => __('Edit')]) ?> -->
                                                        <?= $this->Form->postLink('<span class="fa fa-times"></span>', ['action' => 'delete', $enquiry->id], ['confirm' => __('Are you sure you want to delete # {0}?', $enquiry->id), 'escape' => false, 'class' => 'btn-default', 'title' => __('Delete')]) ?>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <nav aria-label="Page navigation mb-3">
                                    <div class="paginator">
                                        <ul class="pagination">
                                            <?= $this->Paginator->first('<< ' . __('first')) ?>
                                            <?= $this->Paginator->prev('< ' . __('previous')) ?>
                                            <?= $this->Paginator->numbers() ?>
                                            <?= $this->Paginator->next(__('next') . ' >') ?>
                                            <?= $this->Paginator->last(__('last') . ' >>') ?>
                                        </ul>
                                        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
                                    </div>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>