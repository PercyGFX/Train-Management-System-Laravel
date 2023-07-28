@extends('admin.layout')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Users</h1>
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
                <h3 class="card-title">All Users</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>City</th>
                    
                    <th>Tickets Count</th>
                    <th>Status</th>
                  </tr>
                  </thead>
                  <tbody>

                    @if(count($users) > 0)
        <ul>
            @foreach ($users as $user)
               

                <tr>
                  <td>{{ $user->id }}</td>
                  <td>{{ $user->fname }} {{ $user->lname }}</td>
                  <td>{{ $user->email }}</td>

                  @foreach ($user->passengers as $passenger)
                  <td>{{ $passenger->phone }}</td>
                  <td>{{ $passenger->city }}</td>

                 
                  <td> {{ $passenger->tickets_count }}</td>
                  @endforeach
                 
                  <td>{{ $user->status }}</td>
           
                  
                </tr>
            @endforeach
        </ul>
    @else
        <p>No users found.</p>
    @endif
                  

                 
         
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