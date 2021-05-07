@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    List of Roles
                </div>
                <div class="card-body">
@can('haveaccess','role.store')
                    <a class="btn btn-primary float-right" href="{{route('role.create')}}">
                        Create
                    </a>
                    <br><br>
                    @endcan
                    @include('customs.message')
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">
                                    #
                                </th>
                                <th scope="col">
                                    name
                                </th>
                                <th scope="col">
                                    slug
                                </th>
                                <th scope="col">
                                    description
                                </th>
                                <th scope="col">
                                    full-access
                                </th>
                                <th colspan="3">
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($roles as $role)
                            <tr>
                                <th scope="row">
                                    {{$role->id}}
                                </th>
                                <td>
                                    {{$role->name}}
                                </td>
                                <td>
                                    {{$role->slug}}
                                </td>
                                <td>
                                    {{$role->description}}
                                </td>
                                <td>
                                    {{$role['full-access']}}
                                </td>
                                @can('haveaccess','role.show')
                                <td>
                                    <a class="btn btn-info" href="{{route('role.show', $role->id)}}">
                                        Show
                                    </a>
                                </td>
                                 @endcan
                                 @can('haveaccess','role.edit')
                                <td>
                                    <a class="btn btn-success" href="{{route('role.edit', $role->id)}}">
                                        Edit
                                    </a>
                                </td>
                                  @endcan
                                     @can('haveaccess','role.destroy')
                                <td>
                                    <form action="{{route('role.destroy', $role->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger"> Delete</button>
                                    </form>

                                </td>
                                 @endcan
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$roles->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
