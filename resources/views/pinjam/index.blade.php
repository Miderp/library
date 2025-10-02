@extends('layouts.app')

@section('content')
<div class="flex-1 overflow-auto">
    <div class="bg-white rounded-lg shadow-md p-6 mb-6">
        <div class="flex items-center mb-4">
            <i class="fas fa-exchange-alt text-yellow-500 text-xl mr-2"></i>
            <h2 class="text-xl font-semibold text-gray-800">Data Peminjaman</h2>
        </div>

        <div class="flex items-center mb-4">
            <i class="fas fa-house text-xl text-gray-800 mr-2"></i>
            <a href="{{route('dashboard')}}" class="text-xl font-semibold text-gray-800">Dashboard</a>
        </div>
        <div class="flex justify-between items-center mb-6">
            <a href="{{route('pinjam.create')}}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg flex items-center" >
                <i class="fas fa-exchange-alt mr-2"></i>Borrow Book
            </a>
        </div>

        <div class="bg-white shadow rounded-lg overflow-hidden mb-6">
            <div class="p-4 border-b border-gray-200 flex justify-between items-center">
                <div class="flex items-center space-x-4">
                    <div class="relative">
                        <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                        <form method="GET" class="mb3">
                        <input type="text" name="cari" value="{{ request('cari') }}" placeholder="Look For Loan Data" class="pl-10 pr-4 py-2 border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 form-control">
                        </form>
                </div>
                </div>
            </div>
        </div>

            <table class="min w-full divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            <a href="{{route('anggota.index')}}">Anggota</a>
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            <a href="{{route('buku.index')}}">Buku</a>
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal Peminjaman</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal Pengembalian</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>

                    </tr>
                </thead>
                <tbody>
                @foreach ($pinjams as $pinjam )
                <tr class="table-row data-row">
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="">{{$pinjam->anggotas->nama}}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">{{$pinjam->bukus->judul}}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{$pinjam->tanggal_pinjam}}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{$pinjam->tanggal_kembali}}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex space-x-2">
                            <a href="{{route('pinjam.edit',$pinjam->id)}}" class="btn btn-warning btn-sm text-blue-500 hover:text-blue-700"><i class="fas fa-edit"></i></a>
                            <form action="{{route('pinjam.destroy',$pinjam->id)}}" method="POST" class="display:inline text-red-500 hover:text-red-700">
                                @csrf
                                @method('DELETE')
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
@endsection
