<h1>Profile</h1>

<img src="<?=$user['avatar']?>" />
<p>Hello, <?=$user['firstName'] . ' ' . $user['lastName']?></p>
<p>Your email is <?=$user['email']?></p>

<a href="/user/logout">Logout</a>