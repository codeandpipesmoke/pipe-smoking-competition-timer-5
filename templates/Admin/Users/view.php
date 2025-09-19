<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
use Cake\Core\Configure;

$prefix = strtolower( $this->request->getParam('prefix') ?? '' );
$controller = $this->request->getParam('controller');
$action = $this->request->getParam('action');

$global_config = (array) Configure::read('Theme.' . $prefix . '.config.template.view');
$local_config = [
	// #################################### More config params in: \JeffAdmin5\config\config.php ####################################
	//'show_related_tables'	=> false,
	//'show_id' 			=> false,	// for view form
	//'show_pos' 	 		=> false,	// for view form
	//'show_counters' 		=> false,	// for view form
	//'index_show_id' 		=> false,	// for related tables
	//'index_show_visible' 	=> false,	// for related tables
	//'index_show_counters'	=> false,	// for related tables
];
$config = array_merge($global_config, $local_config);
?>
				<div class="view row">
					<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-xl-10">
						<div class="card mb-3">

							<div class="card-header">
								<div class="float-start">
									<h3><i id="card-icon" class="fa fa-eye fa-spin"></i> <?= __('View') ?>: <?= __('User') ?></h3>
									<?= __('The data marked with <span class="fw-bold text-danger">*</span> must be provided!') ?>
								</div>
								<div class="float-end ms-5">
									<?= $this->Html->link('<span class="btn btn-outline-secondary mt-1 me-1"><i class="fa fa-times"></i></span>',
										["controller" => "Users", "action" => "index", "_full" => true],
										["escape" => false, "role" => "button"]
									) ?>
								</div>

								<div class="form-tab float-end">
									<ul class="nav nav-tabs mt-1" id="myTab" role="tablist">
										<li class="nav-item" role="presentation">
											<button class="nav-link active" id="tab-first" data-bs-toggle="tab" data-bs-target="#tabPanelMain" type="button" role="tab" aria-controls="tabPanelMain" aria-selected="true"><?= __('Basic data') ?></button>
										</li>

										<li class="nav-item" role="presentation">
											<button class="nav-link" id="tabDescription" data-bs-toggle="tab" data-bs-target="#tabPanelDescription" type="button" role="tab" aria-controls="tabPanelDescription" aria-selected="false"><?= __('Description') ?></button>
										</li>
										<li class="nav-item" role="presentation">
											<button class="nav-link" id="tabAdditionalData" data-bs-toggle="tab" data-bs-target="#tabPanelAdditionalData" type="button" role="tab" aria-controls="tabPanelAdditionalData" aria-selected="false"><?= __('Additional Data') ?></button>
										</li>

<?php /*
										<li class="nav-item" role="presentation">
											<button class="nav-link" id="tab-more" data-bs-toggle="tab" data-bs-target="#tab-panel-more" type="button" role="tab" aria-controls="tab-panel-more" aria-selected="false"><?= __('More') ?></button>
										</li>
*/ ?>

										<li class="nav-item dropdown">
											<a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false"><?= __('Related tables') ?></a>
											<ul class="dropdown-menu">
<?php if (!empty($user->competitors)) : ?>
												<li><?= $this->Html->link(__('Competitors') . '...', ['controller' => 'Competitors', 'action' => 'index', 'parent', 'user', $user->id], ['class' => 'dropdown-item']) ?></li>
<?php endif ?>
<?php if (!empty($user->diplomas)) : ?>
												<li><?= $this->Html->link(__('Diplomas') . '...', ['controller' => 'Diplomas', 'action' => 'index', 'parent', 'user', $user->id], ['class' => 'dropdown-item']) ?></li>
<?php endif ?>
<?php if (!empty($user->setups)) : ?>
												<li><?= $this->Html->link(__('Setups') . '...', ['controller' => 'Setups', 'action' => 'index', 'parent', 'user', $user->id], ['class' => 'dropdown-item']) ?></li>
