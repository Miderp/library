@extends('layouts.app')

@section('content')

<div class="flex-1 overflow-auto">
    <div class="bg-white rounded-lg shadow-md p-6 mb-6">    
        <div class="flex items-center mb-4">
            <i class="fas fa-book text-blue-500 mr-2 text-xl"></i>
            <h2 class="text-xl font-semibold text-gray-800">Daftar Buku</h2>
        </div>
        <div class="flex items-center mb-4">
            <i class="fas fa-house text-gray-800 mr-2 text-xl"></i>
            <a href={{route('dashboard')}} class="text-xl font-semibold text-gray-800">Dashboard</a>
        </div>
    <div class="flex justify-between items-center mb-6">
        <a href="{{route('buku.create')}}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg flex items-center" >
            <i class="fas fa-plus mr-2"></i>Add New Books
        </a>
    </div>
    <div class="bg-white shadow rounded-lg overflow-hidden mb-6">
        <div class="p-4 border-b border-gray-200 flex justify-between items-center">
            <div class="flex items-center space-x-4">

                <div class="relative">
                    <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                    <form method="GET" class="mb3">
                    <input type="text" name="cari" value="{{ request('cari') }}" placeholder="Search Books" class="pl-10 pr-4 py-2 border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 form-control">
                    </form>
                </div>

                <select id="category-filter" class="border broder-gray-300 rounded-lg px-3 py-4 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    <option value="">All Categories</option>
                    <option value="Fiction">Fiction</option>
                    <option value="Non-Fiction">Non-Fiction</option>
                    <option value="Science">Science</option>
                    <option value="History">History</option>
                </select>
            </div>
        </div>
    </div>
    {{--$bukus->withQueryString()->links() --}}
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title & Author</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Category</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Release Date</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bukus as $buku)
                <tr class="table-row data-row">
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm font-medium text-gray-900">{{$buku->judul}}</div>
                        <div class="text-sm text-gray-500">{{$buku->pengarang}}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">{{$buku->jenis_buku}}</td>
                    <td class="px-6 py-4 whitespace-nowrap  ">{{$buku->tahun_terbit}}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex space-x-2">
                            <a href="{{ route('buku.edit', $buku->id ) }}" class="btn btn-warning btn-sm text-blue-500 hover:text-blue_700"><i class="fas fa-edit"></i></a>
                            <form action="{{ route('buku.destroy', $buku->id) }}" method="POST" class="display:inline text-red-500 hover:text-red-700">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus?')"><i class="fas fa-trash"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</div>
<script>
    function applyFilters() {
        const selectedCategory = document.getElementById('category-filter').value.toLowerCase();
        const rows = document.querySelectorAll('.data-row');
        let matchCount = 0;

        rows.forEach(function (row) {
            const categoryCell = row.querySelector('td:nth-child(2)');
            const categoryText = categoryCell.textContent.trim().toLowerCase();

            let categoryMatch = selectedCategory === "" || categoryText === selectedCategory;

            if (categoryMatch) {
                row.style.display = '';
                matchCount++;
            } else {
                row.style.display = 'none';
            }
        });
    }

    document.getElementById('category-filter').addEventListener('change', applyFilters);
</script>

@endsection
{{-- <div class=" p-6 flex-1 overflow-auto">
    <div class="flex justify-between items-center mb-6">
        <i class="fas fa-book text-blue-500 mr-2"></i>
        <h2 class="text-xl font-semibold text-gray-800">Books List</h2>
        <a href="{{route('buku.create')}}" class="bg-blue-500 hover:bg-blue-600 rounded-lg text-white px-4 py-2 flex items-center">
            <i class="fas fa-plus mr-2 "></i>Add New Book
        </a>
    </div>

    <div class="bg-white shadow rounded-lg overflow hidden mb-6">
        <div class="p-4 border-b border-gray-200 flex justify-between items-center">
            <div class="flex items-center space-px-4">
                <div class="relative">
                    <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                    <input type="text" name="cari" placeholder="Search Books"value={{request('cari')}} class="pl-10 pr-4 py-2 border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 form-control">
                </div>

                <select class="border broder-gray-300 rounded-lg px-3 py-4 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    <option>All Categories</option>
                    <option>Fiction</option>
                    <option>Non-Fiction</option>
                    <option>Science</option>
                    <option>History</option>
                </select>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title & Author</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Category</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Release Date</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bukus as $buku)
                    @if ($bukus->isEmpty())
                        <tr>
                            <td colspan="4" class="px-6 py-4 text-center text-gray-500">
                                No books found.
                            </td>
                        </tr>
                    @endif
                        <tr class="table row">
                            <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">{{$buku->judul}}</div>
                            <div class="text-sm text-gray-500">{{$buku->pengarang}}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">{{$buku->jenis_buku}}</td>
                        <td class="px-6 py-4 whitespace-nowrap  ">{{$buku->tahun_terbit}}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex space-x-2">
                                <a href="{{ route('buku.edit', $buku->id ) }}" class="btn btn-warning btn-sm text-blue-500 hover:text-blue_700"><i class="fas fa-edit"></i></a>
                                <form action="{{ route('buku.destroy', $buku->id) }}" method="POST" class="display:inline text-red-500 hover:text-red-700">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus?')"><i class="fas fa-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </div>

        <div class="px-6 py-4 border-t border-gray-200 flex items-center justify-between">
            <div class="flex space-x-2">
                <button class="px-3 py-1 border border-gray-300 rounded-lg text-sm hover:bg-gray-50">Previous</button>
                <button class="px-3 py-1 border border-blue-500 bg-blue-50 text-blue-600 rounded-lg text-sm font-medium">1</button>
                <button class="px-3 py-1 border border-gray-300 rounded-lg text-sm hover:bg-gray-50">2</button>
                <button class="px-3 py-1 border border-gray-300 rounded-lg text-sm hover:bg-gray-50">3</button>
                <button class="px-3 py-1 border border-gray-300 rounded-lg text-sm hover:bg-gray-50">Next</button>
            </div>
        </div>
    </div>
</div> --}}
