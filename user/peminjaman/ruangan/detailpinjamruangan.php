<?php
$query = mysqli_query($conn, "SELECT pinjamruangan.id, pinjamruangan.id_ruangan, pinjamruangan.id_user, pinjamruangan.tgl_mulai, pinjamruangan.tgl_selesai, pinjamruangan.status, ruangan.nama_ruangan, ruangan.foto, ruangan.deskripsi, user.nama_lengkap from pinjamruangan inner join ruangan on ruangan.id=pinjamruangan.id_ruangan inner join user on user.id=pinjamruangan.id_user and pinjamruangan.id='$_GET[id]'");
$d = mysqli_fetch_array($query);
?>

<div class="main-panel">
	<div class="content">
		<div class="page-inner">
			<div class="page-header">
				<h4 class="page-title">Data</h4>
				<ul class="breadcrumbs">
					<li class="nav-home">
						<a href="#">
							<i class="flaticon-home"></i>
						</a>
					</li>
					<li class="separator">
						<i class="flaticon-right-arrow"></i>
					</li>
					<li class="nav-item">
						<a href="#">Pinjam</a>
					</li>
					<li class="separator">
						<i class="flaticon-right-arrow"></i>
					</li>
					<li class="nav-item">
						<a href="#">Ruangan</a>
					</li>
				</ul>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<div class="d-flex align-items-center">
								<h4 class="card-title">Detail Pinjam Ruangan</h4>
							</div>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table class="table">
									<tr>
										<td>Nama Peminjam</td>
										<td>:</td>
										<td><?php echo $d['nama_lengkap'] ?></td>
									</tr>
									<tr>
										<td>Nama Ruangan</td>
										<td>:</td>
										<td><?php echo $d['nama_ruangan'] ?></td>
									</tr>
									<tr>
										<td>Tgl Mulai</td>
										<td>:</td>
										<td><?php echo $d['tgl_mulai'] ?></td>
									</tr>
									<tr>
										<td>Tgl Selesai</td>
										<td>:</td>
										<td><?php echo $d['tgl_selesai'] ?></td>
									</tr>
									<tr>
										<td>Status</td>
										<td>:</td>
										<td><?php echo $d['status'] ?></td>
									</tr>

									<tr>
										<td>Deskripsi</td>
										<td>:</td>
										<td><?php echo $d['deskripsi'] ?></td>
									</tr>

									<tr>
										<td>Foto</td>
										<td>:</td>
										<td><img src="../admin/master/ruangan/Fotoruangan/<?php echo $d['foto'] ?>" width="400" height="200"></td>
									</tr>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<center>
		<h6><b>&copy; Copyright@2020|GPIB CINERE|</b></h6>
	</center>
</div>