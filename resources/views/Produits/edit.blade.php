<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modifier un produit </title>
</head>
<body>
    <h2>Modifier un produit </h2>

<form action="{{route('update',$produit->id)}}" enctype="multipart/form-data" >
    @csrf
    @method('PUT')
    <label>Nom du produit </label>
    <input type="text" name="nom"  value="{{$produit->nom}}">
    </div>
    <div>
        <label class="text-red-500">Image </label>
        <input type="file" name="image"  accept="image/*" >
        <img src="{{asset('storage/'.$produit->image)}}">
    </div>
    <div>
        <label>Prix  </label>
        <input type="text" name="prix" required value="{{$produit->prix}}">
    </div>
    <div>
        <label>Description</label>
        <textarea name="description" >
            {{$produit->description }}
        </textarea>
    </div>
    <div>
        <select id="categorie_id" name="categorie_id">
            <option value="">Selectionner une categorie </option>
            @foreach($categories as $categorie)
                <option value="{{$categorie->id}}" {{$categorie->id == $produit->categorie_id ? 'selected':''}}>
                    {{$categorie->name}}
                </option>

            @endforeach
        </select>


    </div>

    <button type="submit" class="btn">Save </button>
</form>
</body>
</html>
