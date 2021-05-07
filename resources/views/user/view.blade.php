@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>
                        Edit User
                    </h2>
                </div>
                <div class="card-body">
                    @include('customs.message')
                    <form action="{{route('user.update', $user->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="container">
                            <h3>
                               <h3>
                                Required data
                            </h3>
                            <div class="form-group">
                                <input class="form-control" id="name" name="name" placeholder="name" type="text" value="{{old('name', $user->name)}}" disabled="">
                                </input>
                            </div>
                            <div class="form-group">
                                <input class="form-control" id="email" name="email" placeholder="Email" type="text" value="{{old('email', $user->email)}}" disabled="">
                                </input>
                            </div>
                             <div class="form-group">
                               <select disabled="" class="form-control" name="roles" id="roles">
                                @foreach($roles as $role)
                                   <option value="{{$role->id}}"  @isset($user->roles[0]->name)
                                    @if($role->name==$user->roles[0]->name)
                                    selected
                                    @endif
                                    @endisset>

                                    {{$role->name}}</option>
                                @endforeach
                               </select>
                            </div>
                             <hr>

                                <hr>

                                    <a href="{{route('user.edit',$user->id)}}" class="btn btn-success" >Edit</a>
                                    <a href="{{route('user.index')}}" class="btn btn-danger" >Back</a>
                                    </input>
                                </hr>
                            </br>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection