{{-- from theme table-data -> Data Table With Full Features --}}
@extends('admin.admin_master')
@section('admin')


<!-- Content Wrapper. Contains page content -->
    <div class="container-full">
      <!-- Content Header (Page header) -->
      

      <!-- Main content -->
      <section class="content">
        <div class="row">
            
          
 

          <div class="col-8">

           <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Brand List</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>Brand En</th>
                              <th>Brand Ar</th>
                              <th>Image</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                @foreach ( $brands as $item )
                <tr>
                    <td>{{$item->brand_name_en}}</td>
                    <td>{{$item->brand_name_ar}}</td>
                    <td><img src="{{asset($item->brand_image)}}" style="width: 70px; height: 40px"></td>
                    <td>
                        <a href="{{ route('brand.edit',$item->id) }}" class="btn btn-info">Edit</a>
                        <a href="" class="btn btn-danger">Danger</a>
                    </td>
                </tr>
                @endforeach
                          
                          
                    </table>
                  </div>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->

                     
          </div>
          {{-- /col end --}}


{{-- -------------------- Add Brand Page ------------------ --}}



          <div class="col-4">

            <div class="box">
               <div class="box-header with-border">
                 <h3 class="box-title">Add Brand</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                   <div class="table-responsive">
                     
                    {{-- coped this form from admin_change_password.blade.php --}}

                    <form method="post" action="{{ route('brand.store') }}" enctype="multipart/form-data"> {{--  منضيف هي اخر خاصية اذا في صور --}}
                        @csrf
                         
                                    <div class="form-group">
                                        <h5>Brand Name English <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="brand_name_en" class="form-control"> </div>
                                            @error('brand_name_en')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                    </div>
    
                                    <div class="form-group">
                                        <h5>Brand Name Arabic <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="brand_name_ar" class="form-control"> </div>
                                            @error('brand_name_ar')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                    </div>
    
                                    <div class="form-group">
                                        <h5>Brand Image <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="file" name="brand_image" class="form-control"> </div>
                                            @error('brand_image')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                    </div>
                               
                              
                           <div class="text-xs-right">
                               <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add New">
                           </div>
                       </form>



                   </div>
               </div>
               <!-- /.box-body -->
             </div>
             <!-- /.box -->
 
                      
           </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </section>
      <!-- /.content -->
    
    </div>

<!-- /.content-wrapper -->






@endsection