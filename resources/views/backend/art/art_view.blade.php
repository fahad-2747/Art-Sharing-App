@extends('admin.admin_master')
@section('admin')

    <div class="container-full">
        <!-- Main content -->
            <section class="content">
                <div class="row">

                    <div class="col-8">

                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Art's List</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th>Art Name</th>
                                            <th>Category</th>
                                            <th>Art Price</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($art as $item)
                                        <tr>
                                            <td>{{ $item->art_name }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->price }}</td>
                                            <td>
                                                <img src="{{ asset($item->art_image) }}" style="width: 70px; height: 40px;">
                                            </td>
                                            <td>
                                                <a href="{{ route('art.edit',$item->id) }}" class="btn btn-info" title="Edit Data"><i class="fa fa-pencil"></i></a>
                                                <a href="{{ route('art.delete',$item->id) }}" class="btn btn-danger" id="delete" title="Delete Data"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->


                        <!-- /.box -->
                    </div>
                    <!-- /.col -->

                    <div class="col-4">

                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Add Art</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">

                                    <form action="{{ route('art.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf

                                            <div class="form-group">
                                                <h5>Art Name <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="art_name" class="form-control">
                                                    @error('art_name')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <h5>Category Name <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="cat_id" id="" class="form-control">
                                                        <option value="" selected>Chose category</option>
                                                        @foreach($categories as $category)
                                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                        <div class="form-group">
                                            <h5>Art Description <span class="text-danger">*</span></h5>
                                            <div class="controls">
{{--                                                <input type="text" name="name" class="form-control">--}}
                                                <textarea name="description" class="form-control"></textarea>
                                                @error('description')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <h5>Art price <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="price" class="form-control">
                                                @error('price')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <h5>Art price <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="rating" id="" class="form-control">
                                                    <option value="" selected>Chose Rating</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <h5>Art Image <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="file" name="art_image" class="form-control">
                                                @error('art_image')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="text-xs-right">
                                            <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Insert">
                                        </div>
                                    </form>

                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->


                        <!-- /.box -->
                    </div>

                </div>
                <!-- /.row -->
            </section>
            <!-- /.content -->

        </div>


@endsection
