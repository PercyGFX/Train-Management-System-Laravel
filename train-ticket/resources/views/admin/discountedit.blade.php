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
                  <h3 class="card-title">Add Train</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form id="quickForm" method="post" action="{{ route('admin/loyalitydiscount/edit') }}" enctype="multipart/form-data">
                    @csrf
                  <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Train Name</label>
                      <input name="trainname" type="text" class="form-control" id="exampleInputEmail1" placeholder="Train Name">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">From Location</label>
                      <input name="fromlocation" type="text" class="form-control" id="exampleInputEmail1" placeholder="From">
                    </div>
  
                    <div class="form-group">
                      <label for="exampleInputEmail1">To Location</label>
                      <input name="tolocation" type="text" class="form-control" id="exampleInputEmail1" placeholder="To">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputFile">Image</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" name="picture" class="custom-file-input" id="exampleInputFile">
                          <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                        <div class="input-group-append">
                          <span class="input-group-text">Upload</span>
                        </div>
                      </div>
                    </div>
  
  
                      <div class="form-group">
                          <label for="exampleInputEmail1">Date</label>
                          <input name="from-date" type="date" class="form-control" id="exampleInputEmail1" placeholder="From">
                      </div>
                      <div class="form-group">
                          <label for="exampleInputEmail1">From time:</label>
                          <input name="from-time" type="time" class="form-control" id="exampleInputEmail1" placeholder="From">
                      </div>
                      <div class="form-group">
                          <label for="exampleInputEmail1">To time:</label>
                          <input name="to-time" type="time" class="form-control" id="exampleInputEmail1" placeholder="From">
                      </div>

  
                    <div class="form-group">
                      <label for="exampleInputEmail1">Ticket Price</label>
                      <input name="price" type="number" class="form-control" id="exampleInputEmail1" placeholder="Train Name">
                    </div>
  
                    <div class="form-group">
                      <label for="exampleInputEmail1">Seates</label>
                      <input name="seates" type="number" class="form-control" id="exampleInputEmail1" placeholder="Train Name">
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