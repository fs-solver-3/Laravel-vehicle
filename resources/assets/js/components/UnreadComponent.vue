<template>
    <div v-if="unread > 0 " class="header-user-profile--notific">
        {{ unread }}
    </div>
</template>

<script>
import Event from "../event.js";
    export default {
        data: function() {
            return {
                unread: 0
            };
        },
        mounted() {
             axios
                .get("/unread_total", {
                    params: {}
                })
                .then(response => {
                    // console.log('users', response.data.users);
                    this.unread = response.data.unread;
                });
            Event.$on("read_message", message => {
                this.unread = message.data.unread_total;
            });

            Event.$on("added_message", message => {
                if(message.selfMessage != true){
                     axios
                    .get("/unread_total", {
                        params: {}
                    })
                    .then(response => {
                        // console.log('users', response.data.users);
                        this.unread = response.data.unread;
                    });
                }
            });
        }
    }
</script>
