<?php include("./mvc/views/partials/theme.php"); ?> 
<div class="container-fluid p-0">
	<div class="row m-0">
		<div class="p-2 bg2" style="height: 100vh;width: 320px;">
			<p class="ml-1 font-weight-bold cl" style="font-size: 130%">Dashboard</p>


			<div class="row m-0">

				<?php include("./mvc/views/partials/home-menu-account.php"); ?> 
				<?php include("./mvc/views/partials/home-menu-item.php"); ?>
			</div>
		</div>

		<div class="p-0 bg1" style="height: 100vh;width: calc(100% - 320px)">
			<div class="p-3">
				<p class="float-left cl font-weight-bold mb-0" style="font-size: 130%">Checkout</p>
				<a href="../Home" style="text-decoration: none;color:black;">
					<div id="back-button" class="btn bg-white float-right">Back</div>
				</a>
				<div style="clear: both;"></div>
			</div>
			<div style="height: calc(100vh - 120px);overflow-y: auto;">
				<form>
					<div class="py-2 px-4 cl bg2" style="width: 500px;margin: auto">
						<p class="text-center" style="font-size: 130%">Change Password</p>
						<label>Current Password</label>
						<input id="passwordOld" type="text" class="form-control"  style="background: none;color: white">
						<label class="mt-2">New Password</label>
						<input id="passwordNew" type="text" class="form-control"  style="background: none;color: white">
						<label class="mt-2">Confirm Password</label>
						<input id="passwordRe" type="text" class="form-control"  style="background: none;color: white">
						<div class="text-center mt-3 mb-3">
							<div id="submit-button" class="btn bg-white text-dark">Change Password</div>
						</div>	
						<p id="text-status" class="text-center"></p>	
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){

		$("#submit-button").on('click',function(){
			var passwordOld = $("#passwordOld").val();
			var passwordNew = $("#passwordNew").val();
			var passwordRe = $("#passwordRe").val();
			$.post("./ChangePass/",{passwordOld:passwordOld,passwordNew:passwordNew,passwordRe:passwordRe},function(data){	
				if(data == 1){
					window.location.href = "../Home";
				}else if(data == 2){
					$("#text-status").text("New password and Confirm Password do not match");

				}else if(data == 3){
					$("#text-status").text("Wrong Current Password");
				}
			})
		})
		
	});
</script>