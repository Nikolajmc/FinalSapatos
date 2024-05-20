        <!---------------------- ASIDE --------------------->
        <aside>
            <div class="top">
                <a href="{{ url('/') }}" class="logo">
                    <h2><span style="color: #e87316; font-size: 30px">S</span>APATOS</h2>
                </a>
                <div class="close" id="close-btn">
                    <span class="material-symbols-outlined">close</span>
                </div>
            </div>

            <div class="sidebar">
                <a href="{{ url('/admin') }}" class="">
                    <span class="material-symbols-outlined">grid_view</span>
                    <h3>Dashboard</h3>
                </a>

                <a href="{{ url('/view_product') }}">
                    <span class="material-symbols-outlined">add</span>
                    <h3>Add Products</h3>
                </a>

                <a href="{{ url('/show_product') }}">
                    <span class="material-symbols-outlined">inventory</span>
                    <h3>Show Products</h3>
                </a>

                <a href="{{ url('view_category') }}">
                    <span class="material-symbols-outlined">receipt_long</span>
                    <h3>Category</h3>
                </a>

                <a href="#">
                    <span class="material-symbols-outlined">settings</span>
                    <h3>Settings</h3>
                </a>

                <form id="frmlogout" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('frmlogout').submit();">
                        <span class="material-symbols-outlined">logout</span>
                        <h3>Logout</h3>
                    </a>
                </form>
            </div>
        </aside>
        <!------------------ END OF ASIDE ------------------>