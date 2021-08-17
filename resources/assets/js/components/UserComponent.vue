<template>
    <div
        class="col-xl-3 col-lg-4 col-md-12 personal-people--list perspective-chat"
    >
        <div
            class="chat-content--info__driver--review chat-content--info--frontside gogocar-box"
        >
            <div class="chat-content--info__driver--review--header">
                <a :href="profile_url">
                    <div
                        class="gogocar-gray-icons gogocar-go-back gogocar-go-back--desktop"
                    >
                        <svg class="icon icon-arrow-right ">
                            <use
                                xlink:href="/static/img/svg/symbol/sprite.svg#arrow-right"
                            ></use>
                        </svg>
                    </div>
                </a>
                <a :href="profile_url">
                    <div
                        class="gogocar-gray-icons gogocar-go-back gogocar-go-back--mobile"
                    >
                        <svg class="icon icon-arrow-right ">
                            <use
                                xlink:href="/static/img/svg/symbol/sprite.svg#arrow-right"
                            ></use>
                        </svg>
                    </div>
                </a>
                <span class="chat-content--info__driver--title">Сообщения</span>
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
            <div class="chat-content--info__driver--search">
                <input
                    class="chat-content-search-dialog"
                    type="text"
                    v-model="search"
                    @keyup="submitSearch"
                    placeholder="Поиск по диалогам"
                />
                <div class="chat-content--info__search--icon">
                    <svg class="icon icon-search ">
                        <use
                            xlink:href="/static/img/svg/symbol/sprite.svg#search"
                        ></use>
                    </svg>
                </div>
            </div>
            <div class="chat-content--info__driver--review--wrap">
                <div class="you-trip-chat-content">
                    <div
                        class="chat-content--info__driver--review--content chat-fixed--click admin_message"
                        v-if="admin_message"
                        v-on:click="chooseAdmin"
                        :class="{'active': this.type == 'admin'}"
                    >
                        <div class="chat-content--review__trip--profile">
                            <div class="chat-content--review__trip--info">
                                <div
                                    class="chat-content--review__trip--info__img"
                                    :style="{
                                        backgroundImage: `url(/${admin_message[0].sender_avatar})`
                                    }"
                                    v-if="
                                        admin_message[0].sender_avatar != null
                                    "
                                ></div>
                                <div
                                    class="chat-content--review__trip--info__img"
                                    style="background-image:url('/static/img/content/drivers-avatar/driver1.png');"
                                    v-if="
                                        admin_message[0].sender_avatar == null
                                    "
                                ></div>
                                <div
                                    class="chat-content--review__trip--name__trip"
                                >
                                    <div class="chat-message-to-archive--wrap">
                                        <span
                                            class="chat-content--review__trip--name"
                                            >{{
                                                admin_message[0].sender_name
                                            }} (Admin)</span
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
                                        >{{
                                            admin_message[0].last_message_at
                                        }}</span
                                    >
                                </div>
                            </div>
                        </div>
                        <div class="you-trip-chat-content--text">
                            <p class="chat-content--review__trip--text">
                                {{ admin_message[0].last_message }}
                            </p>
                            <div
                                class="you-trip-chat-message--count"
                                v-if="
                                    admin_message[0].unread != null &&
                                        admin_message[0].unread > 0
                                "
                            >
                                {{ admin_message[0].unread }}
                            </div>
                        </div>
                    </div>
                    <div
                        class="chat-content--info__driver--review--content chat-fixed--click driver_message"
                        v-for="(room, index) in this.rooms"
                        v-on:click="chooseRoom(room)"
                        :class="myClass(room.room_id)"
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
                                            >{{ room.sender_name }}</span>
                                    </div>
                                    <span class="chat-content--route" v-if="room.from_full != null && room.to_full != null"> ({{room.to_full}} {{room.to_state}})</span>
                                    <span class="chat-content--route" v-if="!(room.from_full != null || room.to_full != null)"> (Удалить поездку)</span>
                                    <span
                                        class="chat-content--review__trip--trip"
                                        >{{ room.last_message_at }}</span
                                    >
                                </div>
                            </div>
                        </div>
                        <div class="you-trip-chat-content--text">
                            <p class="chat-content--review__trip--text" v-if="room.last_message != null">
                                <span v-if="room.last_message.length >= 20">{{ room.last_message.substring(0, 20)}}...</span>
                                <span  v-if="room.last_message.length < 20">
                                    {{ room.last_message}}
                                </span>
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
        <div
            class="chat-content--info__driver--review chat-content--info--backside active gogocar-box"
        >
            <div class="chat-content--info__driver--review--header">
                <a :href="profile_url">
                    <div
                        class="gogocar-gray-icons gogocar-go-back gogocar-go-back--desktop"
                    >
                        <svg class="icon icon-arrow-right ">
                            <use
                                xlink:href="/static/img/svg/symbol/sprite.svg#arrow-right"
                            ></use>
                        </svg>
                    </div>
                </a>
                <a :href="profile_url">
                    <div
                        class="gogocar-gray-icons gogocar-go-back gogocar-go-back--mobile"
                    >
                        <svg class="icon icon-arrow-right ">
                            <use
                                xlink:href="/static/img/svg/symbol/sprite.svg#arrow-right"
                            ></use>
                        </svg>
                    </div>
                </a>
                <span class="chat-content--info__driver--title">Архив</span>
                    <div class="chat-container-header--option--archive">
                      <div class="chat-container-header--option gogocar-gray-icons chat-container--archive">
                        <svg class="icon icon-option ">
                          <use xlink:href="/static/img/svg/symbol/sprite.svg#option"></use>
                        </svg>
                      </div>
                      <div class="chat-container-option--archive chat-all-messages">
                        <div class="chat-container-option--message--item">
                          <svg class="icon icon-folder ">
                            <use xlink:href="/static/img/svg/symbol/sprite.svg#folder"></use>
                          </svg><span>Сообщения</span>
                        </div>
                      </div>
                    </div>
            </div>
            <div class="chat-content--info__driver--search">
                <input
                    class="chat-content-search-dialog"
                    type="text"
                    v-model="search"
                    @keyup="submitSearch"
                    placeholder="Поиск по диалогам"
                />
                <div class="chat-content--info__search--icon">
                    <svg class="icon icon-search ">
                        <use
                            xlink:href="/static/img/svg/symbol/sprite.svg#search"
                        ></use>
                    </svg>
                </div>
            </div>
            <div class="chat-content--info__driver--review--wrap">
                <div class="you-trip-chat-content">
                    <div
                        class="chat-content--info__driver--review--content chat-fixed--click driver_message"
                        v-for="(room, index) in this.archived_rooms"
                        v-on:click="chooseRoom(room)"
                        :class="myClass(room.room_id)"
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
                            <p class="chat-content--review__trip--text" v-if="room.last_message != null">
                                <span v-if="room.last_message.length >= 20">{{ room.last_message.substring(0, 20)}}...</span>
                                <span  v-if="room.last_message.length < 20">
                                    {{ room.last_message}}
                                </span>
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
        type: null,
    },
    data() {
        return {
            search: "",
            rooms: [],
            archived_rooms: [],
            filter_rooms: [],
            filtered_channels: [],
            online_users: [],
            activeIndex: null,
            checked: [],
            profile_url: "/",
            admin_message: null
        };
    },
    mounted() {
        this.profile_url = window.profile_url;
        axios
            .get("/fetch_rooms", {
                params: {}
            })
            .then(response => {
                this.rooms = response.data.rooms;
                this.archived_rooms = response.data.archived_rooms;
                this.filter_rooms = response.data.rooms;
                this.admin_message = response.data.admin_message;
                if (response.data.rooms.length > 0) {
                    this.activeIndex = response.data.rooms[0].room_id;
                    const room = {
                        id: this.activeIndex,
                        user_id: response.data.rooms[0].sender_id,
                        user_name: response.data.rooms[0].sender_name,
                        user_avatar: response.data.rooms[0].sender_avatar
                    };
                    if(this.type == 'driver')
                    this.$emit("inputData", room);
                }
                if(this.type == 'admin')
                this.$emit("adminMessage", this.admin_message);
            });

        Event.$on("read_message", message => {
            console.log('unread', message);
            let unreads = message.data.unreads;
            if (unreads.length > 0) {
                for (let key in unreads) {
                    let obj = unreads[key];
                    this.rooms = this.rooms.filter(r => {
                        if (r.sender_id == obj.sender_id && r.room_id == obj.room_id) {
                            r.unread = obj.unread;
                        }
                        return r;
                    });
                }
                return this.rooms;
            }
        });

        Event.$on('archiveRoom', (message) => {
            axios
            .get("/fetch_rooms", {
                params: {}
            })
            .then(response => {
                this.rooms = response.data.rooms;
                this.archived_rooms = response.data.archived_rooms;
                this.filter_rooms = response.data.rooms;
                this.admin_message = response.data.admin_message;
                if (response.data.rooms.length > 0) {
                    this.activeIndex = response.data.rooms[0].room_id;
                    const room = {
                        id: this.activeIndex,
                        user_id: response.data.rooms[0].sender_id,
                        user_name: response.data.rooms[0].sender_name,
                        user_avatar: response.data.rooms[0].sender_avatar
                    };
                    // if(this.type == 'driver')
                    // this.$emit("inputData", room);
                }else{
                    // this.$emit("adminMessage", this.admin_message);
                }
            });

        })

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
                    .get("/fetch_rooms", {
                        params: {}
                    })
                    .then(response => {
                        this.rooms = response.data.rooms;
                        this.filter_rooms = response.data.rooms;
                        this.admin_message = response.data.admin_message;
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
        chooseAdmin() {
            this.$emit("adminMessage", this.admin_message);
        },
        chooseRoom(info) {
            const r = {
                id: info.room_id,
                user_id: info.sender_id,
                user_name: info.sender_name,
                user_avatar: info.sender_avatar
            };
            this.activeIndex = info.room_id;
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
         myClass(e){
            if(this.activeIndex == e && this.type == 'driver' ){
                return 'active';
            }
            else{
                return false;
            } 

        }
    },
};
</script>
