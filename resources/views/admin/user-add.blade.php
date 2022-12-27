<div class="modal fade" id="adduser"  data-bs-keyboard="false" tabindex="-1"
aria-labelledby="staticBackdropLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Thêm Người Dùng</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="content">
                <form action="{{ route('users.store') }} " id="add-user-form" method="POST">
                    <div class="user-details">
                        <div class="input-box">
                            <span class="details">Họ và Tên</span>
                            <input name="name" placeholder="Họ và Tên">
                            @error('name')
                                <span class="ermsg">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="input-box">
                            <span class="details">Email</span>
                            <input name="email" type="text" placeholder="Email Đăng Nhập">
                            @error('email')
                                <span class="ermsg">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="input-box">
                            <span class="details">Số Điện Thoại</span>
                            <input name="phone" type="text" placeholder="Số Điện Thoại">
                            @error('phone')
                                <span class="ermsg">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="input-box">
                            <span class="details">Địa Chỉ</span>
                            <input name="address" type="text" placeholder="Địa Chỉ ">
                            @error('address')
                                <span class="ermsg">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="input-box">
                            <span class="details">Mật Khẩu</span>
                            <input name="password" type="password" placeholder="Nhập Mật Khẩu">
                            @error('password')
                                <span class="ermsg">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="input-box">
                            <span class="details">Nhập Lại Mật Khẩu</span>
                            <input name="repassword" type="password" placeholder="Nhập Lại Mật Khẩu">
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
            <button type="submit" class="btn btn-primary">Thêm {{$title}}</button>
        </div>
        </form>
    </div>
</div>
</div>

