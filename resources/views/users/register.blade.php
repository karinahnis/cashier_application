<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

</head>

<style>
    .row {
        height : 100vh;
        box-sizing : border-box;

    }

    .register-box {
        width: 500px;
        border: solid 3px;
        padding : 30px;
    }

    .form div {
        margin-bottom : 20px;
    }
 


</style>
<body>
    
<div class="row d-flex p-10 justify-content-center align-items-center">
    <div class="register-box">
        @if($errors->any())
        @foreach($errors->all() as $err)
        <p class="alert alert-danger">{{ $err }}</p>
        @endforeach
        @endif
        <form action="{{ route('register.action') }}" method="POST">
            @csrf
            <div>
                <label>Name <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="name" value="{{ old('name') }}" />
            </div>
            <div >
                <label>Username <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="username" value="{{ old('username') }}" />
            </div>
            <div >
                <label>Password <span class="text-danger">*</span></label>
                <input class="form-control" type="password" name="password" />
            </div>
            <div >
                <label>Password Confirmation<span class="text-danger">*</span></label>
                <input class="form-control" type="password" name="password_confirm" />
            </div> 
            <div >
                <label for="user_role">User Roles</label>
                <select name="user_role" id="user_role" class="form-control" required>
                <option value="">Select role</option>
                    @foreach($roles as $role)
                       <option value="{{ $role->name }}">{{ ucfirst($role->name)}} </option> 
                    @endforeach
                </select>
            </div>
            <div class="button">
                <button class="form-control">Register</button>
                <a class="btn btn-danger" href="{{ route('home') }}">Back</a>
            </div>
        </form>
    </div>

    <script scr="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js "></script>
</div>
</body>
</html>


