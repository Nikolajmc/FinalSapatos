<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.css')
</head>
<body>
    <div class="container">

        @include('admin.sidebar')

        <!---------------------- MAIN ---------------------->
        <main>
            <H1>Add Category</H1>
            <!------------------ RECENT ORDER ------------------>
            <div class="recent-orders">
                <h2>Add Category</h2>
                <form action="{{ url('add_category') }}" method="POST">
                    @csrf
                    <div class="adding-product">
                        <input type="text" name="category" placeholder="Category Name">
                        <input type="submit" name="submit" class="btn btn-primary">
                    </div>
                </form>
            </div>

            <div class="recent-orders">
                <h2>Categories Added</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Category Name</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($data as $data)
                        <tr>
                            <td>{{ $data->category_name }}</td>
                            <td class="warning">
                                <a onclick="return confirm('Are you sure to delete {{ $data->category_name }}?')" href="{{ url('delete_category', $data->id) }}">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <a href="#">Show All</a>
            </div>
        </main>
        <!------------------ END OF MAIN ------------------->


        <!--------------------- RIGHT ---------------------->
        <div class="right">
            @include('admin.right')

            <!-------------------- UPDATES --------------------->
            <div class="recent-updates">
                <h2>Recent Updates</h2>
                <div class="updates">
                    <!-- 
                    UPDATE 1
                    -->
                    <div class="update">
                        <div class="profile-photo">
                            <img src="./images/profile-3.jpg" alt="">
                        </div>

                        <div class="message">
                            <p><b>Mike Tyson</b> receive his order of Night lion tech GPS drone</p>
                            <small class="text-muted">2 Minutes Ago</small>
                        </div>
                    </div>

                    <!-- 
                    UPDATE 2
                    -->
                    <div class="update">
                        <div class="profile-photo">
                            <img src="./images/profile-1.jpg" alt="">
                        </div>

                        <div class="message">
                            <p><b>Mike Tyson</b> receive his order of Night lion tech GPS drone</p>
                            <small class="text-muted">2 Minutes Ago</small>
                        </div>
                    </div>

                    <!-- 
                    UPDATE 3
                    -->
                    <div class="update">
                        <div class="profile-photo">
                            <img src="./images/profile-4.jpg" alt="">
                        </div>

                        <div class="message">
                            <p><b>Mike Tyson</b> receive his order of Night lion tech GPS drone</p>
                            <small class="text-muted">2 Minutes Ago</small>
                        </div>
                    </div>
                </div>
            </div>
            <!---------------- END OF UPDATES ------------------>


            <!------------------- ANALYTICS -------------------->
            <div class="sales-analytics">
                <h2>Sales Analytics</h2>
                <!-- 
                    ONLINE ORDERS
                -->
                <div class="item online">
                    <div class="icon">
                        <span class="material-symbols-outlined">shopping_cart</span>
                    </div>

                    <div class="right">
                        <div class="info">
                            <h3>ONLINE ORDERS</h3>
                            <small class="text-muted">Last 24 Hours</small>
                        </div>
                        <h5 class="success">+39%</h5>
                        <h3>3829</h3>
                    </div>
                </div>

                <!-- 
                    OFFLINE ORDERS
                -->
                <div class="item offline">
                    <div class="icon">
                        <span class="material-symbols-outlined">local_mall</span>
                    </div>

                    <div class="right">
                        <div class="info">
                            <h3>OFFLINE ORDERS</h3>
                            <small class="text-muted">Last 24 Hours</small>
                        </div>
                        <h5 class="danger">-29%</h5>
                        <h3>3829</h3>
                    </div>
                </div>

                <!-- 
                    NEW CUSTOMERS
                -->
                <div class="item customers">
                    <div class="icon">
                        <span class="material-symbols-outlined">person</span>
                    </div>

                    <div class="right">
                        <div class="info">
                            <h3>NEW CUSTOMERS</h3>
                            <small class="text-muted">Last 24 Hours</small>
                        </div>
                        <h5 class="danger">-29%</h5>
                        <h3>3829</h3>
                    </div>
                </div>

                <div class="item add-products">
                    <div>
                        <span class="material-symbols-outlined">add</span>
                        <h3>Add Product</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/js/admin.js') }}"></script>
</body>
</html>