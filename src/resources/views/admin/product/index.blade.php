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
                    <button type="button" class="btn rounded-pill btn-add" id="btn_create_product" data-toggle="modal" data-target="#modal-add">
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
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 col-lg-6"></div>
                        <div class="col-12 col-lg-6"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-add" tabindex="-1" role="dialog" aria-labelledby="modalAdd" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="{{ route('admin.products.create') }}" method="POST" id="form-add" enctype="multipart/form-data" autocomplete="off">
                    <div class="modal-header">
                        <h5 class="modal-title font-weight-bold">Thêm sản phẩm</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body px-5">
                        <div class="row">
                            <div class="col-12 col-lg-8">
                                <div class="form-group">
                                    <label for="input-title">Tên sản phẩm:</label>
                                    <input type="text" name="title" class="form-control" id="input-title" placeholder="Nhập tên sản phẩm">
                                </div>
                            </div>
                            <div class="col-12 col-lg-4">
                                <div class="form-group">
                                    <label for="input-category">Category</label>
                                    <select class="form-control" name="category" id="input-category">
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="input-file">Ảnh sản phẩm</label>
                            <div class="row">
                                <div class="col-12 col-lg-6">
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="image" class="form-control custom-file-input" id="input-file">
                                            <label class="custom-file-label" for="input-file">Chọn ảnh</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="text-center">
                                        <img id="image_preview_container" src="{{ asset('storage/image/products/image-preview.png') }}"
                                             alt="preview image" style="max-height: 300px;">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="input-price">Giá sản phẩm:</label>
                            <input type="text" name="price" class="form-control" id="input-price" placeholder="Nhập giá sản phẩm">
                        </div>
                        <div class="form-group">
                            <label for="input-description">Mô tả:</label>
                            <textarea name="description" class="form-control no-resize" id="input-description" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-brown">Lưu</button>
                    </div>
                </form>
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

        $(document).ready(function (e) {
            function success(mess) {
                $(document).Toasts("create", {
                    class: "bg-success",
                    title: "Thành công",
                    autohide: true,
                    delay: 2000,
                    body: mess,
                });
                table.ajax.reload(null, false);
            }

            function fail(mess) {
                $(document).Toasts("create", {
                    class: "bg-danger",
                    title: "Thất bại",
                    autohide: true,
                    delay: 2000,
                    body: mess,
                });
            }

            $("#input-price").inputmask("decimal", {
                radixPoint: ".",
                groupSeparator: ",",
                digits: 2,
                rightAlign: false,
                autoGroup: true,
                prefix: '',
                suffix: ' ₫'
            });

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#input-file').change(function(){
                let reader = new FileReader();
                reader.onload = (e) => {
                    $('#image_preview_container').attr('src', e.target.result);
                }
                $('.custom-file-label').text(this.files[0].name);
                reader.readAsDataURL(this.files[0]);

            });

            var validator = $("#form-add").validate({
                onfocusout: function (element) {
                    var $element = $(element);
                    $element.valid();
                },
                onkeyup: function (element) {
                    var $row = $(element).closest(".form-group");
                    if ($row.hasClass("is-row-error")) {
                        $(element).valid();
                    }
                },
                highlight: function (element, errorClass, validClass) {
                    var $row = $(element).closest(".form-group");
                    $row.addClass("is-row-error");
                    $row.removeClass("is-row-valid");
                },
                unhighlight: function (element, errorClass, validClass) {
                    var $row = $(element).closest(".form-group");
                    $row.addClass("is-row-valid");
                    $row.removeClass("is-row-error");
                },
                rules: {
                    title: {
                        required: true,
                        maxlength: 100,
                    },
                    category: {
                        required: true
                    },
                    price: {
                        required: true
                    },
                    image: {
                        required: true
                    },
                    description: {
                        required: true,
                        maxlength: 1000
                    },
                },
                messages: {
                    title: {
                        required: 'Đây là trường bắt buộc.',
                        maxlength: 'Độ dài tối đa 100 ký tự.',
                    },
                    category: {
                        required: 'Đây là trường bắt buộc.'
                    },
                    price: {
                        required: 'Đây là trường bắt buộc.'
                    },
                    image: {
                        required: 'Đây là trường bắt buộc.'
                    },
                    description: {
                        required: 'Đây là trường bắt buộc.',
                        maxlength: 'Độ dài tối đa 1000 ký tự.',
                    },
                },
                errorPlacement: function (error, element) {
                    if ($(element).is('#input-file')) {
                        error.insertAfter($(element).closest('.input-group'));
                    } else {
                        error.insertAfter(element);
                    }
                },
                submitHandler: function () {
                },
            });

            $("#modal-add").on("hide.bs.modal", function () {
                $('.form-control').val('');
                $('#input-category option:first-child').prop('selected', true);
                $('.custom-file-label').text('Chọn ảnh');
                $('#image_preview_container').attr('src', '{{ asset('storage/image/products/image-preview.png') }}');
                validator.resetForm();
            });

            $('#form-add').submit(function(e) {
                e.preventDefault();

                var formData = new FormData(this);

                $.ajax({
                    type:'POST',
                    url: '{{ route('admin.products.create') }}',
                    dataType: 'JSON',
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    beforeSend: function () {
                        $("#form-add button[type='submit']").attr("disabled", "")
                            .html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Lưu');
                    },
                    success: (data) => {
                        if(data) {
                            $('#modal-add').modal('hide');
                            success('Bạn đã thêm sản phẩm thành công.');
                        }
                    },
                    error: function(){
                        fail('Thêm sản phẩm thất bại, hãy kiểm tra lại.');
                    },
                    complete: function () {
                        $("#form-add button[type='submit']").removeAttr("disabled").html("Lưu");
                    }
                });
            });
        });
    </script>
@endsection
