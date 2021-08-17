@extends('layouts.app')
@section('title', 'Паспорт')
@section('content')
<section>
    <div class="panel panel-default">
        <div class="panel-heading clearfix">

            <a class="back_to_link" href="{{ route('admin.passport.index', app()->getLocale()) }}">
                <img src="{{asset('admin/left-arrow.svg')}}" class="left-arrow" alt="for you">
            </a>
            <span class="pull-left admin-form-title">
                <h4 >{{ isset($title) ? $title : 'Passport' }}</h4>
            </span>
        </div>

        <div class="panel-body">
            <dl class="dl-horizontal">
                <dt>@lang('global.passport.fields.user'):</dt>
                <dd>{{ optional($passport->user)->name }}</dd>
                <dt>@lang('global.passport.fields.series'):</dt>
                <dd>{{ $passport->series }}</dd>
                <dt>@lang('global.passport.fields.issued_by'):</dt>
                <dd>{{ $passport->issued_by }}</dd>
                <dt>@lang('global.passport.fields.issue_date'):</dt>
                <dd>{{ $passport->issued_date }}</dd>
                <dt>@lang('global.passport.fields.place'):</dt>
                <dd>{{ $passport->place_residence }}</dd>
                <dt>Pdf1:</dt>
                <dd>{{ $passport->pdf1 }}</dd>
                <dt>Pdf2:</dt>
                <dd>{{ $passport->pdf2 }}</dd>
                <dt>@lang('global.passport.fields.verified'):</dt>
                <dd>{{ $passport->verified }}</dd>

            </dl>

        </div>
    </div>
</section>
@endsection