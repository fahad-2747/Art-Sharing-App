@extends('admin.admin_master')
@section('admin')

    <div class="container-full">
        <!-- Main content -->
        <section class="content">
            <div class="row">

                <div class="col-12">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Edit Brand</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">

                                <form action="{{ route('art.update',$art->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <input type="hidden" name="id" value="{{ $art->id }}">
                                    <input type="hidden" name="old_image" value="{{ $art->art_image }}">

                                    <div class="form-group">
                                        <h5>Art Name <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="art_name" class="form-control" value="{{ $art->art_name }}">
                                            @error('art_name')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>Art Description <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <textarea name="description" class="form-control">{{ $art->description }}</textarea>
                                            @error('description')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>Art price <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="price" class="form-control" value="{{ $art->price }}">
                                            @error('price')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>Art price <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="rating" id="" class="form-control">
                                                <option value="{{ $art->rating }}" selected>{{ $art->rating }}</option>
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
                                        </div>
                                    </div>


                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update">
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
