<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\User> $users
 */
use Cake\Core\Configure;

$layoutUsersLastId = -1;
if($session->check('Layout.Users.LastId')){
	$layoutUsersLastId = $session->read('Layout.Users.LastId');
}

$global_config = (array) Configure::read('Theme.' . $prefix . '.config.template.index');
$local_config = [
	'show_id' 			=> true,
	'show_pos' 			=> false,
	'show_counters'		=> false,
	'action_db_click'	=> 'edit',	// none, edit or view
	// ... more config params in: \JeffAdmin5\config\jeffadmin5.php
];
$config = array_merge($global_config, $local_config);
?>
				<div class="users index row">
						
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
						<div class="card">
							<div class="card-header">
							
								<div class="float-start">
									<h3><i id="card-icon" class="fa fa-table fa-spin"></i> <?= __('Table') ?>: <?= __('Users') ?></h3>
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
											<th class="string country-id"><?= $this->Paginator->sort('country_id') ?></th><!-- H.0. -->
											<th class="string lang-id"><?= $this->Paginator->sort('lang_id') ?></th><!-- H.0. -->
											<th class="string club-id"><?= $this->Paginator->sort('club_id') ?></th><!-- H.0. -->
											<th class="string username"><?= $this->Paginator->sort('username') ?></th><!-- H.1. -->
											<th class="string email"><?= $this->Paginator->sort('email') ?></th><!-- H.1. -->
											<th class="string first-name"><?= $this->Paginator->sort('first_name') ?></th><!-- H.1. -->
											<th class="string last-name"><?= $this->Paginator->sort('last_name') ?></th><!-- H.1. -->
											<th class="datetime token-expires"><?= $this->Paginator->sort('token_expires') ?></th><!-- H.1. -->
											<th class="string api-token"><?= $this->Paginator->sort('api_token') ?></th><!-- H.1. -->
											<th class="datetime activation-date"><?= $this->Paginator->sort('activation_date') ?></th><!-- H.1. -->
											<th class="string secret"><?= $this->Paginator->sort('secret') ?></th><!-- H.1. -->
											<th class="boolean secret-verified"><?= $this->Paginator->sort('secret_verified') ?></th><!-- H.1. -->
											<th class="datetime tos-date"><?= $this->Paginator->sort('tos_date') ?></th><!-- H.1. -->
											<th class="boolean active"><?= $this->Paginator->sort('active') ?></th><!-- H.1. -->
											<th class="boolean is-superuser"><?= $this->Paginator->sort('is_superuser') ?></th><!-- H.1. -->
											<th class="string role"><?= $this->Paginator->sort('role') ?></th><!-- H.1. -->
											<th class="boolean enabled"><?= $this->Paginator->sort('enabled') ?></th><!-- H.1. -->
											<th class="datetime last-login"><?= $this->Paginator->sort('last_login') ?></th><!-- H.1. -->
											<th class="datetime lockout-time"><?= $this->Paginator->sort('lockout_time') ?></th><!-- H.1. -->
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
										<?php foreach ($users as $user): ?>
<?php
	//$classLastVisited = ' class="last-visited"';	// later...
	//$classLastVisited = '';
?>

										<tr row-id="<?= $user->id ?>"<?php if($user->id == $layoutUsersLastId){ echo 'class="table-tr-last-id"'; } ?> prefix="<?= $prefix ?>" controller="<?= $controller ?>" action="<?= $action ?>" aria-expanded="true">
											<td class="row-id-anchor" value="<?= $user->id ?>"><a name="<?= $user->id ?>" class="anchor"></a></td>
