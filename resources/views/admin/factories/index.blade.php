@extends('layouts.admin')

@section('page-content')
    <div class="container mx-auto mt-6">
        <h3 class="text-2xl font-semibold mb-4">Users List</h3>

        <div class="overflow-x-auto">
            <table id="factories-table" class="min-w-full divide-y divide-gray-200 table-auto">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Factory
                            Name</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Location
                        </th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email
                        </th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Website
                        </th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action
                        </th>
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
            $('#factories-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.factories.datatable') }}",
                columns: [{
                        data: null,
                        searchable: false,
                        orderable: false,
                        render: function(data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    {
                        data: 'id'
                    },
                    {
                        data: 'factory_name'
                    },
                    {
                        data: 'location'
                    },
                    {
                        data: 'email'
                    },
                    {
                        data: 'website'
                    },
                    {
                        data: null,
                        render: function(data, type, row) {
                            return `
                                <a href="/admin/factories/${row.id}/edit" class="text-blue-500 mr-2">Edit</a>
                                <button onclick="deleteFactory(${row.id})" class="text-red-500">Delete</button>
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
    </script>
@endpush
