<div class="main-content">
    <div class="content-wrapper">
        <section id="simple-table">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4 class="card-title"><?= __('Our Serveice') ?></h4>
                        </div>
                        <div class="card-body">
                            <div class="card-block">
                                <div class="tables table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Image</th>
                                                <th>Tab Content</th>
                                                <th class="actions">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $k = 1;
                                            foreach ($services as $service):

                                            ?>
                                                <tr>
                                                    <td><?= $k++ ?></td>
                                                    <td><?= $service->name ?></td>


                                                    <td>
                                                        <a href="/upload/service/<?= $service->image ?>" target="_blank"><img src="/upload/service/<?= $service->image ?>" height="150" width="200" /></a>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        for ($i = 1; $i <= 10; $i++) {
                                                            $field = 'title_' . $i;
                                                            if (!empty($service->$field)) {
                                                                echo h($service->$field) . "<br>";
                                                            }
                                                        }
                                                        ?>
                                                    </td>
                                                    <td class="actions">
                                                        <?= $this->Html->link('<span class="fa fa-edit"></span>', ['action' => 'edit', $service->id], ['escape' => false, 'class' => 'btn-default', 'title' => __('Edit')]) ?>

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