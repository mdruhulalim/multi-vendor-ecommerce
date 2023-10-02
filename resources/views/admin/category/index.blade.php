@extends('admin.layouts.master')

@section('content')
    <!-- Main Content -->
    <section class="section">
        <div class="section-header">
            <h1>All Category</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>All Category</h4>
                            <div class="card-header-action">
                                <a href="{{ route('admin.category.create') }}" class="btn btn-primary"><i
                                        class="fas fa-plus mr-1"></i>Create New</a>
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

    {{-- for update category status --}}
    <script>
        $(document).ready(function() {
            $('body').on('click', '.change-status', function() {
                let isChecked = $(this).is(':checked');
                let id = $(this).data('id');

                $.ajax({
                    url: "{{ route('admin.category.change-status') }}",
                    method: 'PUT',
                    data: {
                        status: isChecked,
                        id: id
                    },
                    success: function(data) {
                        toastr.success(data.message)
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    }
                })

            })
        })
    </script>
@endpush
