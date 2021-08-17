<template>
    <div class="chat-container-footer-wrap--inputs">
        <div
            class="chat-container--edit--message"
            id="chat-edit-msg"
            v-if="messageReply"
        >
            <div class="chat-container--edit--wrap">
                <div class="chat-container--edit--title">
                    {{ messageReply.sender_name }}
                </div>
                <div class="chat-container--edit--text" id="chat-edit-text">
                    {{ messageReply.body }}
                </div>
            </div>
            <div
                class="chat-container--edit--close"
                id="chat-edit-close"
                @click="resetMessage"
            >
                <svg class="icon icon-x " >
                    <use xlink:href="/static/img/svg/symbol/sprite.svg#x"></use>
                </svg>
            </div>
        </div>
        <div class="chat-container--edit--message--file--add" 
            v-if="this.file"
        >
            <div
                class="personal-appear--file--wrap row"
                id="chat-file-add"
            >
                <div class="personal-loaded--file active">
                    <div class="gogocar-gray-icons personal-icon-loaded--appeal">
                        <svg class="icon icon-png">
                        <use xlink:href="/static/img/svg/symbol/sprite.svg#png"></use>
                        </svg>
                    </div>
                        <span class="personal-loaded--file__name" v-if="file">{{ this.file.name.split(".")[0] }}</span>
                </div>
            </div>
            <div class="personal-loaded--file__icon"
                 
            >
                <svg class="icon icon-close " @click="resetImageFile">
                    <use
                        xlink:href="/static/img/svg/symbol/sprite.svg#close"
                    ></use>
                </svg>
            </div>
        </div>
        <div class="chat-container-footer--file__input">
            <svg class="icon icon-skrepka ">
                <use
                    xlink:href="/static/img/svg/symbol/sprite.svg#skrepka"
                ></use>
            </svg>
            <input
                class="chat-container-footer--input__file"
                type="file"
                multiple
                @change="onFileChange($event)"
                :disabled="archiveForm"
            />
        </div>
        <div class="chat-container-footer--text__input">
            <textarea
                class="chat-container-footer--input__text"
                id="chat-get-text"
                contenteditable="true"
                role="textbox"
                aria-multiline="true"
                v-model="body"
                @focus="checkMessage()"
                @keydown.esc="resetMessage"
                @keydown.enter.exact.prevent=""
                ref="roomTextarea"
                :placeholder="
                    archiveForm ? 'Архивное окно' : 'Cообщение...'
                "
                :disabled="archiveForm"
            ></textarea>
        </div>
        <div class="chat-container-footer--smiles">
            <emoji-picker
                @emoji="append"
                :search="search"
                :emojiOpened="emojiOpened"
                :msg="emojiVisible"
                v-if="!archiveForm"
            >
                <div
                    class="emoji-invoker"
                    slot="emoji-invoker"
                    slot-scope="{ events: { click: clickEvent } }"
                    @click.stop="clickEvent"
                >
                    <svg
                        width="21"
                        height="21"
                        viewBox="0 0 21 21"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            d="M15.3809 9.02344C14.9278 9.02344 14.5605 8.65618 14.5605 8.20312C14.5605 7.97696 14.3766 7.79297 14.1504 7.79297C13.9242 7.79297 13.7402 7.97696 13.7402 8.20312C13.7402 8.65618 13.373 9.02344 12.9199 9.02344C12.4669 9.02344 12.0996 8.65618 12.0996 8.20312C12.0996 7.07232 13.0196 6.15234 14.1504 6.15234C15.2812 6.15234 16.2012 7.07232 16.2012 8.20312C16.2012 8.65618 15.8339 9.02344 15.3809 9.02344ZM8.94141 8.20312C8.94141 7.07232 8.02143 6.15234 6.89062 6.15234C5.75982 6.15234 4.83984 7.07232 4.83984 8.20312C4.83984 8.65618 5.2071 9.02344 5.66016 9.02344C6.11321 9.02344 6.48047 8.65618 6.48047 8.20312C6.48047 7.97696 6.66446 7.79297 6.89062 7.79297C7.11679 7.79297 7.30078 7.97696 7.30078 8.20312C7.30078 8.65618 7.66804 9.02344 8.12109 9.02344C8.57415 9.02344 8.94141 8.65618 8.94141 8.20312ZM15.933 19.4868C16.3205 19.2521 16.4443 18.7477 16.2096 18.3602C15.9749 17.9727 15.4704 17.8488 15.083 18.0835C13.7051 18.9182 12.1203 19.3594 10.5 19.3594C5.61492 19.3594 1.64062 15.3851 1.64062 10.5C1.64062 5.61492 5.61492 1.64062 10.5 1.64062C15.3851 1.64062 19.3594 5.61492 19.3594 10.5C19.3594 12.2468 18.8399 13.9471 17.8571 15.4172C17.6053 15.7938 17.7065 16.3032 18.0832 16.555C18.4598 16.8069 18.9693 16.7056 19.221 16.329C20.3848 14.5882 21 12.5726 21 10.5C21 7.69535 19.9078 5.05858 17.9246 3.07535C15.9414 1.09221 13.3046 0 10.5 0C7.69535 0 5.05858 1.09221 3.07535 3.07535C1.09221 5.05858 0 7.69535 0 10.5C0 13.3046 1.09221 15.9414 3.07535 17.9246C5.05858 19.9078 7.69535 21 10.5 21C12.4201 21 14.2987 20.4768 15.933 19.4868ZM14.0273 11.9355C13.7603 11.9355 13.5237 12.0638 13.3739 12.2614C13.3739 12.2614 12.3067 13.4121 10.5 13.4121C8.69326 13.4121 7.62612 12.2614 7.62612 12.2614C7.47633 12.0638 7.23975 11.9355 6.97266 11.9355C6.5196 11.9355 6.15234 12.3028 6.15234 12.7559C6.15234 12.9893 6.25029 13.1994 6.4068 13.3488C6.55516 13.5133 8.01047 15.0527 10.5 15.0527C12.9895 15.0527 14.4448 13.5133 14.5932 13.3488C14.7497 13.1994 14.8477 12.9893 14.8477 12.7559C14.8477 12.3028 14.4804 11.9355 14.0273 11.9355Z"
                            fill="white"
                        />
                    </svg>
                </div>
                <div
                    slot="emoji-picker"
                    slot-scope="{ emojis, insert, display }"
                >
                    <div
                        class="emoji-picker"
                        :style="{
                            top: display.y + 'px',
                            left: display.x + 'px'
                        }"
                    >
                        <div class="emoji-picker__search">
                            <input type="text" v-model="search" v-focus />
                        </div>
                        <div>
                            <div
                                v-for="(emojiGroup, category) in emojis"
                                :key="category"
                            >
                                <h5>{{ category }}</h5>
                                <div class="emojis">
                                    <span
                                        v-for="(emoji, emojiName) in emojiGroup"
                                        :key="emojiName"
                                        @click="insert(emoji)"
                                        :title="emojiName"
                                        >{{ emoji }}</span
                                    >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </emoji-picker>
        </div>
        <button
            class="chat-container-footer--submit"
            v-on:click="sendMessage"
            :disabled="archiveForm"
        >
            <svg class="icon icon-send ">
                <use xlink:href="/static/img/svg/symbol/sprite.svg#send"></use>
            </svg>
        </button>
    </div>
