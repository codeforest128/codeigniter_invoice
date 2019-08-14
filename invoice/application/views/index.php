<!DOCTYPE html>
<html>
<head>
	<title>INVOICE</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<style>
		.header{
			padding: 30px;
			text-align: center;
			font-size: 20px;
			color: grey;
		}
		.topleft{
			text-align: center;
			float: left;
			width: 20%;
			height: 200px;
		}
		.topmiddle {
			float: left;
			width: 50%;
			height: 200px;
		}
		.topright{
			float: right;
			width: 30%;
			height: 200px;
		}
		hr {
			width: 100%;
			display: block;
			margin-top: 0.5em;
			margin-bottom: 0.5em;
			border-width: 3px;
		}
		.undertopmiddle {
			float: left;
			width: 50%;
			height: 280px;
		}

	</style>
</head>
<body>
	<div class="container">
		<form method="post" action="<?php echo site_url('Invoice/invoiceinform');?>">
			<br>
			<br>
			<div class="row">
				<div class="topleft">
					<img src="picture.png" alt="Cinque Terre" style="width: 90%;height: 90%;">
				</div>
				<div class="topmiddle">
					<h3>Your Company Name</h3>
					<p>street address:</p>
					<p>city:</p>
					<p>zip code:</p>
					<p>phone number:</p>
				</div>
				<div class="topright">
					<h2 style="text-align: center;color: grey;">INVOICE</h2>
					<label>Date:</label>
					<div class="col-md-8">
						<input type="Date" name="date" id="date" class="form-control"required>
					</div>
					<label>Invoice#:</label>
					<div class="col-md-8">
						<input type="text" name="invoiceno" id="invoiceno" class="form-control"required>
					</div>
				</div>
			</div>
			<div>
				<hr style="color: grey;">
			</div>
			<div class="row">
				<div class="topleft">
					<h3>Bill To:</h3>
				</div>
				<div class="undertopmiddle">
					<input type="text" name="firstname" id="lastname" class="form-control col-md-6" placeholder="firstname" required>
					<input type="text" name="lastname" id="lastname" class="form-control col-md-6" placeholder="lastname" required>
					<input type="email" name="email" id="email" class="form-control col-md-6" placeholder="email" required>
					<input type="text" name="address" id="address" class="form-control col-md-6" placeholder="address" required>
					<input type="text" name="city" id="lastname" class="form-control col-md-6" placeholder="city" required>
					<input type="text" name="state" id="state" class="form-control col-md-6" placeholder="state" required>
					<input type="text" name="zip" id="zip" class="form-control col-md-6" placeholder="zip" required>
				</div>
				<div class="topright">
					<h3>Ship To:</h3>
					<input type="text" name="shippingaddress" id="shippingaddress" class="form-control col-md-10" placeholder="shippingaddress" required>
					<input type="text" name="shippingcity" id="shippingcity" class="form-control col-md-10" placeholder="shippingcity" required>
					<input type="email" name="shippingstate" id="shippingstate" class="form-control col-md-10" placeholder="shippingstate" required>
					<input type="text" name="shippingzip" id="shippingzip" class="form-control col-md-10" placeholder="shippingzip" required>
					<input type="text" name="shippingtelephone" id="shippingtelephone" class="form-control col-md-10" placeholder="shippingtelephone" required>
				</div>
			</div>
			<div>
				<hr style="color: grey;">
			</div>
			<div class="row">
				<br />
				<button type="button" class="btn btn-success" data-toggle="modal" data-target="#addModal"><i class="glyphicon glyphicon-plus"></i> Add</button>
				<table class="table table-striped" id="employeeListing">
					<thead>
						<tr>
							<th>P.O.#</th>
							<th>Sales Rep.Name</th>
							<th>Ship Date</th>
							<th>Ship Via</th>
							<th>Terms</th>
							<th>Due Date</th>
						</tr>
					</thead>
					<tbody id="saleRecords">
					</tbody>
				</table>
			</div>
			<div class="row">
				<br />
				<button type="button" class="btn btn-success" data-toggle="modal" data-target="#addlineModal"><i class="glyphicon glyphicon-plus"></i> Add</button>
				<table class="table table-striped" id="employeeListing">
					<thead>
						<tr>
							<th>Product Id</th>
							<th>Descrition</th>
							<th>Quantity</th>
							<th>Unit Price</th>
							<th>Line Total</th>
						</tr>
					</thead>
					<tbody id="lineRecords">
					</tbody>
				</table>
			</div>
			<div class="row">
				<div class="topleft" style="width: 70%;">
				</div>
				<div class="topmiddle" style="width: 10%;">
					<p style="font-size: 16px">SubTotal:</p>
					<p style="font-size: 16px">Totalitems:</p>
					<p style="font-size: 16px">Tax:</p>
					<p style="font-size: 16px">Shipping:</p>
					<p style="font-size: 16px">Total:</p>
					<p style="font-size: 16px">Paid:</p>
					<p style="font-size: 16px">Totaldue:</p>
				</div>
				<div class="topright" style="height: 350px; width: 20%;">
					<input type="number" name="subtotal" id="subtotal" class="form-control col-md-10" placeholder="SubTotal" required>
					<input type="number" name="totalitems" id="totalitems" class="form-control col-md-10" placeholder="Totalitems" required>
					<input type="number" name="tax" id="tax" class="form-control col-md-10" onchange="change()" placeholder="Tax" required>
					<input type="number" name="shipping" id="shipping" class="form-control col-md-10" onchange="change()" placeholder="Shipping&Handling:" required>
					<input type="number" name="total" id="total" class="form-control col-md-10" placeholder="Total" required>
					<input type="number" name="paid" id="paid" class="form-control col-md-10" onchange="change1()" placeholder="Paid" required>
					<input type="number" name="totaldue" id="totaldue" class="form-control col-md-10" placeholder="Total due:" required>
				</div>
			</div>
			<div style="text-align: center;">
				<button class="btn btn-success" data-toggle="modal" data-target="#send"><i class="glyphicon glyphicon-plus"></i> Send</button>
			</div>
		</form>
	</div>
	<form id="saveForm" method="post">
		<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Add</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="close">
							<span aria-hidden="true">x</span>
						</button>
						
					</div>
					<div class="modal-body">
						<div class="form-group row">
							<label class="col-md-2 col-form-label">P.O.#</label>
							<div class="col-md-10">
								<input type="number" name="po" id="po" class="form-control" placeholder="P.O.#" required>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-md-2 col-form-label">Sales Rep.Name</label>
							<div class="col-md-10">
								<input type="text" name="salename" id="salename" class="form-control" placeholder="Sales Rep.Name" required>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-md-2 col-form-label">Ship Date</label>
							<div class="col-md-10">
								<input type="Date" name="shipdate" id="shipdate" class="form-control" placeholder="Ship Date" required>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-md-2 col-form-label">Ship Via</label>
							<div class="col-md-10">
								<input type="text" name="shipvia" id="shipvia" class="form-control" placeholder="Ship Via" required>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-md-2 col-form-label">Terms</label>
							<div class="col-md-10">
								<input type="text" name="terms" id="terms" class="form-control" placeholder="Terms" required>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-md-2 col-form-label">Due Date</label>
							<div class="col-md-10">
								<input type="Date" name="duedate" id="duedate" class="form-control" placeholder="Due Date" required>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Submit</button>
					</div>
				</div>
			</div>
		</div>
	</form>
	<form id="savelineForm" method="post">
		<div class="modal fade" id="addlineModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Add</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="close">
							<span aria-hidden="true">x</span>
						</button>
						
					</div>
					<div class="modal-body">
						<div class="form-group row">
							<label class="col-md-2 col-form-label">Product Id</label>
							<div class="col-md-10">
								<input type="number" name="productid" id="productid" class="form-control" placeholder="Product Id" required>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-md-2 col-form-label">Descrition</label>
							<div class="col-md-10">
								<input type="text" name="description" id="description" class="form-control" placeholder="Descrition" required>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-md-2 col-form-label">Quantity</label>
							<div class="col-md-10">
								<input type="number" name="quantity" id="quantity" class="form-control" placeholder="Quantity" required>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-md-2 col-form-label">Unit Price</label>
							<div class="col-md-10">
								<input type="text" name="unitprice" id="unitprice" class="form-control" placeholder="Unit Price" required>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Submit</button>
					</div>
				</div>
			</div>
		</div>
	</form>
