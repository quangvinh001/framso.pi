<div class="modal fade" id="addproduct" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabe3"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Thêm {{ $title }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="content">
                    <form action="{{ route('products.store') }} " id="add-pet-form" method="POST">
                        <div class="user-details">
                            <div class="input-box">
                                <span class="details">Tên Sản Phẩm</span>
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
                                <span class="details">Hình Ảnh Thức Ăn</span>
                                <input type="file" class="form-control-file" id="" name="image_file"
                                    placeholder="" onchange="changeImageadd(event)">

                                @error('image_file')
                                    <span class="ermsg">{{ $message }}</span>
                                @enderror

                            </div>

                            <div class="input-box">
                                <span class="details"> Giới Thiệu</span>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                @error('note')
                                    <span class="ermsg">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="input-box">
                                <img id="image" src="" class="img-thumnail" style="width:10rem"
                                    alt="">
                                <script type="text/javascript">
                                    const changeImageadd = (e) => {
                                        const img = document.getElementById('image');
                                        const file = e.target.files[0]
                                        img.src = URL.createObjectURL(file);
                                    }
                                </script>
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
