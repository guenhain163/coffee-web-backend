@extends('admin.layouts.layouts')

@section('style')
    <link rel="stylesheet" href="/assets/css/custom.css">
    <link rel="stylesheet" href="/assets/css/invoice.css">
@endsection

@section('content')
    <div class="productPage">
        <div class="container page-inner mt-3 mt-lg-4">
            <div class="row box-title mb-1 mb-lg-2">
                <div class="col-6">
                    <h2>Quản lý danh sách hóa đơn</h2>
                </div>
                <div class="col-6 text-right">
                    <button type="button" class="btn rounded-pill btn-add" id="btn_create_invoice" data-toggle="modal" data-target="#modal-add">
                        <i class="fas fa-plus mr-2"></i>
                        Thêm mới
                    </button>
                </div>
            </div>
            <div class="table-responsive box-table">
                <table class="table display nowrap" id="table-invoices">
                    <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Mã hóa đơn</th>
                        <th scope="col">Ngày bán</th>
                        <th scope="col">Thu ngân</th>
                        <th scope="col">Khách hàng</th>
                        <th scope="col">Tổng cộng</th>
                        <th scope="col">Ghi chú</th>
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
                url: "{!! route('admin.orders.show') !!}",
            },
            columns: [
                {
                    data: null,
                    render: (data, type, row, meta) => (meta.row + 1)
                },
                {
                    data: 'title'
                },
                {
                    data: 'description',
                    render: function (data, type, row, meta) {
                        return data && data.length > 50 ?
                            data.substr(0, 50) + '…' :
                            data;
                    }
                },
                {
                    data: 'price',
                    render: function (data, type, row, meta) {
                        return $.number(data, 0, '.', ',') + ' đ';
                    }
                },
                {
                    data: 'category.name'
                },
                {
                    data: 'status',
                    render: function (data, type, row, meta) {
                        return data === 1 ?
                            `<div class="btn-group btn-toggle rounded-pill btn-switch">
                                <button class="btn btn-sm btn-check-active rounded-pill active">On</button>
                                <button class="btn btn-sm btn-check-unactive rounded-pill">Off</button>
                            </div>` :
                            `<div class="btn-group btn-toggle rounded-pill btn-switch">
                                <button class="btn btn-sm btn-check-active rounded-pill">On</button>
                                <button class="btn btn-sm btn-check-unactive rounded-pill unactive">Off</button>
                            </div>`;
                    }
                },
                {
                    data: null,
                    defaultContent: `<button class="btn btn-outline btn-show">
                                <i class="far fa-eye"></i>
                            </button>
                            <button class="btn btn-outline btn-edit">
                                <i class="far fa-edit"></i>
                            </button>
                            <button class="btn btn-outline btn-delete">
                                <i class="far fa-trash-alt"></i>
                            </button>`
                }
            ]
        });
    </script>
@endsection
