@extends('layouts.master')

@section('pagetitle')
   Invoice List
@endsection


@section('pagecontent')

@include('inc.message')

<div class="card"> 

    <div class="card-header">
       <a href="{{ Route('admin.create.invoice') }}">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addDoctorModal">
             Create New Invoice
         </button>
      </a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table class="table table-bordered">
            <thead>                  
            <tr>
                <th style="width: 10px">SL No.</th>
                <th>Patients Name</th>
                <th>Patients Age</th>
                <th>Invoice ID</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($PatientList as $key=>$row )
            <tr>
                <td>{{ ++$key }} </td>
                <td>{{ $row -> patients_name }}</td>
                <td>{{ $row -> patients_age }}</td>
                <td>{{ $row -> id }}</td>

              
                <td> 
                <a class="btn btn-info btn-sm" href="items/{{ $row->id }}">
                   <i class="fa fa-eye"></i> View 
                 </a> 
                
                <a class="btn btn-danger btn-sm" href="{{ route('admin.delete.invoice', $row->id) }}" onclick="return confirm('Are you sure?')">
                    <i class="fas fa-trash"> </i> Delete
                </a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
    
    <div class="card-footer clearfix">
        <!-- <div class="float-left btn btn-success"><a class="text-white" href="">Export To excel</a></div> -->

        <div class="pagination pagination-sm m-0 float-right">
          {{ $PatientList->links() }}
        </div>

    </div>


</div>

@endsection