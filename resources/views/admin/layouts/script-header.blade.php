<script>
    var notifyHeader = new Vue({
        el: "#box-notify-header",
        data: {
            hd_notifications: {!! json_encode($notification_headers) !!}
        },
        methods: {
            handleWatchedNoti: (id, notify = null) => {
                notifyHeader.hd_notifications = notifyHeader.hd_notifications.map((record => {
                    if (id == 'viewed_all') {
                        return {...record, watched: 1};
                    } else if (record.id == id) {
                        return {...record, watched: 1};
                    }
                    return record;
                }));

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
    var firebaseConfig = {
          apiKey: "AIzaSyAOnORzzr2YgLvnR2cXfs0XqfihF1yq9EM",
          authDomain: "du-an-tot-nghiep-a61be.firebaseapp.com",
          databaseURL: "https://du-an-tot-nghiep-a61be-default-rtdb.firebaseio.com",
          projectId: "du-an-tot-nghiep-a61be",
          storageBucket: "du-an-tot-nghiep-a61be.appspot.com",
          messagingSenderId: "115764973780",
          appId: "1:115764973780:web:248788f1c9c1f002112b41"
      };
    // Initialize Firebase
    firebase.initializeApp(firebaseConfig);
    const messaging = firebase.messaging();
    function initFirebaseMessagingRegistration() {
        messaging.requestPermission().then(function () {
            return messaging.getToken()
        }).then(function(token) {
            axios.post("{{ route('update-fcm-token') }}",{
                _method:"PATCH",
                token
            }).then(({data})=>{
                console.log(data)
            }).catch(({response:{data}})=>{
                console.error(data)
            })
        }).catch(function (err) {
            console.log(`Token Error :: ${err}`);
        });
    }
    initFirebaseMessagingRegistration();
    messaging.onMessage(function({data:{body, title}}) {
        let bodyJson = JSON.parse(body);
        console.log("noti_create_request", bodyJson);
        if (title && title == "noti_create_request") {
            let title = bodyJson.data.title;
            let content = bodyJson.data.content;
            notifyHeader.hd_notifications = [bodyJson.data, ...notifyHeader.hd_notifications];
            new Notification(title, {body: content});
        }
    });
</script>