@extends('backEnd.master')
@section('content')
<main >
    <div class="container-fluid px-4">
        <h1 class="mt-4">Main Page</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Main</li>
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


        <form action="{{ route('admin.main') }}" method="POST"  enctype="multipart/form-data">
              @csrf
              @method('put')
            <div class="bc-img">
                <h2> BackGround Image </h2>
                <img src="{{ asset( $main->bg_image) }}" alt="" height="250px"> <br>
                <input type="file" name="bg_image" class="mt-3" id="">
            </div>
            <div class="mb-3 mt-4">
                <label for="sub-title" class="form-label">Sub Title</label>
                <input type="text" name="sub_title" id="" value="{{ $main->sub_title }}" class="form-control" placeholder="" aria-describedby="helpId">
              </div>
            <div class="mb-3">
              <label for="title" class="form-label">Title</label>
              <input type="text" name="title" id="" value="{{ $main->title }}"  class="form-control" placeholder="" aria-describedby="helpId">
            </div>
            <div class="mb-3">
                <label for="button_text" class="form-label">Button Text</label>
                <input type="text" name="button_text" id="" value="{{ $main->button_text }}"  class="form-control" placeholder="" aria-describedby="helpId">
              </div>
              <div class="mb-3">
                <label for="button_link" class="form-label">Button Link</label>
                <input type="text" name="button_link" id=""value="{{ $main->button_link }}"   class="form-control" placeholder="" aria-describedby="helpId">
              </div>
              <input type="submit" class="btn-success" value="Update">
        </form>
    </div>
   
</main>


@endsection