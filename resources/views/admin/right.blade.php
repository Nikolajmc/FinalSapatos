
    <div class="top">
        <button id="menu-btn">
            <span class="material-symbols-outlined">menu</span>
        </button>

        <div class="theme-toggler">
            <span class="material-symbols-outlined active">light_mode</span>
            <span class="material-symbols-outlined">dark_mode</span>
        </div>

        <div class="profile">
            <div class="info">
                <p>Hey, <b>@auth<span>{{ Auth::user()->name }}</span>@endauth</b></p>
                <small class="text-muted">Admin</small>
            </div>

            <div class="profile-photo">
                <img src="./images/profile-2.jpg" alt="">
            </div>
        </div>
    </div>
    <!----------------- END OF RIGHT ------------------->