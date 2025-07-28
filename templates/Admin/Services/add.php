<div class="row column1">
    <div class="col-md-12">
        <div class="white_shd full margin_bottom_30">
            <div class="full graph_head">
                <div class="heading1 margin_0">
                    <h2>Edit Service<small></small></h2>
                </div>
            </div>
            <div class="full price_table padding_infor_info">
                <div class="row">
                    <div class="col-lg-12">
                        <?= $this->Form->create($service, ['type' => 'file', 'class' => 'form form-horizontal']); ?>
                        <div class="form-body">
                             <div class="form-group row">
                                <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
                                    <?= __('Name') ?></label>
                                <div class="col-sm-9">
                                     <?php
                                    echo $this->Form->input('name', ['class' => 'form-control',  'label' => false, 'div' => false, 'required' => false]);
                                    ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
                                    <?= __('Tab Content 1') ?></label>
                                <div class="col-sm-9">
                                     <?php
                                    echo $this->Form->input('title_1', ['class' => 'form-control',  'label' => false, 'div' => false, 'required' => false]);
                                    ?>
                                </div>
                            </div>
                              <div class="form-group row">
                                <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
                                    <?= __('Tab Content 2') ?></label>
                                <div class="col-sm-9">
                                     <?php
                                    echo $this->Form->input('title_2', ['class' => 'form-control',  'label' => false, 'div' => false, 'required' => false]);
                                    ?>
                                </div>
                            </div>
                              <div class="form-group row">
                                <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
                                    <?= __('Tab Content 3') ?></label>
                                <div class="col-sm-9">
                                     <?php
                                    echo $this->Form->input('title_3', ['class' => 'form-control',  'label' => false, 'div' => false, 'required' => false]);
                                    ?>
                                </div>
                            </div>
                             <div class="form-group row">
                                <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
                                    <?= __('Tab Content 4') ?></label>
                                <div class="col-sm-9">
                                     <?php
                                    echo $this->Form->input('title_4', ['class' => 'form-control',  'label' => false, 'div' => false, 'required' => false]);
                                    ?>
                                </div>
                            </div>
                             <div class="form-group row">
                                <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
                                    <?= __('Tab Content 5') ?></label>
                                <div class="col-sm-9">
                                     <?php
                                    echo $this->Form->input('title_5', ['class' => 'form-control',  'label' => false, 'div' => false, 'required' => false]);
                                    ?>
                                </div>
                            </div>
                             <div class="form-group row">
                                <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
                                    <?= __('Tab Content 6') ?></label>
                                <div class="col-sm-9">
                                     <?php
                                    echo $this->Form->input('title_6', ['class' => 'form-control',  'label' => false, 'div' => false, 'required' => false]);
                                    ?>
                                </div>
                            </div>
                             <div class="form-group row">
                                <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
                                    <?= __('Tab Content 7') ?></label>
                                <div class="col-sm-9">
                                     <?php
                                    echo $this->Form->input('title_7', ['class' => 'form-control',  'label' => false, 'div' => false, 'required' => false]);
                                    ?>
                                </div>
                            </div>
                             <div class="form-group row">
                                <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
                                    <?= __('Tab Content 8') ?></label>
                                <div class="col-sm-9">
                                     <?php
                                    echo $this->Form->input('title_8', ['class' => 'form-control',  'label' => false, 'div' => false, 'required' => false]);
                                    ?>
                                </div>
                            </div>
                             <div class="form-group row">
                                <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
                                    <?= __('Tab Content 9') ?></label>
                                <div class="col-sm-9">
                                     <?php
                                    echo $this->Form->input('title_9', ['class' => 'form-control',  'label' => false, 'div' => false, 'required' => false]);
                                    ?>
                                </div>
                            </div>
                             <div class="form-group row">
                                <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
                                    <?= __('Tab Content 10') ?></label>
                                <div class="col-sm-9">
                                     <?php
                                    echo $this->Form->input('title_10', ['class' => 'form-control',  'label' => false, 'div' => false, 'required' => false]);
                                    ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
                                    <?= __('Image') ?></label>
                                <div class="col-sm-9">
                                     <?php
                                    echo $this->Form->input('image', ['type' => 'file', 'class' => 'form-control',  'label' => false, 'div' => false, 'required' => false]);
                                    ?>
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