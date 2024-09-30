@extends('vendor.layouts.master')
@section('content')
    <!--=============================
        DASHBOARD START
      ==============================-->
    <section id="wsus__dashboard">
        <div class="container-fluid">
            {{-- sideber --}}
            @include('vendor.layouts.sideber')
            {{-- change basic information --}}
            <div class="row">
                <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
                    <div class="dashboard_content mt-2 mt-md-0">
                        <h3><i class="far fa-user"></i> Products Gallery</h3>
                        <div class="wsus__dashboard_profile">
                            <div class="wsus__dash_pro_area">
                                <form action="{{ route('admin.products-image-callery.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                      <div class="form-group">
                                          <label for="">Image <code>(Multiple images supported)</code></label>
                                          <input type="file" name="image[]" class="form-control" multiple>
                                          <input type="hidden" name="product" value="{{ $product->id }}">
                                      </div>
                                      <button class="btn btn-primary" type="submit">Upload</button>
                                  </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=============================
        DASHBOARD START
      ==============================-->
@endsection