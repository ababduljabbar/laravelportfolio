@extends('backEnd.master')
@section('content')
<main >
    <div class="container-fluid px-4">
        <h1 class="mt-4">Team Edit</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Team Edit</li>
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
              @method('PATCH')


              <div class="mb-3">
              <label for="title" class="form-label">Title</label>
              <input type="text" name="title" id="" value="{{ $team->title }}"  class="form-control" placeholder="" aria-describedby="helpId">
            </div>
            <div class="mb-3 mt-4">
                <label for="sub_title" class="form-label">Sub Title</label>
                <input type="text" name="sub_title" id="" value="{{ $team->sub_title }} " class="form-control" placeholder="" aria-describedby="helpId">
              </div>
              <div class="mb-3 mt-4">
                <label for="t_image" class="form-label">Image</label>
                <input type="file" name="t_image" id=""   class="form-control" placeholder="" aria-describedby="helpId">
              </div>
              <div class="mb-3">
                <label for="tw_link" class="form-label">Twitter Link</label>
                <input type="text" name="tw_link" id="" value="{{ $team->tw_link }}" class="form-control" placeholder="" aria-describedby="helpId">
              </div>
              <div class="mb-3">
                <label for="fb_link" class="form-label">Facebook Link</label>
                <input type="text" name="fb_link" id="" value="{{ $team->fb_link }}" class="form-control" placeholder="" aria-describedby="helpId">
              </div>
              <div class="mb-3">
                <label for="le_link" class="form-label">Linkend Link</label>
                <input type="text" name="le_link"  value="{{ $team->le_link }}" class="form-control" placeholder="" aria-describedby="helpId">
              </div>
              <input type="submit" class="btn-success" value="Update">

        </form>
    </div>
   
</main>


@endsection