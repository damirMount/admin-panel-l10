@extends('admin.layouts.app')

@section('content')
    <div class="col-auto d-flex justify-content-end">
        <a href="{{ route('admin_items.create') }}" class="btn btn-success">{{ __('Создать') }}</a>
    </div>
    <div class="m-2 rounded">
        <table class="table table-striped table-bordered rounded" id="items-table">
            <thead>
            <tr>
                <th></th>
                <th scope="col">Заголовок</th>
            </tr>
            </thead>
        </table>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <style>
        #items-table {
            width: 100% !important;
        }
        .control {
            text-align: center;
            color: green;
            padding: 15px!important;
        }
        .control.opened {
            color: red;
        }
        #items-table tr:hover {
            cursor: pointer;
        }
    </style>
@endpush

@push('scripts')
    <script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js" defer></script>
    <script>
        $(function () {
            let table = $('#items-table').DataTable({
                responsive: true,
                processing: true,
                ajax: '{!! route('admin_families.index') !!}',
                columns: [
                    // Responsive control column
                    {
                        data: null,
                        defaultContent: '<i class="fas fa-plus-circle fa-2x"></i>',
                        className: 'control',
                        orderable: false,
                        searchable: false,
                    },
                    {data: 'name'},
                    // {data: 'actions'},
                ],
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.18/i18n/Russian.json"
                },
            });
            $('#items-table').on('click', 'tbody td.control', function () {
                if (this.classList.contains('opened')) {
                    this.classList.remove('opened');
                    this.innerHTML = '<i class="fas fa-plus-circle fa-2x"></i>';
                }
                else {
                    this.classList.add('opened');
                    this.innerHTML = '<i class="fas fa-minus-circle fa-2x"></i>';
                }
            });
            $('#items-table tbody').on('click', 'td:not(.control)', function () {
                let data = table.row(this.parentElement).data();
                window.location.href = window.location.origin + '/admin/items/' + data.id+'';
            });
        });
    </script>
@endpush
