<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Streamix - Live Streaming seperti Twitch</title>

  <!-- Bootstrap 5.3 + Feather Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://unpkg.com/feather-icons"></script>
  <style>
    /* Warna Latar Belakang Gelap Kustom */
.custom-dark-bg {
    background-color: #18181b !important; /* Mirip dengan warna latar belakang Twitch */
}

/* Styling Logo Ungu */
.twitch-logo-icon {
    width: 2rem;
    height: 2rem;
    background-color: #9147ff; /* Warna ungu khas Twitch */
    border-radius: 0.25rem;
    display: flex;
    align-items: center;
    justify-content: center;
}

/* Styling Input Pencarian */
.custom-search-input {
    background-color: #1f1f23; /* Lebih terang dari background utama */
    color: white;
    border: 1px solid #36363a; /* Garis batas gelap */
    border-right: none;
    border-radius: 0.375rem 0 0 0.375rem; /* Hanya sisi kiri yang melengkung */
    padding-top: 0.5rem;
    padding-bottom: 0.5rem;
}
.custom-search-input::placeholder {
    color: #a0a0a0;
}
.custom-search-input:focus {
    background-color: #1f1f23;
    border-color: #9147ff !important; /* Border ungu saat fokus */
    box-shadow: none;
}

/* Styling Tombol Pencarian */
.custom-search-btn {
    background-color: #36363a; /* Tombol abu-abu gelap */
    color: #a0a0a0;
    border: 1px solid #36363a;
    border-radius: 0 0.375rem 0.375rem 0; /* Hanya sisi kanan yang melengkung */
}
.custom-search-btn:hover {
    background-color: #4f4f54;
    color: white;
}

/* Styling Tombol Go Ad-Free */
.custom-adfree-btn {
    background-color: #36363a !important; /* Latar belakang abu-abu gelap */
    color: white !important;
    border-color: #36363a !important;
}
.custom-adfree-btn:hover {
    background-color: #4f4f54 !important;
    border-color: #4f4f54 !important;
}

/* Styling Profil Avatar */
.custom-profile-avatar {
    width: 2rem;
    height: 2rem;
    border-radius: 50%;
    background-color: #9147ff; /* Latar belakang ungu untuk avatar */
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
}
  </style>
</head>
<body>
<nav class="navbar navbar-expand-lg py-2 custom-dark-bg border-bottom border-secondary-subtle">
    <div class="container-fluid">
        <div class="d-flex align-items-center">
            <a class="navbar-brand text-white d-flex align-items-center me-4" href="#">
                <div class="twitch-logo-icon me-2">
                    <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20" style="width: 1.5rem; height: 1.5rem;">
                        <path d="M11 9H9V7h2v2zm-4 4h4v-2H7v2z" />
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13v2H9V5h2zm2 2h-4v2h4V7zm2 2h-6v2h6V9zm-2 2h-4v2h4v-2z" clip-rule="evenodd" />
                    </svg>
                </div>
            </a>
            
            <div class="d-flex align-items-center text-sm text-white-50">
                <a class="nav-link text-white fw-semibold me-3" href="#">Following</a>
                <span class="text-white-50 me-3" style="font-size: 1.5rem; line-height: 0;">&bull;</span>
                <a class="nav-link text-white fw-semibold" href="#">Browse</a>
            </div>
        </div>

        <div class="mx-auto" style="max-width: 400px; flex-grow: 1;">
            <div class="input-group">
                <input type="text" class="form-control custom-search-input" placeholder="Search" aria-label="Search">
                <button class="btn custom-search-btn" type="button">
                    <svg style="width: 1.25rem; height: 1.25rem;" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </button>
            </div>
        </div>

        <div class="d-flex align-items-center space-x-3">
            
            <div class="position-relative me-3">
                <svg style="width: 1.5rem; height: 1.5rem;" class="text-white-50 cursor-pointer" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.243 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                <span class="position-absolute translate-middle badge rounded-pill bg-danger border border-2 border-dark" style="top: 0; right: -5px; font-size: 0.75rem;">
                    24
                </span>
            </div>

            <svg style="width: 1.5rem; height: 1.5rem;" class="text-white-50 me-3 cursor-pointer" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M3 14h18m-9-4v8m-7 0h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
            <svg style="width: 1.5rem; height: 1.5rem;" class="text-white-50 me-3 cursor-pointer" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
            <svg style="width: 1.5rem; height: 1.5rem;" class="text-white-50 me-3 cursor-pointer" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"></path></svg>

            <button class="btn btn-secondary me-3 custom-adfree-btn fw-semibold" type="button">
                <svg style="width: 1rem; height: 1rem;" class="me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M5 4a2 2 0 012-2h6a2 2 0 012 2v1H5V4z"></path><path d="M13 7H7v8h6V7z"></path></svg>
                Go Ad-Free for Free
            </button>
            
            <div class="custom-profile-avatar border border-2 border-purple-400">
                <svg style="width: 1.25rem; height: 1.25rem;" class="text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
            </div>
        </div>
    </div>
</nav>
  <!-- Scripts -->
  <script>
    feather.replace();
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>