@extends('layouts.app')
@section('content')

<div class="flex-1 overflow-auto">

    <div class="bg-white rounded-lg shadow-md p-6 mb-6">
        <div class="flex items-center mb-4">
            <i class="fas fa-user text-blue-500 text-xl mr-2"></i>
            <h2 class="text-xl font-semibold text-gray-800">Daftar Buku</h2>
        </div>
        <div class="flex items-center mb-6">
            <i class="fas fa-house text-gray-800 mr-2 text-xl"></i>
            <a href="{{route('dashboard')}}" class="text-xl font-semibold text-gray-800">Dashboard</a>
        </div>

        <div class="flex justify-between items-center mb-6">
            <a href="{{route('anggota.create')}}" class="bg-blue-500 hover:bg-blue-600 text-white px-7 py-4 rounded-lg flex items-center">
                <i class="fas fa-user mr-2"></i>Register New Member
            </a>
        </div>
        <div class="bg-white  shadow rounded-lg overflow-hidden mb-6">
            <div class="p-4 border-b border-gray-200 flex justify-between items-center">
                <div class="flex items-center space-x-4">
                     <div class="relative">
                        <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                        <form method="GET" class="mb3">
                        <input type="text" name="cari" value="{{ request('cari') }}" placeholder="Search Members" class="pl-10 pr-4 py-2 border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 form-control">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text xs font-medium text-gray-500 uppercase tracking-wider">Nama & Alamat</th>
                    <th scope="col" class="px-6 py-3 text-left text xs font-medium text-gray-500 uppercase tracking-wider">Telepon</th>
                    <th scope="col" class="px-6 py-3 text-left text xs font-medium text-gray-500 uppercase tracking-wider">Tanggal Lahir</th>
                    <th scope="col" class="px-6 py-3 text-left text xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($anggotas as $anggota )
                <tr class="table-row data-row">
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm font-medium text-gray-900">{{$anggota->nama}}</div>
                        <div class="text-sm text-gray-500">{{ $anggota->alamat}}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">{{$anggota->nohp}}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{$anggota->tgl_lahir}}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex space-x-2 ml-4">
                            <a href="{{ route('anggota.edit', $anggota->id ) }}" class="btn btn-warning btn-sm text-blue-500 hover:text-blue_700"><i class="fas fa-edit"></i></a>
                            <form action="{{ route('anggota.destroy', $anggota->id) }}" method="POST" class="display:inline text-red-500 hover:text-red-700">
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
@endsection
