@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>
                        Create Role
                    </h2>
                </div>
                <div class="card-body">
                    @include('customs.message')
                    <form action="{{route('role.store')}}" method="POST">
                        @csrf
                        <div class="container">
                            <h3>
                                Required data
                            </h3>
                            <div class="form-group">
                                <input class="form-control" id="name" name="name" placeholder="name" type="text" value="{{old('name')}}">
                                </input>
                            </div>
                            <div class="form-group">
                                <input class="form-control" id="slug" name="slug" placeholder="Slug" type="text" value="{{old('slug')}}">
                                </input>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" id="description" name="description" placeholder="Description" rows="3">
                                    {{old('description')}}
                                </textarea>
                            </div>
                            <hr>
                            </hr>
                            <h3>
                                Full access
                            </h3>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input  @if(old('full-access')=="yes") checked  @endif class="custom-control-input" id="full-accessyes" name="full-access" type="radio" value="yes">
                                    <label class="custom-control-label" for="full-accessyes">
                                        Yes
                                    </label>
                                </input>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input  class="custom-control-input" id="full-accessno" name="full-access" type="radio" value="no"  @if(old('full-access')=="no") checked  @endif
                                 @if(old('full-access')=== null) checked  @endif>
                                    <label class="custom-control-label" for="full-accessno">
                                        No
                                    </label>
                                </input>
                            </div>
                            <br>
                                <h3>
                                    Permission List
                                </h3>
                                @foreach($permissions as $permission )
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" id="permission_{{$permission->id}}" name="permission[]" type="checkbox" value="{{$permission->id}}" @if(is_array(old('permission'))&& in_array("$permission->id",old('permission')) )checked  @endif>
                                        <label class="custom-control-label" for="permission_{{$permission->id}}">
                                            {{$permission->id}}
                                            -
                                            {{$permission->name}}
                                            <em>
                                                ({{$permission->description}})
                                            </em>
                                        </label>
                                    </input>
                                </div>
                                @endforeach()
                                <hr>
                                    <input class="btn btn-primary" name="" type="submit" value="Guardar">
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
