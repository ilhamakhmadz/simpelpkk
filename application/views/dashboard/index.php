<div class="d-flex flex-column flex-column-fluid">
	<!--begin::Content-->
	<div class="content fs-6 d-flex flex-column-fluid" id="kt_content">
		<!--begin::Container-->
		<div class="container">
			<!--begin::Row-->
			<div class="row g-0 g-xl-5 g-xxl-8">
				<div class="col-xl-4">
					<!--begin::Stats Widget 1-->
					<div class="card card-stretch mb-5 mb-xxl-8">
						<!--begin::Header-->
						<div class="card-header align-items-center border-0 mt-5">
							<h3 class="card-title align-items-start flex-column">
								<span class="fw-bolder text-dark fs-3">Jumlah Penduduk</span>
								<span
									class="text-muted mt-2 fw-bold fs-6"><?= number_format($jumlah_penduduk->penduduk) ?>
									Penduduk</span>
							</h3>
							<div class="card-toolbar">
								<input type="hidden" name="perempuan" id="perempuan"
									value="<?= $jumlah_penduduk->perempuan ?>">
								<input type="hidden" name="laki" id="laki" value="<?= $jumlah_penduduk->laki ?>">

								<!--end::Dropdown-->
							</div>
						</div>
						<!--end::Header-->
						<!--begin::Body-->
						<div class="card-body pt-12">
							<!--begin::Chart-->
							<div class="d-flex flex-center position-relative h-175px">
								<img src="<?= assets_url('admin_assets/') ?>assets/media/svg/illustrations/bg-1.svg" class="position-absolute w-100 h-100" style="object-fit: contain; z-index: 0;" alt="Background Ilustrasi" fetchpriority="high">
								<div class="fw-bolder fs-1 text-gray-800 position-absolute" style="z-index: 1;">
									<?= number_format($jumlah_penduduk->penduduk) ?>
								</div>
								<canvas id="kt_stats_widget_1_chart" class="mh-400px position-relative" style="z-index: 1;"></canvas>
							</div>
						</div>
						<!--end: Card Body-->
					</div>
					<!--end::Stats Widget 1-->
				</div>
				<div class="col-xl-8">
					<!--begin::Table Widget 1-->
					<div class="card card-stretch mb-5 mb-xxl-8">
						<!--begin::Header-->
						<div class="card-header border-0 pt-5">
							<h3 class="card-title align-items-start flex-column">
								<span class="card-label fw-bolder text-dark fs-3">Peta Kependudukan</span>
								<!-- <span class="text-muted mt-2 fw-bold fs-6">890,344 Sales</span> -->
							</h3>
							<div class="card-toolbar">
								<ul class="nav nav-pills nav-pills-sm nav-light">
									<li class="nav-item">
										<a class="nav-link btn btn-active-light btn-color-muted py-2 px-4 active fw-bolder me-2"
											data-bs-toggle="tab" href="#kt_tab_pane_1_2">Kecamatan</a>
									</li>
									<li class="nav-item">
										<a class="nav-link btn btn-active-light btn-color-muted py-2 px-4 fw-bolder me-2"
											data-bs-toggle="tab" href="#kt_tab_pane_1_1">Desa</a>
									</li>
									<!-- <li class="nav-item">
										<a class="nav-link btn btn-active-light btn-color-muted py-2 px-4 fw-bolder" data-bs-toggle="tab" href="#kt_tab_pane_1_3">Kabupaten</a>
									</li> -->
								</ul>
							</div>
						</div>
						<!--end::Header-->
						<!--begin::Body-->
						<div class="card-body pt-2 pb-0 mt-n3">
							<div class="tab-content mt-5" id="myTabTables1">
								<!--begin::Tap pane-->
								<div class="tab-pane fade" id="kt_tab_pane_1_1" role="tabpanel"
									aria-labelledby="kt_tab_pane_1_1">
									<!--begin::Table-->
									<div class="table-responsive">
										<table id="dataTable_Desa" class="table align-middle">
											<thead>
												<tr>
													<th class="p-0 w-200px">Nama Desa</th>
													<th class="p-0 min-w-100px">Laki-Laki</th>
													<th class="p-0 min-w-100px">Perempuan</th>
													<th class="p-0 min-w-100px">Jumlah Penduduk</th>
												</tr>
											</thead>
											<tbody>
											</tbody>
											<script>
												window.dataDesa = <?= json_encode($jumlah_by_desa) ?>;
											</script>
										</table>
									</div>
									<!--end::Table-->
								</div>
								<!--end::Tap pane-->
								<!--begin::Tap pane-->
								<div class="tab-pane fade show active" id="kt_tab_pane_1_2" role="tabpanel"
									aria-labelledby="kt_tab_pane_1_2">
									<!--begin::Table-->
									<div class="table-responsive">
										<table id="dataTable_Kecamatan" class="table table-borderless align-middle">
											<thead>
												<tr>
													<th class="p-0 w-200px">Nama Kecamatan</th>
													<th class="p-0 min-w-100px">Laki-Laki</th>
													<th class="p-0 min-w-100px">Perempuan</th>
													<th class="p-0 min-w-100px">Jumlah Penduduk</th>
												</tr>
											</thead>
											<tbody>
											</tbody>
											<script>
												window.dataKecamatan = <?= json_encode($jumlah_by_kecamatan) ?>;
											</script>
										</table>
									</div>
									<!--end::Table-->
								</div>
								<!--end::Tap pane-->
							</div>
						</div>
					</div>
					<!--end::Table Widget 1-->
				</div>
				<?php if($this->session->userdata('level_id') == 4 || $this->session->userdata('level_id') == 3 || $this->session->userdata('level_id') == 2 || $this->session->userdata('level_id') == 1){?>
				<div class="col-xxl-6 mb-xl-10">
					<!--begin::Chart widget 28-->
					<div class="card card-flush h-xl-100">
						<!--begin::Header-->
						<div class="card-header py-7">
							<!--begin::Statistics-->
							<div class="m-0">
								<!--begin::Heading-->
								<div class="d-flex align-items-center mb-2">
									<!--begin::Title-->
									<span class="fs-2hx fw-bold text-gray-800 me-2 lh-1 ls-n2">Last Login</span>
									<!--end::Title-->
								</div>
								<!--end::Heading-->

								<!--begin::Description-->
								<span class="fs-6 fw-semibold text-gray-500">User Operator Login terakhir</span>
								<!--end::Description-->
							</div>
							<!--end::Statistics-->
						</div>
						<!--end::Header-->
						<div class="card-body card-body d-flex justify-content-between flex-column pt-3">
							<?php foreach($last_login as $user): ?>
							<!--begin::Item-->
							<div class="d-flex flex-stack">
								<!--begin::Section-->
								<div class="d-flex align-items-center flex-stack flex-wrap flex-row-fluid d-grid gap-2">
									<!--begin::Content-->
									<div class="me-5">
										<!--begin::Title-->
										<span class="text-gray-800 fw-bold text-hover-primary fs-6"><?=$user->first_name?></span>
										<!--end::Title-->

										<!--begin::Desc-->
										<span
											class="text-gray-500 fw-semibold fs-7 d-block text-start ps-0"><?=$user->desa . ', '.$user->kecamatan?></span>
										<!--end::Desc-->
									</div>
									<!--end::Content-->

									<!--begin::Wrapper-->
									<div class="d-flex align-items-center">
										<!--begin::Info-->
										<div class="m-0">
											<!--begin::Label-->
											<span class="badge badge-light-success fs-base">
												<i class="ki-outline ki-arrow-up fs-5 text-success ms-n1"></i>
												<span id="lastLoginText<?=$user->id?>" style="min-width: 70px; display: inline-block;">...</span>
												<script>
													document.addEventListener('DOMContentLoaded', function() {
														var lastLogin = '<?=$user->last_login?>';
														var lastLoginText = document.getElementById('lastLoginText<?=$user->id?>');
														lastLoginText.textContent = moment(lastLogin).fromNow();
													});
												</script>
											</span>
											<!--end::Label-->
										</div>
										<!--end::Info-->
									</div>
									<!--end::Wrapper-->
								</div>
								<!--end::Section-->
							</div>
							<!--end::Item-->
							<!--begin::Separator-->
							<div class="separator separator-dashed my-3"></div>
							<!--end::Separator-->
							<?php endforeach; ?>
						</div>
					</div>
				</div>
				<div class="col-xxl-6 mb-xl-10">
					<!--begin::Chart widget 28-->
					<div class="card card-flush h-xl-100">
						<!--begin::Header-->
						<div class="card-header py-7">
							<!--begin::Statistics-->
							<div class="m-0">
								<!--begin::Heading-->
								<div class="d-flex align-items-center mb-2">
									<!--begin::Title-->
									<span class="fs-2hx fw-bold text-gray-800 me-2 lh-1 ls-n2">Last Login</span>
									<!--end::Title-->
								</div>
								<!--end::Heading-->

								<!--begin::Description-->
								<span class="fs-6 fw-semibold text-gray-500">User Kec dan Desa Login terakhir</span>
								<!--end::Description-->
							</div>
							<!--end::Statistics-->
						</div>
						<!--end::Header-->

						<div class="card-body card-body d-flex justify-content-between flex-column pt-3">
							<?php foreach($last_login_kec as $user1): ?>
							<!--begin::Item-->
							<div class="d-flex flex-stack">
								<!--begin::Section-->
								<div class="d-flex align-items-center flex-stack flex-wrap flex-row-fluid d-grid gap-2">
									<!--begin::Content-->
									<div class="me-5">
										<!--begin::Title-->
										<span class="text-gray-800 fw-bold text-hover-primary fs-6"><?=$user1->first_name . ' ' . $user1->last_name?></span>
										<!--end::Title-->

										<!--begin::Desc-->
										<span
											class="text-gray-500 fw-semibold fs-7 d-block text-start ps-0"><?=$user1->desa . ', '.$user1->kecamatan?></span>
										<!--end::Desc-->
									</div>
									<!--end::Content-->

									<!--begin::Wrapper-->
									<div class="d-flex align-items-center">
										<!--begin::Info-->
										<div class="m-0">
											<!--begin::Label-->
											<span class="badge badge-light-success fs-base">
												<i class="ki-outline ki-arrow-up fs-5 text-success ms-n1"></i>
												<span id="lastLoginText<?=$user1->id?>" style="min-width: 70px; display: inline-block;">...</span>
												<script>
													document.addEventListener('DOMContentLoaded', function() {
														var lastLogin = '<?=$user1->last_login?>';
														var lastLoginText = document.getElementById('lastLoginText<?=$user1->id?>');
														lastLoginText.textContent = moment(lastLogin).fromNow();
													});
												</script>
											</span>
											<!--end::Label-->
										</div>
										<!--end::Info-->
									</div>
									<!--end::Wrapper-->
								</div>
								<!--end::Section-->
							</div>
							<!--end::Item-->
							<!--begin::Separator-->
							<div class="separator separator-dashed my-3"></div>
							<!--end::Separator-->
							<?php endforeach; ?>
						</div>
					</div>
					<!--end::Chart widget 28-->
				</div>
				<?php } ?>
			</div>
			<!--end::Row-->
		</div>
		<!--end::Container-->
	</div>
	<!--end::Content-->
</div>

