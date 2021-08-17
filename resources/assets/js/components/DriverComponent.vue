<template>
    <div class="container">
        <div class="personal-settings--wrap personal-fixed-chat--wrap">
            <driver-room-com :type="type" :roomId="room" :user="user" :adminId="admin_id"></driver-room-com>
            <fellowers-com @inputData="updateMessage" :trip_id="trip_id"></fellowers-com>
        </div>
    </div>
</template>
<script>
import Event from "../event.js";
    export default {
      props: {
        trip_id: null
      },
      data: function() {
        return {
            room: null,
            messageReply: null,
            type: 'admin',
            showRoomsList: true,
            isMobile: false,
            user: null,
            admin_id: null,
        };
      },
      methods: {
          updateMessage(room){ 
            this.room = room.id;
            this.type = "driver";
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
