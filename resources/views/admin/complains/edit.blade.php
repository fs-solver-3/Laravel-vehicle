@extends('layouts.app')
@section('title', 'жаловаться')
@section('content')
<section class="section-1">
    <div class="panel panel-default">

        <div class="panel-heading clearfix">

              <div class="pull-left">
                  <a href="{{ route('admin.complains.index', app()->getLocale()) }}" class="back_to_link" title="Show All Complains">
                      <img src="{{asset('admin/left-arrow.svg')}}" class="left-arrow" alt="for you">
                  </a>
                  <span class="pull-left admin-form-title">
                      <h4 >{{ !empty($complains->title) ? $complains->title : 'Complains' }}</h4>
                  </span>
              </div>
              <div class="btn-group btn-group-sm pull-right" role="group">

                  <a href="{{ route('admin.complains.create', app()->getLocale()) }}" class="btn btn-add" title="Create New Complains">
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

            <form method="POST" action="{{ route('admin.complains.update', ['locale' => app()->getLocale(), 'id' => $complains->id]) }}" id="edit_colors_form" name="edit_colors_form" accept-charset="UTF-8" class="form-horizontal">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PUT">
            @include ('admin.complains.form', [
                                        'complains' => $complains,
                                      ])

                <div class="section-footer-side">
                    <div class="section-buttons--wrap">
                        <button class="section-button--yellow w-100px mr-3" type="submit">@lang('global.app_update')</button>
                        <a href="{{ route('admin.complains.index', app()->getLocale()) }}">
                            <div class="section-button--gray w-100px">@lang('global.app_cancel')</div>
                        </a>
                    </div>
                </div>

            </form>

        </div>
    </div>
</section>
@endsection