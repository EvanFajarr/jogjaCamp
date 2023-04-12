@extends('template.template') 
@section('konten')
<form action='{{ url('category/'.$category->id) }}'  method='post'>
    @include('pesan.pesan')
    <a href='{{url('category')}}' class="btn btn-outline-success">Kembali</a> 
    @csrf
    @method('PUT')
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <a href='{{url('category')}}' class="btn btn-outline-succes">Kembali</a> 
        <div class="mb-3 row">
            <label for="id" class="col-sm-2 col-form-label">Id</label>
            <div class="col-sm-10">
            {{$category->id}}
            </div>
        </div>
        <div class="mb-3 row">
            <label for="name" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='name' value="{{$category->name}}" id="kabupaten">
            </div>
        </div>



        <div class="mb-6">
            <label class="block">
                <span class="">Status</span>
                <input type="checkbox" name="is_publish" {{ $category->category==1?'checked':'' }}/>
            </label>
        </div>



        <div class="mb-3 row">
            <label for="tahun" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
        </div>
    
    </div>
</form>
@endsection