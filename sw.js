// membuat fitur pwa
const cacheName = "v1";
// buat variable untuk asset yg ingin di cache
const cacheAssets = [
  "./",
  "./assets/main/css/app.css",
  "./assets/main/css/style.css",
  "./assets/main/img/icon/favicon.ico",
  "./assets/main/img/icon/favicon-32x32.png",
  "./assets/main/img/icon/favicon-144x144.png",
  "./assets/main/img/icon/favicon-192x192.png",
  "./assets/main/img/icon/favicon-512x512.png",
];

// memanggil event install
self.addEventListener("install", (e) => {
  console.log("Service Worker: Installed");

  e.waitUntil(
    caches
      .open(cacheName)
      .then((cache) => {
        console.log("Service Worker: Caching Files");
        cache.addAll(cacheAssets);
      })
      .then(() => self.skipWaiting())
  );
});

// memanggil event activate untuk aktivasi
self.addEventListener("activate", (e) => {
  console.log("Service Worker: Activated");
  // menghapus cache jika nama sama
  e.waitUntil(
    caches.keys().then((cacheNames) => {
      return Promise.all(
        cacheNames.map((cache) => {
          if (cache !== cacheName) {
            console.log("Service Worker: Clearing Old Cache");
            return caches.delete(cache);
          }
        })
      );
    })
  );
});

// Call Fetch Event
self.addEventListener("fetch", (e) => {
  console.log("Service Worker: Fetching");
  e.respondWith(fetch(e.request).catch(() => caches.match(e.request)));
});