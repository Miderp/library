@extends('layouts.app')

@section('content')

<div class="flex-1 overflow-auto">

    <div class="bg-white rounded-lg shadow-md p-6 mb-6">
        <div class="flex items-center mb-4">
            <a href="{{route('anggota.index')}}" class="fas fa-user text-blue-500 text-xl mr-2"></a>
            <h2 class="text-xl font-semibold text-gray-800">{{isset ($anggota) ? 'Tambah' : 'Edit'}} Anggota</h2>
        </div>
        <form action="{{isset ($anggota) ? route('anggota.update',$anggota->id) : route('anggota.store')}}" method="GET">
            @csrf
            @if (isset($anggota))
            @method('GET')
            @endif
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-gray-700 mb-2" for="member-title">Nama</label>
                <input type="text" name="nama" id="nama" value="{{$anggota->nama ??''}}" class="w-full px-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500" required>
            </div>
            <div >
                <label class="block text-gray-700 mb-2" for="member-author">Alamat</label>
                <input type="text" name="alamat" id="alamat" value="{{$anggota->alamat ?? ''}}" class="w-full px-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500" required>
            </div>
            <div>
                <label class="block text-gray-700 mb-2" for="member-date">Tanggal Lahir</label>
                <input type="date" name="tgl_lahir" id="tgl_lahir" value="{{$anggota->tgl_lahir ?? ''}}" class="w-full px-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500" required>
            </div>
            <div>
                <label class="block text-gray-700 mb-2" for="member-number">No Hp</label>
                <input type="tel" name="nohp" id="nohp" value="{{$anggota->nohp ?? ''}}" class="w-full px-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500" required>
            </div>
        </div>


        <button type="submit" class="px-6 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">Simpan</button>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
             @endif
         </form>
    </div>
</div>
@endsection
