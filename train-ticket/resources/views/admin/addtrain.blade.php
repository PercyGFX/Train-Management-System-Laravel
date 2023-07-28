@extends('admin.layout')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Add Train</h1>
                    </div><!-- /.col -->

                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">

                <!-- content here -->


                <div class="col-md-12">

                    @if (session()->has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                    <!-- general form elements -->
                    <div class="card card-primary p-2">
                        {{-- <div class="card-header">
                            <h3 class="card-title">Add Train</h3>
                        </div> --}}
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form id="quickForm" method="post" action="{{ route('admin/addtrain/save') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-2" for="exampleInputEmail1">Train Name</label>
                                        <input name="trainname" type="text" class="col form-control"
                                            id="exampleInputEmail1">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-2" for="exampleInputEmail1">From Location</label>
                                        <input name="fromlocation" type="text" class="col form-control"
                                            id="exampleInputEmail1">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-2" for="exampleInputEmail1">To Location</label>
                                        <input name="tolocation" type="text" class="col form-control"
                                            id="exampleInputEmail1">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-2" for="exampleInputFile">Image</label>
                                        <div class="col-sm-3 input-group p-0">
                                            <div class="custom-file">
                                                <input type="file" name="picture" class="custom-file-input"
                                                    id="exampleInputFile">
                                                <label class="custom-file-label" for="exampleInputFile">Choose
                                                    file</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text">Upload</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-2" for="exampleInputEmail1">Date</label>
                                        <input name="from-date" type="date" class="col-sm-3 form-control"
                                            id="exampleInputEmail1" placeholder="date">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-2" for="exampleInputEmail1">From time:</label>
                                        <input name="from-time" type="time" class="col-sm-2 form-control"
                                            id="exampleInputEmail1" placeholder="From">

                                        <label class="col-sm-2 pl-5" for="exampleInputEmail1">To time:</label>
                                        <input name="to-time" type="time" class="col-sm-2 form-control"
                                            id="exampleInputEmail1" placeholder="to">
                                    </div>
                                </div>

                                <!-- Date and time -->
                                {{--                <div class="form-group"> --}}
                                {{--                    <label>From Date and time:</label> --}}
                                {{--                      <div class="input-group date" id="reservationdatetime" data-target-input="nearest"> --}}
                                {{--                          <input type="text" class="form-control datetimepicker-input" data-target="#reservationdatetime"/> --}}
                                {{--                          <div class="input-group-append" data-target="#reservationdatetime" data-toggle="datetimepicker"> --}}
                                {{--                              <div class="input-group-text"><i class="fa fa-calendar"></i></div> --}}
                                {{--                          </div> --}}
                                {{--                      </div> --}}
                                {{--                  </div> --}}
                                {{--                  <!-- /.form group --> --}}

                                {{--                     <!-- Date and time --> --}}
                                {{--                <div class="form-group"> --}}
                                {{--                    <label>To Date and time:</label> --}}
                                {{--                      <div class="input-group date" id=""  > --}}
                                {{--                          <input type="datetime-local" class="form-control " disable/> --}}
                                {{--                          <div class="input-group-append" data-target="#reservationdatetime2" data-toggle="datetimepicker"> --}}
                                {{--                              <div class="input-group-text"><i class="fa fa-calendar"></i></div> --}}
                                {{--                          </div> --}}
                                {{--                      </div> --}}
                                {{--                  </div> --}}
                                <!-- /.form group -->

                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-2" for="exampleInputEmail1">Ticket Price</label>
                                        <input name="price" type="number" class="col form-control"
                                            id="exampleInputEmail1">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-2" for="exampleInputEmail1">Seates</label>
                                        <input name="seates" type="number" class="col form-control"
                                            id="exampleInputEmail1">
                                    </div>
                                </div>


                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>

                    <!-- content end -->

                </div>
                <!-- -->
        </section>
        <!-- /.Left col -->

    </div>
    <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>

    <script></script>
@endsection
