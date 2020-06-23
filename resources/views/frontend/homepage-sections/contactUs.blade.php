<div class="section landing-section">
  <div class="container">
    <div class="row">
      <div class="col-md-8 ml-auto mr-auto" id="contact-us">
        <h2 class="text-center">Keep in touch?</h2>
        
        <form class="contact-form" action=" {{ route('contactUs.store') }} " method="POST">
        @csrf
        <div class="row">
          <div class="col-md-6">
            <label>Name</label>
            @php
            $input = 'name'
            @endphp
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="nc-icon nc-single-02"></i>
                </span>
              </div>
            <input type="text" name="{{ $input }}" required class="form-control" placeholder="Name" value="{{ old($input) }}">
              @error($input)
              <div class="invalid-feedback" role="alert" style="display:inline">
                <strong>{{ $message }}</strong>
              </div>
              @enderror
            </div>
          </div>
          <div class="col-md-6">
            <label>Email</label>
            @php
            $input = 'email'
            @endphp
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="nc-icon nc-email-85"></i>
                </span>
              </div>
            <input type="email" name="{{ $input }}" required class="form-control" placeholder="Email" value="{{ old($input) }}">
              @error($input)
              <div class="invalid-feedback" role="alert" style="display:inline">
                <strong>{{ $message }}</strong>
              </div>
              @enderror
            </div>
          </div>
        </div>
        <label>Message</label>
        @php
        $input = 'message'
        @endphp
        <textarea class="form-control" name="{{ $input }}" required rows="4"
      placeholder="Tell us your thoughts">{{ old($input) }}</textarea>

        @error($input)
        <div class="invalid-feedback" role="alert" style="display:inline">
          <strong>{{ $message }}</strong>
        </div>
        @enderror

        <div class="row">
          <div class="col-md-4 ml-auto mr-auto">
            <button class="btn btn-danger btn-lg btn-fill">Send Message</button>
          </div>
        </div>
        </form> 
      </div>
    </div>
  </div>
</div>