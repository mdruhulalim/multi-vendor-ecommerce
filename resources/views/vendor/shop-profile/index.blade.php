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
                        <h3><i class="far fa-user"></i> Shop profile</h3>
                        <div class="wsus__dashboard_profile">
                            <form action="{{ route('vendor.shop-profile.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group wsus_input">
                                    <label>Preview banner</label>
                                    <br>
                                    <img width="200px" src="{{ asset($profile->banner) }}" alt="">
                                </div>
                                <div class="form-group wsus_input">
                                    <label>Banner</label>
                                    <input type="file" class="form-control" name="banner">
                                </div>
                                <div class="form-group wsus_input">
                                    <label>Shop Name</label>
                                    <input type="text" class="form-control" name="shop_name" value="{{ $profile->shop_name }}">
                                </div>
                                <div class="form-group wsus_input">
                                    <label>Phone</label>
                                    <input type="text" class="form-control" name="phone" value="{{ $profile->phone }}">
                                </div>
                                <div class="form-group wsus_input">
                                    <label>Email</label>
                                    <input type="text" class="form-control" name="email" value="{{ $profile->email }}">
                                </div>
                                <div class="form-group wsus_input">
                                    <label>Address</label>
                                    <input type="text" class="form-control" name="address" value="{{ $profile->address }}">
                                </div>
                                <div class="form-group wsus_input">
                                    <label>Description</label>
                                    <textarea class="summernote" name="description">{{ $profile->description }}</textarea>
                                </div>
                                <div class="form-group wsus_input">
                                    <label>Facebook</label>
                                    <input type="text" class="form-control" name="fb_link" value="{{ $profile->fb_link }}">
                                </div>
                                <div class="form-group wsus_input">
                                    <label>Twitter</label>
                                    <input type="text" class="form-control" name="tw_link" value="{{ $profile->tw_link }}">
                                </div>
                                <div class="form-group wsus_input">
                                    <label>Instagram</label>
                                    <input type="text" class="form-control" name="insta_link" value="{{ $profile->insta_link }}">
                                </div>
                                <button class="btn btn-primary" type="submit">Update</button>
                            </form>
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