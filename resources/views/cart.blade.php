<div class="wrap-header-cart js-panel-cart">
    <div class="s-full js-hide-cart"></div>

    <div class="header-cart flex-col-l p-l-65 p-r-25">
        <div class="header-cart-title flex-w flex-sb-m p-b-8">
				<span class="mtext-103 cl2">
					Giỏ hàng của bạn
				</span>

            <div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
                <i class="zmdi zmdi-close"></i>
            </div>
        </div>
        <!--giỏ hàng nhanh -->
        <div class="header-cart-content flex-w js-pscroll">
            <ul class="header-cart-wrapitem w-full">
                @foreach($cart as $product)
                    <li class="header-cart-item flex-w flex-t m-b-12">
                        <div class="header-cart-item-img">
                            <img src="{{ $product['thumb'] }}" alt="{{ $product['name'] }}">
                        </div>

                        <div class="header-cart-item-txt p-t-8">
                            <a href="/chi-tiet-san-pham/{{ $product['id'] }}-{{ Str::slug($product['name'], '-') }}.html"
                            class="header-cart-item-name m-b-18 hov-cl1 trans-04">
                                {{ $product['name'] }}
                            </a>

                            <span class="header-cart-item-info">
                                {{ $product['qty'] }} x {{ number_format($product['price_sale'] > 0 ? $product['price_sale'] : $product['price']) }} đ
                            </span>
                        </div>
                    </li>
                @endforeach
            </ul>

            <div class="w-full">
               <div class="header-cart-total w-full p-tb-40">
                    @php
                        use Illuminate\Support\Facades\Session;

                        $cart = Session::get('cart', []);
                        $total = 0;

                        foreach ($cart as $item) {
                            $price = $item['price_sale'] > 0 ? $item['price_sale'] : $item['price'];
                            $total += $price * $item['qty'];
                        }
                    @endphp

                    <div class="header-cart-total w-full p-tb-40">
                        Tổng: {{ number_format($total) }} đ
                    </div>

                </div>


                <div class="header-cart-buttons flex-w w-full">
                    <a href="{{ route('list_cart') }}" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
                        Xem chi tiết
                    </a>
                

                    <a href="mua-ngay.html" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
                        Mua ngay
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
