<template>
    <div class="admin-notification">
        <span class="label label-warning" v-if="unread_total > 0">{{unread_total}}</span>
        <div class="notification_modal gogocar-box">
            
            <div class="unsigned chats-bottom-users--item" v-for="(room, index) in this.rooms" v-on:click="chooseRoom(room, 'admin')">
                <a :href="'/ru/admin/users/chat/' + room.sender_id" >
                    <div class="chats-bottom-users--item__top" > 
                        <div class="chats-bottom-users--left" :style="{backgroundImage: `url(/${room.sender_avatar})`}" v-if="room.sender_avatar != null"></div>
                        <div class="chats-bottom-users--left"
                                style="background-image:url('/static/img/content/drivers-avatar/driver1.png');"
                                v-if="room.sender_avatar == null"
                        ></div>
                        <div class="chats-bottom-users--right"> 
                        <div class="chats-bottom-users--right__name">{{ room.sender_name }}</div>
                            <div class="chats-bottom-users--right__theme" >{{ room.page_name }}</div>
                        </div>
                    </div>
                    <div class="chats-bottom-users--item__bottom">
                        <div class="chats-bottom-users--item__msg" v-if="room.last_message != null">
                            <span v-if="room.last_message.length >= 20">{{ room.last_message.substring(0, 20)}}...</span>
                            <span  v-if="room.last_message.length < 20">
                                {{ room.last_message}}
                            </span>
                        </div>
                        <div class="chats-bottom-users--item__notif you-trip-chat-message--count" v-if="room.unread > 0">{{ room.unread}}</div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</template>

<script>
import Event from "../event.js";

export default {
    data() {
        return {
            search: "",
            channels: [],
            rooms: [],
            filtered_channels: [],
            online_users: [],
            demands: [],
            activeIndex: null,
            checked: [],
            unread_total: 0
        };
    },

    mounted() {
       
        Event.$on("added_message", message => {
            if(message.selfMessage != true){
                axios
                .get("/fetch_admin_message_notifcation", {
                    params: {}
                })
                .then(response => {
                    this.unread_total = response.data.unread_total;
                });
            }
        });

        Event.$on("read_message", message => {
            // console.log(message);
            if(message.selfMessage != true){
                let position;
                this.channels = this.channels.filter(u => {
                    if (
                        u.user.id == message.student_id &&
                        u.lessons_id == message.lessons_id
                    ) {
                        this.unread_total = this.unread_total - u.unread;
                        u.unread = 0;
                        position = this.channels.indexOf(u);
                    }
                    return u;
                });
                this.filtered_channels = this.channels;
                axios
                    .post("/message_unread", {
                        student_id: message.student_id,
                        lessons_id: message.lessons_id,
                        unread: 0
                    })
                    .catch(() => {
                        console.log("failed");
                    });
            }
        });

        axios
            .get("/fetch_admin_message_notifcation", {
                params: {}
            })
            .then(response => {
                this.unread_total = response.data.unread_total;
                this.rooms = response.data.rooms;
            });
        
    },
    methods: {
        users_filter(online_users) {
            for (var key in online_users) {
                var obj = online_users[key];
                this.channels = this.channels.filter(u => {
                    if (u.user != null) {
                        if (u.user.id == obj.id) {
                            u.state = "online";
                        }
                        return u;
                    }
                });

                // ...
            }
            return this.channels;
        },
        supports_filter(online_users) {
            for (var key in online_users) {
                var obj = online_users[key];
                this.support_messages = this.support_messages.filter(u => {
                    if (u.user_id == obj.id) {
                        u.state = "online";
                    }
                    return u;
                });
            }
            return this.support_messages;
        },
        online_users_filter(users) {
            this.online_users = users.filter(u => {
                return u.id != 1;
            });
            return this.online_users;
        },
        student: function(user_id, lesson_id, channel_id) {
            this.$emit("inputData", user_id, lesson_id);
            this.activeIndex = channel_id;
        },
        array_move: function(arr, old_index, new_index) {
            if (new_index >= arr.length) {
                var k = new_index - arr.length + 1;
                while (k--) {
                    arr.push(undefined);
                }
            }
            arr.splice(new_index, 0, arr.splice(old_index, 1)[0]);
            return arr; // for testing
        },
        submitSearch: function() {
            // console.log('submit');
            var filtered_channels = [];
            this.channels.filter(u => {
                if (
                    u.user.name.toLowerCase().includes(this.search) ||
                    u.lesson.name.toLowerCase().includes(this.search)
                ) {
                    filtered_channels.push(u);
                }
            });
            this.filtered_channels = filtered_channels;
            return this.filtered_channels;
        }
    }
};
</script>
