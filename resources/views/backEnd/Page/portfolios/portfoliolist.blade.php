@extends('backEnd.master')
@section('content')
<main >
    <div class="container-fluid px-4">
        <h1 class="mt-4">Portfolios List</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Portfolios List</li>
        </ol>
    </div>
    <div class="portfolios list">
        @if (session('success'))
        <div class="alert alert-success">
            
                    <div>{{ session('success') }}</div>
               
        </div>
        @endif
    <table class="table table-striped table-inverse table-responsive">
        <thead class="thead-inverse">
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th>Sub Title</th>
                <th>Image</th>
                <th>Description</th>
                <th>Client</th>
                <th>Category</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($portfolios as $portfolio)
                <tr>
                    <td scope="row">{{ $portfolio->id }}</td>
               
                    <td>{{ $portfolio->title }}</td>
                    <td>{{ $portfolio->sub_title }}</td>
                    <td>{{ $portfolio->p_image }}</td>
                    <td>{{ $portfolio->description }}</td>
                    <td>{{ $portfolio->client }}</td>
                    <td>{{ $portfolio->category }}</td>
                    <td>
                        <a href="{{ route('admin.portfolio.edit',$portfolio->id) }}" class="btn btn-success   " href=""> Edit </a>
             

                        <form action="{{ route('admin.portfolio.delete', $portfolio->id) }}"  method="POST">
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