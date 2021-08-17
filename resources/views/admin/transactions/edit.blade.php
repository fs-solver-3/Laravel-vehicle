@extends('layouts.app')
@section('title', 'Операции')
@section('content')
<section class="section-1">
    <div class="panel panel-default">
  
        <div class="panel-heading clearfix">

            <div class="pull-left">
                <a href="{{ route('admin.transactions.index', app()->getLocale()) }}" class="back_to_link" title="Show All transactions">
                    <img src="{{asset('admin/left-arrow.svg')}}" class="left-arrow" alt="for you">
                </a>
                <span class="pull-left admin-form-title">
                    <h4>{{ !empty($title) ? $title : 'Transactions' }}</h4>
                </span>
            </div>
            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('admin.transactions.create', app()->getLocale()) }}" class="btn btn-add" title="Create New Transactions">
                    <img src="{{asset('admin/plus.svg')}}" alt="for you">
                </a>

            </div>
        </div>

        <div class="panel-body">

            @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <form method="POST" action="{{ route('admin.transactions.update', ['locale' => app()->getLocale(), 'id' => $transactions->id]) }}" id="edit_transactions_form" name="edit_transactions_form" accept-charset="UTF-8" class="form-horizontal">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PUT">
            @include ('admin.transactions.form', [
                                        'transactions' => $transactions,
                                      ])

                <div class="section-footer-side">
                    <div class="section-buttons--wrap">
                        <button class="section-button--yellow w-100px mr-3" type="submit">@lang('global.app_update')</button>
                        <a href="{{ route('admin.transactions.index', app()->getLocale()) }}" title="Show All Lessons">
                            <div class="section-button--gray w-100px">@lang('global.app_cancel')</div>
                        </a>
                    </div>
                </div>
            </form>

        </div>
    </div>
</section>
@endsection