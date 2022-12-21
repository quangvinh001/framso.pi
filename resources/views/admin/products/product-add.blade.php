<div class="modal fade" id="addproduct" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
aria-labelledby="staticBackdropLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Thêm {{$title}}</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="content">
                <form action="{{ route('products.store') }} " id="add-product-form" method="POST">
                    <div class="product-details">
                        <div class="input-box">
                            <span class="details">Tên Sản Phẩm</span>
                            <input name="name" placeholder="Enter your name">
                            @error('name')
                                <span class="ermsg">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="input-box">
                            <span class="details">Giá</span>
                            <input name="price" type="text" placeholder="Enter your email">
                            @error('price')
                                <span class="ermsg">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="input-box">
                            <span class="details">Số Lượng</span>
                            <input name="num" type="text" placeholder="Enter your phone number">
                            @error('num')
                                <span class="ermsg">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="input-box">
                            <span class="details">Đơn Vị</span>
                            <input name="unit" type="text" placeholder="Enter your adrress">
                            @error('unit')
                                <span class="ermsg">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="input-box">
                            <span class="details">Giới Thiệu</span>
                            <input name="note" type="password" placeholder="Enter your password">
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
            <button type="submit" class="btn btn-primary">Thêm {{$title}}</button>
        </div>
        </form>
    </div>
</div>
</div>
