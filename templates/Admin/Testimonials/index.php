<div class="main-content">
    <div class="content-wrapper">



        <section id="simple-table">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title"><?= $this->Html->link(__('Testimonial'), ['action' => 'index']) ?></h4>

                        </div>
                        <div class="card-body">
                            <div class="card-block">
                                <div align="right"><?= $this->Html->link('<span class="fa fa-plus"></span><span class="sr-only">' . __('Add') . '</span>', ['action' => 'add'], ['escape' => false, 'class' => 'btn  btn-default', 'title' => __('Add')]) ?></div>
                                <div class="tables">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th><?= $this->Paginator->sort('id') ?></th>
                                                <th><?= $this->Paginator->sort('name') ?></th>
                                                <th><?= $this->Paginator->sort('photo') ?></th>
                                                <th><?= $this->Paginator->sort('order') ?></th>
                                                <th><?= $this->Paginator->sort('status') ?></th>

                                                <th class="actions"><?= __('Actions') ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $k = 0;
                                            foreach ($sliders as $slider):
                                                if($slider->is_active==1){
                                                    $a='Active';
                                                }else{
                                                    $a="Inactive";
                                                }

                                                $k++;

                                            ?>
                                                <tr>
                                                    <td><?= $k ?></td>

                                                    <td><?= h($slider->name) ?></td>

                                                    <td>
                                                        <a href="/testimonial/<?= $slider->photo ?>" target="_blank"><img src="/testimonial/<?= $slider->photo ?>" height="100" width="200" /></a>

                                                    </td>
                                                    <td><?= $this->Number->format($slider->sort_order) ?></td>
                                                    <td>
                                                        <span class="badge <?= $a == 'Active' ? 'bg-success' : 'bg-danger' ?>">
                                                            <?= $a ?>
                                                        </span>
                                                    </td>

                                                    <td class="actions">

                                                        <?= $this->Html->link('<span class="fa fa-edit"></span><span class="sr-only">' . __('Edit') . '</span>', ['action' => 'edit', $slider->id], ['escape' => false, 'class' => 'btn-default', 'title' => __('Edit')]) ?>
                                                        <?= $this->Form->postLink('<span class="fa fa-times"></span><span class="sr-only">' . __('Delete') . '</span>', ['action' => 'delete', $slider->id], ['confirm' => __('Are you sure you want to delete ?'), 'escape' => false, 'class' => 'btn-default', 'title' => __('Delete')]) ?>
                                                    </td>
                                                </tr>

                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <nav aria-label="Page navigation mb-3">
                                    <div class="paginator">
                                        <ul class="pagination">
                                            <?= $this->Paginator->prev('< ' . __('previous')) ?>
                                            <?= $this->Paginator->numbers() ?>
                                            <?= $this->Paginator->next(__('next') . ' >') ?>
                                        </ul>
                                        <p><?= $this->Paginator->counter() ?></p>
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