<div class="section text-center">
    <div class="container">
      <div class="row">
        <div class="col-md-8 ml-auto mr-auto">
          <h2 class="title">Latest Videos</h2>
          <h5 class="description">Keep Learning , latest videos based on publish day</h5>   
        </div>
      </div>
      <br>
      <br>

      @include('frontend.shared.video-row')

      <br>
       <a href="{{ route('home') }}" class="btn btn-danger btn-round">More Videos</a>
    </div>
  </div>