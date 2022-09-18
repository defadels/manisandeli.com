@if(session()->has('messages'))
<div class="alert alert-success">
    <h4 class="alert-heading">Sukses</h4>
    {{session()->get('messages')}}
    <button type="button"  class="close" data-dismiss="alert">
        <span>&times;</span>
    </button>
</div>
@endif