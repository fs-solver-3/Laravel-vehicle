@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')
@section('content')
<section class="section-1">
    <div id="admin_app">
        <admin-com
            v-bind:msg="{{ json_encode($messages_dates) }}"
            v-bind:msgtoday="{{ json_encode($today_messages) }}"
            v-bind:receiver="{{ json_encode($users) }}"
            backlink="{{route('admin.users.index', app()->getLocale())}}"
            type="admin">
        </admin-com>
    </div>
</section> 
<style>
    .content{
        overflow: hidden;
    }
</style>
@endsection

