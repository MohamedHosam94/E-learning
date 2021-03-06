<div class="row">

  @php
      $input = 'name';
  @endphp

    <div class="col-md-6">
      <div class="form-group bmd-form-group">
        <label class="bmd-label-floating"> Category Title </label>
      <input type="text" name="{{ $input }}" 
      value="{{ isset($category) ? $category->{$input}  : old($input) }}" class="form-control">

          @error($input)
          <div class="invalid-feedback" role="alert" style="display:inline">
              <strong>{{ $message }}</strong>
          </div>
          @enderror

      </div>
    </div>

    @php
      $input = 'meta_keywords';
    @endphp

    <div class="col-md-6">
      <div class="form-group bmd-form-group">
        <label class="bmd-label-floating"> Meta keywords </label>
        <input type="text" name="{{ $input }}" 
        value="{{ isset($category) ? $category->{$input}  : old($input) }}" class="form-control">

          @error($input)
          <span class="invalid-feedback" role="alert" style="display:inline">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
      </div>
    </div>

    @php
        $input = 'meta_des';
    @endphp
    <div class="col-md-6">
      <div class="form-group bmd-form-group">
        <label class="bmd-label-floating"> Meta Description </label>
        <textarea name="{{ $input }}"  cols="30" rows="10" class="form-control">{{
         isset($category) ? $category->{$input}  : old($input) }}</textarea>
          
            @error($input)
            <span class="invalid-feedback" role="alert" style="display:inline">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
      </div>
    </div>
  </div>