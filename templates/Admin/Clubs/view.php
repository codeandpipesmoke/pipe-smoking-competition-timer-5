<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Club $club
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
	'index_show_id' 		=> false,	// for related tables
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
									<h3><i id="card-icon" class="fa fa-eye fa-spin"></i> <?= __('View') ?>: <?= __('Club') ?></h3>
									<?= __('The data marked with <span class="fw-bold text-danger">*</span> must be provided!') ?>
								</div>
								<div class="float-end ms-5">
									<?= $this->Html->link('<span class="btn btn-outline-secondary mt-1 me-1"><i class="fa fa-times"></i></span>',
										["controller" => "Clubs", "action" => "index", "_full" => true],
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
<?php if (!empty($club->competingclubs)) : ?>
												<li><?= $this->Html->link(__('Competingclubs') . '...', ['controller' => 'Competingclubs', 'action' => 'index', 'parent', 'club', $club->id], ['class' => 'dropdown-item']) ?></li>
<?php endif ?>
<?php if (!empty($club->my_users)) : ?>
												<li><?= $this->Html->link(__('Users') . '...', ['controller' => 'MyUsers', 'action' => 'index', 'parent', 'club', $club->id], ['class' => 'dropdown-item']) ?></li>
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
													<?= $club->id ?><!-- 0.a -->
												</div>
											</div>
<?php } ?>
											<div class="row"><!-- 1. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Country') ?>:</label>
												<div class="col-sm-10 p-1 link">
													<?= $club->hasValue('country') ? $this->Html->link(h($club->country->name), ['controller' => 'Countries', 'action' => 'view', $club->country->id]) : '' ?><span class="external-link-icon"><i class="fa fa-external-link" aria-hidden="true"></i></span>
												</div>
											</div>

											<div class="row"><!-- 1. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Chairman') ?>:</label>
												<div class="col-sm-10 p-1 link">
													<?= $club->hasValue('chairman') ? $this->Html->link(h($club->chairman->last_name) . ' ' . $club->chairman->first_name, ['controller' => 'MyUsers', 'action' => 'view', $club->chairman->id]) : '' ?><span class="external-link-icon"><i class="fa fa-external-link" aria-hidden="true"></i></span>
												</div>
											</div>

											<div class="row"><!-- 2. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Name') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= h($club->name) ?>

												</div>
											</div>
											<div class="row"><!-- 2. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Email') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= h($club->email) ?>

												</div>
											</div>
											<div class="row"><!-- 2. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Web') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= h($club->web) ?>

												</div>
											</div>
<?php /*
											<div class="row"><!-- 6. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Description') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= $this->Text->autoParagraph(h($club->description)) ?>

												</div>
											</div>
*/ ?>
<?php if($config['show_counters']){ ?>
											<div class="row"><!-- counter helper -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('User Count') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= $this->Number->format($club->user_count) ?><!-- 3.b -->
												</div>
											</div>
<?php } ?>

