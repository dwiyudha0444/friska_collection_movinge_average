@extends('home.index')
@section('content')
    <!-- cart section -->
    <section class="cart-section cart-page">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 table-column">
                    <div class="table-outer">
                        <form action="{{ route('update-cart') }}" method="post">
                            @csrf
                            <table class="cart-table">
                                <thead class="cart-header">
                                    <tr>
                                        <th>&nbsp;</th>
                                        <th class="prod-column">Product Name</th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th class="price">Price</th>
                                        <th class="quantity">Quantity</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cart as $ca)
                                        <tr>
                                            <td colspan="4" class="prod-column">
                                                <div class="column-box">
                                                    <div class="remove-btn">
                                                        <form action="{{ route('hapus.item') }}" method="post">
                                                            @csrf
                                                            <input type="hidden" name="cart_id"
                                                                value="{{ $ca->id }}">
                                                            <button type="submit"><i class="flaticon-close"></i></button>
                                                        </form>
                                                    </div>
                                                    <div class="prod-thumb">
                                                        <a href="#"><img
                                                                src="home/assets/images/resource/shop/cart-1.jpg"
                                                                alt=""></a>
                                                    </div>
                                                    <div class="prod-title">
                                                        {{ $ca->nama }}
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="price">{{ $ca->harga }}</td>
                                            <td class="qty">
                                                <div class="item-quantity">
                                                    <input class="quantity-spinner" type="text"
                                                        value="{{ $ca->qty }}" name="quantity[]">
                                                    <input type="hidden" name="cart_id[]" value="{{ $ca->id }}">
                                                </div>
                                            </td>
                                            <td class="sub-total">{{ $ca->harga * $ca->qty }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="update-btn pull-right">
                                <button type="submit" class="theme-btn-one">Update Cart<i
                                        class="flaticon-right-1"></i></button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            {{-- <div class="othre-content clearfix">

                <div class="update-btn pull-right">
                    <button type="submit" class="theme-btn-one">Update Cart<i class="flaticon-right-1"></i></button>
                </div>
            </div> --}}
            <div class="cart-total">
                <div class="row">
                    <div class="col-xl-5 col-lg-12 col-md-12 offset-xl-7 cart-column">
                        <div class="total-cart-box clearfix">
                            <h4>Cart Totals</h4>
                            <ul class="list clearfix">
                                <li>Subtotal:<span>$150</span></li>
                                <li>Order Total:<span>$150</span></li>
                            </ul>
                            <a href="cart.html" class="theme-btn-two">Proceed to Checkout<i
                                    class="flaticon-right-1"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- cart section end -->
@endsection
