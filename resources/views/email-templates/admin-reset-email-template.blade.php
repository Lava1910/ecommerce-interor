<p>Dear {{ $admin->name }}</p>
<br>
<p>
    Your password on Ecommerce system was changed successfully.
    Here is your new login credentials:
    <br>
    <b>Login ID: </b>{{ $admin->username }} or {{ $admin->email }}
    <br>
    <b>Password</b> {{ $new_password }}
    <br>
</p>
