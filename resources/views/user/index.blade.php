@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    List of Users
                </div>
                <div class="card-body">
                    <a class="btn btn-primary float-right" href="">
                        Create
                    </a>
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
                                    Email
                                </th>
                                <th scope="col">
                                   Role(S)
                                </th>

                                <th colspan="3">
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <th scope="row">
                                    {{$user->id}}
                                </th>
                                <td>
                                    {{$user->name}}
                                </td>
                                <td>
                                    {{$user->email}}
                                </td>
                                <td>
                                    @isset($user->roles[0]->name)
                                    {{$user->roles[0]->name}}
                                    @endisset
                                </td>
                                <td>
                                    {{$user['full-access']}}
                                </td>
                                  @can('view',[$user, ['user.show','userown.show']])
                                <td>
                                    <a class="btn btn-info" href="{{route('user.show', $user->id)}}">
                                        Show
                                    </a>
                                </td>
                                 @endcan
                                  @can('update',[$user, ['user.edit','userown.edit']])
                                <td>
                                    <a class="btn btn-success" href="{{route('user.edit', $user->id)}}">
                                        Edit
                                    </a>
                                </td>
                                 @endcan
                                 @can('haveaccess','user.destroy')
                                <td>
                                    <form action="{{route('user.destroy', $user->id)}}" method="POST">
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
                    {{$users->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
