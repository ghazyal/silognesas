<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SILOGNESAS | <?= $this->renderSection('title') ?></title>
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css')?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/app.css')?>">
    <link rel="icon" href="<?= base_url('assets/img/icons/favicon.svg')?>">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
	<style>

		.dataTables_filter input{
			border-radius:8px;
			margin-left:8px;
		}

		.dataTables_length select{
			border-radius:8px;
		}

		.dataTables_wrapper .row{
			align-items:center;
		}

		.pagination{
			justify-content:end;
		}

		/* Search + dropdown atas */
		.dataTables_filter,
		.dataTables_length{
			margin-bottom:20px;
		}

		/* Hilangkan bullet */
		.dataTables_paginate ul,
		.dataTables_paginate li,
		.pagination{
			list-style:none !important;
			padding-left:0 !important;
		}

		/* Area pagination */
		.dataTables_wrapper .pagination{
			display:flex !important;
			justify-content:flex-end;
			gap:8px;
			margin-top:20px !important;
		}

		/* Tombol pagination gede */
		.dataTables_wrapper .page-link{

			min-width:42px;
			height:42px;

			display:flex;
			align-items:center;
			justify-content:center;

			font-size:15px;
			font-weight:600;

			border-radius:10px !important;
			padding:0 15px;

		}

		/* Tombol aktif */
		.dataTables_wrapper .page-item.active .page-link{

			background:#3b7ddd !important;
			border-color:#3b7ddd !important;
			color:#fff !important;

		}

		/* Hover */
		.dataTables_wrapper .page-link:hover{

			background:#f4f7fc;

		}

		.dataTables_wrapper .page-link:focus{
			box-shadow:none !important;
		}

		/* Biar tabel ga nempel */
		.table{
			margin-top:10px !important;
		}

		.dashboard-card{
			border:none;
			transition:all .3s ease;
		}

		.dashboard-card:hover{
			transform:translateY(-5px);

			box-shadow:
			0 .7rem 1.5rem rgba(
				0,0,0,.2
			);
		}

		/* Total Barang */
		.bg-barang{
			background:
			linear-gradient(
			135deg,
			#4e73df,
			#224abe
			);
		}

		/* Transaksi Masuk */
		.bg-masuk{
			background:
			linear-gradient(
			135deg,
			#1cc88a,
			#13855c
			);
		}

		/* Stok */
		.bg-stok{
			background:
			linear-gradient(
			135deg,
			#f6c23e,
			#dda20a
			);
		}

		/* Transaksi Keluar */
		.bg-keluar{
			background:
			linear-gradient(
			135deg,
			#e74a3b,
			#be2617
			);
		}

		.dashboard-card .stat{

			background:
			rgba(
			255,
			255,
			255,
			.15
			);

			padding:10px;

			border-radius:12px;
		}

		.dashboard-card .card-title{
			opacity:.9;
		}

		.icon-dashboard{
			color:white !important;

			background:
			rgba(
				255,
				255,
				255,
				.15
			);

			padding:10px;

			border-radius:12px;
		}

		.icon-dashboard svg{
			color:white !important;
			stroke:white !important;
		}

		.badge-dashboard{

			padding:
			.5rem .8rem;

			border-radius:
			20px;

			font-size:
			.75rem;

			font-weight:
			600;
		}

		.chart-xs{

			height:220px !important;

		}

	</style>
