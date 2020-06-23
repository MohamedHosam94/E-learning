
<form action="{{ route('comment.store') }}" method="POST">
  @csrf
  @include('Dashboard.comments.form')
  
  <input type="hidden" value="{{ $video->id }}" name="video_id">
  <button type="submit" class="btn btn-primary pull-right">
    Add Comment
  </button>

  <div class="clearfix"></div>

</form>