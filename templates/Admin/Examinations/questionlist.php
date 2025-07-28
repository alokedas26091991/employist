<div class="row column1">
                        <div class="col-md-12">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>Question List <small></small></h2>
                                 </div>
                                 <div>



                                    </div>
                              </div>
                              <div class="full price_table padding_infor_info">
                                 <div class="row">
                                    <div class="col-lg-12">
                                       <div class="table-responsive-sm">
                                          <table class="table table-striped projects">
                                          <thead class="thead-dark">
                                           <tr>
											<th><?= $this->Paginator->sort('sl no') ?></th>
											<th><?= $this->Paginator->sort('question') ?></th>
											<th><?= $this->Paginator->sort('Date') ?></th>
										
											<th><?= $this->Paginator->sort('status') ?></th>
									
										</tr>
                                        </thead>
                                        <tbody>
                <?php 
				$k=0;
				foreach ($question as $module):
				$k++;
				?>
                <tr>
                     <td><?= $k ?></td>
                    <td><?= $module->question->question ?></td>
                    <td><?= $module->question->create_date ?></td>
                    
                 <td><?= $module->question->is_active==1?"Active":"Inactive" ?></td>
                 
                   
                </tr>
                <?php endforeach; ?>
            </tbody>
                                          </table>
                                         
                                          
                                        

                                       </div>
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
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- end row -->
                     </div>


