<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $chairman
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
									<h3><i id="card-icon" class="fa fa-eye fa-spin"></i> <?= __('View') ?>: <?= __('Chairman') ?></h3>
									<?= __('The data marked with <span class="fw-bold text-danger">*</span> must be provided!') ?>
								</div>
								<div class="float-end ms-5">
									<?= $this->Html->link('<span class="btn btn-outline-secondary mt-1 me-1"><i class="fa fa-times"></i></span>',
										["controller" => "Chairmans", "action" => "index", "_full" => true],
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

<?php /*
										<li class="nav-item" role="presentation">
											<button class="nav-link" id="tab-more" data-bs-toggle="tab" data-bs-target="#tab-panel-more" type="button" role="tab" aria-controls="tab-panel-more" aria-selected="false"><?= __('More') ?></button>
										</li>
*/ ?>

										<li class="nav-item dropdown">
											<a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false"><?= __('Related tables') ?></a>
											<ul class="dropdown-menu">
<?php if (!empty($chairman->social_accounts)) : ?>
												<li><?= $this->Html->link(__('Social Accounts') . '...', ['controller' => 'Social Accounts', 'action' => 'index', 'parent', 'chairman', $chairman->id], ['class' => 'dropdown-item']) ?></li>
<?php endif ?>
<?php if (!empty($chairman->clubs)) : ?>
												<li><?= $this->Html->link(__('Clubs') . '...', ['controller' => 'Clubs', 'action' => 'index', 'parent', 'chairman', $chairman->id], ['class' => 'dropdown-item']) ?></li>
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
													<?= $chairman->id ?><!-- 0.a -->
												</div>
											</div>
<?php } ?>

<?php /*
											<div class="row"><!-- 2. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Username') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= h($chairman->username) ?>

												</div>
											</div>
*/ ?>
											<div class="row"><!-- 2. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('First Name') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= h($chairman->first_name) ?>

												</div>
											</div>
											<div class="row"><!-- 2. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Last Name') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= h($chairman->last_name) ?>

												</div>
											</div>
											<div class="row"><!-- 2. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Email') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= h($chairman->email) ?>

												</div>
											</div>
<?php /*

											<div class="row"><!-- 2. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Api Token') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= h($chairman->api_token) ?>

												</div>
											</div>
											<div class="row"><!-- 2. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Secret') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= h($chairman->secret) ?>

												</div>
											</div>
*/ ?>

											<div class="row"><!-- 2. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Role') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= h($role[$chairman->role]) ?>

												</div>
											</div>
<?php /*
											<div class="row"><!-- 2. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Additional Data') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= h($chairman->additional_data) ?>

												</div>
											</div>
											<div class="row"><!-- 3. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Country Id') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= $this->Number->format($chairman->country_id) ?><!-- 3.b -->
												</div>
											</div>
											<div class="row"><!-- 3. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Lang Id') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= $this->Number->format($chairman->lang_id) ?><!-- 3.b -->
												</div>
											</div>
											<div class="row"><!-- 3. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Club Id') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= $this->Number->format($chairman->club_id) ?><!-- 3.b -->
												</div>
											</div>
											<div class="row"><!-- 4. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Token Expires') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= h($chairman->token_expires) ?>

												</div>
											</div>
											<div class="row"><!-- 4. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Activation Date') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= h($chairman->activation_date) ?>

												</div>
											</div>
											<div class="row"><!-- 4. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Tos Date') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= h($chairman->tos_date) ?>

												</div>
											</div>
*/ ?>

											<div class="row"><!-- 4. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Last Login') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= h($chairman->last_login) ?>

												</div>
											</div>
