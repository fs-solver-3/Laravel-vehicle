<template>
    <div
        class="col-xl-9 col-lg-8 chat-container personal-fixed-chat--container chat-container-992 driver-room personal-chat-container"
    >
        <div class="chat-container-block">
            <header-passenger-com
                :user="user" 
                @selectMessage="selectMessages"
                @deleteMultiMessage="deleteMulti"
                @archeiveRoom="archive"
                :menuOptions="menuOptions"
                type="person"
            ></header-passenger-com>
            <div class="chat-container-main">
                <div class="chat-container-main--info ">
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
            <div class="chat-container-footer">
                <form-com 
                    :reply="messageReply"
                    :type="type" 
                    :receiver="user" 
                    :listingId="listing"
                    :roomId="roomId"
                    :archiveForm="messageArchive"
                ></form-com>
            </div>
        </div>
    </div>
</template>

<script>
import Event from "../event.js";
export default {
    props: {
        user: {
            type: Object
        },
        type: null,
        listing: null,
        roomId: null,
        adminId: null,
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
        };
    },
    mounted() {
        // Event.$on("admin_added_message", message => {
        //       message.sender_avatar = message.user.avatar;
        //       message.sender_name = message.user.name;
        //       if(message.type == 'admin'){
        //           if((message.receiver_id == Laravel.user.id) || message.selfMessage == true){
        //               this.messages.push(message);
        //           }
        //       }
        //       const height = $(".chat-container-main--info").height();
        //       $(".chat-container-main").animate({ scrollTop: height });
        // });

        Event.$on("added_message", message => {
            console.log('added_message', message);
            message.sender_avatar = message.user.avatar;
            message.sender_name = message.user.name;
            if(message.selfMessage == true){
                this.messages.push(message);
            }
            else if(message.type == 'passenger' ){
                if(message.receiver_id == Laravel.user.id && message.room_id == this.roomId){
                    this.messages.push(message);
                }
            }
            else if(message.type == 'driver'){
                if(message.receiver_id == Laravel.user.id && message.room_id == this.roomId){
                    this.messages.push(message);
                }
            }
            const height = $(".driver-room .chat-container-main--info").height();
            $(".driver-room .chat-container-main").animate({ scrollTop: height });
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
        Event.$on("users.here", online_users => {});
       
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
                    // let messageObj = {
                    //     message: message
                    // };
                    // this.messages[key].deleted = true;
                    this.messages = this.messages.filter(u => {
                        if (u.id == message.id) {
                            u.deleted = true;
                        }
                        return u;
                    });
                    Event.$emit("deleteMessage", message);
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
            formData.append("room_id", this.roomId);
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
        filterTime() {
            let now = new Date();
            let year = "" + now.getFullYear();
            let month = "" + (now.getMonth() + 1);
            if (month.length == 1) {
                month = "0" + month;
            }
            let day = "" + now.getDate();
            if (day.length == 1) {
                day = "0" + day;
            }
            return (
                day + "-" +
                month + "-" +
                year 
            );
        },
        filterDate(s) { 
            const months = 'январь февраль март апрель май июнь июль август сентябрь октябрь ноябрь декабрь'.split(' ');
            var b = s.toString().split(/\D/);
            return b[2] + ' ' + months[b[1]-1];
        },
        isToday(date) {
            const today = new Date()
            return date.getDate() === today.getUTCDate() &&
                date.getMonth() === today.getUTCMonth() &&
                date.getFullYear() === today.getUTCFullYear();
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
    },
    watch: {
            roomId: function() {
                if(this.type == 'admin'){
                    axios
                    .get("/fetch_admin_message", {
                    })
                    .then(response => {
                        this.room_id = response.data.room_id;
                        this.messageArchive = response.data.archive;
                        this.messages_dates = response.data.messages_dates;
                        this.messages = response.data.today_messages;
                        if(response.data.archive){
                            this.menuOptions[1].active = true;
                            this.menuOptions[0].active = false;
                        }
                        else{
                            this.menuOptions[0].active = true;
                            this.menuOptions[1].active = false;
                        }
                        if(this.messages.length == 0){
                            this.menuOptions[2].active = false;
                        }
                        else{
                            this.menuOptions[2].active = true;
                        }
                    });
                }
                else if(this.type == 'passenger' || this.type == 'driver'){

                    axios
                        .get("/fetch_driver_message", {
                            params: {
                                room_id: this.roomId
                            }
                        })
                        .then(response => {
                            // this.messages = response.data.message;
                            this.room_id = response.data.room_id;
                            this.messageArchive = response.data.archive;
                            this.messages_dates = response.data.messages_dates;
                            this.messages = response.data.today_messages;
                            
                            if(response.data.archive){
                                this.menuOptions[1] && (this.menuOptions[1].active = true);
                                this.menuOptions[0] && (this.menuOptions[0].active = false);
                            }
                            else{
                                this.menuOptions[0].active = true;
                                this.menuOptions[1] && (this.menuOptions[1].active = false);
                            }
                            if(this.messages.length == 0 && this.messages_dates.length == 0){
                                this.menuOptions[2] && (this.menuOptions[2].active = false);
                            }
                            else{
                                this.menuOptions[2] && (this.menuOptions[2].active = true);
                            }
                        });
                }
            }
        }
};
</script>
