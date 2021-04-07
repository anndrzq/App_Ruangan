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
								<h4 class="card-title">Data Pinjam Ruangan</h4>

							</div>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table id="add-row" class="display table table-striped table-hover">
									<thead>
										<tr>
											<th>No</th>
											<th>Nama Ruangan</th>
											<th>Tgl Mulai</th>
											<th>Tgl Selesai</th>
											<th>Status</th>
											<th>Action</th>
										</tr>
									</thead>

									<tbody>
										<?php
										$no = 1;
										$query = mysqli_query($conn, 'SELECT pinjamruangan.id, pinjamruangan.id_ruangan, pinjamruangan.id_user, pinjamruangan.tgl_mulai, pinjamruangan.tgl_selesai, pinjamruangan.status, ruangan.nama_ruangan from pinjamruangan inner join ruangan on ruangan.id=pinjamruangan.id_ruangan inner join user on user.id=pinjamruangan.id_user');
										while ($pinjamruangan = mysqli_fetch_array($query)) {
										?>
											<tr>
												<td><?php echo $no++ ?></td>
												<td><?php echo $pinjamruangan['nama_ruangan'] ?></td>
												<td><?php echo $pinjamruangan['tgl_mulai'] ?></td>
												<td><?php echo $pinjamruangan['tgl_selesai'] ?></td>
												<td>
													<?php if ($pinjamruangan['status'] == 'menunggu') { ?>
														<div class="badge badge-danger"><?php echo $pinjamruangan['status'] ?></div>
													<?php } else { ?>
														<div class="badge badge-success"><?php echo $pinjamruangan['status'] ?></div>
													<?php } ?>
												</td>
												<td>
													<?php if ($pinjamruangan['status'] == 'menunggu') { ?>
														<a href="?view=detailpinjamruangan&id=<?php echo $pinjamruangan['id'] ?>" title="Detail" class="btn btn-xs btn-success"><i class="fa fa-eye"></i></a>
														<a href="#modalApprovePinjamRuangan<?php echo $pinjamruangan['id'] ?>" data-toggle="modal" title="Batal Pinjam" class="btn btn-xs btn-success"><i class="fa fa-check-circle"></i> Approve</a>
													<?php } else { ?>
														<a href="?view=detailpinjamruangan&id=<?php echo $pinjamruangan['id'] ?>" title="Detail" class="btn btn-xs btn-success"><i class="fa fa-eye"></i></a>
														<div class="badge badge-success"><?php echo $pinjamruangan['status'] ?></div>
													<?php } ?>
												</td>
											</tr>
										<?php } ?>
									</tbody>
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


<?php
$c = mysqli_query($conn, 'SELECT pinjamruangan.id, pinjamruangan.id_ruangan, pinjamruangan.id_user, pinjamruangan.tgl_mulai, pinjamruangan.tgl_selesai, pinjamruangan.status, ruangan.nama_ruangan, user.email from pinjamruangan inner join ruangan on ruangan.id=pinjamruangan.id_ruangan inner join user on user.id=pinjamruangan.id_user');
while ($row = mysqli_fetch_array($c)) {
?>

	<div class="modal fade" id="modalApprovePinjamRuangan<?php echo $row['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header no-bd">
					<h5 class="modal-title">
						<span class="fw-mediumbold">
							Approve</span>
						<span class="fw-light">
							Pinjaman
						</span>
					</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form method="POST" enctype="multipart/form-data" action="">
					<div class="modal-body">
						<input type="hidden" name="id" value="<?php echo $row['id'] ?>">
						<input type="hidden" name="id_ruangan" value="<?php echo $row['id_ruangan'] ?>">
						<input type="hidden" name="tgl_mulai" value="<?php echo $row['tgl_mulai'] ?>">
						<input type="hidden" name="tgl_selesai" value="<?php echo $row['tgl_selesai'] ?>">
						<div class="form-group">
							<label>Email Pengirim</label>
							<input type="email" name="email_pengirim" class="form-control" placeholder="Email Pengirim ...">
						</div>
						<div class="form-group">
							<label>Password Pengirim</label>
							<input type="password" name="password_penerima" class="form-control" placeholder="Password Pengirim ...">
						</div>
						<input type="hidden" name="status" value="approve">
						<input type="hidden" name="email_penerima" value="<?php echo $row['email'] ?>">
						<input type="hidden" name="nama_ruangan" value="<?php echo $row['nama_ruangan'] ?>">
					</div>
					<div class="modal-footer no-bd">
						<button type="submit" name="ubah" class="btn btn-danger"><i class="fa fa-check-circle"></i> Approve</button>
						<button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-undo"></i> Close</button>
					</div>
				</form>
			</div>
		</div>
	</div>

<?php } ?>

<?php
if (isset($_POST['ubah'])) {
	$id = $_POST['id'];
	$id_ruangan = $_POST['id_ruangan'];
	$email_pengirim = $_POST['email_pengirim'];
	$password_pengirim = $_POST['password_pengirim'];
	$email_penerima = $_POST['email_penerima'];
	$status = $_POST['status'];
	$stat = 'dipinjam';
	$nama_ruangan = $_POST['nama_ruangan'];

	$selSto = mysqli_query($conn, "SELECT * FROM ruangan WHERE id='$id_ruangan'");
	$sto    = mysqli_fetch_array($selSto);
	$stok   = $sto['status'];
	$sisa    = 'free';

	mysqli_query($conn, "UPDATE ruangan SET status='$stat' WHERE id='$id_ruangan'");
	mysqli_query($conn, "UPDATE pinjamruangan SET status='$status' WHERE id='$id'");
}
?>