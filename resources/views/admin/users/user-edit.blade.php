<div class="modal fade" id="edit-user-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
aria-labelledby="staticBackdropLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel"> SỬA {{$title}}</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="content">
                <form action="{{ route('users.update', ['user' => $user->id] ) }} " id="edit-user-form" method="post">
                    @method('put')
                    <div class="user-details">
                        <div class="input-box">
                            <span class="details">Username</span>
                            <input name="name" placeholder="Enter your name" value="{{ $user->name}}">
                            @error('name')
                                <span class="ermsg">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="input-box">
                            <span class="details">Email</span>
                            <input name="email" type="text" placeholder="Enter your email" value="{{$user->email}}">
                            @error('email')
                                <span class="ermsg">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="input-box">
                            <span class="details">Phone Number</span>
                            <input name="phone" type="text" placeholder="Enter your phone number" value="{{ $user->phone}}">
                            @error('phone')
                                <span class="ermsg">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="input-box">
                            <span class="details">Address</span>
                            <input name="address" type="text" placeholder="Enter your adrress" value="{{ $user->address}}">
                            @error('address')
                                <span class="ermsg">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="input-box">
                            <span class="details">Password</span>
                            <input name="password" type="password" placeholder="Enter your password" value="{{$user->password}}">
                            @error('password')
                                <span class="ermsg">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="input-box">
                            <span class="details">Role</span>
                            <input name="id_role" type="text" placeholder="Confirm your Level"  value="{{$user->id_role}}"  >
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
            <button type="submit" class="btn btn-primary">SỬA {{$title}}</button>
        </div>
    </div>
</div>
</div>
