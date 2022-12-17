@extends('backEnd.master')
@section('content')
<main >
    <div class="container-fluid px-4">
        <h1 class="mt-4">Portfolios Create</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Portfolios Create</li>
        </ol>
    </div>
    <div class="upload-form">
         
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (session('error'))
        <div class="alert alert-danger">
            
                    <li>{{ session('error') }}</li>
               
        </div>
        @endif
        @if (session('success'))
        <div class="alert alert-success">
            
                    <div>{{ session('success') }}</div>
               
        </div>
        @endif


        <form method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')




            <div class="mb-3">
              <label for="title" class="form-label">Title</label>
              <input type="text" name="title" id="" value=" "  class="form-control" placeholder="" aria-describedby="helpId">
            </div>
            <div class="mb-3 mt-4">
                <label for="sub_title" class="form-label">Sub Title</label>
                <input type="text" name="sub_title" id="" value=" " class="form-control" placeholder="" aria-describedby="helpId">
              </div>
              <div class="mb-3 mt-4">
                <label for="p_image" class="form-label">Image</label>
                <input type="file" name="p_image" id="" value=" " class="form-control" placeholder="" aria-describedby="helpId">
              </div>
              <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" class="form-control" id="" cols="30" rows="10"></textarea>
              </div>
              <div class="mb-3 mt-4">
                <label for="client" class="form-label">Client Name </label>
                <input type="text" name="client" id="" value=" " class="form-control" placeholder="" aria-describedby="helpId">
              </div>
              <div class="mb-3 mt-4">
                <label for="category" class="form-label">Category</label>
                <input type="text" name="category" id="" value=" " class="form-control" placeholder="" aria-describedby="helpId">
              </div>
              <input type="submit" class="btn-success" value="Create">
        </form>
    </div>
   
</main>


@endsection