@if(Auth::guard('customer')->check())
<p>
    You are Logged in as a <strong>Customer</strong>
</p>
@else
<p class="text-danger">
    Your a logged out as a <strong>Employee</strong>
</p>
<br>
<p class="text-danger">
    Your a logged out as a <strong>Manger</strong>
</p>
@endif

@if(Auth::guard('employee')->check())
<p>
    You are Logged in as a <strong>Employee</strong>
</p>
@else
<p class="text-danger">
    Your a logged out as a <strong>Customer</strong>
</p>
<br>
<p class="text-danger">
    Your a logged out as a <strong>Manger</strong>
</p>
@endif

@if(Auth::guard('manger')->check())
<p>
    You are Logged in as a <strong>Manger</strong>
</p>
@else
<p class="text-danger">
    Your a logged out as a <strong>Employee</strong>
</p>
<br>
<p class="text-danger">
    Your a logged out as a <strong>Customer</strong>
</p>

@endif