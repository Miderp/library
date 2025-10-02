@extends('layouts.app')

@section('content')

    <div class="flex-1 overflow-auto">
        <div class="bg-white rounded-lg shaodw-md p-6 mb-6">
            <div class="flex items-center mb-4">
                <a href="{{route('pinjam.index')}}" class="fas fa-exchange-alt text-yellow-500 text-xl"></a>
                <h2 class="text-xl font-semibold text-gray-800">{{ isset($pinjams) ? 'Tambah' : 'Edit' }} Data Peminjaman</h2>
            </div>
            <div class="flex items-center mb-5">
                <a href={{route('dashboard')}} class="text-xl font-semibold text-gray-800">Dashboard</a>
            </div>
            <form action="{{ isset($pinjams) ? route('pinjam.update', $pinjams->id) : route('pinjam.store') }}" method="POST">
                @csrf
                @if (isset($pinjams))
                @method('PUT')
                @endif

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                <label class="block text-gray-700 mb-2" for="member-title">Anggota</label>
                <select name="anggotas_id" id="anggotas_id" class="w-full px-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500 form-control" required>
                    <option value="">Pilih Anggota</option>
                    @foreach($anggotas as $a)
                        <option value="{{ $a->id }}" {{ (isset($pinjams) && $pinjams->anggotas_id == $a->id) ? 'selected' : '' }}>
                            {{ $a->nama }}
                        </option>
                    @endforeach
                </select>
                </div>


                <div>
                    <label class="block text-gray-800 mb-2" for="books-title">Buku</label>
                    <select name="bukus_id" id="bukus_id" class="form-control w-full px-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500" required>
                        <option value="">Pilih Buku</option>
                        @foreach($bukus as $b)
                            <option value="{{ $b->id }}" {{ (isset($pinjams) && $pinjams->bukus_id == $b->id) ? 'selected' : '' }}>
                                {{ $b->judul }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-gray-800 mb-2" for="tanggal_pinjam">Tanggal Pinjam</label>
                    <input type="date" name="tanggal_pinjam" id="tanggal_pinjam"
                        value="{{ isset($pinjams) ? $pinjams->tanggal_pinjam->format('Y-m-d') : '' }}"
                        class="form-control w-full px-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500" required>
                </div>

                <div>
                        <label class="block text-gray-800 mb-2" for="tanggal_kembali">Tanggal Kembali</label>
                        <input type="date" name="tanggal_kembali" id="tanggal_kembali"
                            value="{{ isset($pinjams) && $pinjams->tanggal_kembali ? $pinjams->tanggal_kembali->format('Y-m-d') : '' }}"
                            class="form-control w-full px-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500" required>
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
