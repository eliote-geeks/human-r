<ul>
<li><a class="{{Request::routeIs('profileEmployee') ? 'active' : ''}}" href="{{Request::routeIs('profileEmployee') ? 'javascript:;' : route('profileEmployee',$user->id)}}">Employement</a></li>
<li><a href="profile-detail.html">Detail</a></li>
<li><a href="profile-document.html">Document</a></li>
<li><a href="profile-payroll.html">Payroll</a></li>
<li><a href="profile-timeoff.html">Timeoff</a></li>
<li><a href="profile-review.html">Reviews</a></li>
<li><a href="profile-setting.html">Settings</a></li>
</ul>