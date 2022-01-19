@extends('admin.layouts.layouts')

@section('style')
    <link rel="stylesheet" href="/assets/css/custom.css">
    <link rel="stylesheet" href="/assets/css/contact.css">
@endsection

@section('content')
    <div class="productPage">
        <div class="container page-inner mt-3 mt-lg-4">
            <div class="row box-title mb-1 mb-lg-2">
                <div class="col-6">
                    <h2>Quản lý hòm thư</h2>
                </div>
            </div>
            <div class="table-responsive box-table">
                <table class="table display nowrap" id="table-contacts">
                    <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Người gửi</th>
                        <th scope="col">Nội dung</th>
                        <th scope="col">Email</th>
                        <th scope="col">Số điện thoại</th>
                        <th scope="col">Phản hồi</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('modal')
{{--    <div class="modal fade" id="modal-detail" tabindex="-1" role="dialog" aria-labelledby="modalDetail" aria-hidden="true">--}}
{{--        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">--}}
{{--            <div class="modal-content">--}}
{{--                <div class="modal-header">--}}
{{--                    <h5 class="modal-title">Thông tin sản phẩm</h5>--}}
{{--                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                        <span aria-hidden="true">&times;</span>--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--                <div class="modal-body product-detail">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-12 col-lg-4">--}}
{{--                            <div class="">--}}
{{--                                <img width="200" height="200" src="" class="rounded mx-auto img-thumbnail" alt="">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-12 col-lg-8">--}}
{{--                            <div class="row mb-3">--}}
{{--                                <div class="col-12 d-flex align-items-center">--}}
{{--                                    <div class="title">Bạc xỉu</div>--}}
{{--                                    <div class="">--}}
{{--                                        <div class="category">Cà phê</div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="row mb-3">--}}
{{--                                <div class="col-12">--}}
{{--                                    <span class="font-weight-bold">Giá: </span>--}}
{{--                                    <span class="price">45,000</span>--}}
{{--                                    <span> đ</span>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-12">--}}
{{--                                    <div class="description"></div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="modal-footer">--}}
{{--                    <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
    <div class="bg-loading d-none">
        <div class="spinner-border text-light" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
@endsection

@section('script')
    <script src="/assets/js/datatables-config.js"></script>
    <script type="text/javascript">
        var table = $('#table-products').DataTable({
            bDestroy: false,
            columnDefs: [
                {
                    className: 'text-center',
                    targets: [0, 3, 4, 5, 6]
                }
            ],
            ajax: {
{{--                url: "{!! route('admin.contacts.show') !!}",--}}
            },
            columns: [
                {
                    data: null,
                    render: (data, type, row, meta) => (meta.row + 1)
                },
                {
                    data: 'name'
                },
                {
                    data: 'email',
                    render: function (data, type, row, meta) {
                        return data === 1 ? '' : '';
                    }
                },
                {
                    data: 'phone'
                },
                {
                    data: 'feedback'
                },
                {
                    data: 'status',
                    render: function (data, type, row, meta) {
                        return `<select class="form-select rounded-3 status-select">
                                    <option value="1" selected="">Mới</option>
                                    <option value="2">Đã đọc</option>
                                    <option value="3">Đã trả lời</option>
                                  </select>`;
                    }
                },
                {
                    data: null,
                    defaultContent: `<button class="btn btn-outline btn-show">
                                <i class="far fa-eye"></i>
                            </button>
                            <button class="btn btn-outline btn-delete">
                                <i class="far fa-trash-alt"></i>
                            </button>`
                }
            ]
        });
    </script>
@endsection