<?php endif ?>
											</ul>
										</li>

									</ul>
								</div>

							</div><!-- /card header -->
							
							<div class="card-body">
								<form>
									<div class="tab-content" id="tabContent"><!-- T.1. -->
										
										<div class="tab-pane fade show active" id="tabPanelMain" role="tabpanel" aria-labelledby="tab-first" tabindex="0">
<?php if($config['show_id']){ ?>
											<div class="row"><!-- 3. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end">#<?= __('id') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= $user->id ?><!-- 0.a -->
												</div>
											</div>
<?php } ?>
											<div class="row"><!-- 2. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Id') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= h($user->id) ?>

												</div>
											</div>
											<div class="row"><!-- 1. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Country') ?>:</label>
												<div class="col-sm-10 p-1 link">
													<?= $user->hasValue('country') ? $this->Html->link($user->country->name, ['controller' => 'Countries', 'action' => 'view', $user->country->id]) : '' ?><span class="external-link-icon"><i class="fa fa-external-link" aria-hidden="true"></i></span>
												</div>
											</div>
											<div class="row"><!-- 1. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Lang') ?>:</label>
												<div class="col-sm-10 p-1 link">
													<?= $user->hasValue('lang') ? $this->Html->link($user->lang->name, ['controller' => 'Langs', 'action' => 'view', $user->lang->id]) : '' ?><span class="external-link-icon"><i class="fa fa-external-link" aria-hidden="true"></i></span>
												</div>
											</div>
											<div class="row"><!-- 1. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Club') ?>:</label>
												<div class="col-sm-10 p-1 link">
													<?= $user->hasValue('club') ? $this->Html->link($user->club->name, ['controller' => 'Clubs', 'action' => 'view', $user->club->id]) : '' ?><span class="external-link-icon"><i class="fa fa-external-link" aria-hidden="true"></i></span>
												</div>
											</div>
											<div class="row"><!-- 2. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Username') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= h($user->username) ?>

												</div>
											</div>
											<div class="row"><!-- 2. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Email') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= h($user->email) ?>

												</div>
											</div>
											<div class="row"><!-- 2. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('First Name') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= h($user->first_name) ?>

												</div>
											</div>
											<div class="row"><!-- 2. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Last Name') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= h($user->last_name) ?>

												</div>
											</div>
											<div class="row"><!-- 2. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Api Token') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= h($user->api_token) ?>

												</div>
											</div>
											<div class="row"><!-- 2. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Secret') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= h($user->secret) ?>

												</div>
											</div>
											<div class="row"><!-- 2. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Role') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= h($user->role) ?>

												</div>
											</div>
											<div class="row"><!-- 4. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Token Expires') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= h($user->token_expires) ?>

												</div>
											</div>
											<div class="row"><!-- 4. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Activation Date') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= h($user->activation_date) ?>

												</div>
											</div>
											<div class="row"><!-- 4. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Tos Date') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= h($user->tos_date) ?>

												</div>
											</div>
											<div class="row"><!-- 4. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Last Login') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= h($user->last_login) ?>

												</div>
											</div>
											<div class="row"><!-- 4. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Lockout Time') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= h($user->lockout_time) ?>

												</div>
											</div>
											<div class="row"><!-- 5. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Secret Verified') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= $user->secret_verified ? '<i class="fa fa-check-square boolean-yes" aria-hidden="true"></i>' : '<i class="fa fa-square boolean-no" aria-hidden="false"></i>' ?>

												</div>
											</div>
											<div class="row"><!-- 5. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Active') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= $user->active ? '<i class="fa fa-check-square boolean-yes" aria-hidden="true"></i>' : '<i class="fa fa-square boolean-no" aria-hidden="false"></i>' ?>

												</div>
											</div>
											<div class="row"><!-- 5. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Is Superuser') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= $user->is_superuser ? '<i class="fa fa-check-square boolean-yes" aria-hidden="true"></i>' : '<i class="fa fa-square boolean-no" aria-hidden="false"></i>' ?>

												</div>
											</div>
											<div class="row"><!-- 5. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Enabled') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= $user->enabled ? '<i class="fa fa-check-square boolean-yes" aria-hidden="true"></i>' : '<i class="fa fa-square boolean-no" aria-hidden="false"></i>' ?>

												</div>
											</div>
