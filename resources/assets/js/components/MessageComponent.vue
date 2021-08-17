<template>
    <div
        class="chat-container-people-messages"
        :class="{
            'chat-container-message-out': message.selfMessage == true,
            'chat-container-message-in': message.selfMessage == false
        }"
    >
        <div
            class="chat-container-message--wrap message-file-wrapper"
            v-if="message.attach_name"
        >
            <div class="chat-container-message--file-type">
                <div class="chat-container-message--format">
                    <svg class="icon icon-chat-png ">
                        <use
                            xlink:href="/static/img/svg/symbol/sprite.svg#chat-png"
                        ></use>
                    </svg>
                </div>
                <div class="chat-container-message--format-text">
                    <span class="chat-container-message--format-name">{{
                        message.attach_name
                    }}</span
                    ><span class="chat-container-message--format-time"
                        >14:02</span
                    >
                </div>
            </div>
            <a
                class="chat-container-message--format-download gogocar-gray-icons"
                :href="'/' + message.attach_url"
                download
            >
                <svg class="icon icon-download ">
                    <use
                        xlink:href="/static/img/svg/symbol/sprite.svg#download"
                    ></use>
                </svg>
            </a>
        </div>
        <div class="message-item" v-if="!message.deleted && message.body != ''">
            <div v-if="message.replyContent" 
                class="reply-message"
                :class="{
                    'edited-reply-message': selectMessage  == true
                }"
            >
                <div class="reply-message-block">
                    <div class="reply-username">
                        {{ message.replyName }}
                    </div>

                    <div class="reply-content">
                        {{ message.replyContent }}
                    </div>
                </div>
            </div>

            <div
                class="chat-container-message--wrapper"
                v-if="!message.deleted"
            >
                <div
                    class="chat-container--message--status"
                    v-if="message.selfMessage"
                >
                    <svg class="icon icon-not-looked " v-if="!message.seen">
                        <use xlink:href="/static/img/svg/symbol/sprite.svg#not-looked"></use>
                    </svg>
                    <svg class="icon icon-looked " v-if="message.seen">
                        <use
                            xlink:href="/static/img/svg/symbol/sprite.svg#looked"
                        ></use>
                    </svg>
                </div>
                <div
                    class="icon-edited"
                    v-if="message.edited && !message.deleted"
                >
                    <span>(Ред.)</span>
                </div>
                <div
                    class="chat-container-message--wrap"
                    v-if="!message.deleted"
                >
                    <div class="chat-container-message--info__message">
                        <div class="chat-container-message--date__name">
                            <span>{{ message.created_at | date_convert }}</span>
                            <div class="chat-container-message--name--wrap">
                                <div
                                    class="chat-container-message--name--button"
                                    @click="openOptions"
                                >
                                    <svg class="icon icon-arrow-right ">
                                        <use
                                            xlink:href="/static/img/svg/symbol/sprite.svg#arrow-right"
                                        ></use>
                                    </svg>
                                </div>
                                <div
                                    class="chat-container-option--message chat-show-message-out chat-show-message-out--mobile"
                                    ref="menuOptions"
                                    v-if="this.optionsOpened"
                                    v-click-outside="closeOptions"
                                >
                                    <div
                                        class="chat-container-option--message--wrap"
                                    >
                                        <div
                                            class="chat-container-option--message--wrap--buttons"
                                        >
                                            <div
                                                class="chat-container-option--message--item "
                                                v-for="action in filteredMessageActions"
                                                :key="action.name"
                                            >
                                                <div
                                                    class="d-flex"
                                                    @click="
                                                        messageActionHandler(
                                                            action
                                                        )
                                                    "
                                                >
                                                    <img
                                                        :src="
                                                            '/admin/' +
                                                                action.icon
                                                        "
                                                        alt="for you"
                                                    />
                                                    <span
                                                        class="action-title"
                                                        >{{
                                                            action.title
                                                        }}</span
                                                    >
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            class="chat-container-option--message--item--cancel" @click="closeOptions()"
                                        >
                                            Отмена
                                        </div>
                                    </div>
                                </div>
                                <div class="chat-container-message--name">
                                    {{ message.sender_name }}
                                </div>
                            </div>
                        </div>
                        <p class="chat-container--message">
                            {{ message.body }}
                        </p>
                    </div>
                    <div
                        class="chat-container-message--img"
                        :style="{
                            backgroundImage: `url(/${message.sender_avatar})`
                        }"
                        v-if="message.sender_avatar != null"
                    ></div>
                    <div
                        class="chat-content--review__trip--info__img"
                        style="background-image:url('/static/img/content/drivers-avatar/driver1.png');"
                        v-if="message.sender_avatar == null"
                    ></div>
                </div>
                <div
                    class="chat-container-message--wrap--delete__check--wrap message-select-form"
                    v-if="
                        selectMessage && !message.deleted && message.selfMessage
                    "
                    @click="checkMessage()"
                >
                    <input
                        type="checkbox"
                        :id="'selectMessage' + message.id"
                        @click="checkMessage()"
                    />
                    <label :for="'selectMessage' + message.id"></label>
                </div>
            </div>
        </div>
        <div v-if="message.deleted" class="message-deleted">
            <svg
                data-v-e8c9dade=""
                xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink"
                version="1.1"
                width="24"
                height="24"
                viewBox="0 0 24 24"
                class="icon-deleted"
            >
                <path
                    id="chat-icon-deleted"
                    d="M12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12A10,10 0 0,1 12,2M12,4A8,8 0 0,0 4,12C4,13.85 4.63,15.55 5.68,16.91L16.91,5.68C15.55,4.63 13.85,4 12,4M12,20A8,8 0 0,0 20,12C20,10.15 19.37,8.45 18.32,7.09L7.09,18.32C8.45,19.37 10.15,20 12,20Z"
                ></path>
            </svg>
            <span>Это сообщение было удалено</span>
        </div>

        <transition name="modal" v-if="showModal" @close="showModal = false">
            <div class="modal-mask">
                <div class="modal-wrapper">
                    <div class="modal-container">
                        <div class="modal-body">
                            <slot name="body">
                                <h4>Удалить сообщения?</h4>
                            </slot>
                        </div>

                        <div class="modal-footer delete-chat-msg">
                            <slot name="footer">
                                <div
                                    class="delete-choise-chat-msg gogocar-red-button"
                                    @click="
                                        deleteMessage(
                                            messageActions[2],
                                            message
                                        )
                                    "
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
    </div>
