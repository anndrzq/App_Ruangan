<div class="main-panel">
	<div class="content">
		<div class="page-inner">
			<div class="page-header">
				<h4 class="page-title">Create</h4>
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
				<div class="col-md-6">
					<div class="card">
						<div class="card-header">
							<div class="card-title">Create Pinjam Ruangan</div>
						</div>
						<form method="POST" action="" enctype="multipart/form-data">
							<div class="card-body">
								<div class="form-group">
									<label>Nama Ruangan</label>
									<select class="form-control" id="id_ruangan" onchange="change(this.value)" name="id_ruangan" required="">
										<option value="" hidden="">-- Pilih Ruangan --</option>
										<?php
										$query       = mysqli_query($conn, 'SELECT * from ruangan');
										$deskripsi 	 = "var deskripsi 		= new Array();\n;";
										$nama_ruangan = "var nama_ruangan= new Array();\n;";
										while ($row = mysqli_fetch_array($query)) {
											if ($row['status'] == 'free') {
												echo '<option value="' . $row['id'] . '">' . $row['nama_ruangan'] . '</option>';
											}
											$deskripsi .= "deskripsi['" . $row['id'] . "'] = {deskripsi:'" . addslashes($row['deskripsi']) . "'};\n";
											$nama_ruangan .= "nama_ruangan['" . $row['id'] . "'] = {nama_ruangan:'" . addslashes($row['nama_ruangan']) . "'};\n";
										}
										?>
									</select>
								</div>

								<input type="hidden" readonly="" id="nama_ruangan" name="nama_ruangan">

								<div class="form-group">
									<label>Deskripsi</label>
									<textarea readonly="" style="white-space: pre-line;" id="deskripsi" rows="5" class="form-control"></textarea>
								</div>

							</div>

					</div>
				</div>

				<div class="col-md-6">
					<div class="card">
						<div class="card-header">
							<div class="card-title">Data Peminjam</div>
						</div>
						<form method="POST" action="" enctype="multipart/form-data">
							<div class="card-body">
								<div class="form-group">
									<label>Email Pengirim</label>
									<input type="email" name="email_user" placeholder="Email Pengirim ..." class="form-control" required="">
								</div>
								<div class="form-group">
									<label>Password Pengirim</label>
									<input type="password" name="password_user" placeholder="Password Pengirim ..." class="form-control" required="">
								</div>

								<div class="form-group">
									<label>Tgl Mulai Pinjam</label>
									<input type="text" readonly="" name="tgl_mulai" class="form-control" value="<?php echo date('Y-m-d') ?>">
								</div>

								<div class="form-group">
									<label>Tgl Selesai Pinjam</label>
									<input type="date" name="tgl_selesai" class="form-control">
								</div>

								<input type="hidden" name="id_user" value="<?php echo $_SESSION['id'] ?>">
								<input type="hidden" name="email_admin" value="emailpenerima@gmail.com">
								<input type="hidden" name="status" value="menunggu">

							</div>
							<div class="card-action">
								<button type="submit" name="simpan" class="btn btn-success"><i class="fa fa-save"></i> Save Changes</button>
								<a href="?view=datapinjamruangan" class="btn btn-danger"><i class="fa fa-undo"></i> Cancel</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<center>
		<h6><b>&copy; Copyright@2020|GPIB CINERE|</b></h6>
	</center>
</div>

<script type="text/javascript">
	<?php
	echo $nama_ruangan;
	echo $deskripsi;
	?>

	function change(id_ruangan) {
		document.getElementById('nama_ruangan').value = nama_ruangan[id_ruangan].nama_ruangan;
		document.getElementById('deskripsi').value = deskripsi[id_ruangan].deskripsi;
	};
</script>

<?php
if (isset($_POST['simpan'])) {

	$id_ruangan = $_POST['id_ruangan'];
	$tgl_mulai = $_POST['tgl_mulai'];
	$tgl_selesai = $_POST['tgl_selesai'];
	$id_user = $_POST['id_user'];
	$status = $_POST['status'];

	$email_user = $_POST['email_user'];
	$email_admin = $_POST['email_admin'];
	$password_user = $_POST['password_user'];
	$nama_ruangan = $_POST['nama_ruangan'];

	$selSto = mysqli_query($conn, "SELECT * FROM ruangan WHERE id='$id_ruangan'");
	$sto    = mysqli_fetch_array($selSto);
	$stok    = $sto['status'];
	//menghitung sisa stok
	$sisa    = 'dipinjam';

	mysqli_query($conn, "INSERT into pinjamruangan values ('','$id_ruangan', '$id_user','$tgl_mulai','$tgl_selesai','$status')");
	mysqli_query($conn, "UPDATE ruangan SET status='$sisa' WHERE id='$id_ruangan'");
}
?>