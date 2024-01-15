<form action="" method="post">
    @csrf
    @method($recette->id ? 'PATCH' : 'POST')

</form>
