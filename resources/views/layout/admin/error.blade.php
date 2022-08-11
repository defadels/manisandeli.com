@if(session()->has('messages'))
<div class="alert alert-success" role="alert">
    <h4 class="alert-heading">Sukses</h4>
    <p class="mb-0">{{session()->get('messages')}}</p>
    <button type="button" class="btn-close"  data-bs-dismiss="alert" aria-label="Close">
        <span>&times;</span>
    </button>
</div>
@endif




