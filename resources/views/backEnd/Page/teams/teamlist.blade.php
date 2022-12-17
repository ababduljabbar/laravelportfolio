@extends('backEnd.master')
@section('content')
<main >
    <div class="container-fluid px-4">
        <h1 class="mt-4">Team List</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Team List</li>
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
                <th>Tw_Link</th>
                <th>Fb_Link</th>
                <th>Le_Link</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($teams as $team)
                <tr>
                    <td scope="row">{{ $team->id }}</td>
               
                    <td>{{ $team->title }}</td>
                    <td>{{ $team->sub_title }}</td>
                    <td>{{ $team->t_image }}</td>
                    <td>{{ $team->tw_link }}</td>
                    <td>{{ $team->fb_link }}</td>
                    <td>{{ $team->le_link }}</td>
                    <td>
                        <a href="{{ route('admin.team.edit',$team->id) }}" class="btn btn-success   " href=""> Edit </a>
             

                        <form action="{{ route('admin.team.delete', $team->id) }}"  method="POST">
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