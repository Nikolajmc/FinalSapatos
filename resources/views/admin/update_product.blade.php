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
            <H1>Update Products</H1>
            
            <div class="recent-orders">
                <h2>Update Products</h2>
                <form action="{{ url('/update_product_confirm', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="adding-product">
                        <label class="product-size">Product Name:</label>
                        <input type="text" name="title" placeholder="Product Name" value="{{ $product->title }}" required>
    
                        <label class="product-size">Product Description:</label>
                        <input type="text" name="description" placeholder="Product Description" value="{{ $product->description }}" required>
    
                        <label class="product-size">Product Price:</label>
                        <input type="number" name="price" placeholder="Product Price" value="{{ $product->price }}" required>
    
                        <label class="product-size">Discount Price:</label>
                        <input type="number" name="discount_price" placeholder="Discount Price" value="{{ $product->discount_price }}" required>
    
                        <label class="product-size">Product Quantity:</label>
                        <input type="number" min="0" name="quantity" placeholder="Product Quantity" value="{{ $product->quantity }}" required>
    
                        <label class="product-size">Product Category:</label>
                        <select name="category" value="{{ $product->category }}" required>
                            <option value="">{{ $product->category }}</option>
                            @foreach($category as $category)
                            <option value="{{ $category->category_name }}">{{ $category->category_name }}</option>
                            @endforeach
                        </select>
    
                        <label class="product-size">Product Image:</label>
                        <input type="file" name="image" placeholder="Product Image">
    
                        <input type="submit" value="Update Product">
                    </div>
                </form>
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