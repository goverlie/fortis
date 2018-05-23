<div class="row">
	<div class="col-sm-12">
		<div class="page-header">
			<h1><?=$this->title?></h1>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-sm-12">




		<form method="post" action='<?php echo URL; ?>user/editSave/<?php echo $this->user['user_id']; ?>'>
			<table>
				<tr>
					<td>
						<label for="username">Username</label>
					</td>
					<td>
						<input type="text" name="username" id="username" value="<?=$this->user['username']?>" />
					</td>
				</tr>
				<tr>
					<td>
						<label for="password">Password</label>
					</td>
					<td>
						<input type="text" name="password" id="password" />
					</td>
				</tr>
				<tr>
					<td>
						<label for="firstname">Firstname</label>
					</td>
					<td>
						<input type="text" name="firstname" id="firstname" value="<?=$this->user['firstname']?>" />
					</td>
				</tr>
				<tr>
					<td>
						<label for="lastname">Lastname</label>
					</td>
					<td>
						<input type="text" name="lastname" id="lastname" value="<?=$this->user['lastname']?>" />
					</td>
				</tr>
				<tr>
					<td>
						<label for="email">Email</label>
					</td>
					<td>
						<input type="text" name="email" id="email" value="<?=$this->user['email']?>" />
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
						<input class="btn btn-success pull-right" type="submit" value="Save User" />
					</td>
				</tr>
			</table>
		</form>
	</div>
</div>
