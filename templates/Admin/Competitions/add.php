<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Competition $competition
 */
?>
<?php
use Cake\Core\Configure;
use Cake\I18n\FrozenTime;

$this->Form->setTemplates(Configure::read('Templates.form'));
$this->assign('title', __('Add') . ' ' . __('Competition'));

$global_config = (array) Configure::read('Theme.' . $prefix . '.config.template.add');
$local_config = [
	'show_pos' 			=> false,
	'show_visible'		=> false,
	'action_db_click'	=> 'edit',	// none, edit or view
	// ... more config params in: \JeffAdmin5\config\jeffadmin5.php
];
$config = array_merge($global_config, $local_config);
?>
				<div id="form-row" class="competitions row">
					<div class="col-xs-12 col-xl-10">
						<div class="card mb-3">
							<div class="card-header">

								<div class="float-start">
									<h3><i id="card-icon" class="fa fa-plus fa-spin"></i> <?= __('Add') ?>: <?= __('Competition') ?></h3>
									<?= __('The data marked with <span class="fw-bold text-danger">*</span> must be provided!') ?>
								</div>

								<div class="float-end ms-5">
									<?= $this->Html->link('<span class="btn btn-outline-secondary mt-1 me-1"><i class="fa fa-times"></i></span>',
										["controller" => "Competitions", "action" => "index", "_full" => true],
										["escape" => false, "role" => "button"]
									); ?>

								</div>

								<div class="form-tab float-end">
									<ul class="nav nav-tabs mt-1" id="myTab" role="tablist">
										<li class="nav-item" role="presentation">
											<button class="nav-link active" id="tabMain" data-bs-toggle="tab" data-bs-target="#tabPanelMain" type="button" role="tab" aria-controls="tabPanelMain" aria-selected="true"><?= __('Basic data') ?></button>
										</li>

<?php /*
										<li class="nav-item" role="presentation">
											<button class="nav-link" id="tabSecond" data-bs-toggle="tab" data-bs-target="#tabPanelSecond" type="button" role="tab" aria-controls="tabPanelSecond" aria-selected="false"><?= __('Memo') ?></button>
										</li>
										<li class="nav-item" role="presentation">
											<button class="nav-link" id="tabMore" data-bs-toggle="tab" data-bs-target="#tabPanelMore" type="button" role="tab" aria-controls="tabPanelMore" aria-selected="false"><?= __('More') ?></button>
										</li>
*/ ?>

									</ul>
								</div>

							</div>

							<?= $this->Form->create($competition, ['id' => 'main-form']) ?>
							
								<?php //= $this->Form->control('_csrfToken', ['name' => '_csrfToken', 'type' => 'hidden', 'value' => $this->request->getAttribute('csrfToken')] ) ?>

								<div class="card-body">
								
									<div class="tab-content" id="tabContent">
										
										<div class="tab-pane fade show active" id="tabPanelMain" role="tabpanel" aria-labelledby="tabMain" tabindex="0">

											<!-- 2. STRING: name: string  required -->
											<div class="mb-3 form-group row text required">
												<label class="col-form-label col-md-2 pt-1 text-start text-md-end required" for="name"><?= __('Name') ?>:</label>
												<div class="col-md-9">
													<?= $this->Form->control('name', ['label' => __('Name'), 'placeholder' => __('Name'), 'class' => 'form-control', 'empty' => false, 'autofocus' => true]); ?>

												</div>
											</div>

											<!-- 8. ELSE: description: timestamp  not in ['string', 'integer', 'datetime', 'date', 'time', 'boolean'] -->
											<?php //$this->Form->control('description', ['class' => 'form-control']); ?>
											<!-- 4. DATETIME: registration_deadline: datetime  required -->
											<div class="mb-3 row required">
												<label class="pt-2 col-form-label col-md-2 pt-1 text-start text-md-end required" for="registration-deadline"><?= __('Registration Deadline') ?>:</label>
												<div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 col-xl-4 col-xxl-4">
													<div class="form-group datetime">
														<div class="input-group registration-deadline" id="registration-deadline" data-target-input="nearest">
															<?= $this->Form->control('registration_deadline', ['type' => 'text', 'placeholder' => __('Registration Deadline'), 'class' => 'form-control', 'empty' => false]); ?>

															<div class="input-group-append" data-target="#registration-deadline" data-toggle="registration-deadline">
																<div class="input-group-text"><i class="fa fa-calendar"></i></div>
															</div>
														</div>
													</div>
												</div>
											</div>

											<!-- 7. BOOLEAN: registration_closed: boolean  required -->
											<div class="mb-3 form-group row checkbox">
												<div class="col-sm-2 col-form-label required"></div>
												<div class="col-sm-10">
													<?= $this->Form->control('registration_closed', ['empty' => false]); ?>

												</div>
											</div>

											<!-- 2. STRING: tobacco: string  required -->
											<div class="mb-3 form-group row text required">
												<label class="col-form-label col-md-2 pt-1 text-start text-md-end required" for="tobacco"><?= __('Tobacco') ?>:</label>
												<div class="col-md-9">
													<?= $this->Form->control('tobacco', ['label' => __('Tobacco'), 'placeholder' => __('Tobacco'), 'class' => 'form-control', 'empty' => false]); ?>

												</div>
											</div>

											<!-- 8. ELSE: tobacco_quantity: decimal  required not in ['string', 'integer', 'datetime', 'date', 'time', 'boolean'] -->
											<?php //$this->Form->control('tobacco_quantity', ['class' => 'form-control']); ?>
											<!-- 2. STRING: pipe: string  required -->
											<div class="mb-3 form-group row text required">
												<label class="col-form-label col-md-2 pt-1 text-start text-md-end required" for="pipe"><?= __('Pipe') ?>:</label>
												<div class="col-md-9">
													<?= $this->Form->control('pipe', ['label' => __('Pipe'), 'placeholder' => __('Pipe'), 'class' => 'form-control', 'empty' => false]); ?>

												</div>
											</div>

											<!-- 3. INTEGER: competition_fee: integer  -->
											<div class="mb-3 form-group row number required">
												<label class="col-form-label col-md-2 pt-1 text-start text-md-end" for="competition-fee"><?= __('Competition Fee') ?>:</label>
												<div class="col-xs-12 col-sm-12 col-md-5 col-lg-4 col-xl-4 col-xxl-4">
													<?= $this->Form->control('competition_fee', ['class' => 'form-control', 'placeholder' => __('Competition Fee'), 'data-decimals' => '0', 'min' => '0', 'max' => '999999999999', 'step' => '1', 'empty' => true]); ?>

												</div>
											</div>

											<!-- 7. BOOLEAN: lunch_is_included_in_the_competition_fee: boolean  -->
											<div class="mb-3 form-group row checkbox">
												<div class="col-sm-2 col-form-label"></div>
												<div class="col-sm-10">
													<?= $this->Form->control('lunch_is_included_in_the_competition_fee', ['empty' => true]); ?>

												</div>
											</div>

