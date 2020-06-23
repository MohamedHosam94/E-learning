<br>
<div class="card text-left" id="profileCard" style="display:none">
  <div class="card-header">
    <h5>Update Profile</h5>
  </div>
  <div class="card-body">

    <form action="{{ route('profile.update') }}" method="post">
      @csrf

      <div class="row">

        <div class="col-md-6">
          <div class="form-group bmd-form-group">
            <label class="bmd-label-floating"> Username </label>
            <input type="text" name="name" value="{{ isset($userProfile) ? $userProfile->name  : "" }}"
              class="form-control">

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
            <input type="email" name="email" value="{{ isset($userProfile) ? $userProfile->email  : "" }}"
              class="form-control">

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

      </div>
      <button type="submit" class="btn btn-primary pull-right">Update Profile</button>

      <div class="clearfix"></div>

    </form>
  </div>
</div>