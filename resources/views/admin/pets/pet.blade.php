@extends('admin.layout.master')
@section('title')
{{$title}}
@endsection
@section('content')
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="container-fluid px-4">
            <button type="button" class="btn btn-success " data-bs-toggle="modal" data-bs-target="#adduser">
                <i class="uil uil-plus"></i> THÊM VẬT NUÔI
            </button>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                  PET
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Hình Ảnh</th>
                                <th>Tên Vật Nuôi</th>
                                <th>Số Lượng</th>
                                <th>Giới Tính</th>
                                <th>Lưu Ý</th>
                            </tr>
                        </thead>
                     
                        <tbody>
                            @foreach ($pets as $pet)
                                <form action="{{ route('pets.destroy', $pet['id']) }}" method="post">
                                    @method('delete') <input name="_method" type="hidden" value="DELETE">
                                    @csrf
                                    <tr class="active">
                                        <td><a href="pets/{{ $pet->id }}">{{ $pet->id }}</a></td>
                                        <td><img src="/build/images/{{$pet->image}}" alt="" style="width: 120px;"></a></td>
                                        <td>{{ $pet->name }}</td>
                                        <td>{{ $pet->num }}</td>
                                        <td>{{ $pet->gender }}</td>
                                        <td>{{ $pet->note }}</td>
                                        <td style="width:120px"><button type="button" class="btn btn-success"
                                                onclick="window.location='{{ route('pets.edit', $pet->id) }}'"><i
                                                    class="fas fa-pen"></i></button>
                                            <button name="delete" class="btn btn-danger" type="submit"><i
                                                    class="fas fa-trash"></i></button>
                                </form>
                                </td>
                                <td>
                                    <!-- <form action="{{ route('pets.destroy', ['pet' => $pet->id]) }}" method="post">
                        @csrf
                        @method('delete')
                        <input type="submit" value="xoa" />
                    </form> -->

                                </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- script ajax (javascript) có thể đặt ở trong cặp thẻ head hoặc body -->
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
                    <script>
                        $("document").ready(function() {
                            $(".btn-danger").click(function() {
                                return confirm("Bạn có thực sự muốn xóa?");
                            });
                        });
                    </script>
                </div>
            </div>
        </div>
        </main>
    </div>
    </div>
@endsection