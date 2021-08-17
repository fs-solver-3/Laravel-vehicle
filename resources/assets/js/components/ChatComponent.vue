<template>
    <div class="container">
        <div class="personal-settings--wrap personal-fixed-chat--wrap">
            <user-com :type="type" @inputData="updateMessage"  @adminMessage="adminMessage"></user-com>
            <room-com :type="type" :roomId="room" :user="user" :adminId="admin_id"></room-com>
        </div>
    </div>
</template>
<script>
import Event from "../event.js";
    export default {
       props: {
          message_type: null,
          room_id: null
      },
      data: function() {
        return {
            room: null,
            messageReply: null,
            type: 'driver',
            showRoomsList: true,
            isMobile: false,
            user: null,
            admin_id: null
        };
      },
      mounted() {
        this.room = this.room_id;
        this.type = this.message_type == 'passenger' ? 'driver' : 'admin';
      },
      methods: {
          adminMessage(admin){
            this.admin_id = 1;
            this.user={
              id: 1,
              name: admin[0].sender_name,
              avatar: admin[0].sender_avatar
            }
            this.type = "admin";
            this.room = 0;
          },
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
