
<div class="cardbox col-md-12">
	<div class="card">
		<div class="btn btn-default pull-right" data-target="#classregform" id="formregtoggle2">
			<i class="fa fa-plus"></i>
		</div>
		<h4>Buat Kelas Baru
		</h4>
		<div class="collapse-register-form" id="classregform">

			<form class="form-horizontal" role="form" method="POST" action="response.php">
				<div class="form-group">
					<label class="col-sm-2 control-label">Kelas</label>
				    <div class="col-sm-2">
				      	<select name="class" class="form-control">
						  	<option disabled selected>Kelas</option>
						  	<option value="X">X</option>
						  	<option value="XI">XI</option>
						  	<option value="XII">XII</option>
						</select>
				    </div>
				    <div class="col-sm-4">
				      	<select name="dept" class="form-control">
						    <option value="Agronomi">Agronomi</option>
						    <option value="Teknik Komputer dan Jaringan">Teknik Komputer dan Jaringan</option>
						    <option value="Bisnis Management">Bisnis Management</option>
						    <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
						    <option value="Kimia Industri">Kimia Industri</option>
						</select>
				    </div>
				    <div class="col-sm-2">
				      	<select name="alph" class="form-control">
						  	<option disabled selected>Abjad</option>
						  	<option value="A">A</option>
						  	<option value="B">B</option>
						  	<option value="C">C</option>
						</select>
				    </div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Tahun Ajaran</label>
				    	<div class="col-sm-2">
				    		<div class="input-group">
					      		<div class="input-group-addon">20</div>
					      		<input name="year1" class="form-control" type="number" required min="00" max="99" minlength="2" maxlength="2">
				    		</div>
				      	</div>
				      	<div class="col-sm-1 year-until"><strong>/</strong></div>
				      	<div class="col-sm-2">
				    		<div class="input-group">
					      		<div class="input-group-addon">20</div>
					      		<input name="year2" class="form-control" type="number" required min="00" max="99" minlength="2" maxlength="2">
				    		</div>
				      	</div>
				</div>
				<div class="form-group">
				    <div class="col-sm-12">
				      	<button type="submit" class="btn btn-default">Buat Kelas Baru</button>
				    </div>
				</div>
			</form>

		</div>
	</div>
</div>

<div class="cardbox col-md-12">
	<div class="card">
		<h4>Kelas</h4>
		<table class="class-table table table-hover" style="">
			<thead >
				<tr>
					<td data-cname="id" style="width: 3%;">No.</td>
					<td data-cname="class" style="width: 5%;">Kelas</td>
					<td data-cname="dept" style="width: 50%;">Paket Keahlian</td>
					<td data-cname="years" style="width: 18%;">Tahun Ajaran</td>
					<td data-cname="member" style="width: 4%;">Siswa</td>
					<td style="width: 20%;">Tools</td>
				</tr>
			</thead>
			<tbody class="class-tbody">	

			</tbody>
		</table>
	</div>
</div>

