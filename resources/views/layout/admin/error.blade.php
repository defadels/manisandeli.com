@if(session()->has('messages'))
<div class="alert alert-success">
    <strong>{{session()->get('messages')}}</strong>
    <button type="button" class="close" data-dismiss="alert">
        <span>&times;</span>
    </button>
</div>
@endif

