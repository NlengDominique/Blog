<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Listes des produits </title>
</head>
<body>
        <h2 class=""> Liste des produits </h2>
  <a href="{{route('create')}}">Ajouter un produit</a>
    <table class="table">
        <th>Image</th>
        <th>Nom</th>
        <th>Description</th>
        <th>Prix </th>
        <tbody>
        @foreach($produits as $produit)
            <tr>

                <td>
                   @if ($produit->image)
                       <img src="{{asset('storage/'.$produit->image)}}" alt="Image du produit" width="100">
                    @else
                    Pas d'image
                    @endif
                </td>
                <td>{{$produit->nom}}</td>
                <td>{{$produit->description}}</td>
                <td>{{$produit->prix}}</td>
                <td><button><a href="{{route('show',$produit->id)}}"> Afficher</a></button></td>
                <td><button><a href="{{route('edit',$produit->id)}}"> Modifier</a></button></td>
                <td><form action="{{route('destroy',$produit->id)}}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Etes vous sur de supprimer ce produit?')" >Supprimer</button>
                    </form>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
</body>
</html>
