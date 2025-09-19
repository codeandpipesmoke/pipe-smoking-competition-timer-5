<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Competition $competition
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
									<h3><i id="card-icon" class="fa fa-eye fa-spin"></i> <?= __('View') ?>: <?= __('Competition') ?></h3>
									<?= __('The data marked with <span class="fw-bold text-danger">*</span> must be provided!') ?>
								</div>
								<div class="float-end ms-5">
									<?= $this->Html->link('<span class="btn btn-outline-secondary mt-1 me-1"><i class="fa fa-times"></i></span>',
										["controller" => "Competitions", "action" => "index", "_full" => true],
										["escape" => false, "role" => "button"]
									) ?>
								</div>

								<div class="form-tab float-end">
									<ul class="nav nav-tabs mt-1" id="myTab" role="tablist">
										<li class="nav-item" role="presentation">
											<button class="nav-link active" id="tab-first" data-bs-toggle="tab" data-bs-target="#tabPanelMain" type="button" role="tab" aria-controls="tabPanelMain" aria-selected="true"><?= __('Basic data') ?></button>
										</li>


<?php /*
										<li class="nav-item" role="presentation">
											<button class="nav-link" id="tab-more" data-bs-toggle="tab" data-bs-target="#tab-panel-more" type="button" role="tab" aria-controls="tab-panel-more" aria-selected="false"><?= __('More') ?></button>
										</li>
*/ ?>

										<li class="nav-item dropdown">
											<a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false"><?= __('Related tables') ?></a>
											<ul class="dropdown-menu">
<?php if (!empty($competition->competingclubs)) : ?>
												<li><?= $this->Html->link(__('Competingclubs') . '...', ['controller' => 'Competingclubs', 'action' => 'index', 'parent', 'competition', $competition->id], ['class' => 'dropdown-item']) ?></li>
<?php endif ?>
<?php if (!empty($competition->competitors)) : ?>
												<li><?= $this->Html->link(__('Competitors') . '...', ['controller' => 'Competitors', 'action' => 'index', 'parent', 'competition', $competition->id], ['class' => 'dropdown-item']) ?></li>
<?php endif ?>
<?php if (!empty($competition->tables)) : ?>
												<li><?= $this->Html->link(__('Tables') . '...', ['controller' => 'Tables', 'action' => 'index', 'parent', 'competition', $competition->id], ['class' => 'dropdown-item']) ?></li>
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
													<?= $competition->id ?><!-- 0.a -->
												</div>
											</div>
