<div class="row column1">
    <div class="col-md-12">
        <div class="white_shd full margin_bottom_30">
            <div class="full graph_head">
                <div class="heading1 margin_0">
                    <h2>Add Question <small></small></h2>
                </div>

            </div>
            <div class="full price_table padding_infor_info">
                <div class="row">
                    <div class="col-lg-12">


                        <?= $this->Form->create($question, array('enctype' => 'multipart/form-data')); ?>





                        <div class="form-group row">		
                            <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
                                <?= __('Question') ?></label>
                            <div class="col-sm-9">
                                <?php
                                echo $this->Form->control('question', ['class' => 'form-control ckeditor', 'empty' => true, 'label' => false, 'div' => false]);
                                ?>
                            </div>
                        </div>


                        <?php
                        //pr($glossaryQuestion->glossary_answers);
                        $correct_option = [1 => 'Option 1', 2 => 'Option 2', 3 => 'Option 3', 4 => 'Option 4', 5 => 'Option 5'];
                        $i = 1;
                        $select_option = 0;

                        if ($create) {
                            $no_of_question = 5;
                        } else {
                            $no_of_question = count($question->question_answers);
                        }
                        for ($i = 1; $i <= $no_of_question; $i++) {

                            if ($create) {
                                ?>
                                <div class="form-group row">
                                    <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">Answer <?= $i ?></label>
                                    <div class="col-sm-9">
        <?= $this->Form->input('q_option[]', ['type' => 'textarea', 'id' => 'q_option_' . $i, 'class' => 'form-control ckeditor', 'label' => false, 'div' => false]); ?>
                                        <p class="help-block"></p>
                                    </div>
                                </div>
        <?php
    } else {
        //pr($glossaryQuestion->glossary_answers);
        ?>
                                <div class="form-group row">
                                    <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">Answer <?= $i ?></label>
                                    <div class="col-sm-9">
        <?php
        //echo count($glossaryQuestion->glossary_answers);
        if ($question->question_answers[$i - 1]->is_correct == 1) {

            $select_option = $i;
        }
        if ($i <= count($question->question_answers)) {
            echo $this->Form->input('q_option[]', ['type' => 'textarea', 'value' => $question->question_answers[$i - 1]->q_option, 'id' => 'q_option_' . $i, 'class' => 'form-control', 'label' => false, 'div' => false]);
        } else {
            ?>
                                            <?= $this->Form->input('q_option[]', ['type' => 'textarea', 'id' => 'q_option_' . $i, 'class' => 'form-control ckeditor', 'label' => false, 'div' => false]); ?>
                                        <?php } ?>
                                        <p class="help-block"></p>
                                    </div>
                                </div>
        <?php
    }
}
?>

                        <div class="form-group row">		
                            <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
<?= __('Select Correct Answer') ?></label>
                            <div class="col-sm-9">
                                <?php
                                echo $this->Form->control('is_correct', ['options' => $correct_option, 'empty' => 'Select Correct Answer', 'class' => 'form-control', 'label' => false, 'div' => false, 'default' => $select_option]);
                                ?>
                            </div>
                        </div>
                        <div class="form-group row">		
                            <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
							<?= __('Difficulty') ?></label>
                            <div class="col-sm-9">
                                <select name="difficulty" class="form-control">
                                    <option value="1">Easy</option>
                                    <option value="2">Medium</option>
                                    <option value="3">Hard</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">		
                            <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
<?= __('Explaination') ?></label>
                            <div class="col-sm-9">
                                <?php
                                echo $this->Form->control('explan', ['class' => 'form-control', 'empty' => true, 'label' => false, 'div' => false]);
                                ?>
                            </div>
                        </div>

			
                        <div class="form-group row">		
                            <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
<?= __('Comment') ?></label>
                            <div class="col-sm-9">
                                <?= $this->Form->control('comment', ['class' => 'form-control', 'label' => false, 'div' => false]); ?>
                            </div>
                        </div>			
						<?php
						if($this->request->getSession()->read('Auth.User.id')==1)
						{
						?>
						<div class="form-group row">		
                            <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
						<?= __('Status') ?></label>
                            <div class="col-sm-9">
                                <select name="status" class="form-control">
								  <option value="0">Inactive</option>
                                    <option value="1">Active</option>
                                   

                                </select>
                            </div>
                        </div>	
						<?php
						}
						?>




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


