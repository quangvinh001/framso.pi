@extends('admin.layout.master')
@section('title')
    {{ $title }}
@endsection
@section('js')
    <script></script>
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
                    NGƯỜI DÙNG
                </button>
            </div>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="uil uil-user"></i>
                    <span class="text">NGƯỜI DÙNG</span>
                </div>
                <div class="activity-data">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="data-title">ID</th>
                                <th class="data-title">Fullname</th>
                                <th class="data-title">Email</th>
                                <th class="data-title">Password</th>
                                <th class="data-title">Phone</th>
                                <th class="data-title">Address</th>
                                <th class="data-title">Level</th>
                                <th class="data-title">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <form action="{{ route('users.destroy', $user['id']) }}" method="post">
                                    @method('delete') <input name="_method" type="hidden" value="DELETE">
                                    @csrf
                                    <tr class="activity-data">
                                        <td class="data-list"><a href="users/{{ $user->id }}">{{ $user->id }}</a>
                                        </td>
                                        <td class="data-list">{{ $user->name }}</td>
                                        <td class="data-list">{{ $user->email }}</td>
                                        <td class="data-list">****************</td>
                                        <td class="data-list">{{ $user->phone }}</td>
                                        <td class="data-list">{{ $user->address }}</td>
                                        <td class="data-list">{{ $user->id_role }}</td>
                                        <td class="data-list" style="width:120px"><button type="button"
                                                class="btn btn-success"
                                                onclick="window.location='{{ route('users.edit', $user->id) }}'"><i
                                                    class="fas fa-pen"></i></button>
                                            <button name="delete" class="btn btn-danger" type="submit"><i
                                                    class="fas fa-trash"></i></button>
                                </form>
                                </td>
                                <td>
                                    <!-- <form action="{{ route('users.destroy', ['user' => $user->id]) }}" method="post">
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


    <!-- The Modal -->
   
<!-- Modal -->
<div class="modal fade" id="adduser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="content">
                <form action="{{ route('postRegisteradmin') }} " method="POST">
                    <div class="user-details">
                        <div class="input-box">
                            <span class="details">Username</span>
                            <input name="name" type="text" placeholder="Enter your name">
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
                            <input name="adrress" type="text" placeholder="Enter your adrress">
                            @error('adrress')
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
    
                    <div class="button">
                        <input type="submit" value="Register">
                    </div>
                    @csrf
                </form>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Understood</button>
        </div>
      </div>
    </div>
  </div>
@endsection
