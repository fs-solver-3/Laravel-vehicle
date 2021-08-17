@extends('layouts.app')
@section('title', 'Операции')
@section('content')

    <div class="panel panel-default">

        <div class="panel-heading clearfix">

             <a class="back_to_link" href="{{ route('admin.transactions.index', app()->getLocale()) }}">
                <img src="{{asset('admin/left-arrow.svg')}}" class="left-arrow" alt="for you">
            </a>

            <span class="pull-left admin-form-title">
                <h4 class="mt-5 mb-5">@lang('global.create_new') @lang('global.transactions.title')</h4>
            </span>

        </div>

        <div class="panel-body">
        
            @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <form method="POST" action="{{ route('admin.transactions.store', app()->getLocale()) }}" accept-charset="UTF-8" id="create_transactions_form" name="create_transactions_form" class="form-horizontal">
            {{ csrf_field() }}
            @include ('admin.transactions.form', [
                                        'transactions' => null,
                                      ])

                <div class="section-footer-side">
                    <div class="section-buttons--wrap">
                        <button class="section-button--yellow w-100px mr-3" type="submit">@lang('global.app_create')</button>
                        <a href="{{ route('admin.transactions.index', app()->getLocale()) }}" title="Show All Transactions">
                            <div class="section-button--gray w-100px">@lang('global.app_cancel')</div>
                        </a>
                    </div>
                </div>

            </form>

        </div>
    </div>

@endsection


