@extends('template.template') 
@section('konten')
<form action='{{ url('category') }}'  method='post'>

    @csrf
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <a href='{{url('category')}}' class="btn btn-outline-success">Kembali</a> 
        @include('pesan.pesan')
        <div class="mb-3 row">
            <label for="name" class="col-sm-2 col-form-label">Catgeory Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='name' value="{{Session::get('name')}}" id="name">
            </div>
        </div>
        <div class="mb-3 row">
            <label class="block">
                <span class="">Status</span> 
                <div class="col-sm-10">
                <input type="checkbox" name="is_publish" />
                </div>
            </label>
        </div>
        
        <div class="mb-3 row">
            <label for="tahun" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
        </div>
    
    </div>
   
</form>

@endsection