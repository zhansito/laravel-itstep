@extends('app')

@section('page_title', 'Контакты || OnlineStore')

@section('content')
        @include('components.maps')
@endsection

@push('scripts')
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap">
</script>
@endpush