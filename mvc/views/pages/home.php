<?php include("./mvc/views/partials/theme.php"); ?>
<div class="container-fluid p-0">
	<div class="row m-0">
		<div class="p-2 bg2" style="height: 100vh;width: 320px;">
			<p class="ml-1 font-weight-bold cl" style="font-size: 130%">Dashboard</p>
			<div id="cart-box" style="display: none;">
				<div id="cart-item" style="height: calc(100vh - 250px);width: 100%;">

				</div>
				<?php include("./mvc/views/partials/home-cart-checkout.php"); ?>
			</div>
			<div id="menu-box" class="row m-0">
				<?php include("./mvc/views/partials/home-menu-account.php"); ?>
				<?php include("./mvc/views/partials/home-menu-item.php"); ?>
			</div>
		</div>
		<div class="p-0 bg1" style="height: 100vh;width: calc(100% - 320px)">
			<div class="p-3">
				<p id="logo-text" class="cl font-weight-bold float-right" style="font-size: 130%;">POS</p>

				<div id="back-button" class="btn bg-white float-right" style="display: none;">Back</div>

				<div id="box-search-product" class="bg2 float-left" style="width: 350px;height: 50px;display: flex;">
					<input id="search-input" class="p-2" type="" name="" style="width: calc(100% - 50px);height: 100%;background: none;border: 0;outline: none;color: white">
					<div class="text-center" style="width: 50px;height: 50px;">
						<i class="fa fa-search cl" aria-hidden="true" style="font-size: 130%;line-height: 48px;opacity: 0.8"></i>
					</div>
				</div>

				<div id="food-filter" class="bg2 ml-2 float-left text-center" style="width: 100px;height: 50px;display: none;">
					<p class="cl" style="line-height: 49px">Food</p>
				</div>
				<div id="drink-filter" class="bg2 ml-2 float-left text-center" style="width: 100px;height: 50px;display: none;">
					<p class="cl" style="line-height: 49px">Drink</p>
				</div>
				<div style="clear: both;"></div>
			</div>
			<div id="product-box" class="px-2" style="display: none;">

			</div>
			<div id="table-box" class="px-2">

			</div>
		</div>
	</div>
</div>