@if ( auth()->user() )
           
     <form action="{{ route('front.commentStore' , $video->id) }}" method="POST">
      @csrf
      <div class="form-group">
        <label for="">Add Comment :</label>
        <textarea name="comment" class="form-control" rows="4"></textarea>
      </div>
      
      <button type="submit" class="btn">Add Comment</button>
     </form>
@endif