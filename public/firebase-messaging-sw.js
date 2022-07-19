importScripts('https://www.gstatic.com/firebasejs/8.3.2/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/8.3.2/firebase-messaging.js');

firebase.initializeApp({
    apiKey: "AIzaSyAOnORzzr2YgLvnR2cXfs0XqfihF1yq9EM",
    authDomain: "du-an-tot-nghiep-a61be.firebaseapp.com",
    databaseURL: "https://du-an-tot-nghiep-a61be-default-rtdb.firebaseio.com",
    projectId: "du-an-tot-nghiep-a61be",
    storageBucket: "du-an-tot-nghiep-a61be.appspot.com",
    messagingSenderId: "115764973780",
    appId: "1:115764973780:web:248788f1c9c1f002112b41"

});

const messaging = firebase.messaging();
messaging.setBackgroundMessageHandler(function({data:{title,body,icon}}) {
    return self.registration.showNotification(title,{body,icon});
});