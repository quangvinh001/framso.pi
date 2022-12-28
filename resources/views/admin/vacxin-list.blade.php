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
                                <th class="data-title">Hình ảnh</th>
                                <th class="data-title">Tên Vacxin</th>
                                <th class="data-title">Giá</th>
                                <th class="data-title">Số Lượng</th>
                                <th class="data-title">Công dụng</th>
                                <th class="data-title">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($vacxin as $vacxin)
                            <form action="{{ route('vacxins.destroy', $vacxin->id) }}"
                                method="post">
                                @csrf
                                @method('delete')
                                    <tr class="activity-data">
                                        <td class="data-list"><a href="vacxins/{{ $vacxin->id }}">{{ $stt++ }}</a>
                                        </td>
                                        <td class="data-list"><img src="build/images/{{ $vacxin->image }}" alt="" width="100px"></>
                                        <td class="data-list">{{ $vacxin->name }}</td>
                                        <td class="data-list">{{ $vacxin->price }}</td>
                                        <td class="data-list">{{ $vacxin->num }}</td>
                                        <td class="data-list">{{ $vacxin->note }}</td>
                                        <td>
                                            {{-- <button data-url="{{ route('foods.show', $food->id) }}"​ type="button"
                                                data-target="#show" data-toggle="modal"
                                                class="btn btn-info btn-show">Detail</button> --}}
                                            <button data-url="{{ route('vacxins.edit', $vacxin->id) }}"​ type="button"
                                                data-target="#edit" data-toggle="modal"
                                                class="btn btn-warning btn-edit">Edit</button>
                                            <button ​ type="submit" data-target="#delete" data-toggle="modal"
                                                class="btn btn-danger btn-delete">Delete</button>
                                        </td>
                                    </tr>
                                </form>
                       
                                {{-- @if ($Vacxin->name == null)

                                <h1>ko có j</h1>
                                    
                                @endif --}}
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
   
    {{-- @include('admin.vacxin-edit') --}}
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
        })

        $(document).ready(function() {
        $('body').on("click", ".btn-edit", function()  {
            var $btn = $(this);
            var urlModal = $btn.data('url');
            $.get(urlModal, function(result) {
                var $modal = $('#edit-vacxin');
                if ($modal.length) {
                    $modal.replaceWith(result);
                } else {
                    $('body').append(result);
                    $modal = $('#edit-vacxin');
                }
                new bootstrap.Modal('#edit-vacxin').show();
                $modal.on('click', 'button[type=submit]', function() {
                    $modal.find('form')[0].submit();
                });
                $('#edit-vacxin form').validate({
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
    });
        
    </script>
   

@endsection
