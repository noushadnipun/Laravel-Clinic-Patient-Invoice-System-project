@extends('layouts.master')

@section('pagetitle')
<button class="btn btn-primary font-weight" onclick="window.print();">Print Invoice</button>

<button class="btn btn-primary"><a class="text-white font-weight" href="{{ Route('admin.list.invoice') }}">Back To Invoice List</a></button>
@endsection


@section('pagecontent')  

<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card mb-5">
                <div class="card-body">
            <h3 class="text-center font-weight-bold mb-1">Bondhon Diigital Diagonstic Center</h3>
          <p class="text-center font-weight-bold mb-0">Pakutia, Ghatail, Tangail</p>
          <p class="text-center font-weight-bold"><small class="font-weight-bold">Contact No.: 01767416285 / 01721858752</small></p>
                @foreach($PatientList as $row)
                    <div class="row pb-2 p-2">
                        <div class="col-md-6">
                         <p class="mb-0"><strong>Patient Name</strong>: {{ $row-> patients_name }} </p>
                         <p><strong>Age</strong>: {{ $row-> patients_age }}</p>   
                         <p><strong>Refd by</strong>: {{ $row -> refd_doctor }}</p>            
                        </div>

                        <div class="col-md-6 text-right">
                         <p class="mb-0"><strong>Inv No.</strong>: {{ $row-> id }}</p>
                         <p><strong>Inv Date</strong>: {{ $row-> patients_inv_date }}</p>
                        </div>
                    </div>
                @endforeach
                    <div class="table-responsive">
          <table class="table table-bordered mb-0">
            <thead>
              <tr>
                <th class="text-uppercase small font-weight-bold text-center">SL No.</th>
                <th colspan="4" class="text-uppercase small font-weight-bold text-center">Item Name</th>
                <th colspan="4" class="text-uppercase small font-weight-bold text-center">Description</th>
                <th class="text-uppercase small font-weight-bold text-center">Amount</th>
                <th class="text-uppercase small font-weight-bold text-center">Paid</th>
                <th class="text-uppercase small font-weight-bold text-center">Due</th>
                
              </tr>
            </thead>
            <tbody>
              @foreach($invoiceList as $key => $row)
                <tr>
                    <td colspan="1">{{ ++$key }}</td>
                    <td colspan="4">{{$row->item_name}}</td>
                    <td colspan="4">{{$row->description}}</td>
                    <td class="text-center single_amount">{{$row->single_amount}}</td>
                    <td class="text-center single_paid">{{$row->single_paid}}</td>
                    <td class="text-center single_due">{{$row->single_due}}</td>
                </tr>
                @endforeach
                   <tr>
                    <td colspan="11" class="thick-line text-right">Total Amount</td>
                    <td class="thick-line text-center total_amount"></td>
                  </tr>

                  <tr>
                    <td colspan="11" class="thick-line text-right">Total Paid</td>
                    <td class="thick-line text-center total_paid"></td>
                  </tr>

                  <tr>
                    <td colspan="11" class="thick-line text-right">Total Due</td>
                    <td class="thick-line text-center total_due"></td>
                  </tr>
                 
              
            </tbody>
          
          </table>
          </div><!--table responsive end-->


          <!-- <p class="card font-weight-bold small mt-5 text-left">Amount In Words:</p> -->

            
        </div>

      </div>

        <div class="row mt-5">
             <p class="font-weight-bold small col-md-4 text-left d-inline"> Reciever's Signature</p>
             <p class="font-weight-bold small col-md-4 text-center d-inline"> Checked By</p>
             <p class="font-weight-bold small col-md-4 text-right d-inline"> Authorized Signature</p>
        </div>  

    </div>
  </div>
 
</div>




<style> 

.table td, .table th {
  padding: 0.5rem;
  vertical-align: top;
  border-top: 1px solid #dee2e6;
  font-size: 14px;
}


.table > tbody > tr > .no-line {
 border-top: none;
}

.table > thead > tr > .no-line {
 border-bottom: none;
}

.table > tbody > tr > .thick-line {
 border-top: 2px solid;
}


@media print {

  header, footer, aside, nav, form, iframe, .menu, .hero, .adslot {
     display: none;
  }

}

</style>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
<script>
  function total_amount(){
       var TotalAmount = 0;
       $('.single_amount').each(function(i,e){
           var amount = $(this).text()-0;
           TotalAmount+=amount;
       });
    $('.total_amount').html(`<strong>${TotalAmount}</strong>`);
   };
  
  total_amount()

  function total_paid(){
       var TotalPaid= 0;
       $('.single_paid').each(function(i,e){
           var paid = $(this).text()-0;
           TotalPaid+=paid;
       });
    $('.total_paid').html(`<strong>${TotalPaid}</strong>`);
   };
   total_paid()

   function total_due(){
       var TotalDue= 0;
       $('.single_due').each(function(i,e){
           var due = $(this).text()-0;
           TotalDue+=due;
       });
    $('.total_due').html(`<strong>${TotalDue}</strong>`);
   };
   total_due()
</script>



@endsection
