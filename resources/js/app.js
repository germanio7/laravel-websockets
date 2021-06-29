require('./bootstrap');

Echo.channel('chat').listen('NewMessage', (e) => {
    alert(e.message.content);
});