<?php
include "inc/header.php";
?>
<?php
if (Session::get('logged') == true) {
	header('location:order.php');
}
?>
<div class="main">
	<div class="content">
		<?php
		if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['signin'])) {
			$customarLogin = $cus->customarLogin($_POST);
		}
		?>
		<div class="login_panel">
			<h3>Existing Customers</h3>
			<p>Sign in with the form below.</p>

			<?php echo $customarLogin ?? ''; ?>
			<form action="" method="post">
				<input name="email" type="email" placeholder="Example@web.com" class="cus">
				<input name="password" type="password" placeholder="****" class="cus">
				<p class="note">If you forgot your passoword just enter your email and click <a href="#">here</a></p>
				<div class="search">
					<div><button type="submit" name="signin" class="grey">Sign In</button></div>
				</div>
		</div>
		</form>


		<?php
		if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
			$customar = $cus->customarInfo($_POST);
		}

		?>
		<div class="register_account">

			<h3>Register New Account</h3>
			<?php echo $customar ?? ''; ?>
			<form action="" method="POST">
				<table>
					<tbody>
						<tr>
							<td>
								<div>
									<input type="text" name="name" placeholder="Name">
								</div>

								<div>
									<input type="text" name="city" placeholder="City">
								</div>

								<div>
									<input type="text" name="zip" placeholder="Zip Code">
								</div>
								<div>
									<input type="email" class="cus" name="email" placeholder="Example@web.com">
								</div>
							</td>
							<td>
								<div>
									<input type="text" name="address" placeholder="Address">
								</div>
								<div>
									<select id="country" name="country">
									<option value="null">Select a Country</option>
									<?php 
									$country= $cus->country();
									if($country){
										while($cRow= $country->fetch_assoc()){
										?>
									<option value="<?php echo $cRow['id'];?>"><?php echo $cRow['countryName'];?></option>
								<?php }} ?>
										
										<!-- <option value="AF">Afghanistan</option>
										<option value="AL">Albania</option>
										<option value="DZ">Algeria</option>
										<option value="AR">Argentina</option>
										<option value="AM">Armenia</option>
										<option value="AW">Aruba</option>
										<option value="AU">Australia</option>
										<option value="AT">Austria</option>
										<option value="AZ">Azerbaijan</option>
										<option value="BS">Bahamas</option>
										<option value="BH">Bahrain</option>
										<option value="BD">Bangladesh</option> -->

									</select>
								</div>

								<div>
									<input type="text" name="phone" placeholder="+88014">
								</div>

								<div>
									<input type="password" class="cus" name="pass" placeholder="******">
								</div>
							</td>
						</tr>
					</tbody>
				</table>
				<div class="search">
					<div><button type="submit" name="submit" class="grey">Create Account</button></div>
				</div>
				<p class="terms">By clicking 'Create Account' you agree to the <a href="#">Terms &amp; Conditions</a>.</p>
				<div class="clear"></div>
			</form>
		</div>
		<div class="clear"></div>
	</div>
</div>
<?php
include "inc/footer.php";
?>