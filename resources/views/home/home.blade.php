@extends('home.index')
@section('content')
    <!-- topcategory-section -->
    <section class="topcategory-section centred">
        <div class="auto-container">
            <div class="sec-title">
                <h2>Top Category</h2>
                <p>Follow the most popular trends and get exclusive items from castro shop</p>
                <span class="separator" style="background-image: url(assets/images/icons/separator-1.png);"></span>
            </div>
            <div class="row clearfix">
                <div class="col-lg-3 col-md-6 col-sm-12 category-block">
                    <div class="category-block-one wow fadeInUp animated animated" data-wow-delay="00ms"
                        data-wow-duration="1500ms">
                        <figure class="image-box"><img src="home/assets/images/resource/category-1.png" alt="">
                        </figure>
                        <h5><a href="index.html">Women Collections</a></h5>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- topcategory-section end -->


    <!-- shop-section -->
    <section class="shop-section">
        <div class="auto-container">
            <div class="sec-title">
                <h2>Our Top Collection</h2>
                <p>There are some product that we featured for choose your best</p>
                <span class="separator" style="background-image: url(assets/images/icons/separator-1.png);"></span>
            </div>
            <div class="sortable-masonry">

                <div class="row">
                    @foreach ($fashion as $fash)
<div class="col-lg-3 col-md-6 col-sm-12 shop-block masonry-item small-column best_seller new_arraivals">
    <div class="shop-block-one">
        <div class="inner-box">
            <figure class="image-box">
                <img src="home/assets/images/resource/shop/shop-8.jpg" alt="">
                <ul class="info-list clearfix">
                    <li>
                        <form action="/add-to-cart" method="post">
                            @csrf
                            <input type="hidden" name="nama" value="{{ $fash->nama }}">
                            <input type="hidden" name="kategori" value="{{ $fash->kategori }}">
                            <input type="hidden" name="harga" value="{{ $fash->harga }}">
                            <button type="submit"><i class="flaticon-cart"></i></button>
                        </form>
                    </li>
                </ul>
            </figure>
            <div class="lower-content">
                <a href="product-details.html">{{ $fash->nama }}</a>
                <a href="product-details.html">{{ $fash->kategori }}</a>
                <span class="price">{{ $fash->harga }}</span>
            </div>
        </div>
    </div>
</div>
@endforeach


                </div>

            </div>
        </div>

        <div class="more-btn centred"><a href="shop.html" class="theme-btn-one">View All Products<i
                    class="flaticon-right-1"></i></a></div>
        </div>
    </section>
    <!-- shop-section end -->
@endsection