<?php /*
											<!-- 4. DATETIME: email_has_been_sent: datetime  -->
											<div class="mb-3 row required">
												<label class="pt-2 col-form-label col-md-2 pt-1 text-start text-md-end" for="email-has-been-sent"><?= __('Email Has Been Sent') ?>:</label>
												<div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 col-xl-4 col-xxl-4">
													<div class="form-group datetime">
														<div class="input-group email-has-been-sent" id="email-has-been-sent" data-target-input="nearest">
															<?= $this->Form->control('email_has_been_sent', ['type' => 'text', 'placeholder' => __('Email Has Been Sent'), 'class' => 'form-control', 'empty' => true]); ?>

															<div class="input-group-append" data-target="#email-has-been-sent" data-toggle="email-has-been-sent">
																<div class="input-group-text"><i class="fa fa-calendar"></i></div>
															</div>
														</div>
													</div>
												</div>
											</div>

											<!-- 6. TIME: start_of_pipe_filling: time  -->
											<div class="mb-3 row required">
												<label class="pt-2 col-form-label col-md-2 pt-1 text-start text-md-end" for="start-of-pipe-filling"><?= __('Start Of Pipe Filling') ?>:</label>
												<div class="col-xs-12 col-sm-12 col-md-5 col-lg-4 col-xl-4 col-xxl-4">
													<div class="form-group time">
														<div class="input-group start-of-pipe-filling" id="start-of-pipe-filling" data-target-input="nearest">
															<?= $this->Form->control('start_of_pipe_filling', ['type' => 'text', 'placeholder' => __('Start Of Pipe Filling'), 'class' => 'form-control', 'empty' => true, 'value' => '']); ?>

															<div class="input-group-append" data-target="#start-of-pipe-filling" data-toggle="start-of-pipe-filling">
																<div class="input-group-text"><i class="fa fa-clock-o"></i></div>
															</div>
														</div>
													</div>
												</div>
											</div>

											<!-- 6. TIME: start_of_pipe_lighting: time  -->
											<div class="mb-3 row required">
												<label class="pt-2 col-form-label col-md-2 pt-1 text-start text-md-end" for="start-of-pipe-lighting"><?= __('Start Of Pipe Lighting') ?>:</label>
												<div class="col-xs-12 col-sm-12 col-md-5 col-lg-4 col-xl-4 col-xxl-4">
													<div class="form-group time">
														<div class="input-group start-of-pipe-lighting" id="start-of-pipe-lighting" data-target-input="nearest">
															<?= $this->Form->control('start_of_pipe_lighting', ['type' => 'text', 'placeholder' => __('Start Of Pipe Lighting'), 'class' => 'form-control', 'empty' => true, 'value' => '']); ?>

															<div class="input-group-append" data-target="#start-of-pipe-lighting" data-toggle="start-of-pipe-lighting">
																<div class="input-group-text"><i class="fa fa-clock-o"></i></div>
															</div>
														</div>
													</div>
												</div>
											</div>

											<!-- 7. BOOLEAN: the_pipe_filling_must_be_repeated: boolean  -->
											<div class="mb-3 form-group row checkbox">
												<div class="col-sm-2 col-form-label"></div>
												<div class="col-sm-10">
													<?= $this->Form->control('the_pipe_filling_must_be_repeated', ['empty' => true]); ?>

												</div>
											</div>

											<!-- 7. BOOLEAN: closed_competition: boolean  -->
											<div class="mb-3 form-group row checkbox">
												<div class="col-sm-2 col-form-label"></div>
												<div class="col-sm-10">
													<?= $this->Form->control('closed_competition', ['empty' => true]); ?>

												</div>
											</div>

											<!-- 6. TIME: closing_time: time  -->
											<div class="mb-3 row required">
												<label class="pt-2 col-form-label col-md-2 pt-1 text-start text-md-end" for="closing-time"><?= __('Closing Time') ?>:</label>
												<div class="col-xs-12 col-sm-12 col-md-5 col-lg-4 col-xl-4 col-xxl-4">
													<div class="form-group time">
														<div class="input-group closing-time" id="closing-time" data-target-input="nearest">
															<?= $this->Form->control('closing_time', ['type' => 'text', 'placeholder' => __('Closing Time'), 'class' => 'form-control', 'empty' => true, 'value' => '']); ?>

															<div class="input-group-append" data-target="#closing-time" data-toggle="closing-time">
																<div class="input-group-text"><i class="fa fa-clock-o"></i></div>
															</div>
														</div>
													</div>
												</div>
											</div>
*/?>

											<!-- 3. INTEGER: maximum_number_of_clubs: integer  required -->
											<div class="mb-3 form-group row number required">
												<label class="col-form-label col-md-2 pt-1 text-start text-md-end required" for="maximum-number-of-clubs"><?= __('Maximum Number Of Clubs') ?>:</label>
												<div class="col-xs-12 col-sm-12 col-md-5 col-lg-4 col-xl-4 col-xxl-4">
													<?= $this->Form->control('maximum_number_of_clubs', ['class' => 'form-control', 'placeholder' => __('Maximum Number Of Clubs'), 'data-decimals' => '0', 'min' => '0', 'max' => '999999999999', 'step' => '1', 'empty' => false]); ?>

												</div>
											</div>

											<!-- 3. INTEGER: maximum_number_of_competitors: integer  required -->
											<div class="mb-3 form-group row number required">
												<label class="col-form-label col-md-2 pt-1 text-start text-md-end required" for="maximum-number-of-competitors"><?= __('Maximum Number Of Competitors') ?>:</label>
												<div class="col-xs-12 col-sm-12 col-md-5 col-lg-4 col-xl-4 col-xxl-4">
													<?= $this->Form->control('maximum_number_of_competitors', ['class' => 'form-control', 'placeholder' => __('Maximum Number Of Competitors'), 'data-decimals' => '0', 'min' => '0', 'max' => '999999999999', 'step' => '1', 'empty' => false]); ?>

												</div>
											</div>

											<!-- 3. INTEGER: maximum_number_of_tables: integer  required -->
											<div class="mb-3 form-group row number required">
												<label class="col-form-label col-md-2 pt-1 text-start text-md-end required" for="maximum-number-of-tables"><?= __('Maximum Number Of Tables') ?>:</label>
												<div class="col-xs-12 col-sm-12 col-md-5 col-lg-4 col-xl-4 col-xxl-4">
													<?= $this->Form->control('maximum_number_of_tables', ['class' => 'form-control', 'placeholder' => __('Maximum Number Of Tables'), 'data-decimals' => '0', 'min' => '0', 'max' => '999999999999', 'step' => '1', 'empty' => false]); ?>

												</div>
											</div>

