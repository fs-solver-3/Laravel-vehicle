<div id="support">
    <support-admin-chat-component 
        receiver="{{ $receiver }}" 
        support="{{ $support }}" 
        room="{{ $room }}" 
        v-bind:msg="{{ json_encode($messages) }}" 
        backlink="/{{app()->getLocale()}}/profile"

        v-bind:demand="{
        id: '{{ $demand->id }}',
        title: '{{ $demand->name }}',
        support: '{{ optional($demand->support)->name }}',
        avatar: '{{ $demand->support->avatar }}',
        archive: '{{ $demand->archive }}',
        'receiver': 'Support'
        }"
        >
    </support-admin-chat-component>
</div>
