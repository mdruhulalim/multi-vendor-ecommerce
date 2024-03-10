@extends('admin.layouts.master')

@section('content')
    <!-- Main Content -->
        <section class="section">
          <div class="section-header">
            <h1>Product images gallery</h1>
          </div>
          <div class="mb-3">
            <a href="{{ route('admin.products.index') }}" class="btn btn-primary">Back</a>
          </div>
          <div class="section-body">
            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Product: {{ $product->name }}</h4>
                  </div>
                  <div class="card-body">
                    <div class="card-body">
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
                  <div class="card-footer text-right">
                  </div>
                </div>
              </div>
            </div>
           
            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>All Images</h4>
                  </div>
                  <div class="card-body">
                    {{ $dataTable->table() }}
                  </div>
                  <div class="card-footer text-right">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
@endsection
{{-- for yajrabox datatable --}}
@push('scripts')
{{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush