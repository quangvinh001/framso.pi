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
            <div class="add-vacxin">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-success " data-bs-toggle="modal" data-bs-target="#addvacxin">
                    <i class="uil uil-plus"></i> THÊM
                    {{$title}}
                </button>
            </div>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="uil uil-syringe"></i>
                    <span class="text">{{$title}}</span>
                </div>
                <div class="activity-data">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="data-title">ID</th>
                                <th class="data-title">Tên Vacxin</th>
                                <th class="data-title">Giá</th>
                                <th class="data-title">Số Lượng</th>
                                <th class="data-title">Hình Ảnh</th>
                                <th class="data-title">Giới Thiệu</th>
                                <th class="data-title">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($vacxins as $vacxin)
                            <form action="{{ route('vacxins.destroy', ['vacxin' => $vacxin->id]) }}"
                                method="post">
                                @csrf
                                @method('delete')
                                    <tr class="activity-data">
                                        <td class="data-list"><a href="vacxins/{{ $vacxin->id }}">{{ $key++ }}</a>
                                        </td>
                                        <td class="data-list">{{ $vacxin->name }}</td>
                                        <td class="data-list">{{ $vacxin->price }}</td>
                                        <td class="data-list">{{ $vacxin->num }}</td>
                                        <td><img src="/build/images/{{$vacxin->image}}" alt="" style="width: 120px;"></a></td>
                                        <td class="data-list">{{ $vacxin->note }}</td>
                                        <td class="data-list"> <button type="button" class="btn btn-success "
                                                data-bs-toggle="modal" data-bs-target="#edit-vacxin">
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
    @include('admin.vacxin-add')
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $('#add-vacxin-form').validate({
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
