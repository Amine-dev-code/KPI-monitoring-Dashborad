/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

const axios = require('axios');
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// Uncomment the following lines if you still want to use these imports
// const Echo = require('laravel-echo');
// const Pusher = require('pusher-js');
// window.Pusher = Pusher;

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.VITE_PUSHER_APP_KEY, // Use process.env instead of import.meta.env
//     cluster: process.env.VITE_PUSHER_APP_CLUSTER || 'mt1', // Use process.env instead of import.meta.env
//     wsHost: process.env.VITE_PUSHER_HOST || `ws-${process.env.VITE_PUSHER_APP_CLUSTER}.pusher.com`, // Use process.env instead of import.meta.env
//     wsPort: process.env.VITE_PUSHER_PORT || 80, // Use process.env instead of import.meta.env
//     wssPort: process.env.VITE_PUSHER_PORT || 443, // Use process.env instead of import.meta.env
//     forceTLS: (process.env.VITE_PUSHER_SCHEME || 'https') === 'https', // Use process.env instead of import.meta.env
//     enabledTransports: ['ws', 'wss'],
// });
