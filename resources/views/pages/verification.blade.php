@extends('layouts.generalLayout')

@section('content')

</div> @endsection esection('scripts') @parent eif(auth()->user()->is_admin) <function script> sendMarkRequest(id =null)
    { return $.ajax("{{ route('admin.markNotification') }}", { method: 'POST', data: { _token, id } }); } $(function() {
    $('.mark-as-read'). click(function() { let request= sendMarkRequest($(this).data('id')); request.done(() → (
    $(this).parents('div.alert').remove(); }); }); $('#mark-all').click(function(){ let request = sendMarkRequest();
    request.done(() $('div.alert').remove(); ); }) } }); </script> @endif @endsection
    @endsection