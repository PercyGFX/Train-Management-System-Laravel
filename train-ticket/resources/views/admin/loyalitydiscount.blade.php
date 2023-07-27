@extends('admin.layout')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Loyality Discount</h1>
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

          @if (session('success'))
          <div class="alert alert-success" role="alert">
            {{ session('success') }}
          </div>
       
          </div>
          @endif

          
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Loyality Discount</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    
                    <th>Ticket Count</th>
                    <th>Badge</th>
                    <th>Discount %</th>
                    <th>Action</th>
                    
                  </tr>
                  </thead>
                  <tbody>

                    @foreach ($loyaltyDiscounts as $discount)
                  <tr>
                   
                    <td>{{ $discount->ticket_count }}</td>
                    <td>{{ $discount->badge }}</td>
                    <td>{{ $discount->dicount_precentage }}%</td>      
                    <td><a href="/admin/loyalitydiscount/edit/{{$discount->id}}" class="btn btn-danger">Edit</a></td>
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