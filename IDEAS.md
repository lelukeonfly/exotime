welcome page for everyone:
  - this many categories exist
  - this many users are signed up

bans:
  - temp ban 3x.
  - perm ban -> new table .
  - or ban is table with polymorphic relation to perm and temp.
  - unban request -> new table with foreign key to perm ban.

admin:

  manage:
    - users
    - posts
    - categories
    ...

  see bad words used by users in conversation





$temp = new TemporaryBan
$temp->until = "2024-05-05 10:10:10"
$temp->save()
$ban = new Ban
$ban->reason = „reason“
$ban->bannable_id = $temp->id
$ban->bannable_type = TemporaryBan::class
$user = User::find(10)
$user->bans()->save($ban)
