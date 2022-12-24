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

        .content form .user-details {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin: 20px 0 12px 0;
        }

        form .user-details .input-box {
            margin-bottom: 15px;
            width: calc(100% / 2 - 20px);
        }

        form .input-box span.details {
            display: block;
            margin-top: 10px;
            font-weight: 500;
            margin-bottom: 5px;
        }

        .user-details .input-box input {
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

        .user-details .input-box input:focus,
        .user-details .input-box input:valid {
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

            form .user-details .input-box {
                margin-bottom: 15px;
                width: 100%;
            }

            form .category {
                width: 100%;
            }

            .content form .user-details {
                max-height: 300px;
                overflow-y: scroll;
            }

            .user-details::-webkit-scrollbar {
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
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="container-fluid px-4">
            <button type="button" class="btn btn-success " data-bs-toggle="modal" data-bs-target="#add-pet">
                <i class="uil uil-plus"></i> THÊM {{ $title }}
            </button>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fa fa-paw" aria-hidden="true"></i>
                    {{ $title }}
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
                            @foreach ($pet as $pet)
                                <form action="{{ route('pets.destroy', $pet['id']) }}" method="post">
                                    @method('delete') <input name="_method" type="hidden" value="DELETE">
                                    @csrf
                                    <tr class="active">
                                        <td><a href="pets/{{ $pet->id }}">{{ $pet->id }}</a></td>
                                        <td><img src="/build/images/{{ $pet->image }}" alt=""
                                                style="width: 120px;"></a></td>
                                        <td>{{ $pet->name }}</td>
                                        <td>{{ $pet->num }}</td>
                                        <td>{{ $pet->gender }}</td>
                                        <td>{{ $pet->note }}</td>
                                        <td class="data-list">
                                            {{-- <button  type="button" class="btn btn-success "
                                            data-bs-toggle="modal" data-bs-target="#edit-pet">
                                            <i class="uil uil-edit"></i>
                                        </button> --}}
                                            <button data-url="{{ route('pets.update', $pet->id) }}"​
                                                type="button" data-target="#edit-pet" data-toggle="modal"
                                                class="btn btn-warning btn-edit">Edit</button>
                                            <button name="delete" type="submit" class="btn btn-danger"> <i
                                                    class="uil uil-trash-alt"></i></button>
                                                    
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
    </div>
    </div>
    {{-- <div class="modal fade" id="edit-pet" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Thêm {{ $title }}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="content">
                        <form action="{{ route('pets.update', $pet['id']) }} " id="add-user-form" method="POST">
                            <div class="user-details">
                                <div class="input-box">
                                    <span class="details">Username</span>
                                    <input name="name" placeholder="Enter your name">
                                    @error('name')
                                        <span class="ermsg">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="input-box">
                                    <span class="details">Email</span>
                                    <input name="email" type="text" placeholder="Enter your email">
                                    @error('email')
                                        <span class="ermsg">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="input-box">
                                    <span class="details">Phone Number</span>
                                    <input name="phone" type="text" placeholder="Enter your phone number">
                                    @error('phone')
                                        <span class="ermsg">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="input-box">
                                    <span class="details">Address</span>
                                    <input name="address" type="text" placeholder="Enter your adrress">
                                    @error('address')
                                        <span class="ermsg">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="input-box">
                                    <span class="details">Password</span>
                                    <input name="password" type="password" placeholder="Enter your password">
                                    @error('password')
                                        <span class="ermsg">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="input-box">
                                    <span class="details">Confirm Password</span>
                                    <input name="repassword" type="password" placeholder="Confirm your password">
                                    @error('repassword')
                                        <span class="ermsg">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            @csrf
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Thêm {{ $title }}</button>
                </div>
                </form>
            </div>
        </div>
    </div> --}}

@endsection

