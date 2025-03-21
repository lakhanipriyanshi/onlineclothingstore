<section class="product spad">
    <style>
/* CSS to hide the "Details" button by default */
.details-button {
    display: none;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: #ff5722;
    color: #fff;
    padding: 5px 10px;
    border-radius: 5px;
    opacity: 0;
    transition: opacity 0.3s ease;
}

/* CSS to show the "Details" button on hover */
.product__item:hover .details-button {
    display: block;
    opacity: 1;
}

/* Style the "Details" button (you can customize this further) */
.details-button a {
    text-decoration: none;
    color: inherit;
}
.pagination nav div.flex{
    display: none;
}
.pagination nav div.hidden{
    display: flex;
    gap: 20px;
}

 /* Default button styles */
.btn-primary {
            background-color: transparent;
            border: 2px solid #007bff; /* Blue border color */
            color: #000; /* Black text color */
            border-radius: 20px;
            margin-left: 12px;
            transition: background-color 0.3s, color 0.3s;
        }
    
/* Button styles on hover */
.btn-primary:hover {
    background-color: #007bff; /* Blue background color */
    color: #fff; /* White text color */
}
svg.w-5{
    width: 1.25rem !important;

}
.pagination nav div.flex{
    display: none;
}
.pagination nav div.hidden{
    display: flex;
    gap: 20px;
}


    </style>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font/css/materialdesignicons.min.css">

    <div class="container-fluid">
        <div class="row">
            <!-- <div class="col-lg-4 col-md-4">
                <div class="section-title">
                    <h4>All products</h4>
                </div>
            </div> -->
            <!-- <div class="col-lg-8 col-md-8">
                <ul class="filter__controls">
                    <li class="active" data-filter="*">All</li>
                    <li data-filter=".T-Shirt">T-Shirts</li>
                    <li data-filter=".Tentop">Tentop</li>
                    <li data-filter=".Bags">Bags</li>
                    <li data-filter=".Headbands">Headbands</li>
                    <li data-filter=".Hats">Hats</li>
                </ul>
            </div> -->
            <div class="col-lg-12 col-md-12">
                <ul class="filter__controls">
                    <li class="{{ $selectedCategory === 'All' ? 'active' : '' }}" data-filter="*"><a href="{{ route('view_product', ['category' => 'All']) }}" style="color: #000;">All</a></li>
                    @foreach($categories as $category)
                        <li class="{{ $selectedCategory === $category->name ? 'active' : '' }}" data-filter="{{ $category->name }}"><a href="{{ route('view_product', ['category' => $category->name]) }}" style="color: #000;">{{ $category->name }}</a>
                    </li>
                    @endforeach
                </ul>
            </div>

        </div>
        <div class="col-lg-4 col-md-4">
            <div class="search-bar" style="text-align: right;">
                <form action="{{ route('search_products') }}" method="GET">
                    @csrf
                    <div class="input-group" style="max-width: 300px; margin: 0 auto;">
                        <input type="text" class="form-control" name="query" placeholder="Search products..." style="border-radius: 20px;">
                       
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit" style="border-radius: 20px; margin-left:12px;">
                                <i class="mdi mdi-magnify menu-icon"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div><br>
        
        <div class="row property__gallery">
            @foreach($product as $products)   
            <div class="col-lg-3 col-md-4 col-sm-6 mix {{ $products->category->name }}">
                <div class="product__item">
                    
                    @if($products->productImage->isNotEmpty())
                        <div class="product__item__pic set-bg" data-setbg="uploads/products/{{$products->productImage[0]->image}}">
                            <img src="{{ asset($products->productImage[0]->image) }}" alt="Product Image">
                            <!-- <div class="label stockout">out of stock</div> -->
                            <!-- <div class="label">Sale</div> -->
                            <!-- <div class="label new">New</div> -->
                            <ul class="product__hover">
                                <!-- <li><a href="uploads/products/{{$products->productImage[0]->image}}" class="image-popup"><span class="arrow_expand"></span></a></li>
                                
                                <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                                <li><a href="#"><span class="icon_bag_alt"></span></a></li> -->
                            </ul>
                            <!-- Details button (hidden by default) -->
                            <a href="{{route('product_details',$products->id)}}" class="details-button">Details</a>
                            <!-- <div class="details-button">Details</div> -->
                        </div>
                    @else
                        <div class="product__item__pic set-bg" data-setbg="img/NoImage.jpg">
                            <img src="img/NoImage.jpg" alt="Alternative Text" 
                            >
                            <ul class="product__hover">
                                <!-- <li><a href="#" class="image-popup"><span class="arrow_expand"></span></a></li>
                                
                                <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                                <li><a href="#"><span class="icon_bag_alt"></span></a></li> -->
                            </ul>
                            <a href="{{route('product_details',$products->id)}}" class="details-button">Details</a>
                        </div>   
                    @endif    


                    <div class="product__item__text">
                        <h6><a href="{{route('product_details',$products->id)}}">{{$products->name}}</a></h6>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>

                        @if($products->discounted_price)
                            <div class="product__price">₹ <s>{{$products->price}}</s> {{$products->discounted_price}}</div>
                        @else
                            <div class="product__price">₹ {{$products->price}}</div>
                        @endif
                        
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div  class="pagination" style="float:right;">
            {{$product->links()}}
        </div>

    </div>

</section>