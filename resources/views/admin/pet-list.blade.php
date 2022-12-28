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
                            @foreach ($pets as $pet)
                                <form action="{{ route('pets.destroy', ['pet' => $pet->id]) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <tr class="activity-data">
                                        <td class="data-list"><a href="pets/{{ $pet->id }}">{{ $key++ }}</a>
                                        </td>
                                        <td class="data-list"><img src="/build/images/{{ $pet->image }}" alt="" width="100px"></td>
                                        <td class="data-list">{{ $pet->name }}</td>
                                        <td class="data-list">{{ $pet->num }}</td>
                                        <td class="data-list">{{ $pet->unit }}</td>
                                        <td class="data-list">{{ $pet->gender }}</td>
                                        <td class="data-list">{{ $pet->note }}</td>
                                        <td>
                                            {{-- <button data-url="{{ route('foods.show', $food->id) }}"​ type="button"
                                                data-target="#show" data-toggle="modal"
                                                class="btn btn-info btn-show">Detail</button> --}}
                                            <button data-url="{{ route('pets.edit', $pet->id) }}"​ type="button"
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
    @include('admin.pet-add')
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
                       
                    },
                    note: {
                        required: true
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
    </script>
    <script>
    
        $(document).ready(function () {
            $('body').on("click", ".btn-edit", function () {
                var $btn = $(this);
                var urlModal = $btn.data('url');
                $.get(urlModal, function (result) {
                    var $modal = $('#edit-pet');
                    if ($modal.length) {
                        $modal.replaceWith(result);
                    } else {
                        $('body').append(result);
                        $modal = $('#edit-pet');
                    }
                    
                    new bootstrap.Modal('#edit-pet modal').show();
                    $modal.on('click', 'button[type=submit]', function () {
                        $modal.find('form')[0].submit();
                    });
                    $('#edit-pet form').validate({
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

