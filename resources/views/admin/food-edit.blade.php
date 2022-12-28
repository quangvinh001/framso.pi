<div class="modal fade" id="edit-food" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">SỬA {{ $title }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="content">
                    <form action="{{ route('foods.update', $food->id ) }} " id="edit-food-form" method="POST" enctype="multipart/form-data">
                        @method('put')
                        <div class="user-details">
                            <div class="input-box">
                                <span class="details">Nhà Cung Cấp</span>
                                <input name="id_supplier" placeholder="" value="{{ old('id_supplier') ?? $food->id_supplier  }}">
                                @error('id_supplier')
                                    <span class="ermsg">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="input-box">
                                <span class="details">Tên Thức Ăn</span>
                                <input name="name" placeholder="" value="{{ old('name') ?? $food->name  }}">
                                @error('name')
                                    <span class="ermsg">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="input-box">
                                <span class="details">Giá Thức Ăn</span>
                                <input name="price" placeholder="" value="{{ old('price') ?? $food->price  }}">
                                @error('price')
                                    <span class="ermsg">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="input-box">
                                <span class="details">Số Lượng Thức Ăn</span>
                                <input name="num" placeholder="" value="{{ old('num') ?? $food->num  }}">
                                @error('num')
                                    <span class="ermsg">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="input-box">
                                <span class="details">Hình Ảnh Thức Ăn</span>
                                <input  class="form-control" type="file" id="formFile" value="{{ old('image') ?? $food->image  }}">
                                @error('image')
                                    <span class="ermsg">{{ $message }}</span>
                                @enderror
                            </div>
                            {{-- <div class="mb-3">
                                <label for="formFile" class="form-label">Hình Ảnh Thức Ăn</label>
                                <input class="form-control" type="file" id="formFile" value="{{ old('image') ?? $food->image  }}">
                                
                              </div> --}}
                            <div class="input-box">
                                <span class="details">Đơn Vị Thức Ăn</span>
                                <input name="unit" placeholder="" value="{{ old('unit') ?? $food->unit  }}">
                                @error('unit')
                                    <span class="ermsg">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="input-box">
                                <span class="details">Ghi Chú</span>
                                <input name="note" placeholder="" value="{{ old('note') ?? $food->note  }}" >
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
                <button type="submit" class="btn btn-primary">SỬA {{ $title }}</button>
            </div>
            </form>
        </div>
    </div>
</div>
