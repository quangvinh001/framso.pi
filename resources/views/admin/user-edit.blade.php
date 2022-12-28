<div class="modal fade" id="edit-user-modal" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel"> SỬA {{ $title }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="content">
                    <form action="{{ route('users.update', ['user' => $user->id]) }} " id="edit-user-form"
                        method="post">
                        @method('put')
                        <div class="user-details">
                            <div class="input-box">
                                <span class="details">Họ và Tên</span>
                                <input name="name" placeholder="Họ và Tên"
                                    value="{{ old('username') ?? $user->name }}">
                                @error('name')
                                    <span class="ermsg">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="input-box">
                                <span class="details">Email</span>
                                <input name="email" type="text" placeholder="Email đăng nhập"
                                    value="{{ old('email') ?? $user->email }}">
                                @error('email')
                                    <span class="ermsg">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="input-box">
                                <span class="details">Số Điện Thoại</span>
                                <input name="phone" type="text" placeholder="Số điện thoại"
                                    value="{{ old('phone') ?? $user->phone }}">
                                @error('phone')
                                    <span class="ermsg">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="input-box">
                                <span class="details">Địa Chỉ</span>
                                <input name="address" type="text" placeholder="Địa Chỉ"
                                    value="{{ old('address') ?? $user->address }}">
                                @error('address')
                                    <span class="ermsg">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="input-box">
                                <span class="details">Hình ảnh</span>
                                <input name="image" type="file" placeholder=" Hình Ảnh">
                                @error('image')
                                    <span class="ermsg">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="input-box">
                                <span class="details">Role</span>
                                <select class="id_role" class="form-select form-select-lg"
                                    aria-label=".form-select-sm example">
                                    @foreach ($role as $role)
                                        <option selected>{{ $role->name }} </option>
                                        <option value="{{ $role->id }}">{{ $pet->name }}</option>
                                    @endforeach
                                </select>
                                @error('id_role')
                                    <span class="ermsg">{{ $message }}</span>
                                @enderror
                            </div>
                         
                        </div>
                        @csrf
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">SỬA {{ $title }}</button>
            </div>
        </div>
    </div>
</div>
