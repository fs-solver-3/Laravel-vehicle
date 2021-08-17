@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')
@section('admin_lang')
@include('includes.admin_flag')
@endsection
@section('content')
<section class="section-1">
    <div class="row settings-container no-margins">
        <div class="col-md-12">

            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <form method="post" action="{{ route('settings.store') }}" class="form-horizontal" role="form">
                {!! csrf_field() !!}

                @if(count(config('setting_fields', [])) )

                    @foreach(config('setting_fields') as $section => $fields)
                        <div class="panel panel-default setting-panel">
                            <div class="panel-heading clearfix">
                                <div class="pull-left">
                                    <h4>{{ $fields['title'] }}</h4>
                                </div>
                                <div class="pull-right">
                                    <p class="text-muted">{{ $fields['desc'] }}</p>
                                </div>
                            </div>

                            <div class="panel-body">
                                <div class="row no-margin">
                                    {{-- <div class="column-blocks col-md-12"> --}}
                                        @foreach($fields['elements'] as $field)
                                            @includeIf('setting.fields.' . $field['type'] )
                                        @endforeach
                                    {{-- </div> --}}
                                </div>
                            </div>

                        </div>
                        <!-- end panel for {{ $fields['title'] }} -->
                    @endforeach

                @endif

                <div class="row m-b-md no-margins">
                    <div class="" style="margin-bottom: 30px">
                        {{-- <button class="btn-primary btn settings-btn">
                            @lang('global.save_setting')
                        </button> --}}
                        <button class="section-button--yellow mr-3 settings-btn" type="submit">@lang('global.save_setting')</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
{{-- <script src="{{asset('js/jquery-3.4.1.js')}}" type="text/javascript"></script>
<script src="{{asset('js/select2.full.min.js')}}" type="text/javascript" defer></script>
<script>
        $(document).ready(function(){
            $('.select2').select2();
        });

</script> --}}