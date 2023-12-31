    @extends('layouts.admin')
    @section('header', 'Catalog')
    
    @section('content')
        <div class="row">
    <div class="col-12">
    <div class="card">
    <div class="card-header">
    <a href="{{url('catalogs/create')}}" class="btn btn-sm btn-primary pull-left">Create New Katalog</a>

    <div class="card-tools">
    <div class="input-group input-group-sm" style="width: 150px;">
    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
    <div class="input-group-append">
    <button type="submit" class="btn btn-default">
    <i class="fas fa-search"></i>
    </button>
    </div>
    </div>
    </div>
    </div>

    <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
    <thead>
    <tr>
    <th class="text-center">ID</th>
    <th class="text-center" >Name</th>
    <th class="text-center" >Jumlah Book</th>
    <th class="text-center">Creat At</th>
    <th class="text-center">Updated At</th>
    <th class="text-center">Action </th>

    </tr>
    </thead>
    <tbody>
        @foreach($catalogs as $key =>$catalog)
    <tr>
    <td class="text-center">{{$key+1}}</td>  
    <td class="text-center">{{$catalog->name}}</td>  
    <td class="text-center">{{count($catalog->books) }}</td>  
    <td class="text-center">{{date ('H:i:s - d M Y' , strtotime($catalog->created_at))}}</td>
    <td class="text-center">{{date ('H:i:s - d M Y' , strtotime($catalog->updated_at))}}</td>
    <td class="text-center d-flex align-items-center justify-content-center">
    <a href="{{url ('catalogs/' .$catalog->id. '/edit')}}" class="btn btn-warning btn-sm mr-2">Edit</a>
    {{-- <a href="{{url('catalogs', ['id' => $catalog->id])}}" method="post">
        <input class="btn btn-danger btn-sm my-2 " type="submit" value="Delete" onclick="return confirm ('Apakah anda ingin menghapus data ini?')">
        @method('delete')
        @csrf --}}
    <form action="{{url('catalogs', ['id' => $catalog->id])}}" method="POST">
        @method('delete')
        <input class="btn btn-danger btn-sm my-2 " type="submit" value="Delete" onclick="return confirm ('Apakah anda ingin menghapus data ini?')">
        @csrf
    </form>
    </td>
    </tr>

    @endforeach
    </tbody>
    </table>
    </div>

    </div>

    </div>
    </div>

    @endsection