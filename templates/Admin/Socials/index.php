<div class="main-content">
    <div class="content-wrapper">
        <section id="simple-table">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4 class="card-title"><?= __('Site Information') ?></h4>

                        </div>
                        <div class="card-body">
                            <div class="card-block">
                                <div class="tables table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Email</th>
                                                <th>Phone Number</th>
                                                <th>Whatsapp Number</th>
                                                <th>Address</th>
                                                <th>Facebook Link</th>
                                                <th>Instagram Link</th>
                                                <th>Youtube Link</th>
                                                <th>Office Hour</th>
                                                <th class="actions">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $k = 1;
                                            foreach ($socials as $social):
                                            ?>
                                                <tr>
                                                    <td><?= $k++ ?></td>

                                                    <td><?= h($social->email) ?></td>
                                                    <td><?= h($social->phone) ?></td>
                                                    <td><?= h($social->whatsapp_no) ?></td>
                                                    <td><?= h($social->address) ?></td>
                                                    <td><?= h($social->fb) ?></td>
                                                    <td><?= h($social->instagram) ?></td>
                                                    <td><?= h($social->youtube) ?></td>
                                                    <td><?= h($social->office_hour) ?></td>
                                                    <td class="actions">
                                                        <?= $this->Html->link('<span class="fa fa-edit"></span>', ['action' => 'edit', $social->id], ['escape' => false, 'class' => 'btn-default', 'title' => __('Edit')]) ?>
                                                        <!-- <?= $this->Form->postLink('<span class="fa fa-times"></span>', ['action' => 'delete', $social->id], ['confirm' => __('Are you sure you want to delete # {0}?', $career->id), 'escape' => false, 'class' => 'btn-default', 'title' => __('Delete')]) ?> -->
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