@extends('layouts.app')
@section('menu')

<div class="flex-1 overflow-auto">

    <div class="bg-white rounded-lg shadow-md p-6 mb-6">
            <div class="flex items-center mb-4">
                <a href="{{route('buku.index')}}" class="fas fa-book text-blue-500 text-xl mr-2"></a>
                <h2 class="text-xl font-semibold text-gray-800">{{isset ($bukus) ? 'Edit' : 'Tambah'}} Buku</h2>
            </div>
     <form action="{{isset ($buku) ? route('buku.update',$buku->id) : route('buku.store') }}" method="POST">
            @csrf
            @if (isset($buku)) @method('PUT') @endif

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-gray-700 mb-2" for="book-title">Title</label>
                <input type="text" name="judul" id="judul" value="{{$buku->judul ??''}}" class="w-full px-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500" required>
            </div>
            <div >
                <label class="block text-gray-700 mb-2" for="book-author">Author</label>
                <input type="text" name="pengarang" id="pengarang" value="{{$buku->pengarang ?? ''}}" class="w-full px-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500" required>
            </div>
            <div >
                <label class="block text-gray-700 mb-2" for="book-published">Published Year</label>
                <input type="date" name="tahun_terbit" id="{{$buku->tahun_terbit ?? ''}}" class="w-full px-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500" required>
            </div>
            <div>
                <label class="block text-gray-700 mb-2" for="book-category">Category</label>
                <select name="jenis_buku" id="jenis_buku" value={{$buku->jenis_buku ?? ''}} class="border broder-gray-300 rounded-lg px-3 py-4 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                    <option value="">All Categories</option>
                    <option value="">Select Category</option>
                        <option value="Fiction">Fiction</option>
                        <option value="Non-Fiction">Non-Fiction</option>
                        <option value="Science">Science</option>
                        <option value="History">History</option>
                </select>
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
