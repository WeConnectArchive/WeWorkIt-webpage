const CACHE_NAME = 'weworkit 1.0.0';
const CACHED_FILES = [
    '/',
    '/user/',
    '/log/',
    '/zdjecia/',
    '/images/',
    '/company/'
];

const console = (({ log, error }, label) => ({
    // Enable logs
    // log: (...args) => log(`%c${label}`, 'color: purple', ...args),
    // error: (...args) => error(label, ...args)

    // Disable logs
    log: () => null,
    error: () => null
}))(self.console, '[Service Worker]');

self.addEventListener('install', (evt) => {
    console.log('Event: install', { evt });
    evt.waitUntil(handleInstall());
});

async function handleInstall() {
    const cache = await caches.open(CACHE_NAME);
    await cache.addAll(CACHED_FILES);
    return self.skipWaiting();
}

self.addEventListener('activate', (evt) => {
    console.log('Event: activate', { evt });
    evt.waitUntil(handleActivate());
});

async function handleActivate() {
    const keys = await caches.keys();
    return await Promise.all(keys
        .filter((key) => key !== CACHE_NAME)
        .map((key) => caches.delete(key)));
}

function isForeignRequest(url) {
    const regexp = new RegExp(self.origin, 'i');
    return !regexp.test(url);
}

self.addEventListener('fetch', (evt) => {
    console.log('Event: fetch', { evt });

    if (isForeignRequest(evt.request.url)) {
        return;
    }

    evt.respondWith(handleFetch(evt));
});

async function handleFetch(evt) {
    const request = evt.request;
    const cache = await caches.open(CACHE_NAME);
    const resource = await cache.match(request);

    if (resource) {
        return resource;
    }

    const response = await fetch(request.clone());
    await cache.put(request, response.clone());
    return response;
}