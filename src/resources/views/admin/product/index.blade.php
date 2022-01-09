@extends('admin.layouts.layouts')

@section('style')
    <link rel="stylesheet" href="/assets/css/custom.css">
@endsection

@section('content')
    <div class="productPage">
        <div class="container page-inner mt-3 mt-lg-4">
            <div class="row box-title mb-1 mb-lg-2">
                <div class="col-6">
                    <h2>Danh sách sản phẩm</h2>
                </div>
                <div class="col-6 text-right">
                    <button type="button" class="btn rounded-pill btn-add" id="btn_create_product">
                        <i class="fas fa-plus mr-2"></i>
                        Thêm mới
                    </button>
                </div>
            </div>
            <div class="table-responsive box-table">
                <table class="table" id="table-products">
                    <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Tên</th>
                        <th scope="col">Mô tả</th>
                        <th scope="col">Giá</th>
                        <th scope="col">Category</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
{{--                    <tr>--}}
{{--                        <td class="text-center">1</td>--}}
{{--                        <td>Trà đào cam xả</td>--}}
{{--                        <td></td>--}}
{{--                        <td class="text-center">45.000đ</td>--}}
{{--                        <td>Trà</td>--}}
{{--                        <td class="text-center">--}}
{{--                            <div class="btn-group btn-toggle rounded-pill btn-switch">--}}
{{--                                <button class="btn btn-sm btn-check-active rounded-pill active">On</button>--}}
{{--                                <button class="btn btn-sm btn-check-unactive rounded-pill">Off</button>--}}
{{--                            </div>--}}
{{--                        </td>--}}
{{--                        <td class="text-center">--}}
{{--                            <button class="btn btn-outline" data-toggle="modal" data-target="#modal-detail">--}}
{{--                                <i class="far fa-eye"></i>--}}
{{--                            </button>--}}
{{--                            <button class="btn btn-outline">--}}
{{--                                <i class="far fa-edit"></i>--}}
{{--                            </button>--}}
{{--                            <button class="btn btn-outline">--}}
{{--                                <i class="far fa-trash-alt"></i>--}}
{{--                            </button>--}}
{{--                        </td>--}}
{{--                    </tr>--}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('modal')
    <div class="modal fade" id="modal-detail" tabindex="-1" role="dialog" aria-labelledby="modalDetail" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="/assets/js/datatables-config.js"></script>
    <script>
        var table = $('#table-products').DataTable({
            bDestroy: false,
            columnDefs: [
                {
                    className: 'text-center',
                    targets: [0, 3, 4, 5, 6]
                }
            ],
            ajax: {
                url: "{!! route('admin.products.show') !!}",
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
                    data: 'description'
                },
                {
                    data: 'price'
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
                    defaultContent: `<button class="btn btn-outline" data-toggle="modal" data-target="#modal-detail">
                                <i class="far fa-eye"></i>
                            </button>
                            <button class="btn btn-outline">
                                <i class="far fa-edit"></i>
                            </button>
                            <button class="btn btn-outline">
                                <i class="far fa-trash-alt"></i>
                            </button>`
                }
            ]
        });
    </script>
@endsection
