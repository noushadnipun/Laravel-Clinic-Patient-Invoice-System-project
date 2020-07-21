<script src="//code.jquery.com/jquery-1.11.1.min.js"></script> 

@extends('layouts.master')

@section('pagetitle')
Create Invoice
@endsection
@section('pagecontent')
<div class="container">

  <div class="row clearfix">
    <div class="col-md-12">

        <div class="card-body row">
            <div class="form-group col-md-4">
                <label for="showroomcode">Patient's Name</label>
                <input type="text" class="form-control" id="showroomcode" name="show_room_code" placeholder="Enter Patient's Name" value="">
            </div>
            <div class="form-group col-md-4">
                <label for="showroomname">Patient's Age</label>
                <input type="text" class="form-control" id="showroomname" name="show_room_name" placeholder="Enter Patient's Age" value="">
            </div>
            <div class="form-group col-md-4">
                <label for="showroomgroup">Refd By</label>
                <select class="form-control" id="showroomgroup" name="show_room_group" placeholder="" value="Select Doctor"></select>
            </div>
        </div>

      <table class="table table-bordered table-hover" id="tab_logic">
        <thead>
          <tr>
            <th class="text-center"> SL No. </th>
            <th class="text-center"> Item name </th>
            <th class="text-center"> Description </th>
            <th class="text-center"> Amount </th>
            <th class="text-center"> Paid </th>
            <th class="text-center"> Due </th>
          </tr>
        </thead>
        <tbody>
          <tr id='addr0'>
            <td>1</td>
            <td><input class="form-control" name='product[]' onChange="option_checker(this);" /></td>
            <td><textarea class="form-control" name='item_description' /></textarea></td>
            <td><input type="number" name='single_amount' placeholder='Enter Amount' class="form-control single-item-amount totalamount" step="0" min="0"/></td>
            <td><input type="number" name='item_paid' placeholder='Enter Paid Price' class="form-control single-item-paid totalpaid" step="0.00" min="0"/></td>
            <td><input type="number" name='wtotal[]' placeholder='0.00' class="form-control totaldue" readonly/></td>
          </tr>
          <tr id='addr1'></tr>
        </tbody>
      </table>
    </div>
  </div>
  <div class="row clearfix">
    <div class="col-md-12">
      <button id="add_row" class="btn btn-default pull-left">Add Row</button>
      <button id='delete_row' class="float-right btn btn-default">Delete Row</button>
    </div>
  </div>
  <div class="row clearfix" style="margin-top:20px">
    <div class="ml-auto col-md-4">
      <table class="table table-bordered table-hover" id="tab_logic_total">
        <tbody>
          <tr>
            <th class="text-center">Sub Total</th>
            <td class="text-center"><input type="number" name='sub_total' placeholder='0.00' class="form-control" id="sub_total" readonly/></td>
          </tr>

          <tr>
            <th class="text-center">Total Paid</th>
            <td class="text-center"><input type="number" name='sub_total' placeholder='0.00' class="form-control" id="total_paid" readonly/></td>
          </tr>

          <tr>
            <th class="text-center">Total Due</th>
            <td class="text-center"><input type="number" name='sub_total' placeholder='0.00' class="form-control" id="total_due" readonly/></td>
          </tr>
          
          <tr>
            <th class="text-center">Tax</th>
            <td class="text-center"><div class="input-group mb-2 mb-sm-0">
                <input type="number" class="form-control" id="tax" placeholder="0">
                <div class="input-group-addon">%</div>
              </div></td>
          </tr>
          <tr>
            <th class="text-center">Tax Amount</th>
            <td class="text-center"><input type="number" name='tax_amount' id="tax_amount" placeholder='0.00' class="form-control" readonly/></td>
          </tr>
          <tr>
            <th class="text-center">Grand Total</th>
            <td class="text-center"><input type="number" name='total_amount' id="total_amount" placeholder='0.00' class="form-control" readonly/></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  
</div>
@endsection

<script>
 
 $(document).ready(function(){
    var i=1;
    $("#add_row").click(function(){b=i-1;
      	$('#addr'+i).html($('#addr'+b).html()).find('td:first-child').html(i+1);
      	$('#tab_logic').append('<tr id="addr'+(i+1)+'"></tr>');
      	i++; 
  	});
    $("#delete_row").click(function(){
    	if(i>1){
		$("#addr"+(i-1)).html('');
		i--;
		}
		calc();
	});
	
	$('#tab_logic tbody').on('keyup change',function(){
		calc();
	});
	$('#tax').on('keyup change',function(){
		calc_total();
	});
	

});

function calc()
{
	$('#tab_logic tbody tr').each(function(i, element) {
		var html = $(this).html();
		if(html!='')
		{
			var singleAmount = $(this).find('.single-item-amount').val();
			var singlePaid = $(this).find('.single-item-paid').val();
			$(this).find('.totaldue').val(singleAmount-singlePaid);
			
			calc_total();
		}
    });
}

function calc_total()
{
	totalAmount=0;
	$('.totalamount').each(function() {
        totalAmount += parseInt($(this).val());
    });

    totalPaid=0;
	$('.totalpaid').each(function() {
        totalPaid += parseInt($(this).val());
    });

    totalDue=0;
	$('.totaldue').each(function() {
        totalDue += parseInt($(this).val());
    });

    total=0;
	$('.total').each(function() {
        total += parseInt($(this).val());
    });

    $('#sub_total').val(totalAmount.toFixed(2));

    $('#total_paid').val(totalPaid.toFixed(2));

    $('#total_due').val(totalDue.toFixed(2));

	tax_sum=total/100*$('#tax').val();
	$('#tax_amount').val(tax_sum.toFixed(2));
	$('#total_amount').val((tax_sum+total).toFixed(2));
}

</script>