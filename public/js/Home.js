$(document).ready(function(){
	getProduct(0);
	var type=0;
	$("#food-filter").on('click',function(){
		type=1;
		getProduct(type);
	})
	$("#drink-filter").on('click',function(){
		type=2;
		getProduct(type);
	})
	$("#search-input").keyup(function(){
		var searchInput = $("#search-input").val();
		if(searchInput == ''){
			getProduct(0);
		}else{
			getProduct(searchInput);
		}
	})
});
getTable();
function getTable(){

	$("#table-box").html('');

	$.ajax({
		url: './Table/GetTable',
		type: 'get',
		dataType : 'json',
		success: function(data){
			var table_color;
			var type_table;
			$.each (data, function (key, item){
				if(item.status == 1){
					table_color='dot-success';
				}else {
					table_color='dot-danger';
				}
				if(item.type == 1){
					type_table ='100';
				}else if(item.type == 2){
					type_table ='200';
				}
				
				var data = `<div class=" p-1 float-left" onclick="GetTable(`+item.id+`)">
				<div class="table-box bg2 text-center" style="width: `+type_table+`px;height: 100px;">
				<p class="cl mb-0" style="font-size: 360%;">`+item.number+`</p>
				<i class="fa fa-circle mr-2 `+table_color+` float-right" aria-hidden="true" style="font-size: 75%;margin-top: -4px"></i>
				</div>
				</div>`
				document.getElementById("table-box").innerHTML +=data;
			});		
		}
	});
}



function getProduct(type){
	document.getElementById("product-box").innerHTML ='';
	$.ajax({
		url: 'http://localhost/pos-mvc/Product/GetProduct/'+type,
		type: 'get',
		dataType : 'json',
		success: function(data){
			$.each (data, function (key, item){
				var data = `<div class="p-1 float-left" onclick='addToCart(`+item.id+`)'>
				<div class="bg2 text-center p-2" style="width: 240px;height: 100px;">
				<div class="float-left" style="width: 90px;height: 100%;background: green">
				<img src="./public/images/product/`+item.image+`" width="100%" height="100%">
				</div>
				<p class="cl mb-0 mt-2" style="height: 45px;overflow-y: hidden;">`+item.name+`</p>
				<p class="cl">`+item.price+`$</p>
				</div>
				</div>`
				document.getElementById("product-box").innerHTML +=data;
			});		
		}
	});
}

function addToCart(id){
	var table =JSON.parse(localStorage.getItem('idTable'));
	$.post("./Order/AddOrder/",{idproduct:id,idtable:table},function(data){	
		GetOrder();
	})          
}


function EnterCode(){
	$("#voucher-text").hide();
	$("#input-code").show();
	$("#add-button").hide();
	$("#submit-button").show();
}
$(document).ready(function(){
	$("#submit-button").on('click',function(){
		var inputCode = $("#input-code").val();
		$.ajax({
			url: './Voucher/GetVoucher/'+inputCode,
			type: 'get',
			dataType : 'json',
			success: function(data){	
				$("#voucher-text").show();	
				$("#voucher-text").text(inputCode);
				$("#submit-button").hide();
				$("#add-button").show();
				$("#input-code").hide();
				$("#text-number").show();
				$("#add-button").hide();
				$("#voucher-box").hide();
				$("#voucher-ok").show();
				$("#text-number").text(data[0].number);
				GetOrder();
			}
		});
	})
});




function GetTable(id){
	localStorage.setItem("idTable", JSON.stringify(id));
	GetOrder();
	CheckTable();
	$('#logo-text').hide();
	$('#back-button').show();

	$('#table-box').hide();
	$('#product-box').show();

	$('#menu-box').hide();
	$('#cart-box').show();
	$('#food-filter').show();
	$('#drink-filter').show();
	$("#link-checkout").attr("href", "./Checkout/Index/"+id)

}