<?php /*
											<div class="row"><!-- 6. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Description') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= $this->Text->autoParagraph(h($user->description)) ?>

												</div>
											</div>
*/ ?>
<?php /*
											<div class="row"><!-- 6. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Additional Data') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= $this->Text->autoParagraph(h($user->additional_data)) ?>

												</div>
											</div>
*/ ?>
<?php if($config['show_counters']){ ?>
											<div class="row"><!-- counter helper -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Competitor Count') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= $this->Number->format($user->competitor_count) ?><!-- 3.b -->
												</div>
											</div>
<?php } ?>

<?php if($config['show_counters']){ ?>
											<div class="row"><!-- counter helper -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Table Count') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= $this->Number->format($user->table_count) ?><!-- 3.b -->
												</div>
											</div>
<?php } ?>


										</div><!-- /.1.TAB -->
										
										<!-- TAB for: Description text field -->
										<div class="tab-pane fade" id="tabPanelDescription" role="tabpanel" aria-labelledby="tabDescription" tabindex="0">
											<div class="row">
												<div class="col-sm-12">
													<div class="row">
														<div id="readMoreDescription" class="col-sm-12 p-2 text read-more">
															<?= $this->Text->autoParagraph($user->description) ?>

														</div>
													</div>
												</div>
											</div>
										</div>
										<!-- /.TAB for: Description text field-->
										
										<!-- TAB for: Additional Data text field -->
										<div class="tab-pane fade" id="tabPanelAdditionalData" role="tabpanel" aria-labelledby="tabAdditionalData" tabindex="0">
											<div class="row">
												<div class="col-sm-12">
													<div class="row">
														<div id="readMoreAdditional Data" class="col-sm-12 p-2 text read-more">
															<?= $this->Text->autoParagraph($user->additional_data) ?>

														</div>
													</div>
												</div>
											</div>
										</div>
										<!-- /.TAB for: Additional Data text field-->
										

<?php /*
											
										<div class="tab-pane fade" id="tab-panel-more" role="tabpanel" aria-labelledby="tab-more" tabindex="0">
											<div class="row"><!-- T.3. -->
												<div class="col-sm-12">
													<h3>Tab 3 content</h3>
													
												</div>
											</div>
										</div><!-- /.3.TAB -->
*/ ?>

									</div><!-- /.TAB PANEL -->

								</form>
							</div><!-- /card body -->
									
						    <div class="card-footer">
								<!--button type="submit" class="btn btn-outline-secondary">&larr;&nbsp;Vissza a listához</button-->
							</div><!-- /card footer -->

						</div><!-- end card-->
                    </div>

				</div>

<?php /*
	############################################################################################################################################################
	#################################################################                  #########################################################################
	#################################################################  Related tebles  #########################################################################
	#################################################################                  #########################################################################
	############################################################################################################################################################
*/ ?>
<?php if($config['show_related_tables']): ?>
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
						<div class="card mb-3">

							<div class="card-header">
							
								<div class="float-start">
									<h3><i class="fa fa-table"></i> <?= __('Related tables') ?></h3>
									<?= __('Here you can see the latest records related to the above item.') ?>
								</div>

								<div class="form-tab float-end">
									<nav>
										<div class="nav nav-tabs mt-1" id="nav-tab" role="tablist">
<?php $acticeClass = " active"; ?>
<?php if (!empty($user->competitors)): ?>

											<button class="nav-link<?= $acticeClass ?>" id="nav-competitors-tab" data-bs-toggle="tab" data-bs-target="#nav-competitors" type="button" role="tab" aria-controls="nav-competitors" aria-selected="true">
												<?= __('Competitors') ?>
											</button>
