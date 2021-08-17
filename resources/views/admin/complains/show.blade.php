@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($complains->title) ? $complains->title : 'Complains' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('complains.complains.destroy', $complains->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('complains.complains.index') }}" class="btn btn-primary" title="Show All Complains">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('complains.complains.create') }}" class="btn btn-success" title="Create New Complains">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('complains.complains.edit', $complains->id ) }}" class="btn btn-primary" title="Edit Complains">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Complains" onclick="return confirm(&quot;Click Ok to delete Complains.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Title</dt>
            <dd>{{ $complains->title }}</dd>
            <dt>Des</dt>
            <dd>{{ $complains->des }}</dd>

        </dl>

    </div>
</div>

@endsection