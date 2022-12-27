<div class="modal fade" id="add-food" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Thêm {{ $title }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="content">
                    <form action="{{ route('foods.store') }} " id="add-food-form" method="POST">
                        <div class="user-details">
                            <div class="input-box">
                                <span class="details">Nhà Cung Cấp</span>
                                <input name="id_supplier" placeholder="">
                                @error('id_supplier')
                                    <span class="ermsg">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="input-box">
                                <span class="details">Tên Thức Ăn</span>
                                <input name="name" placeholder="">
                                @error('name')
                                    <span class="ermsg">{{ $message }}</span>
                                @enderror
                            </div> 
                            <div class="input-box">
                                <span class="details">Giá Thức Ăn</span>
                                <input type="text" name="price" placeholder="">
                                @error('price')
                                    <span class="ermsg">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="input-box">
                                <span class="details">Số Lượng Thức Ăn</span>
                                <input type="number" name="num" placeholder="">
                                @error('num')
                                    <span class="ermsg">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="input-box">
                                <span class="details">Hình Ảnh Thức Ăn</span>
                                <input type="file" class="form-control-file" id="" name="image_file" placeholder="" onchange="changeImage(event)">
                                <img id="image" src="" class="img-thumnail" style="width:10rem" alt=""><br>
                                <script type="text/javascript">
                                    const  changeImage=(e)=>{
                                        const img=document.getElementById('image');
                                        const file=e.target.files[0]
                                        img.src=URL.createObjectURL(file);
                                    }
                                </script>
                                @error('image_file')
                                    <span class="ermsg">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="input-box">
                                <span class="details">Đơn Vị Thức Ăn</span>
                                <input name="unit" placeholder="">
                                @error('unit')
                                    <span class="ermsg">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="input-box">
                                <span class="details">Ghi Chú</span>
                                <input name="note" placeholder="">
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
