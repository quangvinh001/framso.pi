<div class="modal fade" id="addvacxin" data-bs-keyboard="false" tabindex="-1"
aria-labelledby="exampleModalToggleLabe1" aria-hidden="true">
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Thêm {{$title}}</h1>
            <button type="pbutton" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="content">
                <form action="{{ route('vacxins.store') }} " id="add-vacxin-form" method="POST">
                    <div class="user-details">
                        <div class="input-box">
                            <span class="details">Tên Vật Nuôi</span>
                            <select name="id"  class="form-select form-select-lg" aria-label=".form-select-sm example">
                                <option selected> Tên Vật Nuôi</option>
                                @foreach($pet as $pet )
                              <option  value="{{$pet->id}}">{{$pet->name}}</option>
                              @endforeach
                              </select>
                            @error('id_pet')
                                <span class="ermsg">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="input-box">
                            <span class="details">Tên Vacxin</span>
                            <input name="name" type="text" placeholder="Tên Vacxin">
                            @error('name')
                                <span class="ermsg">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="input-box">
                            <span class="details">Giá Vacxin</span>
                            <input name="price" type="text" placeholder="Giá Vacxin">
                            @error('price')
                                <span class="ermsg">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="input-box">
                            <span class="details">Số Lượng</span>
                            <input name="num" type="text" placeholder="Số Lượng ">
                            @error('num')
                                <span class="ermsg">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="input-box">
                            <span class="details">Đơn Vị</span>
                            <input name="unit" type="text" placeholder="Đơn Vị ">
                            @error('unit')
                                <span class="ermsg">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="input-box">
                            <span class="details">Hình Ảnh Thức Ăn</span>
                            <input type="file" class="form-control-file" id="" name="image_file"
                                placeholder="" onchange="changeImage(event)">
                            <img id="image" src="" class="img-thumnail" style="width:10rem"
                                alt=""><br>
                            <script type="text/javascript">
                                const changeImage = (e) => {
                                    const img = document.getElementById('image');
                                    const file = e.target.files[0]
                                    img.src = URL.createObjectURL(file);
                                }
                            </script>
                            @error('image_file')
                                <span class="ermsg">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="input-box">
                            <span class="details">Công dụng</span>
                            {{-- <input name="note" type="text" placeholder="Công dụng của vacxin "> --}}
                            <textarea name="note" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
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
