@extends('layouts.master')

@section('pagecontent')
    <div class="card-body">

        <form method="POST" action="{{ route('admin.update.doctor') }}">
            @csrf
            <input type="hidden" class="form-control" id="name" name="id" value="{{ $editDoctor->id }}" >
            <div class="form-group">
                <label for="showroomcode">Doctor's Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Doctor's Name" value="{{ $editDoctor->name }}" >
            </div>

            <div class="form-group">
                <label for="showroomcode">Email</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="Enter Doctor's Email" value="{{ $editDoctor->email }}">
            </div>

            <div class="form-group">
                <label for="showroomcode">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Doctor's Phone Number" value="{{ $editDoctor->phone }}">
            </div>

            <div class="form-group">
                <label for="showroomcode">Address</label>
                <input type="text" class="form-control" id="address" name="address" placeholder="Enter Doctor's Address" value="{{ $editDoctor->address }}">
            </div>

            <div class="form-group">
                <label for="showroomcode">Department</label>
                <input type="text" class="form-control" id="department" name="department" placeholder="Enter Doctor's Department" value="{{ $editDoctor['department'] }}">
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>   
    </div>   

@endsection