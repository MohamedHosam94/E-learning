@php
$input = 'comment';
@endphp
<div class="col-md-12">
<div class="form-group bmd-form-group">
<label class="bmd-label-floating"> Comments </label>
<textarea name="{{ $input }}"  cols="30" rows="2" class="form-control">{{ 
isset($video) ? $video->{$input}  : old($input) }}</textarea>
  
    @error($input)
    <span class="invalid-feedback" role="alert" style="display:inline">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>
</div>