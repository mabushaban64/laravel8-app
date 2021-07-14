@extends('errors.layout')
@section('title', __("403 Error") )
@section('body')
<div class="d-flex flex-column flex-row-fluid text-center">
    <h1 class="error-title font-weight-boldest text-white mb-12" style="margin-top: 12rem;">Oops ...</h1>
    <p class="display-4 font-weight-bold text-white">HTTP 403 (Forbidden ) {{ $exception->getMessage() }}</p>

</div>
@endsection
