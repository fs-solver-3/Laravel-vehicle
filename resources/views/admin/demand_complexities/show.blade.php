@extends('layouts.app')
@section('title', 'Сложность')

@section('admin_lang')
<ul class="choise-lang--list">
    <li class="choise-lang--item"
        data-value='{{ route(\Illuminate\Support\Facades\Route::currentRouteName(), ['locale' => 'ru', 'id' => $demandComplexity->id])}}'>
        <div class="choise-lang--item__img"
            style="background-image:url('{{ asset('/static/img/general/lang/lang-ru.png') }}');">
        </div>
        <div class="choise-lang--item__text">RU</div>
    </li>
    <li class="choise-lang--item"
        data-value="{{ route(\Illuminate\Support\Facades\Route::currentRouteName(), ['locale' => 'uz', 'id' => $demandComplexity->id])}}">
        <div class="choise-lang--item__img"
            style="background-image:url('{{ asset('/static/img/general/lang/lang-uz.png') }}');">
        </div>
        <div class="choise-lang--item__text">UZ</div>
    </li>
</ul>
@endsection
@section('content')
<section class="section-1">
    <div class="panel panel-default">
        <div class="panel-heading clearfix">
            <div class="pull-left">
                <a href="{{ route('admin.demand_complexity.index', app()->getLocale()) }}" class="back_to_link" title="Show All Lessons">
                    <img src="{{asset('admin/left-arrow.svg')}}" class="left-arrow" alt="for you">
                </a>
                <span class="pull-left admin-form-title">
                    <h4 >{{ !empty($demandComplexity->title) ? $$demandComplexity->title : 'Complexity' }}</h4>
                </span>
            </div>

            <div class="pull-right">

                <form method="POST" action="{!! route('admin.demand_complexity.destroy', ['locale' => app()->getLocale(), 'id' => $demandComplexity->id]) !!}" accept-charset="UTF-8">
                    <input name="_method" value="DELETE" type="hidden">
                    {{ csrf_field() }}
                    <div class="btn-group btn-group-sm" role="group">

                        <a href="{{ route('admin.demand_complexity.create', ['locale' => app()->getLocale(), 'id' => $demandComplexity->id]) }}" class="btn btn-add" title="Create New Demand Status">
                            <img src="{{asset('admin/plus.svg')}}" alt="for you">
                        </a>

                        <a href="{{ route('admin.demand_complexity.edit',['locale' => app()->getLocale(), 'id' => $demandComplexity->id]  ) }}" class="btn btn-add" title="Edit Demand Status">
                            <img src="{{asset('admin/pencil.svg')}}" alt="for you">
                        </a>

                        <button type="submit" class="btn btn-add" title="Delete Demand Status" onclick="return confirm(&quot;Click Ok to delete Demand Status.?&quot;)">
                            <img src="{{asset('admin/delete.svg')}}" alt="for you">
                        </button>
                    </div>
                </form>

            </div>

        </div>

        <div class="panel-body">
            <dl class="dl-horizontal">
                <dt>@lang('global.demand_categories.fields.title')</dt>
                <dd>{{ $demandComplexity->name }}</dd>
                <dt>@lang('global.demand_categories.fields.description')</dt>
                <dd>{{ $demandComplexity->description }}</dd>
                <dt>@lang('global.demand_categories.fields.grade')</dt>
                <dd>{{ $demandComplexity->grade }}</dd>

            </dl>

        </div>
    </div>
</section>
@endsection