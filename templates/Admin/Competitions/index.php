<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Competition> $competitions
 */
use Cake\Core\Configure;

$layoutCompetitionsLastId = -1;
if($session->check('Layout.Competitions.LastId')){
	$layoutCompetitionsLastId = $session->read('Layout.Competitions.LastId');
}

$global_config = (array) Configure::read('Theme.' . $prefix . '.config.template.index');
$local_config = [
	'show_id' 			=> false,
	'show_pos' 			=> false,
	'show_counters'		=> true,
	'show_visible'		=> false,
	'action_db_click'	=> 'edit',	// none, edit or view
	// ... more config params in: \JeffAdmin5\config\jeffadmin5.php
];
$config = array_merge($global_config, $local_config);
?>
				<div class="competitions index row">
						
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
						<div class="card">
							<div class="card-header">
							
								<div class="float-start">
									<h3><i id="card-icon" class="fa fa-table fa-spin"></i> <?= __('Table') ?>: <?= __('Competitions') ?></h3>
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
											<th class="datetime registration-deadline"><?= $this->Paginator->sort('registration_deadline') ?></th><!-- H.1. -->
											<th class="string name"><?= $this->Paginator->sort('name') ?></th><!-- H.1. -->
											<th class="string tobacco"><?= $this->Paginator->sort('tobacco') ?><br><?= $this->Paginator->sort('tobacco_quantity') ?></th><!-- H.1. -->
											<th class="string pipe"><?= $this->Paginator->sort('pipe') ?></th><!-- H.1. -->
											<th class="integer competition-fee"><?= $this->Paginator->sort('competition_fee') ?></th><!-- H.2. -->
											<th class="boolean closed-competition"><?= $this->Paginator->sort('closed_competition') ?></th><!-- H.1. -->
<?php if($config['show_pos']){ ?>
											<th class="number pos"><?= $this->Paginator->sort('pos') ?></th>
<?php } ?>
<?php if($config['show_visible']){ ?>
											<th class="boolean visible"><?= $this->Paginator->sort('visible') ?></th>
<?php } ?>
<?php if($config['show_counters']){ ?>
											<th class="number counter table_count"><?= $this->Paginator->sort('table_count') ?></th>											<th class="number counter competingclub_count"><?= $this->Paginator->sort('competingclub_count') ?></th>											<th class="number counter competitor_count"><?= $this->Paginator->sort('competitor_count') ?></th><?php } ?>
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
										<?php foreach ($competitions as $competition): ?>
<?php
	//$classLastVisited = ' class="last-visited"';	// later...
	//$classLastVisited = '';
?>

										<tr row-id="<?= $competition->id ?>"<?php if($competition->id == $layoutCompetitionsLastId){ echo 'class="table-tr-last-id"'; } ?> prefix="<?= $prefix ?>" controller="<?= $controller ?>" action="<?= $action ?>" aria-expanded="true">
											<td class="row-id-anchor" value="<?= $competition->id ?>"><a name="<?= $competition->id ?>" class="anchor"></a></td>
<?php if($config['show_id']){ ?>
											<td class="number id" value="<?= $competition->id ?>"><?= h($competition->id) ?><a name="<?= $competition->id ?>"></a></td>
<?php } ?>
<?php
	$strikeOutStyle = '';
	if($competition->registration_closed){
		$strikeOutStyle = ' style="text-decoration: line-through;"'	;
	}
?>

											<td class="datetime registration-deadline"<?= $strikeOutStyle ?> value="<?= $competition->registration_deadline ?>">
												<?= h($competition->registration_deadline) ?>
											</td>
											<td class="string name fw-bold" value="<?= $competition->name ?>"><?= h($competition->name) ?></td>
											<td class="string tobacco" value="<?= $competition->tobacco ?>">
												<?= h($competition->tobacco) ?><br>(<?= $this->Number->format($competition->tobacco_quantity, ['places' => 0, 'precision' => 0, 'before' => '', 'after' => ' gr']) ?>)
											</td>
											<td class="string pipe" value="<?= $competition->pipe ?>"><?= h($competition->pipe) ?></td>
											<td class="integer competition-fee" value="<?= $competition->competition_fee ?>"><?= $competition->competition_fee === null ? '' : $this->Number->format($competition->competition_fee, ['places' => 0, 'precision' => 0, 'before' => '', 'after' => ' Ft']) ?></td>
											<td class="boolean closed-competition" value="<?= $competition->closed_competition ?>"><?= h($competition->closed_competition) ?></td>
<?php if($config['show_pos']){ ?>
											<td class="number pos" value="<?= $competition->pos ?>"><?= h($competition->pos) ?></td>
<?php } ?>
<?php if($config['show_visible']){ ?>
											<td class="boolean visible" value="<?= $competition->visible ?>"><?= h($competition->visible) ?></td>
<?php } ?>
<?php if($config['show_counters']){ ?>
											<td class="number counter table-count" value="<?= $competition->table_count ?>"><?= h($competition->table_count) ?></td>											
											<td class="number counter competingclub-count" value="<?= $competition->competingclub_count ?>"><?= h($competition->competingclub_count) ?></td>											<td class="number counter competitor-count" value="<?= $competition->competitor_count ?>"><?= h($competition->competitor_count) ?></td><?php } ?>
<?php if($config['show_created'] || $config['show_modified']){ ?>
											<td class="datetime">
<?php if($config['show_created']){ ?>
												<span class="fw-bold"><?= h($competition->created) ?></span>
<?php } ?>
<?php if($config['show_created'] && $config['show_modified']){ ?>
												<br>
<?php } ?>
<?php if($config['show_modified']){ ?>
												<span class="fw-normal"><?= h($competition->modified) ?></span>
<?php } ?>
											</td>
<?php } ?>
<?php if($config['show_button_view'] || $config['show_button_edit'] || $config['show_button_delete'] ){ ?>

											<td class="actions">
<?php if($config['show_button_view']){ ?>
												<?= $this->Html->link('<i class="fa fa-eye"></i>', ['action' => 'view', $competition->id], ['escape' => false, 'role' => 'button', 'class' => 'btn btn-warning btn-sm', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => __('View this item'), 'data-original-title' => __('View this item')]) ?>
<?php } ?>

<?php if($config['show_button_edit']){ ?>
												<?= $this->Html->link('<i class="fa fa-edit"></i>', ['action' => 'edit', $competition->id], ['escape' => false, 'role' => 'button', 'class' => 'btn btn-primary btn-sm', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => __('Edit this item'), 'data-original-title' => __('Edit this item')]) ?>
<?php } ?>

<?php if($config['show_button_delete']){ ?>
												<?= $this->Form->postLink('', ['action' => 'delete', $competition->id], ['class'=>'hide-postlink index-delete-button-class']) ?>
												<a href="javascript:;" class="btn btn-sm btn-danger postlink-delete" data-bs-tooltip="tooltip" data-bs-placement="top" title="<?= __("Delete this record!") ?>" text="<?= h($competition->name) ?>" subText="<?= __("You will not be able to revert this!") ?>" confirmButtonText="<?= __("Yes, delete it!") ?>" cancelButtonText="<?= __("Cancel") ?>"><i class="fa fa-minus"></i></a>

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



