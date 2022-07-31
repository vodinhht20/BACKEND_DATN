<script>
    var notifyHeader = new Vue({
        el: "#box-notify-header",
        data: {
            hd_notifications: {!! json_encode($notification_headers) !!}
        },
        methods: {
            handleWatchedNoti: (id, notify = null) => {
                if (notify && notify.watched) {
                    window.location.href = notify.link;
                    return;
                }
                axios.post("{{ route('ajax-watched-noti') }}", {id})
                    .then(res => {
                        if (notify && notify.link && notify.link.trim() != '') {
                            window.location.href = notify.link;
                        }
                    })
                    .catch(error => {
                        alert("Không thể đọc thông báo vào lúc này")
                    })
            }
        },
    })
</script>