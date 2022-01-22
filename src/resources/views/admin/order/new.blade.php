@extends('admin.layouts.layouts')

@section('style')
    <link rel="stylesheet" href="/assets/css/custom.css">
    <link rel="stylesheet" href="/assets/css/order.css">
@endsection

@section('content')
    <div class="addProductPage">
        <div class="container page-inner mt-3 mt-lg-4">
            <div class="row box-title mb-1 mb-lg-2">
                <div class="col-6">
                    <h2>Thêm hóa đơn</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-8">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <form action="" class="form-search p-3">
                                    <div class="d-flex">
                                        <input type="text" class="form-control" placeholder="Nhập tên sản phẩm">
                                        <button type="submit" class="btn btn-brown text-nowrap mx-2"><i class="fas fa-search"></i> Tìm kiếm</button>
                                        <button type="button" class="btn btn-default"><i class="fas fa-sync-alt"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <div class="card product-item">
                                <div class="product-image">
                                    <img src="/assets/images/product.png" alt="">
                                </div>
                                <div class="product-info">
                                    <div class="product-title">
                                        <div class="name">Trà Đào cam xả</div>
                                    </div>
                                    <div class="product-price">
                                        <div class="original">45.000 đ</div>
                                        <div class="reduce">45.000 đ</div>
                                    </div>
                                </div>
                                <div class="action">
                                    <button type="button" class="btn btn-brown">Thêm</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="card product-item">
                                <div class="product-image">
                                    <img src="/assets/images/product.png" alt="">
                                </div>
                                <div class="product-info">
                                    <div class="product-title">Trà Đào cam xả</div>
                                    <div class="product-price">
                                        <div class="original">45.000 đ</div>
                                        <div class="reduce">45.000 đ</div>
                                    </div>
                                </div>
                                <div class="action">
                                    <button type="button" class="btn btn-brown">Thêm</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="card product-item">
                                <div class="product-image">
                                    <img src="/assets/images/product.png" alt="">
                                </div>
                                <div class="product-info">
                                    <div class="product-title">Trà Đào cam xả</div>
                                    <div class="product-price">
                                        <div class="original">45.000 đ</div>
                                        <div class="reduce">45.000 đ</div>
                                    </div>
                                </div>
                                <div class="action">
                                    <button type="button" class="btn btn-brown">Thêm</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="card product-item">
                                <div class="product-image">
                                    <img src="/assets/images/product.png" alt="">
                                </div>
                                <div class="product-info">
                                    <div class="product-title">Trà Đào cam xả</div>
                                    <div class="product-price">
                                        <div class="original">45.000 đ</div>
                                        <div class="reduce">45.000 đ</div>
                                    </div>
                                </div>
                                <div class="action">
                                    <button type="button" class="btn btn-brown">Thêm</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="card product-item">
                                <div class="product-image">
                                    <img src="/assets/images/product.png" alt="">
                                </div>
                                <div class="product-info">
                                    <div class="product-title">Trà Đào cam xả</div>
                                    <div class="product-price">
                                        <div class="original">45.000 đ</div>
                                        <div class="reduce">45.000 đ</div>
                                    </div>
                                </div>
                                <div class="action">
                                    <button type="button" class="btn btn-brown">Thêm</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="card product-item">
                                <div class="product-image">
                                    <img src="/assets/images/product.png" alt="">
                                </div>
                                <div class="product-info">
                                    <div class="product-title">Trà Đào cam xả</div>
                                    <div class="product-price">
                                        <div class="original">45.000 đ</div>
                                        <div class="reduce">45.000 đ</div>
                                    </div>
                                </div>
                                <div class="action">
                                    <button type="button" class="btn btn-brown">Thêm</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="card p-3">
                        <div class="title">
                            <h2>
                                Hóa đơn:
                            </h2>
                        </div>
                        <div class="list">
                            <table class="table table-borderless w-100">
                                <thead>
                                <tr>
                                    <th scope="col" class="name">Tên</th>
                                    <th scope="col" class="price">Đơn giá</th>
                                    <th scope="col" class="number">SL</th>
                                    <th scope="col" class="total">T.Tiền</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="name">Tên</td>
                                    <td class="price">
                                        <div class="original_price">50,000đ</div>
                                        <div class="reduced_price">45,000đ</div>
                                    </td>
                                    <td class="number">
                                        <input type="text" class="no-border">
                                    </td>
                                    <td class="total">Thành tiền</td>
                                </tr>
                            </table>
                            <div class="total">
                                <div class="d-flex justify-content-between">
                                    <div class="left">
                                        <label for="" class="text-weight-bold">Tổng</label>
                                    </div>
                                    <div class="right">45,000 đ</div>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <div class="left">
                                        <label for="" class="text-weight-bold">Khách trả</label>
                                    </div>
                                    <div class="right">50,000 đ</div>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <div class="left">
                                        <label for="" class="text-weight-bold">Trả lại</label>
                                    </div>
                                    <div class="right">5,000 đ</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('modal')
    <div class="bg-loading d-none">
        <div class="spinner-border text-light" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">

    </script>
@endsection
