<div id="support_app">
    <support-com receiver="{{ $receiver }}" :support='{{ $demand->support }}' 
        room="{{ $room }}" type="support" 
        v-bind:msg="{{ json_encode($messages_dates) }}" 
        v-bind:msgtoday="{{ json_encode($today_messages) }}" 
        backlink="/{{app()->getLocale()}}/profile?tab=support" v-bind:demand="{
        id: '{{ $demand->id }}',
        title: '{{ $demand->name }}',
        support: {{ $demand->support }},
        avatar: '{{ optional($demand->support)->avatar }}',
        archive: '{{ $demand->archive }}',
        'receiver': 'Support'
        }">
    </support-com>
</div>

<style>
    .chat-container-main--info {
        max-height: 100% !important;
        height: 100% !important;
        overflow-y: scroll;
    }
    @media (max-width: 990px) {
        .header-panel--fixed{
            bottom: -70px;
        }
    }
</style>