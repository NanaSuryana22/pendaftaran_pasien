@if(Session::has('error'))
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Pemberitahuan!</strong>
    <br />
    {{ Session::get('error') }}.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif
@if(Session::has('notice'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Pemberitahuan!</strong>
  <br />
  {{ Session::get('notice') }}.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif