@extends('backEnd.master')
@section('content')
<main >
    <div class="container-fluid px-4">
        <h1 class="mt-4">About List</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">About List</li>
        </ol>
    </div>
    <div class="About list">
        @if (session('success'))
        <div class="alert alert-success">
            
                    <div>{{ session('success') }}</div>
               
        </div>
        @endif
    <table class="table table-striped table-inverse table-responsive">
        <thead class="thead-inverse">
            <tr>
                <th>Id</th>
                <th>Time</th>
                <th>Title</th>
                <th>Image</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($abouts as $about)
                <tr>
                    <td scope="row">{{ $about->id }}</td>

                    <td>{{ $about->time }}</td>
                    <td>{{ $about->title }}</td>
                    <td>{{ $about->a_image }}</td>
                    <td scope="row">{{ $about->description }}</td>
                    <td>
                        <a href="{{ route('admin.about.edit',$about->id) }}" class="btn btn-success   " href=""> Edit </a>
             

                        <form action="{{ route('admin.about.delete', $about->id) }}" method="POST">
                           @csrf
                           @method('DELETE')
                            <input type="submit" name="submit" class="btn btn-danger" value="Delete">
                        
                        </form>

                    </td>
                   
                </tr>  
                @endforeach
        
            
            </tbody>
    </table>
    

        
    </div>
   
</main>


@endsection