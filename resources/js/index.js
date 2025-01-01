import Echo from 'laravel-echo'

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: '763e7f8bcd5cf66d6d1c',
    cluster: 'ap1',
    forceTLS: true
});

var channel = Echo.channel('my-channel');
channel.listen('.my-event', function(data) {
    alert(JSON.stringify(data));
});