<?php 	$acticeClass = ""; ?>
<?php endif ?>
<?php $acticeClass = " active"; ?>
<?php if (!empty($user->diplomas)): ?>

											<button class="nav-link<?= $acticeClass ?>" id="nav-diplomas-tab" data-bs-toggle="tab" data-bs-target="#nav-diplomas" type="button" role="tab" aria-controls="nav-diplomas" aria-selected="true">
												<?= __('Diplomas') ?>
											</button>
<?php 	$acticeClass = ""; ?>
<?php endif ?>
<?php $acticeClass = " active"; ?>
<?php if (!empty($user->setups)): ?>

											<button class="nav-link<?= $acticeClass ?>" id="nav-setups-tab" data-bs-toggle="tab" data-bs-target="#nav-setups" type="button" role="tab" aria-controls="nav-setups" aria-selected="true">
												<?= __('Setups') ?>
											</button>
<?php 	$acticeClass = ""; ?>
<?php endif ?>
										</div>
									</nav>
								</div>

							</div><!-- /card header -->
								
							<div class="card-body p-1 pb-0">

								<div class="tab-content" id="nav-tabContent">

<?php $acticeClass = " show active"; ?>
<?php if (!empty($user->competitors)): ?>

									<div class="tab-pane fade<?= $acticeClass ?> p-0" id="nav-competitors" role="tabpanel" aria-labelledby="nav-competitors-tab" tabindex="0">

										<table class="table table-responsive-xl table-hover table-striped" style="">
											<thead class="thead-info">
												<tr>
<?php if($config['index_show_id']){ ?>
													<th class="number id"><?= __('Id') ?></th>
<?php } ?>
													<th class="please-change-type competition-id"><?= __('Competition Id') ?></th>
													<th class="please-change-type user-id"><?= __('User Id') ?></th>
													<th class="please-change-type competingclub-id"><?= __('Competingclub Id') ?></th>
													<th class="please-change-type table-id"><?= __('Table Id') ?></th>
													<th class="please-change-type description"><?= __('Description') ?></th>
													<th class="please-change-type paid"><?= __('Paid') ?></th>
													<th class="please-change-type time-achieved"><?= __('Time Achieved') ?></th>
													<th class="please-change-type score"><?= __('Score') ?></th>
<?php if($config['index_show_visible']){ ?>
													<th class="boolean visible"><?= __('Visible') ?></th>
<?php } ?>
<?php if($config['index_show_pos']){ ?>
													<th class="number pos"><?= __('Pos') ?></th>
<?php } ?>
<?php if($config['index_show_counters']){ ?>
													<th class="number dinner-count"><?= __('Dinner Count') ?></th>
<?php } ?>
													<th class="please-change-type number-of-companions"><?= __('Number Of Companions') ?></th>
<?php if($config['index_show_created']){ ?>
													<th class="datetime created"><?= __('Created') ?></th>
<?php } ?>
<?php if($config['index_show_modified']){ ?>
													<th class="datetime modified"><?= __('Modified') ?></th>
<?php } ?>
													<th class="actions"><?= __('Actions') ?></th>
												</tr>
											</thead>
											<tbody>
												<?php foreach ($user->competitors as $competitors) : ?>

												<tr>
<?php if($config['index_show_id']){ ?>
													<td class="number id" value="<?= $competitors->id ?>"><?= h($competitors->id) ?></td>
<?php } ?>
													<td class="please-change-type competition-id" value="<?= $competitors->competition_id ?>"><?= h($competitors->competition_id) ?></td>
													<td class="please-change-type user-id" value="<?= $competitors->user_id ?>"><?= h($competitors->user_id) ?></td>
													<td class="please-change-type competingclub-id" value="<?= $competitors->competingclub_id ?>"><?= h($competitors->competingclub_id) ?></td>
													<td class="please-change-type table-id" value="<?= $competitors->table_id ?>"><?= h($competitors->table_id) ?></td>
													<td class="please-change-type description" value="<?= $competitors->description ?>"><?= h($competitors->description) ?></td>
													<td class="please-change-type paid" value="<?= $competitors->paid ?>"><?= h($competitors->paid) ?></td>
													<td class="please-change-type time-achieved" value="<?= $competitors->time_achieved ?>"><?= h($competitors->time_achieved) ?></td>
													<td class="please-change-type score" value="<?= $competitors->score ?>"><?= h($competitors->score) ?></td>
