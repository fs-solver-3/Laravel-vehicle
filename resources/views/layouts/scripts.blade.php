
<script src="{{asset('static/js/libs.min.js')}}"></script>
<script src="{{ asset('js/libs.min.js') }}" defer></script>
<script src="{{asset('static/js/main.js')}}"></script>
<script src="{{asset('static/js/jquery.hoverIntent.min.js')}}"></script>
<script src="{{asset('static/js/circle-progress.js')}}"></script>
<script src="{{asset('static/js/datepicker.js')}}"></script>
<script src="{{asset('static/js/datepicker.ru-RU.js')}}"></script>
<script src="{{asset('static/js/jquery.simplePagination.js')}}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places&callback=initialize&language=RU" async defer></script>
<script src="{{asset('js/mapInput.js')}}"></script>
<script src="{{asset('static/js/custom.js')}}"></script>
@if(Auth::user())
<script src="{{ asset('js/app.js') }}"></script>
@endif