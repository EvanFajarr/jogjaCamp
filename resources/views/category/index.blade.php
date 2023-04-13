
  

@extends('layouts.app')
@section('content')  
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Data Category') }}</div>
                <div class="card-body">
                    @include('pesan.pesan')
        <!-- START category -->
        <div class="my-3 p-3 bg-body rounded shadow-sm">
                <!-- FORM PENCARIAN -->
                <div class="pb-3">
                  <form class="d-flex" action="{{'category'}}" method="get">
                      <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Search" aria-label="Search">
                      <button class="btn btn-secondary" type="submit">Search</button>
                  </form>
                </div>
                <!-- TOMBOL TAMBAH category -->
                <div class="pb-3">
                  <a href='/category/create' class="btn btn-primary"> Tambah category</a>
                </div>

                
          
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="col-md-1">No</th>
                            <th class="col-md-1">Id</th>
                            <th class="col-md-3">Name</th>
                            <th class="col-md-4">Ispublish</th>
                            <th class="col-md-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = $category->firstItem()?>
                        @foreach ($category as $item)
                      
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$item->id}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->is_publish}}</td>
                            <td>
                                <a href= '{{url('category/'.$item->id.'/edit')}}'  class="btn btn-warning btn-sm">Edit</a>
                                <form onsubmit="return confirm('Yakin mau menghapus data?')" class='d-inline' action="{{ url('category/'.$item->id) }}" method="post">
                                    @csrf 
                                    @method('DELETE')
                                    <button type="submit" name="submit" class="btn btn-danger btn-sm">Del</button>
                                </form>
                            </td>
                        </tr>
                              <?php $i++ ?>
                        @endforeach
                    </tbody>
                </table>
               {{$category->links()}}
          </div>
                </div>
            </div>
        </div>
    </div>
</div>
        
          @endsection