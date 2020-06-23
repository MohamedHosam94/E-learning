<div class="row">

  @php
      $input = 'name';
  @endphp

    <div class="col-md-6">
      <div class="form-group bmd-form-group">
        <label class="bmd-label-floating"> Tag Title </label>
      <input type="text" name="{{ $input }}" 
      value="{{ isset($tag) ? $tag->{$input}  : old($input) }}" class="form-control">

          @error($input)
          <div class="invalid-feedback" role="alert" style="display:inline">
              <strong>{{ $message }}</strong>
          </div>
          @enderror

      </div>
    </div>

  </div>