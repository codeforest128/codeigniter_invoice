<!DOCTYPE html>
<html>
    <head> 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Total</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    </head> 
<body>

    <div class="container">
        <h1 style="font-size:30pt; color: red;text-align: center;">Custom</h1>
        <br />
        <a href="<?php echo base_url().'invoice'?>" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Create New</a>
        <br />
        <table class="table" id="custom">
            <thead>
                <tr>
                    <th>Order Number</th>
                    <th>InvoiceNo</th>
                    <th>Customer</th>
                    <th>Creation Date</th>
                    <th>Total items</th>
                    <th>Total $</th>
                    <th style="text-align: right;">Actions</th>
                </tr>
            </thead>
            <tbody id="listRecords">
            </tbody>
        </table>
    </div>
<form id="editUserForm" method="post">
    <div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="editModalLabel">Edit</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
                <div class="form-group row">
                    <label class="col-md-2 col-form-label">InvoiceNo</label>
                    <div class="col-md-10">
                      <input type="text" name="invoiceno" id="invoiceno" class="form-control" placeholder="InvoiceNo" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2 col-form-label">Customer</label>
                    <div class="col-md-10">
                      <input type="text" name="customer" id="customer" placeholder="Customer" class="form-control" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2 col-form-label">Creation Date</label>
                    <div class="col-md-10">
                      <input type="text" name="createdate" id="createdate" class="form-control" placeholder="Creation Date" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2 col-form-label">Total items</label>
                    <div class="col-md-10">
                      <input type="text" name="totalitems" id="totalitems" class="form-control" placeholder="Total items" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2 col-form-label">Total $</label>
                    <div class="col-md-10">
                      <input type="text" name="totalprice" id="totalprice" class="form-control" placeholder="Total $" required>
                    </div>
                </div>
          </div>
          <div class="modal-footer">
             <input type="hidden" name="id" id="id" class="form-control">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Update</button>
          </div>
        </div>
      </div>
    </div>
</form>
<form id="deleteUserForm" method="post">
    <div class="modal fade" id="deleteUserModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="deleteModalLabel">Delete User</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
               <strong>Are you sure to delete this record?</strong>
          </div>
          <div class="modal-footer">
            <input type="hidden" name="deleteinvoiceno" id="deleteinvoiceno" class="form-control">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
            <button type="submit" class="btn btn-primary">Yes</button>
          </div>
        </div>
      </div>
    </div>
</form>
<script type="text/javascript">

$(document).ready(function(){
    listcustom();
    function listcustom(){
        $.ajax({
            url :"<?php echo base_url().'custom/customshow'?>",
            async:false,
            dataType:'json',
            success: function(data){
                var html = '';
                var i;
                for(i=0; i<data.length; i++){
                    html += '<tr id="'+data[i].id+'">'+
                                '<td>'+(i+1)+'</td>'+
                                '<td>'+data[i].invoiceno+'</td>'+
                                '<td>'+data[i].customer+'</td>'+
                                '<td>' +data[i].createdate+'</td>'+
                                '<td>'+data[i].totalitems+'</td>'+
                                '<td>'+data[i].totalprice+'</td>'+
                                '<td style="text-align:right">'+
                                        '<a href="javascript:void(0);" class="btn btn-info btn-sm editRecord" data-id="'+data[i].id+'" data-invoiceno="'+data[i].invoiceno+'" data-customer="'+data[i].customer+'" data-createdate="'+data[i].createdate+'" data-totalitems="'+data[i].totalitems+'" data-totalprice="'+data[i].totalprice+'">Edit</a>'+' '+'<a href="javascript:void(0);" class="btn btn-danger btn-sm deleteRecord" data-invoiceno="'+data[i].invoiceno+'">Delete</a>'+'</td>'+'</tr>';
                                    }
                                    $('#listRecords').html(html);
                }
        });
    }
    $(document).on('click','.adduser',function(){
        $('#addUserModal').modal('show');
    });
    $('#listRecords').on('click','.editRecord',function(){

         var id = $(this).data('id');
         var invoiceno = $(this).data('invoiceno');
         var customer = $(this).data('customer');
         var createdate = $(this).data('createdate');
         var totalitems = $(this).data('totalitems');
         var totalprice = $(this).data('totalprice');
         $('#editUserModal').modal('show');    
         $('[name="id"]').val(id);
         $('[name="invoiceno"]').val(invoiceno);
         $('[name="customer"]').val(customer);
         $('[name="createdate"]').val(createdate);
         $('[name="totalitems"]').val(totalitems);
         $('[name="totalprice"]').val(totalprice);
    });
    $(document).on('click','.deleteRecord',function(){
        var invoiceno = $(this).data('invoiceno');
        $('#deleteUserModal').modal('show');
        $('[name="deleteinvoiceno"]').val(invoiceno);
    });
    $('#editUserForm').on('submit', function(){
        var id = $('#id').val();
        console.log(id);
        var invoiceno = $('#invoiceno').val();
        var customer = $('#customer').val();
        var createdate = $('#createdate').val();
        var totalitems = $('#totalitems').val();
        var totalprice = $('#totalprice').val();
        $.ajax({
            type : "POST",
            url  : "<?php echo base_url().'custom/updatecustom'?>",
            dataType : "JSON",
            data : {id:id, invoiceno:invoiceno, customer:customer, createdate:createdate, totalitems:totalitems, totalprice:totalprice},
            success: function(data){
                $("#id").val("");
                $("#invoiceno").val("");
                $("#customer").val("");
                $("#createdate").val("");
                $("#totalitems").val("");
                $("#totalprice").val("");
                $('#editUserModal').modal('hide');
                listcustom();
            }
        });
        return false;
    });

    $('#deleteUserForm').on('submit',function(){
        var invoiceno = $('#deleteinvoiceno').val();
        $.ajax({
            type : "POST",
            url  : "<?php echo base_url().'custom/deletecustom'?>",
            dataType : "JSON",
            data : {invoiceno:invoiceno},
            success: function(data){
                $("#"+invoiceno).remove();
                $('#deleteinvoiceno').val("");
                $('#deleteUserModal').modal('hide');
                listcustom();
            }
        });
        return false;
    });
});

</script>

</body>

</html>