<?php /*
											<div class="row"><!-- 4. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Lockout Time') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= h($chairman->lockout_time) ?>

												</div>
											</div>
											<div class="row"><!-- 5. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Secret Verified') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= $chairman->secret_verified ? '<i class="fa fa-check-square boolean-yes" aria-hidden="true"></i>' : '<i class="fa fa-square boolean-no" aria-hidden="false"></i>' ?>

												</div>
											</div>
*/ ?>
<?php /*
											<div class="row"><!-- 5. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Active') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= $chairman->active ? '<i class="fa fa-check-square boolean-yes" aria-hidden="true"></i>' : '<i class="fa fa-square boolean-no" aria-hidden="false"></i>' ?>

												</div>
											</div>
											<div class="row"><!-- 5. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Is Superuser') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= $chairman->is_superuser ? '<i class="fa fa-check-square boolean-yes" aria-hidden="true"></i>' : '<i class="fa fa-square boolean-no" aria-hidden="false"></i>' ?>

												</div>
											</div>
											<div class="row"><!-- 5. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Enabled') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= $chairman->enabled ? '<i class="fa fa-check-square boolean-yes" aria-hidden="true"></i>' : '<i class="fa fa-square boolean-no" aria-hidden="false"></i>' ?>

												</div>
											</div>
*/ ?>

<?php /*
											<div class="row"><!-- 6. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Description') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= $this->Text->autoParagraph(h($chairman->description)) ?>

												</div>
											</div>
*/ ?>
<?php /*
<?php if($config['show_counters']){ ?>
											<div class="row"><!-- counter helper -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Competitor Count') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= $this->Number->format($chairman->competitor_count) ?><!-- 3.b -->
												</div>
											</div>
<?php } ?>

<?php if($config['show_counters']){ ?>
											<div class="row"><!-- counter helper -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Table Count') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= $this->Number->format($chairman->table_count) ?><!-- 3.b -->
												</div>
											</div>
<?php } ?>
*/ ?>

										</div><!-- /.1.TAB -->
										
										<!-- TAB for: Description text field -->
										<div class="tab-pane fade" id="tabPanelDescription" role="tabpanel" aria-labelledby="tabDescription" tabindex="0">
											<div class="row">
												<div class="col-sm-12">
													<div class="row">
														<div id="readMoreDescription" class="col-sm-12 p-2 text read-more">
															<?= $this->Text->autoParagraph($chairman->description) ?>

														</div>
													</div>
												</div>
											</div>
										</div>
										<!-- /.TAB for: Description text field-->
										

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
<?php if (!empty($chairman->social_accounts)): ?>

											<button class="nav-link<?= $acticeClass ?>" id="nav-social_accounts-tab" data-bs-toggle="tab" data-bs-target="#nav-social_accounts" type="button" role="tab" aria-controls="nav-social_accounts" aria-selected="true">
												<?= __('Social Accounts') ?>
											</button>
<?php 	$acticeClass = ""; ?>
<?php endif ?>
<?php $acticeClass = " active"; ?>
<?php if (!empty($chairman->clubs)): ?>

											<button class="nav-link<?= $acticeClass ?>" id="nav-clubs-tab" data-bs-toggle="tab" data-bs-target="#nav-clubs" type="button" role="tab" aria-controls="nav-clubs" aria-selected="true">
												<?= __('Clubs') ?>
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
<?php if (!empty($chairman->social_accounts)): ?>

									<div class="tab-pane fade<?= $acticeClass ?> p-0" id="nav-social_accounts" role="tabpanel" aria-labelledby="nav-social_accounts-tab" tabindex="0">

										<table class="table table-responsive-xl table-hover table-striped" style="">
											<thead class="thead-info">
												<tr>
<?php if($config['index_show_id']){ ?>
													<th class="number id"><?= __('Id') ?></th>
<?php } ?>
													<th class="please-change-type user-id"><?= __('User Id') ?></th>
													<th class="please-change-type provider"><?= __('Provider') ?></th>
													<th class="please-change-type username"><?= __('Username') ?></th>
													<th class="please-change-type reference"><?= __('Reference') ?></th>
													<th class="please-change-type avatar"><?= __('Avatar') ?></th>
													<th class="please-change-type description"><?= __('Description') ?></th>
													<th class="please-change-type link"><?= __('Link') ?></th>
													<th class="please-change-type token"><?= __('Token') ?></th>
													<th class="please-change-type token-secret"><?= __('Token Secret') ?></th>
													<th class="please-change-type token-expires"><?= __('Token Expires') ?></th>
													<th class="please-change-type active"><?= __('Active') ?></th>
													<th class="please-change-type data"><?= __('Data') ?></th>
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
												<?php foreach ($chairman->social_accounts as $socialAccounts) : ?>

												<tr>
