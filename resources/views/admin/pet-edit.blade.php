<div class="modal fade" id="edit-pet-modal"  data-bs-keyboard="false" tabindex="-1"
aria-labelledby="staticBackdropLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel"> SỬA {{$title}}</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="content">
                <form action="{{ route('pets.update', ['pets' => $pets->id] ) }} " id="edit-pet-form" method="post">
                    @method('put')
                    <div class="user-details">
                        <div class="input-box">
                            <span class="details">Họ và Tên</span>
                            <input name="name" placeholder="Họ và Tên" value="{{ old('username') ?? $pets->name  }}">
                            @error('name')
                                <span class="ermsg">{{ $message }}</span>
                            @enderror
                        </div>
                     
                    </div>
                    @csrf
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">SỬA {{$title}}</button>
        </div>
    </div>
</div>
</div>
