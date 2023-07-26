@extends('admin.layout')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Trains</h1>
          </div><!-- /.col -->

        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <!-- content here -->

        <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">All Trains</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Train Name</th>
                    <th>From</th>
                    <th>To</th>
                    <th>From Time</th>
                    <th>To Time</th>
                    <th>Date</th>
{{--                    <th>is Active</th>--}}
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($trains as $train)
                  <tr>
{{--                      name, image, from, to, date, from_time, to_time, ticket_price, is_active, seats--}}
                    <td>{{$train->name}}</td>
                    <td>{{$train->from}}</td>
                    <td>{{$train->to}}</td>
                    <td>{{$train->from_time}}</td>
                    <td>{{$train->to_time}}</td>
                    <td>{{$train->date}}</td>
{{--                    <td>{{$train->is_active == 1 ? 'Deactivate':'' }}</td>--}}
                    <td>@if($train->is_active == 1) <a href="{{ route('admin/trains/deactive',$train->id) }}" class="btn btn-danger">Deactivate</a> @endif</td>
                  </tr>
                  @endforeach
{{--                  <tr>--}}
{{--                    <td>Ruhunu Kumari</td>--}}
{{--                    <td>Galle</td>--}}
{{--                    <td>Matara</td>--}}
{{--                    <td>11 AM</td>--}}
{{--                    <td>1 PM</td>--}}
{{--                    <td>2023.7.1</td>--}}
{{--                    <td>Yes</td>--}}
{{--                    <td><button type="button" class="btn btn-danger">Deactivate</button></td>--}}
{{--                  </tr>--}}


                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- /.card -->
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

@endsection
