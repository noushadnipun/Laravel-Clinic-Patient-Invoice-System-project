<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
<link href="http://code.jquery.com/ui/1.9.1/themes/base/jquery-ui.css" rel="stylesheet">
@extends('layouts.master')

@section('pagetitle')
   Create Invoice
@endsection


@section('pagecontent')
<div class="container">
  <form action="{{ Route('admin.store.invoice') }}" method="POST">
   @csrf
   <section>
   
      <div class="panel panel footer">
          
          <div class="row">
             
             <div class="col-md-6">
               
                <div class="form-group">
              
                   <input type="text" name="patients_name" class="form-control" placeholder="Enter patient's Name" required>
              
                </div>
             
             </div>

            <div class="col-md-6">
            
                <div class="form-group">
                
                    <input type="text" name="patients_age" class="form-control" placeholder="Enter patient's Age" required>
                
                </div>
            
            </div>

            <div class="col-md-6">            
                <div class="form-group">
                  <label>Invoice Date:</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="far fa-calendar-alt"></i>
                      </span>
                    </div>
                    <input type="text" class="form-control float-right" id="datepicker" name="patients_inv_date" required>
                  </div>
                  <!-- /.input group -->
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="refd_doctor">Refd By Doctor</label>
                    <select class="form-control" id="refd_doctor" name="refd_doctor">
                        @foreach($DoctorList as $row)
                            <option selected disabled>Select Doctor</option>
                            <option>{{ $row-> name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
                
          
          </div>
          
         
      </div>

      <div class="panel panel footer">
           
           <table class="table table-border">
               <thead>
                    <tr>
                        <th>#</th>
                        <th>Items Name</th>
                        <th>Descriptrion</th>
                        <th>Amount</th>
                        <th>Paid</th>
                        <th>Due</th>
                        <th><a href="#" class="addRow">+</a></th>
                    </tr>
                </thead>
               

                <tbody>
                    
                    <tr>
                      <td> 1</td>
                      <td><input type="text" name="item_name[]" class="form-control item_name" required> </td>
                      <td><input type="text" name="description[]" class="form-control description" required> </td>
                      <td><input type="text" name="single_amount[]" class="form-control single_amount" required> </td>
                      <td><input type="text" name="single_paid[]" class="form-control single_paid" required> </td>
                      <td><input type="text" name="single_due[]" class="form-control single_due" required> </td>
                      <td><a href="#" class="btn btn-danger removeRow">-</a></td>
                    </tr>
                
                
                </tbody>

                
                <tfoot>
                   
                   <tr>
                       <td style="border-none;"></td>
                       <td style="border-none;"></td>
                       <td style="border-none;"></td>
                       <td style="border-none;"></td>
                       <td><b>Total Amount</b></td>
                       <td><b class="total_amount"></b></td>
                       <td style="border-none;"></td>
                   </tr>

                    <tr>
                       <td style="border-none;"></td>
                       <td style="border-none;"></td>
                       <td style="border-none;"></td>
                       <td style="border-none;"></td>
                       <td><b>Total Paid</b></td>
                       <td><b class="total_paid"></b></td>
                       <td style="border-none;"></td>
                   </tr>

                    <tr>
                       <td style="border-none;"></td>
                       <td style="border-none;"></td>
                       <td style="border-none;"></td>
                       <td style="border-none;"></td>
                       <td><b>Total Due</b></td>
                       <td><b class="total_due"></b></td>
                       <td style="border-;"><input type="submit" name="" class="btn btn-success" value="Submit"></td>
                   </tr>
                
                </tfoot>
           
           
           </table>
         
      </div>


   </section>
  </form>
</div>
    


<script type="text/javascript">
   
   $('tbody').delegate('.single_amount, .single_paid', 'keyup', function(){
        
        var tr =$(this).parent().parent();
        var SingleAmount = tr.find('.single_amount').val();
        var SinglePaid = tr.find('.single_paid').val();
        var SingleDue = (SingleAmount-SinglePaid);
        tr.find('.single_due').val(SingleDue);
        total_amount();
        total_paid();
        total_due();
   });


   function total_amount(){
       var TotalAmount = 0;
       $('.single_amount').each(function(i,e){
           var amount = $(this).val()-0;
           TotalAmount+=amount;
       });
    $('.total_amount').html(TotalAmount+" tk");
   };


    function total_paid(){
       var TotalPaid= 0;
       $('.single_paid').each(function(i,e){
           var paid = $(this).val()-0;
           TotalPaid+=paid;
       });
    $('.total_paid').html(TotalPaid+" tk");
   };

   function total_due(){
       var TotalDue= 0;
       $('.single_due').each(function(i,e){
           var due = $(this).val()-0;
           TotalDue+=due;
       });
    $('.total_due').html(TotalDue+" tk");
   };
  


   $('.addRow').on('click', function(){
       addRow();
   });

   function addRow(){

    var tr='<tr>'+
           '<td> 1</td>'+
           '<td><input type="text" name="item_name[]" class="form-control item_name" required> </td>'+
           '<td><input type="text" name="description[]" class="form-control description" required> </td>'+
           '<td><input type="text" name="single_amount[]" class="form-control single_amount" required> </td>'+
           '<td><input type="text" name="single_paid[]" class="form-control single_paid" required> </td>'+
           '<td><input type="text" name="single_due[]" class="form-control single_due" required> </td>'+
           '<td><a href="#" class="btn btn-danger removeRow">-</a></td>'+  
           '</tr>';

           $('tbody').append(tr);
   };

   $('.removeRow').live('click', function(){
       
       var last =$('tbody tr').length;
       if(last == 1){
           alert("You Can not remove This")
        }
       else{
           $(this).parent().parent().remove();
           total_amount();
           total_paid();
           total_due();
        }
        

   });





</script>

<script>
  $(function () {
    //Date picker
    $('#datepicker').datepicker({
      autoclose: true,
    })
  })
</script>



@endsection

<!-- </body>
</html> -->