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
                <button type="button" class="btn btn-success " data-bs-toggle="modal" data-bs-target="#adduser">
                    <i class="uil uil-plus"></i> THÊM
                    {{ $title }}
                </button>
                {{-- <button type="button" class="btn btn-success " data-bs-toggle="modal" data-bs-target="#adduser">
                    <i class="uil uil-plus"></i> PHÂN QUYỀN
                    {{ $title }}
                </button> --}}
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
                                <th class="data-title">Họ và Tên</th>
                                <th class="data-title">Email</th>
                                <th class="data-title">Mật Khẩu</th>
                                <th class="data-title">Số Điện Thoại</th>
                                <th class="data-title">Địa Chỉ</th>
                                <th class="data-title">Level</th>
                                <th class="data-title">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $user)

                                <form action="{{ route('users.destroy', ['user' => $user->id]) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <tr class="activity-data">
                                        <td class="data-list"><a href="users/{{ $user->id }}">{{ $key++ }}</a>
                                        </td>
                                        <td class="data-list">{{ $user->name }}</td>
                                        <td class="data-list">{{ $user->email }}</td>
                                        <td class="data-list">****************</td>
                                        <td class="data-list">{{ $user->phone }}</td>
                                        <td class="data-list">{{ $user->address }}</td>
                                       
                                        <td class="data-list">{{ $user->id_role }}</td>
                                    
                                        <td class="data-list">
                                            <button data-url="{{ route('users.edit', $user->id) }}" type="button"
                                                class="btn btn-success js-edit-user">
                                                <i class="uil uil-edit"></i>
                                            </button>


                                            {{-- <button data-url="{{ route('users.edit', $user->id) }}"​ type="button"
                                                data-target="#edit-user" data-toggle="modal"
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
    @include('admin.user-add')
@endsection
@section('js')
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
        $(document).ready(function() {
            $('body').on("click", ".js-edit-user", function() {
                var $btn = $(this);
                var urlModal = $btn.data('url');
                $.get(urlModal, function(result) {
                    var $modal = $('#edit-user-modal');
                    if ($modal.length) {
                        $modal.replaceWith(result);
                    } else {
                        $('body').append(result);
                        $modal = $('#edit-user-modal');
                    }
                    new bootstrap.Modal('#edit-user-modal').show();
                    $modal.on('click', 'button[type=submit]', function() {
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
                    $modal.on('hidden.bs.modal', function() {
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
