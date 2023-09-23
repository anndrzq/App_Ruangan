<?php
$query = mysqli_query($conn, "SELECT pinjambarang.id, pinjambarang.id_barang, pinjambarang.id_user, pinjambarang.tgl_mulai, pinjambarang.tgl_selesai, pinjambarang.qty, pinjambarang.lokasi_barang, pinjambarang.status, barang.nama_barang, barang.foto, barang.deskripsi, user.nama_lengkap from pinjambarang inner join barang on barang.id=pinjambarang.id_barang inner join user on user.id=pinjambarang.id_user and pinjambarang.id='$_GET[id]'");
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
						<a href="#">Barang</a>
					</li>
				</ul>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<div class="d-flex align-items-center">
								<h4 class="card-title">Detail Pinjam Barang</h4>
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
										<td>Nama Barang</td>
										<td>:</td>
										<td><?php echo $d['nama_barang'] ?></td>
									</tr>
									<tr>
										<td>Jumlah Pinjam</td>
										<td>:</td>
										<td><?php echo $d['qty'] ?></td>
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
										<td>Lokasi Barang</td>
										<td>:</td>
										<td><?php echo $d['lokasi_barang'] ?></td>
									</tr>

									<tr>
										<td>Deskripsi</td>
										<td>:</td>
										<td><?php echo $d['deskripsi'] ?></td>
									</tr>

									<tr>
										<td>Foto</td>
										<td>:</td>
										<td><img src="../admin/master/barang/Fotobarang/<?php echo $d['foto'] ?>" width="400" height="200"></td>
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