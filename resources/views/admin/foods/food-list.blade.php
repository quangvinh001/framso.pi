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
            <div class="add-food">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-success " data-bs-toggle="modal" data-bs-target="#addfood">
                    <i class="uil uil-plus"></i> THÊM
                    {{ $title }}
                </button>
            </div>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="uil uil-chart"></i>
                    <span class="text">{{ $title }}</span>
                </div>
                <div class="activity-data">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="data-title">ID</th>
                                <th class="data-title">Tên Thức Ăn</th>
                                <th class="data-title">Giá</th>
                                <th class="data-title">Số Lượng</th>
                                <th class="data-title">Hình Ảnh</th>
                                <th class="data-title">Đơn Vị </th>
                                <th class="data-title">Giới Thiệu</th>
                                <th class="data-title">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($foods as $food)
                                <form action="{{ route('foods.destroy', ['food' => $food->id]) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <tr class="activity-data">
                                        <td class="data-list"><a href="foods/{{ $food->id }}">{{ $food->id }}</a>
                                        </td>
                                        <td class="data-list">{{ $food->name }}</td>
                                        <td class="data-list">{{ $food->price }}</td>
                                        <td class="data-list">{{ $food->num }}</td>
                                        <td><img src="/build/images/{{ $food->image }}" alt=""
                                                style="width: 120px;"></a></td>
                                        <td class="data-list">{{ $food->unit }}</td>
                                        <td class="data-list">{{ $food->note }}</td>
                                        <td class="data-list"> <button type="button" class="btn btn-success "
                                                data-bs-toggle="modal" data-bs-target="#edit-food">
                                                <i class="uil uil-edit"></i>
                                            </button>
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
    @include('admin.foods.food-add')
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $('#add-job-form').validate({
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
        })
    </script>
@endsection
