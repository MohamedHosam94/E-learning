<div class="row">

  @php
      $input = 'name';
  @endphp

    <div class="col-md-6">
      <div class="form-group bmd-form-group">
        <label class="bmd-label-floating"> Video Title </label>
      <input type="text" name="{{ $input }}" 
      value="{{ isset($video) ? $video->{$input}  : old($input) }}" class="form-control">

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
        value="{{ isset($video) ? $video->{$input}  : old($input) }}" class="form-control">

          @error($input)
          <span class="invalid-feedback" role="alert" style="display:inline">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
      </div>
    </div>


  @php
    $input = 'image';
  @endphp

  <div class="col-md-6" style="margin-bottom:20px" >
    <div>
      <label> Video Image </label>
      <input type="file" name="{{ $input }}">

        @error($input)
        <span class="invalid-feedback" role="alert" style="display:inline">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
  </div>



    @php
      $input = 'youtube';
    @endphp

    <div class="col-md-6" style="margin-bottom:20px">
      <div class="form-group bmd-form-group">
        <label class="bmd-label-floating"> Youtube URL </label>
        <input type="url" name="{{ $input }}" 
        value="{{ isset($video) ? $video->{$input}  : old($input) }}" class="form-control">

          @error($input)
          <span class="invalid-feedback" role="alert" style="display:inline">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
      </div>
    </div>


  @php
    $input = 'published';
  @endphp

  <div class="col-md-6">
    <div class="form-group bmd-form-group">
      <label class="bmd-label-floating"> Video Status </label>

      <select name="{{ $input }}" class="form-control" >
          
      <option value="1" {{ isset($video) && $video->{$input} == 1 ? 'selected' : '' }} >Published</option>
      
      <option value="0" {{ isset($video) && $video->{$input} == 0 ? 'selected' : '' }}>Hidden</option>
                  
      </select>

        @error($input)
        <span class="invalid-feedback" role="alert" style="display:inline">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
  </div>


  {{-- Check the category fetch data in edit controller  to make it more fast --}}

  @php
    $input = 'cat_id';
  @endphp

  <div class="col-md-6">
    <div class="form-group bmd-form-group">
      <label class="bmd-label-floating"> Video Category </label>
      
      <select name="{{ $input }}" class="form-control" >
          
        @foreach ($category as $cat)

        <option value="{{ $cat->id }}" {{ isset($video) && $video->{$input} == $cat->id ? 'selected' : '' }} >
            {{ $cat->name }} 
        </option>
                     
        @endforeach 
                  
      </select>

        @error($input)
        <span class="invalid-feedback" role="alert" style="display:inline">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
  </div>


    @php
        $input = 'des';
    @endphp
    <div class="col-md-12">
      <div class="form-group bmd-form-group">
        <label class="bmd-label-floating"> Video Description </label>
        <textarea name="{{ $input }}"  cols="30" rows="5" class="form-control">{{
         isset($video) ? $video->{$input}  : old($input) }}</textarea>
          
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
    <div class="col-md-12">
      <div class="form-group bmd-form-group">
        <label class="bmd-label-floating"> Meta Description </label>
        <textarea name="{{ $input }}"  cols="30" rows="2" class="form-control">{{ 
        isset($video) ? $video->{$input}  : old($input) }}</textarea>
          
            @error($input)
            <span class="invalid-feedback" role="alert" style="display:inline">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
      </div>
    </div>



    
  @php
  // we may use skills as array 'skills[]'
  $input = 'skills[]';
  @endphp

<div class="col-md-6">
  <div class="form-group bmd-form-group">
    <label class="bmd-label-floating"> Skills </label>
    
    <select name="{{ $input }}" class="form-control" multiple style="height:100px">
        
      @foreach ($skills as $skill)

      <option value="{{ $skill->id }}" 
        @if (isset( $selectedSkills ))
          {{ in_array( $skill->id , $selectedSkills) ? 'selected' : '' }} 
        @endif
      >
          {{ $skill->name }} 
      </option>
                   
      @endforeach
                    
    </select>

      @error($input)
      <span class="invalid-feedback" role="alert" style="display:inline">
          <strong>{{ $message }}</strong>
      </span>
      @enderror
  </div>
</div>




@php

$input = 'tags[]';
@endphp

<div class="col-md-6">
<div class="form-group bmd-form-group">
  <label class="bmd-label-floating"> Tags </label>
  
  <select name="{{ $input }}" class="form-control" multiple style="height:100px">
      
    @foreach ($tags as $tag)

    <option value="{{ $tag->id }}" 

      @isset($selectedTags)
        {{ in_array( $tag->id , $selectedTags) ? 'selected' : ''   }} 
      @endisset     
    >
        {{ $tag->name }} 
    </option>
      
          
    @endforeach
  
              
  </select>

    @error($input)
    <span class="invalid-feedback" role="alert" style="display:inline">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>
</div>




  </div>