<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\Cake\Datasource\EntityInterface> $chairmans
 */
use Cake\Core\Configure;

$layoutChairmansLastId = -1;
if($session->check('Layout.Chairmans.LastId')){
	$layoutChairmansLastId = $session->read('Layout.Chairmans.LastId');
}

$global_config = (array) Configure::read('Theme.' . $prefix . '.config.template.index');
$local_config = [
	'show_id' 			=> false,
	'show_visible'		=> false,
	'show_pos' 			=> false,
	'show_counters'		=> false,
	'show_button_delete'=> false,
	'show_button_edit'	=> false,
	'action_db_click'	=> 'view',	// none, edit or view
	// ... more config params in: \JeffAdmin5\config\jeffadmin5.php
];
$config = array_merge($global_config, $local_config);
?>
				<div class="chairmans index row">
						
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
						<div class="card">
							<div class="card-header">
							
								<div class="float-start">
									<h3><i id="card-icon" class="fa fa-table fa-spin"></i> <?= __('Table') ?>: <?= __('Chairmans') ?></h3>
									<div><?php
										if($config['action_db_click'] == 'edit'){
											echo __('Double clik to edit row');
										}
										if($config['action_db_click'] == 'view'){
											echo __('Double clik to view row');
										}
									?></div>
								</div>
								
								<div class="float-end">
									<!-- Paginator page links -->
									<?= $this->element('JeffAdmin5.paginator') ?>
									<!-- /.Pginator page links -->
								</div>
								
							</div>

<?php ####################################################################################################################################################### ?>
<?php ###################### CARD BODY ###################################################################################################################### ?>
<?php ####################################################################################################################################################### ?>

							<div class="card-body p-0 p-1">
								
								<table class="table table-responsive-xl table-hover table-striped mb-0 text-nowrap" style="">
									<thead class="thead-info">
										<tr>
											<th class="row-id-anchor"></th>
<?php if($config['show_id']){ ?>
											<th class="number id"><?= $this->Paginator->sort('id') ?></th>
<?php } ?>
											<th class="string last-name"><?= $this->Paginator->sort('last_name') ?></th><!-- H.1. -->
											<th class="string first-name"><?= $this->Paginator->sort('first_name') ?></th><!-- H.1. -->
											<th class="integer country-id"><?= $this->Paginator->sort('country_id') ?></th><!-- H.3. -->
											<th class="integer lang-id"><?= $this->Paginator->sort('lang_id') ?></th><!-- H.3. -->
											<th class="integer club-id"><?= $this->Paginator->sort('club_id') ?></th><!-- H.3. -->
											<th class="string email"><?= $this->Paginator->sort('email') ?></th><!-- H.1. -->
											<th class="boolean active"><?= $this->Paginator->sort('active') ?></th><!-- H.1. -->
											<th class="string role"><?= $this->Paginator->sort('role') ?></th><!-- H.1. -->
											<th class="datetime last-login"><?= $this->Paginator->sort('last_login') ?></th><!-- H.1. -->
<?php if($config['show_pos']){ ?>
											<th class="number pos"><?= $this->Paginator->sort('pos') ?></th>
<?php } ?>
<?php if($config['show_visible']){ ?>
											<th class="boolean visible"><?= $this->Paginator->sort('visible') ?></th>
<?php } ?>
<?php if($config['show_counters']){ ?>
											<th class="number counter competitor_count"><?= $this->Paginator->sort('competitor_count') ?></th>											<th class="number counter table_count"><?= $this->Paginator->sort('table_count') ?></th><?php } ?>
<?php if($config['show_created'] || $config['show_modified']){ ?>

											<th class="datetime created modified">
												<?php 
													if($config['show_created']){ 
														echo $this->Paginator->sort('created');
													}
													if($config['show_created'] && $config['show_modified']){
														echo "&nbsp;/&nbsp;";
													}
													if($config['show_modified']){
														echo $this->Paginator->sort('modified');
													} ?>

											</th>
<?php } ?>
<?php if($config['show_button_view'] || $config['show_button_edit'] || $config['show_button_delete'] ){ ?>
											<th class="actions"><?= __('Actions') ?></th>
<?php } ?>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($chairmans as $chairman): //dd($chairman); ?>
<?php
	//$classLastVisited = ' class="last-visited"';	// later...
	//$classLastVisited = '';
?>

										<tr row-id="<?= $chairman->id ?>"<?php if($chairman->id == $layoutChairmansLastId){ echo 'class="table-tr-last-id"'; } ?> prefix="<?= $prefix ?>" controller="<?= $controller ?>" action="<?= $action ?>" aria-expanded="true">
											<td class="row-id-anchor" value="<?= $chairman->id ?>"><a name="<?= $chairman->id ?>" class="anchor"></a></td>