<?php if($config['index_show_visible']){ ?>
													<td class="boolean visible" value="<?= $competitors->visible ?>"><?= h($competitors->visible) ?></td>
<?php } ?>
<?php if($config['index_show_pos']){ ?>
													<td class="number pos" value="<?= $competitors->pos ?>"><?= h($competitors->pos) ?></td>
<?php } ?>
<?php if($config['index_show_counters']){ ?>
													<td class="number dinner-count" value="<?= $competitors->dinner_count ?>"><?= h($competitors->dinner_count) ?></td>
<?php } ?>
													<td class="please-change-type number-of-companions" value="<?= $competitors->number_of_companions ?>"><?= h($competitors->number_of_companions) ?></td>
<?php if($config['index_show_created']){ ?>
													<td class="datetime created" value="<?= $competitors->created ?>"><?= h($competitors->created) ?></td>
<?php } ?>
<?php if($config['index_show_modified']){ ?>
													<td class="datetime modified" value="<?= $competitors->modified ?>"><?= h($competitors->modified) ?></td>
<?php } ?>
													<td class="actions">
														<?= $this->Html->link('<i class="fa fa-eye"></i>', ['controller' => 'Competitors', 'action' => 'view', $competitors->id], ["escape" => false, "role" => "button",  "class" => "btn btn-warning btn-sm", "data-toggle" => "tooltip", "data-placement" => "top", "title" => __('View this item'), "data-original-title" => ""]) ?><!-- view button -->
														<?= $this->Html->link('<i class="fa fa-edit"></i>', ['controller' => 'Competitors', 'action' => 'edit', $competitors->id], ["escape" => false, "role" => "button", "class" => "btn btn-primary btn-sm", "data-toggle" => "tooltip", "data-placement" => "top", "title" => __('Edit this item'), "data-original-title" => ""]) ?><!-- edit button -->
														<?= $this->Form->postLink('<i class="fa fa-times"></i>', ['controller' => 'Competitors', 'action' => 'delete', $competitors->id], ["escape" => false, "role" => "button", "class" => "btn btn-danger btn-sm", "data-toggle" =>"tooltip", "data-placement" => "top", "title" => __('Delete this item'), "data-original-title" => "", "confirm" => __("Are you sure you want to delete # {0}?", $competitors->id)]) ?><!-- delete button -->
													</td>
												</tr>
												<?php endforeach ?>

											</tbody>
										</table>

									</div><!-- /tab pane -->
<?php 	$acticeClass = ""; ?>
<?php endif ?>
<?php $acticeClass = " show active"; ?>
<?php if (!empty($user->diplomas)): ?>

									<div class="tab-pane fade<?= $acticeClass ?> p-0" id="nav-diplomas" role="tabpanel" aria-labelledby="nav-diplomas-tab" tabindex="0">

										<table class="table table-responsive-xl table-hover table-striped" style="">
											<thead class="thead-info">
												<tr>
<?php if($config['index_show_id']){ ?>
													<th class="number id"><?= __('Id') ?></th>
<?php } ?>
													<th class="please-change-type competiting-id"><?= __('Competiting Id') ?></th>
													<th class="please-change-type user-id"><?= __('User Id') ?></th>
													<th class="please-change-type template-id"><?= __('Template Id') ?></th>
													<th class="please-change-type competitingclub-id"><?= __('Competitingclub Id') ?></th>
<?php if($config['index_show_visible']){ ?>
													<th class="boolean visible"><?= __('Visible') ?></th>
<?php } ?>
<?php if($config['index_show_pos']){ ?>
													<th class="number pos"><?= __('Pos') ?></th>
<?php } ?>
<?php if($config['index_show_created']){ ?>
													<th class="datetime created"><?= __('Created') ?></th>
<?php } ?>
<?php if($config['index_show_modified']){ ?>
													<th class="datetime modified"><?= __('Modified') ?></th>
<?php } ?>
													<th class="actions"><?= __('Actions') ?></th>
												</tr>
											</thead>
											<tbody>
												<?php foreach ($user->diplomas as $diplomas) : ?>

												<tr>
