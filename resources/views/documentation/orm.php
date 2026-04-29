<?php
function codeBlock($code){
    echo '<pre style="
        background-color:#2d2d2d;
        color:#f8f8f2;
        padding:10px;
        border-radius:5px;
        overflow:auto;
        margin-top:8px;
        margin-bottom:15px;
    ">';
    echo '<code style="font-family:Consolas, Courier New, monospace;">';
    echo nl2br(htmlspecialchars($code));
    echo '</code>';
    echo '</pre>';
}
?>

<section class="section">
    <div class="section-header">
        <h1>ORM</h1>
    </div>

    <div class="section-body">
        <h4>
            ORM adalah pemanggilan query builder yang mudah sehingga user tidak perlu menulis query manual.
        </h4>

        <b>All / Ambil semua data</b>
        <?php codeBlock('$users = User::all();'); ?>

        <b>Select dan Get</b>
        <?php codeBlock('
$users = User::query()
    ->select("id","name")
    ->get();
'); ?>

        <b>First</b>
        <?php codeBlock('
$user = User::query()
    ->select("id","name")
    ->first();
'); ?>

        <b>Where Condition</b>
        <?php codeBlock('
User::query()->where("id","=",1)->get();
User::query()->orWhere("name","LIKE","%john%")->get();
User::query()->whereIn("id",[1,2,3])->get();
User::query()->whereNotIn("id",[1,2,3])->get();
User::query()->whereNull("deleted_at")->get();
User::query()->whereNotNull("email")->get();
User::query()->whereBetween("age",18,30)->get();
User::query()->whereDate("created_at","2026-04-28")->get();
User::query()->whereMonth("created_at",4)->get();
User::query()->whereYear("created_at",2026)->get();
'); ?>

        <b>Distinct</b>
        <?php codeBlock('
User::query()->distinct()->get();
'); ?>

        <b>Join</b>
        <?php codeBlock('
User::query()->leftJoin("roles","roles.id","=","users.role_id")->get();
User::query()->rightJoin("roles","roles.id","=","users.role_id")->get();
User::query()->innerJoin("roles","roles.id","=","users.role_id")->get();
User::query()->fullOuterJoin("roles","roles.id","=","users.role_id")->get();
User::query()->crossJoin("roles")->get();
'); ?>

        <b>Group By</b>
        <?php codeBlock('
User::query()->groupBy("role_id")->get();
'); ?>

        <b>Order By</b>
        <?php codeBlock('
User::query()->orderBy("id","ASC")->get();
User::query()->orderBy("id","DESC")->get();
User::query()->latest()->get();
User::query()->oldest()->get();
'); ?>

        <b>Limit / Offset</b>
        <?php codeBlock('
User::query()->limit(10)->offset(5)->get();
'); ?>

        <b>Count / Exists</b>
        <?php codeBlock('
User::query()->count();
User::query()->exists();
'); ?>

        <b>Find</b>
        <?php codeBlock('
User::find($id);
'); ?>

        <b>Create</b>
        <?php codeBlock('
User::create([
    "name" => "Fervian"
]);
'); ?>

        <b>Save</b>
        <?php codeBlock('
$user = new User();
$user->name = "Fervian";
$user->save();
'); ?>

        <b>Update</b>
        <?php codeBlock('
$user = User::find($id);
$user->update([
    "name" => "Updated"
]);
'); ?>

        <b>Delete</b>
        <?php codeBlock('
$user = User::find($id);
$user->delete();
'); ?>

        <b>Pagination</b>
        <?php codeBlock('
User::query()->paginate(10);
'); ?>

        <b>Transaction</b>
        <?php codeBlock('
$user = new User();
$user->beginTransaction();

try {
    User::create(["name"=>"A"]);
    User::create(["name"=>"B"]);
    $user->commit();
} catch(Exception $e){
    $user->rollback();
}
'); ?>

        <b>Relationship</b>
        <?php codeBlock('
public function posts()
{
    return $this->hasMany(Post::class,"user_id");
}
'); ?>

        <b>Eager Loading</b>
        <?php codeBlock('
User::query()->with("posts")->get();
'); ?>

        <b>Debug Query</b>
        <?php codeBlock('
User::query()->where("id",1)->toSql();

User::query()->where("id",1)->getRawSQL();
'); ?>
    </div>
</section>