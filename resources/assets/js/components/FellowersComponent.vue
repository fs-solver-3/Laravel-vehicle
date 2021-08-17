<template>
    <div
        class="col-xl-3 col-lg-4 chat-content--info you-trip-driver-chat"
    >
        <div
            class="chat-content--info__driver--review chat-content--info--frontside gogocar-box"
        >
            <div class="chat-content--info__driver--review--header">
                <span class="chat-content--info__driver--title">Попутчики</span>
                <div class="chat-container-header--option--archive">
                    <div
                        class="chat-container-header--option gogocar-gray-icons chat-container--archive"
                    >
                        <svg class="icon icon-option ">
                            <use
                                xlink:href="/static/img/svg/symbol/sprite.svg#option"
                            ></use>
                        </svg>
                    </div>
                    <div
                        class="chat-container-option--archive chat-all-archive"
                    >
                        <div class="chat-container-option--message--item">
                            <svg class="icon icon-folder ">
                                <use
                                    xlink:href="/static/img/svg/symbol/sprite.svg#folder"
                                ></use></svg
                            ><span>Архив</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="chat-content--info__driver--review--wrap">
                <div class="you-trip-chat-content">
                    <div
                        class="chat-content--info__driver--review--content chat-fixed--click-2 driver_message"
                        v-for="(room, index) in this.rooms"
                        v-on:click="chooseRoom(room)"
                    >
                        <div class="chat-content--review__trip--profile">
                            <div class="chat-content--review__trip--info">
                                <div
                                    class="chat-content--review__trip--info__img"
                                     :style="{
                                        backgroundImage: `url(/${room.sender_avatar})`
                                    }"
                                    v-if="room.sender_avatar != null"
                                ></div>
                                <div
                                    class="chat-content--review__trip--info__img"
                                    style="background-image:url('/static/img/content/drivers-avatar/driver1.png');"
                                    v-if="room.sender_avatar == null"
                                ></div>
                                <div
                                    class="chat-content--review__trip--name__trip"
                                >
                                    <div class="chat-message-to-archive--wrap">
                                        <span
                                            class="chat-content--review__trip--name"
                                            >{{ room.sender_name }}</span
                                        >
                                        <div
                                            class="chat-message-to-archive--arrow-wrap"
                                        >
                                            <div
                                                class="chat-message-to-archive--arrow"
                                            >
                                                <svg
                                                    class="icon icon-arrow-right "
                                                >
                                                    <use
                                                        xlink:href="/static/img/svg/symbol/sprite.svg#arrow-right"
                                                    ></use>
                                                </svg>
                                            </div>
                                        </div>
                                        <div
                                            class="chat-container-option--archive chat-to-archive"
                                        >
                                            <div
                                                class="chat-container-option--message--item chat-item--archive"
                                            >
                                                <svg class="icon icon-folder ">
                                                    <use
                                                        xlink:href="/static/img/svg/symbol/sprite.svg#folder"
                                                    ></use></svg
                                                ><span>Архивировать</span>
                                            </div>
                                            <div
                                                class="chat-container-option--message--item chat-item--restore"
                                            >
                                                <svg class="icon icon-restore ">
                                                    <use
                                                        xlink:href="/static/img/svg/symbol/sprite.svg#restore"
                                                    ></use></svg
                                                ><span>Восстановить</span>
                                            </div>
                                        </div>
                                    </div>
                                    <span
                                        class="chat-content--review__trip--trip"
                                        >{{ room.last_message_at }}</span
                                    >
                                </div>
                            </div>
                        </div>
                        <div class="you-trip-chat-content--text">
                            <p class="chat-content--review__trip--text">
                                {{ room.last_message }}
                            </p>
                            <div
                                class="you-trip-chat-message--count"
                                v-if="room.unread != null && room.unread > 0"
                            >
                                {{ room.unread }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Event from "../event.js";
export default {
     props: {
        trip_id: null
      },
    data() {
        return {
            search: "",
            rooms: [],
            filter_rooms: [],
            filtered_channels: [],
            online_users: [],
            activeIndex: null,
            teacherId: null,
            checked: [],
            profile_url: "/",
        };
    },
    mounted() {
        this.profile_url = window.profile_url;
        axios
            .get("/fetch_fellowers", {
                params: {
                    trip_id: this.trip_id
                }
            })
            .then(response => {
                this.rooms = response.data.rooms;
                this.filter_rooms = response.data.rooms;
                if (response.data.rooms.length > 0) {
                    this.activeIndex = response.data.rooms[0].room_id;
                    const room = {
                        id: this.activeIndex,
                        user_id: response.data.rooms[0].sender_id,
                        user_name: response.data.rooms[0].sender_name,
                        user_avatar: response.data.rooms[0].sender_avatar
                    };
                    this.$emit("inputData", room);
                }
            });

        Event.$on("read_message", message => {
            if(this.admin_message.length > 0){
                this.admin_message[0].unread = message.data.unread_admin;
                let unreads = message.data.unreads;
                if (unreads.length > 0) {
                    for (let key in unreads) {
                        let obj = unreads[key];
                        this.rooms = this.rooms.filter(r => {
                            if (r.sender_id == obj.sender_id) {
                                r.unread = obj.unread;
                            }
                            return r;
                        });
                    }
                    return this.rooms;
                }
            }
        });

        Event.$on('added_message', (message) => {
            if(message.selfMessage != true){
                let position = 0;
                let user_list = 0;
                this.rooms = this.rooms.filter(u => {
                    if(u.room_id == message.room_id){
                        u.unread += 1;
                        u.last_message = message.body;
                        position = this.rooms.indexOf(u);
                        user_list = 1;
                    }
                    return u
                });
                if(user_list == 0){
                    axios
                    .get("/fetch_fellowers", {
                        params: {
                            trip_id: this.trip_id
                        }
                    })
                    .then(response => {
                        this.rooms = response.data.rooms;
                        this.filter_rooms = response.data.rooms;
                        if (response.data.rooms.length > 0) {
                            this.activeIndex = response.data.rooms[0].room_id;
                            const room = {
                                id: this.activeIndex,
                                user_id: response.data.rooms[0].sender_id,
                                user_name: response.data.rooms[0].sender_name,
                                user_avatar: response.data.rooms[0].sender_avatar
                            };
                        }
                    });
                }
                else{
                     this.array_move(this.rooms,position, 0);
                }
            }
               
        });
    },
    methods: {
        chooseRoom(info) {
            const r = {
                id: info.room_id,
                user_id: info.sender_id,
                user_name: info.sender_name,
                user_avatar: info.sender_avatar
            };
            this.$emit("inputData", r);
        },
        submitSearch: function() {
            // console.log('submit');
            var filtered_channels = [];
            this.filter_rooms.filter(u => {
                if (u.sender_name.toLowerCase().includes(this.search)) {
                    filtered_channels.push(u);
                }
            });
            this.rooms = filtered_channels;
            return this.rooms;
        },
        array_move: function (arr, old_index, new_index) {
            if (new_index >= arr.length) {
                var k = new_index - arr.length + 1;
                while (k--) {
                    arr.push(undefined);
                }
            }
            arr.splice(new_index, 0, arr.splice(old_index, 1)[0]);
            return arr; // for testing
        },
    }
};
</script>
