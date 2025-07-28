<div class="row column1">
    <div class="col-md-12">
        <div class="white_shd full margin_bottom_30">
            <div class="full graph_head">
                <div class="heading1 margin_0">
                    <h2>Edit Site Information<small></small></h2>
                </div>
            </div>
            <div class="full price_table padding_infor_info">
                <div class="row">
                    <div class="col-lg-12">
                        <?= $this->Form->create($social, ['type' => 'file', 'class' => 'form form-horizontal', 'id' => 'myForm', 'name' => 'myForm']); ?>
                        <div class="form-body">

                            <div class="form-group row">
                                <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
                                    <?= __('Email') ?></label>
                                <div class="col-sm-9">
                                    <?php
                                    echo $this->Form->input('email', ['class' => 'form-control', 'empty' => true, 'label' => false, 'div' => false]);
                                    ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
                                    <?= __('Phone Number') ?></label>
                                <div class="col-sm-9">
                                    <?php
                                    echo $this->Form->input('phone', ['class' => 'form-control', 'empty' => true, 'label' => false, 'div' => false]);
                                    ?>
                                </div>
                            </div>
                              <div class="form-group row">
                                <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
                                    <?= __('Whatsapp Number') ?></label>
                                <div class="col-sm-9">
                                    <?php
                                    echo $this->Form->input('whatsapp_no', ['class' => 'form-control', 'empty' => true, 'label' => false, 'div' => false]);
                                    ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
                                    <?= __('Address') ?></label>
                                <div class="col-sm-9">
                                    <?php
                                    echo $this->Form->input('address', ['class' => 'form-control', 'empty' => true, 'label' => false, 'div' => false]);
                                    ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
                                    <?= __('Facebook Link') ?></label>
                                <div class="col-sm-9">
                                    <?php
                                    echo $this->Form->input('fb', ['class' => 'form-control', 'empty' => true, 'label' => false, 'div' => false]);
                                    ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
                                    <?= __('Instagram Link') ?></label>
                                <div class="col-sm-9">
                                    <?php
                                    echo $this->Form->input('instagram', ['class' => 'form-control', 'empty' => true, 'label' => false, 'div' => false]);
                                    ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
                                    <?= __('Youtube Link') ?></label>
                                <div class="col-sm-9">
                                    <?php
                                    echo $this->Form->input('youtube', ['class' => 'form-control', 'empty' => true, 'label' => false, 'div' => false]);
                                    ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
                                    <?= __('Office Hour') ?></label>
                                <div class="col-sm-9">
                                    <?php
                                    echo $this->Form->input('office_hour', ['class' => 'form-control', 'empty' => true, 'label' => false, 'div' => false]);
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
    <!-- end row -->