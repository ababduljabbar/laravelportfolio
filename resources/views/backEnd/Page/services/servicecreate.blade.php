@extends('backEnd.master')
@section('content')
<main >
    <div class="container-fluid px-4">
        <h1 class="mt-4">Service Create</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Service Create</li>
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


        <form   method="POST">
              @csrf
       
           
            <div class="mb-3 mt-4">
                <label for="icon" class="form-label">Icon</label>
                <input type="text" name="icon" id="" placeholder="fas fa-shopping-cart"  class="form-control" placeholder="" aria-describedby="helpId">
              </div>
            <div class="mb-3">
              <label for="title" class="form-label">Title</label>
              <input type="text" name="title" id="" class="form-control" placeholder="" aria-describedby="helpId">
            </div>
        
              <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" class="form-control" id="" cols="30" rows="10"></textarea>
              </div>
              <input type="submit" class="btn-success" value="Create">
        </form>
    </div>
   
</main>


@endsection