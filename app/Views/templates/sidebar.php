<nav id="sidebar" class="sidebar js-sidebar">
	<div class="sidebar-content js-simplebar">

		<a class="sidebar-brand" href="<?= base_url('dashboard') ?>">
            <span class="align-middle">SILOGNESAS</span>
        </a>

		<ul class="sidebar-nav">

			<li class="sidebar-header">
				Menu
			</li>

            <!-- Semua role -->
			<li class="sidebar-item <?= url_is('dashboard*') ? 'active' : '' ?>">
				<a class="sidebar-link" href="<?= base_url('dashboard') ?>">
                    <i data-feather="home"></i>
                    <span>Dashboard</span>
                </a>
			</li>

			<li class="sidebar-item <?= url_is('barang*') ? 'active' : '' ?>">
				<a class="sidebar-link" href="<?= base_url('barang') ?>">
                    <i data-feather="box"></i>
                    <span>Kelola Barang</span>
                </a>
			</li>

			<li class="sidebar-item <?= url_is('supplier*') ? 'active' : '' ?>">
				<a class="sidebar-link" href="<?= base_url('supplier') ?>">
                    <i data-feather="user"></i>
                    <span>Kelola Supplier</span>
                </a>
			</li>

			<li class="sidebar-item <?= url_is('transaksi*') ? 'active' : '' ?>">
				<a class="sidebar-link" href="<?= base_url('transaksi') ?>">
                    <i data-feather="trending-up"></i>
                    <span>Kelola Transaksi</span>
                </a>
			</li>


            <!-- Guru + Superadmin -->
            <?php if(in_groups(['guru','superadmin'])) : ?>
			

			<li class="sidebar-header">
				Menu Admin
			</li>

			<li class="sidebar-item <?= url_is('laporan*') ? 'active' : '' ?>">
				<a class="sidebar-link" href="<?= base_url('laporan') ?>">
                    <i data-feather="book"></i>
                    <span>Laporan</span>
                </a>
			</li>

            <?php endif; ?>


            <!-- Superadmin saja -->
            <?php if(in_groups('superadmin')) : ?>

			<li class="sidebar-header">
				Menu Superadmin
			</li>

			<li class="sidebar-item <?= url_is('gudang*') ? 'active' : '' ?>">
				<a class="sidebar-link" href="<?= base_url('gudang') ?>">
                    <i data-feather="database"></i>
                    <span>Kelola Gudang</span>
                </a>
			</li>

			<li class="sidebar-item <?= url_is('rak*') ? 'active' : '' ?>">
				<a class="sidebar-link" href="<?= base_url('rak') ?>">
                    <i data-feather="layers"></i>
                    <span>Kelola Rak</span>
                </a>
			</li>

			<li class="sidebar-item <?= url_is('users*') ? 'active' : '' ?>">
				<a class="sidebar-link" href="<?= base_url('users') ?>">
                    <i data-feather="users"></i>
                    <span>Kelola User</span>
                </a>
			</li>

            <?php endif; ?>

		</ul>
	</div>
</nav>