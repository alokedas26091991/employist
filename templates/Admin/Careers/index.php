

<div class="main-content">
    <div class="content-wrapper">
        <section id="simple-table">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4 class="card-title"><?= __('Career') ?></h4>
                         
                        </div>
                        <div class="card-body">
                            <div class="card-block">
                                <div class="tables table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Enquiry Date</th>
                                                <th>Name</th>
                                                 <th>Applied For</th>
                                                <th>Phone Number</th>
                                                <th>Email</th>
                                                <th>CV</th>
                                                <th>Address</th>
                                          
                                                <th class="actions">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $k = 1;
                                            foreach ($careers as $career):
                                            ?>
                                                <tr>
                                                    <td><?= $k++ ?></td>
                                                    <td><?php
                                                        if ($career->created_at) {
                                                        ?>
                                                            <?= date("d-m-Y", strtotime($career->created_at)) ?>
                                                        <?php
                                                        }
                                                        ?></td>
                                                    <td><?= h($career->name) ?></td>
                                                    <td><?= h($career->job->title) ?></td>
                                                    <td><?= h($career->phone) ?></td>
                                                    <td><?= h($career->email) ?></td>
                                                    <td><a href="<?php echo $this->Url->image("upload/allfile/$career->resume", ['pathPrefix' => '']) ?>" download><button class="btn"><i class="fa fa-download"></i> Download</button></a></td>
                                                    <td><?= h($career->message) ?></td>
                                                 
                                                    <td class="actions">
                                                        <!-- <?= $this->Html->link('<span class="fa fa-edit"></span>', ['action' => 'edit', $career->id], ['escape' => false, 'class' => 'btn-default', 'title' => __('Edit')]) ?> -->
                                                        <?= $this->Form->postLink('<span class="fa fa-times"></span>', ['action' => 'delete', $career->id], ['confirm' => __('Are you sure you want to delete # {0}?', $career->id), 'escape' => false, 'class' => 'btn-default', 'title' => __('Delete')]) ?>
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