</body>
<script>
	function change(){
		var total = 0;
		var subtotal = $('#subtotal').val();
		subtotal = parseInt(subtotal, 10);
		var tax = $('#tax').val();
		tax = parseInt(tax, 10);
		var shipping = $('#shipping').val();
		shipping = parseInt(shipping, 10);
		total = subtotal + tax +shipping;
		$('#total').val(total);
	}
	function change1(){
		var totaldue = 0;
		var total = $('#total').val();
		total = parseInt(total, 10);
		var paid = $('#paid').val();
		paid = parseInt(paid, 10);
		totaldue = total - paid;
		$('#totaldue').val(totaldue);
	}
	$(document).ready(function(){
	listcustom();
	function listcustom(){
		var invoiceno = $('#invoiceno').val();
		var subtotal = 0;
		var totalitems = 0;
		console.log(invoiceno);
		$.ajax({
			type:"POST",
			url :"<?php echo site_url('Invoice/lineshow');?>",
			async:false,
			dataType:'json',
			data : {invoiceno: invoiceno},
			success: function(data){
				var html = '';
				var i;
				for(i=0; i< data.length; i++){
					html += '<tr id="'+data[i].id+'">'+
								'<td>'+data[i].productid+'</td>'+
								'<td>' +data[i].description+'</td>'+
								'<td>'+data[i].quantity+'</td>'+
								'<td>'+data[i].unitprice+'</td>'+
								'<td>'+(data[i].quantity*data[i].unitprice)+'</td>'
								// +
								// '<td>'+data[i].dob+'</td>'+
								// '<td>'+data[i].mobile+'</td>'+
								// '<td>'+data[i].telephone+'</td>'+
								// '<td style="text-align:right">'+
								// 		'<a href="javascript:void(0);" class="btn bn-info btn-sm editRecord" data-id="'+data[i].id+'" data-fullname="'+data[i].fullname+'" data-address="'+data[i].address+'" data-idnumber="'+data[i].idnumber+'" data-dob="'+data[i].dob+'" data-mobile="'+data[i].mobile+'" data-telephone="'+data[i].telephone+'" >Edit</a>'+' '+'<a href="javascript:void(0);" class="btn btn-danger btn-sm deleteRecord" data-id="'+data[i].id+'">Delete</a>'+'</td>'+'</tr>';
									;
						subtotal = subtotal + data[i].quantity*data[i].unitprice;
						var quantity = parseInt(data[i].quantity, 10);
						totalitems = totalitems + quantity;
					}
					$('#lineRecords').html(html);
					$('#subtotal').val(subtotal);
					$('#totalitems').val(totalitems);
				}
		});
	}
	$('#saveForm').submit('click',function(){
		var invoiceno = $('#invoiceno').val();
		var po = $('#po').val();
		var salename = $('#salename').val();
		var shipdate = $('#shipdate').val();
		var shipvia = $('#shipvia').val();
		var terms = $('#terms').val();
		var duedate = $('#duedate').val();
		if(invoiceno){
		$.ajax({
			type : "POST",
			url  : "<?php echo site_url('Invoice/savesales');?>",
			dataType : "JSON",
			data : {invoiceno: invoiceno, po: po, salename: salename, shipdate: shipdate, shipvia: shipvia, terms:terms, duedate:duedate},
			success: function(data){
				console.log(data);
				if(data == 1)
				{
					alert("entered already");
					$('#addModal').modal('hide');
				}
				else{
					var html = '<tr id="'+1+'">'+
									'<td id="tablepo">'+data.po+'</td>'+
									'<td>' +data.salename+'</td>'+
									'<td>'+data.shipdate+'</td>'+
									'<td>'+data.shipvia+'</td>'+
									'<td>'+data.terms+'</td>'+
									'<td>'+data.duedate+'</td>'
									// +
									// '<td>'+data[i].dob+'</td>'+
									// '<td>'+data[i].mobile+'</td>'+
									// '<td>'+data[i].telephone+'</td>'+
									// '<td style="text-align:right">'+
									// 		'<a href="javascript:void(0);" class="btn bn-info btn-sm editRecord" data-id="'+data[i].id+'" data-fullname="'+data[i].fullname+'" data-address="'+data[i].address+'" data-idnumber="'+data[i].idnumber+'" data-dob="'+data[i].dob+'" data-mobile="'+data[i].mobile+'" data-telephone="'+data[i].telephone+'" >Edit</a>'+' '+'<a href="javascript:void(0);" class="btn btn-danger btn-sm deleteRecord" data-id="'+data[i].id+'">Delete</a>'+'</td>'+'</tr>';
										;
					$('#saleRecords').html(html);
					$('#addModal').modal('hide');
				}
			}
		});
		return false;
		}
		else{
			alert("first,enter the Invoice# correctly");
		}

	});
	$('#savelineForm').submit('click',function(){
		var productid = $('#productid').val();
		var description = $('#description').val();
		var quantity = $('#quantity').val();
		var unitprice = $('#unitprice').val();
		var invoiceno = $('#invoiceno').val();
		if(invoiceno){
		$.ajax({
			type : "POST",
			url  : "<?php echo site_url('Invoice/savelines');?>",
			dataType : "JSON",
			data : {productid: productid, description: description, quantity: quantity, unitprice: unitprice, invoiceno: invoiceno},
			success: function(data){
				$('#addlineModal').modal('hide');
				listcustom();
			}
		});
		return false;
		}
		else{
			alert("first,enter the Invoice# correctly");
		}
	});
});
</script>

</script>
</html>