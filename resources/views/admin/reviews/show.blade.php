@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($reviews->title) ? $reviews->title : 'Reviews' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('admin.reviews.destroy', ['locale' => app()->getLocale(), 'id' => $reviews->id]) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('admin.reviews.index', app()->getLocale()) }}" class="btn btn-primary" title="Show All Reviews">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('admin.reviews.create', app()->getLocale()) }}" class="btn btn-success" title="Create New Reviews">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('admin.reviews.edit', ['locale' => app()->getLocale(), 'id' => $reviews->id] ) }}" class="btn btn-primary" title="Edit Reviews">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Reviews" onclick="return confirm(&quot;Click Ok to delete Reviews.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Writer</dt>
            <dd>{{ optional($reviews->writer)->id }}</dd>
            <dt>Title</dt>
            <dd>{{ $reviews->title }}</dd>
            <dt>Type</dt>
            <dd>{{ $reviews->type }}</dd>
            <dt>Comment</dt>
            <dd>{{ $reviews->comment }}</dd>
            <dt>Score</dt>
            <dd>{{ $reviews->score }}</dd>
            <dt>Receiver</dt>
            <dd>{{ optional($reviews->receiver)->id }}</dd>
            <dt>Booking</dt>
            <dd>{{ optional($reviews->booking)->id }}</dd>

        </dl>

    </div>
</div>

@endsection