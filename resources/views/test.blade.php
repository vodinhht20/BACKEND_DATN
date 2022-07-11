@extends('admin.layouts.main')
@section('content')
  <h3>Test notification</h3>
@endsection
@section('page-script')
  <!-- The core Firebase JS SDK is always required and must be listed first -->
  <script src="https://www.gstatic.com/firebasejs/8.3.2/firebase-app.js"></script>
  <script src="https://www.gstatic.com/firebasejs/8.3.2/firebase-messaging.js"></script>

  <!-- TODO: Add SDKs for Firebase products that you want to use
      https://firebase.google.com/docs/web/setup#available-libraries -->

  <script>
      // Your web app's Firebase configuration
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
      const messaging = firebase.messaging()
        .usePublicVapidKey("BDYE2EYHdIp8qHjTKcJYPvO4PgaAH2pSruP55FOtNs5jWsgdeg7YK6OgJ0daSu21kN7aSzU19NRXRqC4bfITZYQ");
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
          if (bodyJson.key && bodyJson.key == "dataRaw") {
            console.log("Data response: ", bodyJson);
          } else {
            new Notification(title, {body});
          }
      });
  </script>
@endsection