<?php if($config['show_id']){ ?>
											<td class="number id" value="<?= $chairman->id ?>"><?= h($chairman->id) ?><a name="<?= $chairman->id ?>"></a></td>
<?php } ?>
											<td class="string last-name" value="<?= $chairman->last_name ?>"><?= h($chairman->last_name) ?></td>
											<td class="string first-name" value="<?= $chairman->first_name ?>"><?= h($chairman->first_name) ?></td>
											<td class="string country-id" value="<?= $chairman->country_id ?>"><?= h($chairman->country->name) ?></td>
											<td class="string lang-id" value="<?= $chairman->lang_id ?>"><?= h($chairman->lang->name) ?></td>
											<td class="string club-id" value="<?= $chairman->club_id ?>"><?= h($chairman->club->name) ?></td>
											<td class="string email" value="<?= $chairman->email ?>"><?= h($chairman->email) ?></td>
											<td class="boolean active" value="<?= $chairman->active ?>"><?= h($chairman->active) ?></td>
											<td class="string role" value="<?= $chairman->role ?>"><?= h($role[$chairman->role]) ?></td>
											<td class="datetime last-login" value="<?= $chairman->last_login ?>"><?= h($chairman->last_login) ?></td>
<?php if($config['show_pos']){ ?>
											<td class="number pos" value="<?= $chairman->pos ?>"><?= h($chairman->pos) ?></td>
<?php } ?>
<?php if($config['show_visible']){ ?>
											<td class="boolean visible" value="<?= $chairman->visible ?>"><?= h($chairman->visible) ?></td>
<?php } ?>
<?php if($config['show_counters']){ ?>
											<td class="number counter competitor-count" value="<?= $chairman->competitor_count ?>"><?= h($chairman->competitor_count) ?></td>											<td class="number counter table-count" value="<?= $chairman->table_count ?>"><?= h($chairman->table_count) ?></td><?php } ?>
<?php if($config['show_created'] || $config['show_modified']){ ?>
											<td class="datetime">
<?php if($config['show_created']){ ?>
												<span class="fw-bold"><?= h($chairman->created) ?></span>
<?php } ?>
<?php if($config['show_created'] && $config['show_modified']){ ?>
												<br>
<?php } ?>
<?php if($config['show_modified']){ ?>
												<span class="fw-normal"><?= h($chairman->modified) ?></span>
<?php } ?>
											</td>
<?php } ?>
<?php if($config['show_button_view'] || $config['show_button_edit'] || $config['show_button_delete'] ){ ?>

											<td class="actions">
<?php if($config['show_button_view']){ ?>
												<?= $this->Html->link('<i class="fa fa-eye"></i>', ['action' => 'view', $chairman->id], ['escape' => false, 'role' => 'button', 'class' => 'btn btn-warning btn-sm', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => __('View this item'), 'data-original-title' => __('View this item')]) ?>
<?php } ?>

<?php if($config['show_button_edit']){ ?>
												<?= $this->Html->link('<i class="fa fa-edit"></i>', ['action' => 'edit', $chairman->id], ['escape' => false, 'role' => 'button', 'class' => 'btn btn-primary btn-sm', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => __('Edit this item'), 'data-original-title' => __('Edit this item')]) ?>
<?php } ?>

<?php if($config['show_button_delete']){ ?>
												<?= $this->Form->postLink('', ['action' => 'delete', $chairman->id], ['class'=>'hide-postlink index-delete-button-class']) ?>
												<a href="javascript:;" class="btn btn-sm btn-danger postlink-delete" data-bs-tooltip="tooltip" data-bs-placement="top" title="<?= __("Delete this record!") ?>" text="<?= h($chairman->name) ?>" subText="<?= __("You will not be able to revert this!") ?>" confirmButtonText="<?= __("Yes, delete it!") ?>" cancelButtonText="<?= __("Cancel") ?>"><i class="fa fa-minus"></i></a>

<?php } ?>

											</td>
<?php } ?>
										</tr>
										<?php endforeach; ?>

									</tbody>
								</table>

							</div>
							<div class="card-footer text-center">
								<div class="float-start">
									<?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?>
								</div>								
								<div class="float-end mb-1">							
									<?= $this->element('jeffAdmin5.paginator') ?>
									
								</div>								
							</div>
						</div><!-- end card-->					
					</div>

				</div>			

	<?php
	if(isset($config['index_show_actions']) && $config['index_show_actions'] && isset($config['index_enable_delete']) && $config['index_enable_delete']){ 
		$this->Html->script(
			[
				"JeffAdmin5./assets/plugins/sweetalert2/dist/sweetalert2.all.min",
				//"JeffAdmin5./assets/plugins/jquery-copy-to-clipboard-master/jquery.copy-to-clipboard",
			],
			['block' => 'scriptBottom']
		);
	}	
	?>

<?php $this->Html->scriptStart(['block' => 'javaScriptBottom']); ?>

	$(document).ready( function(){
		$('tr').dblclick( function(){
			let id = $(this).attr("row-id")
			window.location.href = '<?= $this->Url->build(['controller' => $controller, 'action' => $config['action_db_click']]) ?>/' + id;
		})

		// Fixing CakePhp's paginator numbers
		$('.page-link').each( function(){
			if($(this).text() == '1'){
				$(this).attr('href', $(this).attr('href') + '?page=1');
			}
		});
		
	})
<?php $this->Html->scriptEnd(); ?>



