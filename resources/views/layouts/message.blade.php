@if(session()->has('msg'))
  <div class="alert alert-info alert-dismissible">
    {{ session()->get('msg') }}

    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  </div>
@endif