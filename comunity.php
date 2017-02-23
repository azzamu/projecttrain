<div class="cardbox col-md-12">
	<div class="card">
		<div class="btn btn-default pull-right" data-target="#studentregform" id="formregtoggle1">
			<i class="fa fa-plus"></i>
		</div>
		<h4>Buat Kelas Baru
		</h4>
		<div class="collapse-register-form" id="studentregform">

			<form class="form-horizontal" role="form" method="POST" action="response.php">
				
				<div class="form-group">
					<label class="col-sm-2 control-label">Nama Lengkap</label>
				    <div class="col-sm-8">
				      	<input type="text" class="form-control" name="fullname" required>
				    </div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Email</label>
				    <div class="col-sm-8">
				      	<input type="email" class="form-control" name="email" required>
				    </div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Kelas</label>
				    <div class="col-sm-4">
				      	<select name="class_id" class="form-control" id="student-class">	
						</select>
				    </div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">NISN</label>
				    <div class="col-sm-4">
				      	<input type="text" class="form-control" name="nisn" required>
				    </div>
				</div>
				<div class="form-group">
				    <div class="col-sm-12">
				      	<button type="submit" class="btn btn-default">Daftarkan Siswa</button>
				    </div>
				</div>
			</form>

		</div>
	</div>
</div>


<div class="cardbox col-md-12">
	<div class="card">
		<h4>Komunitas Sekolah</h4>
		<div class="settings">
			
		</div>
		<div class="students-table">
			<table class="table">
				<thead>
					<tr>
						<td style="width: 5%;" data-stname="id">No</td>
						<td style="width: 38%;" data-stname="fullname">Nama</td>
						<td style="width: 30%;" data-stname="class">Kelas</td>
						<td style="width: 13%;" data-stname="nisn">NISN</td>
						<td style="width: 15%;">Tools</td>
					</tr>
				</thead>
			<tbody class="students-tbody">	

			</tbody>
			</table>
		</div>
	</div>
</div>

