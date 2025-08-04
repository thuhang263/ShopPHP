@extends('main') 
@section('content')
<form class="bg0 p-t-75 p-b-85">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
					<div class="m-l-25 m-r--38 m-lr-0-xl">
						<div class="wrap-table-shopping-cart">
							<table class="table-shopping-cart">
								<tbody>
									<tr class="table_head">
										<th class="column-1">Sản phẩm</th>
										<th class="column-2"></th>
										<th class="column-3">Giá sau khuyến mại</th>
										<th class="column-4">Số lượng</th>
										<th class="column-5">Giá</th>
									</tr>
									@foreach ($products as $product)
								<tr class="table_row">
									<td class="column-1">
										<div class="how-itemcart1">
											<img src="{{ $product['thumb'] }}" alt="{{ $product['name'] }}">
										</div>
									</td>
									<td class="column-2">{{ $product['name'] }}</td>
									<td class="column-3">{{ number_format($product['price_sale'] > 0 ? $product['price_sale'] : $product['price']) }} đ</td>
									<td class="column-4">
										<div class="wrap-num-product flex-w m-l-auto m-r-0">
											<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-minus"></i>
											</div>

											<input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product-{{ $product['id'] }}" value="{{ $product['qty'] }}">

											<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-plus"></i>
											</div>
										</div>
									</td>
									<td class="column-5">{{ number_format($product['qty'] * ($product['price_sale'] > 0 ? $product['price_sale'] : $product['price'])) }} đ</td>
								</tr>
								@endforeach



							</tbody></table>
						</div>

						<div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
							<div class="flex-w flex-m m-r-20 m-tb-5">
								<input class="stext-104 cl2 plh4 size-117 bor13 p-lr-20 m-r-10 m-tb-5" type="text" name="coupon" placeholder="Coupon Code">
									
								<div class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5">
									Apply coupon
								</div>
							</div>

							<div class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">
								Update Cart
							</div>
						</div>
					</div>
				</div>

				<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
					<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
						<h4 class="mtext-109 cl2 p-b-30">
							Thanh toán
						</h4>
						<div class="flex-w flex-t bor12 p-t-15 p-b-30">
							<div class="size-208 w-full-ssm">
								<span class="stext-110 cl2">
									Vận chuyển
								</span>
							</div>

							<div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
								<p class="stext-111 cl6 p-t-2">
									Vui lòng nhập địa chỉ
								</p>
								
								<div class="p-t-15">
									<span class="stext-112 cl8">
										Phí vận chuyển
									</span>

									<div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
										<select class="js-select2 select2-hidden-accessible" name="time" tabindex="-1" aria-hidden="true">
											<option>Tỉnh/ Thành phố</option>
											<option>Hà Nội</option>
											<option>Tp. HCM</option>
										</select>
										<div class="dropDownSelect2"></div>
									</div>

									<div class="bor8 bg0 m-b-12">
										<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="state" placeholder="Quận/Huyện">
									</div>

									<div class="bor8 bg0 m-b-22">
										<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="postcode" placeholder="Phường/Xã">
									</div>
									
									<div class="flex-w">
										<div class="flex-c-m stext-101 cl2 size-115 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer">
											Cập nhật thông tin
										</div>
									</div>
										
								</div>
							</div>
						</div>

						<div class="flex-w flex-t p-t-27 p-b-33">
							<div class="size-208">
								<span class="mtext-101 cl2">
									Số lượng đơn hàng:
								</span>
							</div>

							<div class="size-209 p-t-1">
								<span class="mtext-110 cl2">
									 {{$totalItems}}
								</span>
							</div>
						</div>

						<div class="flex-w flex-t p-t-27 p-b-33">
							<div class="size-208">
								<span class="mtext-101 cl2">
									Tổng tiền: 
								</span>
							</div>

							<div class="size-209 p-t-1">
								<span class="mtext-110 cl2">
									 {{ $product['qty'] }} x {{ number_format($product['price_sale'] > 0 ? $product['price_sale'] : $product['price']) }} đ
								</span>
							</div>
						</div>

						<button class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
							Đặt hàng
						</button>
					</div>
				</div>
			</div>
		</div>
	</form>
<style>
    .table_head th {
        font-family: 'Roboto', sans-serif;
        font-weight: bold;
        font-size: 12px;
    }
</style>



    @endsection


