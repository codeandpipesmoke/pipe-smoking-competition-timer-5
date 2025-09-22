<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Country> $countries
 */
use Cake\Core\Configure;

$layoutCountriesLastId = -1;
if($session->check('Layout.Countries.LastId')){
	$layoutCountriesLastId = $session->read('Layout.Countries.LastId');
}

$global_config = (array) Configure::read('Theme.' . $prefix . '.config.template.index');
$local_config = [
	'show_id' 			=> true,
	'show_pos' 			=> true,
	'show_counters'		=> true,
	'action_db_click'	=> 'view',	// none, edit or view
	// ... more config params in: \JeffAdmin5\config\jeffadmin5.php
];
$config = array_merge($global_config, $local_config);
?>
				<div class="countries index row">
						
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
						<div class="card">
							<div class="card-header">
							
								<div class="float-start">
									<h3><i id="card-icon" class="fa fa-table fa-spin"></i> <?= __('Table') ?>: <?= __('Countries') ?></h3>
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
											<th class="string continent"><?= $this->Paginator->sort('continent') ?></th><!-- H.1. -->
											<th class="string name"><?= $this->Paginator->sort('name') ?></th><!-- H.1. -->
											<th class="string iso"><?= $this->Paginator->sort('iso') ?></th><!-- H.1. -->
											<th class="datetime last-used"><?= $this->Paginator->sort('last_used') ?></th><!-- H.1. -->
<?php if($config['show_pos']){ ?>
											<th class="number pos"><?= $this->Paginator->sort('pos') ?></th>
<?php } ?>
<?php if($config['show_visible']){ ?>
											<th class="boolean visible"><?= $this->Paginator->sort('visible') ?></th>
<?php } ?>
<?php if($config['show_counters']){ ?>
											<th class="number counter user_count"><?= $this->Paginator->sort('user_count') ?></th>											<th class="number counter club_count"><?= $this->Paginator->sort('club_count') ?></th>											<th class="number counter competition_count"><?= $this->Paginator->sort('competition_count') ?></th>
<?php } ?>
<?php if($config['show_button_view'] || $config['show_button_edit'] || $config['show_button_delete'] ){ ?>
											<th class="actions"><?= __('Actions') ?></th>
<?php } ?>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($countries as $country): ?>
<?php
	//$classLastVisited = ' class="last-visited"';	// later...
	//$classLastVisited = '';
?>

										<tr row-id="<?= $country->id ?>"<?php if($country->id == $layoutCountriesLastId){ echo 'class="table-tr-last-id"'; } ?> prefix="<?= $prefix ?>" controller="<?= $controller ?>" action="<?= $action ?>" aria-expanded="true">
											<td class="row-id-anchor" value="<?= $country->id ?>"><a name="<?= $country->id ?>" class="anchor"></a></td>
<?php if($config['show_id']){ ?>
											<td class="number id" value="<?= $country->id ?>"><?= h($country->id) ?><a name="<?= $country->id ?>"></a></td>
<?php } ?>
											<td class="string continent" value="<?= $country->continent ?>"><?= h($country->continent) ?></td>
											<td class="string name" value="<?= $country->name ?>"><?= h($country->name) ?></td>
											<td class="string iso" value="<?= $country->iso ?>"><?= h($country->iso) ?></td>
											<td class="datetime last-used" value="<?= $country->last_used ?>"><?= h($country->last_used) ?></td>
<?php if($config['show_pos']){ ?>
											<td class="number pos" value="<?= $country->pos ?>"><?= h($country->pos) ?></td>
<?php } ?>
<?php if($config['show_visible']){ ?>
											<td class="boolean visible" value="<?= $country->visible ?>"><?= h($country->visible) ?></td>
<?php } ?>
<?php if($config['show_counters']){ ?>
											<td class="number counter user-count" value="<?= $country->user_count ?>"><?= h($country->user_count) ?></td>											<td class="number counter club-count" value="<?= $country->club_count ?>"><?= h($country->club_count) ?></td>											<td class="number counter competition-count" value="<?= $country->competition_count ?>"><?= h($country->competition_count) ?></td><?php } ?>
<?php if($config['show_button_view'] || $config['show_button_edit'] || $config['show_button_delete'] ){ ?>

											<td class="actions">
<?php if($config['show_button_view']){ ?>
												<?= $this->Html->link('<i class="fa fa-eye"></i>', ['action' => 'view', $country->id], ['escape' => false, 'role' => 'button', 'class' => 'btn btn-warning btn-sm', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => __('View this item'), 'data-original-title' => __('View this item')]) ?>
<?php } ?>

<?php if($config['show_button_edit']){ ?>
												<?= $this->Html->link('<i class="fa fa-edit"></i>', ['action' => 'edit', $country->id], ['escape' => false, 'role' => 'button', 'class' => 'btn btn-primary btn-sm', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => __('Edit this item'), 'data-original-title' => __('Edit this item')]) ?>
<?php } ?>

<?php if($config['show_button_delete']){ ?>
												<?= $this->Form->postLink('', ['action' => 'delete', $country->id], ['class'=>'hide-postlink index-delete-button-class']) ?>
												<a href="javascript:;" class="btn btn-sm btn-danger postlink-delete" data-bs-tooltip="tooltip" data-bs-placement="top" title="<?= __("Delete this record!") ?>" text="<?= h($country->name) ?>" subText="<?= __("You will not be able to revert this!") ?>" confirmButtonText="<?= __("Yes, delete it!") ?>" cancelButtonText="<?= __("Cancel") ?>"><i class="fa fa-minus"></i></a>

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



