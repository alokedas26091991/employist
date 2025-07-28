

<div class="row column1" ng-app="questions" ng-controller="questionsCrt">
    <div class="col-md-12">
        <div class="white_shd full margin_bottom_30">
            <div class="full graph_head">
                <div class="heading1 margin_0">
                    <h2>Search Question<small></small></h2>
					</br>
                </div>
                <div>
<?= $this->Form->create(null,['url' => ['controller' => 'QuestionReports', 'action' => 'search']]); ?>	

 <select name="role_id" ng-model="role_id" class='form-control' convert-to-number>
    <option value="">Select Role</option>
    <option value="1">Data Entry</option>
	<option value="2">Supervisor</option>
	<option value="3">Reviewer</option>
	<option value="4">Super Reviewer</option>
	<option value="5">Manager</option>
    
</select> 
	</br>		
 <select name="user_id" ng-model="user_id" class='form-control' convert-to-number>
    <option value="">Select User</option>
    <?php foreach($listUser as $list){?><option value="<?=$list->user_id?>"><?=$list->user->name?></option><?php }?>
    
</select> 
</br>

<?= $this->Form->button(__('Search'), ['class' => 'btn btn-primary button']) ?>
</form>
                    
                    

                </div>
            </div>
            <div class="full price_table padding_infor_info">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive-sm">
                            <table class="table table-striped projects">
                                <thead class="thead-dark">
                                    <tr>
                                       
                                        <th><?= $this->Paginator->sort('Sl No') ?></th>
                                        <th><?= $this->Paginator->sort('question') ?></th>
                                        <th><?= $this->Paginator->sort('status') ?></th>
                                        <th><?= $this->Paginator->sort('date') ?></th>

                                 
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php
								  $k=0;
								  foreach($query as $q)
								  {
									  $k++;
								  ?>
                                        <tr>
											<td><?=$k?></td>
                                            <td><?=$q->question?></td>



                                            <td><?=$q->is_active==1? "Active" : "Inactive"?></td>
                                           <td><?=$q->create_date?></td>

                                           
                                        </tr>
                                   <?php
								  }
								  ?>
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
