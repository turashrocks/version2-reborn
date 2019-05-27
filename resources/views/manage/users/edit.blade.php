@extends('layouts.manage')

@section('content')
    <div class="box"  style="border: none; border-radius: 0px;">
      <div class="container">
        <div class="columns">
          <div class="column">
            <h1 class="title">Edit Users</h1>
          </div>
        </div>

        <form action="{{route('users.update', $user->id)}}" method="POST">
          {{method_field('PUT')}}
          {{csrf_field()}}

            <div class="columns" id="rSelected">
              <div class="column">
                  <div class="field">
                    <label for="name" class="label">Name:</label>
                    <p class="control">
                      <input type="text" class="input" name="name" id="name" value="{{$user->name}}">
                    </p>
                  </div>

                  <div class="field">
                    <label for="email" class="label">Email:</label>
                    <p class="control">
                      <input type="text" class="input" name="email" id="email" value="{{$user->email}}">
                    </p>
                  </div>
                </div>

                <div class="column">
                  <label for="roles" class="label">Roles:</label>
                  <input type="hidden" name="roles" :value="rolesSelected" />
        
                  <!--<b-checkbox-group v-model="rolesSelected">-->
                    {{-- @foreach ($roles as $role) --}}
                      <!--<div class="field">
                        <b-checkbox :custom-value="{{--{{$role->id}}">{{$role->display_name}}--}}</b-checkbox>
                      </div>-->
                    {{-- @endforeach --}}
                  <!--</b-checkbox-group>-->
                    @foreach($roles as $role)
                      <div class="form-check pt-1">
                        <h5 class="form-check-label" >
                          <input class="form-check-input" type="checkbox" name="roles[]" value="{{$role->id}}"
                          @if ($user->roles->contains($role->id)) checked='checked' @endif>
                          {{$role->display_name}}
                        </h5>
                      </div>
                    @endforeach

                </div>
            </div>

            <div class="columns">
              <div class="column">
                <hr/>
                <button class="button is-primary">Save</button>
              </div>
            </div>
           </form>
        </div>
      </div>
  </div> 
@endsection


@section('scripts')
  <script>

    // var app = new Vue({
    //   el: '#app',
    //   data: {
    //     rolesSelected: {!! $user->roles->pluck('id') !!}
    //   }
    // });

    var rSelected = new Vue({
    el: '#rSelected',
    data: {
      rolesSelected: {!!$user->roles->pluck('id')!!}
    }
    });

  </script>
@endsection
