@extends('layouts.app')

@section('content')
<section class="section-1">
    <div class="panel panel-default">
        <div class="panel-heading clearfix">

            <a class="back_to_link" href="{{ route('admin.transactions.index', app()->getLocale()) }}">
                <img src="{{asset('admin/left-arrow.svg')}}" class="left-arrow" alt="for you">
            </a>

            <span class="pull-left admin-form-title">
                <h4 >{{ isset($title) ? $title : 'Transactions' }}</h4>
            </span>

        </div>

        <div class="panel-body">
            <dl class="dl-horizontal">
                <dt>@lang('global.transactions.fields.user'):</dt>
                <dd>{{ optional($transactions->user)->name }}</dd>
                <dt>@lang('global.transactions.fields.courses'):</dt>
                <dd>{{ optional($transactions->course)->name }}</dd>
                <dt>@lang('global.transactions.fields.amount'):</dt>
                <dd>{{ $transactions->amount }}</dd>
                <dt>@lang('global.transactions.fields.method'):</dt>
                <dd>{{ $transactions->method }}</dd>
                <dt>@lang('global.transactions.fields.passed'):</dt>
                <dd>{{ $transactions->passed }}</dd>

            </dl>

        </div>
    </div>
</section>
@endsection