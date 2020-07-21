<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
</head>
<body>
<div class="container">
  <form action="{{ Route('invoice.order') }}" method="POST">
   @csrf
   <section>
   
      <div class="panel panel footer">
          
          <div class="row">
             
             <div class="col-md-6">
               
                <div class="form-group">
              
                   <input type="text" name="patients_name" class="form-control" placeholder="Enter patient's Name">
              
                </div>
             
             </div>

            <div class="col-md-6">
            
                <div class="form-group">
                
                    <input type="text" name="patients_age" class="form-control" placeholder="Enter patient's Age">
                
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
                      <td><input type="text" name="item_name[]" class="form-control item_name" require> </td>
                      <td><input type="text" name="description[]" class="form-control description" require> </td>
                      <td><input type="text" name="single_amount[]" class="form-control single_amount" require> </td>
                      <td><input type="text" name="single_paid[]" class="form-control single_paid" require> </td>
                      <td><input type="text" name="single_due[]" class="form-control single_due" require> </td>
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
           '<td><input type="text" name="item_name[]" class="form-control item_name" require> </td>'+
           '<td><input type="text" name="description[]" class="form-control description" require> </td>'+
           '<td><input type="text" name="single_amount[]" class="form-control single_amount" require> </td>'+
           '<td><input type="text" name="single_paid[]" class="form-control single_paid" require> </td>'+
           '<td><input type="text" name="single_due[]" class="form-control single_due" require> </td>'+
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
        }

   });


</script>



</body>
</html>