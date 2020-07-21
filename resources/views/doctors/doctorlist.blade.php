@extends('layouts.master')


@section('pagetitle')

  List of Doctor

@endsection

@section('pagecontent')

@include('inc.message')

<div class="card"> 

    <div class="card-header">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addDoctorModal">
        Add Doctor
    </button>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
    <table class="table table-bordered">
        <thead>                  
        <tr>
            <th style="width: 10px">ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Department</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($DoctorList as $row)
        <tr>
            <td> {{ $row->id }}  </td>
            <td> {{ $row->name }}  </td>
            <td> {{ $row->email }} </td>
            <td> {{ $row->phone }} </td>
            <td> {{ $row->address }}   </td>
            <td> {{ $row->department }}  </td>
            <td> 

            <a class="btn btn-info btn-sm" href="{{ route('admin.edit.doctor', $row->id) }}">
            <i class="fas fa-pencil-alt"></i> Edit
            </a>

            <a class="btn btn-danger btn-sm" href="{{ route('admin.delete.doctor', $row->id) }}" onclick="return confirm('Are you sure?')">
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
       {{ $DoctorList->links() }}
    </div>


    </div>


</div>


<!-- Modal -->
@include('doctors.adddoctor')


@endsection