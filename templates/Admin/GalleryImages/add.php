<div class="row column1">
    <div class="col-md-12">
        <div class="white_shd full margin_bottom_30">
            <div class="full graph_head">
                <div class="heading1 margin_0">
                    <h2>Add Gallery Image<small></small></h2>
                </div>
            </div>
            <div class="full price_table padding_infor_info">
                <div class="row">
                    <div class="col-lg-12">
                        <?= $this->Form->create($galleryImage, ['type' => 'file', 'class' => 'form form-horizontal', 'id' => 'myForm', 'name' => 'myForm']); ?>
                        <div class="form-body">
                            <div class="form-group row">
                                <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
                                    <?= __('Name') ?></label>
                                <div class="col-sm-9">
                                    <?= $this->Form->control('gallery_id', [
                                        'type' => 'select',
                                        'options' => $galleries,
                                        'empty' => true,
                                        'class' => 'form-control',
                                        'label' => false,
                                        'div' => false
                                    ]) ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
                                    <?= __('Gallery Image') ?></label>
                                <div class="col-sm-9">
                                    <?= $this->Form->control('image[]', [
                                        'type' => 'file',
                                        'multiple' => true,
                                        'label' => false,
                                        'div' => false,
                                        'class' => 'form-control'
                                    ]) ?>

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
                                    <?= __('Status') ?></label>
                                <div class="col-sm-9">
                                    <?= $this->Form->control('is_active', [
                                        'type' => 'select',
                                        'options' => ['0' => 'Inactive', '1' => 'Active'],
                                        'class' => 'form-control',
                                        'label' => false,
                                        'div' => false
                                    ]) ?>
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