<?php if($config['index_show_id']){ ?>
													<td class="number id" value="<?= $socialAccounts->id ?>"><?= h($socialAccounts->id) ?></td>
<?php } ?>
													<td class="please-change-type user-id" value="<?= $socialAccounts->user_id ?>"><?= h($socialAccounts->user_id) ?></td>
													<td class="please-change-type provider" value="<?= $socialAccounts->provider ?>"><?= h($socialAccounts->provider) ?></td>
													<td class="please-change-type username" value="<?= $socialAccounts->username ?>"><?= h($socialAccounts->username) ?></td>
													<td class="please-change-type reference" value="<?= $socialAccounts->reference ?>"><?= h($socialAccounts->reference) ?></td>
													<td class="please-change-type avatar" value="<?= $socialAccounts->avatar ?>"><?= h($socialAccounts->avatar) ?></td>
													<td class="please-change-type description" value="<?= $socialAccounts->description ?>"><?= h($socialAccounts->description) ?></td>
													<td class="please-change-type link" value="<?= $socialAccounts->link ?>"><?= h($socialAccounts->link) ?></td>
													<td class="please-change-type token" value="<?= $socialAccounts->token ?>"><?= h($socialAccounts->token) ?></td>
													<td class="please-change-type token-secret" value="<?= $socialAccounts->token_secret ?>"><?= h($socialAccounts->token_secret) ?></td>
													<td class="please-change-type token-expires" value="<?= $socialAccounts->token_expires ?>"><?= h($socialAccounts->token_expires) ?></td>
													<td class="please-change-type active" value="<?= $socialAccounts->active ?>"><?= h($socialAccounts->active) ?></td>
													<td class="please-change-type data" value="<?= $socialAccounts->data ?>"><?= h($socialAccounts->data) ?></td>
<?php if($config['index_show_created']){ ?>
													<td class="datetime created" value="<?= $socialAccounts->created ?>"><?= h($socialAccounts->created) ?></td>
<?php } ?>
<?php if($config['index_show_modified']){ ?>
													<td class="datetime modified" value="<?= $socialAccounts->modified ?>"><?= h($socialAccounts->modified) ?></td>
<?php } ?>
													<td class="actions">
														<?= $this->Html->link('<i class="fa fa-eye"></i>', ['controller' => 'SocialAccounts', 'action' => 'view', $socialAccounts->id], ["escape" => false, "role" => "button",  "class" => "btn btn-warning btn-sm", "data-toggle" => "tooltip", "data-placement" => "top", "title" => __('View this item'), "data-original-title" => ""]) ?><!-- view button -->
														<?= $this->Html->link('<i class="fa fa-edit"></i>', ['controller' => 'SocialAccounts', 'action' => 'edit', $socialAccounts->id], ["escape" => false, "role" => "button", "class" => "btn btn-primary btn-sm", "data-toggle" => "tooltip", "data-placement" => "top", "title" => __('Edit this item'), "data-original-title" => ""]) ?><!-- edit button -->
														<?= $this->Form->postLink('<i class="fa fa-times"></i>', ['controller' => 'SocialAccounts', 'action' => 'delete', $socialAccounts->id], ["escape" => false, "role" => "button", "class" => "btn btn-danger btn-sm", "data-toggle" =>"tooltip", "data-placement" => "top", "title" => __('Delete this item'), "data-original-title" => "", "confirm" => __("Are you sure you want to delete # {0}?", $socialAccounts->id)]) ?><!-- delete button -->
													</td>
												</tr>
												<?php endforeach ?>

											</tbody>
										</table>

									</div><!-- /tab pane -->
<?php 	$acticeClass = ""; ?>
<?php endif ?>
<?php $acticeClass = " show active"; ?>
<?php if (!empty($chairman->clubs)): ?>

									<div class="tab-pane fade<?= $acticeClass ?> p-0" id="nav-clubs" role="tabpanel" aria-labelledby="nav-clubs-tab" tabindex="0">

										<table class="table table-responsive-xl table-hover table-striped" style="">
											<thead class="thead-info">
												<tr>