<?php if($config['show_pos']){ ?>

											<!-- 7. BOOLEAN: visible: boolean  required -->
											<div class="mb-3 form-group row checkbox">
												<div class="col-sm-2 col-form-label required"></div>
												<div class="col-sm-10">
													<?= $this->Form->control('visible', ['empty' => false]); ?>

												</div>
											</div>
<?php } ?>
<?php if($config['show_pos']){ ?>

											<!-- 3. INTEGER: pos: integer  required -->
											<div class="mb-3 form-group row number required">
												<label class="col-form-label col-md-2 pt-1 text-start text-md-end required" for="pos"><?= __('Pos') ?>:</label>
												<div class="col-xs-12 col-sm-12 col-md-5 col-lg-4 col-xl-4 col-xxl-4">
													<?= $this->Form->control('pos', ['class' => 'form-control', 'placeholder' => __('Pos'), 'data-decimals' => '0', 'min' => '0', 'max' => '999999999999', 'step' => '1', 'empty' => false]); ?>

												</div>
											</div>
<?php } ?>

										</div><!-- /.tabPanelMain -->
										
										
<?php /*											
										<div class="tab-pane fade" id="tabPanelMore" role="tabpanel" aria-labelledby="tabMore" tabindex="0">
											<h3>More content come here...</h3>

										</div><!-- /.N.TAB -->
*/ ?>

									</div><!-- /.TAB PANEL -->
										
								</div>

								<div class="card-footer text-center">
									<?= $this->Form->button('<span class="btn-label"><i class="fa fa-save"></i></span>' . __('Save'), ["escapeTitle" => false, "type" => "submit", "class" => "btn btn-primary me-4"]) ?>
									
									<?= $this->Html->link('<span class="btn-label"><i class="fa fa-arrow-up"></i></span>' . __("Cancel"),
										["controller" => "Competitions", "action" => "index", "_full" => true],
										["escape" => false, "role" => "button", "class" => "btn btn-outline-secondary"]
									); ?>
									
								</div>

							<?= $this->Form->end() ?>

						</div><!-- end card-->
                    </div>


				</div>			