<?php if($config['show_id']){ ?>
											<td class="number id" value="<?= $user->id ?>"><?= h($user->id) ?><a name="<?= $user->id ?>"></a></td>
<?php } ?>
											<td class="string link country-id" value="<?= $user->country_id ?>"><?= $user->hasValue('country') ? $this->Html->link($user->country->name, ['controller' => 'Countries', 'action' => 'view', $user->country->id]) : '' ?><span class="external-link-icon"><i class="fa fa-external-link" aria-hidden="true"></i></span></td>
											<td class="string link lang-id" value="<?= $user->lang_id ?>"><?= $user->hasValue('lang') ? $this->Html->link($user->lang->name, ['controller' => 'Langs', 'action' => 'view', $user->lang->id]) : '' ?><span class="external-link-icon"><i class="fa fa-external-link" aria-hidden="true"></i></span></td>
											<td class="string link club-id" value="<?= $user->club_id ?>"><?= $user->hasValue('club') ? $this->Html->link($user->club->name, ['controller' => 'Clubs', 'action' => 'view', $user->club->id]) : '' ?><span class="external-link-icon"><i class="fa fa-external-link" aria-hidden="true"></i></span></td>
											<td class="string username" value="<?= $user->username ?>"><?= h($user->username) ?></td>
											<td class="string email" value="<?= $user->email ?>"><?= h($user->email) ?></td>
											<td class="string first-name" value="<?= $user->first_name ?>"><?= h($user->first_name) ?></td>
											<td class="string last-name" value="<?= $user->last_name ?>"><?= h($user->last_name) ?></td>
											<td class="datetime token-expires" value="<?= $user->token_expires ?>"><?= h($user->token_expires) ?></td>
											<td class="string api-token" value="<?= $user->api_token ?>"><?= h($user->api_token) ?></td>
											<td class="datetime activation-date" value="<?= $user->activation_date ?>"><?= h($user->activation_date) ?></td>
											<td class="string secret" value="<?= $user->secret ?>"><?= h($user->secret) ?></td>
											<td class="boolean secret-verified" value="<?= $user->secret_verified ?>"><?= h($user->secret_verified) ?></td>
											<td class="datetime tos-date" value="<?= $user->tos_date ?>"><?= h($user->tos_date) ?></td>
											<td class="boolean active" value="<?= $user->active ?>"><?= h($user->active) ?></td>
											<td class="boolean is-superuser" value="<?= $user->is_superuser ?>"><?= h($user->is_superuser) ?></td>
											<td class="string role" value="<?= $user->role ?>"><?= h($user->role) ?></td>
											<td class="boolean enabled" value="<?= $user->enabled ?>"><?= h($user->enabled) ?></td>
											<td class="datetime last-login" value="<?= $user->last_login ?>"><?= h($user->last_login) ?></td>
											<td class="datetime lockout-time" value="<?= $user->lockout_time ?>"><?= h($user->lockout_time) ?></td>
<?php if($config['show_pos']){ ?>
											<td class="number pos" value="<?= $user->pos ?>"><?= h($user->pos) ?></td>
<?php } ?>
<?php if($config['show_visible']){ ?>
											<td class="boolean visible" value="<?= $user->visible ?>"><?= h($user->visible) ?></td>
<?php } ?>
<?php if($config['show_counters']){ ?>
											<td class="number counter competitor-count" value="<?= $user->competitor_count ?>"><?= h($user->competitor_count) ?></td>											<td class="number counter table-count" value="<?= $user->table_count ?>"><?= h($user->table_count) ?></td><?php } ?>
<?php if($config['show_created'] || $config['show_modified']){ ?>
											<td class="datetime">
<?php if($config['show_created']){ ?>
												<span class="fw-bold"><?= h($user->created) ?></span>
<?php } ?>
<?php if($config['show_created'] && $config['show_modified']){ ?>
												<br>
<?php } ?>
<?php if($config['show_modified']){ ?>
												<span class="fw-normal"><?= h($user->modified) ?></span>
<?php } ?>
											</td>
<?php } ?>
<?php if($config['show_button_view'] || $config['show_button_edit'] || $config['show_button_delete'] ){ ?>

											<td class="actions">
<?php if($config['show_button_view']){ ?>
												<?= $this->Html->link('<i class="fa fa-eye"></i>', ['action' => 'view', $user->id], ['escape' => false, 'role' => 'button', 'class' => 'btn btn-warning btn-sm', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => __('View this item'), 'data-original-title' => __('View this item')]) ?>
<?php } ?>

<?php if($config['show_button_edit']){ ?>
												<?= $this->Html->link('<i class="fa fa-edit"></i>', ['action' => 'edit', $user->id], ['escape' => false, 'role' => 'button', 'class' => 'btn btn-primary btn-sm', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => __('Edit this item'), 'data-original-title' => __('Edit this item')]) ?>
<?php } ?>

<?php if($config['show_button_delete']){ ?>
												<?= $this->Form->postLink('', ['action' => 'delete', $user->id], ['class'=>'hide-postlink index-delete-button-class']) ?>
												<a href="javascript:;" class="btn btn-sm btn-danger postlink-delete" data-bs-tooltip="tooltip" data-bs-placement="top" title="<?= __("Delete this record!") ?>" text="<?= h($user->name) ?>" subText="<?= __("You will not be able to revert this!") ?>" confirmButtonText="<?= __("Yes, delete it!") ?>" cancelButtonText="<?= __("Cancel") ?>"><i class="fa fa-minus"></i></a>

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



