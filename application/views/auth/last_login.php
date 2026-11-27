<style>
.login-activity-card {
    border-radius: 1.25rem;
    border: 1px solid #f1f5f9;
    box-shadow: 0 4px 24px rgba(0,0,0,0.04);
    overflow: hidden;
}
.login-activity-card .card-header {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border: none;
    padding: 1.5rem 2rem;
}
.login-item {
    padding: 1rem 1.5rem;
    border-bottom: 1px solid #f8fafc;
    transition: background 0.2s ease;
}
.login-item:hover {
    background: #f8fafc;
}
.login-item:last-child {
    border-bottom: none;
}
.avatar-circle {
    width: 42px;
    height: 42px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 700;
    font-size: 0.85rem;
}
</style>

<div class="d-flex flex-column flex-column-fluid">
    <div class="content fs-6 d-flex flex-column-fluid" id="kt_content">
        <div class="container">

            <!--begin::Row-->
            <div class="row g-5">
                <!-- Operator (RT/RW/Dusun) Last Login -->
                <div class="col-lg-6">
                    <div class="card login-activity-card">
                        <div class="card-header">
                            <h3 class="card-title text-white mb-0">
                                <i class="fa fa-user-circle me-2"></i>Last Login &mdash; User Operator
                            </h3>
                            <p class="text-white opacity-75 mb-0 mt-1 fs-7">Level RT, RW, Dusun</p>
                        </div>
                        <div class="card-body p-0">
                            <?php if (empty($last_login_operator)): ?>
                            <div class="p-5 text-center text-muted">
                                <i class="fa fa-inbox fa-2x mb-3 d-block"></i>
                                Belum ada data login operator.
                            </div>
                            <?php else: ?>
                            <div class="list-group list-group-flush">
                                <?php foreach ($last_login_operator as $user): ?>
                                <div class="login-item d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-circle me-3" style="background:rgba(102,126,234,.1);color:#667eea;">
                                            <?= strtoupper(substr($user->first_name, 0, 1)) ?>
                                        </div>
                                        <div>
                                            <span class="fw-bold text-gray-800 fs-6 d-block"><?= htmlspecialchars($user->first_name . ' ' . $user->last_name) ?></span>
                                            <span class="text-muted fs-7"><?= htmlspecialchars($user->desa ?? '-') . ', ' . htmlspecialchars($user->kecamatan ?? '-') ?></span>
                                        </div>
                                    </div>
                                    <div class="text-end">
                                        <span class="badge bg-light-success text-success fs-7 login-time" data-time="<?= $user->last_login ?>">
                                            <i class="fa fa-clock-o me-1"></i><?= $user->last_login ? date('d M Y H:i', strtotime($user->last_login)) : '-' ?>
                                        </span>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <!-- Kecamatan & Desa Last Login -->
                <div class="col-lg-6">
                    <div class="card login-activity-card">
                        <div class="card-header" style="background: linear-gradient(135deg, #10b981 0%, #059669 100%);">
                            <h3 class="card-title text-white mb-0">
                                <i class="fa fa-users me-2"></i>Last Login &mdash; User Kec &amp; Desa
                            </h3>
                            <p class="text-white opacity-75 mb-0 mt-1 fs-7">Level Kecamatan, Desa</p>
                        </div>
                        <div class="card-body p-0">
                            <?php if (empty($last_login_kec_desa)): ?>
                            <div class="p-5 text-center text-muted">
                                <i class="fa fa-inbox fa-2x mb-3 d-block"></i>
                                Belum ada data login kecamatan/desa.
                            </div>
                            <?php else: ?>
                            <div class="list-group list-group-flush">
                                <?php foreach ($last_login_kec_desa as $user1): ?>
                                <div class="login-item d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-circle me-3" style="background:rgba(16,185,129,.1);color:#10b981;">
                                            <?= strtoupper(substr($user1->first_name, 0, 1)) ?>
                                        </div>
                                        <div>
                                            <span class="fw-bold text-gray-800 fs-6 d-block"><?= htmlspecialchars($user1->first_name . ' ' . $user1->last_name) ?></span>
                                            <span class="text-muted fs-7"><?= htmlspecialchars($user1->desa ?? '-') . ', ' . htmlspecialchars($user1->kecamatan ?? '-') ?></span>
                                        </div>
                                    </div>
                                    <div class="text-end">
                                        <span class="badge bg-light-primary text-primary fs-7 login-time" data-time="<?= $user1->last_login ?>">
                                            <i class="fa fa-clock-o me-1"></i><?= $user1->last_login ? date('d M Y H:i', strtotime($user1->last_login)) : '-' ?>
                                        </span>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Row-->

        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    if (typeof moment !== 'undefined') {
        document.querySelectorAll('.login-time').forEach(function(el) {
            var t = el.getAttribute('data-time');
            if (t) {
                el.innerHTML = '<i class="fa fa-clock-o me-1"></i>' + moment(t).fromNow();
            }
        });
    }
});
</script>