</template>

<script>
import Event from "../event.js";
import EmojiPicker from "vue-emoji-picker";
const { detectMobile } = require("../utils/mobileDetection");
export default {
    components: {
        EmojiPicker
    },
    props: {
        msg: null,
        reply: null,
        type: null,
        receiver: null,
        supportId: null,
        roomId: null,
        listingId: null,
        archiveForm: false,
        answerDes: null
    },
    data() {
        return {
            body: "",
            file: null,
            file_name: "",
            file_type: "",
            search: "",
            editedMessage: {},
            imageFile: null,
            emojiOpened: true,
            messageReply: null,
            emojiVisible: false,
            receiver_id: null
        };
    },
    directives: {
        focus: {
            inserted(el) {
                el.focus();
            }
        }
    },
    mounted() {
        if (this.receiver != null) {
            console.log('receiver_id',  this.receiver.id)
            this.receiver_id = this.receiver.id;
        }
        Event.$on("messageActionHandlerBox", m => {
            if (m.action.name == "editMessage" && m.type == this.type) {
                this.resetMessage();
                if (
                    m.message.attach_type == ".jpg" ||
                    m.message.attach_type == ".png" ||
                    m.message.attach_type == ".jpeg"
                )
                    this.imageFile = m.message.attach;
                else this.file = m.message.attach;
                this.body = m.message.body;
                this.editedMessage = { ...m };
                this.editedMessage.id = m.message.id;
                this.editedMessage.created_at = m.message.created_at;
                setTimeout(() => this.resizeTextarea(), 0);
            }
        });
        window.addEventListener("keyup", e => {
            if (e.keyCode === 13 && !e.shiftKey) {
                if (detectMobile()) {
                    this.message = this.message + "\n";
                    setTimeout(() => this.onChangeInput(), 0);
                } else {
                    this.sendMessage();
                }
            }
        });

    },
    methods: {
        append(emoji) {
            if (this.body == null) this.body = "";
            this.body += emoji;
        },
        resetMessage(disableMobileFocus = null, editFile = null) {
            this.$emit("typingMessage", null);

            if (editFile) {
                this.file = null;
                this.message = "";
                return;
            }

            this.resetTextareaSize();
            this.body = "";
            this.editedMessage = {};
            this.messageReply = null;
            this.file = null;
            this.imageFile = null;
            this.emojiOpened = false;
            this.emojiVisible = false;
            setTimeout(() => this.focusTextarea(disableMobileFocus), 0);
        },
        resetTextareaSize() {
            if (!this.$refs["roomTextarea"]) return;
        },
        focusTextarea(disableMobileFocus) {
            if (detectMobile() && disableMobileFocus) return;
            this.$refs["roomTextarea"].focus();
        },
        resizeTextarea() {
            const el = this.$refs["roomTextarea"];

            const padding = window
                .getComputedStyle(el, null)
                .getPropertyValue("padding-top")
                .replace("px", "");
        },
        onFileChange(e) {
            this.resetImageFile();
            this.file = e.target.files[0];
            let FileSize = this.file.size / 1024 / 1024; // in MB
            if (FileSize > 8) {
                alert("File size exceeds 8 MB");
                this.file = "";
            }
            this.file_name = this.file.name.split(".")[0];
            this.file_type = this.file.name.split(".")[1];
            const fileURL = URL.createObjectURL(this.file);
            if (this.isImageCheck(this.file)) this.imageFile = fileURL;
            else this.file_name = this.file.name;
        },
        resetImageFile() {
            console.log('reset');
            this.imageFile = null;
            this.editedMessage.file = null;
            this.file = null;
            this.focusTextarea();
        },
        isImageCheck(file) {
            if (!file) return;
            const imageTypes = ["png", "jpg", "jpeg", "svg"];
            const { type } = file;
            return imageTypes.some(t => type.includes(t));
        },
        typing(e) {
            if (e.keyCode === 13 && !e.shiftKey) {
                this.sendMessage(e);
            }
        },
        sendMessage(event) {
            // event.preventDefault();
            if (!this.file && !this.body.trim()) return;

            const config = {
                headers: { "content-type": "multipart/form-data" }
            };

            let formData = new FormData();
            if (this.body !== null) {
                formData.append("body", this.body.trim());
            }

            if (this.editedMessage.id) {
                if (this.body !== null || this.file !== "") {
                    let editedId = this.editedMessage.id;
                    let newContent = this.body.trim();
                    let file = this.file;
                    let replyMessage = this.messageReply;
                    let created_at = this.editedMessage.created_at;
                    formData.append("message_id", editedId);
                    formData.append("type", this.type);
                    axios
                        .post("/messageEdit", formData, config)
                        .then(response => {
                            let messageObj = {
                                id: editedId,
                                body: newContent,
                                file: file,
                                replyMessage: replyMessage,
                                type: this.type,
                                created_at: created_at
                            };
                            Event.$emit("editMessage", messageObj);
                        })
                        .catch(function(error) {
                            console.log(error);
                        });
                }
            } else {
                formData.append("receiver_id", this.receiver_id);
                formData.append("room_id", this.roomId);
                formData.append("listing_id", this.listingId);
                formData.append("file", this.file);
                if (this.messageReply) {
                    formData.append("reply_message_id", this.messageReply.id);
                    formData.append("replyContent", this.messageReply.body);
                    formData.append("replyName", this.messageReply.senderName);
                } else {
                    formData.append("reply_message_id", null);
                }

                if (this.body !== null || this.file !== "") {
                    if(this.body == null) formData.append("body", ""); 
                    let message = this.body;
                    let messageReply = this.messageReply;
                    formData.append("type", this.type);

                    switch (this.type) {
                        case "driver":
                            axios
                                .post("/driver_message", formData, config)
                                .then(response => {
                                    let messageObj = this.buildMessage(
                                        response,
                                        message,
                                        this.filterTime(),
                                        messageReply
                                    );

                                    messageObj.listing_id = this.listingId;
                                    messageObj.type = this.type;
                                    Event.$emit("added_message", messageObj);
                                })
                                .catch(function(error) {
                                    console.log(error);
                                });
                            break;
                        case "passenger":
                            axios
                                .post("/driver_message", formData, config)
                                .then(response => {
                                    let messageObj = this.buildMessage(
                                        response,
                                        message,
                                        this.filterTime(),
                                        messageReply
                                    );
                                    messageObj.type = this.type;
                                    messageObj.listing_id = this.listingId;
                                    Event.$emit("added_message", messageObj);
                                })
                                .catch(function(error) {
                                    console.log(error);
                                });
                            break;
                        case "support":
                            formData.append("support_id", this.supportId);
                            axios
                                .post("/support_admin_message", formData, config)
                                .then(response => {
                                    let messageObj = this.buildMessage(
                                        response,
                                        message,
                                        this.filterTime(),
                                        messageReply
                                    );
                                    messageObj.type = this.type;
                                    Event.$emit("support_added_message", messageObj);
                                })
                                .catch(function(error) {
                                    console.log(error);
                                });
                            break;
                        case "supportAdmin":
                            formData.append("support_id", this.supportId);
                            axios
                                .post("/support_admin_message", formData, config)
                                .then(response => {
                                    let messageObj = this.buildMessage(
                                        response,
                                        message,
                                        this.filterTime(),
                                        messageReply
                                    );
                                    messageObj.type = this.type;
                                    Event.$emit("support_added_message", messageObj);
                                })
                                .catch(function(error) {
                                    console.log(error);
                                });
                            break;
                        case "admin":
                            axios
                                .post("/admin_message", formData, config)
                                .then(response => {
                                    let messageObj = this.buildMessage(
                                        response,
                                        message,
                                        this.filterTime(),
                                        messageReply
                                    );
                                    messageObj.type = this.type;
                                    Event.$emit("added_message", messageObj);
                                })
                                .catch(function(error) {
                                    console.log(error);
                                });
                            break;
                        default:
                    }
                }
            }
            this.resetMessage(true);
        },
        buildMessage(response, message, created_at, messageReply) {
            const attach_url = response.data.message.attach_url;
            const attach_name = response.data.message.attach_name;
            const attach_type = response.data.message.attach_type;
            const replyMessage = messageReply == null ? null : messageReply;
            const replyName =
                messageReply == null ? null : messageReply.senderName;
            const replyContent =
                messageReply == null ? null : messageReply.body;
            return {
                id: response.data.message.id,
                body: message,
                selfMessage: true,
                created_at: created_at,
                attach_url: attach_url,
                attach_name: attach_name,
                attach_type: attach_type,
                replyMessage: replyMessage,
                replyName: replyName,
                replyContent: replyContent,
                user: {
                    name: Laravel.user.name,
                    avatar: Laravel.user.avatar
                }
            };
        },
        filterTime() {
            let now = new Date();
            let year = "" + now.getUTCFullYear();
            let month = "" + (now.getUTCMonth() + 1);
            if (month.length == 1) {
                month = "0" + month;
            }
            let day = "" + now.getUTCDate();
            if (day.length == 1) {
                day = "0" + day;
            }
            let hour = "" + now.getUTCHours();
            if (hour.length == 1) {
                hour = "0" + hour;
            }
            let minute = "" + now.getUTCMinutes();
            if (minute.length == 1) {
                minute = "0" + minute;
            }
            let second = "" + now.getUTCSeconds();
            if (second.length == 1) {
                second = "0" + second;
            }
            return (
                year +
                "-" +
                month +
                "-" +
                day +
                " " +
                hour +
                ":" +
                minute +
                ":" +
                second
        );
        },
        checkMessage() {
            console.log('checked');
            switch (this.type) {
                case "driver":
                    axios
                        .post("/message_unread", {
                            sender_id: this.receiver_id,
                            room_id: this.roomId,
                            type: this.type
                        })
                        .then(response => {
                            Event.$emit("read_message", response);
                        })
                        .catch(function(error) {
                            console.log(error);
                        });
                
                    break;
                case "passenger":
                    axios
                        .post("/message_unread", {
                            sender_id: this.receiver_id,
                            room_id: this.roomId,
                            type: this.type
                        })
                        .then(response => {
                            Event.$emit("read_message", response);
                        })
                        .catch(function(error) {
                            console.log(error);
                        });
                
                    break;
                case "admin":
                    axios
                        .post("/message_unread", {
                            type: this.type,
                            receiver_id: this.receiver.id
                        })
                        .then(response => {
                            Event.$emit("read_message", response);
                        })
                        .catch(function(error) {
                            console.log(error);
                        });
                
                    break;
                
                default:
                // preventDefault();
            }
        }
    },
    watch: {
        msg: function() {
            // this.messageList.push(this.msg);
            this.receiver_id = this.msg;
            // this.messageReply = this.msg[0];
        },
        reply: function() {
            // this.messageList.push(this.msg);
            this.messageReply = this.reply;
        },
        answerDes: function() {
            this.body = this.answerDes;
            this.$refs["roomTextarea"].focus();
        },
        receiver: function() {
            if (this.receiver != null) {
                this.receiver_id = this.receiver.id;
            }
        }
    }
};
</script>
<style>
    .chat-container--edit--message--file--add{
        display: flex;
    }
</style>