@extends('backEnd.master')
@section('content')
<main >
    <div class="container-fluid px-4">
        <h1 class="mt-4">Service List</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Service List</li>
        </ol>
    </div>
    <div class="service list">
        @if (session('success'))
        <div class="alert alert-success">
            
                    <div>{{ session('success') }}</div>
               
        </div>
        @endif
    <table class="table table-striped table-inverse table-responsive">
        <thead class="thead-inverse">
            <tr>
                <th>Id</th>
                <th>Icon Name</th>
                <th>Title</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($services as $service)
                <tr>
                    <td scope="row">{{ $service->id }}</td>
                    <td>{{ $service->icon }}</td>
                    <td>{{ $service->title }}</td>
                    <td scope="row">{{ $service->description }}</td>
                    <td>
                        <a href="{{ route('admin.service.edit',$service->id) }}" class="btn btn-success   " href=""> Edit </a>
             

                        <form action="{{ route('admin.service.delete', $service->id) }}" method="POST">
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