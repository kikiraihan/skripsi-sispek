<form action="{{ route('password-update') }}" method="POST">
    @csrf
    <input name="password_lama" type="password" class="form-control mb-2 @error('password_lama') is-invalid @enderror" placeholder="password lama">
    @error('password_lama')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror

    <input name="password_baru" type="password" class="form-control mb-2 @error('password_baru') is-invalid @enderror" placeholder="password baru">
    @error('password_baru')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror


    <button type="submit" class="btn btn-block btn-lg btn-warning mb-2">Update password</button>
</form>