<?php if($config['index_show_id']){ ?>
													<td class="number id" value="<?= $diplomas->id ?>"><?= h($diplomas->id) ?></td>
<?php } ?>
													<td class="please-change-type competiting-id" value="<?= $diplomas->competiting_id ?>"><?= h($diplomas->competiting_id) ?></td>
													<td class="please-change-type user-id" value="<?= $diplomas->user_id ?>"><?= h($diplomas->user_id) ?></td>
													<td class="please-change-type template-id" value="<?= $diplomas->template_id ?>"><?= h($diplomas->template_id) ?></td>
													<td class="please-change-type competitingclub-id" value="<?= $diplomas->competitingclub_id ?>"><?= h($diplomas->competitingclub_id) ?></td>
<?php if($config['index_show_visible']){ ?>
													<td class="boolean visible" value="<?= $diplomas->visible ?>"><?= h($diplomas->visible) ?></td>
<?php } ?>
<?php if($config['index_show_pos']){ ?>
													<td class="number pos" value="<?= $diplomas->pos ?>"><?= h($diplomas->pos) ?></td>
<?php } ?>
<?php if($config['index_show_created']){ ?>
													<td class="datetime created" value="<?= $diplomas->created ?>"><?= h($diplomas->created) ?></td>
<?php } ?>
<?php if($config['index_show_modified']){ ?>
													<td class="datetime modified" value="<?= $diplomas->modified ?>"><?= h($diplomas->modified) ?></td>
<?php } ?>
													<td class="actions">
														<?= $this->Html->link('<i class="fa fa-eye"></i>', ['controller' => 'Diplomas', 'action' => 'view', $diplomas->id], ["escape" => false, "role" => "button",  "class" => "btn btn-warning btn-sm", "data-toggle" => "tooltip", "data-placement" => "top", "title" => __('View this item'), "data-original-title" => ""]) ?><!-- view button -->
														<?= $this->Html->link('<i class="fa fa-edit"></i>', ['controller' => 'Diplomas', 'action' => 'edit', $diplomas->id], ["escape" => false, "role" => "button", "class" => "btn btn-primary btn-sm", "data-toggle" => "tooltip", "data-placement" => "top", "title" => __('Edit this item'), "data-original-title" => ""]) ?><!-- edit button -->
														<?= $this->Form->postLink('<i class="fa fa-times"></i>', ['controller' => 'Diplomas', 'action' => 'delete', $diplomas->id], ["escape" => false, "role" => "button", "class" => "btn btn-danger btn-sm", "data-toggle" =>"tooltip", "data-placement" => "top", "title" => __('Delete this item'), "data-original-title" => "", "confirm" => __("Are you sure you want to delete # {0}?", $diplomas->id)]) ?><!-- delete button -->
													</td>
												</tr>
												<?php endforeach ?>

											</tbody>
										</table>

									</div><!-- /tab pane -->
<?php 	$acticeClass = ""; ?>
<?php endif ?>
<?php $acticeClass = " show active"; ?>
<?php if (!empty($user->setups)): ?>

									<div class="tab-pane fade<?= $acticeClass ?> p-0" id="nav-setups" role="tabpanel" aria-labelledby="nav-setups-tab" tabindex="0">

										<table class="table table-responsive-xl table-hover table-striped" style="">
											<thead class="thead-info">
												<tr>
<?php if($config['index_show_id']){ ?>
													<th class="number id"><?= __('Id') ?></th>
<?php } ?>
													<th class="please-change-type user-id"><?= __('User Id') ?></th>
													<th class="string name"><?= __('Name') ?></th>
													<th class="please-change-type slug"><?= __('Slug') ?></th>
													<th class="please-change-type value"><?= __('Value') ?></th>
													<th class="please-change-type type"><?= __('Type') ?></th>
													<th class="please-change-type editable"><?= __('Editable') ?></th>
