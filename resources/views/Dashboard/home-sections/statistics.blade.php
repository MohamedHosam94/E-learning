
@php
use App\Models\Video;
use App\Models\Skill;
use App\Models\Tag;
use App\Models\Comment;
@endphp

<div class="row">
  <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
    <div class="card card-stats">
      <div class="card-header card-header-warning card-header-icon">
        <div class="card-icon">
          <i class="material-icons">video_library</i>
        </div>
        <p class="card-category">Videos</p>
        <h3 class="card-title">
          {{ Video::count() }}
        </h3>
      </div>
      <div class="card-footer">
        <div class="stats">
          <i class="material-icons text-warning">video_library</i>
          <a href="{{ route('videos.index') }}" class="warning-link">All Videos</a>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
    <div class="card card-stats">
      <div class="card-header card-header-success card-header-icon">
        <div class="card-icon">
          <i class="material-icons">school</i>
        </div>
        <p class="card-category">Skills</p>
        <h3 class="card-title">{{ Skill::count() }}</h3>
      </div>
      <div class="card-footer">
        <div class="stats">
          <i class="material-icons text-warning">school</i>
          <a href="{{ route('skills.index') }}" class="warning-link">All Skills</a>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
    <div class="card card-stats">
      <div class="card-header card-header-danger card-header-icon">
        <div class="card-icon">
          <i _ngcontent-sfb-c19="" class="material-icons">bookmark_border</i>
        </div>
        <p class="card-category">Tags</p>
        <h3 class="card-title"> {{ Tag::count() }} </h3>
      </div>
      <div class="card-footer">
        <div class="stats">
          <i _ngcontent-sfb-c19="" class="material-icons text-warning">bookmark_border</i>
          <a href="{{ route('tags.index') }}" class="warning-link">All Tags</a>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
    <div class="card card-stats">
      <div class="card-header card-header-info card-header-icon">
        <div class="card-icon">
          <i class="material-icons">comment_bank</i>

        </div>
        <p class="card-category">Comments</p>
        <h3 class="card-title"> {{ Comment::count() }} </h3>
      </div>
      <div class="card-footer">
        <div class="stats">
          <i class="material-icons text-warning">comment_bank</i>
          <a href="{{ route('videos.index') }}" class="warning-link">Check Videos</a>
        </div>
      </div>
    </div>
  </div>
</div>