
<div class="modal fade" id="edit-pet" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
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
                                <span class="details">Tên Vật Nuôi</span>
                                <input name="name" placeholder="Nhập Tên Vật Nuôi">
                                @error('name')
                                    <span class="ermsg">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="input-box">
                                <span class="details">Số Lượng</span>
                                <input name="num" type="text" placeholder="Vui Lòng Nhập Số Lượng">
                                @error('num')
                                    <span class="ermsg">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="input-box">
                                <span class="details">Đơn Vị</span>
                                <input name="unit" type="text" placeholder="Vui Lòng Nhập Đợn Vị">
                                @error('unit')
                                    <span class="ermsg">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="input-box">
                                <span class="details">Giới Tinh</span>
                                <input name="gender" type="text" placeholder="Vui Lòng Nhập Giới Tính">
                                @error('gender')
                                    <span class="ermsg">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="input-box">
                                <span class="details"> Hình Ảnh</span>
                                <input name="image" type="text" placeholder="Vui Lòng Thêm Hình Ảnh">
                                @error('image')
                                    <span class="ermsg">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="input-box">
                                <span class="details"> Giới Thiệu</span>
                                <input name="note" type="text" placeholder="Giới thiệu vật nuôi">
                                @error('note')
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
</div>



@endsection