function CheckTable(){
	var id =JSON.parse(localStorage.getItem('idTable'));
	$.ajax({
		url: './Table/CheckTable/'+id,
		type: 'get',
		dataType : 'json',
		success: function(data){
			console.log(data);
		}
	});
}
function GetOrder(){
	var total =0;
	var table =JSON.parse(localStorage.getItem('idTable'));
	document.getElementById("cart-item").innerHTML ='';
	$.ajax({
		url: './Order/GetOrder/'+table,
		type: 'get',
		dataType : 'json',
		success: function(data){

			$.each (data, function (key, item){

				total +=item.quanlity*item.price;
				var data = `<div class="p-2 bg1 mb-2" style="height: 67px;width: 100%">
				<div class="mr-2 float-left" style="width: 50px;height: 50px;background: green">
				<img src="./public/images/product/`+item.image+`" width="100%" height="100%">
				</div>
				<div class="float-left">
				<p class="cl mb-1" style="width: 110px;overflow-y: hidden;height: 22px;">`+item.name+`</p>
				<div style="display: flex;">
				<div onclick="UpQuanlity(`+item.idproduct+`)" class="bg3 cl text-center" style="width: 20px;height: 20px;font-size: 80%">
				+
				</div>
				<div id="product-quanlity`+item.idproduct+`" class="text-center cl" style="width: 20px;height: 20px;font-size: 80%">`+item.quanlity+`</div>
				<div class="bg3 cl text-center" style="width: 20px;height: 20px;font-size: 80%" onclick="DowQuanlity(`+item.idproduct+`)">
				-
				</div>
				</div>
				</div>
				<div class="float-right" style="height: 50px;width: 120px">
				<div class="float-right bg3 text-center" style="width: 20px;height: 100%" onclick="DeleteOrder(`+item.idproduct+`)">
				<p class="cl" style="line-height: 50px">x</p>
				</div>
				<p class="float-right font-weight-bold cl mr-2" style="font-size: 130%;line-height: 50px">`+item.quanlity*item.price+`$</p>
				</div>
				<div style="clear: both;"></div>
				</div>`
				document.getElementById("cart-item").innerHTML +=data;
			});	
			var discount = $('#discount-text').text();
			var fee1 = $('#VAT-text').text();
			var fee2 = $('#SER-text').text();
			var voucher = $('#text-number').text();
			total = total*(100 - discount)/100 + total*fee1/100 + total*fee2/100 - voucher;
			localStorage.setItem("total", JSON.stringify(parseInt(total)));
			localStorage.setItem("fee1", JSON.stringify(parseInt(fee1)));
			localStorage.setItem("fee2", JSON.stringify(parseInt(fee2)));
			localStorage.setItem("sale", JSON.stringify(parseInt(discount)));
			localStorage.setItem("voucher", JSON.stringify(parseInt(voucher)));
			$('#total-text').text(parseInt(total)+"$");
		}
	});
}

function UpQuanlity(idproduct){
	var idtable =JSON.parse(localStorage.getItem('idTable'));
	$.post("./Order/AddOrder/",{idproduct:idproduct,idtable:idtable},function(data){	
		GetOrder();
	})
}
function DowQuanlity(idproduct){
	var checkQuanlity = $('#product-quanlity'+idproduct).text();
	if(checkQuanlity>1){
		var idtable =JSON.parse(localStorage.getItem('idTable'));
		$.post("./Order/DowQuanlity/",{idproduct:idproduct,idtable:idtable},function(data){	
			GetOrder();
		})
	}
	
}
function DeleteOrder(idproduct){
	var idtable =JSON.parse(localStorage.getItem('idTable'));
	$.post("./Order/DeleteOrder/",{idproduct:idproduct,idtable:idtable},function(data){	
		GetOrder();
	})
}
$(document).ready(function() {

	$('#back-button').on('click',function(){
		getProduct(0);
		$('#logo-text').show();
		$('#back-button').hide();

		$('#table-box').show();
		$('#product-box').hide();

		$('#menu-box').show();
		$('#cart-box').hide();

		$('#food-filter').hide();
		$('#drink-filter').hide();

		$("#text-number").text('0');
		$("#text-number").hide();
		$("#voucher-text").text('Voucher');
		$("#voucher-text").show();
		$("#input-code").hide();
		$("#add-button").show();
		$("#submit-button").hide();
		$("#icon-money").hide();
		$("#voucher-box").show();
		$("#input-code").val('');
		GetOrder();
		CheckTable();
		getTable();

	})
});