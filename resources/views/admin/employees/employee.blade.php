@extends('layouts.receptionist')
@section('menu')
<div class="col-lg-10">
    <div class="nav-menu">
        <nav class="mainmenu">
            <ul>
                <li><a href="/home">Home</a></li>
                <li><a href="receptionist">Receptionist</a></li>
                <li class="active"><a href="#">Employee</a></li>
                <li><a href="rooms">Rooms</a></li>
                <li><a href="foodMenu">Food Menu</a></li>
            </ul>
        </nav>
        <div class="nav-right search-switch">
            <i class="icon_search"></i>
        </div>
    </div>
</div>
@endsection

@section('contentes')
    <!-- Contact Section Begin -->
    <section class="contact-section spad">
        <div class="container">   
            <div class="row">
                <div class="col-lg-4">
                    <div class="contact-text">
                        <h2>Add Employee </h2>
                        <p>It's required to insert information accuratly </p>
                    </div>
                </div>
                <div class="col-lg-7 offset-lg-1">
                    {!! Form::open(['action' => 'EmployeeController@store', 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
                        <br>
                        <div class="row">
                            <div class="form-group col-lg-4">
                                {{ Form::label('name', "Name")}}
                                {{ Form::text('name', '', ['class' => 'form-control', 'placeholder' =>'Employee Name'])}}
                            </div>
                            <div class="form-group col-lg-1"></div>
                            <div class="form-group col-lg-4">
                                {{ Form::label('lastName', "Last Name")}}
                                {{ Form::text('lastName', '', ['class' => 'form-control' , 'placeholder' =>'Employee Last Name'])}}
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="form-group col-lg-4">
                                {{ Form::label('PhoneNo', "Phone number")}}
                                {{ Form::number('phoneNo', '', ['class' => 'form-control', 'placeholder' =>'Phone number'])}}
                            </div>
                            <div class="form-group col-lg-1"></div>
                            <div class="form-group col-lg-4">
                                {{ Form::label('salary', "Salary")}}
                                {{ Form::number('salary', '', ['class' => 'form-control' , 'placeholder' =>'Employee Salary'])}}
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="form-group col-lg-4">
                                {{ Form::label('employee_type', "Employee job")}}
                                <select class="custom-select" id="employee_type"  class="form-control @error('employee_type') is-invalid @enderror" name="employee_type" value="{{ old('employee_type') }}" required autocomplete="employee_type">
                                    <option selected disabled>Select user type</option>
                                    <option value="Admin">Admin</option>
                                    <option value="Receptionist">Receptionist</option>
                                </select>
                            </div>
                            <div class="form-group col-lg-1"></div>
                            <div class="form-group col-lg-4">
                                {{ Form::label('tazkira', "Tazkira photo")}}
                                {{Form::file('tazkira')}}
                            </div>
                        </div>
                        <br>
                        {{Form::submit('Submit', ['class' =>'btn btn-primary'])}}
                    {!! Form::close() !!}  
                </div>
            </div>
        </div>
    </section>
    <section class="contact-section spad">
        <div class="container">   
            @if(count($employees) > 0)
            @foreach ($employees as $employee)
                <div class="well align-items-center p-3 my-3 shadow-lg">
                    <div class="row">
                        <div class="col position-relative">
                            {{-- @if ($employee->published)
                            <span class="position-absolute badge badge-success" style="top: 0; right: 10px">PUBLISHED</span>
                            @else
                            <span class="position-absolute badge badge-warning" style="top: 0; right: 10px">NOT PUBLISHED</span>
                            @endif --}}
                             <h3><a href="/employee/{{$employee->id}}">{{ $employee->name }}</a></h3>
                             <img class="position-absolute" style="top: 0; right: 10px" src="/storage/tazkiras/{{$employee->tazkira}}" alt="" width="100px">
                             <br>   
                            <small>Added on {{ $employee->created_at }} </small>
                        </div>
                    </div>
                </div>
            @endforeach
            {{ $employees->links() }}
        @else
            <p>There is no Receptionist</p>
        @endif
        </div>
    </section>
    
    <!-- Contact Section End -->
@endsection