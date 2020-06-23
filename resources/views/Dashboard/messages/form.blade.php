<div class="row">

  @php
  $input = 'name';
  @endphp

  <div class="col-md-6">
    <div class="form-group bmd-form-group">
      {{-- <label class="bmd-label-floating"> Name </label> --}}
      <h5>Name : </h5>
      <p>{{ isset($message) ? $message->{$input}  : "" }}</p>

    </div>
  </div>

  @php
  $input = 'email';
  @endphp

  <div class="col-md-6">
    <div class="form-group bmd-form-group">
      <h5>Email : </h5>
      <p>{{ isset($message) ? $message->{$input}  : "" }}</p>

    </div>
  </div>



  @php
  $input = 'message';
  @endphp
  <div class="col-md-12">
    <div class="form-group bmd-form-group">
      <h5>Message : </h5>
      <p>{{ isset($message) ? $message->{$input}  : "" }}</p>

    </div>
  </div>
</div>

<hr>

<h4>Replay on Message</h4>

<br>

<form action="{{ route('message.replay' , $message->id) }}" method="post">
  @csrf

  @php
  $input = 'message';
  @endphp
  <div class="col-md-12">
    <div class="form-group bmd-form-group">
      <label class="bmd-label-floating"> Message </label>
      <textarea name="{{ $input }}" cols="30" rows="5" class="form-control">{{ old($input) }}</textarea>

      @error($input)
      <span class="invalid-feedback" role="alert" style="display:inline">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>
  </div>

  <button type="submit" class="btn btn-primary pull-right">
    Replay {{$moduleName}}
  </button>
</form>