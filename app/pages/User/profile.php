<div style="padding: 50px; display: flex; align-items: center; flex-direction: column;">
  <h1>Profile</h1>

  <img src="<?=$user['avatar']?>" />
  <p>Hello, <?=$user['firstName'] . ' ' . $user['lastName']?></p>
  <p>Your email is <?=$user['email']?></p>

  <a href="<?=baseUrl()?>user/logout">Logout</a>
</div>