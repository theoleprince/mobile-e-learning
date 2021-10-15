php artisan crud:generate Formation --fields_from_file="Fichier_JSON/Formation.json" --view-path=admin --controller-namespace=App\Http\Controllers\Admin --route-group=admin --form-helper=html
php artisan crud:generate Cours --fields_from_file="Fichier_JSON/Cours.json" --view-path=admin --controller-namespace=App\Http\Controllers\Admin --route-group=admin --form-helper=html
php artisan crud:generate Phase --fields_from_file="Fichier_JSON/Phase.json" --view-path=admin --controller-namespace=App\Http\Controllers\Admin --route-group=admin --form-helper=html
php artisan crud:generate Question --fields_from_file="Fichier_JSON/Question.json" --view-path=admin --controller-namespace=App\Http\Controllers\Admin --route-group=admin --form-helper=html
php artisan crud:generate ReponseC --fields_from_file="Fichier_JSON/ReponseCom.json" --view-path=admin --controller-namespace=App\Http\Controllers\Admin --route-group=admin --form-helper=html
php artisan crud:generate Commentaire --fields_from_file="Fichier_JSON/Commentaire.json" --view-path=admin --controller-namespace=App\Http\Controllers\Admin --route-group=admin --form-helper=html
php artisan crud:generate ReponseQ --fields_from_file="Fichier_JSON/ReponseQuest.json" --view-path=admin --controller-namespace=App\Http\Controllers\Admin --route-group=admin --form-helper=html
