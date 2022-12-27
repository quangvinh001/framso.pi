@extends('admin.layout.master')
@section('title')
    {{ $title }}
@endsection

@section('content')
    <div class="container ">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="container-fluid px-4">
            <div class="add-user">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-success " data-bs-toggle="modal" data-bs-target="#addbill">
                    <i class="uil uil-plus"></i> 
                    {{ $title }}
                </button>
            </div>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="uil uil-user"></i>
                    <span class="text">{{ $title }}</span>
                </div>
                <div class="activity-data">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="data-title">ID</th>
                                <th class="data-title">Tên Hóa Đơn</th>
                                <th class="data-title">Thời Gian</th>
                                <th class="data-title">Tổng Tiền</th>
                                <th class="data-title">Hình Thức Thánh Toán</th>
                                <th class="data-title">Trạng Thái</th>
                                <th class="data-title">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bill as $bill)
                                <form action="{{ route('bills.destroy', ['bill' => $bill->id]) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <tr class="activity-data">
                                        <td class="data-list"><a href="bills/{{ $bill->id }}">{{ $stt++ }}</a>
                                        </td>
                                        <td   style="width:250px;" class="data-list">{{ $bill->name }}</td>
                                        <td class="data-list">{{ $bill->date }}</td>
                                        <td class="data-list">{{ $bill->total }}</td>
                                        <td class="data-list">{{ $bill->payment }}</td>
                                        <td class="data-list"><a href="">{{ $bill->status }}</a></td>
                                        <td class="data-list">
                                            <button data-url="{{ route('bills.edit', $bill->id) }}" type="button" class="btn btn-success js-edit-bill">
                                                <i class="uil uil-edit"></i>
                                            </button>
                                            {{-- <button data-url="{{ route('bills.edit', $bill->id) }}"​ type="button"
                                                data-target="#edit-bill" data-toggle="modal"
                                                class="btn btn-warning btn-edit"> <i class="uil uil-edit"></i></button> --}}
                                            <button name="delete" type="submit" class="btn btn-danger"> <i
                                                    class="uil uil-trash-alt"></i></button>
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
    {{-- @include('admin.bill-add') --}}
@endsection
@section('js')
    <script>
        // add
        $("document").ready(function() {
            $('#add-bill-form').validate({
                debug: false,
                errorClass: "ermsg",
                errorElement: "span",
                rules: {
                    name: {
                        required: true,
                    },
                    email: {
                        required: true,
                    },
                    phone: {
                        required: true,
                    },
                    address: {
                        required: true,
                    },
                    password: {
                        required: true,
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
                    },
                    phone: {
                        required: 'Vui lòng nhập phone',
                    },
                    address: {
                        required: 'Vui lòng nhập address',
                    },
                    password: {
                        required: 'Vui lòng nhập password',
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
            $('body').on("click", ".js-edit-bill", function () {
                var $btn = $(this);
                var urlModal = $btn.data('url');
                $.get(urlModal, function (result) {
                    var $modal = $('#edit-bill-modal');
                    if ($modal.length) {
                        $modal.replaceWith(result);
                    } else {
                        $('body').append(result);
                        $modal = $('#edit-bill-modal');
                    }
                    new bootstrap.Modal('#edit-bill-modal').show();
                    $modal.on('click', 'button[type=submit]', function () {
                        $modal.find('form')[0].submit();
                    });
                    $('#edit-bill-modal form').validate({
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
@endsection

