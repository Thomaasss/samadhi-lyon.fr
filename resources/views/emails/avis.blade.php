<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
</head>
<body>
<h2>{{ $attributes['nom'] }} a publié un nouvel avis !</h2>
<small>Ce message provient du module d'avis de www.samadhi-lyon.fr</small>
<p>Cours ou thérapie : {{ $el->intitule }}</p>
<p>Nom : {{ $attributes['nom'] }}</p>
<p>Message : : {{ $attributes['message'] }}</p>
<ul>
</ul>
</body>
</html>
