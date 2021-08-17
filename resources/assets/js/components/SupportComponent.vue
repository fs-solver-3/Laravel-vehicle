<template>
    <div
        class="col-xl-12 col-lg-12 personal-chat-container personal-fixed-chat--container active chat-container-992"
    >
        <div class="chat-container-block d-flex flex-column">
            <support-header-com 
                :user="support" 
                :back="backlink"
                :type="type"
                :demand="demand"
                @selectMessage="selectMessages"
                @deleteMultiMessage="deleteMulti"
                @fastAnswer="fastAnswer"
            ></support-header-com>
            <div class="chat-container-main d-shrink-not">
                <div class="chat-container-main--info">
                    <div class="chat-message-lists">
                        <div class="chat-block" v-for="(messagesby, date) in messages_dates">
                            <div class="chat-container-main-last--date">{{ filterDate(date) }}</div>
                            <message-com
                                v-for="(message, index) in messagesby"
                                :key="index"
                                :message="message"
                                :messageArchive="messageArchive"
                                :messageActions="messageActions"
                                :selectMessage="selectMessage"
                                @messageActionHandler="messageActionHandler"
                                @checkMessageHandler="checkMessageHandler"
                                :type="type" 
                            >
                            </message-com>
                        </div>
                        <div class="chat-block">
                            <div class="chat-container-main-last--date">Cегодня</div>
                            <message-com
                                v-for="(message, index) in messages"
                                :key="index"
                                :message="message"
                                :messageArchive="messageArchive"
                                :messageActions="messageActions"
                                :selectMessage="selectMessage"
                                @messageActionHandler="messageActionHandler"
                                @checkMessageHandler="checkMessageHandler"
                                :type="type" 
                            >
                            </message-com>
                        </div>
                    </div>
                </div>
            </div>
            <div class="chat-container-footer d-shrink-available">
                <form-com 
                    :reply="messageReply"
                    :type="type" 
                    :receiver="support" 
                    :roomId="room"
                    :answerDes="answerChoose"
                    :supportId="support.id"
                ></form-com>
            </div>
        </div>
         <transition name="modal" v-if="showModal" @close="showModal = false" >
            <div class="modal-mask fast-answer-modal" >
                <div class="modal-wrapper" >
                    <div class="modal-container" v-click-outside="closeModal" >
                        <div class="modal-body">
                            <slot name="body">
                                <h4>Выберите ответ</h4>
                            </slot>
                            <div class="row">
                                <div class="col-sm-6">
                                    <input class="form-control" type="text" v-model="search"  placeholder="Search lesson or user name.." @keyup="searchAnswer" />
                                </div>
                                <div class="col-sm-6">
                                    <select class="form-control chosen-select select2" id="state" name="state" placeholder="Учителя..."  @change="categoryChange($event)">
                                        <option value="all">All</option>
                                        <option :value="category.id" v-for="(category, index) in this.demandcategories">{{ category.name }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="answers_lists">
                                <div class="answers_list"  v-for="(answer, index) in filtered_answers">
                                    <div class="row no-margins">
                                        <div class="answer-title pull-left">
                                            <span>{{ answer.name }}</span>
                                        </div>
                                        <div class="answer-select pull-right"  v-on:click="answerSelect(answer.description)">
                                            Выбрать
                                        </div>
                                    </div>
                                    <div class="answer-des">
                                        <p>{{ answer.description }}</p>
                                    </div>
                                    <div class="answer-link">
                                        <a href="#">{{ answer.link }}</a>
                                    </div>
                                </div>
                            </div>
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
    directives: {
        clickOutside: vClickOutside.directive
    },
    props: {
        support: null,
        type: null,
        room: null,
        backlink: null,
        msg: null,
        msgtoday: null,
        demand: {
            type: Object
        },
        receiver: null,
        answers: null,
        search: '',
        answerChoose: '',
        demandcategories: null,
        messageActions: {
            type: Array,
            default: () => [
                { name: "replyMessage", title: "Ответить", icon: "reply.svg" },
                {
                    name: "editMessage",
                    title: "Изменить",
                    onlyMe: true,
                    icon: "pencil.svg"
                },
                {
                    name: "deleteMessage",
                    title: "Удалить",
                    onlyMe: true,
                    icon: "delete.svg"
                }
            ]
        },
        menuOptions: {
            type: Array,
            default: () => [
                { name: "archive", title: "Архивировать", icon: "archive.svg", active: true },
                {
                    name: "active",
                    title: "Aктивный",
                    icon: "archive.svg",
                    active: false
                },
                {
                    name: "select_message",
                    title: "Выбрать сообщение",
                    icon: "checked_message.svg",
                    active: true
                }
            ]
        },
    },
    data() {
        return {
            messages: [],
            messages_dates: [],
            messageReply: null,
            hideOptions: true,
            optionsOpened: false,
            scrollIcon: false,
            selectMessage: false,
            checkedMessaged: [],
            room_id: null,
            showModal: false,
            messageArchive: false,
            filtered_answers: []

        };
    },
    mounted() {
        this.messages = this.msgtoday;
        this.messages_dates = this.msg;
        this.filtered_answers = this.answers;
        Event.$on("support_added_message", message => {
            message.sender_avatar = message.user.avatar;
            message.sender_name = message.user.name;
            if(message.type == 'support' || message.type == 'supportAdmin'){
                if((message.room_id == this.room) || message.selfMessage == true){
                    this.messages.push(message);
                }
            }
            const height = $(".chat-message-lists").height();
            $(".chat-container-main--info").animate({ scrollTop: height });
        });

       Event.$on("editMessage", m => {
            // if(m.type == 'admin' || m.type == "lesson"){
                var mydate = new Date(m.created_at);
                const newMessage = { body: m.newContent };
                if(this.isToday(mydate)){
                    this.messages = this.messages.filter(u => {
                        if (u.id == m.id) {
                            u.body = m.body;
                            u.edited = true;
                        }
                        return u;
                    });
                }
                else{
                    this.messages_dates[this.formatDate(mydate)] = this.messages_dates[this.formatDate(mydate)].filter(u => {
                        if (u.id == m.id) {
                            u.body = m.body;
                            u.edited = true;
                        }
                        return u;
                    });
                }
            // }
        });

        Event.$on("deleteMessage", m => {
                var mydate = new Date(m.created_at);
                if(this.isToday(mydate)){
                    this.messages = this.messages.filter(u => {
                        if (u.id == m.id) {
                            u.deleted = true;
                        }
                        return u;
                    });
                }
                else{
                    this.messages_dates[this.formatDate(mydate)] = this.messages_dates[this.formatDate(mydate)].filter(u => {
                        if (u.id == m.id) {
                            u.deleted = true;
                        }
                        return u;
                    });
                }
                
            // }
        });

    },
    methods: {
            messageActionHandler({ action, message, key }) {
            switch (action.name) {
                case "replyMessage":
                    return this.replyMessage(message);
                case "editMessage":
                    return;
                // return this.editMessage(message)
                case "deleteMessage":
                    return this.deleteMessage(message, key);
                default:
                    return this.$emit("messageActionHandler", {
                        action,
                        message
                    });
            }
        },
        checkMessageHandler({ message, key, checked }) {
            if (checked) {
                this.checkedMessaged.push(message.id);
            } else {
                this.checkedMessaged = this.checkedMessaged.filter(u => {
                    if (message.id != u) return u;
                });
            }
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
        deleteMessage(message, key) {
            const config = {
                headers: { "content-type": "multipart/form-data" }
            };
            let formData = new FormData();
            formData.append("message_id", message.id);
            formData.append("type", this.type);
            axios
                .post("/messageDelete", formData, config)
                .then(response => {
                    let messageObj = {
                        message: message
                    };
                    // this.messages[key].deleted = true;
                    this.messages = this.messages.filter(u => {
                        if (u.id == message.id) {
                            u.deleted = true;
                        }
                        return u;
                    });
                    Event.$emit("deleteMessage", messageObj);
                    // message.deleted = true;
                    // this.messages[.push(message)];
                    // this.messages.splice(key, 1);
                })
                .catch(function(error) {
                    console.log(error);
                    // currentObj.output = error;
                });

        },
        deleteMulti() {
            const config = {
                headers: { "content-type": "multipart/form-data" }
            };
            let formData = new FormData();
            formData.append("message_ids", this.checkedMessaged);
            axios
                .post("/messageDeleteMulti", formData, config)
                .then(response => {
                    this.messages = this.messages.filter(u => {
                        if (this.checkedMessaged.includes(u.id)) {
                            u.deleted = true;
                        }
                        return u;
                    });
                    this.selectMessage = false;
                    this.showModal = false;
                })
                .catch(function(error) {
                    console.log(error);
                    // currentObj.output = error;
                });

        },
        replyMessage(message) {
            // this.resetMessage();
            this.messageReply = message;
        },
        archive() {
            this.messageArchive = !this.messageArchive;
            this.menuOptions[0].active = !this.menuOptions[0].active;
            this.menuOptions[1].active = !this.menuOptions[1].active;
            const config = {
                headers: { "content-type": "multipart/form-data" }
            };
            let formData = new FormData();
            formData.append("lessons_id", this.lessons_id);
            formData.append("archive", this.menuOptions[1].active);
            axios
            .post("/roomArchive", formData, config)
            .then(response => {
               console.log('success');
            });
        },
        selectMessages(e){
            this.selectMessage = e;
        },
        fastAnswer() {
            this.showModal = !this.showModal;
        },
        closeModal(){
            this.showModal = false;
        },
        categoryChange(c){
            if(c.target.value == "all"){
                this.filtered_answers = this.answers;
            }
            else{
                const filtered_answers = [];
                this.answers.filter(u => {
                    if(u.demand_category_id == c.target.value){
                        filtered_answers.push(u);
                    } 
                });
                this.filtered_answers = filtered_answers;
            }
            return this.filtered_answers;
        },
        searchAnswer(){
            const filtered_answers = [];
            this.answers.filter(u => {
                if(u.name.toLowerCase().includes(this.search) || u.description.toLowerCase().includes(this.search)){
                    filtered_answers.push(u);
                } 
            });
            this.filtered_answers = filtered_answers;
            return this.filtered_answers;
        },
        answerSelect(des) {
            this.showModal = !this.showModal;
            this.answerChoose = des;
        },
        filterDate(s) { 
            const months = 'Jan Feb Mar Apr May Jun Jul Aug Sep Oct Nov Dec'.split(' ');
            var b = s.toString().split(/\D/);
            return b[2] + ' ' + months[b[1]-1];
        },
        isToday(date) {
            const today = new Date()
            return date.getDate() === today.getDate() &&
                date.getMonth() === today.getMonth() &&
                date.getFullYear() === today.getFullYear();
        },
        formatDate(date) {
            var d = new Date(date),
                month = '' + (d.getMonth() + 1),
                day = '' + d.getDate(),
                year = d.getFullYear();

            if (month.length < 2) 
                month = '0' + month;
            if (day.length < 2) 
                day = '0' + day;

            return [year, month, day].join('-');
        }
    }
};
</script>
