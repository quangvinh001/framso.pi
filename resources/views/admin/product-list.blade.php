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
                    {{$title}}
                </button>
                <div class="flex-grow-1"></div>
                {{-- Tong ton kho: {{$total}} --}}
                <form id="filter-form">
                    @csrf
                    <label class="input-group date" id="datepicker">
                        <input type="date" name="date" class="form-control" id="filter-date" value="{{ $date }}"/>
                    </label>
                </form>
                <script>
                    document.getElementById('filter-date').addEventListener("change", function () {
                        document.getElementById('filter-form').submit()
                    });
                </script>
            </div>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fa fa-cube" aria-hidden="true"></i>
                    <span class="text">{{$title}}</span>
                </div>
                <div class="activity-data">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="data-title">ID</th>
                                <th class="data-title">Hình Ảnh</th>
                                <th class="data-title">Tên Sản Phẩm</th>
                                <th class="data-title">Đơn Vị</th>
                                <th class="data-title">Tồn</th>
                                <th class="data-title">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                            <form action="{{ route('products.destroy', ['product' => $product->id]) }}"
                                method="post">
                                @csrf
                                @method('delete')
                                    <tr class="activity-data">
                                        <td class="data-list"><a href="products/{{ $product->id }}">{{ $key++ }}</a>
                                        </td>
                                        <td><img src="/build/images/{{$product->image}}" alt="" style="width: 120px"></a></td>
                                        <td class="data-list">{{ $product->name }}</td>
                                        <td class="data-list">{{ $product->unit }}</td>
                                        <td class="data-list">{{ $product->num }}</td>
                                        <td class="data-list"> <button type="button" class="btn btn-success "
                                                data-bs-toggle="modal" data-bs-target="#edit-product">
                                                <i class="uil uil-edit"></i>
                                            </button>
                                            <button name="delete" type="submit" class="btn btn-danger"> <i class="uil uil-trash-alt"></i></button>
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
@endsection
{{-- @section('js')
    <script>
        // add
        $("document").ready(function() {
            $('#add-user-form').validate({
                debug: false,
                errorClass: "ermsg",
                errorElement: "span",
                rules: {
                    name: {
                        required: true,
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    phone: {
                        required: true,
                    },
                    address: {
                        required: true,
                    },
                    password: {
                        required: true,
                        minlength: 6,
                        maxlength: 20
                    },
                    repassword: {
                        equalTo: '[name=password]'
                    }
                },
                messages: {
                    name: {
                        required: 'Vui lòng nhập tên',
                    },
                    email: {
                        required: 'Vui lòng nhập email',
                        email: 'Không đúng định dạng email'
                    },
                    phone: {
                        required: 'Vui lòng nhập phone',
                    },
                    address: {
                        required: 'Vui lòng nhập address',
                    },
                    password: {
                        required: 'Vui lòng nhập password',
                        minlength: 'Mật khẩu ít nhất 6 ký tự',
                        maxlength: 'Mật khẩu nhiều nhất 20 ký tự'
                    },
                    repassword: {
                        equalTo: 'Mật khẩu không giống nhau'
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
    </script>
    <script>
        $(document).ready(function () {
            $('body').on("click", ".js-edit-user", function () {
                var $btn = $(this);
                var urlModal = $btn.data('url');
                $.get(urlModal, function (result) {
                    var $modal = $('#edit-user-modal');
                    if ($modal.length) {
                        $modal.replaceWith(result);
                    } else {
                        $('body').append(result);
                        $modal = $('#edit-user-modal');
                    }
                    new bootstrap.Modal('#edit-user-modal').show();
                    $modal.on('click', 'button[type=submit]', function () {
                        $modal.find('form')[0].submit();
                    });
                    $('#edit-user-modal form').validate({
                        debug: false,
                        errorClass: "ermsg",
                        errorElement: "span",
                        rules: {
                            name: {
                                required: true,
                            },
                            email: {
                                required: true,
                                email: true
                            },
                            phone: {
                                required: true,
                            },
                            address: {
                                required: true,
                            },
                            password: {
                                required: true,
                                minlength: 6,
                                maxlength: 20
                            },
                            id_role: {
                                required: true
                            }
                        },
                        messages: {
                            name: {
                                required: 'Vui lòng nhập tên',
                            },
                            email: {
                                required: 'Vui lòng nhập email',
                                email: 'Không đúng định dạng email'
                            },
                            phone: {
                                required: 'Vui lòng nhập phone',
                            },
                            address: {
                                required: 'Vui lòng nhập address',
                            },
                            password: {
                                required: 'Vui lòng nhập password',
                                minlength: 'Mật khẩu ít nhất 6 ký tự',
                                maxlength: 'Mật khẩu nhiều nhất 20 ký tự'
                            },
                            id_role: {
                                required: 'Vui lòng nhập role.'
                            }
                        },
                        submitHandler: function(form) {
                            $(form).submit();
                        },
                        highlight: function(element, errorClass) {
                            $(element).removeClass(errorClass);
                        }
                    });
                    $modal.on('hidden.bs.modal', function () {
                        $modal.remove();
                    })
                });
            })
        })
    </script>
    <script> 
        $("document").ready(function() {
          $(".btn-danger").click(function() {
              return confirm("Bạn có thực sự muốn xóa?");
          });
      });
      </script>
@endsection --}}
