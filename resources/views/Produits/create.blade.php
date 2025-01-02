<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ajouter un produit</title>
</head>
<body>
    <form method="post" action="{{route('store')}}"  enctype="multipart/form-data">
        @csrf
        <div>
            <label>Nom du produit </label>
            <input type="text" name="nom" required>
        </div>
        <div>
            <label class="text-red-500">Image </label>
            <input type="file" name="image" required accept="image/*">
        </div>
        <div>
            <label>Prix  </label>
            <input type="text" name="prix" required>
        </div>
        <div>
            <label>Description</label>
            <textarea name="description">

            </textarea>
        </div>
        <div>
            <label>Categorie </label>
           <select id="categorie_id" name="categorie_id" >
               <option value="">Selectionner une categorie </option>
               @foreach($categories as $categorie)

                   <option value="{{$categorie->id}}"> {{$categorie->name}}</option>

               @endforeach

           </select>
        </div>

        <button type="submit" class="btn">Save </button>
    </form>
</body>
</html>
