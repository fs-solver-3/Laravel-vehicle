<template>
    <div class="chat-container-header">
        <div
            class="gogocar-gray-icons gogocar-go-back gogocar-go-back-chat--mobile"
        >
            <svg class="icon icon-arrow-right ">
                <use
                    xlink:href="/static/img/svg/symbol/sprite.svg#arrow-right"
                ></use>
            </svg>
        </div>
        <div class="gogocar-gray-icons gogocar-go-back gogocar-go-back--desktop" v-if="back">
            <a :href="back" class="back_to_link" title="Show Directions">
                <svg class="icon icon-arrow-right " style="width: 10px; height: 30px;">
                    <use
                        xlink:href="/static/img/svg/symbol/sprite.svg#arrow-right"
                    ></use>
                </svg>
            </a>
        </div>
        <div v-if="user != null">
            <div
                class="chat-container-header--img 2"
                :style="{ backgroundImage: `url(/${user.avatar})`} "
                v-if="user.avatar != null"></div>
            <div
                class="chat-container-header--img 1"
                v-if="user.avatar == null"
                style="background-image:url('/static/img/content/drivers-avatar/driver1.png');"
            ></div>
        </div>
        <div class="chat-container-header--info__option">
            <div class="chat-container-header--info">
                <div class="chat-container-header--name">
                    <span v-if="user != null">{{ user.name }}</span>
                </div>
                <div class="chat-container-header--desc">
                    <span v-if="user != null && type=='admin'">{{ user.email }}</span>
                    <span v-if="type=='person'"></span>
                </div>
            </div>
            <div class="chat-container-header--option--left--wrap">
                <div class="chat-container-header--option-delete__panel">
                    <div
                        class="chat-container-header--option-delete--delete gogocar-gray-icons"
                        v-if="selectMessage"
                        @click="deleteMultiOpen"
                    >
                        <svg class="icon icon-delete ">
                            <use
                                xlink:href="/static/img/svg/symbol/sprite.svg#delete"
                            ></use>
                        </svg>
                    </div>
                    <div
                        class="chat-container-header--option-delete--back gogocar-gray-icons"
                        v-if="selectMessage"
                        @click="closeOptions"
                    >
                        <svg class="icon icon-close ">
                            <use
                                xlink:href="/static/img/svg/symbol/sprite.svg#close"
                            ></use>
                        </svg>
                    </div>
                    <transition name="modal" v-if="showModal" @close="showModal = false">
                        <div class="modal-mask delete-modal" >
                            <div class="modal-wrapper">
                                <div class="modal-container">
                                    <div class="modal-body">
                                        <slot name="body">
                                            <h4>Удалить сообщения?</h4>
                                        </slot>
                                    </div>

                                    <div class="modal-footer">
                                        <slot name="footer">
                                           <div
                                                class="delete-choise-chat-msg gogocar-red-button"
                                                @click="deleteMulti()"
                                            >
                                                Удалить
                                            </div>
                                            <div
                                                class="gogocar-gray-button"
                                                @click="deleteMessageCancel()"
                                            >
                                                Отмена
                                            </div>
                                        </slot>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </transition>
                    <div class="chat-delete-out-msg">
                        <div class="chat-text-delete__message">
                            Удалить сообщения?
                        </div>
                        <div class="chat-container-option--message--wrap">
                            <div
                                class="chat-container-option--message--item chat-choise-delet-msg"
                            >
                                <svg class="icon icon-delete ">
                                    <use
                                        xlink:href="/static/img/svg/symbol/sprite.svg#delete"
                                    ></use></svg
                                ><span>Удалить</span>
                            </div>
                            <div
                                class="chat-container-option--message--item--cancel"
                            >
                                Отмена
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    class="chat-container-header--option chat-container-option-dot2 gogocar-gray-icons"
                    @click="openOptions"
                    v-if="optionsShow"

                >
                    <svg class="icon icon-option ">
                        <use
                            xlink:href="/static/img/svg/symbol/sprite.svg#option"
                        ></use>
                    </svg>
                </div>
                <div
                    ref="menuOptions"
                    v-if="this.optionsOpened"
                    v-click-outside="closeOptions"
                    class="menu-options chat-container-header--delete__message2"
                    :style="{ top: `65px` }"
                >
                    <div v-for="action in menuOptions" :key="action.name" class="">
                        <div
                            class="menu-item d-flex"
                            @click="menuActionHandler(action)"
                            v-if="action.active"
                        >
                            <img
                                :src="'/admin/' + action.icon"
                                alt="for you"
                            />
                            <span class="action-title">{{
                                action.title
                            }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import vClickOutside from "v-click-outside";
import Event from "../event.js";
export default {
    directives: {
        clickOutside: vClickOutside.directive
    },
    props: {
        user: {
            type: Object
        },
        type: null,
        back: null,
        menuOptions: {
            type: Array,
            default: () => [
                {
                    name: "select_message",
                    title: "Выбрать сообщение",
                    icon: "checked_message.svg",
                    active: true
                }
            ]
        }
    },
    data() {
        return {
            messages: [],
            hideOptions: true,
            optionsOpened: false,
            scrollIcon: false,
            selectMessage: false,
            checkedMessaged: [],
            room_id: null,
            showModal: false,
            optionsShow: true
        };
    },
    mounted() {},
    methods: {
        openOptions() {
            // this.optionsShow = !this.optionsShow;
            // this.selectMessage = true;
            this.optionsOpened = !this.optionsOpened;
        },
        messageAction() {
            this.selectMessage = true;
            this.optionsOpened = false;
            this.optionsShow = !this.optionsShow;
            this.$emit("selectMessage", true);
        },
        closeOptions() {
            this.selectMessage = false;
            this.optionsOpened = false;
            this.optionsShow = true;
            this.$emit("selectMessage", false);
        },
        menuActionHandler(action) {
            switch (action.name) {
                case "archive":
                    return this.archive(action);
                case "select_message":
                    return this.messageAction(action);
                case "active":
                    return this.archive(action);
                // return this.editMessage(message)
                default:
            }
        },
         deleteMultiOpen() {
            this.showModal = true;
        },
         deleteMessageCancel() {
            this.showModal = false;
        },
        deleteMulti() {
            this.$emit("deleteMultiMessage", true);
            this.selectMessage = false;
            this.showModal = false;
        },
        archive() {
            this.messageArchive = !this.messageArchive;
            // this.$set(menuOptions[0], 'active', !this.menuOptions[0].active)
            // this.$set(menuOptions[1], 'active', !this.menuOptions[1].active)
            // this.menuOptions[1].active = !this.menuOptions[1].active;
            const r = {
                archive: this.messageArchive
            }
            this.$emit("archeiveRoom", r);
        },
    }
};
</script>
