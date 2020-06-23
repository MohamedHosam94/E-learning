<div class="row">
    <div class="col-md-6">
      <div class="form-group bmd-form-group">
        <label class="bmd-label-floating"> Username </label>
      <input type="text" name="name" value="{{ isset($user) ? $user->name  : old('name') }}" class="form-control">

          @error('name')
          <div class="invalid-feedback" role="alert" style="display:inline">
              <strong>{{ $message }}</strong>
          </div>
          @enderror

      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group bmd-form-group">
        <label class="bmd-label-floating"> Email </label>
        <input type="email" name="email" value="{{ isset($user) ? $user->email  : old('email') }}" class="form-control">

          @error('email')
          <span class="invalid-feedback" role="alert" style="display:inline">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group bmd-form-group">
        <label class="bmd-label-floating"> Password </label>
        <input type="password" name="password" class="form-control">
          
            @error('password')
            <span class="invalid-feedback" role="alert" style="display:inline">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
      </div>
    </div>

    
      @php
      $input = 'group';
    @endphp

    <div class="col-md-6">
      <div class="form-group bmd-form-group">
        <label class="bmd-label-floating"> User Group </label>

        <select name="{{ $input }}" class="form-control" >
            
        <option value="admin" {{ isset($user) && $user->{$input} == 'admin' ? 'selected' : '' }} >admin</option>
        
        <option value="user" {{ isset($user) && $user->{$input} == 'user' ? 'selected' : '' }} >user</option>
                    
        </select>

          @error($input)
          <span class="invalid-feedback" role="alert" style="display:inline">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
      </div>
    </div>

  </div>