</template>

<script>
import vClickOutside from "v-click-outside";
import Event from "../event.js";
export default {
    // props: ["message"],
    directives: {
        clickOutside: vClickOutside.directive
    },
    props: {
        message: { type: Object, required: true },
        messageActions: { type: Array, required: true },
        currentUserId: { type: [String, Number], default: "" },
        selectMessage: null,
        messageArchive: false,
        type: null
    },
    data() {
        return {
            hoverMessageId: null,
            imageLoading: false,
            imageHover: false,
            messageHover: false,
            optionsOpened: false,
            optionsClosing: false,
            menuOptionsTop: 0,
            messageReaction: "",
            newMessage: {},
            emojiOpened: false,
            imageResponsive: "",
            messageDelete: false,
            checkedMessage: false,
            showModal: false
        };
    },
    filters: {
        date_convert: function(value) {
            value = value.toString().split(" ")[1];
            let time = value.split(":")[0] + ":" + value.split(":")[1];
            return time;
        }
    },
    methods: {
        onHoverMessage() {
            this.imageHover = true;
            this.messageHover = true;
            this.hoverMessageId = this.message.id;
        },
        canEditMessage() {
            return !this.message.deleted;
        },
        onLeaveMessage() {
            this.imageHover = false;
            if (!this.optionsOpened) this.messageHover = false;
            this.hoverMessageId = null;
        },
        isMessageActions() {
            return this.messageHover && !this.messageDelete;
        },
        openOptions() {
            if (this.optionsClosing) return;
            this.optionsOpened = !this.optionsOpened;
            if (!this.optionsOpened) return;
            this.$emit("hideOptions", false);
            setTimeout(() => {
                if (
                    !this.roomFooterRef ||
                    !this.$refs.menuOptions ||
                    !this.$refs.actionIcon
                )
                    return;
                const menuOptionsTop = this.$refs.menuOptions.getBoundingClientRect()
                    .height;
                const actionIconTop = this.$refs.actionIcon.getBoundingClientRect()
                    .top;
                const roomFooterTop = this.roomFooterRef.getBoundingClientRect()
                    .top;
                const optionsTopPosition =
                    roomFooterTop - actionIconTop > menuOptionsTop + 50;
                if (optionsTopPosition) this.menuOptionsTop = 30;
                else this.menuOptionsTop = -menuOptionsTop;
            }, 0);
        },
        closeOptions() {
            // console.log("close options");
            this.optionsOpened = false;
            this.optionsClosing = true;
            setTimeout(() => (this.optionsClosing = false), 100);

            if (this.hoverMessageId !== this.message._id)
                this.messageHover = false;
        },
        messageActionHandler(action, message) {
            console.log("action", action);
            this.closeOptions();
            this.messageHover = false;
            this.hoverMessageId = null;

            if (action.name == "deleteMessage") {
                this.showModal = true;
            } else {
                setTimeout(() => {
                    this.$emit("messageActionHandler", {
                        action,
                        message: this.message,
                        key: this.$vnode.key,
                        type: this.type
                    });
                    Event.$emit("messageActionHandlerBox", {
                        action,
                        message: this.message,
                        type: this.type
                    });
                }, 300);
            }
        },
        deleteMessage(action, message) {
            setTimeout(() => {
                this.$emit("messageActionHandler", {
                    action,
                    message: this.message,
                    key: this.$vnode.key
                });
                Event.$emit("messageActionHandlerBox", {
                    action,
                    message: this.message
                });
            }, 300);
            this.showModal = false;
        },
        deleteMessageCancel() {
            this.showModal = false;
        },
        checkMessage() {
            this.checkedMessage = !this.checkedMessage;
            this.$emit("checkMessageHandler", {
                message: this.message,
                key: this.$vnode.key,
                checked: this.checkedMessage
            });
            // Event.$emit("messageActionHandlerBox", {
            //     action,
            //     message: this.message
            // });
        },
        isMessageSeen() {
            return (
                this.message.sender_id === this.currentUserId &&
                this.message.seen &&
                !this.message.deleted
            );
        },
        isImageCheck(file) {
            if (!file) return;
            const imageTypes = ["png", "jpg", "jpeg", "svg"];
            const { type } = file;
            return imageTypes.some(t => type.includes(t));
        },
        checkImageReplyFile() {
            return this.checkImageType(this.message.replyMessage.file);
        },
        checkImageType(file) {
            if (!file) return;
            const imageTypes = ["png", "jpg", "jpeg", "svg"];
            const { type } = file;
            return imageTypes.some(t => type.includes(t));
        }
    },
    computed: {
        filteredMessageActions() {
            // return this.messageActions;
            return this.message.selfMessage
                ? this.messageActions
                : this.messageActions.filter(message => !message.onlyMe);
        },
        isImageReply() {
            return this.checkImageReplyFile();
        }
    }
};
</script>
