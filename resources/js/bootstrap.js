/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

import Echo from 'laravel-echo';
import Pusher from 'pusher-js'; // Import Pusher

// Assign Pusher to the window object
window.Pusher = Pusher;

// Initialize Laravel Echo
window.Echo = new Echo({
    broadcaster: 'pusher', // Make sure this matches your .env BROADCAST_DRIVER
    key: process.env.VITE_PUSHER_APP_KEY, // Your Pusher key from .env
    cluster: process.env.VITE_PUSHER_APP_CLUSTER, // Your Pusher cluster
    forceTLS: true // Set to true if using HTTPS
});




