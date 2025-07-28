<div class="main-content">
    <div class="content-wrapper">
        <section id="simple-table">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4 class="card-title"><?= __('Gallery') ?></h4>
                            <div>
                                <?= $this->Html->link(__('New Gallery'), ['action' => 'add'], ['class' => 'btn btn-success button float-right']) ?>

                            </div>
                        </div>

                        <div class="card-body">
                            <div class="card-block">
                                <div class="tables table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Description</th>
                                                <th>Image</th>
                                                <th>Status</th>
                                                <th class="actions">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $k = 1;
                                            foreach ($galleries as $gallery):
                                                if ($gallery->is_active == 1) {
                                                    $a = "Active";
                                                } else {
                                                    $a = "Inactive";
                                                }
                                            ?>
                                                <tr>
                                                    <td><?= $k++ ?></td>
                                                    <td><?= h($gallery->name) ?></td>
                                                    <td><?= $gallery->description ?></td>
                                                    <td>
                                                        <a href="/upload/gallery/<?= $gallery->image ?>" target="_blank"><img src="/upload/gallery/<?= $gallery->image ?>" height="100" width="100" /></a>
                                                    </td>
                                                    <td>
                                                        <span class="badge <?= $a == 'Active' ? 'bg-success' : 'bg-danger' ?>">
                                                            <?= $a ?>
                                                        </span>
                                                    </td>
                                                    <td class="actions">
                                                        <?= $this->Html->link('<span class="fa fa-edit"></span>', ['action' => 'edit', $gallery->id], ['escape' => false, 'class' => 'btn-default', 'title' => __('Edit')]) ?>
                                                        <!-- <?= $this->Form->postLink('<span class="fa fa-times"></span>', ['action' => 'delete', $gallery->id], ['confirm' => __('Are you sure you want to delete # {0}?', $enquiry->id), 'escape' => false, 'class' => 'btn-default', 'title' => __('Delete')]) ?> -->
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