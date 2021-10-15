php artisan crud:generate Formation --fields_from_file="Fichier_Json/Formation.json" --view-path=admin --controller-namespace=App\Http\Controllers\Admin --route-group=admin --form-helper=html
php artisan crud:generate Cours --fields_from_file="Fichier_Json/Cours.json" --view-path=admin --controller-namespace=App\Http\Controllers\Admin --route-group=admin --form-helper=html
php artisan crud:generate Phase --fields_from_file="Fichier_Json/Phase.json" --view-path=admin --controller-namespace=App\Http\Controllers\Admin --route-group=admin --form-helper=html
php artisan crud:generate Question --fields_from_file="Fichier_Json/Question.json" --view-path=admin --controller-namespace=App\Http\Controllers\Admin --route-group=admin --form-helper=html
php artisan crud:generate ReponseC --fields_from_file="Fichier_Json/ReponseCom.json" --view-path=admin --controller-namespace=App\Http\Controllers\Admin --route-group=admin --form-helper=html
php artisan crud:generate Commentaire --fields_from_file="Fichier_Json/Commentaire.json" --view-path=admin --controller-namespace=App\Http\Controllers\Admin --route-group=admin --form-helper=html
php artisan crud:generate ReponseQ --fields_from_file="Fichier_Json/ReponseQuest.json" --view-path=admin --controller-namespace=App\Http\Controllers\Admin --route-group=admin --form-helper=html
