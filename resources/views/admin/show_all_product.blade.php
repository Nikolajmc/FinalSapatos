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
            <H1>Show Products</H1>
            
            <div class="recent-orders">
                <h2>Show Products</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Discount Price</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($product as $product)
                        <tr>
                            <td class="product-image" style="border-radius: 10px">
                                <img src="/productimage/{{ $product->image }}" alt="">
                            </td>
                            <td>{{ $product->title }}</td>
                            <td>{{ $product->quantity }}</td>
                            <td>{{ $product->category }}</td>
                            <td>₱{{ $product->price }}.00</td>
                            <td>{{ $product->discount_price }}%OFF</td>
                            <td>
                                <a href="{{ url('update_product', $product->id) }}" class="success">Update</a>
                            </td>
                            <td>
                                <a href="{{ url('delete_product', $product->id) }}" class="warning" onclick="return confirm('Are you sure to delete {{ $product->title }}?')">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <a href="#"></a>
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