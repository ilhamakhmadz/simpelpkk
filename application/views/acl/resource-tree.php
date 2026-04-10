<?php if (isset($form)) $resource = $form->get_default(); ?>
<?php echo messages(); ?>


<style>
	.timeline-label:before {
		content: none;
	}

	.timeline-label .timeline-item {
		margin-bottom: 0.5rem;
	}
</style>

<br>
<div class="row g-0 g-xl-5 g-xxl-8">
	<div class="col-xl-7">
		<!--begin::List Widget 1-->
		<div class="card card-stretch mb-5 mb-xxl-8">
			<!--begin::Header-->
			<div class="card-header align-items-center border-0 mt-5">
				<h3 class="card-title align-items-start flex-column">
					<span class="fw-bolder text-dark fs-3">Modul Aplikasi</span>
					<!-- <span class="text-muted mt-2 fw-bold fs-6">Updates &amp; notifications</span> -->
				</h3>
				<div class="card-toolbar">
					<!--begin::Dropdown-->
					<button class="btn btn-sm btn-icon btn-color-primary btn-active-light-primary">
						<!--begin::Svg Icon | path: icons/duotone/Layout/Layout-4-blocks-2.svg-->
						<span class="svg-icon svg-icon-1">
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
								<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
									<rect x="5" y="5" width="5" height="5" rx="1" fill="#000000"></rect>
									<rect x="14" y="5" width="5" height="5" rx="1" fill="#000000" opacity="0.3"></rect>
									<rect x="5" y="14" width="5" height="5" rx="1" fill="#000000" opacity="0.3"></rect>
									<rect x="14" y="14" width="5" height="5" rx="1" fill="#000000" opacity="0.3"></rect>
								</g>
							</svg>
						</span>
						<!--end::Svg Icon-->
					</button>
					<!--begin::Menu-->

					<!--end::Menu-->
					<!--end::Dropdown-->
				</div>
			</div>
			<!--end::Header-->
			<!--begin::Body-->
			<div class="card-body pt-3">
				<!--begin::Timeline-->
				<div class="timeline-label">
					<?php
					function display_tree($tree, $acl, $curr_id = 0)
					{
						foreach ($tree as $node) {
							$class = 'fa ';
							switch ($node['type']) {
								case 'module':
									$class .= 'fa-folder ';
									break;
								case 'controller':
									$class .= 'fa-file';
									break;
								case 'action':
									$class .= 'fa-gear';
									break;
								default:
									$class .= 'fa-question';
									break;
							}
							echo '<div class="timeline-item">
										<div class="timeline-badge">
											<i class="fa ' . $class . ' text-success fs-3"></i> &nbsp;&nbsp;
										</div>
										<div class="timeline-content d-flex">';
							if ($curr_id == $node['id'])
								echo '<li><a class="users text-gray-800"';
							else
								echo '<li><a class="users text-muted"';

							if ($acl->is_allowed('acl/resource/edit')) {
								echo ' href="' . site_url('acl/resource/edit/' . $node['id']) . '">';
								echo '<span>' . $node['name'] . '</span>';
								echo '</a>';
							} else {
								echo '<span>' . $node['name'] . '</span>';
							}
							if (isset($node['children'])) {
								echo '<ul class="fa-ul">';
								display_tree($node['children'], $acl, $curr_id);
								echo '</ul>';
							}
							if ($curr_id == $node['id'])
								echo '';
							echo '</li></div></div>';
						}
					}
					?>
					<ul class="fa-ul">
						<?php display_tree($resource_tree, $acl, (isset($resource->id) ? $resource->id : 0)); ?>
					</ul>

				</div>
			</div>
			<!--end: Card Body-->
		</div>
		<!--end::List Widget 1-->
	</div>


	<?php if (isset($form)) : ?>
		<div class="col-xl-5">
			<!--begin::Table Widget 2-->
			<div class="card card-stretch mb-5 mb-xxl-8">
				<?php echo form_open_multipart(uri_string(), array('class' => 'form-horizontal form-bordered', 'id' => 'resource-form', 'name' => 'resource-form')); ?>
				<div class="card-body pt-3 pb-0 mt-n3">
					<br>
					<?php echo $form->fields(array('id', 'name', 'type')) ?>
					<!-- <div class="form-group"> -->
					<?php echo form_label(lang('resource_parent'), 'parent', array('class' => 'col-lg-4 control-label')); ?>

					<?php
					function generate_options($tree, $sep = '')
					{
						$result = array();
						foreach ($tree as $node) {
							$result[$node['id']] = $sep . $node['type'] . '&nbsp;' . $node['name'];
							if (isset($node['children']))
								$result = $result + generate_options($node['children'], $sep . '&nbsp;&nbsp;&nbsp;&nbsp;');
						}
						return $result;
					}
					$parents = array(0 => '(' . lang('resource_parent_none') . ')') + generate_options($resource_tree);
					if (isset($resource->id) && isset($parents[$resource->id]))
						unset($parents[$resource->id]);

					echo form_dropdown(
						'parent',
						$parents,
						set_value('parent', isset($resource->parent) ? $resource->parent : 0),
						'id="parent" class="form-control"'
					);
					?>
					<div class="pull-left mt-30 mr-10">
						<div class="text-center pt-7">
							<?php
							if ($acl->is_allowed('acl/resource/edit')) {
								echo form_button(array(
									'type' => 'submit',
									'name' => 'save-btn',
									'value' => 'save',
									'content' => '<i class="fa fa-check"></i> ' . lang('save'),
									'class' => 'btn btn-primary'
								));
							}
							?>
							<?php
							if (isset($resource->id) && $acl->is_allowed('acl/resource/delete')) {
								$delete_url = site_url('acl/resource/delete/' . $resource->id);
								echo '<a href="#" onclick="deleteItem(' . $resource->id . ')" class="btn btn-danger "><i class="fa fa-trash"></i>Hapus</a>';
								// echo form_confirmwindow('delete-confirm', '<i class="fa fa-trash"></i> ' . lang('delete'), lang('delete'), lang('role_delete_confirm'), $delete_url, 'btn btn-danger pull-right', 'btn btn-danger');
							}
							?>
						</div>
					</div>
				</div>
				<?php echo form_close(); ?>

			</div>
		</div>
	<?php endif; ?>






	<script>
		function deleteItem($id) {

			toastr.options = {
				"closeButton": true,
				"debug": false,
				"newestOnTop": false,
				"progressBar": false,
				"positionClass": "toast-top-right",
				"preventDuplicates": false,
				"onclick": null,
				"showDuration": "100",
				"hideDuration": "1000",
				"timeOut": 0,
				"extendedTimeOut": 0,
				"showEasing": "swing",
				"hideEasing": "linear",
				"showMethod": "fadeIn",
				"hideMethod": "fadeOut",
				"tapToDismiss": false
			};

			toastr.warning("Yakin akan menghapus data<br /><br /><a id='close-toastr' onclick='window.deleteYes(" + $id + ")' type='button' class='btn btn-outline-light btn-sm'>Yes</a>", "Hapus Data")
			$('body').on('click', 'a#close-toastr', function() {
				$(this).closest('.toast').remove();
			});
		}

		function deleteYes($id) {
			toastr.clear();
			toastr.options = {
				"closeButton": false,
				"debug": false,
				"newestOnTop": false,
				"progressBar": false,
				"positionClass": "toast-top-right",
				"preventDuplicates": false,
				"onclick": null,
				"showDuration": "100",
				"hideDuration": "1000",
				"timeOut": "5000",
				"extendedTimeOut": "1000",
				"showEasing": "swing",
				"hideEasing": "linear",
				"showMethod": "fadeIn",
				"hideMethod": "fadeOut"
			};

			toastr.success("Berhasil Menghapus data", "Hapus Data");

			window.location = site_url + "acl/resource/delete/" + $id;
		}
	</script>






	<script>
		$(document).ready(function() {
			$('#type').select2({
				minimumResultsForSearch: 20,
				escapeMarkup: function(markup) {
					return markup;
				},
				templateResult: function(row) {
					return render_type(row.text);
				},
				templateSelection: function(row) {
					return render_type(row.text);
				}
			});
			$('#parent').select2({
				minimumResultsForSearch: 20,
				escapeMarkup: function(markup) {
					return markup;
				},
				templateResult: function(row) {
					return render_parent(row.text);
				},
				templateSelection: function(row) {
					return render_parent(row.text);
				}
			});
		});

		function render_type(text) {
			switch (text) {
				case 'Module':
					return '<i class="fa fa-folder-open-o"></i>&nbsp;&nbsp;' + text;
					break;
				case 'Controller':
					return '<i class="fa fa-file-text-o"></i>&nbsp;&nbsp;' + text;
					break;
				case 'Action':
					return '<i class="fa fa-gear"></i>&nbsp;&nbsp;' + text;
					break;
				default:
					return '<i class="fa fa-question"></i>&nbsp;&nbsp;' + text;
					break;
			}
		}

		function render_parent(text) {
			return text.replace('module', '<i class="fa fa-folder-open-o"></i>&nbsp;')
				.replace('controller', '<i class="fa fa-file-text-o"></i>&nbsp;')
				.replace('action', '<i class="fa fa-gear"></i>&nbsp;')
				.replace('other', '<i class="fa fa-question"></i>&nbsp;');
		}
	</script>