<?php if($config['show_counters']){ ?>
											<div class="row"><!-- counter helper -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Competingclub Count') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= $this->Number->format($club->competingclub_count) ?><!-- 3.b -->
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
															<?= $this->Text->autoParagraph($club->description) ?>

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
<?php if (!empty($club->competingclubs)): ?>

											<button class="nav-link<?= $acticeClass ?>" id="nav-competingclubs-tab" data-bs-toggle="tab" data-bs-target="#nav-competingclubs" type="button" role="tab" aria-controls="nav-competingclubs" aria-selected="true">
												<?= __('Competingclubs') ?>
											</button>
<?php 	$acticeClass = ""; ?>
<?php endif ?>
<?php $acticeClass = " active"; ?>
<?php if (!empty($club->my_users)): ?>

											<button class="nav-link<?= $acticeClass ?>" id="nav-users-tab" data-bs-toggle="tab" data-bs-target="#nav-users" type="button" role="tab" aria-controls="nav-users" aria-selected="true">
												<?= __('Users') ?>
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
<?php if (!empty($club->competingclubs)): ?>

									<div class="tab-pane fade<?= $acticeClass ?> p-0" id="nav-competingclubs" role="tabpanel" aria-labelledby="nav-competingclubs-tab" tabindex="0">

										<table class="table table-responsive-xl table-hover table-striped" style="">
											<thead class="thead-info">
												<tr>
<?php if($config['index_show_id']){ ?>
													<th class="number id"><?= __('Id') ?></th>
<?php } ?>
													<th class="please-change-type country-id"><?= __('Country Id') ?></th>
													<th class="please-change-type competition-id"><?= __('Competition Id') ?></th>
													<th class="please-change-type club-id"><?= __('Club Id') ?></th>
													<th class="string name"><?= __('Name') ?></th>
													<th class="please-change-type description"><?= __('Description') ?></th>
													<th class="please-change-type time-achieved"><?= __('Time Achieved') ?></th>
													<th class="please-change-type score"><?= __('Score') ?></th>
													<th class="please-change-type excluded"><?= __('Excluded') ?></th>
													<th class="please-change-type excluded-description"><?= __('Excluded Description') ?></th>
<?php if($config['index_show_visible']){ ?>
													<th class="boolean visible"><?= __('Visible') ?></th>
<?php } ?>
<?php if($config['index_show_pos']){ ?>
													<th class="number pos"><?= __('Pos') ?></th>
<?php } ?>
<?php if($config['index_show_counters']){ ?>
													<th class="number competitor-count"><?= __('Competitor Count') ?></th>
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
												<?php foreach ($club->competingclubs as $competingclubs) : ?>

												<tr>
<?php if($config['index_show_id']){ ?>
													<td class="number id" value="<?= $competingclubs->id ?>"><?= h($competingclubs->id) ?></td>
<?php } ?>
													<td class="please-change-type country-id" value="<?= $competingclubs->country_id ?>"><?= h($competingclubs->country_id) ?></td>
													<td class="please-change-type competition-id" value="<?= $competingclubs->competition_id ?>"><?= h($competingclubs->competition_id) ?></td>
													<td class="please-change-type club-id" value="<?= $competingclubs->club_id ?>"><?= h($competingclubs->club_id) ?></td>
													<td class="string name" value="<?= $competingclubs->name ?>"><?= h($competingclubs->name) ?></td>
													<td class="please-change-type description" value="<?= $competingclubs->description ?>"><?= h($competingclubs->description) ?></td>
													<td class="please-change-type time-achieved" value="<?= $competingclubs->time_achieved ?>"><?= h($competingclubs->time_achieved) ?></td>
													<td class="please-change-type score" value="<?= $competingclubs->score ?>"><?= h($competingclubs->score) ?></td>
													<td class="please-change-type excluded" value="<?= $competingclubs->excluded ?>"><?= h($competingclubs->excluded) ?></td>
													<td class="please-change-type excluded-description" value="<?= $competingclubs->excluded_description ?>"><?= h($competingclubs->excluded_description) ?></td>
<?php if($config['index_show_visible']){ ?>
													<td class="boolean visible" value="<?= $competingclubs->visible ?>"><?= h($competingclubs->visible) ?></td>
<?php } ?>
<?php if($config['index_show_pos']){ ?>
													<td class="number pos" value="<?= $competingclubs->pos ?>"><?= h($competingclubs->pos) ?></td>
<?php } ?>
<?php if($config['index_show_counters']){ ?>
													<td class="number competitor-count" value="<?= $competingclubs->competitor_count ?>"><?= h($competingclubs->competitor_count) ?></td>
<?php } ?>
<?php if($config['index_show_created']){ ?>
													<td class="datetime created" value="<?= $competingclubs->created ?>"><?= h($competingclubs->created) ?></td>
<?php } ?>
<?php if($config['index_show_modified']){ ?>
													<td class="datetime modified" value="<?= $competingclubs->modified ?>"><?= h($competingclubs->modified) ?></td>
<?php } ?>
													<td class="actions">
														<?= $this->Html->link('<i class="fa fa-eye"></i>', ['controller' => 'Competingclubs', 'action' => 'view', $competingclubs->id], ["escape" => false, "role" => "button",  "class" => "btn btn-warning btn-sm", "data-toggle" => "tooltip", "data-placement" => "top", "title" => __('View this item'), "data-original-title" => ""]) ?><!-- view button -->
														<?= $this->Html->link('<i class="fa fa-edit"></i>', ['controller' => 'Competingclubs', 'action' => 'edit', $competingclubs->id], ["escape" => false, "role" => "button", "class" => "btn btn-primary btn-sm", "data-toggle" => "tooltip", "data-placement" => "top", "title" => __('Edit this item'), "data-original-title" => ""]) ?><!-- edit button -->
														<?= $this->Form->postLink('<i class="fa fa-times"></i>', ['controller' => 'Competingclubs', 'action' => 'delete', $competingclubs->id], ["escape" => false, "role" => "button", "class" => "btn btn-danger btn-sm", "data-toggle" =>"tooltip", "data-placement" => "top", "title" => __('Delete this item'), "data-original-title" => "", "confirm" => __("Are you sure you want to delete # {0}?", $competingclubs->id)]) ?><!-- delete button -->
													</td>
												</tr>
												<?php endforeach ?>

											</tbody>
										</table>

									</div><!-- /tab pane -->
<?php 	$acticeClass = ""; ?>
<?php endif ?>
<?php $acticeClass = " show active"; ?>
<?php if (!empty($club->my_users)): ?>

									<div class="tab-pane fade<?= $acticeClass ?> p-0" id="nav-users" role="tabpanel" aria-labelledby="nav-users-tab" tabindex="0">

										<table class="table table-responsive-xl table-hover table-striped" style="">
											<thead class="thead-info">
												<tr>
<?php if($config['index_show_id']){ ?>
													<th class="number id"><?= __('Id') ?></th>
<?php } ?>
													<th class="first-name">
														<?= __('First Name') ?>&nbsp;<?= __('Last Name') ?>
													</th>
													<th class="country-id"><?= __('Country Id') ?></th>
													<th class="lang-id"><?= __('Lang Id') ?></th>
													<th class="email"><?= __('Email') ?></th>
													<th class="role"><?= __('Role') ?></th>
<?php if($config['index_show_visible']){ ?>
													<th class="boolean visible"><?= __('Visible') ?></th>
<?php } ?>
<?php if($config['index_show_pos']){ ?>
													<th class="number pos"><?= __('Pos') ?></th>
<?php } ?>
<?php if($config['index_show_counters']){ ?>
													<th class="number competitor-count"><?= __('Competitor Count') ?></th>
<?php } ?>
<?php if($config['index_show_counters']){ ?>
													<th class="number table-count"><?= __('Table Count') ?></th>
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
												<?php foreach ($club->my_users as $users) : ?>

												<tr>
<?php if($config['index_show_id']){ ?>
													<td class="number id" value="<?= $users->id ?>"><?= h($users->id) ?></td>
<?php } ?>
													<td class="first-name">
<?php if($users->nameorder == "first-last"){ ?>

														<?= h($users->first_name) ?>&nbsp;<?= h($users->last_name) ?>
<?php }else{ ?>

														<?= h($users->last_name) ?>&nbsp;<?= h($users->first_name) ?>
<?php } ?>


<?php //dd($users->lang->name); ?>
<?php //dd($club->hasValue('lang')); ?>

													</td>
													<td class="country-id" value="<?= $users->country_id ?>"><?= $users->hasValue('country') ? $this->Html->link(h($users->country->name), ['controller' => 'Countries', 'action' => 'view', $club->country->id]) : '' ?><span class="external-link-icon"><i class="fa fa-external-link" aria-hidden="true"></i></span></td>
													<td class="lang-id" value="<?= $users->lang_id ?>"><?= $users->hasValue('lang') ? $this->Html->link(h($users->lang->name), ['controller' => 'Langs', 'action' => 'view', $users->lang->id]) : '' ?><span class="external-link-icon"><i class="fa fa-external-link" aria-hidden="true"></i></span></td>
													<td class="email" value="<?= $users->email ?>"><?= h($users->email) ?></td>
													<td class="role" value="<?= $users->role ?>"><?= h($users->role) ?></td>
<?php if($config['index_show_visible']){ ?>
													<td class="boolean visible" value="<?= $users->visible ?>"><?= h($users->visible) ?></td>
<?php } ?>
<?php if($config['index_show_pos']){ ?>
													<td class="number pos" value="<?= $users->pos ?>"><?= h($users->pos) ?></td>
<?php } ?>
<?php if($config['index_show_counters']){ ?>
													<td class="number competitor-count" value="<?= $users->competitor_count ?>"><?= h($users->competitor_count) ?></td>
<?php } ?>
<?php if($config['index_show_counters']){ ?>
													<td class="number table-count" value="<?= $users->table_count ?>"><?= h($users->table_count) ?></td>
<?php } ?>
<?php if($config['index_show_created']){ ?>
													<td class="datetime created" value="<?= $users->created ?>"><?= h($users->created) ?></td>
<?php } ?>
<?php if($config['index_show_modified']){ ?>
													<td class="datetime modified" value="<?= $users->modified ?>"><?= h($users->modified) ?></td>
<?php } ?>
													<td class="actions">
														<?= $this->Html->link('<i class="fa fa-eye"></i>', ['controller' => 'Users', 'action' => 'view', $users->id], ["escape" => false, "role" => "button",  "class" => "btn btn-warning btn-sm", "data-toggle" => "tooltip", "data-placement" => "top", "title" => __('View this item'), "data-original-title" => ""]) ?><!-- view button -->
														<?= $this->Html->link('<i class="fa fa-edit"></i>', ['controller' => 'Users', 'action' => 'edit', $users->id], ["escape" => false, "role" => "button", "class" => "btn btn-primary btn-sm", "data-toggle" => "tooltip", "data-placement" => "top", "title" => __('Edit this item'), "data-original-title" => ""]) ?><!-- edit button -->
														<?= $this->Form->postLink('<i class="fa fa-times"></i>', ['controller' => 'Users', 'action' => 'delete', $users->id], ["escape" => false, "role" => "button", "class" => "btn btn-danger btn-sm", "data-toggle" =>"tooltip", "data-placement" => "top", "title" => __('Delete this item'), "data-original-title" => "", "confirm" => __("Are you sure you want to delete # {0}?", $users->id)]) ?><!-- delete button -->
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