</head>
<body>
    <div class="wrapper">
        <?= $this->include('templates/sidebar') ?>

        <div class="main">
            <?= $this->include('templates/navbar') ?>

            <main class="content">
                <?= $this->renderSection('content') ?>

            </main>

            <?= $this->include('templates/footer') ?>
        </div>
    </div>
    
    <script src="<?= base_url('assets/js/app.js')?>"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

	<?php if(session()->getFlashdata('success')): ?>

		<script>

			Swal.fire({

				icon:'success',

				title:'Berhasil',

				text:'<?= session()->getFlashdata('success') ?>',

				timer:2500,

				showConfirmButton:false

			});

		</script>

			<?php endif ?>

			<?php if(session()->getFlashdata('error')): ?>

		<script>

			Swal.fire({

				icon:'error',

				title:'Oops...',

				text:'<?= session()->getFlashdata('error') ?>'

			});

		</script>

			<?php endif ?>

			<?php if(session()->getFlashdata('warning')): ?>

		<script>

			Swal.fire({

				icon:'warning',

				title:'Perhatian',

				text:'<?= session()->getFlashdata('warning') ?>'

			});

		</script>

	<?php endif ?>

	<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
	<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script>
		document.addEventListener("DOMContentLoaded", function() {
			var ctx = document.getElementById("chartjs-dashboard-line").getContext("2d");
			var gradient = ctx.createLinearGradient(0, 0, 0, 225);
			gradient.addColorStop(0, "rgba(215, 227, 244, 1)");
			gradient.addColorStop(1, "rgba(215, 227, 244, 0)");
			// Line chart
			new Chart(document.getElementById("chartjs-dashboard-line"), {
				type: "line",
				data: {
					labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
					datasets: [{
						label: "Sales ($)",
						fill: true,
						backgroundColor: gradient,
						borderColor: window.theme.primary,
						data: [
							2115,
							1562,
							1584,
							1892,
							1587,
							1923,
							2566,
							2448,
							2805,
							3438,
							2917,
							3327
						]
					}]
				},
				options: {
					maintainAspectRatio: false,
					legend: {
						display: false
					},
					tooltips: {
						intersect: false
					},
					hover: {
						intersect: true
					},
					plugins: {
						filler: {
							propagate: false
						}
					},
					scales: {
						xAxes: [{
							reverse: true,
							gridLines: {
								color: "rgba(0,0,0,0.0)"
							}
						}],
						yAxes: [{
							ticks: {
								stepSize: 1000
							},
							display: true,
							borderDash: [3, 3],
							gridLines: {
								color: "rgba(0,0,0,0.0)"
							}
						}]
					}
				}
			});
		});
	</script>
	
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			// Bar chart
			new Chart(document.getElementById("chartjs-dashboard-bar"), {
				type: "bar",
				data: {
					labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
					datasets: [{
						label: "This year",
						backgroundColor: window.theme.primary,
						borderColor: window.theme.primary,
						hoverBackgroundColor: window.theme.primary,
						hoverBorderColor: window.theme.primary,
						data: [54, 67, 41, 55, 62, 45, 55, 73, 60, 76, 48, 79],
						barPercentage: .75,
						categoryPercentage: .5
					}]
				},
				options: {
					maintainAspectRatio: false,
					legend: {
						display: false
					},
					scales: {
						yAxes: [{
							gridLines: {
								display: false
							},
							stacked: false,
							ticks: {
								stepSize: 20
							}
						}],
						xAxes: [{
							stacked: false,
							gridLines: {
								color: "transparent"
							}
						}]
					}
				}
			});
		});
	</script>
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			var markers = [{
					coords: [31.230391, 121.473701],
					name: "Shanghai"
				},
				{
					coords: [28.704060, 77.102493],
					name: "Delhi"
				},
				{
					coords: [6.524379, 3.379206],
					name: "Lagos"
				},
				{
					coords: [35.689487, 139.691711],
					name: "Tokyo"
				},
				{
					coords: [23.129110, 113.264381],
					name: "Guangzhou"
				},
				{
					coords: [40.7127837, -74.0059413],
					name: "New York"
				},
				{
					coords: [34.052235, -118.243683],
					name: "Los Angeles"
				},
				{
					coords: [41.878113, -87.629799],
					name: "Chicago"
				},
				{
					coords: [51.507351, -0.127758],
					name: "London"
				},
				{
					coords: [40.416775, -3.703790],
					name: "Madrid "
				}
			];
			var map = new jsVectorMap({
				map: "world",
				selector: "#world_map",
				zoomButtons: true,
				markers: markers,
				markerStyle: {
					initial: {
						r: 9,
						strokeWidth: 7,
						stokeOpacity: .4,
						fill: window.theme.primary
					},
					hover: {
						fill: window.theme.primary,
						stroke: window.theme.primary
					}
				},
				zoomOnScroll: false
			});
			window.addEventListener("resize", () => {
				map.updateSize();
			});
		});
	</script>
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			var date = new Date(Date.now() - 5 * 24 * 60 * 60 * 1000);
			var defaultDate = date.getUTCFullYear() + "-" + (date.getUTCMonth() + 1) + "-" + date.getUTCDate();
			document.getElementById("datetimepicker-dashboard").flatpickr({
				inline: true,
				prevArrow: "<span title=\"Previous month\">&laquo;</span>",
				nextArrow: "<span title=\"Next month\">&raquo;</span>",
				defaultDate: defaultDate
			});
		});
	</script>
	<script>

		document.addEventListener(
		'DOMContentLoaded',
		function(){

		$('.datatable').DataTable({

			pageLength:5,

			lengthMenu:[
				[5,10,25,50],
				[5,10,25,50]
			],

			responsive:true,

			autoWidth:false,

			language:{

				search:"",

				searchPlaceholder:"Cari data...",

				lengthMenu:"Tampilkan _MENU_ data",

				info:
				"Menampilkan _START_ - _END_ dari _TOTAL_ data",

				paginate:{
					previous:"‹",
					next:"›"
				}

			}

		});

		});

	</script>
</body>
</html>