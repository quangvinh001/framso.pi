@extends('admin.layout.master')
@section('title')
    {{ $title }}
@endsection
@section('css')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        /* body{
                  height: 100vh;
                  display: flex;
                  justify-content: center;
                  align-items: center;
                  padding: 10px;
                  background: linear-gradient(135deg, #71b7e6, #9b59b6);
                } */
        .modal-body {
            max-width: 700px;
            width: 100%;
            background-color: #fff;
            padding: 25px 30px;
            border-radius: 5px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.15);

        }

        .modal-body .title {
            font-size: 25px;
            font-weight: 500;
            position: relative;
        }

        .modal-body .title::before {
            content: "";
            position: absolute;
            left: 0;
            bottom: 0;
            height: 3px;
            width: 30px;
            border-radius: 5px;
            background: linear-gradient(135deg, #71b7e6, #9b59b6);
        }

        .content form .pet-details {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin: 20px 0 12px 0;
        }

        form .pet-details .input-box {
            margin-bottom: 15px;
            width: calc(100% / 2 - 20px);
        }

        form .input-box span.details {
            display: block;
            margin-top: 10px;
            font-weight: 500;
            margin-bottom: 5px;
        }

        .pet-details .input-box input {
            height: 45px;
            width: 100%;
            outline: none;
            font-size: 16px;
            border-radius: 5px;
            padding-left: 15px;
            border: 1px solid #ccc;
            border-bottom-width: 2px;
            transition: all 0.3s ease;
        }

        .pet-details .input-box input:focus,
        .pet-details .input-box input:valid {
            border-color: #9b59b6;
        }

        form .gender-details .gender-title {
            font-size: 20px;
            font-weight: 500;
        }

        form .category {
            display: flex;
            width: 80%;
            margin: 14px 0;
            justify-content: space-between;
        }

        form .category label {
            display: flex;
            align-items: center;
            cursor: pointer;
        }

        form .category label .dot {
            height: 18px;
            width: 18px;
            border-radius: 50%;
            margin-right: 10px;
            background: #d9d9d9;
            border: 5px solid transparent;
            transition: all 0.3s ease;
        }

        #dot-1:checked~.category label .one,
        #dot-2:checked~.category label .two,
        #dot-3:checked~.category label .three {
            background: #9b59b6;
            border-color: #d9d9d9;
        }

        form input[type="radio"] {
            display: none;
        }

        form .button {
            height: 45px;
            margin: 35px 0
        }

        form .button input {
            height: 100%;
            width: 100%;
            border-radius: 5px;
            border: none;
            color: #fff;
            font-size: 18px;
            font-weight: 500;
            letter-spacing: 1px;
            cursor: pointer;
            transition: all 0.3s ease;
            background: #34B982;
        }

        form .button input:hover {
            /* transform: scale(0.99); */
            background: #0E4F55;
        }

        @media(max-width: 584px) {
            .container {
                max-width: 100%;
            }

            form .pet-details .input-box {
                margin-bottom: 15px;
                width: 100%;
            }

            form .category {
                width: 100%;
            }

            .content form .pet-details {
                max-height: 300px;
                overflow-y: scroll;
            }

            .pet-details::-webkit-scrollbar {
                width: 5px;
            }
        }

        @media(max-width: 459px) {
            .container .content .category {
                flex-direction: column;
            }
        }

        .logo-title {
            width: 200px;
        }

        .ermsg {
            position: absolute;
            color: red;
            font-size: 14px;
            font-weight: 500;
            margin-left: 7px;
            padding-top: 2px;
            display: flex;
        }

        .alert-danger {
            height: 55px;
            font-size: 17px;
            position: absolute;
            display: flex;
            justify-content: space-between;
            align-items: center;
            /* padding: 40px; */
            top: 55px;
            width: 55vh;
            padding-left: 30px;
        }
    </style>
@endsection
@section('content')
    <div class="container ">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="container-fluid px-4">
            <div class="add-pet">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-success " data-bs-toggle="modal" data-bs-target="#add-pet-modal">
                    <i class="uil uil-plus"></i> THÊM
                    {{ $title }}
                </button>
            </div>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="uil uil-pet"></i>
                    <span class="text">{{ $title }}</span>
                </div>
                <div class="activity-data">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="data-title">ID</th>
                                <th class="data-title">Hình Ảnh</th>
                                <th class="data-title">Tên Vật Nuôi</th>
                                <th class="data-title">Số Lượng</th>
                                <th class="data-title">Đơn Vị</th>
                                <th class="data-title">Giới Tính</th>
                                <th class="data-title">Giới Thiệu</th>
                                <th class="data-title">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pet as $pet)
                                <form action="{{ route('pets.destroy', ['pet' => $pet->id]) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <tr class="activity-data">
                                        <td class="data-list"><a href="pets/{{ $pet->id }}">{{ $pet->id }}</a>
                                        </td>
                                        <td class="data-list"><img src="/build/images/{{ $pet->image }}" alt="" width="100px"></td>
                                        <td class="data-list">{{ $pet->name }}</td>
                                        <td class="data-list">{{ $pet->num }}</td>
                                        <td class="data-list">{{ $pet->unit }}</td>
                                        <td class="data-list">{{ $pet->gender }}</td>
                                        <td class="data-list">{{ $pet->note }}</td>
                                        <td class="data-list">
                                            <button data-url="{{ route('pets.edit', $pet->id) }}" type="button" class="btn btn-success js-edit-pet">
                                                <i class="uil uil-edit"></i>
                                            </button>
                                            {{-- <button data-url="{{ route('pets.edit', $pet->id) }}"​ type="button"
                                                data-target="#edit-pet" data-toggle="modal"
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
    @include('admin.pets.pet-add')
@endsection
@section('js')
    <script>
        // add
        $("document").ready(function() {
            $('#add-pet-form').validate({
                debug: false,
                errorClass: "ermsg",
                errorElement: "span",
                rules: {
                    name: {
                        required: true,
                    },
                    num: {
                        required: true,
                    },
                    unit: {
                        required: true,
                    },
                    gender: {
                        required: true,
                    },
                    image: {
                        required: true,
                        minlength: 6,
                        maxlength: 20
                    },
                    note: {
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
            $('body').on("click", ".js-edit-pet", function () {
                var $btn = $(this);
                var urlModal = $btn.data('url');
                $.get(urlModal, function (result) {
                    var $modal = $('#edit-pet-modal');
                    if ($modal.length) {
                        $modal.replaceWith(result);
                    } else {
                        $('body').append(result);
                        $modal = $('#edit-pet-modal');
                    }
                    new bootstrap.Modal('#edit-pet-modal').show();
                    $modal.on('click', 'button[type=submit]', function () {
                        $modal.find('form')[0].submit();
                    });
                    $('#edit-pet-modal form').validate({
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

