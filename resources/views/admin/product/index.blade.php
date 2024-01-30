@extends('admin.layouts.master')

@section('content')
    <!-- Main Content -->
        <section class="section">
          <div class="section-header">
            <h1>Product</h1>
          </div>

          <div class="section-body">
            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>All Products</h4>
                    <div class="card-header-action">
                        <a href="{{ route('admin.products.create') }}" class="btn btn-primary"><i class="fas fa-plus mr-1"></i>Create New</a>
                    </div>
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