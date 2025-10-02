@extends('layouts.app')

@section('content')
     <div class="flex-1 overflow-auto">
            <!-- Top Navigation -->
            <div class="bg-white shadow-sm p-4 flex justify-between items-center">
                <h2 class="text-xl font-semibold text-gray-800" id="section-title">Dashboard</h2>

                <div class="flex items-center space-x-4">
                    <div class="relative">
                        <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                        <input type="text" placeholder="Search..." class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <div class="relative">
                        <i class="fas fa-door-open text-blue-500"></i>
                        <a href="{{route('logout')}}" class="text-decoration-none">Logout</a>
                    </div>
                </div>
            </div>

            <!-- Dashboard Content -->
            <div class="p-6" id="dashboard-section">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
                    <div class="card bg-white p-6 rounded-lg shadow">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-500">Total Books</p>
                                <h1 class="text-3xl font-bold mt-1">{{ $totalBuku }}</h1>
                            </div>
                            <div class="bg-blue-100 p-3 rounded-full">
                                <i class="fas fa-book text-blue-500 text-xl"></i>
                            </div>
                        </div>
                    </div>

                    <div class="card bg-white p-6 rounded-lg shadow">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-500">Active Members</p>
                                <h3 class="text-3xl font-bold mt-1">{{ $totalAnggota }}</h3>
                            </div>
                            <div class="bg-green-100 p-3 rounded-full">
                                <i class="fas fa-users text-green-500 text-xl"></i>
                            </div>
                        </div>
                    </div>

                    <div class="card bg-white p-6 rounded-lg shadow">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-500">Books Borrowed</p>
                                <h3 class="text-3xl font-bold mt-1">{{ $totalPinjam }}</h3>
                            </div>
                            <div class="bg-yellow-100 p-3 rounded-full">
                                <i class="fas fa-exchange-alt text-yellow-500 text-xl"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
                    <div class="lg:col-span-2 bg-white p-6 rounded-lg shadow">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="font-semibold text-gray-800">Recent Borrowings</h3>
                            <button class="text-sm text-blue-500 hover:text-blue-700">View All</button>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead>
                                    <tr>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Book</th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Member</th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Due Date</th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                    </tr>
                                </thead>
                                @foreach ($pinjams as $pinjam)


                                <tbody class="bg-white divide-y divide-gray-200">
                                    <tr class="table-row">
                                        <td class="px-4 py-3 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="ml-4">
                                                    <div class="text-sm font-medium text-gray-900">{{ $pinjam->bukus->judul}}</div>
                                                    <div class="text-sm text-gray-500">{{ $pinjam->anggotas->nama }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-4 py-3 whitespace-nowrap">
                                            <div class="text-sm text-gray-500"> ID : MEM-100</div>
                                        </td>
                                        <td class="px-4 py-3 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">May 15, 2023</div>
                                        </td>
                                        <td class="px-4 py-3 whitespace-nowrap">
                                            <span class="badge badge-success">On Time</span>
                                        </td>
                                    </tr>
                                </tbody>
                                @endforeach
                            </table>
                        </div>
                    </div>


                    <div class="bg-white p-6 rounded-lg shadow">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="font-semibold text-gray-800">Quick Actions</h3>
                        </div>
                        <div class="space-y-4">
                            <button class="w-full flex items-center justify-between p-4 bg-blue-50 rounded-lg hover:bg-blue-100 transition">
                                <div class="flex items-center">
                                    <i class="fas fa-plus-circle text-blue-500 mr-3"></i>
                                    <a class="text-decoration-none" href={{route('buku.create')}}>Add New Book</a>
                                </div>
                                <i class="fas fa-chevron-right text-gray-400"></i>
                            </button>

                            <button class="w-full flex items-center justify-between p-4 bg-green-50 rounded-lg hover:bg-green-100 transition">
                                <div class="flex items-center">
                                    <i class="fas fa-user-plus text-green-500 mr-3"></i>
                                    <a class="text-decoration-none" href={{route('anggota.create')}}>Register New Member</a>
                                </div>
                                <i class="fas fa-chevron-right text-gray-400"></i>
                            </button>

                            <button class="w-full flex items-center justify-between p-4 bg-purple-50 rounded-lg hover:bg-purple-100 transition">
                                <div class="flex items-center">
                                    <i class="fas fa-exchange-alt text-purple-500 mr-3"></i>
                                    <a class="text-decoration-none" href="{{route('pinjam.create')}}">Process Borrow/Return</a>
                                </div>
                                <i class="fas fa-chevron-right text-gray-400"></i>
                            </button>


                            {{-- <button class="w-full flex items-center justify-between p-4 bg-yellow-50 rounded-lg hover:bg-yellow-100 transition">
                                <div class="flex items-center">
                                    <i class="fas fa-envelope text-yellow-500 mr-3"></i>
                                    <span>Send Overdue Notices</span>
                                </div>
                                <i class="fas fa-chevron-right text-gray-400"></i>
                            </button> --}}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Books Management Section (Hidden by default) -->
            <div class="p-6 hidden" id="books-section">
                <div class="flex justify-between items-center mb-6">
                    <a  href="{{route('buku.index')}}"class="text-xl font-semibold text-gray-800">Books Management</a>
                    @if (Auth::user()->status == 'admin')
                    <a href="{{ route('buku.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg flex items-center">
                        <i class="fas fa-plus mr-2"></i> Add New Book
                    </a>
                    @endif
                </div>


                <div class="bg-white shadow rounded-lg overflow-hidden mb-6">
                    <div class="p-4 border-b border-gray-200 flex justify-between items-center">
                        <div class="flex items-center space-x-4">
                            <div class="relative">
                                <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                                <input type="text" placeholder="Search books..." class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            </div>

                            <select class="border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                <option>All Categories</option>
                                <option>Fiction</option>
                                <option>Non-Fiction</option>
                                <option>Science</option>
                                <option>History</option>
                            </select>
                        </div>

                            {{-- <div class="flex items-center space-x-2">
                                <button class="p-2 rounded-lg hover:bg-gray-100">
                                    <i class="fas fa-filter text-gray-500"></i>
                                </button>
                                <button class="p-2 rounded-lg hover:bg-gray-100">
                                    <i class="fas fa-download text-gray-500"></i>
                                </button>
                            </div> --}}
                    </div>

                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    {{-- <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cover</th> --}}
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title & Author</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Category</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($bukus as $buku)
                                <tr class="table-row">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm font-medium text-gray-900">{{ $buku->judul }}</div>
                                            <div class="text-sm text-gray-500">{{ $buku->pengarang }}</div>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="badge badge-info">{{ $buku->jenis_buku }}</span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="badge badge-success">Available</span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @if(Auth::user()->status == 'admin')
                                            <div class="flex space-x-2">
                                                <a href="{{ route('buku.edit', $buku->id) }}" class="text-blue-500 hover:text-blue-700">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('buku.destroy', $buku->id) }}" method="POST" class="text-red-500 hover:text-red-700">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus?')"><i class="fas fa-trash"></i></button>
                                                </form>
                                            </div>
                                            @endif
                                        </td>
                                </tr>

                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    {{-- <div class="px-6 py-4 border-t border-gray-200 flex items-center justify-between">
                        <div class="flex space-x-2">
                            <button class="px-3 py-1 border border-gray-300 rounded-lg text-sm hover:bg-gray-50">Previous</button>
                            <button class="px-3 py-1 border border-blue-500 bg-blue-50 text-blue-600 rounded-lg text-sm font-medium">1</button>
                            <button class="px-3 py-1 border border-gray-300 rounded-lg text-sm hover:bg-gray-50">2</button>
                            <button class="px-3 py-1 border border-gray-300 rounded-lg text-sm hover:bg-gray-50">3</button>
                            <button class="px-3 py-1 border border-gray-300 rounded-lg text-sm hover:bg-gray-50">Next</button>
                        </div>
                    </div> --}}
                </div>
            </div>

            <!-- Members Management Section (Hidden by default) -->
            <div class="p-6 hidden" id="members-section">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-xl font-semibold text-gray-800">Members Management</h2>
                    @if (Auth::user()->status == 'admin')
                    <a href="{{route('anggota.create')}}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg flex items-center">
                        <i class="fas fa-user-plus mr-2"></i> Register New Member
                    </a>
                    @endif
                </div>

                <div class="bg-white shadow rounded-lg overflow-hidden mb-6">
                    <div class="p-4 border-b border-gray-200 flex justify-between items-center">
                        <div class="flex items-center space-x-4">
                            <div class="relative">
                                <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                                <input type="text" placeholder="Search members..." class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            </div>

                            <select class="border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                <option>All Members</option>
                                <option>Active</option>
                                <option>Inactive</option>
                            </select>
                        </div>

                        {{-- <button class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg flex items-center">
                            <i class="fas fa-file-export mr-2"></i> Export
                        </button> --}}
                    </div>

                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    {{-- <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Photo</th> --}}
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name & ID</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Contact</th>
                                    {{-- <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Membership</th> --}}
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                    @if (Auth::user()->status == 'admin')
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($anggotas as $members)
                                    <tr class="table-row">
                                        {{-- <td class="px-6 py-4 whitespace-nowrap">
                                            <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Member Photo" class="h-10 w-10 rounded-full">
                                        </td> --}}
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm font-medium text-gray-900">{{ $members->nama }}</div>
                                            <div class="text-sm text-gray-500">ID:MEM-100{{ $members->id }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">{{ $members->alamat }}</div>
                                            <div class="text-sm text-gray-500">{{ $members->nohp }}</div>
                                        </td>
                                        {{-- <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">Premium</div>
                                            <div class="text-sm text-gray-500">Expires: 12/31/2023</div>
                                        </td> --}}
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <select class="badge badge-success">Status
                                                <option>Active</option>
                                                <option>Inactive</option>
                                            </select>
                                        </td>
                                       <td class="px-6 py-4 whitespace-nowrap">
                                            @if(Auth::user()->status == 'admin')
                                            <div class="flex space-x-2">
                                                <a href="{{ route('anggota.edit', $members->id) }}" class="text-blue-500 hover:text-blue-700">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('anggota.destroy', $members->id) }}" method="POST" class="text-red-500 hover:text-red-700">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus?')"><i class="fas fa-trash"></i></button>
                                                </form>
                                            </div>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="px-6 py-4 border-t border-gray-200 flex items-center justify-between">
                        {{-- <div class="text-sm text-gray-500">
                            Showing <span class="font-medium">1</span> to <span class="font-medium">4</span> of <span class="font-medium">1,234</span> members
                        </div> --}}
                        {{-- <div class="flex space-x-2">
                            <button class="px-3 py-1 border border-gray-300 rounded-lg text-sm hover:bg-gray-50">Previous</button>
                            <button class="px-3 py-1 border border-blue-500 bg-blue-50 text-blue-600 rounded-lg text-sm font-medium">1</button>
                            <button class="px-3 py-1 border border-gray-300 rounded-lg text-sm hover:bg-gray-50">2</button>
                            <button class="px-3 py-1 border border-gray-300 rounded-lg text-sm hover:bg-gray-50">3</button>
                            <button class="px-3 py-1 border border-gray-300 rounded-lg text-sm hover:bg-gray-50">Next</button>
                        </div> --}}
                    </div>
                </div>
            </div>

            <!-- Borrow/Return Section (Hidden by default) -->
            <div class="p-6 hidden" id="borrow-section">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-xl font-semibold text-gray-800">Borrow/Return Management</h2>
                    @if (Auth::user()->status == 'admin')
                    <div class="flex space-x-3">
                        <a href={{route('pinjam.create')}} class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg flex items-center">
                            <i class="fas fa-book-reader mr-2"></i> Borrow Book
                        </a>
                        <a href="{{route('pinjam.index')}}" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg flex items-center">
                            <i class="fas fa-book mr-2"></i> Return Book
                        </a>
                    </div>
                    @endif
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
                    <div class="lg:col-span-2 bg-white shadow rounded-lg overflow-hidden">
                        <div class="p-4 border-b border-gray-200">
                            <h3 class="font-semibold text-gray-800">Current Borrowings</h3>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Book</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Member</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Borrowed Date</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Due Date</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach($pinjams as $pinjam)


                                    <tr class="table-row">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="ml-4">
                                                    <div class="text-sm font-medium text-gray-900">{{ $pinjam->bukus->judul }}</div>
                                                    <div class="text-sm text-gray-500">{{ $pinjam->bukus->pengarang }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="ml-4">
                                                    <div class="text-sm font-medium text-gray-900">{{ $pinjam->anggotas->nama }}</div>
                                                    <div class="text-sm text-gray-500">ID: MEM-100{{ $pinjam->anggotas->id }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">{{ $pinjam->tanggal_pinjam }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 py-1 text-xs font-semibold rounded-full
                                                {{ $pinjam->tanggal_kembali ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                                {{ $pinjam->tanggal_kembali ? 'Returned' : 'Borrowed' }}
                                            </span>
                                        </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="badge badge-success">Borrowed</span>
                                    </td>
                                    @if (Auth::user()->status == 'admin')
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex space-x-2">
                                            <a href="{{ route('pinjam.edit', $pinjam->id) }}" class="text-blue-500 hover:text-blue-700">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('pinjam.destroy', $pinjam->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-500 hover:text-red-700" onclick="return confirm('Are you sure?')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                    @endif
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

                    {{-- <div class="bg-white shadow rounded-lg overflow-hidden">
                        <div class="p-4 border-b border-gray-200">
                            <h3 class="font-semibold text-gray-800">Quick Actions</h3>
                        </div>
                        <div class="p-4">
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Member ID</label>
                                <div class="relative">
                                    <i class="fas fa-user absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                                    <input type="text" placeholder="Enter member ID" class="pl-10 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                </div>
                            </div>

                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Book ISBN</label>
                                <div class="relative">
                                    <i class="fas fa-barcode absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                                    <input type="text" placeholder="Enter book ISBN" class="pl-10 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                </div>
                            </div>

                            <div class="grid grid-cols-2 gap-3">
                                <button class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-book-reader mr-2"></i> Borrow
                                </button>
                                <button class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-book mr-2"></i> Return
                                </button>
                            </div> --}}

                            {{-- <div class="mt-6">
                                <h3 class="font-semibold text-gray-800 mb-3">Overdue Notices</h3>
                                <div class="space-y-3">
                                    <div class="flex items-start p-3 bg-red-50 rounded-lg">
                                        <i class="fas fa-exclamation-circle text-red-500 mt-1 mr-3"></i>
                                        <div>
                                            <p class="text-sm font-medium">Emily Johnson - Educated</p>
                                            <p class="text-xs text-gray-500 mt-1">Overdue by 5 days</p>
                                        </div>
                                    </div>

                                    <div class="flex items-start p-3 bg-yellow-50 rounded-lg">
                                        <i class="fas fa-exclamation-triangle text-yellow-500 mt-1 mr-3"></i>
                                        <div>
                                            <p class="text-sm font-medium">Michael Brown - Atomic Habits</p>
                                            <p class="text-xs text-gray-500 mt-1">Due in 3 days</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                <div class="bg-white shadow rounded-lg overflow-hidden">
                    <div class="p-4 border-b border-gray-200">
                        <h3 class="font-semibold text-gray-800">Recent Returns</h3>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Book</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Member</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Borrowed Date</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Returned Date</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr class="table-row">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10">
                                                <img class="h-10 w-10 rounded" src="https://m.media-amazon.com/images/I/51mNEdZ9bJL._SY425_.jpg" alt="">
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">Where the Crawdads Sing</div>
                                                <div class="text-sm text-gray-500">Delia Owens</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10">
                                                <img class="h-10 w-10 rounded-full" src="https://randomuser.me/api/portraits/women/68.jpg" alt="">
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">Sarah Wilson</div>
                                                <div class="text-sm text-gray-500">ID: MEM-1004</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">Mar 15, 2023</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">Apr 10, 2023</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="badge badge-success">Returned</span>
                                    </td>
                                </tr>
                                <tr class="table-row">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10">
                                                <img class="h-10 w-10 rounded" src="https://m.media-amazon.com/images/I/51xwGSNX-EL._SY425_.jpg" alt="">
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">The Silent Patient</div>
                                                <div class="text-sm text-gray-500">Alex Michaelides</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10">
                                                <img class="h-10 w-10 rounded-full" src="https://randomuser.me/api/portraits/men/32.jpg" alt="">
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">John Smith</div>
                                                <div class="text-sm text-gray-500">ID: MEM-1001</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">Mar 20, 2023</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">Apr 15, 2023</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="badge badge-success">Returned</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            --}}

            <!-- Reports Section (Hidden by default) -->
            {{-- <div class="p-6 hidden" id="reports-section">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-xl font-semibold text-gray-800">Library Reports</h2>
                    <div class="flex space-x-3">
                        <button class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg flex items-center">
                            <i class="fas fa-download mr-2"></i> Export Report
                        </button>
                        <button class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg flex items-center">
                            <i class="fas fa-print mr-2"></i> Print
                        </button>
                    </div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
                    <div class="bg-white shadow rounded-lg p-6">
                        <h3 class="font-semibold text-gray-800 mb-4">Monthly Borrowings</h3>
                        <div class="h-64">
                            <!-- Chart placeholder -->
                            <div class="flex items-center justify-center h-full bg-gray-100 rounded-lg">
                                <p class="text-gray-500">Borrowings chart will appear here</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white shadow rounded-lg p-6">
                        <h3 class="font-semibold text-gray-800 mb-4">Popular Categories</h3>
                        <div class="h-64">
                            <!-- Chart placeholder -->
                            <div class="flex items-center justify-center h-full bg-gray-100 rounded-lg">
                                <p class="text-gray-500">Categories chart will appear here</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white shadow rounded-lg overflow-hidden mb-6">
                    <div class="p-4 border-b border-gray-200">
                        <h3 class="font-semibold text-gray-800">Overdue Books Report</h3>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Book</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Member</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Due Date</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Days Overdue</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fine Amount</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr class="table-row">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10">
                                                <img class="h-10 w-10 rounded" src="https://m.media-amazon.com/images/I/41j-s9fHJcL._SY425_.jpg" alt="">
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">Educated</div>
                                                <div class="text-sm text-gray-500">Tara Westover</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10">
                                                <img class="h-10 w-10 rounded-full" src="https://randomuser.me/api/portraits/women/44.jpg" alt="">
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">Emily Johnson</div>
                                                <div class="text-sm text-gray-500">ID: MEM-1002</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">May 10, 2023</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">5</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">$2.50</div>
                                    </td>
                                </tr>
                                <tr class="table-row">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10">
                                                <img class="h-10 w-10 rounded" src="https://m.media-amazon.com/images/I/51Ga5GuElyL._SY425_.jpg" alt="">
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">Atomic Habits</div>
                                                <div class="text-sm text-gray-500">James Clear</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10">
                                                <img class="h-10 w-10 rounded-full" src="https://randomuser.me/api/portraits/men/75.jpg" alt="">
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">Michael Brown</div>
                                                <div class="text-sm text-gray-500">ID: MEM-1003</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">May 20, 2023</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">0</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">$0.00</div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="bg-white shadow rounded-lg p-6">
                        <h3 class="font-semibold text-gray-800 mb-4">Top Borrowed Books</h3>
                        <div class="space-y-4">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-12 w-10">
                                    <img class="h-12 w-10 object-cover rounded" src="https://m.media-amazon.com/images/I/51xwGSNX-EL._SY425_.jpg" alt="">
                                </div>
                                <div class="ml-4 flex-1">
                                    <div class="flex items-center justify-between">
                                        <p class="text-sm font-medium text-gray-900">The Silent Patient</p>
                                        <p class="text-sm text-gray-500">42 times</p>
                                    </div>
                                    <div class="w-full bg-gray-200 rounded-full h-1.5 mt-1">
                                        <div class="bg-blue-500 h-1.5 rounded-full" style="width: 85%"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-12 w-10">
                                    <img class="h-12 w-10 object-cover rounded" src="https://m.media-amazon.com/images/I/41j-s9fHJcL._SY425_.jpg" alt="">
                                </div>
                                <div class="ml-4 flex-1">
                                    <div class="flex items-center justify-between">
                                        <p class="text-sm font-medium text-gray-900">Educated</p>
                                        <p class="text-sm text-gray-500">38 times</p>
                                    </div>
                                    <div class="w-full bg-gray-200 rounded-full h-1.5 mt-1">
                                        <div class="bg-blue-500 h-1.5 rounded-full" style="width: 75%"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-12 w-10">
                                    <img class="h-12 w-10 object-cover rounded" src="https://m.media-amazon.com/images/I/51Ga5GuElyL._SY425_.jpg" alt="">
                                </div>
                                <div class="ml-4 flex-1">
                                    <div class="flex items-center justify-between">
                                        <p class="text-sm font-medium text-gray-900">Atomic Habits</p>
                                        <p class="text-sm text-gray-500">35 times</p>
                                    </div>
                                    <div class="w-full bg-gray-200 rounded-full h-1.5 mt-1">
                                        <div class="bg-blue-500 h-1.5 rounded-full" style="width: 70%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}

                     {{-- <div class="bg-white shadow rounded-lg p-6">
                        <h3 class="font-semibold text-gray-800 mb-4">Most Active Members</h3>
                        <div class="space-y-4">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-10 w-10">
                                    <img class="h-10 w-10 rounded-full" src="https://randomuser.me/api/portraits/men/32.jpg" alt="">
                                </div>
                                <div class="ml-4 flex-1">
                                    <div class="flex items-center justify-between">
                                        <p class="text-sm font-medium text-gray-900">John Smith</p>
                                        <p class="text-sm text-gray-500">18 books</p>
                                    </div>
                                    <div class="w-full bg-gray-200 rounded-full h-1.5 mt-1">
                                        <div class="bg-green-500 h-1.5 rounded-full" style="width: 90%"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-10 w-10">
                                    <img class="h-10 w-10 rounded-full" src="https://randomuser.me/api/portraits/women/44.jpg" alt="">
                                </div>
                                <div class="ml-4 flex-1">
                                    <div class="flex items-center justify-between">
                                        <p class="text-sm font-medium text-gray-900">Emily Johnson</p>
                                        <p class="text-sm text-gray-500">15 books</p>
                                    </div>
                                    <div class="w-full bg-gray-200 rounded-full h-1.5 mt-1">
                                        <div class="bg-green-500 h-1.5 rounded-full" style="width: 75%"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-10 w-10">
                                    <img class="h-10 w-10 rounded-full" src="https://randomuser.me/api/portraits/men/75.jpg" alt="">
                                </div>
                                <div class="ml-4 flex-1">
                                    <div class="flex items-center justify-between">
                                        <p class="text-sm font-medium text-gray-900">Michael Brown</p>
                                        <p class="text-sm text-gray-500">12 books</p>
                                    </div>
                                    <div class="w-full bg-gray-200 rounded-full h-1.5 mt-1">
                                        <div class="bg-green-500 h-1.5 rounded-full" style="width: 60%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
@endsection
