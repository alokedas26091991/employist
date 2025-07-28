<div class="row column1">
    <div class="col-md-12">
        <div class="white_shd full margin_bottom_30">
            <div class="full graph_head">
                <div class="heading1 margin_0">
                    <h2>Add Employee<small></small></h2>
                </div>
            </div>
            <div class="full price_table padding_infor_info">
                <div class="row">
                    <div class="col-lg-12">
                        <?= $this->Form->create($employee, array('enctype' => 'multipart/form-data')); ?>
                        <div class="form-group row">
                            <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
                                <?= __('Employee Name') ?></label>
                            <div class="col-sm-9">
                                <?php
                                echo $this->Form->control('user_id', ['options' => $users, 'class' => 'form-control', 'label' => false, 'div' => false]);
                                ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
                                <?= __('Email') ?></label>
                            <div class="col-sm-9">
                                <?php
                                echo $this->Form->control('email', ['class' => 'form-control', 'empty' => true, 'label' => false, 'div' => false]);
                                ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
                                <?= __('phone Number') ?></label>
                            <div class="col-sm-9">
                                <?php
                                echo $this->Form->control('phone', ['class' => 'form-control', 'empty' => true, 'label' => false, 'div' => false]);
                                ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
                                <?= __('Address') ?></label>
                            <div class="col-sm-9">
                                <?php
                                echo $this->Form->control('address', ['class' => 'form-control', 'empty' => true, 'label' => false, 'div' => false]);
                                ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
                                <?= __('Date of Birth') ?></label>
                            <div class="col-sm-9">
                                <?php
                                echo $this->Form->control('dob', ['class' => 'form-control', 'empty' => true, 'label' => false, 'div' => false]);
                                ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
                                <?= __('Date of Joining') ?></label>
                            <div class="col-sm-9">
                                <?php
                                echo $this->Form->control('doj', ['class' => 'form-control', 'empty' => true, 'label' => false, 'div' => false]);
                                ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
                                <?= __('Designation') ?></label>
                            <div class="col-sm-9">
                                <?php
                                echo $this->Form->control('designation', ['class' => 'form-control', 'empty' => true, 'label' => false, 'div' => false]);
                                ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
                                <?= __('Salary Details') ?></label>
                            <div class="col-sm-9">
                                <?php
                                echo $this->Form->control('salary_details', ['class' => 'form-control', 'empty' => true, 'label' => false, 'div' => false]);
                                ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
                                <?= __('Bank Name') ?></label>
                            <div class="col-sm-9">
                                <?php
                                echo $this->Form->control('bank_name', ['class' => 'form-control', 'empty' => true, 'label' => false, 'div' => false]);
                                ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
                                <?= __('Account Number') ?></label>
                            <div class="col-sm-9">
                                <?php
                                echo $this->Form->control('bank_acc_no', ['class' => 'form-control', 'empty' => true, 'label' => false, 'div' => false]);
                                ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
                                <?= __('IFSC Code') ?></label>
                            <div class="col-sm-9">
                                <?php
                                echo $this->Form->control('bank_ifsc_code', ['class' => 'form-control', 'empty' => true, 'label' => false, 'div' => false]);
                                ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
                                <?= __('Upload PAN Card') ?></label>
                            <div class="col-sm-9">
                                <?= $this->Form->control('pan_card', ['type' => 'file', 'class' => 'form-control', 'label' => false, 'div' => false]); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
                                <?= __('Upload Aadhar Card') ?></label>
                            <div class="col-sm-9">
                                <?= $this->Form->control('aadhar_card', ['type' => 'file', 'class' => 'form-control', 'label' => false, 'div' => false]); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
                                <?= __('Heighest Education Qualification') ?></label>
                            <div class="col-sm-9">
                                <?php
                                echo $this->Form->control('educational_qualifications', ['class' => 'form-control', 'empty' => true, 'label' => false, 'div' => false]);
                                ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
                                <?= __('Work Experience') ?></label>
                            <div class="col-sm-9">
                                <?php
                                echo $this->Form->control('work_experience', ['class' => 'form-control', 'empty' => true, 'label' => false, 'div' => false]);
                                ?>
                            </div>
                        </div>




                        <div class="form-group row">
                            <label for="status" class="col-md-3 label-control"><?= __('Status') ?></label>
                            <div class="col-sm-9">

                                <?php echo $this->Form->input('is_active', ['type' => 'checkbox', 'checked' => $employee->is_active == 1, 'class' => 'onoffswitch-checkbox']); ?>
                            </div>
                        </div>



                        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success']) ?>
                        <?= $this->Form->end() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end row -->
<?php $this->Html->script(['/admin_template/ckeditor/ckeditor'], ['block' => 'scriptBottom']) ?>