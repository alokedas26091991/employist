<div class="row column1">
	<div class="col-md-12">
		<div class="white_shd full margin_bottom_30">
			<div class="full graph_head">
				<div class="heading1 margin_0">
					<h2>Edit Slider<small></small></h2>
				</div>
			</div>
			<div class="full price_table padding_infor_info">
				<div class="row">
					<div class="col-lg-12">
						<?= $this->Form->create($slider, ['type' => 'file', 'class' => 'form form-horizontal', 'id' => 'myForm', 'name' => 'myForm']); ?>
						<div class="form-body">
							<div class="form-group row">
								<label for="name" class="col-md-3 label-control"><?= __('Select Page') ?></label>
								<div class="col-sm-9">
									<select name="name" class="form-control" required>
										<option value="">Select Page</option>
										<option value="Home" <?= ($slider->name == 'Home') ? 'selected' : '' ?>>Home</option>
										<option value="About" <?= ($slider->name == 'About') ? 'selected' : '' ?>>About</option>
										<option value="Gallery" <?= ($slider->name == 'Gallery') ? 'selected' : '' ?>>Gallery</option>
										<option value="Services" <?= ($slider->name == 'Services') ? 'selected' : '' ?>>Services</option>
										<option value="Contact Us" <?= ($slider->name == 'Contact Us') ? 'selected' : '' ?>>Contact Us</option>
										<option value="Promotions" <?= ($slider->name == 'Promotions') ? 'selected' : '' ?>>Promotions</option>
										<option value="Signages" <?= ($slider->name == 'Signages') ? 'selected' : '' ?>>Signages</option>
										<option value="Events" <?= ($slider->name == 'Events') ? 'selected' : '' ?>>Events</option>
										<option value="Exhibition Furniture Fixtures" <?= ($slider->name == 'Exhibition Furniture Fixtures') ? 'selected' : '' ?>>Exhibition Furniture Fixtures</option>
									</select>
								</div>
							</div>
							<div class="form-group row">
								<label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
									<?= __('Slider Photo') ?></label>
								<div class="col-sm-9">
									<?php
									echo $this->Form->input('photo', ['class' => 'form-control', 'type' => 'file', 'empty' => true, 'label' => false, 'div' => false]);
									?>
								</div>
							</div>
							<!-- <div class="form-group row">
								<label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
									<?= __('Sort Order') ?></label>
								<div class="col-sm-9">
									<?php
									echo $this->Form->input('sort_order', ['type' => 'number', 'class' => 'form-control', 'empty' => true, 'label' => false, 'div' => false]);
									?>
								</div>
							</div> -->
							<?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success']) ?>
							<?= $this->Form->end() ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end row -->