<?php } ?>
											<div class="row"><!-- 2. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Id') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= h($competition->id) ?>

												</div>
											</div>
											<div class="row"><!-- 2. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Name') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= h($competition->name) ?>

												</div>
											</div>
											<div class="row"><!-- 2. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Tobacco') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= h($competition->tobacco) ?>

												</div>
											</div>
											<div class="row"><!-- 2. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Pipe') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= h($competition->pipe) ?>

												</div>
											</div>
											<div class="row"><!-- 3. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Tobacco Quantity') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= $this->Number->format($competition->tobacco_quantity) ?><!-- 3.b -->
												</div>
											</div>
											<div class="row"><!-- 3. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Competition Fee') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= $competition->competition_fee === null ? '' : $this->Number->format($competition->competition_fee) ?><!-- 3.a -->
												</div>
											</div>
											<div class="row"><!-- 3. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Maximum Number Of Clubs') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= $this->Number->format($competition->maximum_number_of_clubs) ?><!-- 3.b -->
												</div>
											</div>
											<div class="row"><!-- 3. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Maximum Number Of Competitors') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= $this->Number->format($competition->maximum_number_of_competitors) ?><!-- 3.b -->
												</div>
											</div>
											<div class="row"><!-- 3. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Maximum Number Of Tables') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= $this->Number->format($competition->maximum_number_of_tables) ?><!-- 3.b -->
												</div>
											</div>
											<div class="row"><!-- 3. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Modified') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= $this->Number->format($competition->modified) ?><!-- 3.b -->
												</div>
											</div>
											<div class="row"><!-- 4. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Description') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= h($competition->description) ?>

												</div>
											</div>
											<div class="row"><!-- 4. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Registration Deadline') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= h($competition->registration_deadline) ?>

												</div>
											</div>
											<div class="row"><!-- 4. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Email Has Been Sent') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= h($competition->email_has_been_sent) ?>

												</div>
											</div>
											<div class="row"><!-- 4. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Start Of Pipe Filling') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= h($competition->start_of_pipe_filling) ?>

												</div>
											</div>
											<div class="row"><!-- 4. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Start Of Pipe Lighting') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= h($competition->start_of_pipe_lighting) ?>

												</div>
											</div>
											<div class="row"><!-- 4. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Closing Time') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= h($competition->closing_time) ?>

												</div>
											</div>
											<div class="row"><!-- 5. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Registration Closed') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= $competition->registration_closed ? '<i class="fa fa-check-square boolean-yes" aria-hidden="true"></i>' : '<i class="fa fa-square boolean-no" aria-hidden="false"></i>' ?>

												</div>
											</div>
											<div class="row"><!-- 5. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Lunch Is Included In The Competition Fee') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= $competition->lunch_is_included_in_the_competition_fee ? '<i class="fa fa-check-square boolean-yes" aria-hidden="true"></i>' : '<i class="fa fa-square boolean-no" aria-hidden="false"></i>' ?>

												</div>
											</div>
											<div class="row"><!-- 5. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('The Pipe Filling Must Be Repeated') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= $competition->the_pipe_filling_must_be_repeated ? '<i class="fa fa-check-square boolean-yes" aria-hidden="true"></i>' : '<i class="fa fa-square boolean-no" aria-hidden="false"></i>' ?>

												</div>
											</div>
											<div class="row"><!-- 5. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Closed Competition') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= $competition->closed_competition ? '<i class="fa fa-check-square boolean-yes" aria-hidden="true"></i>' : '<i class="fa fa-square boolean-no" aria-hidden="false"></i>' ?>

												</div>
											</div>
<?php if($config['show_counters']){ ?>
											<div class="row"><!-- counter helper -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Table Count') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= $this->Number->format($competition->table_count) ?><!-- 3.b -->
												</div>
											</div>
<?php } ?>

<?php if($config['show_counters']){ ?>
											<div class="row"><!-- counter helper -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Competingclub Count') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= $this->Number->format($competition->competingclub_count) ?><!-- 3.b -->
												</div>
											</div>
<?php } ?>

<?php if($config['show_counters']){ ?>
											<div class="row"><!-- counter helper -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Competitor Count') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= $this->Number->format($competition->competitor_count) ?><!-- 3.b -->
												</div>
											</div>
<?php } ?>


										</div><!-- /.1.TAB -->
										

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
<?php if (!empty($competition->competingclubs)): ?>

											<button class="nav-link<?= $acticeClass ?>" id="nav-competingclubs-tab" data-bs-toggle="tab" data-bs-target="#nav-competingclubs" type="button" role="tab" aria-controls="nav-competingclubs" aria-selected="true">
												<?= __('Competingclubs') ?>
											</button>
<?php 	$acticeClass = ""; ?>
<?php endif ?>
<?php $acticeClass = " active"; ?>
<?php if (!empty($competition->competitors)): ?>

											<button class="nav-link<?= $acticeClass ?>" id="nav-competitors-tab" data-bs-toggle="tab" data-bs-target="#nav-competitors" type="button" role="tab" aria-controls="nav-competitors" aria-selected="true">
												<?= __('Competitors') ?>
											</button>
