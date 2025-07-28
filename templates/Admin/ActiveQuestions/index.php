

<div class="row column1" ng-app="questions" ng-controller="questionsCrt">
    <div class="col-md-12">
        <div class="white_shd full margin_bottom_30">
                                <div class="full graph_head">
                                
                                 <div>

                                 <?= $this->Html->link(__('Paper Wise Question'), ['action' => 'paper'], ['target'=>'_blank','class' => 'btn btn-success button float-right']) ?>

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

                                        <th class="actions"><?= __('Actions') ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                  
                                        <tr dir-paginate="datav in data_view | itemsPerPage: recPerPage" total-items="totalItems">
                           <td>{{$index+1}}</td>
                                            <td><p ng-bind-html="datav.question"></p></td>



                                            <td>{{datav.is_active==1? "Active" : "Inactive"}}</td>
                                            <td>{{datav.create_date|date:'short'}}</td>

                                            <td class="actions">

                                               <a href="/admin/questions/edit/{{datav.id}}" ><span class="fa fa-edit"></span></a>
                                                <a href="#" ng-click="questionstatus(datav.id)" class="btn btn-success">Change Status</a>
                                                <a href="javascript:void(0)" ng-click="openModal(datav.id)"><span class="fa fa-database"></span></a>
												
											
		
                                            </td>
                                        </tr>
                                   
                                </tbody>
                            </table>




                        </div>
                        <div class="paginator">
                          
                        <dir-pagination-controls boundary-links="true" on-page-change="pageChanged(newPageNumber)"></dir-pagination-controls>
                   
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
    <div modal="showModal" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalAtert" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">


                <div class="modal-header"> <h1>Add Paper</h1> </div>
                <div class="modal-body">  
                    <div class="row"><div class="col-12">
                            <form>
                                <div class="form-group row">		
                                    <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
                                        <?= __('Category') ?></label>
                                    <div class="col-sm-9">
                                        <?php
                                        //echo $this->Form->input('category_id', ['options' => $categories,'class'=>'form-control','label' => false,'div'=>false]);
                                        ?>
                                        <select name="category_id" ng-model="examination_category_id" ng-change="categorieslist()" class='form-control' convert-to-number><option ng-repeat="c in categories" ng-value="c.id" ng-selected="c.id==category_id">{{c.name}}</option> </select>

                                    </div>
                                </div>

                                <div class="form-group row">		
                                    <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
<?= __('Paper') ?></label>
                                    <div class="col-sm-9">
                                        <?php
                                        //echo $this->Form->input('category_id', ['options' => $categories,'class'=>'form-control','label' => false,'div'=>false]);
                                        ?>
                                        <select name="examination_id" ng-model="examination_id" class='form-control' convert-to-number>
                                            <option ng-repeat="item in subcategories" ng-value="item.id" >{{item.name}}</option>

                                            ></select>

                                    </div>
                                </div>
                                <div class="form-group row"><div class="col-3"></div><div class="col-9"><a class="btn btn-success " ng-click="addData($event)">Save</a></div>	</div></form></div></div>
                    <div class="table-responsive-sm">
                        <table class="table table-striped projects">
                            <thead class="thead-dark">
                                <tr><th>#</th><th>Category</th><th>Paper</th><th>Action</th></tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="q in examinationQuestion">
                                    <td>{{$index+1}}</td>
                                    <td >{{q.examination_category.name}}</td>
                                    <td>{{q.examination.name}} </td>
                                    <td><a href="javascript:void(0);" ng-click="deleteExamination(q.id,q.question_id)"><i class="fa fa-trash"></i></a></td>
                                </tr>
                            </tbody></table></div>
                </div>

                <div class="modal-footer">
                    <button type="button" ng-click="showModal=false;" class="btn btn-default" data-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->Html->css(['/admin_template/bootstrap-multiselect-master/dist/css/bootstrap-multiselect.min', ["block" => "scriptTop"]]); ?>
<script>
    var examination_id = 0;
    var examination_category_id = 0;
     var totalRecInPage = 10;
    var categories =<?= json_encode($examinations); ?>;
    var ajxUrl = "<?= $this->Url->build('/admin/active_questions') ?>";
    var token = "<?= $this->request->getAttribute('csrfToken') ?>";

</script>
<?= $this->Html->script(['/admin_template/js/angular-1.8.2/angular.min.js','/admin_template/js/angular-1.8.2/angular-sanitize.min','/admin_template/js/angular-1.8.2/angular-animate.min', '/admin_template/js/angular-1.8.2/ui-bootstrap-tpls-2.5.0.min.js', '/admin_template/js/angular/dirPagination', '/admin_template/js/angular-1.8.2/angular-ui-bootstrap-modal.js', '/admin_template/bootstrap-multiselect-master/dist/js/bootstrap-multiselect.min', '/admin_template/js/angular/option_category.js?v=3'], ['block' => 'scriptBottom']); ?>
