@extends('layouts.admin')

@section('page-content')
    <div class="container w-100 mt-6">
        <div class="flex justify-between">
            <h3 class="text-3xl font-semibold mb-4">Employees</h3>
            <form action="{{ route('admin.employees.create') }}" method="GET">
                <button type="submit"
                    class="mb-2 justify-end bg-green-600 hover:bg-green-700 text-white font-semibold px-5 py-2 rounded-lg shadow transition duration-200">
                    Create
                </button>
            </form>
        </div>
        <div class="overflow-x-auto">
            <table id="employees-table" class="min-w-full divide-y divide-gray-200 table-auto">
                <thead class="bg-gray-100">
                    <tr>
                        {{-- <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#</th> --}}
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">First Name</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Last Name</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Factory ID</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Phone</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <!-- DataTables will populate rows -->
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('scripts')
    <script type="module">
        $(document).ready(function() {
            $('#employees-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.employees.datatable') }}",
                columns: [
                    // {
                    //     data: null,
                    //     searchable: false,
                    //     orderable: false,
                    //     render: function(data, type, row, meta) {
                    //         return meta.row + meta.settings._iDisplayStart + 1;
                    //     }
                    // },
                    {
                        data: 'id'
                    },
                    {
                        data: 'firstname'
                    },
                    {
                        data: 'lastname'
                    },
                    {
                        data: 'factory_id'
                    },
                    {
                        data: 'email'
                    },
                    {
                        data: 'phone'
                    },
                    {
                        data: null,
                        render: function(full, data, type, row) {
                            console.table(full);
                            return `
                                <a href="{{ route('admin.employees.index') }}/edit/${full.id}" class="text-blue-500 mr-2">Edit</a>
                                <button href="{{ route('admin.employees.index') }}/${full.id}" class="delete-factory text-red-500">Delete</button>
                            `;
                        },
                        searchable: false,
                        orderable: false
                    }
                ],
                order: [
                    [1, 'asc']
                ],
                dom: '<"flex justify-between mb-2"lf>t<"flex justify-between mt-2"ip>',
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search..."
                }
            });
        });

        function reloadTable() {
            $('#employees-table').DataTable().ajax.reload(null, false); 
        }

        $(document).on('click', '.delete-factory', function(e) {
            let url = $(this).attr('href');
            $.ajax({
                url: url,
                type: "DELETE",
                success: function(response) {
                    reloadTable();
                    alert(response.message);
                },
                error: function(xhr, status, error) {
                    alert("Error deleting item:", status, error);
                }
            });

        });
    </script>
@endpush
