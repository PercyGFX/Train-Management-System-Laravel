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

        <div class="col-md-12">

           
              <!-- general form elements -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Loyality Discount Edit</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->

               

                <form id="quickForm" method="post" action="{{ route('/admin/loyalitydiscount/edit/save') }}" enctype="multipart/form-data">
                    @csrf

                    <input name="id" type="hidden" class="form-control" id="exampleInputEmail1" value="{{ $loyaltyDiscount->id }}">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Ticket Count</label>
                      <input name="ticketcount" type="text" class="form-control" id="exampleInputEmail1" value="{{ $loyaltyDiscount->ticket_count }}" placeholder="Ticket Count">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Badge</label>
                      <input name="badge" type="text" class="form-control" id="exampleInputEmail1" value="Silver" placeholder="{{ $loyaltyDiscount->badge }}" disabled>
                    </div>
  
                    <div class="form-group">
                      <label for="exampleInputEmail1">Discount %</label>
                      <input name="discount" type="text" class="form-control" value="{{ $loyaltyDiscount->dicount_precentage }}" id="exampleInputEmail1" placeholder="Presentage">
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