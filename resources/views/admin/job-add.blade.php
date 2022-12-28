<div class="modal fade" id="addjob"  data-bs-keyboard="false" tabindex="-1"
aria-labelledby="exampleModalToggleLabe3" aria-hidden="true">
<div class="modal-dialog ">
    <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Thêm {{$title}}</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="content">
                <form action="{{ route('jobs.store') }} " id="add-user-form" method="POST">
                    <div class="user-details">
                        <div class="input-box">
                            <span class="details job">Tên Công Việc</span>
                            <input name="name" placeholder="Enter your name">
                            @error('name')
                                <span class="ermsg">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="input-box">
                            <span class="details job">Tên Nhân Viên</span>
                            {{-- <input name="name" placeholder="Enter your name"> --}}
                            <select class="form-select form-select-lg" aria-label=".form-select-sm example">
                                <option selected>Tên Nhân Viên</option>
                                @foreach($user as $user )
                              <option  value="{{$user->id}}">{{$user->name}}</option>
                              @endforeach
                              </select>
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
            <button type="submit" class="btn btn-primary">Thêm {{$title}}</button>
        </div>
        </form>
    </div>
</div>
</div>