<?php 	$acticeClass = ""; ?>
<?php endif ?>
<?php $acticeClass = " active"; ?>
<?php if (!empty($competition->tables)): ?>

											<button class="nav-link<?= $acticeClass ?>" id="nav-tables-tab" data-bs-toggle="tab" data-bs-target="#nav-tables" type="button" role="tab" aria-controls="nav-tables" aria-selected="true">
												<?= __('Tables') ?>
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
<?php if (!empty($competition->competingclubs)): ?>

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
												<?php foreach ($competition->competingclubs as $competingclubs) : ?>

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
<?php if (!empty($competition->competitors)): ?>

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
												<?php foreach ($competition->competitors as $competitors) : ?>

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
<?php if (!empty($competition->tables)): ?>

									<div class="tab-pane fade<?= $acticeClass ?> p-0" id="nav-tables" role="tabpanel" aria-labelledby="nav-tables-tab" tabindex="0">

										<table class="table table-responsive-xl table-hover table-striped" style="">
											<thead class="thead-info">
												<tr>
<?php if($config['index_show_id']){ ?>
													<th class="number id"><?= __('Id') ?></th>
<?php } ?>
													<th class="please-change-type competition-id"><?= __('Competition Id') ?></th>
													<th class="please-change-type tablejudge-id"><?= __('Tablejudge Id') ?></th>
													<th class="string name"><?= __('Name') ?></th>
													<th class="please-change-type description"><?= __('Description') ?></th>
													<th class="please-change-type chairs"><?= __('Chairs') ?></th>
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
												<?php foreach ($competition->tables as $tables) : ?>

												<tr>
<?php if($config['index_show_id']){ ?>
													<td class="number id" value="<?= $tables->id ?>"><?= h($tables->id) ?></td>
<?php } ?>
													<td class="please-change-type competition-id" value="<?= $tables->competition_id ?>"><?= h($tables->competition_id) ?></td>
													<td class="please-change-type tablejudge-id" value="<?= $tables->tablejudge_id ?>"><?= h($tables->tablejudge_id) ?></td>
													<td class="string name" value="<?= $tables->name ?>"><?= h($tables->name) ?></td>
													<td class="please-change-type description" value="<?= $tables->description ?>"><?= h($tables->description) ?></td>
													<td class="please-change-type chairs" value="<?= $tables->chairs ?>"><?= h($tables->chairs) ?></td>
<?php if($config['index_show_visible']){ ?>
													<td class="boolean visible" value="<?= $tables->visible ?>"><?= h($tables->visible) ?></td>
<?php } ?>
<?php if($config['index_show_pos']){ ?>
													<td class="number pos" value="<?= $tables->pos ?>"><?= h($tables->pos) ?></td>
<?php } ?>
<?php if($config['index_show_counters']){ ?>
													<td class="number competitor-count" value="<?= $tables->competitor_count ?>"><?= h($tables->competitor_count) ?></td>
<?php } ?>
<?php if($config['index_show_created']){ ?>
													<td class="datetime created" value="<?= $tables->created ?>"><?= h($tables->created) ?></td>
<?php } ?>
<?php if($config['index_show_modified']){ ?>
													<td class="datetime modified" value="<?= $tables->modified ?>"><?= h($tables->modified) ?></td>
<?php } ?>
													<td class="actions">
														<?= $this->Html->link('<i class="fa fa-eye"></i>', ['controller' => 'Tables', 'action' => 'view', $tables->id], ["escape" => false, "role" => "button",  "class" => "btn btn-warning btn-sm", "data-toggle" => "tooltip", "data-placement" => "top", "title" => __('View this item'), "data-original-title" => ""]) ?><!-- view button -->
														<?= $this->Html->link('<i class="fa fa-edit"></i>', ['controller' => 'Tables', 'action' => 'edit', $tables->id], ["escape" => false, "role" => "button", "class" => "btn btn-primary btn-sm", "data-toggle" => "tooltip", "data-placement" => "top", "title" => __('Edit this item'), "data-original-title" => ""]) ?><!-- edit button -->
														<?= $this->Form->postLink('<i class="fa fa-times"></i>', ['controller' => 'Tables', 'action' => 'delete', $tables->id], ["escape" => false, "role" => "button", "class" => "btn btn-danger btn-sm", "data-toggle" =>"tooltip", "data-placement" => "top", "title" => __('Delete this item'), "data-original-title" => "", "confirm" => __("Are you sure you want to delete # {0}?", $tables->id)]) ?><!-- delete button -->
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
