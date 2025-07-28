<div class="main-content">
   <div class="content-wrapper">
      <section id="simple-table">
         <div class="row">
            <div class="col-sm-12">
               <div class="card">
                  <div class="card-header d-flex justify-content-between align-items-center">
                     <h4 class="card-title"><?= __('Page List') ?></h4>
                     <div>
                        <?= $this->Html->link(__('New Page'), ['action' => 'add'], ['class' => 'btn btn-success button float-right']) ?>

                     </div>
                  </div>

                  <div class="card-body">
                     <div class="card-block">
                        <div class="tables table-responsive">
                           <table class="table table-bordered">
                              <thead>
                                 <tr>
                                    <th>#</th>
                                    <th>Page Name</th>
                                        <th>Section</th>
                                    <th>Title</th>
                                    <th>Image</th>
                                    <th>Video</th>
                                    <th class="actions">Actions</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php $k = 1;
                                 foreach ($staticPages as $galleryImage):
                                    if ($galleryImage->page_name == 1) {
                                       $a = "Home";
                                    } elseif ($galleryImage->page_name == 2) {
                                       $a = "About Us";
                                    }

                                    if ($galleryImage->section == 1) {
                                       $b = "Section 1";
                                    } elseif ($galleryImage->section == 2) {
                                       $b = "Section 2";
                                    } elseif ($galleryImage->section == 3) {
                                       $b = "Section 3";}
                                       elseif ($galleryImage->section == 4) {
                                       $b = "Section 4";}
                                       elseif ($galleryImage->section == 5) {
                                       $b = "Section 5";}
                                 ?>
                                    <tr>
                                       <td><?= $k++ ?></td>
                                       <td><?= $a ?></td>
                                         <td><?= $b ?></td>
                                       <td><?= $galleryImage->title ?></td>
                                       <td>
                                          <a href="/upload/page/<?= $galleryImage->image ?>" target="_blank"><img src="/upload/page/<?= $galleryImage->image ?>" height="150" width="150" /></a>
                                       </td>
                                       <td><video width="300" height="200" controls>
                                             <source src="/upload/page/<?= h($galleryImage->image) ?>" type="video/mp4">
                                             <source src="mov_bbb.ogg" type="video/ogg">
                                             Your browser does not support HTML video.
                                          </video></td>
                                       <td class="actions">
                                          <?= $this->Html->link('<span class="fa fa-edit"></span>', ['action' => 'edit', $galleryImage->id], ['escape' => false, 'class' => 'btn-default', 'title' => __('Edit')]) ?>
                                          <!-- <?= $this->Form->postLink('<span class="fa fa-times"></span>', ['action' => 'delete', $galleryImage->id], ['confirm' => __('Are you sure you want to delete # {0}?', $galleryImage->id), 'escape' => false, 'class' => 'btn-default', 'title' => __('Delete')]) ?> -->
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