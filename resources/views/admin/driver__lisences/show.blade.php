@extends('layouts.app')
@section('title', 'Водительские права')
@section('content')
<section>
<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <a class="back_to_link" href="{{ route('admin.driver__lisence.index', app()->getLocale()) }}">
            <img src="{{asset('admin/left-arrow.svg')}}" class="left-arrow" alt="for you">
        </a>
        <span class="pull-left admin-form-title">
            <h4>{{ isset($title) ? $title : 'Driver  Lisence' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('admin.driver__lisence.destroy', ['locale' => app()->getLocale(), 'id' => $driverLisence->id]) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">

                    <a href="{{ route('admin.driver__lisence.create', app()->getLocale()) }}" class="btn btn-add " title="Create New driver__lisence">
                        <img src="{{asset('admin/plus.svg')}}" alt="for you">
                    </a>
                    <a href="{{ route('admin.driver__lisence.edit', ['locale' => app()->getLocale(), 'id' => $driverLisence->id]) }}" class="btn btn-add "
                        title="Edit driver__lisence">
                        <img src="{{asset('admin/pencil.svg')}}" alt="for you">
                    </a>
                    <button type="submit" title="Delete driver__lisence" onclick="return confirm(&quot;Click Ok to delete driver__lisence.?&quot;)"
                        class="btn btn-add">
                        <img src="{{asset('admin/delete.svg')}}" alt="for you">
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>@lang('global.license.fields.user'):</dt>
            <dd>{{ optional($driverLisence->user)->name }}</dd>
            <dt>@lang('global.license.fields.number'):</dt>
            <dd>{{ $driverLisence->document_no }}</dd>
            <dt>Pdf:</dt>
            <dd>{{ $driverLisence->pdf }}</dd>
            <dt>@lang('global.license.fields.verified'):</dt>
            <dd>{{ $driverLisence->verified }}</dd>

        </dl>

    </div>
</div>
</section>
@endsection