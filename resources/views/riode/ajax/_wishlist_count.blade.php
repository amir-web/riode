@if(count(Session::get('key')))
    {{count(Session::get('key'))}}
@else
    {{0}}
@endif
