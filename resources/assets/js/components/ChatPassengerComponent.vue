<template>
    <div class="container">
        <div class="personal-settings--wrap personal-fixed-chat--wrap">
            <user-passenger-com @inputData="updateMessage"></user-passenger-com>
            <driver-room-com :type="type" :roomId="room" :user="user" :adminId="admin_id" :listing="listing_id"></driver-room-com>
        </div>
    </div>
</template>
<script>
import Event from "../event.js";
    export default {
      data: function() {
        return {
            room: null,
            messageReply: null,
            type: 'user',
            showRoomsList: true,
            isMobile: false,
            user: null,
            admin_id: null,
            listing_id: null
        };
      },
      methods: {
          updateMessage(room){ 
            this.room = room.id;
            this.listing_id = room.listing_id;
            this.type = "passenger";
            this.user={
              id: room.user_id,
              name: room.user_name,
              avatar: room.user_avatar
            }
            // this.admin_id = 0;
          }
      }
    }
</script>
