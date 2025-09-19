<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 * @var string[]|\Cake\Collection\CollectionInterface $countries
 * @var string[]|\Cake\Collection\CollectionInterface $langs
 * @var string[]|\Cake\Collection\CollectionInterface $clubs
 */
?>
<?php
use Cake\Core\Configure;
use Cake\I18n\FrozenTime;

$this->Form->setTemplates(Configure::read('Templates.form'));
$this->assign('title', __('Edit') . ' ' . __('User'));
?>
				<div id="form-row" class="users row">
					<div class="col-xs-12 col-xl-10">
						<div class="card mb-3">
							<div class="card-header">

								<div class="float-start">
									<h3><i id="card-icon" class="fa fa-edit fa-spin"></i> <?= __('Edit') ?>: <?= __('User') ?></h3>
									<?= __('The data marked with <span class="fw-bold text-danger">*</span> must be provided!') ?>
								</div>

								<div class="float-end ms-5">
									<?= $this->Html->link('<span class="btn btn-outline-secondary mt-1 me-1"><i class="fa fa-times"></i></span>',
										["controller" => "Users", "action" => "index", "_full" => true],
										["escape" => false, "role" => "button"]
									); ?>

								</div>

								<div class="form-tab float-end">
									<ul class="nav nav-tabs mt-1" id="myTab" role="tablist">
										<li class="nav-item" role="presentation">
											<button class="nav-link active" id="tabMain" data-bs-toggle="tab" data-bs-target="#tabPanelMain" type="button" role="tab" aria-controls="tabPanelMain" aria-selected="true"><?= __('Basic data') ?></button>
										</li>

										<li class="nav-item" role="presentation">
											<button class="nav-link" id="tabDescription" data-bs-toggle="tab" data-bs-target="#tabPanelDescription" type="button" role="tab" aria-controls="tabPanelDescription" aria-selected="false"><?= __('Description') ?></button>
										</li>

										<li class="nav-item" role="presentation">
											<button class="nav-link" id="tabAdditionalData" data-bs-toggle="tab" data-bs-target="#tabPanelAdditionalData" type="button" role="tab" aria-controls="tabPanelAdditionalData" aria-selected="false"><?= __('Additional Data') ?></button>
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

							<?= $this->Form->create($user, ['id' => 'main-form']) ?>
							
								<?php //= $this->Form->control('_csrfToken', ['name' => '_csrfToken', 'type' => 'hidden', 'value' => $this->request->getAttribute('csrfToken')] ) ?>

								<div class="card-body">
								
									<div class="tab-content" id="tabContent">
										
										<div class="tab-pane fade show active" id="tabPanelMain" role="tabpanel" aria-labelledby="tabMain" tabindex="0">

											<!-- 1. SELECT: country_id: integer  required -->
											<div class="mb-3 form-group row select required">
												<label class="col-form-label col-md-2 pt-1 text-start text-md-end required" for="country-id"><?= __('Country Id') ?>:</label>
												<div class="col-md-4">
													<?= $this->Form->control('country_id', ['options' => $countries, 'placeholder' => __('Country Id'), 'class' => 'form-control select2', 'data-live-search' => false, 'data-container' => 'body', 'data-size' => '6', 'empty' => false]);	?>

												</div>
											</div>

											<!-- 1. SELECT: lang_id: integer  required -->
											<div class="mb-3 form-group row select required">
												<label class="col-form-label col-md-2 pt-1 text-start text-md-end required" for="lang-id"><?= __('Lang Id') ?>:</label>
												<div class="col-md-4">
													<?= $this->Form->control('lang_id', ['options' => $langs, 'placeholder' => __('Lang Id'), 'class' => 'form-control select2', 'data-live-search' => false, 'data-container' => 'body', 'data-size' => '6', 'empty' => false]);	?>

												</div>
											</div>

											<!-- 1. SELECT: club_id: integer  required -->
											<div class="mb-3 form-group row select required">
												<label class="col-form-label col-md-2 pt-1 text-start text-md-end required" for="club-id"><?= __('Club Id') ?>:</label>
												<div class="col-md-4">
													<?= $this->Form->control('club_id', ['options' => $clubs, 'placeholder' => __('Club Id'), 'class' => 'form-control select2', 'data-live-search' => false, 'data-container' => 'body', 'data-size' => '6', 'empty' => false]);	?>

												</div>
											</div>

											<!-- 2. STRING: username: string  -->
											<div class="mb-3 form-group row text required">
												<label class="col-form-label col-md-2 pt-1 text-start text-md-end" for="username"><?= __('Username') ?>:</label>
												<div class="col-md-9">
													<?= $this->Form->control('username', ['label' => __('Username'), 'placeholder' => __('Username'), 'class' => 'form-control', 'empty' => true]); ?>

												</div>
											</div>

											<!-- 2. STRING: email: string  -->
											<div class="mb-3 form-group row text required">
												<label class="col-form-label col-md-2 pt-1 text-start text-md-end" for="email"><?= __('Email') ?>:</label>
												<div class="col-md-9">
													<?= $this->Form->control('email', ['label' => __('Email'), 'placeholder' => __('Email'), 'class' => 'form-control', 'empty' => true]); ?>

												</div>
											</div>

											<!-- 2. STRING: password: string  required -->
											<div class="mb-3 form-group row text required">
												<label class="col-form-label col-md-2 pt-1 text-start text-md-end required" for="password"><?= __('Password') ?>:</label>
												<div class="col-md-9">
													<?= $this->Form->control('password', ['label' => __('Password'), 'placeholder' => __('Password'), 'class' => 'form-control', 'empty' => false]); ?>

												</div>
											</div>

											<!-- 2. STRING: first_name: string  -->
											<div class="mb-3 form-group row text required">
												<label class="col-form-label col-md-2 pt-1 text-start text-md-end" for="first-name"><?= __('First Name') ?>:</label>
												<div class="col-md-9">
													<?= $this->Form->control('first_name', ['label' => __('First Name'), 'placeholder' => __('First Name'), 'class' => 'form-control', 'empty' => true]); ?>

												</div>
											</div>

											<!-- 2. STRING: last_name: string  -->
											<div class="mb-3 form-group row text required">
												<label class="col-form-label col-md-2 pt-1 text-start text-md-end" for="last-name"><?= __('Last Name') ?>:</label>
												<div class="col-md-9">
													<?= $this->Form->control('last_name', ['label' => __('Last Name'), 'placeholder' => __('Last Name'), 'class' => 'form-control', 'empty' => true]); ?>

												</div>
											</div>

											<!-- 2. STRING: token: string  -->
											<div class="mb-3 form-group row text required">
												<label class="col-form-label col-md-2 pt-1 text-start text-md-end" for="token"><?= __('Token') ?>:</label>
												<div class="col-md-9">
													<?= $this->Form->control('token', ['label' => __('Token'), 'placeholder' => __('Token'), 'class' => 'form-control', 'empty' => true]); ?>

												</div>
											</div>

											<!-- 4. DATETIME: token_expires: datetime  -->
											<div class="mb-3 row required">
												<label class="pt-2 col-form-label col-md-2 pt-1 text-start text-md-end" for="token-expires"><?= __('Token Expires') ?>:</label>
												<div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 col-xl-4 col-xxl-4">
													<div class="form-group datetime">
														<div class="input-group token-expires" id="token-expires" data-target-input="nearest">
															<?= $this->Form->control('token_expires', ['type' => 'text', 'placeholder' => __('Token Expires'), 'class' => 'form-control', 'empty' => true]); ?>

															<div class="input-group-append" data-target="#token-expires" data-toggle="token-expires">
																<div class="input-group-text"><i class="fa fa-calendar"></i></div>
															</div>
														</div>
													</div>
												</div>
											</div>

											<!-- 2. STRING: api_token: string  -->
											<div class="mb-3 form-group row text required">
												<label class="col-form-label col-md-2 pt-1 text-start text-md-end" for="api-token"><?= __('Api Token') ?>:</label>
												<div class="col-md-9">
													<?= $this->Form->control('api_token', ['label' => __('Api Token'), 'placeholder' => __('Api Token'), 'class' => 'form-control', 'empty' => true]); ?>

												</div>
											</div>

											<!-- 4. DATETIME: activation_date: datetime  -->
											<div class="mb-3 row required">
												<label class="pt-2 col-form-label col-md-2 pt-1 text-start text-md-end" for="activation-date"><?= __('Activation Date') ?>:</label>
												<div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 col-xl-4 col-xxl-4">
													<div class="form-group datetime">
														<div class="input-group activation-date" id="activation-date" data-target-input="nearest">
															<?= $this->Form->control('activation_date', ['type' => 'text', 'placeholder' => __('Activation Date'), 'class' => 'form-control', 'empty' => true]); ?>

															<div class="input-group-append" data-target="#activation-date" data-toggle="activation-date">
																<div class="input-group-text"><i class="fa fa-calendar"></i></div>
															</div>
														</div>
													</div>
												</div>
											</div>

											<!-- 2. STRING: secret: string  -->
											<div class="mb-3 form-group row text required">
												<label class="col-form-label col-md-2 pt-1 text-start text-md-end" for="secret"><?= __('Secret') ?>:</label>
												<div class="col-md-9">
													<?= $this->Form->control('secret', ['label' => __('Secret'), 'placeholder' => __('Secret'), 'class' => 'form-control', 'empty' => true]); ?>

												</div>
											</div>

											<!-- 7. BOOLEAN: secret_verified: boolean  -->
											<div class="mb-3 form-group row checkbox">
												<div class="col-sm-2 col-form-label"></div>
												<div class="col-sm-10">
													<?= $this->Form->control('secret_verified', ['empty' => true]); ?>

												</div>
											</div>

											<!-- 4. DATETIME: tos_date: datetime  -->
											<div class="mb-3 row required">
												<label class="pt-2 col-form-label col-md-2 pt-1 text-start text-md-end" for="tos-date"><?= __('Tos Date') ?>:</label>
												<div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 col-xl-4 col-xxl-4">
													<div class="form-group datetime">
														<div class="input-group tos-date" id="tos-date" data-target-input="nearest">
															<?= $this->Form->control('tos_date', ['type' => 'text', 'placeholder' => __('Tos Date'), 'class' => 'form-control', 'empty' => true]); ?>

															<div class="input-group-append" data-target="#tos-date" data-toggle="tos-date">
																<div class="input-group-text"><i class="fa fa-calendar"></i></div>
															</div>
														</div>
													</div>
												</div>
											</div>

											<!-- 7. BOOLEAN: active: boolean  required -->
											<div class="mb-3 form-group row checkbox">
												<div class="col-sm-2 col-form-label required"></div>
												<div class="col-sm-10">
													<?= $this->Form->control('active', ['empty' => false]); ?>

												</div>
											</div>

											<!-- 7. BOOLEAN: is_superuser: boolean  required -->
											<div class="mb-3 form-group row checkbox">
												<div class="col-sm-2 col-form-label required"></div>
												<div class="col-sm-10">
													<?= $this->Form->control('is_superuser', ['empty' => false]); ?>

												</div>
											</div>

											<!-- 2. STRING: role: string  -->
											<div class="mb-3 form-group row text required">
												<label class="col-form-label col-md-2 pt-1 text-start text-md-end" for="role"><?= __('Role') ?>:</label>
												<div class="col-md-9">
													<?= $this->Form->control('role', ['label' => __('Role'), 'placeholder' => __('Role'), 'class' => 'form-control', 'empty' => true]); ?>

												</div>
											</div>

											<!-- 7. BOOLEAN: enabled: boolean  required -->
											<div class="mb-3 form-group row checkbox">
												<div class="col-sm-2 col-form-label required"></div>
												<div class="col-sm-10">
													<?= $this->Form->control('enabled', ['empty' => false]); ?>

												</div>
											</div>

											<!-- 4. DATETIME: last_login: datetime  -->
											<div class="mb-3 row required">
												<label class="pt-2 col-form-label col-md-2 pt-1 text-start text-md-end" for="last-login"><?= __('Last Login') ?>:</label>
												<div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 col-xl-4 col-xxl-4">
													<div class="form-group datetime">
														<div class="input-group last-login" id="last-login" data-target-input="nearest">
															<?= $this->Form->control('last_login', ['type' => 'text', 'placeholder' => __('Last Login'), 'class' => 'form-control', 'empty' => true]); ?>

															<div class="input-group-append" data-target="#last-login" data-toggle="last-login">
																<div class="input-group-text"><i class="fa fa-calendar"></i></div>
															</div>
														</div>
													</div>
												</div>
											</div>

											<!-- 4. DATETIME: lockout_time: datetime  -->
											<div class="mb-3 row required">
												<label class="pt-2 col-form-label col-md-2 pt-1 text-start text-md-end" for="lockout-time"><?= __('Lockout Time') ?>:</label>
												<div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 col-xl-4 col-xxl-4">
													<div class="form-group datetime">
														<div class="input-group lockout-time" id="lockout-time" data-target-input="nearest">
															<?= $this->Form->control('lockout_time', ['type' => 'text', 'placeholder' => __('Lockout Time'), 'class' => 'form-control', 'empty' => true]); ?>

															<div class="input-group-append" data-target="#lockout-time" data-toggle="lockout-time">
																<div class="input-group-text"><i class="fa fa-calendar"></i></div>
															</div>
														</div>
													</div>
												</div>
											</div>

											<!-- 7. BOOLEAN: visible: boolean  required -->
											<div class="mb-3 form-group row checkbox">
												<div class="col-sm-2 col-form-label required"></div>
												<div class="col-sm-10">
													<?= $this->Form->control('visible', ['empty' => false]); ?>

												</div>
											</div>

											<!-- 3. INTEGER: pos: integer  required -->
											<div class="mb-3 form-group row number required">
												<label class="col-form-label col-md-2 pt-1 text-start text-md-end required" for="pos"><?= __('Pos') ?>:</label>
												<div class="col-xs-12 col-sm-12 col-md-5 col-lg-4 col-xl-4 col-xxl-4">
													<?= $this->Form->control('pos', ['class' => 'form-control', 'placeholder' => __('Pos'), 'data-decimals' => '0', 'min' => '0', 'max' => '999999999999', 'step' => '1', 'empty' => false]); ?>

												</div>
											</div>

										</div><!-- /.tabPanelMain -->
										
										
										<!-- TabPanel: tabPanelDescription -->
										<!-- 10. TEXT: description: text  required -->
										<div class="tab-pane fade" id="tabPanelDescription" role="tabpanel" aria-labelledby="tabDescription" tabindex="0">
											<div class="row mb-3">
												<div class="col-sm-12">
													<?= $this->Form->control('description', ['id' => 'description', 'label' => false, 'class' => 'summernote', 'empty' => false]); ?>

												</div>
											</div>
										</div><!-- /.TabPanel: tabPanelDescription -->

										<!-- TabPanel: tabPanelAdditionalData -->
										<!-- 10. TEXT: additional_data: text  -->
										<div class="tab-pane fade" id="tabPanelAdditionalData" role="tabpanel" aria-labelledby="tabAdditionalData" tabindex="0">
											<div class="row mb-3">
												<div class="col-sm-12">
													<?= $this->Form->control('additional_data', ['id' => 'additional-data', 'label' => false, 'class' => 'summernote', 'empty' => true]); ?>

												</div>
											</div>
										</div><!-- /.TabPanel: tabPanelAdditionalData -->

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
										["controller" => "Users", "action" => "index", "_full" => true],
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
			"jeffAdmin5./assets/plugins/summernote-0.8.18-dist/summernote-lite.min",
			"jeffAdmin5./assets/plugins/summernote-0.8.18-dist/lang/summernote-hu-HU",
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

	jeffAdminInitSelectPicker()
	jeffAdminInitInputSpinner()
	jeffAdminInitSummerNote('description', 400, '<?= __("Here you can write the note") ?>...') // Init SummerNote for description.
	jeffAdminInitSummerNote('additional-data', 400, '<?= __("Here you can write the note") ?>...') // Init SummerNote for additional_data.
	jeffAdminInitDateTimePicker('token-expires'<?= $user->token_expires !== null ? ", '" . $user->token_expires->format('Y-m-d H:i:s') . "'" : "" ?>)
	jeffAdminInitDateTimePicker('activation-date'<?= $user->activation_date !== null ? ", '" . $user->activation_date->format('Y-m-d H:i:s') . "'" : "" ?>)
	jeffAdminInitDateTimePicker('tos-date'<?= $user->tos_date !== null ? ", '" . $user->tos_date->format('Y-m-d H:i:s') . "'" : "" ?>)
	jeffAdminInitDateTimePicker('last-login'<?= $user->last_login !== null ? ", '" . $user->last_login->format('Y-m-d H:i:s') . "'" : "" ?>)
	jeffAdminInitDateTimePicker('lockout-time'<?= $user->lockout_time !== null ? ", '" . $user->lockout_time->format('Y-m-d H:i:s') . "'" : "" ?>)
	jeffAdminInitICheck('icheckbox_flat-blue');

	$(document).ready( function(){
		$('#button-submit').click( function(){
			$('#main-form').submit();
		});			
	});			

<?php $this->Html->scriptEnd(['block' => 'javaScriptBottom']); ?>
