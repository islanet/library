@extends('layouts.main')

@section('main')
@push('scripts')
<script type="text/javascript">
    $(".nav .nav-link").on("click", function(){
       $(".nav-link").find(".active").removeClass("active");
       $(this).addClass("active");
    });
</script>
@endpush
