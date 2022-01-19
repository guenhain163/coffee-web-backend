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
    <div class="modal fade" id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="modalDelete" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Xác nhận</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Bạn có chắc chắn với hành động của mình không?</p>
                    <input id="_id" type="hidden" value="" />
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-cancel" data-dismiss="modal" aria-label="Close" aria-invalid="false">Hủy</button>
                    <button type="button" class="btn btn-brown btn-confirm">Xóa</button>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-loading d-none">
        <div class="spinner-border text-light" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
@endsection

@section('script')
    <script src="/assets/js/datatables-config.js"></script>
    <script type="text/javascript">
        var table = $('#table-contacts').DataTable({
            bDestroy: false,
            columnDefs: [
                {
                    className: 'text-center',
                    targets: [0, 3, 4, 5, 6]
                }
            ],
            ajax: {
                url: "{!! route('admin.contacts.show') !!}",
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
                    data: 'status',
                    render: function (data, type, row, meta) {
                        return data === 1 ? 'Dịch vụ'
                            : data === 2 ? 'Thêm thông tin'
                            : 'Khác';
                    }
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
                        return `<select class="form-select rounded status-select">
                                    <option value="1" ${ status === 1 ? 'selected' : '' }>Mới</option>
                                    <option value="2" ${ status === 2 ? 'selected' : '' }>Đã đọc</option>
                                    <option value="3" ${ status === 3 ? 'selected' : '' }>Đã trả lời</option>
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

        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

        $('#table-contacts').on('click', '.btn-delete', function () {
            var data = table.row($(this).parents("tr")).data();
            $('#modal-delete').find('#input-id').val(data.id);
            $('#modal-delete').modal('show');
        });

        $('#modal-delete .btn-confirm').click(function () {
            $.ajax({
                url: '{{ route('admin.accounts.delete') }}',
                type: 'POST',
                data: {
                    id: $('#modal-delete').find('#input-id').val()
                },
                beforeSend: function() {
                    $('.bg-loading').removeClass('d-none').addClass('d-flex');
                },
                success: function (response) {
                    if (response){
                        success('Xóa tài khoản Admin thành công.');
                        $('#modal-delete .close').trigger('click');
                    }
                },
                error: function () {
                    $(document).Toasts("create", {
                        class: "bg-danger",
                        title: "Thất bại",
                        autohide: true,
                        delay: 2000,
                        body: "Lỗi khi trong khi cập nhật trạng thái.",
                    });
                },
                complete: function(){
                    $('.bg-loading').removeClass('d-flex').addClass('d-none');
                }
            });
        });
    </script>
@endsection
