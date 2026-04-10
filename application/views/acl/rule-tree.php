					<style>
						.timeline-label:before {
							content: none;
						}
					</style>

					<br>
					<?php echo messages(); ?>

					<div class="row g-0 g-xl-5 g-xxl-8">
						<div class="col-xl-4">
							<!--begin::List Widget 1-->
							<div class="card card-stretch mb-5 mb-xxl-8">
								<!--begin::Header-->
								<div class="card-header align-items-center border-0 mt-5">
									<h3 class="card-title align-items-start flex-column">
										<span class="fw-bolder text-dark fs-3">Jenis User</span>
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
												echo '<div class="timeline-item">
														<div class="timeline-badge">
															<i class="fa fa-genderless text-success fs-1"></i>
														</div>
														<div class="timeline-content d-flex">';
												if ($curr_id == $node['id'])
													echo '<span class="fw-bolder  ps-3"> <a class="users text-gray-800"';
												else
													echo '<span class="fw-bolder  ps-3"> <a class="users text-muted"';
												if ($acl->is_allowed('acl/rule/edit')) {
													echo ' href="' . site_url('acl/rule/edit/' . $node['id']) . '" >';
													echo '<span>' . $node['name'] . '</span>';
													echo '</a>';
												} else {
													echo '<span>' . $node['name'] . '</span>';
												}
												if ($curr_id == $node['id'])
													echo '</strong>';
												if (isset($node['children'])) {
													echo '<ul class="fa-ul">';
													display_tree($node['children'], $acl, $curr_id);
													echo '</ul>';
												}
												echo '</div></div></span>';
											}
										}
										?>
										<ul class="fa-ul">
											<?php display_tree($role_tree, $acl, (isset($role->id) ? $role->id : 0)); ?>
										</ul>

									</div>
								</div>
								<!--end: Card Body-->
							</div>
							<!--end::List Widget 1-->
						</div>

						<?php if (isset($role)) : ?>
							<div class="col-xl-8">
								<!--begin::Table Widget 2-->
								<div class="card card-stretch mb-5 mb-xxl-8">
									<?php echo form_open_multipart(uri_string(), array('class' => 'form-horizontal', 'id' => 'role-form', 'name' => 'role-form')); ?>
									<?php echo form_hidden(array('id' => set_value('id', isset($role->id) ? $role->id : ''))); ?>
									<div class="card-header border-0 pt-5">
										<h3 class="card-title align-items-start flex-column">
											<span class="card-label fw-bolder text-dark fs-3">User <a href="<?php echo site_url('acl/role/edit/' . $role->id) ?>"><?php echo $role->name ?></a></span>
											<span class="text-muted mt-2 fw-bold fs-6">
												<?php
												$parents_value = '';
												if (isset($role->parents) && count($role->parents) > 0) {
													foreach ($role->parents as $index => $parent) {
													}
												} else
													$parents_value = '-';
												?>
												<?php echo $parents_value; ?>
											</span>
										</h3>
									</div>
									<div class="card-body pt-3 pb-0 mt-n3">
										<div class="tab-content mt-4" id="myTabTables2">
											<!--begin::Tap pane-->
											<div class="tab-pane fade show active" id="kt_tab_pane_2_1" role="tabpanel" aria-labelledby="kt_tab_pane_2_1">
												<div class="table-responsive">
													<table class="table table-borderless align-middle" id="table_resources">
														<thead>
															<tr>
																<th>Resource</th>
																<th style="width: 5em; text-align: center;"><?php echo lang('rule_allow'); ?></th>
																<th style="width: 5em; text-align: center;"><?php echo lang('rule_deny'); ?></th>
																<th style="width: 5em; text-align: center;"><?php echo lang('rule_inherited'); ?></th>
															</tr>
														</thead>
														<tbody>
															<tr class="tr-filter">
																<td>
																	<span id="resource-filter-reset" class="fa fa-times"></span>
																	<input type="text" class="form-control rounded" placeholder="Search" id="resource-filter" />
																</td>
																<td colspan="3">
																	<select id="resource-access-filter" class="form-control">
																		<option value="">(All)</option>
																		<option value="success">Allow</option>
																		<option value="danger">Deny</option>
																	</select>
																</td>
															</tr>
															<?php
															function display_resource($role, $tree, $values, $acl, $sep, $iParent)
															{
																$i = 0;
																foreach ($tree as $node) :
																	$i++;

																	$checkname = 'rule_resource[' . $node['id'] . ']';
																	$value = '';
																	if (isset($values[$node['id']]))
																		$value = $values[$node['id']]->access;

																	if ($value == 'allow')
																		$acl->removeAllow($role, $node['name']);
																	elseif ($value == 'deny')
																		$acl->removeDeny($role, $node['name']);

																	$default_value = $acl->isAllowed($role, $node['name']) ? 'allow' : 'deny';

																	$tr_class = '';
																	if ($default_value == 'allow') {
																		$tr_class = 'success';
																	} elseif ($default_value == 'deny') {
																		$tr_class = 'danger';
																	}
																	if ($value == 'allow') {
																		$tr_class = 'success';
																	} elseif ($value == 'deny') {
																		$tr_class = 'danger';
																	}
															?>
																	<tr class="<?php echo $tr_class ?>">
																		<?php
																		$icon = 'fa-folder-open';
																		switch ($node['type']) {
																			case 'module':
																				$icon = 'fa-folder-open';
																				break;
																			case 'controller':
																				$icon = 'fa-file-text-o';
																				break;
																			case 'action':
																				$icon = 'fa-gear';
																				break;
																		}
																		?>
																		<td class="resource-column" style="max-width: 200px; overflow-x: auto;">
																			<?php echo $sep ?><i class="fa <?php echo $icon ?>"></i>&nbsp;&nbsp;<?php echo $node['name'] ?>
																		</td>
																		<td>
																			<label class="i-switch">
																				<input class="form-check-input" type="radio" id="allow<?php echo $iParent . '_' . $i ?>" name="<?php echo $checkname ?>" value="allow" <?php echo set_radio($checkname, 'allow', ($value == 'allow')); ?> />
																				<i></i>
																			</label>
																		</td>
																		<td>
																			<label class="i-switch">
																				<input class="form-check-input" type="radio" id="deny<?php echo $iParent . '_' . $i ?>" name="<?php echo $checkname ?>" value="deny" <?php echo set_radio($checkname, 'deny', ($value == 'deny')); ?> />
																				<i></i>
																			</label>
																		</td>
																		<td>
																			<label class="i-switch">
																				<input class="form-check-input" type="radio" name="<?php echo $checkname ?>" value="" <?php echo set_radio($checkname, '', ($value == '')); ?> />
																				<i></i>
																			</label>
																		</td>
																	</tr>
															<?php
																	if (isset($node['children']))
																		display_resource($role, $node['children'], $values, $acl, $sep . '&nbsp;&nbsp;&nbsp;&nbsp;', $iParent . '_' . $i);
																endforeach;
															}
															$sep = '';
															display_resource($role->name, $resources, $rules, $acl->acl, $sep, '');
															?>
														</tbody>
													</table>
													<div class="pull-left mt-30 mr-10">
														<?php
														if ($acl->is_allowed('acl/rule/edit')) {
															// echo '<div class="text-center pt-7">
															// 					<button type="submit" class="btn btn-primary fw-bolder fs-6 px-7 py-3" data-bs-toggle="modal" data-bs-target="#kt_modal_create_app">Simpan</button>
															// 				</div>';
															echo form_button(array(
																'type' => 'submit',
																'name' => 'save-btn',
																'value' => 'save',
																'content' => '<i class="fa fa-check"></i> ' . lang('save'),
																'class' => 'btn btn-primary'
															));
														}
														?>
														<br>
													</div>
												</div>
											</div>
										</div>
									</div>
									<?php echo form_close(); ?>
								</div>
								<!--end::Table Widget 2-->
							</div>
						<?php endif; ?>

					</div>



					<style>
						.table>tbody>.tr-filter>td {
							padding: 5px;
							background-color: #fafbfc;
							position: relative;
						}

						#resource-filter-reset {
							position: absolute;
							top: 16px;
							right: 16px;
							cursor: pointer;
						}
					</style>
					<script>
						$(document).ready(function() {
							$('#table_resources').on('change', 'input[type="radio"]', function() {
								var $tr = $(this).parents('tr');
								var $check_radio = $tr.find(':checked');

								$tr.removeClass('success').removeClass('danger');
								if ($check_radio.parent('label').hasClass('bg-success'))
									$tr.addClass('success');
								else
									$tr.addClass('danger');
							});
							$('#resource-filter').on('keyup', function() {
								filter_resource();
							});
							$('#resource-filter-reset').on('click', function() {
								$('#resource-filter').val('').trigger('keyup');
							});
							$('#resource-access-filter').on('change', function() {
								filter_resource();
							});
						});

						function filter_resource() {
							var search = $('#resource-filter').val();
							var access = $('#resource-access-filter').val();

							$('.resource-column').each(function() {
								var $row = $(this).parent('tr');
								var resource = $(this).text();

								if (resource.search(new RegExp(search, "i")) < 0 || (access !== '' && !$row.hasClass(access))) {
									$row.hide();
								} else {
									$row.show();
								}
							});
						}
					</script>