<?php if($config['index_show_created']){ ?>
													<th class="datetime created"><?= __('Created') ?></th>
<?php } ?>
<?php if($config['index_show_modified']){ ?>
													<th class="datetime modified"><?= __('Modified') ?></th>
<?php } ?>
													<th class="actions"><?= __('Actions') ?></th>
												</tr>
											</thead>
											<tbody>
												<?php foreach ($user->setups as $setups) : ?>

												<tr>
<?php if($config['index_show_id']){ ?>
													<td class="number id" value="<?= $setups->id ?>"><?= h($setups->id) ?></td>
<?php } ?>
													<td class="please-change-type user-id" value="<?= $setups->user_id ?>"><?= h($setups->user_id) ?></td>
													<td class="string name" value="<?= $setups->name ?>"><?= h($setups->name) ?></td>
													<td class="please-change-type slug" value="<?= $setups->slug ?>"><?= h($setups->slug) ?></td>
													<td class="please-change-type value" value="<?= $setups->value ?>"><?= h($setups->value) ?></td>
													<td class="please-change-type type" value="<?= $setups->type ?>"><?= h($setups->type) ?></td>
													<td class="please-change-type editable" value="<?= $setups->editable ?>"><?= h($setups->editable) ?></td>
<?php if($config['index_show_created']){ ?>
													<td class="datetime created" value="<?= $setups->created ?>"><?= h($setups->created) ?></td>
<?php } ?>
<?php if($config['index_show_modified']){ ?>
													<td class="datetime modified" value="<?= $setups->modified ?>"><?= h($setups->modified) ?></td>
<?php } ?>
													<td class="actions">
														<?= $this->Html->link('<i class="fa fa-eye"></i>', ['controller' => 'Setups', 'action' => 'view', $setups->id], ["escape" => false, "role" => "button",  "class" => "btn btn-warning btn-sm", "data-toggle" => "tooltip", "data-placement" => "top", "title" => __('View this item'), "data-original-title" => ""]) ?><!-- view button -->
														<?= $this->Html->link('<i class="fa fa-edit"></i>', ['controller' => 'Setups', 'action' => 'edit', $setups->id], ["escape" => false, "role" => "button", "class" => "btn btn-primary btn-sm", "data-toggle" => "tooltip", "data-placement" => "top", "title" => __('Edit this item'), "data-original-title" => ""]) ?><!-- edit button -->
														<?= $this->Form->postLink('<i class="fa fa-times"></i>', ['controller' => 'Setups', 'action' => 'delete', $setups->id], ["escape" => false, "role" => "button", "class" => "btn btn-danger btn-sm", "data-toggle" =>"tooltip", "data-placement" => "top", "title" => __('Delete this item'), "data-original-title" => "", "confirm" => __("Are you sure you want to delete # {0}?", $setups->id)]) ?><!-- delete button -->
													</td>
												</tr>
												<?php endforeach ?>

											</tbody>
										</table>

									</div><!-- /tab pane -->
<?php 	$acticeClass = ""; ?>
<?php endif ?>

								</div><!-- /tab content -->

							</div><!-- /card body -->

						    <div class="card-footer">
								<!-- Bottom text! -->
							</div><!-- /card footer -->
							
						</div><!-- end card -->
                    </div><!-- end col -->
				</div><!-- end row -->
<?php endif // $config['show_related_tables'] ?>

<?php
	$this->Html->css(
		[
			//// 'JeffAdmin5./assets/plugins/',
		],
		['block' => true]
	);

	$this->Html->script(
		[
			//// 'JeffAdmin5./assets/plugins/',
			//"JeffAdmin5./assets/plugins/jquery-copy-to-clipboard-master/jquery.copy-to-clipboard",
		],
		['block' => 'scriptBottom']
	);
?>

<?php $this->Html->scriptStart(['block' => 'javaScriptBottom']) ?>

<?php $this->Html->scriptEnd() ?>
