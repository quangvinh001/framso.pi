@extends('admin.layout.master')
@section('title')
    {{ $title }}
@endsection
@section('css')
    <style></style>
@endsection
@section('content')
    <div class="container ">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="container-fluid px-4">
            <div class="add-product d-flex align-cente">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-success " data-bs-toggle="modal" data-bs-target="#addproduct">
                    <i class="uil uil-plus"></i> THÊM
                    {{ $title }}
                </button>
                <div class="flex-grow-1"></div>
                {{-- Tong ton kho: {{$total}} --}}
                <form id="filter-form">
                    @csrf
                    <label class="input-group date" id="datepicker">
                        <input type="date" name="date" class="form-control" id="filter-date"
                            value="{{ $date }}" />
                    </label>
                </form>
                <script>
                    document.getElementById('filter-date').addEventListener("change", function() {
                        document.getElementById('filter-form').submit()
                    });
                </script>
            </div>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fa fa-cube" aria-hidden="true"></i>
                    <span class="text">{{ $title }}</span>
                </div>
                <div class="activity-data">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="data-title">ID</th>
                                <th class="data-title">Hình Ảnh</th>
                                <th class="data-title">Tên Sản Phẩm</th>
                                <th class="data-title">Đơn Vị</th>
                                <th class="data-title">Tổng Sản Lượng</th>
                                <th class="data-title">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($product as $product)
                                <form action="{{ route('products.destroy', ['product' => $product->id]) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <tr class="activity-data">
                                        <td class="data-list"><a href="products/{{ $product->id }}">{{ $key++ }}</a>
                                        </td>
                                        <td><img src="/build/images/{{ $product->image }}" alt=""
                                                style="width: 120px"></a></td>
                                        <td class="data-list">{{ $product->name }}</td>
                                        <td class="data-list">{{ $product->unit }}</td>
                                        <td class="data-list">{{ $product->num }}</td>
                                        <td class="data-list">
                                            <button data-url="{{ route('products.edit', $product->id) }}"​ type="button"
                                                data-target="#edit" data-toggle="modal"
                                                class="btn btn-warning btn-edit">Edit</button>
                                            <button ​ type="submit" data-target="#delete" data-toggle="modal"
                                                class="btn btn-danger btn-delete">Delete</button>
                                        </td>
                                    </tr>
                                </form>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        </main>
    </div>
    </div>

    <!-- Modal -->
    @include('admin.product-add')
    {{-- @include('admin.product-edit') --}}
@endsection
@section('js')
    <script>
        // add
        $("document").ready(function() {
            $('#add-product-form').validate({
                debug: false,
                errorClass: "ermsg",
                errorElement: "span",
                rules: {
                    name: {
                        required: true,
                    }
                },
                messages: {
                    name: {
                        required: 'Vui lòng nhập tên',
                    }
                },
                submitHandler: function(form) {
                    $(form).submit();
                },
                highlight: function(element, errorClass) {
                    $(element).removeClass(errorClass);
                }
            })

        });

        $(document).ready(function() {
            $('body').on("click", ".btn-edit", function() {
                var $btn = $(this);
                var urlModal = $btn.data('url');
                $.get(urlModal, function(result) {
                    var $modal = $('#edit-product');
                    if ($modal.length) {
                        $modal.replaceWith(result);
                    } else {
                        $('body').append(result);
                        $modal = $('#edit-product');
                    }
                    new bootstrap.Modal('#edit-product').show();
                    $modal.on('click', 'button[type=submit]', function() {
                        $modal.find('form')[0].submit();
                    });
                    $('#edit-product form').validate({
                        debug: false,
                        errorClass: "ermsg",
                        errorElement: "span",
                        rules: {
                            name: {
                                required: true,
                            }

                        },
                        messages: {
                            name: {
                                required: 'Vui lòng nhập tên',
                            }
                        },
                        submitHandler: function(form) {
                            $(form).submit();
                        },
                        highlight: function(element, errorClass) {
                            $(element).removeClass(errorClass);
                        }
                    });
                    $modal.on('hidden.bs.modal', function() {
                        $modal.remove();
                    })
                });
            })
        })
        $("document").ready(function() {
            $(".btn-danger").click(function() {
                return confirm("Bạn có thực sự muốn xóa?");
            });
        });
    </script>
@endsection
