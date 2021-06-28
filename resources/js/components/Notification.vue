<template>
    <li class="nav-item dropdown" id="markAsRead">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            <span class="glyphicon glyphicon-globe"></span> Notification
            <span class="badge">{{ unreadNotifications.length }}</span>
        </a>

        <ul class="dropdown-menu" role="menu">
            <li>
               <!-- <notification-item v-for=""></notification-item> -->
            </li>
        </ul>
    </li>
</template>

<script>
    export default {
        props: ['unreads', 'userid'],
        data(){
            return {
                unreadNotifications: this.unreads
            }
        },
        mounted() {
            console.log('Component mounted.');
            Echo.private('App.User.' + this.userid)
            .notification((notification) => {
                console.log(notification.type);
                let newUnreadNotifications = {data: {thread:notification.thread, user:notification.user}};
                this.unreads.push(newUnreadNotifications);
            });
        }
    }
</script>
