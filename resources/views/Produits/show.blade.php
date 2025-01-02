<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Un produit </title>
</head>
<body>
        <table>
            <tr>
                <td><img src="{{asset('storage/'.$produit->image)}}" alt="Image du produit" width="100"></td>
                <td>{{$produit->nom}}</td>
                <td>{{$produit->categorie->name}}</td>
                <td>{{$produit->description}}</td>
                <td>{{$produit->prix}}</td>
            </tr>
        </table>
</body>
</html>
