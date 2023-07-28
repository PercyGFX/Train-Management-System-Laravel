@extends('admin.layout')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tickets</h1>
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
                <h3 class="card-title">All Tickets</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Date</th>
                    <th>Train</th>
                    <th>User</th>
                    <th>QTY</th>
                    <th>Discount</th>
                    <th>Amount</th>
                    <th>Payment Status</th>
                  </tr>
                  </thead>
                  <tbody>

                    @foreach ($tickets as $ticket)

                    <!-- Display other ticket information here -->

                    <tr>
                      <td>{{ $ticket->id }}</td>
                      <td>{{ $ticket->created_at }}</td>
                      <td>{{ $ticket->train->name }}</td>
                      <td>{{ $ticket->passenger->user->fname }} {{ $ticket->passenger->user->lname }}</td>
                      <td>{{ $ticket->qty }}</td>
                      <td>{{ $ticket->discount }}</td>
                      <td>{{ $ticket->totle_price }}</td>
                      <td><span class="text-danger">{{ $ticket->status }}</span></td>
                    </tr>


                @endforeach






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
