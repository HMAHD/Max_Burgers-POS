<?php include("./mvc/views/partials/theme.php"); ?>
<div id="checkout-box" class="container-fluid p-0">
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
				<a href="../../Home">
					<div id="back-button" class="btn bg-white float-right">Back</div>
				</a>
				<div style="clear: both;"></div>
			</div>


			<div class="px-2" style="width: 800px;height: 300px;margin: auto">
				<table id="get-html-table" class="table bg2 cl">
					<thead>
						<tr>
							<th scope="col">ID</th>
							<th scope="col">Name</th>
							<th scope="col">Qty</th>
							<th scope="col">Price</th>
						</tr>
					</thead>
					<tbody>

						<?php
						$stt = 1;
						foreach ($data["GetOrderCheckout"] as $value) {
							echo '<tr>
							<th scope="row">' . $stt++ . '</th>
							<td>' . $value["name"] . '</td>
							<td>' . $value["quanlity"] . '</td>
							<td>' . $value["price"] * $value["quanlity"] . 'RS</td>
							</tr>';
						}
						?>

					</tbody>
					<thead>
						<tr>
							<th scope="col">Fee</th>
							<th scope="col">Sale</th>
							<th scope="col">Voucher</th>
							<th scope="col">Total</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td id="fee"></td>
							<td id="sale"></td>
							<td id="voucher"></td>
							<td id="total"></td>
						</tr>
					</tbody>
				</table>

				<div style="width: 100%;height: 200px;">
					<div class="float-left bg2" style="width: 47%;height: 50px;display: flex;">
						<input id="received" class="pl-3" type="number" name="" style="width: 100%;height: 100%;background: none;border: 0;outline: none;color: white" placeholder="Received">
						<div class="text-center" style="width: 50px;height: 50px;">
							<i class="fa fa-money cl" aria-hidden="true" style="line-height: 50px;font-size: 130%"></i>
						</div>
					</div>

					<div class="float-right bg2" style="width: 47%;height: 50px;display: flex;">
						<input id="return" class="pl-3" type="" name="" style="width: 100%;height: 100%;background: none;border: 0;outline: none;color: white" placeholder="Return" disabled>
						<div style="width: 50px;height: 50px;">

						</div>
					</div>

					<div style="clear: both;"></div>

					<div id="finish-button" style="display: none;">
						<div id="FinishCheckout" class="btn bg2 cl mt-4 float-left" style="width: 78%;">Finish</div>
						<div class="js-print-link btn bg2 cl mt-4 float-right" style="width: 20%;"><i class="fa fa-print cl" aria-hidden="true" style="font-size: 130%"></i>
						</div>
					</div>
				</div>
			</div>


		</div>
	</div>
</div>




<div id="print" class="mt-2 p-4 shadow-ok" style="width: 350px;height: 500px;display: none;">
	<p class="text-center">Order Recipt</p>
	<p class="mb-0">Max Burgers</p>
	<p class="mb-0">Phone: 075-9007900</p>
	<p>Cashier : Admin</p>
	<p class="float-left mb-0 font-weight-bold mb-0" style="width: 50%">Name</p>
	<p class="float-left mb-0 font-weight-bold mb-0" style="width: 25%">Qty</p>
	<p class="float-left mb-0 font-weight-bold mb-0" style="width: 25%">
	<p class="float-right mb-0 font-weight-bold mb-0">Price</p>
	</p>
	<div style="clear: both;"></div>
	<div>
		<?php
		foreach ($data["GetOrderCheckout"] as $value) {
			echo '<p class="float-left mb-0" style="width: 50%">' . $value['name'] . 'RS</p>
			<p class="float-left mb-0" style="width: 25%">' . $value['quanlity'] . 'RS</p>
			<p class="float-left mb-0 bg-danger" style="width: 25%">
			<p class="float-right mb-0">' . $value['quanlity'] * $value['price'] . 'RS</p>
			</p>
			<div style="clear: both;"></div>';
		}
		?>

	</div>
	<p class="float-left mb-0 mt-3">Discount</p>
	<p id="discount-bill" class="float-right mb-0 mt-3">50 RS</p>
	<div style="clear: both;"></div>
	<p class="float-left mb-0">Fee</p>
	<p id="fee-bill" class="float-right mb-0">0</p>
	<div style="clear: both;"></div>
	<p class="float-left mb-0">Voucher</p>
	<p id="voucher-bill" class="float-right mb-0">0</p>
	<div style="clear: both;"></div>
	<p class="float-left mb-0 font-weight-bold" style="font-size: 130%">Total</p>
	<p id="total-bill" class="float-right mb-0 font-weight-bold" style="font-size: 130%">5d</p>
	<div style="clear: both;"></div>

	<p class="float-left mb-0 mt-3">Received</p>
	<p id="received-bill" class="float-right mb-0 mt-3"></p>
	<div style="clear: both;"></div>
	<p class="float-left mb-0">Return</p>
	<p id="return-bill" class="float-right mb-0"></p>
	<div style="clear: both;"></div>
</div>

<script type="text/javascript">
	$('.js-print-link').on('click', function() {
		$("#checkout-box").hide();

		$("#print").show();
		window.print();
		$("#checkout-box").show();
		$(".hidePrinf").show();
		$("#print").hide();
	});

	var fee1 = JSON.parse(localStorage.getItem('fee1'));
	var fee2 = JSON.parse(localStorage.getItem('fee2'));
	var sale = JSON.parse(localStorage.getItem('sale'));
	var voucher = JSON.parse(localStorage.getItem('voucher'));
	var total = JSON.parse(localStorage.getItem('total'));

	$("#fee").text(fee1 + fee2 + '%');
	$("#fee-bill").text(fee1 + fee2 + '%');
	$("#sale").text(sale + '%');
	$("#discount-bill").text(sale + '%');
	if (voucher == null) {
		$("#voucher").text(0);
		$("#voucher-bill").text(0);
	} else {
		$("#voucher").text(voucher + 'RS');
		$("#voucher-bill").text(voucher + 'RS');
	}
	$("#total").text(total + 'RS');
	$("#total-bill").text(total + 'RS');
	$("#return").val(total + 'RS');



	$("#received").keyup(function() {
		var received = $("#received").val();
		$("#received-bill").text(received + 'RS');
		$("#return").val(total - received * 1 + 'RS');
		$("#return-bill").text(-1 * (total - received * 1) + 'RS');
		if (total - received * 1 <= 0) {
			$("#finish-button").show();

		} else {
			$("#finish-button").hide();
		}
	})

	$(document).ready(function() {
		var id = JSON.parse(localStorage.getItem('idTable'));
		$.ajax({
			url: '../../Table/ResetTable/' + id,
			type: 'get',
			dataType: 'json',
			success: function(data) {

			}
		});
		$("#FinishCheckout").on('click', function() {


			var getHtmlTable = $("#get-html-table").html();
			$.post("../../Checkout/AddCheckout/", {
				content: getHtmlTable
			}, function(data) {
				window.location.href = "../../Home";
			})
		})
	});
</script>