<?php
	$this->Html->css(
		[
			"jeffAdmin5./assets/plugins/tempus-dominus-6.0.0/dist/css/tempus-dominus.min",
			"jeffAdmin5./assets/plugins/summernote-0.8.18-dist/summernote-lite.min",
			"jeffAdmin5./assets/plugins/bootstrap-select-main/docs/docs/dist/css/bootstrap-select.min",
			"jeffAdmin5./assets/plugins/icheck-1.0.3/skins/all",

			// "jeffAdmin5./assets/plugins/select2-4.1.0-rc.0/dist/css/select2.min",	// If you want to use Select 2, but it's not finish!!!
			// "jeffAdmin5./assets/css/select2-bootstrap-5-theme.min",					// If you want to use Select 2, but it's not finish!!!
		],
		['block' => true]);


	$this->Html->script(
		[
			"jeffAdmin5./assets/js/popper",
			"jeffAdmin5./assets/plugins/tempus-dominus-6.0.0/dist/js/tempus-dominus.min",	// Must be loaded the popper.js !!
			"jeffAdmin5./assets/plugins/bootstrap-input-spinner-bs-5/src/bootstrap-input-spinner",
			//"jeffAdmin5./assets/plugins/summernote-0.8.18-dist/summernote-lite.min",
			//"jeffAdmin5./assets/plugins/summernote-0.8.18-dist/lang/summernote-hu-HU",
			//'jeffAdmin5./assets/plugins/jReadMore-master/dist/read-more.min',
			"jeffAdmin5./assets/plugins/bootstrap-select-main/docs/docs/dist/js/bootstrap-select.min",
			"jeffAdmin5./assets/plugins/bootstrap-select-main/docs/docs/dist/js/i18n/defaults-hu_HU.min",
			"jeffAdmin5./assets/plugins/icheck-1.0.3/icheck.min",
			
			//"jeffAdmin5./assets/plugins/jquery-copy-to-clipboard-master/jquery.copy-to-clipboard",
			
			//'jeffAdmin5./assets/plugins/select2-4.1.0-rc.0/dist/js/select2.full.min',	// If you want to use Select 2, but it's not finish!!!
			//'jeffAdmin5./assets/plugins/select2-4.1.0-rc.0/dist/js/i18n/hu',			// If you want to use Select 2, but it's not finish!!!
		],
		['block' => 'scriptBottom']
	); ?>
		
<?php
	// SELECT: https://developer.snapappointments.com/bootstrap-select/examples/
?>

<?php $this->Html->scriptStart(['block' => 'javaScriptBottom']); ?>

	jeffAdminInitInputSpinner()
	jeffAdminInitDateTimePicker('registration-deadline')
	//jeffAdminInitDateTimePicker('email-has-been-sent')
	//jeffAdminInitTimePicker('start-of-pipe-filling')
	////jeffAdminInitTimePicker('start-of-pipe-lighting')
	//jeffAdminInitTimePicker('closing-time')
	jeffAdminInitICheck('icheckbox_flat-blue');

	$(document).ready( function(){
		$('#button-submit').click( function(){
			$('#main-form').submit();
		});			
	});			

<?php $this->Html->scriptEnd(['block' => 'javaScriptBottom']); ?>
