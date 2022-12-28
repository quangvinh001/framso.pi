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
                <button type="button" class="btn btn-success btn-add" data-bs-toggle="modal" data-bs-target="#modal-add-food">
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
                            @foreach ($food as $food)
                                <form action="{{ route('foods.destroy', ['food' => $food->id]) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <tr class="activity-data">
                                        <td class="data-list"><a href="foods/{{ $food->id }}">{{ $key++ }}</a>
                                        </td>
                                        <td style="width: 150px;" class="data-list">{{ $food->name }}</td>
                                        <td class="data-list">{{ $food->price }}</td>
                                        <td class="data-list">{{ $food->num }}</td>
                                        <td><img src="/build/images/{{ $food->image }}" alt=""
                                                style="width: 120px;"></a></td>
                                        <td class="data-list">{{ $food->unit }}</td>
                                        <td style="width: 350px;" class="data-list">{{ $food->note }}</td>
                                        {{-- <td class="data-list"> 
                                                <button data-url="{{ route('foods.edit', $food->id) }}" type="button"
                                                    class="btn btn-success js-edit-food">
                                                    <i class="uil uil-edit"></i>
                                                </button>
    
                                            </button>
                                            <button name="delete" type="submit" class="btn btn-danger"> <i
                                                    class="uil uil-trash-alt"></i></button>
                                        </td> --}}
                                        <td>
                                            {{-- <button data-url="{{ route('foods.show', $food->id) }}"​ type="button"
                                                data-target="#show" data-toggle="modal"
                                                class="btn btn-info btn-show">Detail</button> --}}
                                            <button data-url="{{ route('foods.edit', $food->id) }}"​ type="button"
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
    @include('admin.food-add')
    {{-- @include('admin.food-edit') --}}
@endsection
@section('js')
    <script type="text/javascript">
        $(document).ready(function() {
            $('body').on("click", ".btn-edit", function() {
                var $btn = $(this);
                var urlModal = $btn.data('url');
                $.get(urlModal, function(result) {
                    var $modal = $('#edit-food');
                    if ($modal.length) {
                        $modal.replaceWith(result);
                    } else {
                        $('body').append(result);
                        $modal = $('#edit-food');
                    }
                    new bootstrap.Modal('#edit-food').show();
                    $modal.on('click', 'button[type=submit]', function() {
                        $modal.find('form')[0].submit();
                    });
                    $('#edit-food form').validate({
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
    </script>
    <script>
        $("document").ready(function() {
            $(".btn-danger").click(function() {
                return confirm("Bạn có thực sự muốn xóa?");
            });
        });
    </script>
@endsection