<?php if($config['index_show_id']){ ?>
													<th class="number id"><?= __('Id') ?></th>
<?php } ?>
													<th class="please-change-type country-id"><?= __('Country Id') ?></th>
													<th class="please-change-type chairman-id"><?= __('Chairman Id') ?></th>
													<th class="string name"><?= __('Name') ?></th>
													<th class="please-change-type description"><?= __('Description') ?></th>
													<th class="please-change-type email"><?= __('Email') ?></th>
													<th class="please-change-type web"><?= __('Web') ?></th>
<?php if($config['index_show_visible']){ ?>
													<th class="boolean visible"><?= __('Visible') ?></th>
<?php } ?>
<?php if($config['index_show_pos']){ ?>
													<th class="number pos"><?= __('Pos') ?></th>
<?php } ?>
<?php if($config['index_show_counters']){ ?>
													<th class="number user-count"><?= __('User Count') ?></th>
<?php } ?>
<?php if($config['index_show_counters']){ ?>
													<th class="number competingclub-count"><?= __('Competingclub Count') ?></th>
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
												<?php foreach ($chairman->clubs as $clubs) : ?>

												<tr>
<?php if($config['index_show_id']){ ?>
													<td class="number id" value="<?= $clubs->id ?>"><?= h($clubs->id) ?></td>
<?php } ?>
													<td class="please-change-type country-id" value="<?= $clubs->country_id ?>"><?= h($clubs->country_id) ?></td>
													<td class="please-change-type chairman-id" value="<?= $clubs->chairman_id ?>"><?= h($clubs->chairman_id) ?></td>
													<td class="string name" value="<?= $clubs->name ?>"><?= h($clubs->name) ?></td>
													<td class="please-change-type description" value="<?= $clubs->description ?>"><?= h($clubs->description) ?></td>
													<td class="please-change-type email" value="<?= $clubs->email ?>"><?= h($clubs->email) ?></td>
													<td class="please-change-type web" value="<?= $clubs->web ?>"><?= h($clubs->web) ?></td>
<?php if($config['index_show_visible']){ ?>
													<td class="boolean visible" value="<?= $clubs->visible ?>"><?= h($clubs->visible) ?></td>
<?php } ?>
<?php if($config['index_show_pos']){ ?>
													<td class="number pos" value="<?= $clubs->pos ?>"><?= h($clubs->pos) ?></td>
<?php } ?>
<?php if($config['index_show_counters']){ ?>
													<td class="number user-count" value="<?= $clubs->user_count ?>"><?= h($clubs->user_count) ?></td>
<?php } ?>
<?php if($config['index_show_counters']){ ?>
													<td class="number competingclub-count" value="<?= $clubs->competingclub_count ?>"><?= h($clubs->competingclub_count) ?></td>
<?php } ?>
<?php if($config['index_show_created']){ ?>
													<td class="datetime created" value="<?= $clubs->created ?>"><?= h($clubs->created) ?></td>
<?php } ?>
<?php if($config['index_show_modified']){ ?>
													<td class="datetime modified" value="<?= $clubs->modified ?>"><?= h($clubs->modified) ?></td>
<?php } ?>
													<td class="actions">
														<?= $this->Html->link('<i class="fa fa-eye"></i>', ['controller' => 'Clubs', 'action' => 'view', $clubs->id], ["escape" => false, "role" => "button",  "class" => "btn btn-warning btn-sm", "data-toggle" => "tooltip", "data-placement" => "top", "title" => __('View this item'), "data-original-title" => ""]) ?><!-- view button -->
														<?= $this->Html->link('<i class="fa fa-edit"></i>', ['controller' => 'Clubs', 'action' => 'edit', $clubs->id], ["escape" => false, "role" => "button", "class" => "btn btn-primary btn-sm", "data-toggle" => "tooltip", "data-placement" => "top", "title" => __('Edit this item'), "data-original-title" => ""]) ?><!-- edit button -->
														<?= $this->Form->postLink('<i class="fa fa-times"></i>', ['controller' => 'Clubs', 'action' => 'delete', $clubs->id], ["escape" => false, "role" => "button", "class" => "btn btn-danger btn-sm", "data-toggle" =>"tooltip", "data-placement" => "top", "title" => __('Delete this item'), "data-original-title" => "", "confirm" => __("Are you sure you want to delete # {0}?", $clubs->id)]) ?><!-- delete button -->
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
