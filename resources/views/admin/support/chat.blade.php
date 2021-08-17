@extends('layouts.app')
@section('content')
<section class="section-1">
    <div id="support_app">
        <support-com 
            receiver="{{ $receiver }}" 
            :support='{{ $demand->user }}' 
            room="{{ $room }}" 
            type="supportAdmin"
            v-bind:msg="{{ json_encode($messages_dates) }}"
            v-bind:msgtoday="{{ json_encode($today_messages) }}"
            :demandcategories="{{ json_encode($demandCategories) }}" 
            backlink="/{{app()->getLocale()}}/admin/support/appeal"
            :answers="{{ json_encode($answers) }}"
            v-bind:demand="{
                id: '{{ $demand->id }}',
                title: '{{ $demand->name }}',
                support: {{ $demand->support }},
                avatar: '{{ optional($demand->support)->avatar }}',
                archive: '{{ $demand->archive }}',
                'receiver': 'Support'
                }">
        </support-com>
    </div>
</section>
<style>
    .student_lists {
        width: 23%;
        background: #282B3C;
        padding-top: 10px;
        /* margin-right: 20px; */
    }

    .tasks-content .accordion {
        width: 50%;
    }

    .d-flex {
        display: -ms-flexbox !important;
        display: flex !important;
    }

    .justify-content-between {
        -ms-flex-pack: justify !important;
        justify-content: space-between !important;
    }

    .w-100 {
        width: 100% !important;
    }

    section.tasks .accordion .card-body .message-content .message {
        background-color: transparent;
        border: 0px;
        padding: 0px;
    }

    .student_lists .active {
        opacity: 1 !important;
        /* border: 1px solid #fff; */
        border-bottom: 3px solid #f1f1f1;
    }

    .file {
        border: 0px;
        background-color: transparent;
    }

    .position-relative {
        position: relative !important;
    }

    h2 {
        margin-top: 0px;
    }

    .forum-item .user-image {
        width: 50px;
        height: 50px;
        margin-right: 15px;
    }

    .student_lists .forum-item {
        opacity: 0.7;
    }

    .forum-item {
        border: 0px;
    }

    .student_lists a {
        color: #fff;
    }

    .px-3 {
        padding-left: 1rem !important;
        padding-right: 1rem !important;
    }

    .ql-editor p {
        color: #fff;
    }

    .forum-item input[name='complete'] {
        margin-right: 20px;
    }

    .homework {
        margin-top: 50px;
    }

    @media (max-width: 992px) {
        section.tasks .accordion {
            width: 75%;
        }
    }

</style>

@endsection
