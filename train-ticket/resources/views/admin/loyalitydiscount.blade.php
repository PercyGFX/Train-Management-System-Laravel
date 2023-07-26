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
                  <tr>
                   
                    <td>100</td>
                    <td>Bronze</td>
                    <td>5%</td>      
                    <td><button type="button" class="btn btn-danger">Edit</button></td>
                  </tr>

                  <tr>
                   
                    <td>500</td>
                    <td>Silver</td>
                    <td>15%</td>      
                    <td><button type="button" class="btn btn-danger">Edit</button></td>
                  </tr>

                  <tr>
                    
                    <td>100</td>
                    <td>Gold</td>
                    <td>25%</td>      
                    <td><button type="button" class="btn btn-danger">Edit</button></td>
                  </tr>

                 
                 
         
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